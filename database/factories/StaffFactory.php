<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'position' => $this->faker->jobTitle(),
            'department' => $this->faker->randomElement(['Administration', 'Mathematics', 'Science', 'English', 'Social Studies', 'Physical Education', 'Arts']),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'bio' => $this->faker->paragraphs(2, true),
            'photo' => null,
            'qualifications' => $this->faker->sentence(),
            'experience_years' => $this->faker->numberBetween(1, 30),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'is_featured' => $this->faker->boolean(20), // 20% chance of being featured
            'sort_order' => $this->faker->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
