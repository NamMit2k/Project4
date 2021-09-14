@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
             Cập nhật danh mục sản phẩm
         </header>
         <?php
         $message = Session::get('message');
         if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        <div class="panel-body">
                @foreach($data as $key => $edit_value)
            <div class="position-center">
                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" value="{{$edit_value->category_name}}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                        <textarean  style="resize: none" rows="8"  class="form-control" name="category_product_desc" id="ckedit1" placeholder="Mô tả danh mục"> {!! $edit_value->category_desc !!}</textarea>
                    </div>
                         <div class="form-group">
                        <label for="exampleInputPassword1">Thuộc danh mục</label>
                        <select name="category_parent" class="form-control input-sm m-bot15">
                            <option value="0">---Danh mục cha---</option>
                            @foreach( $cate as $key =>$cate_pro)
                                @if($cate_pro->category_parent==0)
                                    <option value="{{ $cate_pro->category_id }}">{{ $cate_pro->category_name }}</option>
                                @endif   
                                @foreach($cate as $val2)
                                    @if($val2->category_parent==$cate_pro->category_id)
                                        <option value="{{ $val2->category_id }}"><span style="padding-left: 30px;">---{{ $val2->category_name }}</span></option>
                                    @endif
                                @endforeach                             
                            @endforeach

                        </select>
                    </div>
            

                    <button style="width: 100%;" type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>

</div>
@endsection