<?php

namespace App\Models;

use App\User;

class Order extends Model
{
    protected $fillable = [
        'code',
        'status',
        'notes',
        'user_id',
        'total_price',
        'total_qty'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
