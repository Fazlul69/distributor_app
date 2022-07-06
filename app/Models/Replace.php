<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replace extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_name',
        'vendor_id',
        'product_id',
        'dp',
        'tp',
        'shop_back',
        'return_company',
        'company_back',
        'return_shop',
        'date'
    ];
}
