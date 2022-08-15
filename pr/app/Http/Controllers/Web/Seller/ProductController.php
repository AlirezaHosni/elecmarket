<?php

namespace App\Http\Controllers\Web\Seller;

use App\Http\Controllers\Controller;
use App\Order;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function referal(Request $request)
    {
        if ($request->isMethod('post')) {
            $user_id = Auth::user()->id;
            $data = $request->all();
            DB::table('order_products')->where(['order_id' => $data['order_id'], 'product_id' => $data['product_id']])->update(['referral_text' => $data['referral_text']]);
            return redirect('/user/account');
        }
        $user_id = Auth::user()->id;
//->addDay(10)
        $orderall = Order::where(['user_id' => $user_id, 'order_status' => 'PAY-OK'])->where('updated_at', '<', Carbon::now())->get();
        //dd($orderall);
        return view('sellers.products.referral', compact('orderall'));
    }
}
