<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application Version
    |--------------------------------------------------------------------------
    |
    | This value represents the current version of the application.
    | This version number is used for display purposes and can be
    | shown in the admin panel, footer, or other parts of the application.
    |
    */

    'version' => '1.0.0',
    'release_date' => '2025-07-01',
    'codename' => 'Excellence',

    /*
    |--------------------------------------------------------------------------
    | Application Build Information
    |--------------------------------------------------------------------------
    |
    | Information about the current build of the application.
    |
    */

    'build' => [
        'number' => '001',
        'date' => '2025-07-01',
        'environment' => env('APP_ENV', 'production'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Feature Flags
    |--------------------------------------------------------------------------
    |
    | Version-specific feature flags that can be used to enable/disable
    | features based on the current version.
    |
    */

    'features' => [
        'customization_system' => true,
        'theme_management' => true,
        'menu_management' => true,
        'advanced_settings' => true,
        'gallery_management' => true,
        'document_system' => true,
        'search_functionality' => true,
        'hero_slideshow' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Version History
    |--------------------------------------------------------------------------
    |
    | Keep track of major version milestones.
    |
    */

    'history' => [
        '1.0.0' => [
            'release_date' => '2025-07-01',
            'description' => 'Initial stable release with complete CMS and customization system',
            'major_features' => [
                'Complete school website with responsive design',
                'Advanced admin content management system',
                'Full customization system for themes and content',
                'Production-ready deployment configuration',
            ],
        ],
    ],
];
