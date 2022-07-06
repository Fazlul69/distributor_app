<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInput extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'supplier_id',
        'product_id',
        'category_id',
        'company_price',
        'discount_price',
        'sell_price',
        'mrp',
        'quantity',
        'total',
        'date',
        'vendor_id',
        'grand_total',
        'grand_discount',
        'payed',
        'due'
    ];

    function vendor(){

        return $this->belongsTo(Company::class);
    }

    function Supplier(){

        return $this->belongsTo(Supplier::class);
    }
    function category(){

        return $this->belongsTo(Category::class);
    }
    function items(){
        return $this->belongsTo(Item::class, 'product_id');
    }
}
