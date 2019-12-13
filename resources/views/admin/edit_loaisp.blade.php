@extends('pages.admin_layout')
@section('admin_content')


 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật danh mục sản phẩm
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
                            <?php foreach ($edit_loaisp as $key => $value) { ?>
                               
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-loai-san-pham/'.$value->ma_loai)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{ $value->ten_loai}}" name="ten_loaisp" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Trạng thái</label>
                                    <select name="trangthai_loaisp" class="form-control input-sm m-bot15">
                                            <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục danh mục</button>
                            </form>
                            </div>
                             <?php } ?>
                        </div>

                    </section>

            </div>
</div>
@endsection