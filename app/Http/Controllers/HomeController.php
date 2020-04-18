<?php

namespace App\Http\Controllers;

use App\Category;
use App\Jobs\SendPostEmail;
use App\Post;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Self_;


class HomeController extends Controller
{
    const takeIndex = 2;
    const takeLoadmore = 10;

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

    /**
     * All News Home
     *
     * @return Response
     * @var
     */

    function index(Request $request)
    {
        $categories = Category::all();
        $news1 = DB::table('news')->take(self::takeIndex)
            ->where('category_id', '=', 5)->orderBy('id', 'desc')->get();
        $news2 = DB::table('news')->take(self::takeIndex)
            ->where('category_id', '=', 6)->orderBy('id', 'desc')->get();
        $news3 = DB::table('news')->take(self::takeIndex)
            ->where('category_id', '=', 7)->orderBy('id', 'desc')->get();
        return view('home', compact('news1', 'news2', 'news3', 'categories'));
    }

    /**
     * loadmore Home
     *
     * @return Response
     * @var
     */

    function load_more()
    {
        $categories = Category::all();
        $news = DB::table('news')->take(self::takeLoadmore)->orderBy('id', 'desc')
            ->get();
        return view('loadmoreHome', compact('categories', 'news'));
    }

    /**
     * send mail
     *
     * @return Response
     * @var request
     */

    public function postmail(Request $request)
    {
        $posts= $request->all();
        $request->validate([
           'email'=>'required|email'
        ]);
        $post = new Post();
        $post->email = $posts['email'];
        $post->save();
        $data = [];
        SendPostEmail::dispatch($data);
        return redirect()->back()->with('status','bạn đã đăng kí thành công');
    }
}
