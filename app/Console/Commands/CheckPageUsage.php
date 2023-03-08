<?php

namespace App\Console\Commands;

use App\Models\Page;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckPageUsage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'page:check_usage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check page usage and if last seen less than 1 week page unpublished';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pages = Page::latest()->get();

        $countOfPage = collect($pages)->filter(function ($page) {
            return $page->last_seen !== null && $page->last_seen < now()->subWeek();
        })->each(function ($page) {
            $page->update(['banned' => true]);
        })->count();
        Log::info($countOfPage);
        dd($countOfPage);

        return COMMAND::SUCCESS;
    }
}
