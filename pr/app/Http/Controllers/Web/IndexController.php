<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Order;
use App\Transaction;
use App\Wallet;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function access()
    {
        return view('errors.503');
    }

    public function checkWallets()
    {
        $checkorder = Order::where('created_at', '<=', Carbon::now()->subDays(11))
            ->get();

        $sum = 0;
        foreach ($checkorder as $row) {
            $id = $row->id;
            $tran = Transaction::where(['order_id' => $id])
                ->where(['status' => "pending"])
                ->first();
            if($tran != null){
                $amount = $tran->amount;
                $wallet_id = $tran->wallet_id;
                $user_id = $tran->user_id;
                $wallet = Wallet::where(['user_id' => $user_id])->first();

                $sum += $amount;
                $deposit = $wallet->deposit;
                Transaction::where(['id' => $id])->update([
                    'status' => 'approved'
                ]);
            }else{
                $wallet_id = 0;
            }

        }
        if($wallet_id > 0){
            Wallet::where(['id' => $wallet_id])->update([
                'amount' => $sum, 'deposit' => $deposit - $sum
            ]);
        }


        return "status" . "=" . "approved";
    }

//    public function checkWallets()
//    {
//        $checkorder = Order::where('created_at', '<=', Carbon::now()->subDays(11))
//            ->get();
//        dd($checkorder);
//        $checkpandeing = Transaction::where(['status' => "pending"])
//            ->get();
//
//        foreach ($checkpandeing as $row) {
//            $order_id = $row->order_id;
//            $wallet_id = $row->wallet_id;
//            $id = $row->id;
//            $amount = $row->amount;
//            $order = Order::where(['id' => $order_id])
//                ->where('created_at', '<=', Carbon::now()->subDays(11))
//                ->first();
//            if ($order != null) {
//                $wallet = Wallet::where(['id' => $wallet_id])->first();
//                $deposit = $wallet->deposit - $amount;
//                Wallet::where(['id' => $wallet_id])->update([
//                    'amount' => $amount, 'deposit' => $deposit
//                ]);
//                Transaction::where(['id' => $id])->update([
//                    'status' => 'approved'
//                ]);
//            }
//            //$check_status = $order->order_status;
//        }
//
//
//        return "status" . "=" . "approved";
//    }
}

