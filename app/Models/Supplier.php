<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'supplier_mobile_no',
        'supplier_email',
        'vendor_id',
        'payed',
        'due'
    ];

    function vendors(){
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
