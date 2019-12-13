@extends('pages.admin_layout')
@section('admin_content')


 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                          Cập nhật sản phẩm
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
                                <?php foreach($edit_sanpham as $key => $sp ) {?>
                                <form role="form" action="{{URL::to('/update-san-pham/'.$sp->ma_sanpham)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="ten_sanpham" class="form-control" id="exampleInputEmail1" value="{{$sp->ten_sanpham}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="hinh_sanpham" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/upload/product/'.$sp->hinh_sanpham)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="text" name="gia_sanpham" class="form-control" id="exampleInputEmail1" value="{{$sp->gia_sanpham}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none;" rows="8" class="form-control" name="noidung_sanpham" id="exampleInputPassword1" >{{$sp->noidung_sanpham}}</textarea> 
                                </div>    
                                <div class="form-group">
                                 <label for="exampleInputFile">Danh mục</label>
                             
                                 <select name="loaisp" class="form-control input-sm m-bot15">
                                   
                                   @foreach($loaisp as $key =>$loai) 
                                        @if($loai->ma_loai==$sp->ma_loai) 
                                            <option selected value="{{$loai->ma_loai}}">{{$loai->ten_loai}}</option>
                                        @else 
                                            <option value="{{$loai->ma_loai}}">{{$loai->ten_loai}}</option>
                                        @endif
                                    @endforeach    
    
                                 </select>
                             </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Trang thai</label>
                                    <select name="trangthai_sanpham" class="form-control input-sm m-bot15">
                                            <option value="0">Còn hàng</option>
                                            <option value="1">Hết hàng</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_sanpham" class="btn btn-info">Cập nhật sản phẩm</button>
                            </form>
                            <?php } ?>
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection