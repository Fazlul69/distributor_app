<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'cus_mobile',
        'shop',
        'cus_email',
        'cus_address',
        'payed',
        'due'
    ];
}
