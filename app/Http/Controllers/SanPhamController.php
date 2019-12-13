<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;    
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
session_start();  


class SanPhamController extends Controller
{
    public function add_sanpham()
    {
        $loaisp = DB::table('tbl_loaisp')->orderby('ma_loai','desc')->get(); 
        return view('admin.add_sanpham')->with('loaisp',$loaisp);

    }

    public function all_sanpham()
    {


    	$all_sanpham = DB::table('tbl_sanpham')->orderby('ma_sanpham','desc')->get(); 
        $ql_sanpham = view('admin.all_sanpham')->with('all_sanpham',$all_sanpham);
        return view('pages.admin_layout')->with('admin.all_sanpham',$ql_sanpham);
 

    }
    public function save_sanpham(Request $request)
    {
 
    	$data= array();
    	$data['ten_sanpham']=$request->ten_sanpham;
        $data['ma_loai']=$request->loaisp;
        $data['gia_sanpham']=$request->gia_sanpham;
        $data['noidung_sanpham']=$request->noidung_sanpham; 
    	$data['trangthai_sanpham']=$request->trangthai_sanpham;
        $data['hinh_sanpham']=$request->hinh_sanpham;
        $get_hinh=$request->file('hinh_sanpham');
        if($get_hinh)
        {
            $get_ten_hinh =$get_hinh->getClientOriginalName();
            $ten_hinh = current(explode('.', $get_ten_hinh));
            $hinh_moi =$ten_hinh.rand(0,99).'.'.$get_hinh->getClientOriginalExtension();
            $get_hinh->move('public/upload/product',$hinh_moi);
            $data['hinh_sanpham']=$hinh_moi;
            DB::table('tbl_sanpham')->insert($data);
            session::put('message','Them san pham thanh cong');
            return Redirect::to('/add-product');
        }
        $data['hinh_sanpham']='';
        DB::table('tbl_sanpham')->insert($data);
        session::put('message','Ban chua them hinh anh');
        return Redirect::to('/add-product');

 
    }
    public function edit_sanpham($ma_sanpham)
    {
        $loaisp = DB::table('tbl_loaisp')->orderby('ma_loai','desc')->get(); 
        $edit_sanpham = DB::table('tbl_sanpham')->where('ma_sanpham',$ma_sanpham)->get();
        $ql_sanpham = view('admin.edit_sanpham')->with('edit_sanpham',$edit_sanpham)->with('loaisp',$loaisp);
        return view('pages.admin_layout')->with('admin.edit_sanpham',$ql_sanpham);

    }
    public function update_sanpham(Request $request, $ma_sanpham)
    {
        $data= array();
        $data['ten_sanpham']=$request->ten_sanpham;
        $data['ma_loai']=$request->loaisp;
        $data['gia_sanpham']=$request->gia_sanpham;
        $data['noidung_sanpham']=$request->noidung_sanpham; 
        $data['trangthai_sanpham']=$request->trangthai_sanpham;
        $get_hinh=$request->file('hinh_sanpham');
        if($get_hinh)
        {
            $get_ten_hinh =$get_hinh->getClientOriginalName();
            $ten_hinh = current(explode('.', $get_ten_hinh));
            $hinh_moi =$ten_hinh.rand(0,99).'.'.$get_hinh->getClientOriginalExtension();
            $get_hinh->move('public/upload/product',$hinh_moi);
            $data['hinh_sanpham']=$hinh_moi;
            DB::table('tbl_sanpham')->where('ma_sanpham',$ma_sanpham)->update($data);
            session::put('message','Cập nhật thành công');
            return Redirect::to('/all-product');
        }
         
        DB::table('tbl_sanpham')->where('ma_sanpham',$ma_sanpham)->update($data);
        session::put('message','Cập nhật thành công');
        return Redirect::to('/all-product');


    }
    public function delete_sanpham( $ma_sanpham)
    {    

        DB::table('tbl_sanpham')->where('ma_sanpham',$ma_sanpham)->delete();
        session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    //customer pages
    public function chitiet_sanpham($ma_sanpham)
    {
        $loaisp = DB::table('tbl_loaisp')->where('trangthai_loai','0')->orderby('ma_loai','desc')->get();
        $chitiet_sanpham = DB::table('tbl_sanpham')
        ->join('tbl_loaisp','tbl_loaisp.ma_loai','=','tbl_sanpham.ma_loai')
        ->where('tbl_sanpham.ma_sanpham',$ma_sanpham)->get(); 
   

        return view('pages.sanpham.chitietsanpham')->with('loaisp',$loaisp)->with('chitiet_sanpham',$chitiet_sanpham);
    }

}
