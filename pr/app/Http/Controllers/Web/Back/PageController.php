<?php

namespace App\Http\Controllers\Web\Back;

use App\Complaint;
use App\Http\Controllers\Controller;
use App\Job;
use App\Library\Helper;
use App\Menu;
use App\Page;
use App\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class PageController extends Controller
{
    public function viewPages()
    {
        $page = Page::latest()->paginate(5);
        return view('admin.pages.view_pages', compact('page'));
    }

    public function addPage(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo '<pre>'; print_r($data);die;
            $title = $data['title'];
            $slug = Helper::slugfix($data['title']);
            $meta_title = $title;
            $meta_des = substr($data['description'], 200);
            $meta_key = $title;
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            //uploads
            $image_path = $data['cover'];
            $extension = $image_path->getClientOriginalExtension();
            $New_path = rand(111111, 999999999) . '.' . $extension;
            $path_path = 'upload/pages' . '/' . 'pages/' . 'large' . '/';
            $large_path = $path_path . $New_path;
            if (!File::isDirectory($path_path)) {
                File::makeDirectory($path_path, $mode = 0777, true, true);
            }
            Image::make($image_path)->resize(1120, 460)->save($large_path);
            //uploads
            //save
            $pages = new Page();
            $pages->title = $title;
            $pages->slug = $slug;
            $pages->page_type = $data['page_type'];
            $pages->description = $data['description'];
            $pages->description_short = $data['description_short'];
            $pages->meta_title = $meta_title;
            $pages->meta_description = $meta_title;
            $pages->meta_keyword = $meta_key;
            $pages->cover_path = $large_path;
            $pages->status = $status;
            $pages->save();
            return redirect('/ad/pages/view')->with('flash_message_success', 'pages ایجاد شد');
        }
        return view('admin.pages.add_page');
    }

    public function editPage(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $title = $data['title'];
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            if (empty($data['cover'])) {
                $large_path = $data['cover_img'];
            } else {
                $cover_path = $data['cover_img'];
                //echo '<pre>'; print_r($cover_path);die;
                if (file_exists($cover_path)) {
                    unlink($cover_path);
                }
                if ($request->hasFile('cover')) {
                    //uploads

                    $image_path = $data['cover'];
                    $extension = $image_path->getClientOriginalExtension();
                    $New_path = rand(111111, 999999999) . '.' . $extension;
                    $path_path = 'upload/pages' . '/' . 'pages/' . 'large' . '/';
                    $large_path = $path_path . $New_path;
                    if (!File::isDirectory($path_path)) {
                        File::makeDirectory($path_path, $mode = 0777, true, true);
                    }
                    Image::make($image_path)->resize(1120, 460)->save($large_path);
                    //upoload
                } else {

                }
            }
            Page::where(['id' => $id])->update([
                'status' => $status, 'title' => $title, 'description' => $data['description'], 'description_short' => $data['description_short'],
                'cover_path' => $large_path, 'page_type' => $data['page_type']
            ]);
            return redirect('ad/pages/view')->with('flash_message_success', 'با موفقیت page بروز  شد !!!');
        }
        $page = Page::where('id', $id)->first();
        return view('admin.pages.edit_page', compact('page'));
    }

    public function deletePage($id = null)
    {
        $pages = Page::where('id', $id)->first();
        $newpath = $pages->path . $pages->file_name;
        if (file_exists($newpath)) {
            unlink($newpath);
        }
        Menu::where(['page_id' => $id])->delete();
        Page::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', ' page با موفقیت حذف شد');
    }

    public function support()
    {
        $contectus = Support::get();
        return view('admin.pages.view_contect', compact('contectus'));
    }

    public function viewComplaints()
    {
        $complaint = Complaint::paginate(10);
        return view('admin.pages.view_complaints', compact('complaint'));
    }

    public function req()
    {
        $req = Job::latest()->get();
        return view('admin.pages.req', compact('req'));
    }
}
