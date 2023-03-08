<?php

namespace App\Repositories\Admin;

use App\Models\Episode;
use App\Models\Anime;
use App\Models\MoreDownload;
use App\Models\MoreEmbed;
use App\Repositories\Admin\EpisodeRepositoryInterface;
use App\Services\Admin\EpisodeService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class EpisodeRepository implements EpisodeRepositoryInterface
{
    use AuthorizesRequests;
    private EpisodeService $episodeService;

    public function __construct(EpisodeService $episodeService)
    {
        $this->episodeService = $episodeService;
    }

    public function show($id)
    {
        $anime = Anime::with('episodes','page')->findOrFail($id);
        $episodes = $anime->episodes()->paginate(10);

        return view('admin.episodes.show', compact('anime','episodes'));
    }

    public function edit($id)
    {
        $episode = Episode::with('anime')->where('id', $id)->firstOrFail();
        $this->authorize('update', $episode);

        $drives = DB::table('drives')->get();
        $resolutions = DB::table('resolutions')->get();

        return view('admin.episodes.edit', compact('episode', 'drives', 'resolutions'));
    }

    public function create($id)
    {
        $this->authorize('create', Episode::class);

        $anime = DB::table('animes')->where('id', $id)->latest()->first();
        $drives = DB::table('drives')->get();
        $resolutions = DB::table('resolutions')->get();

        return view('admin.episodes.create', compact('anime', 'drives', 'resolutions'));
    }

    public function auto_create($id)
    {
        $this->authorize('create', Episode::class);

        $anime = DB::table('animes')->where('id', $id)->latest()->first();
        $drives = DB::table('drives')->get();
        $resolutions = DB::table('resolutions')->get();

        return view('admin.episodes.auto-create', compact('anime', 'drives', 'resolutions'));
    }

    public function store($request)
    {
        $this->authorize('create', Episode::class);

        $episode = $this->episodeService->store($request);

        if ($episode) {
            return redirect()->route('episodes.show', $request->animes_id)->with('success', 'Episode Added!!!');
        }

        return back()->with('error', 'Something Wrong!!!');
    }

    public function update($request, $id)
    {
        $episode = Episode::where('id', $id)->firstOrFail();
        $this->authorize('update', $episode);

        $episode = $this->episodeService->update($request, $episode);

        if ($episode) {
            return redirect()->route('episodes.show', $episode->animes_id)->with('success', 'Episode Updated!!!');
        }

        return back()->with('error', 'Something Wrong!!!');
    }

    public function destroy($id)
    {
        $episode = Episode::where('id', $id)->first();
        $this->authorize('delete', $episode);

        $status = $this->episodeService->destroy($episode);

        if ($status) {
            return back()->with('success', 'Episode Deleted!!!');
        }
        return back()->with('error', 'Something Wrong!!');
    }
}
