@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Sản phẩm mới</h2>      

                        <?php  foreach($all_sanpham as $key=>$sp){ ?>
                          
                        <a href="{{URL::to('chi-tiet-san-pham/'.$sp->ma_sanpham)}}"> 
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('public/upload/product/'.$sp->hinh_sanpham)}}"  alt="" />
                                            <h2>{{($sp->gia_sanpham).' '.'VND'}}</h2>
                                            <p>{{$sp->ten_sanpham}}</p>
                                            <a href="{{URL::to('/save-gio-hang/'.$sp->ma_sanpham)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                        </div>
                                </div>       
                            </div>
                               
                                <!-- <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Yeu thich</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>so sanh</a></li>
                                    </ul>
                                </div> -->
                        </div>
                        </a>
                        <?php } ?>
                       
</div>
                        <!--features_items-->

                        
                   <!--  <div class="category-tab">category-tab
                       <div class="col-sm-12">
                           <ul class="nav nav-tabs">
                               <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                               <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
                               <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
                               <li><a href="#kids" data-toggle="tab">Kids</a></li>
                               <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
                           </ul>
                       </div>
                       <div class="tab-content">
                           <div class="tab-pane fade active in" id="tshirt" >
                               <div class="col-sm-3">
                                   <div class="product-image-wrapper">
                                       <div class="single-products">
                                           <div class="productinfo text-center">
                                               <img src="{{('public/frontend/images/gallery1.jpg')}}" alt="" />
                                               <h2>$56</h2>
                                               <p>Easy Polo Black Edition</p>
                                               <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                           </div>
                                           
                                       </div>
                                   </div>
                               </div>                                
                           </div>
                           
                   </div> --><!--/category-tab-->
                     <!-- <div class="recommended_items">recommended_items
                        <h2 class="title text-center">recommended items</h2>
                        
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">   
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend1.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend2.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend3.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">  
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend1.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend2.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend3.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>          
                        </div>
                                         </div>/recommended_items -->

@endsection