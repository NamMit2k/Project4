@extends('admin_layout')
@section('admin_content')
<link rel="stylesheet" type="text/css" href="s">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.j"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục sản phẩm
    </div>
    <div class="row w3-res-tb">
   
    </div>
    <div class="table-responsive">
      <?php
      $message = Session::get('message');
      if($message){
        echo '<span class="text-alert" style="color:red;">'.$message.'</span>';
        Session::put('message',null);
      }
      ?>
      <div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
       <table id="example"  class="table table-striped table-bordered table-hover">
         <thead class="thead-dark|thead-light">
           <tr >
             <th style="color: black;">STT</th>
             <th style="color: black">Tên danh mục</th>
             <th style="color: black">Thuộc danh mục</th>
             <th style="color: black">Mô tả danh mục</th>
             <th style="color: black">Hiển thị</th>            
             <th style="color: black">Chức năng</th>
           </tr>
         </thead>
         <tbody>
           @php
            $stt=1
            @endphp
            @foreach($datas as $key => $cate)
          <tr>
            <td style="color: black">{{$stt++}}</td>
            <td style="color: black">{{ $cate->category_name}}</td>

            <td style="color: black">
              @if($cate->category_parent==0)
               <span style="color: red">Danh mục cha</span>
              @else
              @foreach($category_products as $key =>$cate_sub_pro)
               @if($cate_sub_pro->category_id==$cate->category_parent)
                 <span style="color: green">{{$cate_sub_pro->category_name}}</span>
                 @endif
              @endforeach

              @endif
            </td>

            <td style="color: black">{!!$cate->category_desc!!}</td>

            <td style="color: black"><span class="text-ellipsis">
              <?php
              if( $cate->category_status==0){
                ?>
                <a href="{{URL::to('/unactive-category-product/'.$cate->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
              }else{
                ?>  
                <a href="{{URL::to('/active-category-product/'.$cate->category_id)}}"><span style="color: red" class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
              }
              ?>
            </span></td>

              <td>
                <a href="{{URL::to('/edit-category-product/'.$cate->category_id)}}" class="btn btn-xs btn-primary">Edit</a>
                <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-category-product/'.$cate->category_id)}}" class="btn btn-xs btn-danger">Delete</a>
              </td>
          </tr>
            @endforeach
         </tbody>
       </table>
       <!--    importdata -->
     <form action="{{url('/import-csv')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <input type="file" name="file" accept=".xlsx"><br>
       <input type="submit" value="Import CSV" name="import_csv" class="btn btn-warning">
        </form>

       <br> 
       <br> 
           <!--    export-data -->
       <form action="{{URL::to('/export-csv')}}" method="post" enctype="multidata/form-data">
             @csrf  
            <input type="submit"  name="export_csv" value="Export CSV" class="btn btn-primary">
       </form>

     </div>
   </div>
 
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection