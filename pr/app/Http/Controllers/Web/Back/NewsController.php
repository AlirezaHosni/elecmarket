<?php

namespace App\Http\Controllers\Web\Back;

use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function allnews()
    {
        $news = News::latest()->get();
        return view('admin.news.view', compact('news'));
    }

    public function addnews(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo '<pre>'; print_r($data);die;
            $title = $data['title'];
            $slug = Helper::slugfix($data['title']);
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }
            $news = new News();
            $news->title = $title;
            $news->slug = $slug;
            $news->news_type = $data['news_type'];
            $news->description = $data['description'];
            $news->status = $status;
            $news->save();
            return redirect('/ad/news/all')->with('flash_message_success', 'news ایجاد شد');
        }
        return view('admin.news.add');
    }

    public function editnews(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $title = $data['title'];
            $slug = Helper::slugfix($data['title']);
            if (empty($data['status'])) {
                $status = '0';
            } else {
                $status = '1';
            }

            News::where(['id' => $id])->update([
                'status' => $status,'title' => $title,'description' => $data['description'],'news_type' => $data['news_type']
            ]);
            return redirect('ad/news/all')->with('flash_message_success', 'با موفقیت news بروز  شد !!!');
        }
        $news = News::where(['id' => $id])->first();
        return view('admin.news.edit', compact('news'));
    }

    public function deletenews($id = null)
    {
        News::where(['id' => $id])->delete();
        return redirect()->back()->with('flash_message_success', ' News با موفقیت حذف شد');
    }
}
