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
//frontend
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');
//Danh muc
//Route::get('/danh-muc-san-pham/{ma_loai}','LoaiSanPham@show_loai');
Route::get('/chi-tiet-san-pham/{ma_sanpham}','SanPhamController@chitiet_sanpham');
Route::post('/tim-kiem','HomeController@timkiem');



//backend
Route::get('/admin','AdminController@index'); 
Route::get('/dashboard','AdminController@show_dashboard'); 
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard'); 		

//Loai san pham 
Route::get('/add-loai-san-pham','LoaiSanPham@add_loaisp'); 	
Route::get('/all-loai-san-pham','LoaiSanPham@all_loaisp'); 
Route::get('/edit-loai-san-pham/{ma_loai}','LoaiSanPham@edit_loaisp'); 
Route::get('/delete-loai-san-pham/{ma_loai}','LoaiSanPham@delete_loaisp'); 


Route::post('/save-loai-san-pham','LoaiSanPham@save_loaisp');
Route::post('/update-loai-san-pham/{ma_loai}','LoaiSanPham@update_loaisp');

//san pham 			
Route::get('/add-san-pham','SanPhamController@add_sanpham'); 	
Route::get('/all-san-pham','SanPhamController@all_sanpham'); 
Route::get('/edit-san-pham/{ma_sanpham}','SanPhamController@edit_sanpham'); 
Route::get('/delete-san-pham/{ma_sanpham}','SanPhamController@delete_sanpham'); 


Route::post('/save-san-pham','SanPhamController@save_sanpham');
Route::post('/update-san-pham/{ma_sanpham}','SanPhamController@update_sanpham'); 

//gio hang
Route::post('/save-gio-hang','GioHangController@save_giohang');
Route::get('/show-gio-hang','GioHangController@show_giohang');
Route::get('/delete-gio-hang/{rowId}','GioHangController@delete_giohang');

