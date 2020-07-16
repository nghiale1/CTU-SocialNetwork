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
    return redirect()->route('form_login');
});
// Route::redirect('/', '/there');
Route::get('/dang-nhap', 'LoginController@form_login')->name('form_login');
Route::post('/xac-thuc', 'LoginController@login')->name('login');
Route::get('/dang-xuat', 'LoginController@logout');

Route::group(['middleware' => ['checkLogin']], function () {
    // forum
    Route::group(['prefix' => 'hoc-tap'], function () {
        
        Route::get('/', 'ForumController@index')->name('forum');
        Route::get('/bai-viet/{slug}', 'ForumController@show')->name('forum.show');
        Route::get('/them-cau-hoi', 'QuestionController@create')->name('question.create');
        Route::post('/them-cau-hoi', 'QuestionController@store')->name('question.store');
        Route::post('/bai-viet/binh-luan', 'CommentController@store')->name('comment.store');
        Route::post('/bai-viet/binh-luan/tra-loi/', 'CommentController@repcomment')->name('repcomment.store');
        Route::post('/bai-viet/binh-luan/xoa/', 'CommentController@destroycmt')->name('comment.destroy');
        Route::post('/bai-viet/binh-luan/thich', 'CommentController@Ajaxlike')->name('comment.like');

    });
    Route::group(['prefix' => 'chia-se'], function () {
        Route::get('/', 'ShareController@index')->name('share');
        Route::get('/bai-viet/{slug}', 'ShareController@show')->name('share.show');
        Route::get('/them-bai-viet', 'ShareController@create')->name('share.create');
        Route::post('/them-bai-viet', 'ShareController@store')->name('share.store');
        Route::get('/{slug}', 'ShareController@list')->name('share.list');
        
    });
    Route::group(['prefix' => 'cau-lac-bo'], function () {
        Route::get('/', 'ClubController@index')->name('club');
        Route::get('/bai-viet/{slug}', 'ClubController@show')->name('club.show');
        Route::get('/them-bai-viet', 'ClubController@create')->name('club.create');
        Route::post('/them-bai-viet', 'ClubController@store')->name('club.store');
    });
    Route::group(['prefix' => 'doan-hoi'], function () {
        Route::get('/', 'UnionController@index')->name('union');
        Route::get('/bai-viet/{slug}', 'UnionController@show')->name('union.show');
        Route::get('/them-bai-viet', 'UnionController@create')->name('union.create');
        Route::post('/them-bai-viet', 'UnionController@store')->name('union.store');
    });
    Route::group(['prefix' => 'tai-khoan'], function () {
        
    });
    //lấy tất cả các messages, và sẽ có form để chat
    Route::get('messages', 'MessageController@index');
    
    //insert chat content vào trong database
    Route::post('messages', 'MessageController@store');
    
    //lấy ra user hiện tại
    Route::get('current-user', 'UserController@currentUser');
});
