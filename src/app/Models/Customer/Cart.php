<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
    
}
