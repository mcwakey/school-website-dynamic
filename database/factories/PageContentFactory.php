<?php

namespace Database\Factories;

use App\Models\PageContent;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageContentFactory extends Factory
{
    protected $model = PageContent::class;

    public function definition()
    {
        $pages = ['home', 'about', 'contact', 'news', 'events', 'gallery'];
        $sections = ['hero', 'welcome', 'mission', 'vision', 'features', 'testimonials', 'footer'];

        return [
            'page' => $this->faker->randomElement($pages),
            'section' => $this->faker->randomElement($sections),
            'key' => $this->faker->unique()->slug(3, '_'),
            'title' => $this->faker->sentence(4),
            'content' => $this->faker->paragraphs(2, true),
            'image' => null,
            'metadata' => $this->faker->randomElement([
                null,
                ['icon' => 'fas fa-star'],
                ['button_text' => 'Learn More', 'button_url' => '/about'],
                ['priority' => 'high', 'featured' => true]
            ]),
            'sort_order' => $this->faker->numberBetween(0, 100),
            'is_active' => $this->faker->boolean(85), // 85% chance of being active
        ];
    }

    /**
     * Indicate that the content is active.
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
     * Indicate that the content is inactive.
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
     * Indicate that the content is for the home page.
     */
    public function forHomePage()
    {
        return $this->state(function (array $attributes) {
            return [
                'page' => 'home',
            ];
        });
    }

    /**
     * Indicate that the content is for the about page.
     */
    public function forAboutPage()
    {
        return $this->state(function (array $attributes) {
            return [
                'page' => 'about',
            ];
        });
    }

    /**
     * Indicate that the content is for the hero section.
     */
    public function heroSection()
    {
        return $this->state(function (array $attributes) {
            return [
                'section' => 'hero',
                'sort_order' => 0,
            ];
        });
    }

    /**
     * Create content with an image.
     */
    public function withImage()
    {
        return $this->state(function (array $attributes) {
            return [
                'image' => 'page-contents/' . $this->faker->uuid . '.jpg',
            ];
        });
    }

    /**
     * Create content with metadata.
     */
    public function withMetadata(array $metadata = null)
    {
        $defaultMetadata = [
            'featured' => true,
            'icon' => 'fas fa-star',
            'button_text' => 'Learn More'
        ];

        return $this->state(function (array $attributes) use ($metadata, $defaultMetadata) {
            return [
                'metadata' => $metadata ?: $defaultMetadata,
            ];
        });
    }
}
