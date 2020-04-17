<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class CategoryController extends Controller
{
    //
    /**
     * List category
     *
     * @return Response
     * @var request
     */
    function getListCategory()
    {
        $category = Category::all();
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
            $CategoryModel = new Category();
            $CategoryModel->category_name = $post['category_name'];
            $CategoryModel->description = $post['description'];
            $CategoryModel->save();
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
     */

    function getEditCategory($id)
    {
        $category = Category::find($id);
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
            $CategoryModel = Category::find($id);
            $CategoryModel->category_name = $post['category_name'];
            $CategoryModel->description = $post['description'];
            $CategoryModel->save();
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
     * @var request
     */

    function getDeleteCategory($id)
    {
        DB::beginTransaction();
        try {
            $category = Category::find($id);
            $category->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return redirect(route('list_category'));
    }
}
