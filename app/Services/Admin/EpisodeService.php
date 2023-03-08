<?php

namespace App\Services\Admin;

use App\Jobs\Uploads\UploadToStreamSB;
use App\Jobs\Uploads\UploadToStreamTape;
use App\Jobs\Uploads\UploadToUpStream;
use App\Models\Episode;
use App\Models\MoreDownload;
use App\Models\MoreEmbed;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EpisodeService
{
    public function store($request): Episode
    {
        foreach ($request->episodes as $key => $value) {
            $value['animes_id'] = $request->animes_id;
            $episode = Episode::create($value);
            $data = Session::get('fileName-'.auth()->id());
            Session::forget('fileName-'.auth()->id());

            if ($request->streamsb === "on") {
                UploadToStreamSB::dispatch($data, $episode->id, auth()->user()->page_id);
            }
            if ($request->upstream === "on") {
                UploadToUpStream::dispatch($data, $episode->id, auth()->user()->page_id);
            }
            if ($request->streamtape === "on") {
                UploadToStreamTape::dispatch($data, $episode->id, auth()->user()->page_id);
            }
        }
        $noti['title'] = $episode->anime->title;
        $noti['message'] = 'New Episode Added';
        if (app()->environment('production')) {
            sendTele($episode, env('CHANNEL_ID'));
            sendTele($episode, env('CHANNEL_ID_21'));
            webPushNoti($noti['title'], $noti['message'], $episode->anime->poster);
        }

        return $episode;
    }

    public function update($request, $episode): Episode
    {
        if ($request->has('more_download')) {
            foreach ($request->more_download as $key => $value) {
                $value['episode_id'] = $episode->id;
                MoreDownload::create($value);
            }
        }

        if ($request->has('more_embed')) {
            foreach ($request->more_embed as $key => $value) {
                $value['episode_id'] = $episode->id;
                MoreEmbed::create($value);
            }
        }

        $data = $request->validated();

        $episode->fill($data)->save();

        return $episode;
    }

    public function destroy($episode): bool
    {
        $status = $episode->delete();

        return $status;
    }
}
