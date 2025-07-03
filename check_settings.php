<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Setting;

$settings = Setting::all();
echo "Current Settings:\n";
foreach($settings as $s) {
    echo $s->key . ': ' . $s->value . ' (group: ' . $s->group . ')' . PHP_EOL;
}

echo "\nSchool-related settings:\n";
$schoolSettings = Setting::where('group', 'school')->get();
foreach($schoolSettings as $s) {
    echo $s->key . ': ' . $s->value . PHP_EOL;
}
