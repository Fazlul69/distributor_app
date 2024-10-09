<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'date',
        'customer_name',
        'customer_mobile',
        'vendor_id',
        'product_id',
        'quantity',
        'total', 
        'grand_total',
        'grand_discount',
        'payed',
        'due'
    ];

    // function customer(){
    //     return $this->belongsTo(Customer::class, 'customer_id');
    // }
    function item(){
        return $this->belongsTo(Item::class, 'product_id');
    }
    function vendor(){
        return $this->belongsTo(Company::class, 'vendor_id');
    }
    function replace(){
        return $this->belongsTo(Replace::class);
    }
    
}
