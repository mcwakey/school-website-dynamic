<?php
// Test admin creation API endpoint
$url = 'http://127.0.0.1:8000/install/create-admin';

// Test with duplicate email
$data = [
    'name' => 'Test Admin',
    'email' => 'admin@school.com', // This email already exists
    'password' => 'password123',
    'password_confirmation' => 'password123'
];

// Get CSRF token first
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:8000/install');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookies.txt');
$response = curl_exec($ch);

// Extract CSRF token from meta tag
preg_match('/<meta name="csrf-token" content="([^"]+)"/', $response, $matches);
$csrfToken = $matches[1] ?? null;

echo "CSRF Token: " . ($csrfToken ?: 'Not found') . "\n";

if ($csrfToken) {
    // Test admin creation
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json',
        'X-CSRF-TOKEN: ' . $csrfToken
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    echo "HTTP Code: $httpCode\n";
    echo "Response: $response\n";

    // Try to parse as JSON
    $jsonData = json_decode($response, true);
    if ($jsonData) {
        echo "Parsed JSON:\n";
        print_r($jsonData);
    } else {
        echo "Response is not valid JSON\n";
    }
}

curl_close($ch);

// Clean up
if (file_exists('cookies.txt')) {
    unlink('cookies.txt');
}
