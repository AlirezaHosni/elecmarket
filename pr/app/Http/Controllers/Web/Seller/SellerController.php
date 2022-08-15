<?php

namespace App\Http\Controllers\Web\Seller;

use App\Http\Controllers\Controller;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SellerController extends Controller
{
    public function DashboardSeller()
    {
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);
        $count = Wallet::where(['user_id' => $user_id])->count();
        if ($count > 0) {
            $wallet = Wallet::where(['user_id' => $user_id])->first();
        } else {
            $wallet = null;
        }
        session(['sellersSession', $userDetails->phone]);
        //Session::put('adminSession', $userDetails->username);

        $meta_title = "پنل فروشنده";
        return view('sellers.account', compact('userDetails', 'wallet'));
    }

    public function chkUserPassword(Request $request)
    {
        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/
        $current_password = $data['current_pwd'];
        $user_id = Auth::User()->id;
        $check_password = User::where('id', $user_id)->first();
        if (Hash::check($current_password, $check_password->password)) {
            echo "true";
            die;
        } else {
            echo "false";
            die;
        }
    }

    public function updatePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $old_pwd = User::where('id', Auth::User()->id)->first();
            $current_pwd = $data['current_pwd'];
            if (Hash::check($current_pwd, $old_pwd->password)) {
                // Update password
                $new_pwd = bcrypt($data['new_pwd']);
                User::where('id', Auth::User()->id)->update(['password' => $new_pwd]);
                return redirect()->back()->with('flash_message_success', ' رمز عبور با موفقیت به روز شد!');
            } else {
                return redirect()->back()->with('flash_message_error', 'کلمه عبور فعلی نادرست است!');
            }
        }
        $user_id = Auth::user()->id;
        //$userDetails = User::find($user_id);
        $userDetails = User::where('id', $user_id)->first();
        Session::put('pages', 'updatePassword');
        return view('sellers.profiles.update_password', compact('userDetails'));
    }
}
