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
    Route::get('/hoc-tap', 'ForumController@index')->name('forum');
    Route::get('/them-cau-hoi', 'QuestionController@create')->name('question.create');
    Route::post('/them-cau-hoi', 'QuestionController@store')->name('question.store');
    Route::view('/single-blog', 'client.pages.single_blog');
    
});