<?php

namespace Database\Factories;

use App\Models\CustomMenu;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomMenuFactory extends Factory
{
    protected $model = CustomMenu::class;

    public function definition()
    {
        return [
            'location' => $this->faker->randomElement(['header', 'footer']),
            'name' => $this->faker->unique()->slug(2),
            'label' => $this->faker->words(2, true),
            'url' => '/' . $this->faker->slug(),
            'target' => $this->faker->randomElement(['_self', '_blank']),
            'icon' => 'fas fa-' . $this->faker->randomElement(['home', 'info', 'envelope', 'star', 'user']),
            'sort_order' => $this->faker->numberBetween(1, 100),
            'is_active' => $this->faker->boolean(80), // 80% chance of being active
            'parent_id' => null, // Default to no parent, can be overridden
        ];
    }

    /**
     * Indicate that the menu item is active.
     */
    public function active()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => true,
            ];
        });
    }

    /**
     * Indicate that the menu item is inactive.
     */
    public function inactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => false,
            ];
        });
    }

    /**
     * Indicate that the menu item is for header location.
     */
    public function header()
    {
        return $this->state(function (array $attributes) {
            return [
                'location' => 'header',
            ];
        });
    }

    /**
     * Indicate that the menu item is for footer location.
     */
    public function footer()
    {
        return $this->state(function (array $attributes) {
            return [
                'location' => 'footer',
            ];
        });
    }

    /**
     * Create a child menu item with a parent.
     */
    public function child($parentId = null)
    {
        return $this->state(function (array $attributes) use ($parentId) {
            return [
                'parent_id' => $parentId,
            ];
        });
    }
}
