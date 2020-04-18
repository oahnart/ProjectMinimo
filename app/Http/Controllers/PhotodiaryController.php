<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PhotodiaryController extends Controller
{
    const takeIndex = 8;
    const takeLoadmore = 10;
    //
    /**
     * All News Category Photodiary
     *
     * @return Response
     * @var
     */

    function index(){
        $categories = Category::all();
        $news = DB::table('news')->take(self::takeIndex)->where('category_id','=',6)->orderBy('id','desc')->get();
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
        $news = DB::table('news')->take(self::takeLoadmore)->where('category_id','=',6)->orderBy('id','desc')->get();
        return view('loadmoreHome',compact('categories','news'));
    }
}
