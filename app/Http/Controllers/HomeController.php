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
    	$all_sanpham = DB::table('tbl_sanpham')->where('trangthai_sanpham','0')->orderby('ma_sanpham','desc')->limit(8)->get(); 
      
    	return view('pages.home')->with('loaisp',$loaisp)->with('all_sanpham',$all_sanpham);
    }
    public function timkiem(Request $request)
    {
        $keywords = $request->keywords_submit;
        $loaisp = DB::table('tbl_loaisp')->where('trangthai_loai','0')->orderby('ma_loai','desc')->get();   
        $tim_sp = DB::table('tbl_sanpham')->where('ten_sanpham','like','%'.$keywords.'%')->get();
        return view('pages.sanpham.timkiem')->with('loaisp',$loaisp)->with('tim_sp',$tim_sp);

    }
}
