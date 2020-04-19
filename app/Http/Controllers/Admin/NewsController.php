<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use App\Repositories\PostRepository;

class NewsController extends Controller
{
    protected $postRepository;
    public function __construct(
        PostRepository $postRepository
    )
    {
        $this->postRepository = $postRepository;
    }
    //
    /**
     * list news
     *
     * @return Response
     * @var
     */
    function getListNews()
    {
        $news = $this->postRepository->allNews();
        $categories = $this->postRepository->allCategory();
        return view('admin.new.ListNews', compact('news', 'categories'));
    }

    /**
     * add new News
     *
     * @return Response
     * @var request
     */

    public function getAddNews()
    {
        $categories  = $this->postRepository->allCategory();
        return view('admin.new.AddNews', compact('categories'));
    }

    public function postAddNews(Request $request)
    {
        DB::beginTransaction();
        try {
            $post = $request->all();
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);
            $newsModel  = $this->postRepository->newNews();
            $newsModel->category_id = $post['category_id'];
            $newsModel->name = $post['name'];
            $newsModel->description = $post['description'];
            if ($newsModel->save()) {
                if ($request->hasFile('news_image_intro')) {
                    $file = $request->news_image_intro;
                    $file_name = $file->getClientOriginalName();
                    $extension_file = $file->getClientOriginalExtension();
                    $temp_file = $file->getRealPath();
                    $file_size = $file->getSize();
                    $file_type = $file->getMimeType();
                    $random = random_int(10000, 50000);
                    $file->move('upload/news',
                        $random . $file->getClientOriginalName());
                    $newsModel->news_image_intro = 'upload/news/' . $random
                        . $file->getClientOriginalName();
                    $newsModel->save();
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw  new Exception($e->getMessage());
        }
        return redirect(route('list_news'));
    }

    /**
     * edit News
     *
     * @return Response
     * @var request
     * @var id
     */

    public function getEditNews($id)
    {
        $news =  $this->postRepository->findNews($id);
        $categories = $this->postRepository->allCategory();
        return view('admin.new.EditNews', compact('news', 'categories'));
    }

    public function postEditNews($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $post = $request->all();
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);
            $newsModel = $this->postRepository->findNews($id);
            $newsModel->category_id = $post['category_id'];
            $newsModel->name = $post['name'];
            $newsModel->description = $post['description'];
            if ($newsModel->save()) {
                if ($request->hasFile('news_image_intro')) {
                    $file = $request->news_image_intro;
                    $file_name = $file->getClientOriginalName();
                    $extension_file = $file->getClientOriginalExtension();
                    $temp_file = $file->getRealPath();
                    $file_size = $file->getSize();
                    $file_type = $file->getMimeType();
                    $random = random_int(10000, 50000);
                    $file->move('upload/news',
                        $random . $file->getClientOriginalName());
                    $newsModel->news_image_intro = 'upload/news/' . $random
                        . $file->getClientOriginalName();
                    $newsModel->save();
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw  new Exception($e->getMessage());
        }
        return redirect(route('list_news'));
    }

    /**
     * delete news
     *
     * @return Response
     * @var id
     */
    public function getDeleteNews($id)
    {
        DB::beginTransaction();
        try {
            $news = $this->postRepository->findNews($id);
            $news->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw  new Exception($e->getMessage());
        }
        return redirect(route('list_news'));
    }
}
