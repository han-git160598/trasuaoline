<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Cart;   
session_start(); 


class GioHangController extends Controller
{
    public function save_giohang(Request $request)
    {
    	
    	$ma_sanpham = $request->product_id_hidden;
    	$soluong = $request->qty;
    	$product_info =DB::table('tbl_sanpham')->where('ma_sanpham',$ma_sanpham)->first();
    
    	$loaisp = DB::table('tbl_loaisp')->where('trangthai_loai','0')->orderby('ma_loai','desc')->get();
    	//Cart::add('293ad', 'Product 1', 1, 9.99, 550);

        $data['id']= $product_info->ma_sanpham;
        $data['qty']= $soluong;
        $data['name']= $product_info->ten_sanpham;
        $data['price']= $product_info->gia_sanpham;
        $data['weight']= '123';
        $data['options']['image']= $product_info->hinh_sanpham;
        Cart::add($data);
       //Cart::destroy();
        return Redirect::to('/show-gio-hang');
    }
    public function show_giohang()
    {
         $loaisp = DB::table('tbl_loaisp')->where('trangthai_loai','0')->orderby('ma_loai','desc')->get();
         return view('pages.giohang.showgiohang')->with ('loaisp',$loaisp);
    }
    public function delete_giohang($rowId)
    {
        Cart::update($rowId,0);
        return Redirect::to('/show-gio-hang');
    }
}
