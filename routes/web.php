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
/*首页*/
Route::get('/', 'PagesController@root')->name('root');
/*用户认证*/
Auth::routes();
/*用户个人中心*/
Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
/*话题*/
Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
/*分类*/
Route::resource('categories','CategoriesController',['only' => ['show']]);
