<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'section',
        'key',
        'title',
        'content',
        'image',
        'metadata',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'metadata' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeForPage($query, $page)
    {
        return $query->where('page', $page);
    }

    public function scopeForSection($query, $section)
    {
        return $query->where('section', $section);
    }

    // Helper method to get content by page and key
    public static function getContent($page, $key, $default = null)
    {
        $content = static::where('page', $page)
                        ->where('key', $key)
                        ->where('is_active', true)
                        ->first();

        return $content ? $content->content : $default;
    }

    // Helper method to get title by page and key
    public static function getTitle($page, $key, $default = null)
    {
        $content = static::where('page', $page)
                        ->where('key', $key)
                        ->where('is_active', true)
                        ->first();

        return $content ? $content->title : $default;
    }
}
