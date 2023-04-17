<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecomsale extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'date',
        'customer_name',
        'customer_mobile',
        'brand',
        'product_id',
        'quantity',
        'total', 
        'grand_total',
        'grand_discount',
        'payed',
        'due'
    ];

    function item(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
