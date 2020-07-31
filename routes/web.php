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
Route::get('/dang-xuat', 'LoginController@logout')->name('logout');

Route::group(['middleware' => ['checkLogin']], function () {
    // forum
    Route::group(['prefix' => 'hoc-tap'], function () {

        Route::get('/', 'ForumController@index')->name('forum');
        Route::get('/bai-viet/{slug}', 'ForumController@show')->name('forum.show');
        Route::get('/them-cau-hoi', 'QuestionController@create')->name('question.create');
        Route::post('/them-cau-hoi', 'QuestionController@store')->name('question.store');
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

    //Tài liệu để chung với cái group này luôn
    Route::group(['prefix' => 'tai-khoan'], function () {
        Route::get('tai-lieu/chon-hoc-ky','DocumentShareController@getHocKy')->name('chon-hoc-ky');
        Route::get('tai-lieu','DocumentShareController@index')->name('tai-lieu');
        Route::get('tai-lieu/tao-thu-muc/{ten_mon_hoc}/{id_mon_hoc}','DocumentShareController@createNewFolderSubjects')->name('tao-thu-muc-mon-hoc');
        //up bài nè
        Route::get('tai-lieu-1', function () {
            return view('client.pages.docs-share.index-2');
        });

        Route::get('tai-lieu/thu-muc/{nkSelected}/{hkSelected}/{nameFolder}','DocumentShareController@folderDetail')->name('chi-tiet-thu-muc');

        Route::post('tai-lieu/thu-muc/tao-thu-muc-con', 'DocumentShareController@createNewFolderChild')->name('tao-thu-muc-con');
        Route::post('tai-lieu/file/upload-file', 'DocumentShareController@uploadDocuments')->name('upload-file');
    });
    //lấy tất cả các messages, và sẽ có form để chat
    Route::get('messages', 'MessageController@index');

    //insert chat content vào trong database
    Route::post('messages', 'MessageController@store');

    //lấy ra user hiện tại
    Route::get('current-user', 'UserController@currentUser');
});
