<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news_list = News::orderBy('created_at','desc')->get();

        $ad_list = Advertisement::where('status', 2)
            ->orderBy('created_at','desc')
            ->get();

        return view('frontend.index',compact('news_list', 'ad_list'));
    }

    public function articleDetails($id)
    {
        $news = News::findOrFail($id);

        return view('frontend.details',compact('news'));
    }
    
    public function categoryNews($id, $category_slug = null)
    {
        $news_list = News::where('id', -1)
            ->orderBy('created_at','desc')
            ->get();

        $ad_list = Advertisement::where('status', 2)
            ->orderBy('created_at','desc')
            ->get();

        return view('frontend.index',compact('news_list', 'ad_list'));
    }
}
