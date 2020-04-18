<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiftstyleController extends Controller
{
    const takeIndex = 8;
    const takeLoadmore = 10;
    //
    /**
     * All News Category liftstyle
     *
     * @return Response
     * @var
     */

    function index(){
        $categories = Category::all();
        $news = DB::table('news')->take(self::takeIndex)->where('category_id','=',5)->orderBy('id','desc')->get();
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
        $news = DB::table('news')->take(self::takeLoadmore)->where('category_id','=',5)->orderBy('id','desc')->get();
        return view('loadmoreHome',compact('categories','news'));
    }
}
