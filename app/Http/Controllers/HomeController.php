<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $counter;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        DB::delete('DELETE FROM visitors WHERE ip = ?', [$_SERVER['REMOTE_ADDR']]);
        DB::insert('INSERT INTO visitors (ip, created_at) VALUES (?, NOW())', [$_SERVER['REMOTE_ADDR']]);
        $results = DB::select('SELECT COUNT(1) count FROM visitors WHERE TIMESTAMPDIFF(MINUTE, created_at, NOW()) <= 5');
        $this->counter = isset($results[0]->count) ? $results[0]->count : 0;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $counter = $this->counter;
        $news_list = News::orderBy('created_at','desc')->get();

        $ad_list = Advertisement::where('status', 2)
            ->orderBy('created_at','desc')
            ->get();

        return view('frontend.index',compact('news_list', 'ad_list', 'counter'));
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
