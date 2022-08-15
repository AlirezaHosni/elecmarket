<?php

namespace App\Http\Controllers\Web\Back;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Supplement;
use App\Product;
class LinkedController extends Controller
{
    public function index($id=null)
    {
        $sup = Supplement::where('main', $id)->get();
       
        $main_id = $id;
        return view('admin.linkeds.index',compact('sup','main_id'));
    }
    public function del($id=null)
    {
        Supplement::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', ' محصول مرتبط با موفقیت حذف شد');
    }

    public function linkedadd(Request $request,$id=null){
        if ($request->isMethod('post')) 
        {
            $data = $request->all();
            $main = $data['main'];
            $linked = $data['linked'];
            //echo '<pre>'; print_r($data);die;
            if($linked==0){
                return redirect()->back()->with('flash_message_success', 'مشکلی به وجود آمده');
            }
            $check = Supplement::where(['main' => $main,'linked' => $linked])
               ->count();
               if($check > 0){
                return redirect()->back()->with('flash_message_success', 'محصول تکرار می باشد');
            }
            
            $newlinked = new Supplement();
            $newlinked->main = $main;
            $newlinked->linked = $linked;
            $newlinked->save();
            return redirect('ad/products/related/'.$main)->with('flash_message_success', 'با موفقیت ایجاد شد');

        }
        $pro = Product::where('id', $id)->first();
        $related = Product::where('status', 1)
            ->whereNotIn('id',[$pro->id])
           ->orderBy('title', 'desc')
           ->get();
          
        return view('admin.linkeds.add',compact('pro','related'));
    }
}
