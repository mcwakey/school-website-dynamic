<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\PageContent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PageContentManagementTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Create an admin user
        $this->admin = User::factory()->create([
            'email' => 'admin@test.com',
            'is_admin' => true,
        ]);

        // Fake storage for file uploads
        Storage::fake('public');
    }

    /** @test */
    public function admin_can_view_page_contents_index()
    {
        PageContent::factory()->create([
            'page' => 'home',
            'section' => 'hero',
            'key' => 'hero_title',
            'title' => 'Welcome to Our School',
            'content' => 'Excellence in education',
        ]);

        $response = $this->actingAs($this->admin)
                        ->get(route('admin.page-contents.index'));

        $response->assertStatus(200);
        $response->assertSee('Manage Page Contents');
        // Just check that the page loads correctly with the main elements
        $response->assertSee('Add New Content');
    }

    /** @test */
    public function admin_can_create_page_content()
    {
        $contentData = [
            'page' => 'home',
            'section' => 'hero',
            'key' => 'hero_title',
            'title' => 'Welcome Message',
            'content' => '<h1>Welcome to Ghana Primary School</h1><p>Excellence in education for all.</p>',
            'metadata' => json_encode(['button_text' => 'Learn More', 'button_url' => '/about']),
            'sort_order' => 1,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->admin)
                        ->post(route('admin.page-contents.store'), $contentData);

        $response->assertRedirect(route('admin.page-contents.index'));
        $response->assertSessionHas('success', 'Page content created successfully!');

        $this->assertDatabaseHas('page_contents', [
            'page' => 'home',
            'section' => 'hero',
            'key' => 'hero_title',
            'title' => 'Welcome Message',
            'is_active' => true,
        ]);
    }

    /** @test */
    public function admin_can_view_page_content_creation_form()
    {
        $response = $this->actingAs($this->admin)
                        ->get(route('admin.page-contents.create'));

        $response->assertStatus(200);
        $response->assertSee('Create Page Content');
        $response->assertSee('Content Key');
        $response->assertSee('Home');
        $response->assertSee('Hero');
    }

    /** @test */
    public function admin_can_edit_page_content()
    {
        $content = PageContent::factory()->create([
            'page' => 'home',
            'section' => 'hero',
            'key' => 'hero_title',
            'title' => 'Original Title',
            'content' => 'Original content',
        ]);

        $updatedData = [
            'page' => 'home',
            'section' => 'hero',
            'key' => 'hero_title',
            'title' => 'Updated Title',
            'content' => '<h1>Updated content</h1>',
            'metadata' => json_encode(['updated' => true]),
            'sort_order' => 2,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->admin)
                        ->put(route('admin.page-contents.update', $content), $updatedData);

        $response->assertRedirect(route('admin.page-contents.index'));
        $response->assertSessionHas('success', 'Page content updated successfully!');

        $this->assertDatabaseHas('page_contents', [
            'id' => $content->id,
            'title' => 'Updated Title',
            'content' => '<h1>Updated content</h1>',
        ]);
    }

    /** @test */
    public function admin_can_view_page_content_details()
    {
        $content = PageContent::factory()->create([
            'page' => 'about',
            'section' => 'mission',
            'key' => 'mission_statement',
            'title' => 'Our Mission',
            'content' => 'To provide quality education',
            'metadata' => ['priority' => 'high'],
        ]);

        $response = $this->actingAs($this->admin)
                        ->get(route('admin.page-contents.show', $content));

        $response->assertStatus(200);
        $response->assertSee('Page Content Details');
        $response->assertSee('Our Mission');
        $response->assertSee('To provide quality education');
        $response->assertSee('mission_statement');
        $response->assertSee('About');
    }

    /** @test */
    public function admin_can_delete_page_content()
    {
        $content = PageContent::factory()->create([
            'key' => 'test_content',
            'title' => 'Test Content',
        ]);

        $response = $this->actingAs($this->admin)
                        ->delete(route('admin.page-contents.destroy', $content));

        $response->assertRedirect(route('admin.page-contents.index'));
        $response->assertSessionHas('success', 'Page content deleted successfully!');

        $this->assertDatabaseMissing('page_contents', [
            'id' => $content->id,
        ]);
    }

    /** @test */
    public function admin_can_upload_image_with_content()
    {
        $file = UploadedFile::fake()->image('test-image.jpg', 800, 600);

        $contentData = [
            'page' => 'home',
            'section' => 'gallery',
            'key' => 'featured_image',
            'title' => 'Featured Image',
            'content' => 'This is our featured image',
            'image' => $file,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->admin)
                        ->post(route('admin.page-contents.store'), $contentData);

        $response->assertRedirect(route('admin.page-contents.index'));

        $content = PageContent::where('key', 'featured_image')->first();
        $this->assertNotNull($content->image);

        // Check that file was stored
        Storage::disk('public')->assertExists($content->image);
    }

    /** @test */
    public function page_content_validation_works()
    {
        // Test missing required fields
        $response = $this->actingAs($this->admin)
                        ->post(route('admin.page-contents.store'), []);

        $response->assertSessionHasErrors(['page', 'section', 'key']);

        // Test duplicate key
        PageContent::factory()->create(['key' => 'duplicate_key']);

        $response = $this->actingAs($this->admin)
                        ->post(route('admin.page-contents.store'), [
                            'page' => 'home',
                            'section' => 'hero',
                            'key' => 'duplicate_key',
                            'title' => 'Test',
                            'content' => 'Test content',
                        ]);

        $response->assertSessionHasErrors(['key']);
    }

    /** @test */
    public function content_creation_with_url_parameters_works()
    {
        $response = $this->actingAs($this->admin)
                        ->get(route('admin.page-contents.create', [
                            'page' => 'about',
                            'section' => 'team'
                        ]));

        $response->assertStatus(200);
        $response->assertSee('Create Page Content');
        // The form should pre-select the page and section from URL parameters
    }

    /** @test */
    public function admin_can_manage_json_metadata()
    {
        $metadata = [
            'button_text' => 'Contact Us',
            'button_url' => '/contact',
            'background_color' => '#ffffff',
            'text_align' => 'center'
        ];

        $contentData = [
            'page' => 'home',
            'section' => 'call_to_action',
            'key' => 'cta_section',
            'title' => 'Get In Touch',
            'content' => 'Ready to learn more about our school?',
            'metadata' => json_encode($metadata),
            'is_active' => true,
        ];

        $response = $this->actingAs($this->admin)
                        ->post(route('admin.page-contents.store'), $contentData);

        $response->assertRedirect(route('admin.page-contents.index'));

        $content = PageContent::where('key', 'cta_section')->first();
        $this->assertEquals($metadata, $content->metadata);
    }

    /** @test */
    public function image_is_deleted_when_content_is_deleted()
    {
        $file = UploadedFile::fake()->image('test-delete.jpg');

        $content = PageContent::factory()->create([
            'key' => 'test_with_image',
            'image' => 'page-contents/test-delete.jpg'
        ]);

        // Simulate the file existing
        Storage::disk('public')->put($content->image, $file->getContent());
        Storage::disk('public')->assertExists($content->image);

        $response = $this->actingAs($this->admin)
                        ->delete(route('admin.page-contents.destroy', $content));

        $response->assertRedirect(route('admin.page-contents.index'));

        // Image should be deleted with content
        Storage::disk('public')->assertMissing($content->image);
    }

    /** @test */
    public function non_admin_cannot_access_page_content_management()
    {
        $regularUser = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($regularUser)
                        ->get(route('admin.page-contents.index'));

        $response->assertStatus(403);
    }
}
