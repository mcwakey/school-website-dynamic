<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicProgram extends Model
{
    protected $fillable = [
        'name',
        'description',
        'details',
        'age_group',
        'duration',
        'image_path',
        'icon',
        'fees',
        'subjects',
        'features',
        'sort_order',
        'is_active',
        'is_featured'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
        'fees' => 'decimal:2',
        'subjects' => 'array',
        'features' => 'array'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
