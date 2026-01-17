<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'location', 'type', 'summary', 'description', 'status'
    ];

    public function applications()
    {
        return $this->hasMany(CareerApplication::class);
    }
}
