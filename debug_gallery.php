<?php

// Simple debug script to check gallery data
require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== GALLERY DEBUG ===\n";

try {
    $galleries = App\Models\Gallery::take(5)->get();
    echo "Total gallery items: " . $galleries->count() . "\n\n";

    foreach ($galleries as $gallery) {
        echo "Title: " . $gallery->title . "\n";
        echo "Image Path: " . $gallery->image_path . "\n";
        echo "Storage file exists: " . (file_exists(storage_path('app/public/' . $gallery->image_path)) ? 'YES' : 'NO') . "\n";
        echo "Public file exists: " . (file_exists(public_path('storage/' . $gallery->image_path)) ? 'YES' : 'NO') . "\n";
        echo "Asset URL: " . asset('storage/' . $gallery->image_path) . "\n";
        echo "---\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
