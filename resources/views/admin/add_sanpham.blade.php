@extends('pages.admin_layout')
@section('admin_content')


 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm sản phẩm
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
                                <form role="form" action="{{URL::to('/save-san-pham')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="ten_sanpham" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="hinh_sanpham" class="form-control" id="exampleInputEmail1 ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="text" name="gia_sanpham" class="form-control" id="exampleInputEmail1" placeholder="Giá">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none;" rows="8" class="form-control" name="noidung_sanpham" id="exampleInputPassword1" placeholder="Nội dung sản phẩm"></textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Danh mục</label>

                                    <select name="loaisp" class="form-control input-sm m-bot15">
                                       <?php foreach($loaisp as $key =>$loai){ ?>
                                       
                                            <option value="{{$loai->ma_loai}}">{{$loai->ten_loai}}</option>
                            
                                      
                                        <?php } ?>


                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị</label>
                                    <select name="trangthai_sanpham" class="form-control input-sm m-bot15">
                                            <option value="0">Còn hàng</option>
                                            <option value="1">Hết hàng</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_sanpham" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection