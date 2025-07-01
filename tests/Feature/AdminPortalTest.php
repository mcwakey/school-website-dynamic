<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\News;
use App\Models\Event;
use App\Models\Staff;
use App\Models\HeroSlide;
use App\Models\CoreValue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPortalTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        // Create an admin user
        $this->adminUser = User::factory()->create([
            'email' => 'admin@test.com',
            'is_admin' => true
        ]);
    }

    /** @test */
    public function admin_can_access_dashboard()
    {
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Admin Dashboard');
    }

    /** @test */
    public function admin_can_manage_news()
    {
        // Test news index
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/news');
        $response->assertStatus(200);

        // Test news creation
        $newsData = [
            'title' => 'Test News Article',
            'content' => 'This is a test news content.',
            'excerpt' => 'Test excerpt',
            'status' => 'published',
            'published_at' => now(),
            'author_id' => $this->adminUser->id
        ];

        $response = $this->actingAs($this->adminUser)
            ->post('/admin/news', $newsData);
        $response->assertRedirect();

        $this->assertDatabaseHas('news', ['title' => 'Test News Article']);
    }

    /** @test */
    public function admin_can_manage_events()
    {
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/events');
        $response->assertStatus(200);

        $eventData = [
            'title' => 'Test Event',
            'description' => 'Test event description',
            'start_date' => now()->addDays(7)->format('Y-m-d'),
            'start_time' => '10:00',
            'location' => 'School Hall',
            'status' => 'published'
        ];

        $response = $this->actingAs($this->adminUser)
            ->post('/admin/events', $eventData);
        $response->assertRedirect();

        $this->assertDatabaseHas('events', ['title' => 'Test Event']);
    }

    /** @test */
    public function admin_can_manage_staff()
    {
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/staff');
        $response->assertStatus(200);

        $staffData = [
            'name' => 'John Doe',
            'position' => 'Math Teacher',
            'department' => 'Mathematics',
            'email' => 'john@school.com',
            'phone' => '123-456-7890',
            'bio' => 'Experienced math teacher',
            'status' => 'active'
        ];

        $response = $this->actingAs($this->adminUser)
            ->post('/admin/staff', $staffData);
        $response->assertRedirect();

        $this->assertDatabaseHas('staff', ['name' => 'John Doe']);
    }

    /** @test */
    public function admin_can_manage_hero_slides()
    {
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/hero-slides');
        $response->assertStatus(200);

        $slideData = [
            'title' => 'Welcome to Our School',
            'description' => 'Quality education for all',
            'button_text' => 'Learn More',
            'button_link' => '/about',
            'sort_order' => 1,
            'is_active' => true
        ];

        $response = $this->actingAs($this->adminUser)
            ->post('/admin/hero-slides', $slideData);
        $response->assertRedirect();

        $this->assertDatabaseHas('hero_slides', ['title' => 'Welcome to Our School']);
    }

    /** @test */
    public function admin_can_manage_core_values()
    {
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/core-values');
        $response->assertStatus(200);

        $coreValueData = [
            'title' => 'Excellence',
            'description' => 'We strive for excellence in all we do',
            'icon' => 'fas fa-star',
            'is_active' => true,
            'sort_order' => 1
        ];

        $response = $this->actingAs($this->adminUser)
            ->post('/admin/core-values', $coreValueData);
        $response->assertRedirect();

        $this->assertDatabaseHas('core_values', ['title' => 'Excellence']);
    }

    /** @test */
    public function admin_can_access_settings()
    {
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/settings');
        $response->assertStatus(200);
        $response->assertSee('Website Settings');
    }

    /** @test */
    public function admin_can_manage_gallery()
    {
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/gallery');
        $response->assertStatus(200);
    }

    /** @test */
    public function admin_can_manage_documents()
    {
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/documents');
        $response->assertStatus(200);
    }

    /** @test */
    public function non_admin_cannot_access_admin_routes()
    {
        $regularUser = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($regularUser)
            ->get('/admin/dashboard');
        $response->assertStatus(403);
    }

    /** @test */
    public function guest_cannot_access_admin_routes()
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/login');
    }
}
