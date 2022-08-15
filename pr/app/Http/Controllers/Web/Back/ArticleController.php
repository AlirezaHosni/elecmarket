<?php

namespace App\Http\Controllers\Web\Back;

use App\Article;
use App\Http\Controllers\Controller;
use App\Library\Helper;
use App\News;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function allarticles()
    {
        $articles = Article::latest()->get();
        return view('admin.articles.view', compact('articles'));
    }

    public function addarticles(Request $request)
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

            $news = new Article();
            $news->title = $title;
            $news->slug = $slug;
            $news->description = $data['description'];
            $news->status = $status;
            $news->save();
            return redirect('/ad/articles/view')->with('flash_message_success', 'articles ایجاد شد');
        }
        return view('admin.articles.add');
    }

    public function editarticles(Request $request, $id = null)
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

            Article::where(['id' => $id])->update([
                'status' => $status,'title' => $title,'description' => $data['description']
            ]);
            return redirect('ad/articles/view')->with('flash_message_success', 'با موفقیت articles بروز  شد !!!');
        }
        $articles = Article::where(['id' => $id])->first();
        return view('admin.articles.edit', compact('articles'));
    }

    public function deletearticles($id = null)
    {
        Article::where(['id' => $id])->delete();

        return redirect()->back()->with('flash_message_success', ' Article با موفقیت حذف شد');
    }
}
