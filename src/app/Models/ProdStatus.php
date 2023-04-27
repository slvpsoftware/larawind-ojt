<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdStatus extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getStatsAttribute()
    {
        
        $status_list = [
            'published',
            'unpublished',
            
        ];
        return $status_list[$this->status];
    }
}
