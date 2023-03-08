<?php

namespace App\Providers;

use App\Models\Quote;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $quotes = Quote::wherePublished(1)->latest()->get();

        view()->share('quotes', $quotes);
        // $array = DB::table('animes')->select('title')->get();
        // $animes = collect($array)
        // ->map(function($value,$key){
        //   return collect($value)->values();
        // })->flatten();

        // Config::set('global', [
        //     'animes' => $animes,
        // ]);
    }
}
