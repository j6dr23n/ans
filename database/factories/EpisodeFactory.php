<?php

namespace Database\Factories;

use App\Models\Anime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Episode>
 */
class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'animes_id' => Anime::factory(),
            'drive' => $this->faker->randomElement(['gdrive','mediafire','terabox','onedrive','meganz','datbu']),
            'epi_number' => $this->faker->randomDigit(),
            'epi_link' => $this->faker->url(),
            'resolution' => $this->faker->randomElement(['480p','720p','1080p']),
        ];
    }
}
