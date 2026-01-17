<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImportLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'rows_total',
        'rows_success',
        'rows_failed',
        'errors',
    ];

    protected $casts = [
        'errors' => 'array',
    ];
}
