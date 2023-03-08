<?php

namespace App\Services\Admin;

use App\Jobs\ProcessManaga;
use App\Models\Anime;
use App\Models\Chapter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ChapterService
{
    public function store($data): Chapter
    {
        $manga = Anime::where('id', $data['anime_id'])->firstOrFail();
        $mangaName = str_replace(' ', '', $manga->title);

        $pdf = $data['pdf_file'];
        $fileName = time().'-'.$pdf->getClientOriginalName();
        $pdf->storeAs('/manga/'.$mangaName.'/pdf', $fileName, 'public');
        $chapter = Chapter::create($data);
        ProcessManaga::dispatch($mangaName, $fileName, $chapter);

        return $chapter;
    }

    public function update($chapter, $data): Chapter
    {
        $manga = Anime::where('id', $data['anime_id'])->firstOrFail();
        $mangaName = str_replace(' ', '', $manga->title);
        if (array_key_exists('pdf_file', $data)) {
            Storage::disk('public')->delete(str_replace('/storage', '', $chapter->pdf_path));
            File::deleteDirectory(public_path()."/storage/manga/".$mangaName."/chapter/".$chapter->chapter_no);

            $pdf = $data['pdf_file'];
            $fileName = time().'-'.$pdf->getClientOriginalName();
            $pdf->storeAs('/manga/'.$mangaName.'/pdf', $fileName, 'public');
            ProcessManaga::dispatch($mangaName, $fileName, $chapter);
        }

        $chapter->fill($data)->save();

        return $chapter;
    }

    public function destroy($chapter, $manga): bool
    {
        $mangaName = str_replace(' ', '', $manga->title);
        Storage::disk('public')->delete(str_replace('/storage', '', $chapter->pdf_path));
        File::deleteDirectory(public_path()."/storage/manga/".$mangaName."/chapter/".$chapter->chapter_no);
        $status = $chapter->delete();

        return $status;
    }
}
