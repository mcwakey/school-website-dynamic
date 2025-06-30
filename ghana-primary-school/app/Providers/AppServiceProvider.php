<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use App\Models\School;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share settings and school data with all views
        View::composer('*', function ($view) {
            $settings = Setting::all()->keyBy('key');
            $school = School::first();

            $view->with('settings', $settings);
            $view->with('school', $school);
        });
    }
}
