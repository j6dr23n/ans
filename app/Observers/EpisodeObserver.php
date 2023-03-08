<?php

namespace App\Observers;

use App\Models\Episode;
use Illuminate\Support\Facades\Cache;

class EpisodeObserver
{
    /**
     * Handle the Episode "created" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function created(Episode $episode)
    {
        Cache::forget('post-'.$episode->anime->slug);
    }

    /**
     * Handle the Episode "updated" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function updated(Episode $episode)
    {
        Cache::forget('post-'.$episode->anime->slug);
    }

    /**
     * Handle the Episode "deleted" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function deleted(Episode $episode)
    {
        Cache::forget('post-'.$episode->anime->slug);
    }

    /**
     * Handle the Episode "restored" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function restored(Episode $episode)
    {
        //
    }

    /**
     * Handle the Episode "force deleted" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function forceDeleted(Episode $episode)
    {
        //
    }
}
