<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replace extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_name',
        'invoice',
        'vendor_id',
        'product_id',
        'sales_return',
        'amount',
        'date'
    ];

    function item(){
        return $this->belongsTo(Item::class, 'product_id');
    }
    function vendor(){
        return $this->belongsTo(Company::class, 'vendor_id');
    }
}
