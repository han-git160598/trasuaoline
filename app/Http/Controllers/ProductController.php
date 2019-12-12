<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
session_start(); 


class ProductController extends Controller
{
    public function add_product()
    {
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        return view('admin.add_product')->with('cate_product',$cate_product);

    }

    public function all_product()
    {


    	$all_product = DB::table('tbl_product')->orderby('product_id','desc')->get(); 
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('pages.admin_layout')->with('admin.all_product',$manager_product);
 

    }
    public function save_product(Request $request)
    {

    	$data= array();
    	$data['product_name']=$request->product_name;
        $data['category_id']=$request->cate_product;
        $data['product_price']=$request->product_price;
        $data['product_content']=$request->product_content; 
    	$data['product_status']=$request->product_status;
        $data['product_image']=$request->product_image;
        $get_image=$request->file('product_image');
        if($get_image)
        {
            $get_image_name =$get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_image_name));
            $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->insert($data);
            session::put('message','Them san pham thanh cong');
            return Redirect::to('/add-product');
        }
        $data['product_image']='';
        DB::table('tbl_product')->insert($data);
        session::put('message','Ban chua them hinh anh');
        return Redirect::to('/add-product');


    }
    public function edit_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product);
        return view('pages.admin_layout')->with('admin.edit_product',$manager_product);

    }
    public function update_product(Request $request, $product_id)
    {
        $data= array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->cate_product;
        $data['product_price']=$request->product_price;
        $data['product_content']=$request->product_content; 
        $data['product_status']=$request->product_status;
        $get_image=$request->file('product_image');
        if($get_image)
        {
            $get_image_name =$get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_image_name));
            $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            session::put('message','cap nhat pham thanh cong');
            return Redirect::to('/all-product');
        }
         
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        session::put('message','cap nhat pham thanh cong');
        return Redirect::to('/all-product');


    }
    public function delete_product( $product_id)
    {    

        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    //customer pages
    public function details_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_product.product_id',$product_id)->get(); 
   

        return view('pages.sanpham.chitietsanpham')->with('category',$cate_product)->with('product_details',$details_product);
    }

}
