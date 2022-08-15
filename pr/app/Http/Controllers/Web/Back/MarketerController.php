<?php

namespace App\Http\Controllers\Web\Back;

use App\Category;
use App\CategoryUser;
use App\Http\Controllers\Controller;
use App\Marketer;
use Illuminate\Http\Request;

class MarketerController extends Controller
{
    public function catmarker(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $check = CategoryUser::where(['category_id' => $data['category_id'], 'user_id' => $id])->count();
            if ($check > 0) {
                return redirect()->back();
            } else {
                $new = new CategoryUser();
                $new->user_id = $id;
                $new->category_id = $data['category_id'];
                $new->countdown_category = $data['countdown_category'];
                $new->save();
                return redirect()->back()->with('flash_message_success', 'اطلاعات بروز شد');
            }
        }
        $category = Category::where(['parent_id' => 0])->latest()->get();
        $mark = CategoryUser::where(['user_id' => $id])->first();
        $marks = Marketer::where(['user_id' => $id])->first();
        $getall = CategoryUser::where(['user_id' => $id])->get();
        $user_id = $id;
        return view('admin.markers.catmarker', compact('category', 'user_id', 'mark', 'getall', 'marks'));
    }

    public function catmarkerdel($id=null)
    {
        CategoryUser::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'دسته بندی پاک   شد');
    }
}
