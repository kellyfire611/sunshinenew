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


Route::get('/admin/chude', 'ChuDeController@index')->name('backend.chude.index');
Route::get('/admin/chude/create', 'ChuDeController@create')->name('backend.chude.create');
Route::post('/admin/chude/store', 'ChuDeController@store')->name('backend.chude.store');
Route::get('/admin/chude/edit/{id}', 'ChuDeController@edit')->name('backend.chude.edit');
Route::put('/admin/chude/update/{id}', 'ChuDeController@update')->name('backend.chude.update');
Route::delete('/admin/chude/delete/{id}', 'ChuDeController@destroy')->name('backend.chude.destroy');

// Các route dành riêng cho backend
Route::get('/admin/', 'BackendController@dashboard')->name('backend.dashboard');


Route::get('/home', 'HomeController@index')->name('home');

// Gọi hàm đăng ký các route dành cho Quản lý Xác thực tài khoản (Đăng nhập, Đăng xuất, Đăng ký)
// các route trong file `vendor\laravel\framework\src\Illuminate\Routing\Router.php`, hàm auth()
Auth::routes();