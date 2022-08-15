<?php

namespace App\Http\Controllers\Web\Back;

use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\OrderStatus;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function all()
    {
        $get = OrderStatus::get();
        return view('admin.orders.status.all', compact('get'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $var = Helper::slugfix($data['var']);
            $new = new OrderStatus();
            $new->title = $data['title'];
            $new->var = $var;
            $new->save();
            return redirect('/ad/orders/show-status')->with('flash_message_success', 'OrderStatus ایجاد شد');
        }
        return view('admin.orders.status.add');
    }

    public function edit(Request $request,$id=null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $var = Helper::slugfix($data['var']);
            OrderStatus::where(['id' => $id])->update([
                'var' => $var,'title' => $data['title']
            ]);
            return redirect('/ad/orders/show-status')->with('flash_message_success', 'OrderStatus ویرایش شد');
        }
        $order = OrderStatus::where(['id' => $id])->first();
        return view('admin.orders.status.edit', compact('order'));
    }

    public function delete($id=null)
    {
        OrderStatus::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', ' OrderStatus با موفقیت حذف شد');
    }
}
