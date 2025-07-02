<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\PageContent;
use Illuminate\Support\Facades\View;

class WebsiteIndexPageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the index page loads successfully and displays dynamic content.
     *
     * @return void
     */
    public function test_index_page_loads_and_displays_dynamic_content()
    {
        // Seed the database with necessary content
        $this->seed(\Database\Seeders\EnhancedSampleContentSeeder::class);

        // Add a view composer to dump the data being passed to the view
        View::composer('website.index', function ($view) {
            echo "\n\nDumping pageContent from test:\n";
            var_dump($view->getData()['pageContent']);
            echo "\n\n";
        });

        // Get the seeded content to verify against
        $featuresTitle = PageContent::where('key', 'features_title')->first();

        // Make a request to the homepage
        $response = $this->get(route('home'));

        // Assert the page loads successfully
        $response->assertStatus(200);

        // Assert that the dynamic content is present in the response
        $response->assertSee(e($featuresTitle->title));
        $response->assertSee(e($featuresTitle->content));

        // Check for a specific feature
        $feature1 = PageContent::where('key', 'feature_academic_excellence')->first();
        $response->assertSee(e($feature1->title));
        $response->assertSee(e($feature1->content));

        echo "\nWebsite index page test passed successfully!\n";
    }
}
