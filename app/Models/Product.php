<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'barcode',
        'product_name',
        'price',
        'status'
    ];

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
