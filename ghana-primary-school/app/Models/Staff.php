<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'position',
        'department',
        'bio',
        'email',
        'phone',
        'photo',
        'qualifications',
        'subjects',
        'is_featured',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'qualifications' => 'array',
        'subjects' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByDepartment($query, $department)
    {
        return $query->where('department', $department);
    }
}
