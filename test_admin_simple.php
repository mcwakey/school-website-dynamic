<?php
require_once 'vendor/autoload.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$app = require_once 'bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Http\Kernel');

// Create a test request
$request = Request::create('/install/create-admin', 'POST', [
    'name' => 'Test Admin',
    'email' => 'admin@school.com', // Duplicate email
    'password' => 'password123',
    'password_confirmation' => 'password123'
]);

$request->headers->set('Content-Type', 'application/json');
$request->headers->set('Accept', 'application/json');

try {
    $response = $kernel->handle($request);
    echo "Status: " . $response->getStatusCode() . "\n";
    echo "Content: " . $response->getContent() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}
