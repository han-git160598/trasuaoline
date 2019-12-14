@extends('welcome')
@section('content')
<div class="features_items">
                        <h2 class="title text-center">Kết quả tìm kiếm</h2>
                       @foreach($tim_sp as $key => $sp)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                             <a href="{{URL::to('/chi-tiet-san-pham/'.$sp->ma_sanpham)}}">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('public/upload/product/'.$sp->hinh_sanpham)}}" alt="" />
                                            <h2>{{number_format($sp->gia_sanpham).' '.'VNĐ'}}</h2>
                                            <p>{{$sp->ten_sanpham}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                        </div>
                                      
                                </div>
                            </a>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
        
                                   </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
@endsection