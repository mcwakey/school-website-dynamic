<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;

echo "Total users: " . User::count() . "\n";
echo "Admin users: " . User::where('is_admin', true)->count() . "\n";

foreach (User::all() as $user) {
    echo $user->name . " (" . $user->email . ") - Admin: " . ($user->is_admin ? "Yes" : "No") . "\n";
}
