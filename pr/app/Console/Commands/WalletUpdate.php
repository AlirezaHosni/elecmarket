<?php

namespace App\Console\Commands;

use App\Order;
use App\Transaction;
use App\Wallet;
use Carbon\Carbon;
use Illuminate\Console\Command;

class WalletUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $checkorder = Order::where('created_at', '<=', Carbon::now()->subDays(11))
            ->get();
        $sum = 0;
        foreach ($checkorder as $row) {
            $id = $row->id;
            $tran = Transaction::where(['order_id' => $id])
                ->where(['status' => "pending"])
                ->first();
            $amount = $tran->amount;
            $wallet_id = $tran->wallet_id;
            $user_id = $tran->user_id;
            $wallet = Wallet::where(['user_id' => $user_id])->first();

            $sum += $amount;
            $deposit = $wallet->deposit;
            Transaction::where(['id' => $id])->update([
                'status' => 'approved'
            ]);
        }

        Wallet::where(['id' => $wallet_id])->update([
            'amount' => $sum, 'deposit' => $deposit - $sum
        ]);

        return "status" . "=" . "approved";
    }
}
