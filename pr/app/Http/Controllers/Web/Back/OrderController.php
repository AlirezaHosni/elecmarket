<?php

namespace App\Http\Controllers\Web\Back;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderStatus;
use App\Pay;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showcarts()
    {
        $carts = Cart::latest()->get();
        //dd($carts);
        return view('admin.orders.cartshow', compact('carts'));
    }

    public function showorders()
    {
        $orders = Order::latest()->get();
        return view('admin.orders.ordershow', compact('orders'));
    }

    public function editorders(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            Order::where(['id' => $id])->update([
                'order_status' => $data['order_status']
            ]);
            return redirect('ad/order/show')->with('flash_message_success', 'سفارش وضعیت بروز شد');
        }

        $orders = Order::where(['id' => $id])->first();
        $status = OrderStatus::latest()->get();
        //dd($orders);
        return view('admin.orders.edit', compact('orders','status'));
    }

    public function payments()
    {
        $payments = Pay::latest()->get();
        return view('admin.orders.payments', compact('payments'));
    }
}
