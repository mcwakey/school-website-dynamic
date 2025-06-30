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
            // Get theme settings for CSS variables
            $themeSettings = ThemeSetting::all()->keyBy('key');

            // Get custom menus
            $headerMenus = CustomMenu::getMenuItems('header');
            $footerMenus = CustomMenu::getMenuItems('footer');

            // Get general settings
            $settings = Setting::all()->keyBy('key');

            $view->with([
                'themeSettings' => $themeSettings,
                'headerMenus' => $headerMenus,
                'footerMenus' => $footerMenus,
                'globalSettings' => $settings
            ]);
        });

        // Helper for getting page content
        View::composer(['website.*', 'layouts.app'], function ($view) {
            $view->with('pageContent', function($page, $key, $default = null) {
                return PageContent::getContent($page, $key, $default);
            });

            $view->with('pageTitle', function($page, $key, $default = null) {
                return PageContent::getTitle($page, $key, $default);
            });
        });
    }

    public function register(): void
    {
        //
    }
}
