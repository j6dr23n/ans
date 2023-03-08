<?php

namespace Database\Seeders;

use App\Models\Anime;
use App\Models\Anime\Drive;
use App\Models\Anime\Resolution;
use App\Models\Anime\Type;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Page;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Episode::factory()->count(200)->create();
        Genre::factory()->count(40)->create();
        Drive::factory()->count(10)->create();
        Resolution::factory()->count(10)->create();
        Page::factory()->count(50)->create();
        Type::factory()->count(30)->create();
    }
}
