<?php

use Illuminate\Support\Facades\Route;
use App\Models\HeroSlide;

Route::get('/debug-slides', function() {
    $slides = HeroSlide::active()->ordered()->get();

    echo "<h1>Hero Slides Debug</h1>";
    echo "<p>Total active slides: " . $slides->count() . "</p>";

    foreach($slides as $index => $slide) {
        echo "<div style='border: 1px solid #ccc; margin: 10px; padding: 10px;'>";
        echo "<h3>Slide " . ($index + 1) . " (ID: {$slide->id})</h3>";
        echo "<p><strong>Title:</strong> {$slide->title}</p>";
        echo "<p><strong>Subtitle:</strong> {$slide->subtitle}</p>";
        echo "<p><strong>Description:</strong> {$slide->description}</p>";
        echo "<p><strong>Image:</strong> {$slide->image_path}</p>";
        echo "<p><strong>Button Text:</strong> {$slide->button_text}</p>";
        echo "<p><strong>Button Link:</strong> {$slide->button_link}</p>";
        echo "<p><strong>Order:</strong> {$slide->sort_order}</p>";
        echo "<p><strong>Active:</strong> " . ($slide->is_active ? 'Yes' : 'No') . "</p>";
        echo "</div>";
    }
});
