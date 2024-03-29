<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'category_name'
    ];

    function vendor(){

        return $this->belongsTo(Company::class, 'vendor_id');
    }
}
