<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public function checkouts()
    {
        return $this->hasMany(Checkout::class);
    }
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
