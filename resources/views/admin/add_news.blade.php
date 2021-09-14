@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Thêm thương hiệu sản phẩm
           </header>
        <!--    <?php
           $message = Session::get('message');
           if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
        ?> -->
        <div class="panel-body">

            <div class="position-center">
                <form role="form" action="{{URL::to('/save-news')}}"method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên tin</label>
                        <input type="text" name="news_name" class="form-control" id="exampleInputEmail1" placeholder="Tên tin">
                    </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Ảnh tin</label>
                        <input type="file" name="news_image" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung</label>
                        <textarea id="ckeditorpro1" style="resize: none" rows="8" class="form-control" name="news_content" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                    </div>
                    <button style="width: 100%;" type="submit" name="add_brand_product" class="btn btn-info">Thêm tin mới</button>
                </form>
            </div>

        </div>
    </section>

</div>
@endsection