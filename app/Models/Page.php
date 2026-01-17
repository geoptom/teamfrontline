<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'banner_image',
        'seo_title',
        'seo_description',
        'is_visible',
        'show_in_menu',
    ];
}
