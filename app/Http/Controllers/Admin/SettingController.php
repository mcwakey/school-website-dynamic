<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key');

        // Group settings by category for better organization
        $generalSettings = Setting::where('group', 'general')->orWhereNull('group')->get()->keyBy('key');
        $seoSettings = Setting::where('group', 'seo')->get()->keyBy('key');
        $socialSettings = Setting::where('group', 'social')->get()->keyBy('key');
        $contactSettings = Setting::where('group', 'contact')->get()->keyBy('key');
        $advancedSettings = Setting::where('group', 'advanced')->get()->keyBy('key');

        return view('admin.settings.index', compact(
            'settings',
            'generalSettings',
            'seoSettings',
            'socialSettings',
            'contactSettings',
            'advancedSettings'
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'settings' => 'array',
            'settings.site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file uploads first
        if ($request->hasFile('settings.site_logo')) {
            $logo = $request->file('settings.site_logo');
            $logoPath = $logo->store('logos', 'public');

            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                [
                    'value' => $logoPath,
                    'group' => 'general',
                    'type' => 'file'
                ]
            );
        }

        // Update other settings
        if ($request->has('settings')) {
            foreach ($request->settings as $key => $value) {
                // Skip file uploads as they're handled above
                if ($key === 'site_logo') {
                    continue;
                }

                // Determine group based on setting key
                $group = $this->getGroupForSetting($key);

                Setting::updateOrCreate(
                    ['key' => $key],
                    [
                        'value' => $value,
                        'group' => $group,
                        'type' => $this->getTypeForSetting($key)
                    ]
                );
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
    }

    /**
     * Determine the group for a setting key
     */
    private function getGroupForSetting($key)
    {
        $groups = [
            'general' => ['site_name', 'site_tagline', 'site_description', 'site_logo', 'meta_keywords', 'google_analytics'],
            'contact' => ['email', 'phone', 'address', 'office_hours', 'contact_email'],
            'social' => ['facebook_url', 'twitter_url', 'instagram_url', 'youtube_url', 'linkedin_url'],
            'homepage' => ['hero_title', 'hero_subtitle', 'hero_description'],
            'about' => ['about_title', 'about_description'],
            'theme' => ['theme_primary_color', 'theme_secondary_color'],
            'seo' => ['meta_description'],
            'advanced' => ['custom_css', 'custom_js', 'google_maps_api', 'maintenance_mode'],
        ];

        foreach ($groups as $group => $keys) {
            if (in_array($key, $keys)) {
                return $group;
            }
        }

        return 'general';
    }

    /**
     * Determine the input type for a setting key
     */
    private function getTypeForSetting($key)
    {
        $types = [
            'textarea' => ['meta_description', 'contact_address', 'custom_css', 'custom_js', 'site_description'],
            'email' => ['contact_email', 'email'],
            'url' => ['facebook_url', 'twitter_url', 'instagram_url', 'youtube_url', 'linkedin_url'],
            'tel' => ['contact_phone', 'phone'],
            'color' => ['primary_color', 'secondary_color', 'accent_color'],
            'file' => ['site_logo'],
        ];

        foreach ($types as $type => $keys) {
            if (in_array($key, $keys)) {
                return $type;
            }
        }

        return 'text';
    }
}
