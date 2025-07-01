<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'description',
        'address',
        'phone',
        'email',
        'website',
        'logo',
        'principal_name',
        'mission',
        'vision',
        'established_year',
        'social_media',
        'is_active'
    ];

    protected $casts = [
        'social_media' => 'array',
        'is_active' => 'boolean',
        'established_year' => 'integer'
    ];
}
