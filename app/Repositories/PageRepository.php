<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Models\Anime;
use App\Models\Channel;
use App\Models\ChannelServer;
use App\Models\Page;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

Collection::macro('previous', function ($key, $value = null) {
    if (func_num_args() == 1) {
        $value = $key;
    } $key = 'id';

    return $this->get($this->searchAfterValues($key, $value) - 1);
});

Collection::macro('next', function ($key, $value = null) {
    if (func_num_args() == 1) {
        $value = $key;
    } $key = 'id';

    return $this->get($this->searchAfterValues($key, $value) + 1);
});

Collection::macro('searchAfterValues', function ($key, $value) {
    return $this->values()->search(function ($item, $k) use ($key, $value) {
        return data_get($item, $key) == $value;
    });
});


class PageRepository implements PageRepositoryInterface
{
    public const perPage = 5;

    public function index()
    {
        return view('index', [
            'animes' => getAnimes(),
            'posts' => getAllPosts(),
            'featuredPosts' => getFeaturedPosts(),
            'ongoing' => getOngoingPosts(),
        ]);
    }

    public function animes()
    {
        return view('pages.animes', [
            'animes' => getPostsByType('anime'),
            'featuredAnimes' => getFeaturedPostsByType('anime')
        ]);
    }

    public function movies()
    {
        return view('pages.movies', [
            'movies' => getPostsByType('movie'),
            'featuredMovies' => getFeaturedPostsByType('movie')
        ]);
    }

    public function hentai()
    {
        return view('pages.hentai', [
            'hentai' => getPostsByType('hentai'),
            'featuredHentai' => getFeaturedPostsByType('hentai')
        ]);
    }

    public function manga()
    {
        return view('pages.manga', [
            'manga' => getPostsByType('manga'),
            'featuredManga' => getFeaturedPostsByType('manga')
        ]);
    }

    public function show($slug)
    {
        $post = getPost($slug);
        views($post)->collection(collect(['page_id' => $post->page->id ?? '0']))->record();

        if ($post->type === "manga") {
            $manga = getManga($slug);
            $chapters = getChapters($manga);

            return view('pages.details-manga', compact('post', 'manga', 'chapters'));
        }

        return view('pages.details', compact('post'));
    }

    public function about()
    {
        return view('pages.about', [
            'animes' => DB::table('animes')->where('type', 'anime')->count(),
            'movies' => DB::table('animes')->where('type', 'movie')->count(),
            'manga' => DB::table('animes')->where('type', 'manga')->count(),
            'hentai' => DB::table('animes')->where('type', 'hentai')->count(),
        ]);
    }

    public function guide()
    {
        return view('pages.guide');
    }

    public function stream($slug, $id)
    {
        $post = Anime::with(['page','episodes'])->where('slug', $slug)->firstOrFail();
        if (auth()->user() && allow($post->page->id) || $post->paid === 0) {
            $episode = Episode::where('id', $id)->firstOrFail();
            $episodes = Episode::where('animes_id', $post->id)->whereNot('id', $episode->id)->get();

            return view('pages.stream', compact('episode', 'post', 'episodes'));
        }

        return back()->with('error', 'You are not a vip member of '.$post->page->name.' or Plan Expired!!!');
    }

    public function download($slug, $id)
    {
        $post = Anime::with(['page','episodes'])->where('slug', $slug)->firstOrFail();
        if (auth()->user() && allow($post->page->id) || $post->paid === 0) {
            $episode = Episode::where('id', $id)->firstOrFail();
            $episodes = Episode::where('animes_id', $post->id)->whereNot('id', $episode->id)->get();

            return view('pages.download', compact('episode', 'post', 'episodes'));
        }

        return back()->with('error', 'You are not a vip member of '.$post->page->name.' or Plan Expired!!!');
    }

    public function show_chapter($anime, $chapter, $request)
    {
        if (auth()->user() &&  allow($anime->page->id) || $anime->paid === 0) {
            $page = (int) $request->input('page') ?: 1;
            $nextId = $anime->chapters->next($chapter->id);
            $previousId = $anime->chapters->previous($chapter->id);
            $images = $this->getReaderImages($chapter, $page);

            return view('pages.reader', compact('anime', 'chapter', 'images', 'nextId', 'previousId'));
        }

        return back()->with('error', 'You are not a vip member of '.$anime->page->name.' or Plan Expired!!!');
    }

    public function pages_index()
    {
        $pages = Page::inRandomOrder()->paginate();

        return view('pages.page.index', compact('pages'));
    }

    public function pages_show($request, $slug)
    {
        $page = Page::with('animes', 'setting')->where('slug', $slug)->first();
        $featuredAnimes = $page->animes->where('featured', 'on')->take(10);
        $freeAnimes = $page->animes()->wherePaid(false)->orderByDesc('updated_at')->paginate(18);
        $paidAnimes = $page->animes()->wherePaid(true)->orderByDesc('updated_at')->paginate(18);
        $paidAnimes->setPageName('paid_page');
        if ($request->has('page')) {
            Paginator::currentPageResolver(fn () => $request->page);
            $freeAnimes = $page->animes()->wherePaid(false)->orderByDesc('updated_at')->paginate(18);
        }
        if ($request->has('paid_page')) {
            Paginator::currentPageResolver(fn () => $request->paid_page);
            $paidAnimes = $page->animes()->wherePaid(true)->orderByDesc('updated_at')->paginate(18);
            $paidAnimes->setPageName('paid_page');
        }
        foreach ($freeAnimes as $post) {
            $post->unique_views_count = views($post)->unique()->count();
        }
        foreach ($paidAnimes as $post) {
            $post->unique_views_count = views($post)->unique()->count();
        }

        return view('pages.page.show', compact('page', 'featuredAnimes', 'freeAnimes', 'paidAnimes'));
    }

    public function pages_pricing()
    {
        return view('pages.pricing');
    }

    public function pages_profile($id)
    {
        $user = User::with('paidPages')->where('fb_id', $id)->orWhere('google_id', $id)->firstOrFail();

        return view('pages.profile', compact('user'));
    }
    public function pages_profile_update($request, $id)
    {
        $data = $request->validate([
            'password' => 'min:6|required|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        $user = User::where('id', $id)->first();
        if ($user) {
            $user->update([
                'password' => bcrypt($data['password']),
            ]);
            return redirect()->route('pages.profile', $user->fb_id)->with('success', 'Profile updated successfully.');
        }
        return back()->with('error', 'Can\'t find this user!!!');
    }
    public function tv_channels()
    {
        $channels = Channel::with('servers')->get();

        return view('pages.channels.index', compact('channels'));
    }

    public function tv_channel_show($id)
    {
        $server = ChannelServer::where('channel_servers.id', $id)->join('channels', 'channel_servers.channel_id', '=', 'channels.id')->firstOrFail();

        return view('pages.channels.show', compact('server'));
    }

    public function search($request)
    {
        $search = $request->search;
        if ($search == trim($search) && strpos($search, ' ')) {
            $words = explode(" ", $search);
            $items =Anime::where('title', 'like', '%'.$words[0]." ".$words[1].'%')
                ->orWhere('info', 'like', '%'.$words[0]." ".$words[1].'%')
                ->latest()->paginate(32);
            ;
            foreach ($items as $item) {
                $item->unique_views_count = views($item)->unique()->count();
            }
        } else {
            $items =Anime::where('title', 'like', '%'.$search.'%')
            ->orWhere('info', 'like', '%'.$search.'%')
            ->latest()->paginate(32);
            ;
            foreach ($items as $item) {
                $item->unique_views_count = views($item)->unique()->count();
            }
        }
        $items->appends(['search' => $search]);

        return view('pages.search', compact('items', 'search'));
    }

    protected function getReaderImages($chapter, $page)
    {
        $images = collect(File::allFiles(str_replace('image.jpg', '', $chapter->img_path)))
            ->sortBy(function ($file) {
                return $file->getFileName();
            }, SORT_NATURAL)
            ->map(function ($file) {
                return $file->getPathName();
            });

        $slice = $images->slice(($page-1)* self::perPage, self::perPage);

        $images = new \Illuminate\Pagination\LengthAwarePaginator($slice, $images->count(), self::perPage);
        $images->withPath(url()->current());

        return $images;
    }
}
