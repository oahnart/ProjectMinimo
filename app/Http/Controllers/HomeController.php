<?php

namespace App\Http\Controllers;

use App\Category;
use App\Jobs\SendPostEmail;
use App\Post;
use App\Repositories\PostRepository;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Self_;


class HomeController extends Controller
{
    const PAGE_SIZE = 2 ;
    const PAGE_SIZE_LOADMORE = 10 ;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth');
        $this->postRepository = $postRepository;
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

    function index()
    {
        $categories = $this->postRepository->allCategory();
        $news1 = $this->postRepository->getIndex(5,self::PAGE_SIZE);
        $news2 = $this->postRepository->getIndex(6,self::PAGE_SIZE);
        $news3 = $this->postRepository->getIndex(7,self::PAGE_SIZE);
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
        $categories = $this->postRepository->allCategory();
        $news = $this->postRepository->getLoadMore(self::PAGE_SIZE_LOADMORE);
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
        $post = $this->postRepository->newPost();
        $post->email = $posts['email'];
        $post->save();
        $data = [];
        $this->dispatch(new SendPostEmail($data));
        return redirect()->back()->with('status','bạn đã đăng kí thành công');
    }
}
