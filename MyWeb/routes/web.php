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

Route::get('/', 'PostController@index');
Route::get('/search','PostController@search');
Route::resource('/posts','PostController');
Route::get('/searchs','PostController@search');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile', 'UserProfileController@profile')->middleware('auth')->name('profile.profile');
Route::post('update', 'UserProfileController@update_avatar')->middleware('auth')->name('profile.update');
//
// Route::post('/comment/store', 'CommentController@store')->name('comment.add');
// Route::resource('/comment', 'CommentController');
// Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Route::get('/show', 'HomeController@index')->name('comment');
Route::resource('/comments','CommentsController');
Route::resource('/replies','RepliesController');
Route::post('/replies/ajaxDelete','RepliesController@ajaxDelete');

Route::get('image','ImageController@showUploadForm')->name('upload.image');
