<?php

namespace App\Http\Controllers\Web\Front;

use App\Article;
use App\Brand;
use App\Honor;
use App\Http\Controllers\Controller;
use App\News;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index($url)
    {
        $articleCount = Article::where(['slug' => $url, 'status' => 1])->count();
        if ($articleCount > 0) {
            $articleDatails = Article::where('slug', $url)->first();
        } else {
            abort(404);
        }
        $settings = Setting::latest()->first();
        return view('front.articles.index')->with(compact('articleDatails','settings'));
    }

    public function news($url)
    {
        $articleCount = News::where(['slug' => $url, 'status' => 1])->count();
        if ($articleCount > 0) {
            $articleDatails = News::where('slug', $url)->first();
        } else {
            abort(404);
        }
        $settings = Setting::latest()->first();
        return view('front.articles.news')->with(compact('articleDatails','settings'));
    }

    public function brands($url)
    {
        $articleCount = Brand::where(['slug' => $url, 'status' => 1])->count();
        if ($articleCount > 0) {
            $articleDatails = Brand::where('slug', $url)->first();
        } else {
            abort(404);
        }
        $settings = Setting::latest()->first();
        return view('front.articles.brands')->with(compact('articleDatails','settings'));
    }

    public function awards($url)
    {
        $articleCount = Honor::where(['slug' => $url, 'status' => 1])->count();
        if ($articleCount > 0) {
            $articleDatails = Honor::where('slug', $url)->first();
        } else {
            abort(404);
        }
        $settings = Setting::latest()->first();
        return view('front.articles.awards')->with(compact('articleDatails','settings'));
    }

    public function allarticle()
    {
        $all = Article::latest()->get();
        return view('front.articles.article_all',compact('all'));
    }

    public function allnews()
    {
        $all = News::latest()->get();
        if(Auth::check()){
            $all = News::latest()->get();
        }else{
            $all = News::where('news_type','public')->latest()->get();
            //$news = News::where('news_type','public')->latest()->take(9)->get();
        }
        return view('front.articles.news_all',compact('all'));
    }
}
