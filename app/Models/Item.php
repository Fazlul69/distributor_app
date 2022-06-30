<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id', 
        'category_id',
        'product_name',
        'dp',
        'tp',
        'discount_price',
        'mrp'
    ];
    function vendor(){

        return $this->belongsTo(Vendor::class);
    }
    function category(){

        return $this->belongsTo(Category::class);
    }
}
