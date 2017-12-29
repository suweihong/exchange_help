<?php

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
    return view('welcome');
});

//后台帮助中心
//加载添加页面
Route::get('/admin/article/add','IndexController@add_a');
//处理添加操作
Route::post('/admin/addarticle','IndexController@add_article');
//文章列表
Route::get('/admin/article','IndexController@show_articles');
//加载修改文章的页面
Route::get('/admin/article/{id}/edit','IndexController@edit_a');
//处理修改操作
Route::POST('/admin/editarticle','IndexController@edit_article');
//删除文章的操作
Route::DELETE('/admin/delarticle','IndexController@del_article');
//上传图片
Route::POST('/admin/upload','IndexController@upload');
//前台帮助中心
//前台首页
Route::get('/article','IndexController@home_help');
//各类文章列表
Route::get('/category/{id}','IndexController@article_list');
//获取文章具体内容
Route::get('/article/content/{id}','IndexController@article_content');
//首页搜索的文章
Route::get('/article/search','IndexController@homearticle_search');
//点赞的文章
Route::get('/article/useful/{id}','IndexController@homearticle_useful');
