<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcomCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name'
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, "category_id");
    }
}
