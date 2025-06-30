<?php

namespace Tests\Feature;

use App\Models\News;
use App\Models\Event;
use App\Models\Staff;
use App\Models\HeroSlide;
use App\Models\CoreValue;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicWebsiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create some sample data
        $this->createSampleData();
    }

    private function createSampleData()
    {
        // Create core values
        CoreValue::factory()->create([
            'title' => 'Excellence',
            'description' => 'We strive for excellence',
            'is_active' => true,
            'sort_order' => 1
        ]);

        // Create news
        News::factory()->create([
            'title' => 'School Reopening',
            'status' => 'published',
            'published_at' => now()
        ]);

        // Create events
        Event::factory()->create([
            'title' => 'Sports Day',
            'status' => 'published',
            'start_date' => now()->addDays(5)
        ]);

        // Create staff
        Staff::factory()->create([
            'name' => 'John Smith',
            'position' => 'Principal',
            'status' => 'active',
            'is_featured' => true
        ]);

        // Create hero slide
        HeroSlide::factory()->create([
            'title' => 'Welcome to Our School',
            'is_active' => true,
            'sort_order' => 1
        ]);
    }

    /** @test */
    public function homepage_loads_successfully()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Ghana Primary School');
    }

    /** @test */
    public function homepage_displays_hero_slides()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Welcome to Our School');
    }

    /** @test */
    public function about_page_loads_successfully()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('About Us');
    }

    /** @test */
    public function about_page_displays_core_values()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('Excellence');
        $response->assertSee('We strive for excellence');
    }

    /** @test */
    public function academics_page_loads_successfully()
    {
        $response = $this->get('/academics');

        $response->assertStatus(200);
        $response->assertSee('Academic Programs');
    }

    /** @test */
    public function news_page_loads_successfully()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
        $response->assertSee('News & Announcements');
    }

    /** @test */
    public function news_page_displays_published_news()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
        $response->assertSee('School Reopening');
    }

    /** @test */
    public function events_page_loads_successfully()
    {
        $response = $this->get('/events');

        $response->assertStatus(200);
        $response->assertSee('Events');
    }

    /** @test */
    public function events_page_displays_published_events()
    {
        $response = $this->get('/events');

        $response->assertStatus(200);
        $response->assertSee('Sports Day');
    }

    /** @test */
    public function gallery_page_loads_successfully()
    {
        $response = $this->get('/gallery');

        $response->assertStatus(200);
        $response->assertSee('Photo Gallery');
    }

    /** @test */
    public function staff_page_loads_successfully()
    {
        $response = $this->get('/staff');

        $response->assertStatus(200);
        $response->assertSee('Our Staff');
    }

    /** @test */
    public function staff_page_displays_active_staff()
    {
        $response = $this->get('/staff');

        $response->assertStatus(200);
        $response->assertSee('John Smith');
        $response->assertSee('Principal');
    }

    /** @test */
    public function contact_page_loads_successfully()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Contact Us');
    }

    /** @test */
    public function documents_page_loads_successfully()
    {
        $response = $this->get('/documents');

        $response->assertStatus(200);
        $response->assertSee('Documents & Resources');
    }

    /** @test */
    public function search_functionality_works()
    {
        $response = $this->get('/search?q=School');

        $response->assertStatus(200);
        $response->assertSee('Search Results');
    }

    /** @test */
    public function individual_news_article_loads()
    {
        $news = News::where('status', 'published')->first();

        $response = $this->get("/news/{$news->id}");

        $response->assertStatus(200);
        $response->assertSee($news->title);
    }

    /** @test */
    public function individual_event_loads()
    {
        $event = Event::where('status', 'published')->first();

        $response = $this->get("/events/{$event->id}");

        $response->assertStatus(200);
        $response->assertSee($event->title);
    }

    /** @test */
    public function contact_form_submission_works()
    {
        $contactData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Inquiry',
            'message' => 'Hello, I would like to know more about the school.'
        ];

        $response = $this->post('/contact', $contactData);

        $response->assertRedirect();
        $response->assertSessionHas('success');
    }

    /** @test */
    public function navigation_links_work()
    {
        $pages = ['/', '/about', '/academics', '/news', '/events', '/gallery', '/staff', '/contact', '/documents'];

        foreach ($pages as $page) {
            $response = $this->get($page);
            $response->assertStatus(200);
        }
    }
}
