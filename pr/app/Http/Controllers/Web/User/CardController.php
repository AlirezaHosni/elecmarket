<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function cardbank(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $card_bank = $data['card_bank'];
            $shaba = $data['code_shaba'];
            $fix = Helper::numberfix($card_bank);
            //dd($fix);
            $checkcard = Helper::bankCardCheck($fix);

            $checkshaba = Helper::shabaBankcheck($shaba);
            if ($checkcard == true) {
                if ($checkshaba == true) {
                    $id = $data['user_id'];

                    User::where(['id' => $id])->update([
                        'card_bank' => $data['card_bank'], 'code_shaba' => $data['code_shaba']
                    ]);
                    return redirect()->back()->withInput();
                }
                return redirect()->back()->withInput();
            } else {
                return redirect()->back()->withInput();
            }

        }
        $user_id = Auth::user()->id;
        $cardbank = User::where(['id' => $user_id])->first();
        return view('account.card.cardbank', compact('cardbank', 'user_id'));
    }
}
