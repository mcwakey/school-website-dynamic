<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(5, true),
            'excerpt' => $this->faker->paragraph(),
            'image' => null,
            'status' => $this->faker->randomElement(['draft', 'published']),
            'author_id' => \App\Models\User::factory(),
            'published_at' => $this->faker->dateTimeBetween('-1 month', '+1 week'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
