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
Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');
/*分类*/
Route::resource('categories', 'CategoriesController',['only' => ['show']]);
/*创建话题--编辑器上传图片*/
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');
/*回复话题增删*/
Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);
/*通知列表*/
Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);
