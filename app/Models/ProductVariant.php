<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    //
    protected $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'stock_quantity',
        'variant_price',
        'image',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
