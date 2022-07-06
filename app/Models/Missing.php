<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Missing extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'date'
    ];

    function vendor(){

        return $this->belongsTo(Company::class);
    }
    
    function item(){
        return $this->belongsTo(Item::class, 'product_id');
    }
}
