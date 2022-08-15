<?php

namespace App\Http\Controllers\Web\Back;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function DashboardAdmin()
    {
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);
        session(['adminSession', $userDetails->phone]);
        //Session::put('adminSession', $userDetails->username);

        $meta_title = "پنل ادمین";
        return view('admin.account');
    }
}
