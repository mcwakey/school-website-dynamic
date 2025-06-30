<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'name',
        'label',
        'url',
        'target',
        'icon',
        'parent_id',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
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

    public function scopeForLocation($query, $location)
    {
        return $query->where('location', $location);
    }

    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }

    public function children()
    {
        return $this->hasMany(CustomMenu::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(CustomMenu::class, 'parent_id');
    }

    // Helper method to get menu items for a location
    public static function getMenuItems($location)
    {
        return static::active()
                    ->forLocation($location)
                    ->parents()
                    ->ordered()
                    ->with('children')
                    ->get();
    }
}
