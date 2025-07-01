<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CoreValue>
 */
class CoreValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement(['Excellence', 'Integrity', 'Innovation', 'Respect', 'Responsibility', 'Collaboration']),
            'description' => $this->faker->paragraph(),
            'icon' => $this->faker->randomElement(['fas fa-star', 'fas fa-heart', 'fas fa-lightbulb', 'fas fa-handshake', 'fas fa-shield-alt', 'fas fa-users']),
            'is_active' => $this->faker->boolean(90), // 90% chance of being active
            'sort_order' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
