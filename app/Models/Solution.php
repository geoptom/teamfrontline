<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Solution extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'short_description',
        'description',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($solution) {
            if (empty($solution->slug)) {
                $solution->slug = Str::slug($solution->title);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
