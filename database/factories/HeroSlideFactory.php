<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeroSlide>
 */
class HeroSlideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'image_path' => null,
            'button_text' => $this->faker->randomElement(['Learn More', 'Get Started', 'Explore', 'Read More']),
            'button_link' => $this->faker->randomElement(['/about', '/academics', '/contact', '/news']),
            'sort_order' => $this->faker->numberBetween(1, 10),
            'is_active' => $this->faker->boolean(80), // 80% chance of being active
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
