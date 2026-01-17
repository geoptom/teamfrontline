<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'parent_id', 'description', 'status', 'icon', 'banner', 'short_description','thump_image',
    ];


    protected static function booted()
    {
        static::creating(function ($category) {
            $category->slug = $category->slug ?: Str::slug($category->name);
        });
    }


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Products in this category
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
