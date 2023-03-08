<?php

namespace App\Observers;

use App\Models\Anime;
use Illuminate\Support\Facades\Cache;

class AnimeObserver
{
    /**
     * Handle the Anime "created" event.
     *
     * @param  \App\Models\Anime  $anime
     * @return void
     */
    public function created(Anime $anime)
    {
        Cache::forget('post-'.$anime->slug);
    }

    /**
     * Handle the Anime "updated" event.
     *
     * @param  \App\Models\Anime  $anime
     * @return void
     */
    public function updated(Anime $anime)
    {
        Cache::forget('post-'.$anime->slug);
    }

    /**
     * Handle the Anime "deleted" event.
     *
     * @param  \App\Models\Anime  $anime
     * @return void
     */
    public function deleted(Anime $anime)
    {
        Cache::forget('post-'.$anime->slug);
    }

    /**
     * Handle the Anime "restored" event.
     *
     * @param  \App\Models\Anime  $anime
     * @return void
     */
    public function restored(Anime $anime)
    {
        //
    }

    /**
     * Handle the Anime "force deleted" event.
     *
     * @param  \App\Models\Anime  $anime
     * @return void
     */
    public function forceDeleted(Anime $anime)
    {
        //
    }
}
