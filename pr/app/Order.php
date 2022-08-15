<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
    public function orders(){
        return $this->hasMany(OrderProduct::class,'order_id');
    }
    public function orders_products(){
        return $this->hasMany(OrderProduct::class,'order_id');
    }
    public static function getOrderDetails($order_id){
        $getOrderDetails = Order::where('id',$order_id)->first();
        return $getOrderDetails;
    }
}
