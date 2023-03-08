<?php

namespace Database\Factories;

use App\Models\Anime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AnimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'type' => $this->faker->randomElement(['anime','movie','manga','hentai']),
            'release_year' => $this->faker->date(),
            'condition' => $this->faker->randomElement(['ongoing','finished']),
            'season' => $this->faker->numberBetween(1,2),
            'genres' => $this->faker->word(),
            'sub_genres' => $this->faker->word(),
            'info' => $this->faker->text(),
            'poster' => $this->faker->imageUrl(),
            'age_rating' => $this->faker->randomDigit(),
            'rating' => $this->faker->randomDigit(),
            'featured' => $this->faker->randomElement(['on','off']),
        ];
    }
}
