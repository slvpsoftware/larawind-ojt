<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;
   public function carts()
   {
       return $this->hasMany(Cart::class);
   }
   public function products()
   {
       return $this->hasMany(Product::class);
   }
}