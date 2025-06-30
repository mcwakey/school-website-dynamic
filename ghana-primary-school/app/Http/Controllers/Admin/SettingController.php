<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\School;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('key');
        $school = School::first();

        // Group settings by category for better organization
        $generalSettings = Setting::where('category', 'general')->orWhereNull('category')->get()->keyBy('key');
        $seoSettings = Setting::where('category', 'seo')->get()->keyBy('key');
        $socialSettings = Setting::where('category', 'social')->get()->keyBy('key');
        $contactSettings = Setting::where('category', 'contact')->get()->keyBy('key');
        $advancedSettings = Setting::where('category', 'advanced')->get()->keyBy('key');

        return view('admin.settings.index', compact(
            'settings',
            'school',
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
            'school' => 'array',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Update settings with category support
        if ($request->has('settings')) {
            foreach ($request->settings as $key => $value) {
                // Determine category based on setting key
                $category = $this->getCategoryForSetting($key);

                Setting::updateOrCreate(
                    ['key' => $key],
                    [
                        'value' => $value,
                        'category' => $category,
                        'type' => $this->getTypeForSetting($key)
                    ]
                );
            }
        }

        // Update school info
        if ($request->has('school')) {
            $school = School::first();
            if (!$school) {
                $school = new School();
            }

            // Handle logo upload
            if ($request->hasFile('logo')) {
                // Delete old logo if exists
                if ($school->logo && file_exists(public_path('storage/' . $school->logo))) {
                    unlink(public_path('storage/' . $school->logo));
                }

                $logoPath = $request->file('logo')->store('logos', 'public');
                $school->logo = $logoPath;
            }

            // Update other school fields
            $school->fill($request->school);
            $school->save();
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
    }

    /**
     * Determine the category for a setting key
     */
    private function getCategoryForSetting($key)
    {
        $categories = [
            'seo' => ['site_title', 'site_tagline', 'meta_description', 'meta_keywords', 'google_analytics'],
            'social' => ['facebook_url', 'twitter_url', 'instagram_url', 'youtube_url', 'linkedin_url'],
            'contact' => ['contact_email', 'contact_phone', 'contact_address', 'office_hours'],
            'advanced' => ['custom_css', 'custom_js', 'google_maps_api', 'maintenance_mode'],
        ];

        foreach ($categories as $category => $keys) {
            if (in_array($key, $keys)) {
                return $category;
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
            'textarea' => ['meta_description', 'contact_address', 'custom_css', 'custom_js'],
            'email' => ['contact_email'],
            'url' => ['facebook_url', 'twitter_url', 'instagram_url', 'youtube_url', 'linkedin_url'],
            'tel' => ['contact_phone'],
            'color' => ['primary_color', 'secondary_color', 'accent_color'],
        ];

        foreach ($types as $type => $keys) {
            if (in_array($key, $keys)) {
                return $type;
            }
        }

        return 'text';
    }
}
