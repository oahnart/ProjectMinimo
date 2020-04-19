<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiftstyleController extends Controller
{
    const PAGE_SIZE = 8 ;
    const PAGE_SIZE_LOADMORE = 10 ;
    //
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    /**
     * All News Category liftstyle
     *
     * @return Response
     * @var
     */

    function index(){
        $categories = $this->postRepository->allCategory();
        $news = $this->postRepository->getIndex(5,self::PAGE_SIZE);
        return view('liftstyle',compact('news','categories'));
    }

    /**
     * Loadmore Category Liftstyle
     *
     * @return Response
     * @var
     */

    function load_more(){
        $categories = $this->postRepository->allCategory();
        $news = $this->postRepository->getIndex(5,self::PAGE_SIZE_LOADMORE);
        return view('loadmoreHome',compact('categories','news'));
    }
}
