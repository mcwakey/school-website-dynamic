<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Site Information
            ['key' => 'site_name', 'value' => 'Royal Life Montessory School', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Nurturing Excellence, Building Futures', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'A leading primary school in Ghana committed to providing quality education', 'type' => 'text', 'group' => 'general'],

            // Contact Information
            ['key' => 'email', 'value' => 'info@royallifemontessori.com', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'phone', 'value' => '+233 243 20 9324', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'address', 'value' => 'Suame Kumasi, Ashanti Region, Ghana', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'office_hours', 'value' => 'Mon-Fri: 8:00 AM - 4:00 PM', 'type' => 'text', 'group' => 'contact'],

            // Social Media
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/#', 'type' => 'text', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/#', 'type' => 'text', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/#', 'type' => 'text', 'group' => 'social'],

            // Hero Section
            ['key' => 'hero_title', 'value' => 'Welcome to Royal Life Montesory School', 'type' => 'text', 'group' => 'homepage'],
            ['key' => 'hero_subtitle', 'value' => 'Where Young Minds Grow and Dreams Take Flight', 'type' => 'text', 'group' => 'homepage'],
            ['key' => 'hero_description', 'value' => 'We provide quality education that nurtures creativity, critical thinking, and character development in a safe and caring environment.', 'type' => 'text', 'group' => 'homepage'],

            // About Section
            ['key' => 'about_title', 'value' => 'About Our School', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_description', 'value' => 'Our school has been serving the community for over a decade, providing quality primary education that prepares students for secondary school and beyond.', 'type' => 'text', 'group' => 'about'],

            // Theme Settings
            ['key' => 'theme_primary_color', 'value' => '#E74C25', 'type' => 'color', 'group' => 'theme'],
            ['key' => 'theme_secondary_color', 'value' => '#2C5530', 'type' => 'color', 'group' => 'theme'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
