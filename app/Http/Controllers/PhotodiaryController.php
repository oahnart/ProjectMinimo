<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotodiaryController extends Controller
{
    //
    function index(){
        $categories = Category::all();
        $news = DB::table('news')->take(8)->where('category_id','=',6)->orderBy('id','desc')->get();
        return view('photodiary',compact('news','categories'));
    }

    function load_more(){
        $categories = Category::all();
        $news = DB::table('news')->take(10)->where('category_id','=',6)->orderBy('id','desc')->get();
        return view('loadmoreHome',compact('categories','news'));
    }
}
