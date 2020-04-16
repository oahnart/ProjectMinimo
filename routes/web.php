<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/loadmore', 'HomeController@load_more')->name('home.loadmore');

Route::get('/liftstyle', 'LiftstyleController@index')->name('liftstyle');
Route::get('/liftstyle/loadmore', 'LiftstyleController@load_more')->name('liftstyle.loadmore');

Route::get('/photodiary', 'PhotodiaryController@index')->name('photodiary');
Route::get('/photodiary/loadmore', 'PhotodiaryController@load_more')->name('photodiary.loadmore');


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth'
], function () {

    Route::group(['prefix' => 'news'], function () {

        Route::get('list_news',
            ['as' => 'list_news', 'uses' => 'NewsController@getListNews']);

        Route::get('add_news',
            ['as' => 'add_news', 'uses' => 'NewsController@getAddNews']);

        Route::post('add_news',
            ['as' => 'post_add_news', 'uses' => 'NewsController@postAddNews']);

        Route::get('edit_news/{id}',
            ['as' => 'edit_news', 'uses' => 'NewsController@getEditNews']);

        Route::post('edit_news/{id}',
            [
                'as' => 'post_edit_news',
                'uses' => 'NewsController@postEditNews'
            ]);

        Route::get('delete_news/{id}',
            ['as' => 'delete_news', 'uses' => 'NewsController@getDeleteNews']);

    });
    Route::group(['prefix' => 'category'], function () {

        Route::get('list_category',
            [
                'as' => 'list_category',
                'uses' => 'CategoryController@getListCategory'
            ]);

        Route::get('add_category',
            [
                'as' => 'add_category',
                'uses' => 'CategoryController@getAddCategory'
            ]);

        Route::post('add_category',
            [
                'as' => 'post_add_category',
                'uses' => 'CategoryController@postAddCategory'
            ]);

        Route::get('edit_category/{id}',
            [
                'as' => 'edit_category',
                'uses' => 'CategoryController@getEditCategory'
            ]);

        Route::post('edit_category/{id}',
            [
                'as' => 'post_edit_category',
                'uses' => 'CategoryController@postEditCategory'
            ]);

        Route::get('delete_category/{id}',
            [
                'as' => 'delete_category',
                'uses' => 'CategoryController@getDeleteCategory'
            ]);

    });
});
