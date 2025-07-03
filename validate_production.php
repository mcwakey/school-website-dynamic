#!/usr/bin/env php
<?php

/**
 * Final Production Validation Script
 * Verifies that all critical components are working correctly
 */

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== GHANA PRIMARY SCHOOL WEBSITE ===\n";
echo "=== FINAL PRODUCTION VALIDATION  ===\n\n";

$checks = [];

// Check if assets are built
$manifestPath = public_path('build/manifest.json');
$checks['Vite Assets Built'] = file_exists($manifestPath);

// Check if manifest is valid JSON
if ($checks['Vite Assets Built']) {
    $manifest = json_decode(file_get_contents($manifestPath), true);
    $checks['Asset Manifest Valid'] = is_array($manifest) && isset($manifest['resources/js/app.js']);
} else {
    $checks['Asset Manifest Valid'] = false;
}

// Check if CSS and JS files exist
$checks['CSS Bundle Exists'] = false;
$checks['JS Bundle Exists'] = false;

if ($checks['Asset Manifest Valid']) {
    $manifest = json_decode(file_get_contents($manifestPath), true);

    if (isset($manifest['resources/sass/app.scss']['file'])) {
        $cssPath = public_path('build/' . $manifest['resources/sass/app.scss']['file']);
        $checks['CSS Bundle Exists'] = file_exists($cssPath);
    }

    if (isset($manifest['resources/js/app.js']['file'])) {
        $jsPath = public_path('build/' . $manifest['resources/js/app.js']['file']);
        $checks['JS Bundle Exists'] = file_exists($jsPath);
    }
}

// Check database connection
try {
    DB::connection()->getPdo();
    $checks['Database Connection'] = true;
} catch (Exception $e) {
    $checks['Database Connection'] = false;
}

// Check if settings exist
try {
    $settingsCount = DB::table('settings')->count();
    $checks['Settings Data'] = $settingsCount > 0;
} catch (Exception $e) {
    $checks['Settings Data'] = false;
}

// Check if storage link exists (Windows-compatible)
$storageLinkPath = public_path('storage');
$targetPath = storage_path('app/public');
$checks['Storage Link'] = file_exists($storageLinkPath) && file_exists($targetPath);

// Check if .htaccess exists
$checks['.htaccess File'] = file_exists(public_path('.htaccess'));

// Check critical directories
$checks['Storage Writable'] = is_writable(storage_path());
$checks['Bootstrap Cache Writable'] = is_writable(base_path('bootstrap/cache'));

// Display results
echo "VALIDATION RESULTS:\n";
echo str_repeat("=", 50) . "\n";

$passed = 0;
$total = count($checks);

foreach ($checks as $check => $status) {
    $icon = $status ? '✅' : '❌';
    $statusText = $status ? 'PASS' : 'FAIL';
    echo sprintf("%-25s %s %s\n", $check, $icon, $statusText);
    if ($status) $passed++;
}

echo str_repeat("=", 50) . "\n";
echo sprintf("OVERALL RESULT: %d/%d checks passed\n", $passed, $total);

if ($passed === $total) {
    echo "\n🎉 ALL CHECKS PASSED! 🎉\n";
    echo "The website is READY FOR PRODUCTION!\n\n";
    echo "Next steps:\n";
    echo "1. Deploy to production server\n";
    echo "2. Set production environment variables\n";
    echo "3. Run final testing on live site\n";
    echo "4. Update DNS if needed\n";
} else {
    echo "\n⚠️  Some checks failed. Please review:\n";

    foreach ($checks as $check => $status) {
        if (!$status) {
            echo "- $check\n";
        }
    }

    echo "\nRefer to PRODUCTION_DEPLOYMENT.md for troubleshooting.\n";
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "Validation completed at " . date('Y-m-d H:i:s') . "\n";
