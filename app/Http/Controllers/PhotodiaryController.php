<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
define('takeIndex',8);
define('takeLoadmore',10);

class PhotodiaryController extends Controller
{
    //
    /**
     * All News Category Photodiary
     *
     * @return Response
     * @var
     */

    function index(){
        $categories = Category::all();
        $news = DB::table('news')->take(8)->where('category_id','=',6)->orderBy('id','desc')->get();
        return view('photodiary',compact('news','categories'));
    }

    /**
     * Loadmore Category Photodiary
     *
     * @return Response
     * @var
     */

    function load_more(){
        $categories = Category::all();
        $news = DB::table('news')->take(10)->where('category_id','=',6)->orderBy('id','desc')->get();
        return view('loadmoreHome',compact('categories','news'));
    }
}
