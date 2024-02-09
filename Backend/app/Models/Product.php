<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'discount',
        'price',
        'description',
        'brand',
        'brand_id',
        'image'
    ];
}
