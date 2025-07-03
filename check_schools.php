<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\School;

echo "Schools table data:\n";
try {
    $schools = School::all();
    if ($schools->count() > 0) {
        foreach($schools as $school) {
            echo "ID: " . $school->id . PHP_EOL;
            echo "Name: " . $school->name . PHP_EOL;
            echo "Description: " . $school->description . PHP_EOL;
            echo "Address: " . $school->address . PHP_EOL;
            echo "Phone: " . $school->phone . PHP_EOL;
            echo "Email: " . $school->email . PHP_EOL;
            echo "Principal: " . $school->principal_name . PHP_EOL;
            echo "Established: " . $school->established_year . PHP_EOL;
            echo "Mission: " . $school->mission . PHP_EOL;
            echo "Vision: " . $school->vision . PHP_EOL;
            echo "---\n";
        }
    } else {
        echo "No schools found in database.\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
