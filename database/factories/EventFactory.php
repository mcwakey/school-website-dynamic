<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-1 month', '+3 months');

        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(3, true),
            'start_date' => $startDate->format('Y-m-d'),
            'start_time' => $this->faker->time('H:i'),
            'end_date' => $startDate->format('Y-m-d'),
            'end_time' => $this->faker->time('H:i'),
            'location' => $this->faker->address(),
            'image' => null,
            'status' => $this->faker->randomElement(['draft', 'published']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
