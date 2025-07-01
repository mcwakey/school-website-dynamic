<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Performance Optimization Settings
    |--------------------------------------------------------------------------
    |
    | Here you can configure various performance optimization settings
    | for the Ghana Primary School website.
    |
    */

    // Cache settings
    'cache' => [
        'default_ttl' => env('CACHE_TTL', 3600), // 1 hour
        'page_cache_ttl' => env('PAGE_CACHE_TTL', 1800), // 30 minutes
        'news_cache_ttl' => env('NEWS_CACHE_TTL', 900), // 15 minutes
        'events_cache_ttl' => env('EVENTS_CACHE_TTL', 900), // 15 minutes
    ],

    // Database optimization
    'database' => [
        'enable_query_log' => env('DB_QUERY_LOG', false),
        'slow_query_threshold' => env('DB_SLOW_QUERY_THRESHOLD', 1000), // milliseconds
    ],

    // Image optimization
    'images' => [
        'quality' => env('IMAGE_QUALITY', 85),
        'max_width' => env('IMAGE_MAX_WIDTH', 1920),
        'max_height' => env('IMAGE_MAX_HEIGHT', 1080),
        'thumbnail_width' => env('IMAGE_THUMB_WIDTH', 300),
        'thumbnail_height' => env('IMAGE_THUMB_HEIGHT', 200),
    ],

    // CDN settings
    'cdn' => [
        'enabled' => env('CDN_ENABLED', false),
        'url' => env('CDN_URL', ''),
        'assets' => env('CDN_ASSETS', false),
    ],

    // Compression
    'compression' => [
        'gzip_enabled' => env('GZIP_ENABLED', true),
        'minify_html' => env('MINIFY_HTML', false),
        'minify_css' => env('MINIFY_CSS', false),
        'minify_js' => env('MINIFY_JS', false),
    ],

    // SEO optimization
    'seo' => [
        'sitemap_cache_ttl' => env('SITEMAP_CACHE_TTL', 86400), // 24 hours
        'robots_cache_ttl' => env('ROBOTS_CACHE_TTL', 86400), // 24 hours
    ],
];
