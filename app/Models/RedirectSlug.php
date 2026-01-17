<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedirectSlug extends Model
{
    protected $fillable = [
        'old_slug',
        'new_slug',
        'old_path',
        'new_path',
        'model',
        'route_name',
        'is_active',
        'hits',
        'last_hit_at',
    ];

    protected $casts = [
        'last_hit_at' => 'datetime',
    ];

    // Marks old redirect as inactive
    public function deactivate()
    {
        $this->is_active = false;
        $this->save();
    }

    // Prevent redirect loops
    public static function causesLoop($old, $new)
    {
        return self::where('old_slug', $new)
            ->where('new_slug', $old)
            ->exists();
    }
}
