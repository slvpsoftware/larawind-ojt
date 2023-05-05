<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     public function categories()
     {
            return $this->hasMany(Category::class);
     }
     
     public function carts()
     {
            return $this->belongsTo(Cart::class);
     }
    
}
