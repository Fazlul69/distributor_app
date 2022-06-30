<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image','email','mobile','unpaid'];

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}
