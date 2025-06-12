<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $fillable = [
        'code',
        'type',
        'value',
        'usage_limit',
        'expires_at',
    ];
}
