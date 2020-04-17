<?php

namespace App\Http\Controllers;

use App\Category;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
define('takeIndex',2);
define('takeLoadmore',10);

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

    /**
     * All News Home
     *
     * @return Response
     * @var request
     */

    function index()
    {
        $categories = Category::all();
        $news1 = DB::table('news')->take(takeIndex)->where('category_id','=',5)->orderBy('id','desc')->get();
        $news2 = DB::table('news')->take(takeIndex)->where('category_id','=',6)->orderBy('id','desc')->get();
        $news3 = DB::table('news')->take(takeIndex)->where('category_id','=',7)->orderBy('id','desc')->get();
        return view('home',compact('news1','news2','news3','categories'));
    }

    /**
     * loadmore Home
     *
     * @return Response
     * @var request
     */

    function load_more(){
        $categories = Category::all();
        $news = DB::table('news')->take(takeLoadmore)->orderBy('id','desc')->get();
        return view('loadmoreHome',compact('categories','news'));
    }

    /**
     * send mail
     *
     * @return Response
     * @var request
     */

    public function postmail(Request $request){
        $input = $request->all();
        Mail::send('blanks',array('name'=>$input['name']),function ($message){
            $message->from('tranhao2019q@gmail.com','Trần Hào');
            $message->to('tranhao2019q@gmail.com','Người lạ');
            $message->subject('đây là mail trần hào');
        });
        echo "
            <script>
                alert('Bạn đã đăng kí thành công');
                window.location = '".url('/home')."'
            </script>
        ";
    }
}
