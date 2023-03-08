<?php

namespace App\Services\Admin;

use App\Jobs\ChangePosterFormatToWebp;
use App\Jobs\ProcessFBPoster;
use App\Models\Anime;
use App\Models\Episode;
use Illuminate\Support\Facades\File;

class AnimeService
{
    public function store($request): Anime
    {
        if ($request->type !== 'manga' && $request->has('episodes')) {
            $request->validate([
                'episodes.*.epi_link' => 'nullable',
                'episodes.*.epi_720p_link' => 'required',
                'episodes.*.epi_number' => 'required',
                'episodes.*.embed_link' => 'nullable',
                'episodes.*.drive' => 'required',
                'episodes.*.resolution' => 'required',
            ]);
        }

        $data = $request->validated();

        if (empty($request->featured)) {
            $data['featured'] = "off";
        } else {
            $data['featured'] = "on";
        }

        if (empty($request->paid)) {
            $data['paid'] = false;
        } else {
            $data['paid'] = true;
        }

        $anime = $this->createAnime($data);

        if ($request->pdf_file === null && $request->type !== 'manga' && $request->has('episodes')) {
            foreach ($request->episodes as $key => $value) {
                $value['animes_id'] = $anime['id'];
                Episode::create($value);
            }
        }
        if ($anime) {
            $noti['title'] = $anime->title;
            $noti['message'] = 'New '.$anime->type.' Added';
            if (app()->environment('production')) {
                sendTele($anime, env('CHANNEL_ID'));
                sendTele($anime, env('CHANNEL_ID_21'));
                if ($anime->type !== 'hentai') {
                    ProcessFBPoster::dispatch($anime);
                }
                webPushNoti($noti['title'], $noti['message'], $anime->poster);
            }
        }

        return $anime;
    }

    public function update($request, $anime): Anime
    {
        $data = $request->except('pdf_file');
        $data['page_id'] = auth()->user()->page_id;

        if (empty($request->paid)) {
            $data['paid'] = false;
        } else {
            $data['paid'] = true;
        }

        if (empty($request->featured)) {
            $data['featured'] = "off";
        } else {
            $data['featured'] = "on";
        }

        $anime->fill($data)->save();

        return $anime;
    }

    public function destroy($anime): bool
    {
        if ($anime->type === "manga") {
            $animeName = str_replace(' ', '', $anime->title);
            File::deleteDirectory(public_path()."/storage/manga/".$animeName);
        }

        $status = $anime->delete();

        return $status;
    }

    protected function createAnime($data): Anime
    {
        $anime = Anime::create([
            'title' => $data['title'],
            'page_id' => auth()->user()->page_id,
            'info' => $data['info'],
            'poster' => $data['poster'],
            'type' => $data['type'],
            'release_year' => $data['release_year'],
            'condition' => $data['condition'],
            'season' => $data['season'],
            'genres' => $data['genres'],
            'sub_genres' => $data['sub_genres'],
            'rating' => $data['rating'],
            'age_rating' => $data['age_rating'],
            'featured' => $data['featured'],
            'trailer' => $data['trailer'],
            'paid' => $data['paid']
        ]);

        ChangePosterFormatToWebp::dispatch($anime->id, $data['poster']);

        return $anime;
    }
}
