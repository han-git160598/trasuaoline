<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
session_start(); 
class  HomeController extends Controller
{
    public function index(){
    	$loaisp = DB::table('tbl_loaisp')->where('trangthai_loai','0')->orderby('ma_loai','desc')->get();
    	$all_sanpham = DB::table('tbl_sanpham')->where('trangthai_sanpham','0')->orderby('ma_sanpham','desc')->limit(4)->get(); 
      
    	return view('pages.home')->with('loaisp',$loaisp)->with('all_sanpham',$all_sanpham);
    }
}
