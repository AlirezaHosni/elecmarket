<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class, 'wallet_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

}
