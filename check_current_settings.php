<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Setting;

echo "Current Available Settings:\n";
$settings = Setting::all();
foreach($settings as $s) {
    echo $s->key . ': ' . $s->value . ' (group: ' . $s->group . ')' . PHP_EOL;
}
