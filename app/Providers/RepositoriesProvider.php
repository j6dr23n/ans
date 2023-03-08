<?php

namespace App\Providers;

use App\Repositories\Admin\AnimeRepository;
use App\Repositories\Admin\AnimeRepositoryInterface;
use App\Repositories\Admin\EpisodeRepository;
use App\Repositories\Admin\EpisodeRepositoryInterface;
use App\Repositories\Admin\GenreRepository;
use App\Repositories\Admin\GenreRepositoryInterface;
use App\Repositories\PageRepository;
use App\Repositories\PageRepositoryInterface;
use App\Repositories\Admin\PageRepository as AdminPageRepository;
use App\Repositories\Admin\PageRepositoryInterface as AdminPageRepositoryInterface;
use App\Repositories\Admin\PagesRepository;
use App\Repositories\Admin\PagesRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
        $this->app->bind(AdminPageRepositoryInterface::class, AdminPageRepository::class);
        $this->app->bind(AnimeRepositoryInterface::class, AnimeRepository::class);
        $this->app->bind(GenreRepositoryInterface::class, GenreRepository::class);
        $this->app->bind(EpisodeRepositoryInterface::class, EpisodeRepository::class);
        $this->app->bind(PagesRepositoryInterface::class, PagesRepository::class);
    }
}
