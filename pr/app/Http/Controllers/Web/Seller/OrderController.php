<?php

namespace App\Http\Controllers\Web\Seller;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderProduct;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showOrders()
    {
        $user_id = Auth::user()->id;
        $user = User::where(['id' => $user_id])->first();
        $getorder = Order::where(['user_id' => $user->id])->get();
        return view('sellers.orders.orders', compact('getorder'));
    }

    public function showuserOrders()
    {
        $user_id = Auth::user()->id;
        $user = User::where(['id' => $user_id])->first();
        $getorder = Order::latest()->where(['identifiercode' => $user->identifiercode])->get();
        return view('sellers.orders.user.orders', compact('getorder'));
    }

    public function orderuserfactorshow(Request $request,$id=null,$user_id=null)
    {
//        $user_id = Auth::user()->id;
        $order = Order::where(['user_id' => $user_id,'id' => $id])->first();
        $orderproduct = OrderProduct::where(['user_id' => $user_id,'order_id' => $order->id])->get();
        $settings = Setting::latest()->first();
        $userProfileDetail = \App\Profile::with('user')->where('user_id', $user_id)->first();
        $userDetail = User::find($user_id);
        return view('sellers.orders.user.factor',compact('order','settings','user_id','orderproduct','userProfileDetail','userDetail'));

    }
    public function ordershow(Request $request,$id=null)
    {
        $user_id = Auth::user()->id;
        $order = Order::where(['user_id' => $user_id,'id' => $id])->first();
        $orderproduct = OrderProduct::where(['user_id' => $user_id,'order_id' => $order->id])->get();
        $settings = Setting::latest()->first();
        $userProfileDetail = \App\Profile::with('user')->where('user_id', $user_id)->first();
        $userDetail = User::find($user_id);
        return view('sellers.orders.order',compact('order','settings','user_id','orderproduct','userProfileDetail','userDetail'));
    }
}
