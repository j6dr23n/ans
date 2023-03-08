<?php

namespace App\Repositories\Admin;

use App\Models\Anime;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\Admin\AnimeRepositoryInterface;
use App\Services\Admin\AnimeService;
use Illuminate\Support\Facades\DB;

class AnimeRepository implements AnimeRepositoryInterface
{
    use AuthorizesRequests;
    private AnimeService $animeService;

    public function __construct(AnimeService $animeService)
    {
        $this->animeService = $animeService;
    }

    public function index()
    {
        $animes = getPosts('anime')->paginate(10);

        return view('admin.animes.index', compact('animes'));
    }

    public function create()
    {
        $this->authorize('create', Anime::class);

        if (auth()->user()->page) {
            $genres = DB::table('genres')->latest()->get();
            $drives = DB::table('drives')->latest()->get();
            $resolutions = DB::table('resolutions')->latest()->get();
            $pages = DB::table('pages')->latest()->get();
            $types = DB::table('types')->latest()->get();

            return view('admin.animes.create', compact('genres', 'drives', 'resolutions', 'pages', 'types'));
        }

        return redirect()->back()->with('error', 'You don\'t have associated page!!!');
    }

    public function store($request)
    {
        $this->authorize('create', Anime::class);
        $anime = $this->animeService->store($request);

        if ($anime) {
            return redirect()->route('animes.index')->with('success', 'Anime Created!!!');
        }

        return back()->with('error', 'Something Wrong!!!');
    }

    public function edit($slug)
    {
        $anime = Anime::with('page')->where('slug', $slug)->latest()->first();

        $this->authorize('update', $anime);

        $genres = DB::table('genres')->get();
        $pages = DB::table('pages')->get();
        $types = DB::table('types')->latest()->get();

        return view('admin.animes.edit', compact('anime', 'genres', 'pages', 'types'));
    }

    public function update($request, $slug)
    {
        $anime = Anime::where('slug', $slug)->first();
        $this->authorize('update', $anime);

        $anime = $this->animeService->update($request, $anime);

        if ($anime) {
            return redirect()->route('animes.index')->with('success', 'Anime Updated!!!');
        } else {
            return back()->with('error', 'There is no record in Database!!!');
        }
    }

    public function destroy($id)
    {
        $anime = Anime::where('id', $id)->first();
        $this->authorize('delete', $anime);
        $status = $this->animeService->destroy($anime);

        if ($status) {
            return redirect()->route('pages.all')->with('success', 'Anime Deleted!!!');
        }
        return back()->with('error', 'Something Wrong!!!');
    }
}
