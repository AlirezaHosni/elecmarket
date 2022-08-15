<?php

namespace App\Http\Controllers\Web\Seller;

use App\CategoryUser;
use App\Http\Controllers\Controller;
use App\Marketer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function showcat()
    {

        $user_id = Auth::user()->id;
        $usersget = User::where(['id' => $user_id])->first()->type_identity;
        if($usersget=="marketer"){
            return redirect('page/access');
        }else{
            $marks = Marketer::where(['user_id' => $user_id])->first();
            $getall = CategoryUser::where(['user_id' => $user_id])->get();
            //dd($getall);

            return view('sellers.category.show',compact('marks','getall'));
        }

    }
}
