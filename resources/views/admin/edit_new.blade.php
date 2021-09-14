@extends('admin_layout')
@section('admin_content')
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
       Cập nhật tin tức
     </header>
     <div class="panel-body">
      <div class="position-center">
        @foreach($edit_news as $key => $new)
        <form role="form" action="{{URL::to('/update-news/'.$new->news_id)}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Tên tin</label>
            <input value="{{ $new->news_name }}" type="text" name="news_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh</label>
            <input type="file" name="news_image" class="form-control"  placeholder="Tên danh mục">
            <img src="{{URL::to('public/uploads/news/'.$new->news_image)}}" height="100" width="100">

          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nội dung </label>
            <textarea  style="resize: none" rows="8" class="form-control" name="news_content" id="ckeditorpro" placeholder="Mô tả sản phẩm">{{$new->news_content}}</textarea>
          </div> 
        </div>   
      </div>
      <button style="width: 100%;" type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
    </form>
    @endforeach
  </div>

</div>
</section>

</div>
@endsection