@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê tin tức
    </div>

    <div class="table-responsive">
                <!--       <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert" style="color:red;">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?> -->
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
          
            <th>Tiêu đề</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>       
             
            <th >Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $key => $news)
          <tr>         
            <td style="width: 300px;">{{ $news->news_name }}</td>
         <td><img style="width: 100px;height: 100px;margin-left: 50px;" src="public/uploads/news/{{ $news->news_image }}"></td>   
            <td style="width: 800px;">{!!$news->news_content !!}</td>      
            <td>
              <a href="{{URL::to('/edit-news/'.$news->news_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-news/'.$news->news_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection