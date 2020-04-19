<?php

namespace App\Repositories;

use App\Category;
use App\Jobs\SendPostEmail;
use App\News;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//class PostRepository extends BaseRepository
class PostRepository implements PostRepositoryInterface
{
    public function allCategory()
    {
        return Category::all();
    }

    public function allNews()
    {
        return News::all();
    }


    public function getIndex($id_category, $PAGE_SIZE)
    {
        $data = DB::table('news')->take($PAGE_SIZE)
            ->where('category_id', '=', $id_category)->orderBy('id', 'desc')
            ->get();
        return $data;
    }

    public function getLoadMore($PAGE_SIZE)
    {
        $data = DB::table('news')->take($PAGE_SIZE)
            ->orderBy('id', 'desc')
            ->get();
        return $data;
    }

    public function newCategory()
    {
        return new Category();
    }

    public function newNews()
    {
        return new News();
    }

    public function newPost()
    {
        return new Post();
    }

    public function findCategory($id)
    {
        return Category::find($id);
    }

    public function findNews($id)
    {
        return News::find($id);
    }

}