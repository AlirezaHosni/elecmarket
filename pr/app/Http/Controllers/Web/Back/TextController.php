<?php

namespace App\Http\Controllers\Web\Back;

use App\Http\Controllers\Controller;
use App\Text;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function all()
    {
        $r = Text::latest()->get();
        return view('admin.texts.all',compact('r'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            $r = new Text();
            $r->text = $data['text'];
            $r->status = $status;
            $r->save();
            return redirect('/ad/texts/view')->with('flash_message_success', 'texts ایجاد شد');
        }
        return view('admin.texts.add');
    }

    public function edit(Request $request,$id=null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            Text::where(['id' => $id])->update([
                'status' => $status,'text' => $data['text']
            ]);
            return redirect('ad/texts/view')->with('flash_message_success', 'با موفقیت text بروز  شد !!!');
        }
        $r = Text::where('id' , $id)->first();
        return view('admin.texts.edit',compact('r'));
    }

    public function del($id=null)
    {
        Text::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', ' Text با موفقیت حذف شد');
    }
}
