<?php

namespace App\Http\Controllers\Web\Back;

use App\Http\Controllers\Controller;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $user = User::where(['is_admin' => '0', 'is_seller' => 0])->latest()->get();
        //echo "<pre>"; print_r($saller); die;
        return view('admin.customer.all', compact('user'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            if (empty($data['is_admin'])) {
                $is_admin = '0';
            } else {
                $is_admin = '1';
            }
            $phones = $data['phone'];
            $string_2 = substr($phones, 5, 6);
            $username = "EM" . $string_2;
            $checkusert = User::where('phone', $data['phone'])->count();
            if ($checkusert > 0) {
                return redirect()->back()->with('flash_message_success', 'شماره تماس تکرای است ');
            } else {
                //create user
                $user = new User();
                $user->username = $username;
                $user->phone = $data['phone'];
                $user->password = bcrypt($data['password']);
                $user->status = $status;
                $user->type_identity = "user";
                $user->save();
                $user_id = User::latest()->first()->id;
                $profile = new Profile();
                $profile->user_id = $user_id;
                $profile->first_name = $data['first_name'];
                $profile->last_name = $data['last_name'];
                $profile->nationalcode = $data['nationalcode'];
                $profile->gender = $data['gender'];
                $profile->save();
                return redirect('ad/customers')->with('flash_message_success', 'کاربری ایجاد شد!!!');
            }

        }
        return view('admin.customer.add');
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            $pass = bcrypt($data['password']);
            User::where(['id' => $id])->update([
                'status' => $status, 'username' => $data['username'], 'password' => $pass
            ]);
            return redirect('ad/customers')->with('flash_message_success', 'کاربری ویرایش شد');
        }
        $user = User::where('id', $id)->first();
        return view('admin.customer.edit', compact('user'));
    }

    public function delete($id)
    {
        User::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'مشتری با موفقیت حذف شد !!!');
    }
}
