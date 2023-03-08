<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'info' => $this->faker->sentence(15),
            'poster' => $this->faker->imageUrl(2000,3000),
            'fb' => $this->faker->url(),
            'tele' => $this->faker->phoneNumber(),
            'email' => $this->faker->email()
        ];
    }
}
