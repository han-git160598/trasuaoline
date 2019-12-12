@extends('pages.admin_layout')
@section('admin_content')


 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           cap nhat san pham
                        </header>
                        <?php
                            $message = Session::get('message');
                            if($message)
                            {
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                        ?>
                        
                        <div class="panel-body">
                            <div class="position-center">
                                <?php foreach($edit_product as $key => $pro ) {?>
                                <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/upload/product/'.$pro->product_image)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->product_price}}">
                                </div>
                               <!--  <div class="form-group">
                                   <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                   <textarea style="resize: none;" rows="8" class="form-control" name="product_desc" id="exampleInputPassword1" >{{$pro->product_desc}}</textarea> 
                               </div> -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none;" rows="8" class="form-control" name="product_content" id="exampleInputPassword1" >{{$pro->product_content}}</textarea> 
                                </div>
                                <div class="form-group">
                                 <label for="exampleInputFile">Danh mục</label>
                             
                                 <select name="cate_product" class="form-control input-sm m-bot15">
                                   
                                   @foreach($cate_product as $key =>$cate) 
                                        @if($cate->category_id==$pro->category_id) 
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @else 
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endif
                                    @endforeach    
    
                                 </select>
                             </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Trang thai</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Còn hàng</option>
                                            <option value="1">Hết hàng</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_product" class="btn btn-info">cap nhat phẩm</button>
                            </form>
                            <?php } ?>
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection