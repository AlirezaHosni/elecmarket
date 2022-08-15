<?php

namespace App\Http\Controllers\Web\Front;

use App\Article;
use App\CatReq;
use App\Complaint;
use App\GallerySite;
use App\Honor;
use App\Http\Controllers\Controller;
use App\Job;
use App\Library\Helper;
use App\Library\Sms;
use App\Library\SmsHelper;
use App\News;
use App\Page;
use App\Product;
use App\Req;
use App\Setting;
use App\Support;
use App\Worked;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use Jorenvh\Share\Share;

class IndexController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $news = News::latest()->take(9)->get();
        }else{
            $news = News::where('news_type','public')->latest()->take(9)->get();
        }

        $article = Article::latest()->take(9)->get();
        $imagesite = GallerySite::latest()->take(3)->get();
        $honor = Honor::latest()->take(3)->get();
        $works = Worked::latest()->get();
        $settings = Setting::latest()->first();
        return view('front.index', compact('news', 'article', 'imagesite', 'honor', 'works', 'settings'));
    }

    public function req(Request $request, $url = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $req = new Req();
            $req->type = $data['type'];
            $req->name = $data['name'];
            $req->tel = $data['tel'];
            //$req->email = $data['email'];
            $req->massage = $data['massage'];
            $req->save();

            return redirect()->back()->with('flash_message_error', 'پیام شما با موفقیت ثبت شد به زودی با شما تماس میگیریم!!');
        }
        $settings = Setting::latest()->first();
        $reqs = CatReq::where('slug', $url)->first();
        return view('front.req', compact('settings', 'reqs'));
    }

    public function support(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if (empty($data['tel'])) {
                $tel = '0';
            } else {
                $tel = $data['tel'];
            }
            if (empty($data['email'])) {
                $email = '0';
            } else {
                $email = $data['email'];
            }
            $new = new Support();
            $new->name = $data['name'];
            $new->tel = $tel;
            $new->email = $email;
            $new->receiver = $data['receiver'];
            $new->priority = $data['priority'];
            $new->topic = $data['topic'];
            $new->massage = $data['massage'];
            $new->save();
            return redirect()->back()->with('flash_message_error', 'پیام شما با موفقیت ثبت شد به زودی با شما تماس میگیریم!!');
        }
        $settings = Setting::latest()->first();
        return view('front.pages.support')->with(compact('settings'));
    }

    public function pages($url)
    {
        $cmsPageCount = Page::where(['slug' => $url, 'status' => 1])->count();
        if ($cmsPageCount > 0) {
            $cmsPageDatails = Page::where('slug', $url)->first();
        } else {
            abort(404);
        }
        $settings = Setting::latest()->first();
        return view('front.pages.page')->with(compact('cmsPageDatails', 'settings'));

    }

    public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $search_product = $data['pcode'];
            $productsAll = Product::where(function ($query) use ($search_product) {
                $query->where('title', 'like', '%' . $search_product . '%')
                    ->orWhere('slug', 'like', '%' . $search_product . '%')
                    ->orWhere('description', 'like', '%' . $search_product . '%')
                    ->orWhere('description_short', 'like', '%' . $search_product . '%');
            })->where('status', 1)->paginate(5);
            $settings = Setting::latest()->first();
            return view('front.search.searching', compact('productsAll', 'settings', 'search_product'));
        } else {
            return redirect('/');
        }
    }

    public function checkrahgiri(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rahgiri = $data['rahgiri'];
            $check = Complaint::where('code', $rahgiri)->count();
            if ($check > 0) {
                $coms = Complaint::where('code', $rahgiri)->first();
                $stats = $coms->status;
                return redirect()->back()->with('flash_message_error', 'وضعیت پیام به این شکل می باشد:' . $stats);
            } else {
                return redirect()->back()->with('flash_message_error', 'پیام مورد نظر ثبت نشد است');
            }
        }
    }

    public function complaints(Request $request)
    {
        //dd('dddd');
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $code = Helper::generatecodes();
            $tel = $data['tel'];
            $new = new Complaint();
            $new->name = $data['name'];
            $new->code = $code;
            $new->tel = $data['tel'];
            $new->type = $data['type'];
            $new->massage = $data['massage'];
            $new->status = "open";
            $new->save();
            $username = "09126896736";
            $password = '987Moh456$';
            $from = "+985000125475";
            $pattern_code = "broc4vx6vu";
            $to = array($tel);
            $input_data = array("product_title" => $code);
            $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
            $handler = curl_init($url);
            curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
            $SendMessage = curl_exec($handler);
            // $sendsms = new SmsHelper('+985000125475',array($tel),$code,'broc4vx6vu');
            //$sendsms->sendsms();
            return redirect()->back()->with('flash_message_error', 'پیام شما با موفقیت ثبت شد به زودی با شما تماس میگیریم!!');
        }
        $settings = Setting::latest()->first();
        return view('front.pages.complaints')->with(compact('settings'));
    }

    public function jobs(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            echo "<pre>"; print_r($data); die;
            $job = new Job();
            $job->name = $data['name'];
            $job->post = $data['post'];
            $job->phone = $data['phone'];
            $job->tel = $data['tel'];
            $job->email = $data['email'];
            $job->company = $data['company'];
            $job->brand = $data['brand'];
            $job->product = $data['product'];
            $job->massage = $data['massage'];
            $job->save();
            return redirect()->back()->with('flash_message_error', 'پیام شما با موفقیت ثبت شد به زودی با شما تماس میگیریم!!');
        }
        $settings = Setting::latest()->first();
        return view('front.pages.jobs')->with(compact('settings'));
    }

    public function ShareWidget($id = null)
    {
        $pro = Product::where(['id' => $id])->first();
        $url = '/product/'.$id.'/'.$pro->slug;
        return Share::currentPage()->whatsapp();
        Share::page('http://jorenvanhocht.be', 'Share title')
            ->facebook()
            ->twitter()
            ->linkedin('shere')
            ->whatsapp()
            ->getRawLinks();
    }
}
