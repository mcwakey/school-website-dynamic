<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;
use App\Models\ThemeSetting;
use App\Models\CustomMenu;
use App\Models\Setting;

class CustomizationSeeder extends Seeder
{
    public function run(): void
    {
        // Default Page Contents
        $pageContents = [
            // Homepage content
            [
                'page' => 'home',
                'section' => 'welcome',
                'key' => 'welcome_title',
                'title' => 'Welcome to Royal Life Montessori School',
                'content' => 'Providing quality education and nurturing young minds for a brighter future.',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'page' => 'home',
                'section' => 'mission',
                'key' => 'mission_statement',
                'title' => 'Our Mission',
                'content' => 'To provide excellent primary education that develops confident, creative, and responsible citizens who can contribute positively to society.',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'page' => 'home',
                'section' => 'features',
                'key' => 'feature_1',
                'title' => 'Quality Education',
                'content' => 'Experienced teachers delivering curriculum-based learning with modern teaching methods.',
                'metadata' => ['icon' => 'fas fa-graduation-cap'],
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'page' => 'home',
                'section' => 'features',
                'key' => 'feature_2',
                'title' => 'Safe Environment',
                'content' => 'Secure and nurturing environment where children can learn and grow confidently.',
                'metadata' => ['icon' => 'fas fa-shield-alt'],
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'page' => 'home',
                'section' => 'features',
                'key' => 'feature_3',
                'title' => 'Extracurricular Activities',
                'content' => 'Sports, arts, and cultural activities to develop well-rounded personalities.',
                'metadata' => ['icon' => 'fas fa-futbol'],
                'sort_order' => 3,
                'is_active' => true
            ],

            // About page content
            [
                'page' => 'about',
                'section' => 'history',
                'key' => 'history',
                'title' => 'Our History',
                'content' => 'Established in 1985, Ghana Primary School has been serving the community for over three decades, providing quality primary education to thousands of students.',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'page' => 'about',
                'section' => 'vision',
                'key' => 'vision',
                'title' => 'Our Vision',
                'content' => 'To be the leading primary school in Ghana, known for academic excellence, character development, and innovative teaching approaches.',
                'sort_order' => 1,
                'is_active' => true
            ],

            // Contact page content
            [
                'page' => 'contact',
                'section' => 'info',
                'key' => 'contact_intro',
                'title' => 'Get in Touch',
                'content' => 'We welcome inquiries from parents and guardians. Feel free to contact us for admissions, general information, or to schedule a school visit.',
                'sort_order' => 1,
                'is_active' => true
            ],

            // Footer content
            [
                'page' => 'footer',
                'section' => 'about',
                'key' => 'footer_about',
                'title' => 'About Ghana Primary School',
                'content' => 'Dedicated to providing quality primary education in a nurturing environment. Building tomorrow\'s leaders today.',
                'sort_order' => 1,
                'is_active' => true
            ]
        ];

        foreach ($pageContents as $content) {
            PageContent::updateOrCreate(
                ['page' => $content['page'], 'key' => $content['key']],
                $content
            );
        }

        // Default Theme Settings
        $themeSettings = [
            // Colors
            ['category' => 'colors', 'key' => 'primary_color', 'value' => '#667eea', 'type' => 'color', 'description' => 'Primary brand color'],
            ['category' => 'colors', 'key' => 'secondary_color', 'value' => '#764ba2', 'type' => 'color', 'description' => 'Secondary brand color'],
            ['category' => 'colors', 'key' => 'accent_color', 'value' => '#f093fb', 'type' => 'color', 'description' => 'Accent color for highlights'],
            ['category' => 'colors', 'key' => 'text_color', 'value' => '#333333', 'type' => 'color', 'description' => 'Main text color'],
            ['category' => 'colors', 'key' => 'background_color', 'value' => '#ffffff', 'type' => 'color', 'description' => 'Background color'],

            // Fonts
            ['category' => 'fonts', 'key' => 'header_font', 'value' => 'Nunito', 'type' => 'font', 'description' => 'Font family for headings'],
            ['category' => 'fonts', 'key' => 'body_font', 'value' => 'Nunito', 'type' => 'font', 'description' => 'Font family for body text'],
            ['category' => 'fonts', 'key' => 'font_size', 'value' => '16px', 'type' => 'text', 'description' => 'Base font size'],

            // Layout
            ['category' => 'layout', 'key' => 'container_width', 'value' => '1200px', 'type' => 'text', 'description' => 'Maximum container width'],
            ['category' => 'layout', 'key' => 'border_radius', 'value' => '8px', 'type' => 'text', 'description' => 'Default border radius'],

            // Advanced
            ['category' => 'advanced', 'key' => 'custom_css', 'value' => '', 'type' => 'textarea', 'description' => 'Custom CSS code'],
            ['category' => 'advanced', 'key' => 'custom_js', 'value' => '', 'type' => 'textarea', 'description' => 'Custom JavaScript code']
        ];

        foreach ($themeSettings as $setting) {
            ThemeSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        // Default Custom Menus
        $menus = [
            // Header Menu
            ['location' => 'header', 'name' => 'home', 'label' => 'Home', 'url' => '/', 'sort_order' => 1],
            ['location' => 'header', 'name' => 'about', 'label' => 'About Us', 'url' => '/about', 'sort_order' => 2],
            ['location' => 'header', 'name' => 'academics', 'label' => 'Academics', 'url' => '/academics', 'sort_order' => 3],
            ['location' => 'header', 'name' => 'news', 'label' => 'News', 'url' => '/news', 'sort_order' => 4],
            ['location' => 'header', 'name' => 'events', 'label' => 'Events', 'url' => '/events', 'sort_order' => 5],
            ['location' => 'header', 'name' => 'gallery', 'label' => 'Gallery', 'url' => '/gallery', 'sort_order' => 6],
            ['location' => 'header', 'name' => 'contact', 'label' => 'Contact', 'url' => '/contact', 'sort_order' => 7],

            // Footer Menu
            ['location' => 'footer', 'name' => 'privacy', 'label' => 'Privacy Policy', 'url' => '/privacy', 'sort_order' => 1],
            ['location' => 'footer', 'name' => 'terms', 'label' => 'Terms of Service', 'url' => '/terms', 'sort_order' => 2],
            ['location' => 'footer', 'name' => 'admissions', 'label' => 'Admissions', 'url' => '/admissions', 'sort_order' => 3],
            ['location' => 'footer', 'name' => 'careers', 'label' => 'Careers', 'url' => '/careers', 'sort_order' => 4]
        ];

        foreach ($menus as $menu) {
            CustomMenu::updateOrCreate(
                ['location' => $menu['location'], 'name' => $menu['name']],
                array_merge($menu, ['is_active' => true, 'target' => '_self'])
            );
        }

        // Enhanced Settings with categories
        $enhancedSettings = [
            // SEO Settings
            ['key' => 'meta_keywords', 'value' => 'primary school, education, Ghana, children, learning', 'category' => 'seo', 'type' => 'text'],
            ['key' => 'google_analytics', 'value' => '', 'category' => 'seo', 'type' => 'text'],

            // Contact Settings
            ['key' => 'office_hours', 'value' => 'Monday - Friday: 7:00 AM - 4:00 PM', 'category' => 'contact', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => 'info@ghanaprimaryschool.edu.gh', 'category' => 'contact', 'type' => 'email'],

            // Social Media
            ['key' => 'linkedin_url', 'value' => '', 'category' => 'social', 'type' => 'url'],

            // Advanced
            ['key' => 'maintenance_mode', 'value' => 'false', 'category' => 'advanced', 'type' => 'boolean'],
            ['key' => 'google_maps_api', 'value' => '', 'category' => 'advanced', 'type' => 'text']
        ];

        foreach ($enhancedSettings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
