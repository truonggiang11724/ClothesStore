<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $table = 'feedbacks';

    protected $fillable = ['order_id', 'product_id', 'user_id', 'rating', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
