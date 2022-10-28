<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'parent_id',
        'name',
        'description',
        'price',
        'unit',
        'quantity',
    ];

    public static function allWithTrashed()
    {
        return self::withTrashed()->get();
    }

    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }
}
