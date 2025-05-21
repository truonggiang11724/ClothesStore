<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
    protected $fillable = [
        'order_id',
        'payment_status'
    ];
}
