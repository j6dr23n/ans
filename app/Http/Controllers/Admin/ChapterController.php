<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chapter\StoreRequest;
use App\Http\Requests\Chapter\UpdateRequest;
use App\Models\Anime;
use App\Models\Chapter;
use App\Services\Admin\ChapterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class ChapterController extends Controller
{
    private ChapterService $chapterService;

    public function __construct(ChapterService $chapterService)
    {
        $this->chapterService = $chapterService;
    }

    public function create($anime_id)
    {
        $anime = Anime::where('id', $anime_id)->firstOrFail();
        $chapters = count($anime->chapters);

        return view('admin.chapters.create', compact('anime', 'chapters'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $chapter = $this->chapterService->store($data);

        if ($chapter) {
            return redirect(route('manga.index'))->with('success', 'Chapter Created!!!');
        }

        return redirect(route('manga.index'))->with('error', 'Something Wrong!!!');
    }

    public function show($id)
    {
        $anime = Anime::where('id', $id)->firstOrFail();
        $chapters = Chapter::where('anime_id', $anime->id)->paginate(10);

        return view('admin.chapters.show', compact('anime', 'chapters'));
    }

    public function edit(Chapter $chapter)
    {
        $anime = Anime::where('id', $chapter->anime_id)->firstOrFail();

        return view('admin.chapters.edit', compact('chapter', 'anime'));
    }

    public function update(UpdateRequest $request, Chapter $chapter)
    {
        $data = $request->validated();

        $chapter = $this->chapterService->update($chapter, $data);

        if ($chapter) {
            return redirect(route('manga.index'))->with('success', 'Chapter Updated!!!');
        }

        return redirect(route('manga.index'))->with('error', 'Something Wrong!!!');
    }

    public function destroy(Chapter $chapter)
    {
        $manga = Anime::where('id', $chapter->anime_id)->firstOrFail();
        $status = $this->chapterService->destroy($chapter, $manga);

        if ($status) {
            return redirect(route('manga.index'))->with('success', 'Chapter Deleted!!!');
        }

        return redirect(route('manga.index'))->with('error', 'Something Wrong!!!');
    }
}
