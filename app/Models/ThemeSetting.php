<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'key',
        'value',
        'type',
        'description'
    ];

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Helper method to get theme value
    public static function getValue($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    // Helper method to get all settings by category
    public static function getByCategory($category)
    {
        return static::where('category', $category)->get()->keyBy('key');
    }

    // Helper method to update or create theme setting
    public static function setValue($key, $value, $category = 'general', $type = 'text', $description = null)
    {
        // Prevent null value: fallback to current value if exists, or empty string
        if (is_null($value)) {
            $current = static::where('key', $key)->first();
            $value = $current ? $current->value : '';
        }
        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'category' => $category,
                'type' => $type,
                'description' => $description
            ]
        );
    }
}
