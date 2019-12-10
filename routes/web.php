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
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_cate_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');



//backend
Route::get('/admin','AdminController@index'); 
Route::get('/dashboard','AdminController@show_dashboard'); 
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard'); 		

//category product
Route::get('/add-category-product','CategoryProduct@add_category_product'); 	
Route::get('/all-category-product','CategoryProduct@all_category_product'); 
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product'); 
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product'); 


Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');

//product 			
Route::get('/add-product','ProductController@add_product'); 	
Route::get('/all-product','ProductController@all_product'); 
Route::get('/edit-product/{product_id}','ProductController@edit_product'); 
Route::get('/delete-product/{product_id}','ProductController@delete_product'); 


Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product'); 

//gio hang
Route::post('/save-cart','Cartcontroller@save_cart');
Route::get('/show-cart','Cartcontroller@show_cart');
Route::get('/delete-cart/{rowId}','Cartcontroller@delete_cart');

