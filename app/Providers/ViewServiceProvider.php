<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\PageContent;
use App\Models\ThemeSetting;
use App\Models\CustomMenu;
use App\Models\Setting;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Share common data with all views
        View::composer('*', function ($view) {
            try {
                // Check if database tables exist before querying
                if (\Illuminate\Support\Facades\Schema::hasTable('theme_settings')) {
                    $themeSettings = ThemeSetting::all()->keyBy('key');
                } else {
                    $themeSettings = collect();
                }

                // Get custom menus
                if (\Illuminate\Support\Facades\Schema::hasTable('custom_menus')) {
                    $headerMenus = CustomMenu::getMenuItems('header');
                    $footerMenus = CustomMenu::getMenuItems('footer');
                } else {
                    $headerMenus = collect();
                    $footerMenus = collect();
                }

                // Get general settings
                if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                    $settings = Setting::all()->keyBy('key');
                } else {
                    $settings = collect();
                }

                $view->with([
                    'themeSettings' => $themeSettings,
                    'headerMenus' => $headerMenus,
                    'footerMenus' => $footerMenus,
                    'globalSettings' => $settings,
                    'settings' => $settings  // Also add as 'settings' for backwards compatibility
                ]);
            } catch (\Exception $e) {
                // If database connection fails, provide empty collections
                $view->with([
                    'themeSettings' => collect(),
                    'headerMenus' => collect(),
                    'footerMenus' => collect(),
                    'globalSettings' => collect(),
                    'settings' => collect()
                ]);
            }
        });

        // Helper for getting page content
        View::composer(['website.*', 'layouts.app'], function ($view) {
            $view->with('getPageContent', function($page, $key, $default = null) {
                return PageContent::getContent($page, $key, $default);
            });

            $view->with('getPageTitle', function($page, $key, $default = null) {
                return PageContent::getTitle($page, $key, $default);
            });
        });
    }

    public function register(): void
    {
        //
    }
}
