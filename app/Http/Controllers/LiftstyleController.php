<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
define('takeIndex',8);
define('takeLoadmore',10);
class LiftstyleController extends Controller
{
    //
    /**
     * All News Category liftstyle
     *
     * @return Response
     * @var
     */

    function index(){
        $categories = Category::all();
        $news = DB::table('news')->take(8)->where('category_id','=',5)->orderBy('id','desc')->get();
        return view('liftstyle',compact('news','categories'));
    }

    /**
     * Loadmore Category Liftstyle
     *
     * @return Response
     * @var
     */

    function load_more(){
        $categories = Category::all();
        $news = DB::table('news')->take(10)->where('category_id','=',5)->orderBy('id','desc')->get();
        return view('loadmoreHome',compact('categories','news'));
    }
}
