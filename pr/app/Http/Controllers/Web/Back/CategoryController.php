<?php

namespace App\Http\Controllers\Web\Back;

use App\Category;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $categories = Category::with('parent')
            ->where('parent_id', 0)
            ->get();
			//dd($categories);
        $cat = Category::with('parent')
            ->get();
        return view('admin.categories.all', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $slugfix = Helper::slugfix($data['title']);
            if (!empty($data['category_id'])) {
                $cat_patent = $data['category_id'];
            } else {
                $cat_patent = 0;
            }
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            $categories = new Category();
            $categories->parent_id = $cat_patent;
            $categories->title = $data['title'];
            $categories->description = $data['description'];
            $categories->slug = $slugfix;
            $categories->status = $status;
            $categories->save();
            return redirect('ad/categories');
        }
        $categories = Category::with('parent')
            ->where('parent_id', 0)
            ->get();
        return view('admin.categories.add', compact('categories'));
    }

    public function editCategory(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($id==$data['category_id']){
                return redirect()->back()->with('flash_message_error', 'دسته بندی مادر نمیتواند با خود دسته بندی یکی باشد ');
            }
            if (!empty($data['category_id'])) {
                $cat_patent = $data['category_id'];
            } else {
                $cat_patent = 0;
            }
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            Category::where(['id' => $id])->update([
                'status'=>$status,'parent_id' => $cat_patent,'title' => $data['title'],'description' => $data['description']
            ]);
            return redirect('ad/categories');

        }
        $categories = Category::with('children')
            ->where('parent_id', 0)
            ->get();
        $category = Category::whereId($id)->first();
        return view('admin.categories.edit', compact('categories', 'category'));
    }

    public function deleteCategory($id = null)
    {
        //$id->children()->delete();
        Category::with('children')->where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', 'دسته بندی با موفقیت حذف شد !!!');
    }
}
