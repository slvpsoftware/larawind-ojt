<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; //copy from user.php MODEL

class Admin extends Authenticatable
{
    use HasFactory; 

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
