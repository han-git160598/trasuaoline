<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
session_start(); 


class Cartcontroller extends Controller
{
    public function save_cart(Request $request)
    {
    	
    	$productid = $request->product_id_hidden;
    	$quantity = $request->qty;
    	$product_info =DB::table('tbl_product')->where('product_id',$productid)->first();
    
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    	Cart::add('293ad', 'Product 1', 1, 9.99, 550);
    	return view('pages.giohang.showgiohang')->with('category',$cate_product);
    }

}
