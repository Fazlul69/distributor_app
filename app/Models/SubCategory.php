<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_name'
    ];

    public function ecomcategory()
    {
        return $this->belongsTo(EcomCategory::class, "category_id");
    }
}
