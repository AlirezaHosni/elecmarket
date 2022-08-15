<?php

namespace App\Http\Controllers\Web\Seller;

use App\Address;
use App\Http\Controllers\Controller;
use App\Marketer;
use App\Order;
use App\OrderProduct;
use App\Pay;
use App\Product;
use App\Setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class PaymentController extends Controller
{
    public function payments(Request $request,$id=null)
    {
        $data = $request->all();
       // dd($id);
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            //$userCart = DB::table('carts')->where(['user_id' => $user_id, 'status' => 0])->get();
            //$userDetail = User::find($user_id);
            //$userProfileDetail = \App\Profile::with('user')->where('user_id', $user_id)->first();
        }
//        foreach ($userCart as $key => $product) {
//            $productDetails = Product::where('id', $product->product_id)->first();
//            $userdi = User::where('id', $product->user_id)->first();
//            $userCart[$key]->cover = $productDetails->cover;
//            $userCart[$key]->price = $productDetails->price;
//            $userCart[$key]->producttitle = $productDetails->title;
//
//        }

        //$address = Address::where(['user_id' => $user_id])->latest()->get();
        $settings = Setting::first();
        $orders = Order::where(['id' => $id])->first();
        $prodcutorders = OrderProduct::where(['order_id' => $orders->id, 'user_id' => $user_id])->get();
        //dd($orders);
        return view('sellers.orders.payments', compact('settings',  'orders', 'prodcutorders'));
    }

    public function getsellers(Request $request)
    {
        $data = $request->all();
        $province_id = $_POST['state_id'];
        $city_id = 0;
        if (isset($_POST['city_id']))
            $city_id = $_POST['city_id'];

        //$cities = City::where('province', $province_id)->orderby('name')->get();
        $sellers = Marketer::where('state_id', $province_id)->orderby('user_id')->get();
        foreach ($sellers as $sellers) {
            $t = "";
            if ($city_id == $sellers->id) $t = 'selected';
            echo '<option value="' . $sellers->id . '" ' . $t . '>' . $sellers->user->username . '</option>';
        }
    }

    public function factor(Request $request, $id = null)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $userCart = DB::table('carts')->where(['user_id' => $user_id, 'status' => 0])->get();
            $userDetail = User::find($user_id);
            $userProfileDetail = \App\Profile::with('user')->where('user_id', $user_id)->first();
        }
        $order = Order::where(['user_id' => $user_id, 'order_status' => 'Panding'])->latest()->first();
        $prodcutorders = OrderProduct::where(['order_id' => $order->id, 'user_id' => $user_id])->get();
        $address = Address::where(['user_id' => $user_id])->latest()->get();
        $settings = Setting::latest()->first();
        return view('sellers.orders.factor', compact('userCart', 'settings', 'address', 'userDetail', 'userProfileDetail', 'order', 'prodcutorders'));
    }

    public function payonline(Request $request)
    {
        if ($request->isMethod('post')){
            $data = $request->all();
            $user_id = Auth::User()->id;
            $checkpay = Pay::where(['user_id' => $user_id,'order_id' => $data['order_id']])->count();
            if($checkpay > 0){
                $order_id = $data['order_id'];
                $price = (int)($data['amount']);
                $pay_id = Pay::where('order_id',$order_id)->latest()->first()->id;
                $Description = 'پرداخت'; // Required
                $invoice = new Invoice;
                $invoice->amount((int)$price);
                $url = \url('/sellers/pay/callback');
                $invoice->detail(['detailName' => $Description]);
                return Payment::callbackUrl($url)->purchase($invoice,
                    function ($driver, $transactionId) use ($price,$pay_id) {
                        Pay::where(['id' => $pay_id])->update([
                            'transaction_id' => $transactionId
                        ]);
                    }
                )->pay()->render();
            }else{
                $order_id = $data['order_id'];
                $price = (int)($data['amount']);
                $pay = new Pay();
                $pay->user_id = $user_id;
                $pay->order_id = $order_id;
                $pay->amount = $price;
                $pay->save();
                $pay_id = Pay::latest()->first()->id;
                $Description = 'پرداخت'; // Required
                $invoice = new Invoice;
                $invoice->amount((int)$price);
                $url = \url('/sellers/pay/callback');
                $invoice->detail(['detailName' => $Description]);
                return Payment::callbackUrl($url)->purchase($invoice,
                    function ($driver, $transactionId) use ($price,$pay_id) {
                        Pay::where(['id' => $pay_id])->update([
                            'transaction_id' => $transactionId
                        ]);
                    }
                )->pay()->render();
            }


        }

    }

    public function cod(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            $user_id = Auth::user()->id;
            $orders_id = $data['order_id'];
            $userDetail = User::find($user_id);
            $money_total = $userDetail->money_total;
            //dd($money_total);
            if($money_total >= $data['total']){
                $total = $money_total - $data['total'];
                User::where('id',$user_id)->update([
                    'money_total' => $total
                ]);
                Order::where(['id' => $orders_id])->update([
                    'order_status' => 'PAY-OK-cod','payment_type' => "COD"
                ]);
                return redirect('/pay/success/'.$orders_id)->with('flash_message_success','با موفقیت از اعتبار کم شد');
            }else{
                return redirect()->back()->with('flash_message_error','موجود اعتبار شما کافی نیست لطفا پرداخت آنلاین انجام بدهید');
            }
        }
    }

    public function success($id=null)
    {
        $user_id = Auth::User()->id;
        //$pays = Pay::where('id',$id)->first();
        $orders = Order::with('orders_products')->where(['user_id' => $user_id,'id' => $id])->first();
        $userdetails = User::where('id',$user_id)->first();
        return view('sellers.pays.success',compact('orders','userdetails'));
    }

    public function callbackpay(Request $request, $transaction_id = null)
    {
        //dd($request->all());
        //dd($transaction_id);
        $Authority = request('id');
        $payment = Pay::where('transaction_id', $Authority)->firstOrFail();
        //dd($payment);
        $id = $payment->id;
        $amount = (int)$payment->amount;
        $orders = $payment->order_id;
        try {
            //$transactionId = session()->get('transactionId');
            $receipt = Payment::amount($amount)->transactionId($Authority)->verify();

            // $payment_id = session()->get('payment_id');
            Order::where(['id' => $orders])->update([
                'order_status' => 'PAY-OK','payment_type' => "Online"
            ]);

            Pay::where(['id' => $id])->update([
                'status_pay' => 'PAY-OK'
            ]);
            //return response(['status' => 200], 200);
            return redirect('/pay/success/'.$id);

            //return response(['status' => 200], 200);

            // You can show payment referenceId to the user.
            // echo $receipt->getReferenceId();

        } catch (InvalidPaymentException $exception) {
            //echo $exception->getMessage();
            Order::where(['id' => $orders])->update([
                'order_status' => 'PAY-NOT'
            ]);

            Pay::where(['id' => $id])->update([
                'status_pay' => 'PAY-NOT'
            ]);
            return redirect('/pay/not-success');
        }
    }

//    public function referral(Request $request)
//    {
//        $user_id = Auth::user()->id;
//        $orderall = Order::where(['user_id' => $user_id, 'order_status' => 'finish'])->where('updated_at', '<', Carbon::now()->subDay(10))->get();
//        return view('account.products.referral', compact('orderall'));
//    }
}
