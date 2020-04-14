<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    function getListNews()
    {
        $news = News::all();
        $categories = Category::all();
        return view('admin.new.ListNews', compact('news','categories'));
    }

    function getAddNews()
    {
        $categories = Category::all();
        return view('admin.new.AddNews',compact('categories'));
    }

    function postAddNews(Request $request)
    {
        $post = $request->all();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $newsModel = new News();
        $newsModel->category_id = $post['category_id'];
        $newsModel->name = $post['name'];
        $newsModel->description = $post['description'];
        $newsModel->created_at = date('d-m-Y h:m');
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
        return redirect(route('list_news'));
    }

    function getEditNews($id){
        $news = News::find($id);
        $categories = Category::all();
        return view('admin.new.EditNews',compact('news','categories'));
    }

    function postEditNews($id , Request $request){
        $post = $request->all();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $newsModel = News::find($id);
        $newsModel->category_id = $post['category_id'];
        $newsModel->name = $post['name'];
        $newsModel->description = $post['description'];
        $newsModel->created_at = date('d-m-Y h:m');
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
        return redirect(route('list_news'));
    }

    function getDeleteNews($id){
        $news=News::find($id);
        $news->delete();
        return redirect(route('list_news'));
    }
}
