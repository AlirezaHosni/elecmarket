<?php

namespace App\Http\Controllers\Web\Seller;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;
use App\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function showWallet(Request $request)
    {
        $user_id = Auth::user()->id;
        if ($request->isMethod('post')) {
            $data = $request->all();
            $money_total = $data['money_total'];
            $price_request = $data['price_request'];
            $request_data = Carbon::now();
            if ($money_total >= $price_request) {
                //dd('ok');
                $ckeckbank = User::where(['id' => $user_id])->first()->code_shaba;
                if ($ckeckbank != null) {
                    $wallets = new Wallet();
                    $wallets->user_id = $data['user_id'];
                    $wallets->bank_account = $ckeckbank;
                    $wallets->request_data = $request_data;
                    $wallets->paid_status = "withdraw-money";
                    $wallets->price_request = $price_request;
                    $wallets->save();
                    //CHANGEWLAAWT
                    $total = $money_total - $price_request;
                    User::where(['id' => $user_id])->update([
                        'money_request' => $price_request, 'money_total' => $total
                    ]);
                    return redirect()->back()->with('flash_message_success', 'مبلغ درخواست شما برای مدیر سایت ارسال شد');

                } else {
                    return redirect()->back()->with('flash_message_error', 'ابتدا کد شبا بانکی خود را با دقت پر کنید');
                }

            } else {
                return redirect()->back()->with('flash_message_error', 'مبلغ درخواست شما از مبلغ مجاز بیشتر است');
            }
        }

        $user = User::where('id', $user_id)->first();
        $transaction = Transaction::where('user_id', $user_id)->get();
        return view('sellers.wallets.show', compact('user', 'transaction'));
    }
}
