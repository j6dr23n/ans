<?php

namespace App\Repositories\Admin;

use App\Models\Anime;
use App\Repositories\Admin\PageRepositoryInterface;
use Analytics;
use App\Models\Page;
use App\Models\User;
use CyrildeWit\EloquentViewable\Contracts\View;
use Spatie\Analytics\Period;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class PageRepository implements PageRepositoryInterface
{
    public function index()
    {
        $animes = getPosts('anime')->get();
        $movies = getPosts('movie')->get();
        $hentai = getPosts('hentai')->get();
        $manga = getPosts('manga')->get();
        $pages = Page::inRandomOrder()->take(12)->get();
        $members = User::where('type', 'member')->latest()->take(6)->get();
        $logs = Activity::join('users', 'activity_log.causer_id', '=', 'users.id')->select('activity_log.*', 'users.name')->orderBy('activity_log.id', 'desc')->take(12)->get();

        return view('admin.dashboard', compact('animes', 'movies', 'hentai', 'manga', 'pages', 'members', 'logs'));
    }

    public function all()
    {
        $items = Anime::with('page')->latest()->paginate(10);

        return view('admin.pages.all', compact('items'));
    }

    public function posts()
    {
        $posts = Anime::where('page_id', auth()->user()->page_id)->orderByDesc('updated_at')->paginate(20);
        foreach ($posts as $post) {
            $post->unique_views_count = views($post)->unique()->count();
        }

        return view('admin.pages.posts', compact('posts'));
    }

    public function analytics()
    {
        $items = Analytics::fetchVisitorsAndPageViews(Period::days(7));

        return view('admin.pages.analytics', compact('items'));
    }

    public function download_logs()
    {
        $logs = Activity::where('properties->page_id', auth()->user()->page_id)->latest()->paginate(20);

        return view('admin.pages.download-logs', compact('logs'));
    }

    public function logs()
    {
        $logs = Activity::join('users', 'activity_log.causer_id', '=', 'users.id')->select('activity_log.*', 'users.name')->orderBy('activity_log.id', 'desc')->paginate(20);

        return view('admin.pages.logs', compact('logs'));
    }

    public function movies()
    {
        $movies = getPosts('movie')->paginate(10);

        return view('admin.movies.index', compact('movies'));
    }

    public function manga()
    {
        $manga = getPosts('manga')->paginate(10);

        return view('admin.manga.index', compact('manga'));
    }

    public function hentai()
    {
        $hentai = getPosts('hentai')->paginate(10);

        return view('admin.hentai.index', compact('hentai'));
    }

    public function search($request)
    {
        $search = $request->search;
        if ($search == trim($search) && strpos($search, ' ')) {
            $words = explode(" ", $search);
            $items =Anime::where('title', 'like', '%'.$words[0]." ".$words[1].'%')
                ->orWhere('info', 'like', '%'.$words[0]." ".$words[1].'%')
                ->latest()->paginate(10);
        } else {
            $items =Anime::where('title', 'like', '%'.$search.'%')
            ->orWhere('info', 'like', '%'.$search.'%')
            ->latest()->paginate(10);
        }

        return view('admin.pages.all', compact('items', 'search'));
    }

    public function advancedFileUpload($request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (! $receiver->isUploaded()) {
            return back()->with('error', 'No File Uploaded!!!');
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 10);
            $fileName .= '_'.md5(time()).'.'.$extension; // add timestamp to file name
            $size = floor(number_format($file->getSize() / 1048576, 2));
            Session::put('fileName-'.auth()->id(), [$fileName,$size]);

            $disk = Storage::disk(config('filesystems.public'));
            $path = $disk->putFileAs('videos/tempo', $file, $fileName);

            // delete chunked file
            unlink($file->getPathname());
        }

        // otherwise return percentage information
        $handler = $fileReceived->handler();

        return [
            'done' => $handler->getPercentageDone(),
            'status' => true,
        ];
    }
}
