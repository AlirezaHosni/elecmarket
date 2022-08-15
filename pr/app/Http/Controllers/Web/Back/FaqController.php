<?php

namespace App\Http\Controllers\Web\Back;

use App\CatFaq;
use App\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\Helper;
class FaqController extends Controller
{
    public function all()
    {
        $cat = CatFaq::latest()->get();
        return view('admin.faq.cats.all',compact('cat'));
    }

    public function catadd(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $cat = new CatFaq();
            $cat->title = $data['title'];
            $cat->save();
            return redirect('ad/faqs')->with('flash_message_success', 'دسته بندی ایجاد شد!!!');
        }
        return view('admin.faq.cats.add');
    }
    public function catdel($id)
    {
        CatFaq::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'دسته بندی با موفقیت حذف شد !!!');
    }

    public function catedit(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            CatFaq::where(['id' => $id])->update([
                 'title' => $data['title']
            ]);
            return redirect('ad/faqs')->with('flash_message_success', 'دسته بندی ایجاد شد!!!');
        }
        $cat = CatFaq::where('id',$id)->first();
        return view('admin.faq.cats.edit',compact('cat'));
    }


    //faq

    public function allFaq($id=null){
        $faq = Faq::where(['catfaq_id' => $id])->get();
        $cat_id = $id;
        $cat_name = CatFaq::where(['id' => $id])->first()->title;
        return view('admin.faq.all',compact('faq','cat_id','cat_name'));
    }

    public function addFaq(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            //dd($data);
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            $slugfix = Helper::slugfix($data['title']);
            $faq = new Faq();
            $faq->title = $data['title'];
            $faq->catfaq_id = $data['cat_id'];
            $faq->des = $data['des'];
            $faq->status = $status;
            $faq->url = $slugfix;
            $faq->save();
            
            return redirect('ad/faqs')->with('flash_message_success', 'دسته بندی ایجاد شد!!!');
        }
        $cat_id = $id;
        $cat_name = CatFaq::where(['id' => $id])->first()->title;
        return view('admin.faq.add',compact('cat_id','cat_name'));
    }

    public function editFaq(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            Faq::where(['id' => $id])->update([
                 'title' => $data['title'],'des' => $data['des'],
                 'status' => $status
            ]);
            return redirect('ad/faqs')->with('flash_message_success', 'دسته بندی ایجاد شد!!!');
        }
        $faq = Faq::where('id', $id)
           ->first();

        return view('admin.faq.edit',compact('faq'));
    }

    public function delFaq($id=null){
        Faq::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'سوالات متدوال  با موفقیت حذف شد !!!');
    }
}
