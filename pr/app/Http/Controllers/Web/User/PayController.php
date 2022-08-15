<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Order;
use App\Pay;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Session;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class PayController extends Controller
{
    public function payonline(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $user_id = Auth::User()->id;
            $checkpay = Pay::where(['user_id' => $user_id, 'order_id' => $data['order_id']])->count();
            // dd($data);
            if ($checkpay > 0) {
                $order_id = $data['order_id'];
                $price = (int)($data['amount']);
                $pay_id = Pay::where(['user_id' => $user_id, 'order_id' => $order_id])->latest()->first()->id;
                $Description = 'پرداخت'; // Required

                $invoice = new Invoice;
                $invoice->amount((int)$price);
                $url = \url('/pay/callback');
                $invoice->detail(['detailName' => $Description]);
                return Payment::callbackUrl($url)->purchase($invoice,
                    function ($driver, $transactionId) use ($price,$pay_id) {
                        Pay::where(['id' => $pay_id])->update([
                            'transaction_id' => $transactionId
                        ]);
                    }
                )->pay()->render();
            } else {
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
                $url = \url('/pay/callback');
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

    public function callbackpay(Request $request, $transaction_id = null)
    {


        $Authority = request('id');
        //dd($Authority);
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
                'order_status' => 'PAY-OK'
            ]);

            Pay::where(['id' => $id])->update([
                'status_pay' => 'PAY-OK'
            ]);
            //return response(['status' => 200], 200);
            return redirect('/pay/success/' . $id);
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

    public function success(Request $request, $id = null)
    {
        $user_id = Auth::User()->id;
        $pays = Pay::where('id', $id)->first();
        $orders = Order::with('orders_products')->where(['user_id' => $user_id, 'id' => $pays->order_id])->first();
        $userdetails = User::where('id', $user_id)->first();
        return view('account.pays.success', compact('pays', 'orders', 'userdetails'));
    }

    public function notsuccess()
    {
        $user_id = Auth::User()->id;
        $pays = Pay::where('user_id', $user_id)->latest()->first();
        $orders = Order::with('orders_products')->where(['user_id' => $user_id, 'id' => $pays->order_id])->first();
        //dd($orders);
        $userdetails = User::where('id', $user_id)->first();
        return view('account.pays.not_success', compact('pays', 'orders', 'userdetails'));
    }
}
