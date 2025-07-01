<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThemeSetting;

class ThemeController extends Controller
{
    public function index()
    {
        $colorSettings = ThemeSetting::byCategory('colors')->get();
        $fontSettings = ThemeSetting::byCategory('fonts')->get();
        $layoutSettings = ThemeSetting::byCategory('layout')->get();
        $customCss = ThemeSetting::getValue('custom_css', '');
        $customJs = ThemeSetting::getValue('custom_js', '');

        return view('admin.theme.index', compact(
            'colorSettings',
            'fontSettings',
            'layoutSettings',
            'customCss',
            'customJs'
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'colors' => 'nullable|array',
            'fonts' => 'nullable|array',
            'layout' => 'nullable|array',
            'custom_css' => 'nullable|string',
            'custom_js' => 'nullable|string'
        ]);

        // Update color settings
        if ($request->has('colors')) {
            foreach ($request->colors as $key => $value) {
                ThemeSetting::setValue($key, $value, 'colors', 'color');
            }
        }

        // Update font settings
        if ($request->has('fonts')) {
            foreach ($request->fonts as $key => $value) {
                ThemeSetting::setValue($key, $value, 'fonts', 'font');
            }
        }

        // Update layout settings
        if ($request->has('layout')) {
            foreach ($request->layout as $key => $value) {
                ThemeSetting::setValue($key, $value, 'layout', 'text');
            }
        }

        // Update custom CSS
        if ($request->has('custom_css')) {
            ThemeSetting::setValue('custom_css', $request->custom_css, 'advanced', 'textarea');
        }

        // Update custom JS
        if ($request->has('custom_js')) {
            ThemeSetting::setValue('custom_js', $request->custom_js, 'advanced', 'textarea');
        }

        return redirect()->route('admin.theme.index')
                        ->with('success', 'Theme settings updated successfully!');
    }

    public function reset()
    {
        // Reset to default theme settings
        $defaults = [
            'primary_color' => '#667eea',
            'secondary_color' => '#764ba2',
            'accent_color' => '#f093fb',
            'text_color' => '#333333',
            'background_color' => '#ffffff',
            'header_font' => 'Nunito',
            'body_font' => 'Nunito',
            'font_size' => '16px',
            'line_height' => '1.6',
            'container_width' => '1200px',
            'border_radius' => '8px',
            'custom_css' => '',
            'custom_js' => ''
        ];

        foreach ($defaults as $key => $value) {
            $category = 'layout';
            $type = 'text';

            if (str_contains($key, 'color')) {
                $category = 'colors';
                $type = 'color';
            } elseif (str_contains($key, 'font')) {
                $category = 'fonts';
                $type = 'font';
            } elseif (in_array($key, ['custom_css', 'custom_js'])) {
                $category = 'advanced';
                $type = 'textarea';
            }

            ThemeSetting::setValue($key, $value, $category, $type);
        }

        return redirect()->route('admin.theme.index')
                        ->with('success', 'Theme settings reset to defaults!');
    }
}
