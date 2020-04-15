<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $news1 = DB::table('news')->take(2)->where('category_id','=',5)->orderBy('id','desc')->get();
        $news2 = DB::table('news')->take(2)->where('category_id','=',6)->orderBy('id','desc')->get();
        $news3 = DB::table('news')->take(2)->where('category_id','=',7)->orderBy('id','desc')->get();
        return view('home',compact('news1','news2','news3','categories'));
    }
}
