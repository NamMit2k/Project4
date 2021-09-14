@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    
    
    <div class="table-responsive">
      <?php
      $message = Session::get('message');
      if($message){
        echo '<span class="text-alert" style="color:red;">'.$message.'</span>';
        Session::put('message',null);
      }
      ?>
      <table class="table table-striped b-t b-light">
        <?php
        $stt=1
        ?>
        <thead>
          <tr>
           
            <th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt hàng</th> 
            <th>Tình trạng đơn hàng</th>              
            
            <th >Chức năng</th>
          </tr>
        </thead>
        <tbody>

          @foreach($order as $key => $val)
          <tr>       
            <td>{{$stt++}}</td>  
            <td>{{ $val->order_id }}</td>
            <td>{{  date('d/m/Y', strtotime($val->created_at)) }}</td>
            <td>

             <?php
             if($val->order_status==1){
              ?>
              <a  href="" style="color: blue"><i class="fa fa-vimeo" aria-hidden="true"></i>Đơn hàng đã xác nhận</a>
              <?php
            }else{
              ?>  
              <a onclick="return confirm('Bạn có chắc chấp nhận đơn hàng này không?')" href="{{URL::to('/active-order/'.$val->order_id)}}" style="color:red"><i class="fa fa-times" aria-hidden="true"></i>Đơn hàng chưa xác nhận</a>
              <?php
            }
            ?>
          </td>
          <td>
            <a href="{{URL::to('/view-order/'.$val->order_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-eye text-success text-active"></i></a>
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
  </div>
  
</div>
</div>
@endsection