@extends('admin_layout')
@section('admin_content')

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.j"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê  sản phẩm
    </div>
 
    <div class="table-responsive" style="margin-top: 20px;">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert" style="color:red;">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table  id="example"  class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
   
            <th style="width: 80px;">STT</th>
            <th>Tên sản phẩm</th>
            <th style="width: 200px;">Hình ảnh sản phẩm</th>    
            <th style="width: 200px;">Danh mục</th>                 
            <th>Giá sản phẩm</th>       
            <th>Số lượng</th>       
            <th style="width: 100px;">Trạng thái</th>            
            <th>Chức năng</th>
          </tr>
        </thead>
        <tbody>
           @php
            $stt=1
            @endphp
          @foreach($all_product as $key => $pro)
          <tr>
            <td>{{ $stt++ }}</td>
            <td>{{ $pro->product_name }}</td>
            <td><img style="width: 100px;height: 100px;margin-left: 50px;" src="public/uploads/product/{{ $pro->product_image }}"></td>   

            @foreach($cate as $key =>$val)
            @if($pro->category_id== $val->category_id)
               <td>{{$val->category_name}}</td>
                @endif
            @endforeach
           

            <td><b style="color: red;padding-left: 120px;">{{number_format($pro->product_price).'đ'}}</b></td>
            <td>{{ $pro->product_quantity }}</td>     
            <td><span class="text-ellipsis">
              <?php
               if($pro->product_status==0){
                ?>
                <a  href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span style="color: red" class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>
           
            <td>
              
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="btn btn-xs btn-primary" >
                <i class="fa fa-pencil"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}"  class="btn btn-xs btn-danger" ui-toggle-class="">
                <i class="fa fa-trash"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
   
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection

