<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class CategoryController extends Controller
{
    //
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    /**
     * List category
     *
     * @return Response
     * @var
     */
    function getListCategory()
    {
        $category = $this->postRepository->allCategory();
        return view('admin.category.ListCategory', compact('category'));
    }

    /**
     * Add new category
     *
     * @return Response
     * @var request
     */

    function getAddCategory()
    {
        return view('admin.category.AddCategory');
    }

    function postAddCategory(Request $request)
    {
        DB::beginTransaction();
        try {
            $post = $request->all();
            $request->validate([
                'category_name' => 'required',
                'description' => 'required',
            ]);
            $CategoryModel = $this->postRepository->newCategory();
            $CategoryModel->category_name = $post['category_name'];
            $CategoryModel->description = $post['description'];
            $this->postRepository->save($CategoryModel);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return redirect(route('list_category'));
    }

    /**
     * Edit category
     *
     * @return Response
     * @var request
     * @var id
     */

    function getEditCategory($id)
    {
        $category = $this->postRepository->findCategory($id);
        return view('admin.category.EditCategory', compact('category'));
    }

    function postEditCategory($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $post = $request->all();
            $request->validate([
                'category_name' => 'required',
                'description' => 'required',
            ]);
            $CategoryModel = $this->postRepository->findCategory($id);
            $CategoryModel->category_name = $post['category_name'];
            $CategoryModel->description = $post['description'];
            $this->postRepository->save($CategoryModel);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return redirect(route('list_category'));
    }


    /**
     * delete category
     *
     * @return Response
     * @var id
     */

    function getDeleteCategory($id)
    {
        DB::beginTransaction();
        try {
            $category = $this->postRepository->findCategory($id);
            $this->postRepository->delete($category);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return redirect(route('list_category'));
    }
}
