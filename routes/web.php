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
    });
    Route::group(['prefix' => 'chia-se'], function () {
        
    });
    Route::group(['prefix' => 'cau-lac-bo'], function () {
        
    });
    Route::group(['prefix' => 'doan-hoi'], function () {
        
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
