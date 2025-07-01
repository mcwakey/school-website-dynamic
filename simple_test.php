<?php

// Simple test script to check if basic functionality works

echo "=== Ghana Primary School - Basic Test ===\n";

// Test 1: Check if database is accessible
try {
    require_once 'vendor/autoload.php';

    $app = require_once 'bootstrap/app.php';

    // Boot the application
    $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

    echo "✓ Application bootstrap successful\n";

    // Test database connection
    $pdo = DB::connection()->getPdo();
    echo "✓ Database connection successful\n";

    // Test if users table exists and has admin users
    $adminCount = DB::table('users')->where('is_admin', true)->count();
    echo "✓ Admin users found: $adminCount\n";

    // Test if basic tables exist
    $tables = ['users', 'schools', 'settings', 'news', 'events', 'gallery', 'staff'];
    foreach ($tables as $table) {
        if (Schema::hasTable($table)) {
            echo "✓ Table '$table' exists\n";
        } else {
            echo "✗ Table '$table' missing\n";
        }
    }

    echo "\n=== Test Results ===\n";
    echo "Basic functionality appears to be working!\n";
    echo "You can now access:\n";
    echo "- Homepage: http://localhost:8000/\n";
    echo "- Admin Login: http://localhost:8000/login\n";
    echo "- Installation Helper: http://localhost:8000/install\n";

} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "Please check your configuration and try again.\n";
}
