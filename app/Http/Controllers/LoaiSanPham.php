<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
session_start(); 

class LoaiSanPham extends Controller
{
    public function add_loaisp()
    {
      	return view('admin.add_loaisp');
    }

    public function all_loaisp()
    {
    	$all_loaisp = DB::table('tbl_loaisp')->get();
        $manager_loaisp = view('admin.all_loaisp')->with('all_loaisp',$all_loaisp);
        return view('pages.admin_layout')->with('admin.all_loaisp',$manager_loaisp);

    }
    public function save_loaisp(Request $request)
    {
    	$data= array();
    	$data['ten_loai']=$request->ten_loaisp;
    	$data['trangthai_loai']=$request->trangthai_loaisp;
    	DB::table('tbl_loaisp')->insert($data);
        session::put('message','Thêm danh mục thành công');
        return Redirect::to('/add-loai-san-pham');
    }
    public function edit_loaisp($ma_loaisp)
    {
        $edit_loaisp = DB::table('tbl_loaisp')->where('ma_loai',$ma_loaisp)->get();
        $ql_loaisp = view('admin.edit_loaisp')->with('edit_loaisp',$edit_loaisp);
        return view('pages.admin_layout')->with('admin.edit_loaisp',$ql_loaisp);

    }
    public function update_loaisp(Request $request, $ma_loaisp)
    {
        $data=array();
        $data['ten_loai']=$request->ten_loaisp;
        $data['trangthai_loai']=$request->trangthai_loaisp;

        DB::table('tbl_loaisp')->where('ma_loai',$ma_loaisp)->update($data);
        session::put('message','Cập nhật danh mục thành công');
        return Redirect::to('/all-loai-san-pham');

    }
    public function delete_loaisp( $ma_loaisp)
    {    

        DB::table('tbl_loaisp')->where('ma_loai',$ma_loaisp)->delete();
        session::put('message','Xóa danh mục thành công');
        return Redirect::to('/all-loai-san-pham');
    }



    //Fontend
    

}
