<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->boot();

echo "Testing PageContent...\n";

$homeContent = App\Models\PageContent::where('page', 'home')->get();
echo "Home page content items: " . $homeContent->count() . "\n";

foreach($homeContent as $item) {
    echo "Key: {$item->key}, Title: {$item->title}\n";
}

echo "\nTesting with keyBy method:\n";
$contentByKey = $homeContent->keyBy('key');
echo "Available keys: " . implode(', ', $contentByKey->keys()->toArray()) . "\n";

if(isset($contentByKey['welcome_title'])) {
    echo "Welcome title found: " . $contentByKey['welcome_title']->title . "\n";
} else {
    echo "Welcome title NOT found\n";
}
