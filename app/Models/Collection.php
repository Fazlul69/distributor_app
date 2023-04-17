<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'stuff_name',
        'customer_id',
        'sales_invoice',
        'amount',
        'date'
    ];

    function customer(){

        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
