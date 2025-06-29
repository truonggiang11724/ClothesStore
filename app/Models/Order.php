<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'customer_id',
        'customer_name',
        'phonenumber',
        'email',
        'address',
        'ward',
        'total_price',
        'payment_method',
        'order_status'
    ];
    // Order.php
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function wards()
    {
        return $this->belongsTo(Ward::class);
    }
}
