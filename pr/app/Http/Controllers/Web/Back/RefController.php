<?php

namespace App\Http\Controllers\Web\Back;

use App\CategoryUser;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Transaction;
use App\User;
use App\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RefController extends Controller
{
    public function referral()
    {
        $subday = Carbon::now()->subDays(7);
        $get = OrderProduct::whereNotNull('referral_text')->where('created_at', '>=', $subday)->get();
        return view('admin.referrals.all',compact('get'));
    }

    public function changeref(Request $request,$id=null)
    {
        if ($request->isMethod('post')){
            $data = $request->all();
            $order_ref = OrderProduct::where(['id' => $id])->first();
            $product = Product::where(['id' => $order_ref->product_id])->first();
            $category_id = $product->category_id;
            $product_price = $order_ref->product_price;
            $order_id = $order_ref->order_id;

            $order = Order::where(['id' => $order_ref->order_id])->first();
            $identifiercode = $order->identifiercode;
            $marketer = User::where(['username' => $identifiercode])->first();
            $marketer_wallet = Wallet::where(['user_id' => $marketer->id])->first();
            $trash = Transaction::where(['user_id' => $marketer->id,'order_id' => $order->id])->first();
            $cat = CategoryUser::where(['category_id' => $category_id,'user_id' => $marketer->id])->first();
            $prcent_cat = $cat->countdown_category;
            $totalpercent = ($product_price * ($prcent_cat / 100));
           // dd($totalpercent);
            $subday = Carbon::now()->subDays(7);

            $checkdata = OrderProduct::where('id',$id)->where('created_at', '<=', $subday)->count();
            if($checkdata > 0){
                return  redirect('/ad/ref')->with('flash_message_success', 'از تاریخ مرجوع گذشته است');
            }else{
                DB::table('order_products')->where(['id' => $data['pro_id']])->update(
                    ['referral' => $data['ref_status']]
                );
                $chargedeposit = Wallet::where('user_id', $marketer->id)->first()->deposit;
                $updatedeposit = $chargedeposit - $totalpercent;
                Wallet::where(['user_id' => $marketer->id])->update([
                    'deposit' => $updatedeposit,
                ]);
                $transaction_new = new Transaction();
                $transaction_new->user_id = $marketer->id;
                $transaction_new->wallet_id = $marketer_wallet->id;
                $transaction_new->order_id = $order_id;
                $transaction_new->amount = $totalpercent ?? 0;
                $transaction_new->percent = $prcent_cat;
                $transaction_new->save();
                return  redirect('/ad/ref')->with('flash_message_success', 'با موفقیت تغییر داده اید');
            }

        }

        $get = OrderProduct::where(['id' => $id,'referral' => 0])->whereNotNull('referral_text')->first();

        if(is_null($get)){
            return redirect()->back();
        }else{
            return view('admin.referrals.change',compact('get'));

        }

    }
}
