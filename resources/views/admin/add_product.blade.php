@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Thêm sản phẩm
           </header>
           <?php
           $message = Session::get('message');
           if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        <div class="panel-body">

            <div class="position-center">
                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data" name = "myForm" onsubmit = "return(validate());" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                      <!--   required minlength="3" -->
                        <input  type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                        <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                        <textarea style="resize: none" rows="8" class="form-control" name="product_desc" id="ckeditorpro" placeholder="Mô tả sản phẩm"></textarea>
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                        <textarea  style="resize: none" rows="8" class="form-control" name="product_content" id="ckeditorpro1" placeholder="Nội dung sản phẩm"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                        <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                    </div> 
                    <div class="form-group">
                     <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                     <input  type="text" name="product_quantity" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                 </div><!-- required min="1"  -->

                 <div class="form-group">
                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                    <select name="product_cate" class="form-control input-sm m-bot15">
                        @foreach($cate_product as $key => $cate)
                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                              
                        @endforeach

                    </select>
                </div>  
                <div class="form-group">
                    <label for="exampleInputPassword1">Thương hiệu</label>
                    <select name="product_brand" class="form-control input-sm m-bot15">
                           @foreach($brand_product as $key => $brand)
                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                              
                        @endforeach
                    </select>
                </div>   
                <div class="form-group">
                    <label for="exampleInputPassword1">Hiển thị</label>
                    <select name="product_status" class="form-control input-sm m-bot15">
                        <option value="0">Ẩn</option>
                        <option value="1">Hiển thị</option>
                    </select>
                </div>

            </div>



            <button style="width: 100%;" type="submit" name="add_product" class="btn btn-info">Thêm  sản phẩm</button>
        </form>
    </div>

</div>
</section>
</div>
<script type = "text/javascript">
   <!--
      // Form validation code will come here.
      function validate() {
      
         if( document.myForm.product_name.value == "" ) {
            alert( "Vui lòng nhập tên danh mục!" );
            document.myForm.product_name.focus() ;
            return false;
         }
         if( document.myForm.product_quantity.value == "" ) {
            alert( "Vui lòng nhập số lượng sản phẩm!" );
            document.myForm.product_quantity.focus() ;
            return false;
         } 
            if( document.myForm.product_quantity.value == 0) {
            alert( "Vui lòng nhập số lượng sản phẩm lớn hơn 0!" );
            document.myForm.product_quantity.focus() ;
            return false;
         }
    
         return( true );
      }
   //-->
</script>


@endsection