<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\HomeController;

// Main Website Routes
Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/home', function () {
    return redirect()->route('home');
})->name('home.redirect');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/news', [WebsiteController::class, 'news'])->name('news');
Route::get('/news/{slug}', [WebsiteController::class, 'newsShow'])->name('news.show');
Route::get('/events', [WebsiteController::class, 'events'])->name('events');
Route::get('/events/{slug}', [WebsiteController::class, 'eventShow'])->name('events.show');
Route::get('/gallery', [WebsiteController::class, 'gallery'])->name('gallery');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::post('/contact', [WebsiteController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/programs', [WebsiteController::class, 'programs'])->name('programs');
Route::get('/search', [WebsiteController::class, 'search'])->name('search');
Route::get('/documents', [WebsiteController::class, 'documents'])->name('documents');
Route::get('/documents/{document}/download', [WebsiteController::class, 'downloadDocument'])->name('documents.download');

// Debug route
Route::get('/debug-slides', function() {
    $slides = App\Models\HeroSlide::active()->ordered()->get();

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

// Authentication Routes
Auth::routes();

// Authenticated User Dashboard
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

// Admin Routes (Protected by AdminMiddleware)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('news', App\Http\Controllers\Admin\NewsController::class);
    Route::resource('events', App\Http\Controllers\Admin\EventController::class);
    Route::resource('gallery', App\Http\Controllers\Admin\GalleryController::class);
    Route::resource('staff', App\Http\Controllers\Admin\StaffController::class);
    Route::resource('documents', App\Http\Controllers\Admin\DocumentController::class);
    Route::resource('hero-slides', App\Http\Controllers\Admin\HeroSlideController::class);
    Route::resource('core-values', App\Http\Controllers\Admin\CoreValueController::class);
    Route::resource('about-sections', App\Http\Controllers\Admin\AboutSectionController::class);
    Route::resource('academic-programs', App\Http\Controllers\Admin\AcademicProgramController::class);

    // Advanced Customization Routes
    Route::resource('page-contents', App\Http\Controllers\Admin\PageContentController::class);
    Route::resource('menus', App\Http\Controllers\Admin\MenuController::class);
    Route::post('/menus/reorder', [App\Http\Controllers\Admin\MenuController::class, 'reorder'])->name('menus.reorder');

    // Theme Customization
    Route::get('/theme', [App\Http\Controllers\Admin\ThemeController::class, 'index'])->name('theme.index');
    Route::post('/theme', [App\Http\Controllers\Admin\ThemeController::class, 'update'])->name('theme.update');
    Route::post('/theme/reset', [App\Http\Controllers\Admin\ThemeController::class, 'reset'])->name('theme.reset');

    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');

    // Admin Manual Route
    Route::get('/manual', function () {
        return view('admin.manual');
    })->name('manual');

    // Document download route
    Route::get('/documents/{document}/download', [App\Http\Controllers\Admin\DocumentController::class, 'download'])->name('documents.download');
});
