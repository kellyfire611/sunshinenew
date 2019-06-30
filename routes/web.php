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

// Route::get('/danhsachloai', function() {
//     // Truy van database, table Loai
//     // hien thi
//     return 'Hello, day la chuc nang danh sach loai';
// });
Route::get('/danhsachloai', 'LoaiController@hienthimanhinhdanhsach');
Route::get('/danhsachloai/taomoi', 'LoaiController@taomoi');

// Route::get('/danhsachloai/taomoi', function() {
//     return 'Hello, day la chuc nang them moi danh sach loai';
// });


Route::get('/chude', 'ChuDeController@index')->name('chude.index');
Route::get('/chude/create', 'ChuDeController@create')->name('chude.create');
Route::post('/chude/store', 'ChuDeController@store')->name('chude.store');
Route::get('/chude/edit/{id}', 'ChuDeController@edit')->name('chude.edit');
Route::put('/chude/update/{id}', 'ChuDeController@update')->name('chude.update');
Route::delete('/chude/delete/{id}', 'ChuDeController@destroy')->name('chude.destroy');

// Các route dành riêng cho backend
Route::get('/admin/', 'BackendController@dashboard')->name('backend.dashboard');