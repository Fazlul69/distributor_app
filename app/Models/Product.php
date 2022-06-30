<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id',
        'brand',
        'product_name',
        'image',
        'description',
        'buy',
        'sell',
        'quantity',
    ];

    function ecomcategory(){

        return $this->belongsTo(EcomCategory::class);
    }
}
