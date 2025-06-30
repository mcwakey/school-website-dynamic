<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\CustomMenu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class MenuManagementTest extends TestCase
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
    }

    /** @test */
    public function admin_can_view_menu_index()
    {
        // Create some test menus
        CustomMenu::factory()->create([
            'location' => 'header',
            'label' => 'Test Header Menu',
            'url' => '/test',
            'is_active' => true,
        ]);

        CustomMenu::factory()->create([
            'location' => 'footer',
            'label' => 'Test Footer Menu',
            'url' => '/footer-test',
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)
                        ->get(route('admin.menus.index'));

        $response->assertStatus(200);
        $response->assertSee('Menu Management');
        $response->assertSee('Test Header Menu');
        $response->assertSee('Test Footer Menu');
        $response->assertSee('Header Navigation');
        $response->assertSee('Footer Navigation');
    }

    /** @test */
    public function admin_can_create_new_menu_item()
    {
        $menuData = [
            'location' => 'header',
            'name' => 'about_us',
            'label' => 'About Us',
            'url' => '/about',
            'target' => '_self',
            'icon' => 'fas fa-info-circle',
            'sort_order' => 2,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->admin)
                        ->post(route('admin.menus.store'), $menuData);

        $response->assertRedirect(route('admin.menus.index'));
        $response->assertSessionHas('success', 'Menu item created successfully!');

        $this->assertDatabaseHas('custom_menus', [
            'location' => 'header',
            'name' => 'about_us',
            'label' => 'About Us',
            'url' => '/about',
            'is_active' => true,
        ]);
    }

    /** @test */
    public function admin_can_view_menu_creation_form()
    {
        $response = $this->actingAs($this->admin)
                        ->get(route('admin.menus.create'));

        $response->assertStatus(200);
        $response->assertSee('Create Menu Item');
        $response->assertSee('Menu Location');
        $response->assertSee('Display Label');
        $response->assertSee('Header Menu');
        $response->assertSee('Footer Menu');
    }

    /** @test */
    public function admin_can_edit_menu_item()
    {
        $menu = CustomMenu::factory()->create([
            'location' => 'header',
            'name' => 'test_menu',
            'label' => 'Test Menu',
            'url' => '/test',
            'is_active' => true,
        ]);

        $updatedData = [
            'location' => 'header',
            'name' => 'updated_menu',
            'label' => 'Updated Menu',
            'url' => '/updated',
            'target' => '_self',
            'icon' => 'fas fa-star',
            'sort_order' => 5,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->admin)
                        ->put(route('admin.menus.update', $menu), $updatedData);

        $response->assertRedirect(route('admin.menus.index'));
        $response->assertSessionHas('success', 'Menu item updated successfully!');

        $this->assertDatabaseHas('custom_menus', [
            'id' => $menu->id,
            'name' => 'updated_menu',
            'label' => 'Updated Menu',
            'url' => '/updated',
        ]);
    }

    /** @test */
    public function admin_can_view_menu_item_details()
    {
        $menu = CustomMenu::factory()->create([
            'location' => 'header',
            'name' => 'test_menu',
            'label' => 'Test Menu',
            'url' => '/test',
            'icon' => 'fas fa-test',
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)
                        ->get(route('admin.menus.show', $menu));

        $response->assertStatus(200);
        $response->assertSee('Menu Item Details');
        $response->assertSee('Test Menu');
        $response->assertSee('/test');
        $response->assertSee('fas fa-test');
        $response->assertSee('Header Menu');
    }

    /** @test */
    public function admin_can_delete_menu_item()
    {
        $menu = CustomMenu::factory()->create([
            'location' => 'header',
            'name' => 'test_menu',
            'label' => 'Test Menu',
            'url' => '/test',
        ]);

        $response = $this->actingAs($this->admin)
                        ->delete(route('admin.menus.destroy', $menu));

        $response->assertRedirect(route('admin.menus.index'));
        $response->assertSessionHas('success', 'Menu item deleted successfully!');

        $this->assertDatabaseMissing('custom_menus', [
            'id' => $menu->id,
        ]);
    }

    /** @test */
    public function admin_can_create_child_menu_items()
    {
        $parentMenu = CustomMenu::factory()->create([
            'location' => 'header',
            'name' => 'services',
            'label' => 'Services',
            'url' => '/services',
            'parent_id' => null,
        ]);

        $childMenuData = [
            'location' => 'header',
            'name' => 'web_design',
            'label' => 'Web Design',
            'url' => '/services/web-design',
            'target' => '_self',
            'parent_id' => $parentMenu->id,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->admin)
                        ->post(route('admin.menus.store'), $childMenuData);

        $response->assertRedirect(route('admin.menus.index'));

        $this->assertDatabaseHas('custom_menus', [
            'name' => 'web_design',
            'label' => 'Web Design',
            'parent_id' => $parentMenu->id,
        ]);

        // Verify parent-child relationship
        $childMenu = CustomMenu::where('name', 'web_design')->first();
        $this->assertEquals($parentMenu->id, $childMenu->parent_id);
        $this->assertTrue($parentMenu->children->contains($childMenu));
    }

    /** @test */
    public function menu_validation_works_properly()
    {
        // Test missing required fields
        $response = $this->actingAs($this->admin)
                        ->post(route('admin.menus.store'), []);

        $response->assertSessionHasErrors(['location', 'name', 'label', 'url', 'target']);

        // Test invalid location
        $response = $this->actingAs($this->admin)
                        ->post(route('admin.menus.store'), [
                            'location' => 'invalid',
                            'name' => 'test',
                            'label' => 'Test',
                            'url' => '/test',
                            'target' => '_self',
                        ]);

        $response->assertSessionHasErrors(['location']);

        // Test invalid target
        $response = $this->actingAs($this->admin)
                        ->post(route('admin.menus.store'), [
                            'location' => 'header',
                            'name' => 'test',
                            'label' => 'Test',
                            'url' => '/test',
                            'target' => 'invalid',
                        ]);

        $response->assertSessionHasErrors(['target']);
    }

    /** @test */
    public function admin_can_reorder_menu_items()
    {
        $menu1 = CustomMenu::factory()->create(['sort_order' => 1]);
        $menu2 = CustomMenu::factory()->create(['sort_order' => 2]);

        $reorderData = [
            'items' => [
                ['id' => $menu1->id, 'sort_order' => 2],
                ['id' => $menu2->id, 'sort_order' => 1],
            ]
        ];

        $response = $this->actingAs($this->admin)
                        ->post(route('admin.menus.reorder'), $reorderData);

        $response->assertJson(['success' => true]);

        $this->assertDatabaseHas('custom_menus', [
            'id' => $menu1->id,
            'sort_order' => 2,
        ]);

        $this->assertDatabaseHas('custom_menus', [
            'id' => $menu2->id,
            'sort_order' => 1,
        ]);
    }

    /** @test */
    public function deleting_parent_menu_deletes_children()
    {
        $parentMenu = CustomMenu::factory()->create([
            'name' => 'parent',
            'label' => 'Parent Menu',
        ]);

        $childMenu = CustomMenu::factory()->create([
            'name' => 'child',
            'label' => 'Child Menu',
            'parent_id' => $parentMenu->id,
        ]);

        $response = $this->actingAs($this->admin)
                        ->delete(route('admin.menus.destroy', $parentMenu));

        $response->assertRedirect(route('admin.menus.index'));

        // Both parent and child should be deleted
        $this->assertDatabaseMissing('custom_menus', [
            'id' => $parentMenu->id,
        ]);

        $this->assertDatabaseMissing('custom_menus', [
            'id' => $childMenu->id,
        ]);
    }

    /** @test */
    public function quick_add_functionality_works()
    {
        // Simulate the quick add form submission
        $quickAddData = [
            'location' => 'header',
            'name' => 'home',
            'label' => 'Home',
            'url' => '/',
            'icon' => 'fas fa-home',
            'target' => '_self',
            'is_active' => '1',
            'sort_order' => '99',
        ];

        $response = $this->actingAs($this->admin)
                        ->post(route('admin.menus.store'), $quickAddData);

        $response->assertRedirect(route('admin.menus.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('custom_menus', [
            'name' => 'home',
            'label' => 'Home',
            'url' => '/',
            'icon' => 'fas fa-home',
            'location' => 'header',
            'is_active' => true,
        ]);
    }

    /** @test */
    public function non_admin_cannot_access_menu_management()
    {
        $regularUser = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($regularUser)
                        ->get(route('admin.menus.index'));

        $response->assertStatus(403);
    }

    /** @test */
    public function guest_cannot_access_menu_management()
    {
        $response = $this->get(route('admin.menus.index'));

        $response->assertRedirect(route('login'));
    }
}
