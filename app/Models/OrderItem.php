<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'quantity',
    ];

    // OrderItem.php
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Product.php
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_id');
    }
}
