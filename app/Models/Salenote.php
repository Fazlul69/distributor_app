<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salenote extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'customer_id',
        'vandor_id',
        'subtotal',
        'payed',
        'due'
    ];
}
