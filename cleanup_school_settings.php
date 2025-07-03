<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Setting;

echo "Removing school-specific settings...\n";

$schoolKeys = [
    'school_name', 'school_description', 'school_address', 'school_phone',
    'school_email', 'school_website', 'school_logo', 'school_principal_name',
    'school_mission', 'school_vision', 'school_established_year',
    'school_social_media', 'school_is_active'
];

foreach($schoolKeys as $key) {
    $deleted = Setting::where('key', $key)->delete();
    if ($deleted > 0) {
        echo "Deleted setting: $key\n";
    }
}

echo "Cleanup complete!\n";
