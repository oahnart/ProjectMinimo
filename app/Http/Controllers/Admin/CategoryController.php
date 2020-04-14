<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    function getListCategory(){
        $category = Category::all();
        return view('admin.category.ListCategory',compact('category'));
    }

    function getAddCategory(){
        return view('admin.category.AddCategory');
    }

    function postAddCategory(Request $request){
        $post = $request->all();
        $request->validate([
            'category_name' => 'required',
            'description' => 'required',
        ]);
        $CategoryModel = new Category();
        $CategoryModel -> category_name = $post['category_name'];
        $CategoryModel->description = $post['description'];
        $CategoryModel ->created_at = date('d-m-Y h:m');
        $CategoryModel->save();
        return redirect(route('list_category'));
    }

    function getEditCategory($id){
        $category = Category::find($id);
        return view('admin.category.EditCategory',compact('category'));
    }

    function postEditCategory($id, Request $request){
        $post = $request->all();
        $request->validate([
            'category_name' => 'required',
            'description' => 'required',
        ]);
        $CategoryModel = Category::find($id);
        $CategoryModel -> category_name = $post['category_name'];
        $CategoryModel->description = $post['description'];
        $CategoryModel ->created_at = date('d-m-Y h:m');
        $CategoryModel->save();
        return redirect(route('list_category'));
    }

    function getDeleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect(route('list_category'));
    }
}
