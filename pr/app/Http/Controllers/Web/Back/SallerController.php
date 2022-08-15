<?php

namespace App\Http\Controllers\Web\Back;

use App\Category;
use App\CategoryUser;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\Marketer;
use App\Profile;
use App\Province;
use App\User;
use Illuminate\Http\Request;

class SallerController extends Controller
{
    public function index()
    {
        $saller = User::where(['is_admin' => '0', 'is_seller' => 1])->with('marketers')->latest()->get();
        //dd($saller);
        //echo "<pre>"; print_r($saller); die;
        return view('admin.sellers.all', compact('saller'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $phones = $data['phone'];
            $string_2 = substr($phones, 5, 6);
            $username = "EM" . $string_2;
            //dd($string_2);
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
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
                $user->is_seller = '1';
                $user->identifiercode = $username;
                $user->type_identity = $data['seller'];
                $user->save();
                $user_id = User::latest()->first()->id;
                $profile = new Profile();
                $profile->user_id = $user_id;
                $profile->first_name = $data['first_name'];
                $profile->last_name = $data['last_name'];
                $profile->nationalcode = $data['nationalcode'];
                $profile->gender = $data['gender'];
                $profile->save();
                //market
                $marketer = new Marketer();
                $marketer->user_id = $user_id;
                $marketer->save();
                return redirect('ad/seller')->with('flash_message_success', 'فروشنده مورد نظر ایجاد شد');
            }

        }
        return view('admin.sellers.add');
    }

    public function edit(Request $request, $id = null)
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
                'status' => $status, 'username' => $data['username'], 'password' => $pass, 'type_identity' => $data['seller']
            ]);
            return redirect('ad/seller')->with('flash_message_success', 'فروشنده ویرایش شد');
        }
        $user = User::where('id', $id)->first();
        return view('admin.sellers.edit', compact('user'));
    }

    public function delete($id = null)
    {
        Profile::where(['user_id' => $id])->delete();
        Marketer::where(['user_id' => $id])->delete();
        User::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'فروشنده پاک شد');
    }

    public function marker(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $agree_start = Helper::DateNameShamsiToConvertDateNumber($data['agree_start']);
            $agree_end = Helper::DateNameShamsiToConvertDateNumber($data['agree_end']);
            //echo "<pre>"; print_r($data); die;
            Marketer::where(['user_id' => $id])->update([
                'score' => $data['score'], 'agree_start' => $agree_start, 'agree_end' => $agree_end,
                'income_max' => $data['income_max'],
                'heir_name' => $data['heir_name'],
            ]);
            return redirect('ad/seller')->with('flash_message_success', 'اطلاعات بروز شد');
        }
        $category = Category::latest()->get();
        $mark = Marketer::where(['user_id' => $id])->first();
        $user_id = $id;
        return view('admin.sellers.marker', compact('category', 'user_id', 'mark'));
    }

    public function categorymarker(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['code_seller_seller'])) {
                $code_seller_seller = "";
            } else {
                $code_seller_seller = $data['code_seller_seller'];
            }

            $check = CategoryUser::where(['category_id' => $data['category_id'], 'user_id' => $id])->count();
            if ($check > 0) {
                return redirect()->back();
            } else {
                $new = new CategoryUser();
                $new->user_id = $id;
                $new->category_id = $data['category_id'];
                $new->countdown_category = $data['countdown_category'];
                $new->code_seller_seller = $code_seller_seller;
                $new->save();
                return redirect()->back()->with('flash_message_success', 'اطلاعات بروز شد');
            }

        }
        $category = Category::where(['parent_id' => 0])->latest()->get();
        $mark = CategoryUser::where(['user_id' => $id])->first();
        $marks = Marketer::where(['user_id' => $id])->first();
        $getall = CategoryUser::where(['user_id' => $id])->get();
        $user_id = $id;
        return view('admin.sellers.catmarker', compact('category', 'user_id', 'mark', 'getall', 'marks'));
    }

    public function catdelete(Request $request, $id = null)
    {
        CategoryUser::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'دسته بندی پاک   شد');
    }

    public function getcat(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $category_id = $data['category_id'];
            $sub = Category::where(['parent_id' => $category_id])->latest()->get();
            $t = "";
            $t .= '<option value="0">انتخاب دسته بندی</option>';
            foreach ($sub as $row) {
                $t .= '<option value="' . $row->id . '">' . $row->title . '</option>';

            }
            echo $t;
            //dd($data);
        }
    }

    public function complate(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $seller_id = $data['seller_id'];
            if (empty($data['code_seller_seller'])) {
                $code_seller_seller = null;
            } else {
                $code_seller_seller = $data['code_seller_seller'];
            }
            $cat = $data['category_id'];
            //echo "<pre>"; print_r($data); die;
            CategoryUser::where(['user_id' => $seller_id, 'category_id' => $cat])->update([
                'buy_max_category' => $data['buy_max_category'], 'discount_category' => $data['discount_category'], 'code_seller_seller' => $code_seller_seller
            ]);
            return redirect('ad/seller')->with('flash_message_success', 'اطلاعات بروز شد');;
        }
        $marks = Marketer::where(['user_id' => $id])->first();
        $getall = CategoryUser::where(['user_id' => $id])->get();
        //dd($getall);
        $user_id = $id;
        return view('admin.sellers.complate', compact('user_id', 'getall', 'marks'));
    }

    public function bazzarindex(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $phones = $data['phone'];
            $string_2 = substr($phones, 5, 6);
            $username = "AT" . $string_2;
            //dd($string_2);
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
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
                $user->is_bazzar = '1';
                $user->identifiercode = $username;
                $user->save();
                $user_id = User::latest()->first()->id;
                $profile = new Profile();
                $profile->user_id = $user_id;
                $profile->first_name = $data['first_name'];
                $profile->last_name = $data['last_name'];
                $profile->nationalcode = $data['nationalcode'];
                $profile->gender = $data['gender'];
                $profile->save();
                //market
                $marketer = new Marketer();
                $marketer->user_id = $user_id;
                $marketer->marketer = "bazzar";
                $marketer->save();
                return redirect('ad/bazzar')->with('flash_message_success', 'بازاریاب مورد نظر ایجاد شد');
            }
        }
        $getbazzar = User::where('is_bazzar', '1')->get();
        return view('admin.bazzars.show', compact('getbazzar'));
    }

    public function state(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            Marketer::where(['user_id' => $id])->update([
                'state_id' => $data['state']

            ]);
            return redirect('ad/seller')->with('flash_message_success', 'اطلاعات بروز شد');;
        }
        $mark = Marketer::where(['user_id' => $id])->first();
        $user_id = $id;
        $state = Province::orderBy('name')->get();
        return view('admin.sellers.state', compact('mark', 'user_id', 'state'));
    }

    public function marketer(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            Marketer::where(['user_id' => $id])->update([
                'income_max' => $data['income_max']
            ]);
            return redirect('ad/seller')->with('flash_message_success', 'اطلاعات بروز شد');
        }
        $category = Category::latest()->get();
        $mark = Marketer::where(['user_id' => $id])->first();
        $user_id = $id;
        return view('admin.sellers.marketer', compact('category', 'user_id', 'mark'));
    }


}
