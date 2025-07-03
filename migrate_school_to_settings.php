<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\School;
use App\Models\Setting;

echo "Migrating School data to Settings...\n";

try {
    $school = School::first();

    if ($school) {
        // Create school-related settings
        $schoolSettings = [
            'school_name' => $school->name,
            'school_description' => $school->description,
            'school_address' => $school->address,
            'school_phone' => $school->phone,
            'school_email' => $school->email,
            'school_website' => $school->website,
            'school_logo' => $school->logo,
            'school_principal_name' => $school->principal_name,
            'school_mission' => $school->mission,
            'school_vision' => $school->vision,
            'school_established_year' => $school->established_year,
            'school_social_media' => json_encode($school->social_media),
            'school_is_active' => $school->is_active ? 'true' : 'false'
        ];

        foreach ($schoolSettings as $key => $value) {
            if ($value !== null) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    [
                        'value' => $value,
                        'type' => ($key === 'school_social_media') ? 'json' :
                                 (($key === 'school_established_year') ? 'integer' :
                                 (($key === 'school_is_active') ? 'boolean' : 'text')),
                        'group' => 'school',
                        'description' => ucwords(str_replace(['school_', '_'], ['', ' '], $key))
                    ]
                );
                echo "Created setting: $key = $value\n";
            }
        }

        echo "School data successfully migrated to Settings!\n";
    } else {
        echo "No school data found to migrate.\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
