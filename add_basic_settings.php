<?php

// Test script to add basic settings
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Setting;

echo "Adding basic settings to database...\n";

$defaultSettings = [
    'site_name' => 'Ghana Excellence Primary School',
    'site_tagline' => 'Excellence in Education',
    'site_description' => 'A leading primary school in Ghana committed to providing quality education and nurturing young minds for a brighter future.',
    'meta_keywords' => 'primary school, education, Ghana, excellence',
    'email' => 'info@ghanaexcellenceschool.edu.gh',
    'phone' => '+233 24 123 4567',
    'address' => 'Accra, Ghana',
    'facebook_url' => 'https://facebook.com/ghanaexcellenceschool',
    'twitter_url' => 'https://twitter.com/excellence_gh',
    'instagram_url' => 'https://instagram.com/ghanaexcellenceschool',
    'meta_description' => 'Ghana Excellence Primary School - Providing quality education and nurturing young minds for a brighter future in Accra, Ghana.',
    'google_analytics' => '',
];

foreach ($defaultSettings as $key => $value) {
    $setting = Setting::updateOrCreate(
        ['key' => $key],
        ['value' => $value, 'group' => 'general', 'type' => 'text']
    );
    echo "✓ {$key}: {$value}\n";
}

echo "\nAll settings added successfully!\n";
