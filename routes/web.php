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
Route::get('/staff', [WebsiteController::class, 'staff'])->name('staff');
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

// Installation Helper Route
Route::get('/install', function() {
    // Check if already installed
    try {
        \Illuminate\Support\Facades\DB::connection()->getPdo();

        // Check if tables exist before querying them
        $tablesExist = \Illuminate\Support\Facades\Schema::hasTable('users');

        if ($tablesExist) {
            $userCount = \App\Models\User::count();
            $hasAdmin = \App\Models\User::where('is_admin', true)->exists();
            $existingAdmins = \App\Models\User::where('is_admin', true)->get();

            return view('install.index', [
                'isInstalled' => $userCount > 0,
                'hasAdmin' => $hasAdmin,
                'userCount' => $userCount,
                'existingAdmins' => $existingAdmins
            ]);
        } else {
            return view('install.index', [
                'isInstalled' => false,
                'hasAdmin' => false,
                'userCount' => 0,
                'existingAdmins' => []
            ]);
        }
    } catch (\Exception $e) {
        return view('install.index', [
            'isInstalled' => false,
            'hasAdmin' => false,
            'userCount' => 0,
            'existingAdmins' => [],
            'dbError' => $e->getMessage()
        ]);
    }
})->name('install');

// Installation Actions
Route::post('/install/check-requirements', function() {
    $requirements = [
        'PHP Version >= 8.1' => version_compare(PHP_VERSION, '8.1.0', '>='),
        'Laravel Framework' => class_exists('Illuminate\Foundation\Application'),
        'Composer Installed' => file_exists(base_path('vendor/autoload.php')),
        'Storage Writable' => is_writable(storage_path()),
        'Bootstrap Cache Writable' => is_writable(base_path('bootstrap/cache')),
        'Environment File' => file_exists(base_path('.env')),
        'Database Connection' => false, // Will check separately
    ];

    // Check database connection
    try {
        \Illuminate\Support\Facades\DB::connection()->getPdo();
        $requirements['Database Connection'] = true;
    } catch (Exception $e) {
        $requirements['Database Connection'] = false;
    }

    return response()->json($requirements);
})->name('install.check-requirements');

Route::post('/install/run-migrations', function() {
    try {
        // Check if this is a fresh installation or update
        $hasUsers = \Illuminate\Support\Facades\Schema::hasTable('users') && \App\Models\User::count() > 0;

        if ($hasUsers) {
            // Run only pending migrations for existing installation
            \Illuminate\Support\Facades\Artisan::call('migrate');
            return response()->json(['success' => true, 'message' => 'Database updated successfully (existing installation detected)']);
        } else {
            // Fresh installation - safe to use migrate:fresh
            \Illuminate\Support\Facades\Artisan::call('migrate:fresh');
            return response()->json(['success' => true, 'message' => 'Database migrated successfully (fresh installation)']);
        }
    } catch (Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
})->name('install.run-migrations');

Route::post('/install/seed-data', function() {
    try {
        \Illuminate\Support\Facades\Artisan::call('db:seed');
        return response()->json(['success' => true, 'message' => 'Sample data seeded successfully']);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
})->name('install.seed-data');

Route::post('/install/create-admin', function() {
    try {
        // Set proper headers for JSON response
        header('Content-Type: application/json');

        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => \Illuminate\Support\Facades\Hash::make($data['password']),
            'is_admin' => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Admin user created successfully',
            'user' => [
                'name' => $user->name,
                'email' => $user->email
            ]
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        $errors = [];
        foreach ($e->errors() as $field => $messages) {
            $errors[$field] = $messages;
        }
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $errors,
            'detailed_message' => implode('; ', array_map(function($field, $msgs) {
                return $field . ': ' . implode(', ', $msgs);
            }, array_keys($errors), $errors))
        ], 422);
    } catch (\Exception $e) {
        \Log::error('Admin creation error: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString(),
            'request_data' => request()->all()
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Server error: ' . $e->getMessage(),
            'error_type' => get_class($e)
        ], 500);
    }
})->name('install.create-admin');

// Additional install utilities
Route::post('/install/clear-cache', function() {
    try {
        \Illuminate\Support\Facades\Artisan::call('cache:clear');
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        \Illuminate\Support\Facades\Artisan::call('view:clear');
        \Illuminate\Support\Facades\Artisan::call('route:clear');

        return response()->json(['success' => true, 'message' => 'All caches cleared successfully']);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
})->name('install.clear-cache');

Route::post('/install/storage-link', function() {
    try {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        return response()->json(['success' => true, 'message' => 'Storage link created successfully']);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
})->name('install.storage-link');

Route::post('/install/optimize', function() {
    try {
        \Illuminate\Support\Facades\Artisan::call('optimize');
        return response()->json(['success' => true, 'message' => 'Application optimized successfully']);
    } catch (Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
})->name('install.optimize');

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
