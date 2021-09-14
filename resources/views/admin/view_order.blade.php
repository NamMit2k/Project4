@extends('admin_layout')
@section('admin_content')
<link rel="stylesheet" type="text/css" href="s">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.j"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">


<div class="table-agile-info">
  <div class="panel panel-default" >
    <div class="panel-heading">
      Thông tin khách hàng
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
        @php
        $stt=1;
        @endphp
        <table id="example"  class="table table-striped table-bordered table-hover">
         <thead class="thead-dark|thead-light">
           <tr >
             <th style="color: black">STT</th>
             <th style="color: black">Tên khách hàng</th>
             <th style="color: black">Số điện thoại</th>

           </tr>
         </thead>
         <tbody>
          <tr>
            <td>{{$stt++}}</td>
            <td>{{$customer->customer_name}}</td>
            <td>{{$customer->customer_phone}}</td>   


          </tr>

        </tbody>

      </table>
    </div>
  </div>

</div>
</div>
<br>
<br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin vận chuyển
    </div>

    <div class="table-responsive">

     @php
     $stt=1;
     @endphp
     <div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
       <table id="example"  class="table table-striped table-bordered table-hover">
         <thead class="thead-dark|thead-light">
           <tr >
             <th style="color: black">STT</th>
             <th style="color: black">Tên người nhận hàng</th>
             <th style="color: black">Địa chỉ</th>
             <th style="color: black">Số điện thoại</th>
             <th style="color: black">Ghi chú</th>

           </tr>
         </thead>
         <tbody>
          <tr>
            <td>{{$stt++}}</td>
            <td>{{$shipping->shipping_name}}</td>
            <td>{{$shipping->shipping_address}}</td>
            <td>{{$shipping->shipping_phone}}</td>   
            <td>{{$shipping->shipping_note}}</td>   


          </tr>

        </tbody>

      </table>
    </div>
  </div>

</div>
</div>
<br>
<br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin hóa đơn
    </div>

    <div class="table-responsive">
      @php
      $stt=1;
      $total=0;
      @endphp
      <div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
       <table id="example"  class="table table-striped table-bordered table-hover">
         <thead class="thead-dark|thead-light">
           <tr >
             <th style="color: black">STT</th>
             <th style="color: black">Tên sản phẩm</th>
             <th style="color: black">Số lượng</th>
             <th style="color: black">Giá</th>
             <th style="color: black">Tổng tiền</th>
           </tr>

         </thead>
         <tbody>
          @foreach($order_detail as $val)
          @php
          $subtotal=$val->product_price*$val->product_sales_quantity;
          $total+=$subtotal;
          @endphp

          <tr>
            <td>{{$stt++}}</td>
            <td>{{$val->product_name}}</td>
            <td><input type="number" name="product_sales_quantity"  value="{{$val->product_sales_quantity}}"> </td>
            <td>{{number_format($val->product_price).'đ'}}</td>     
            <td>{{number_format($subtotal).'đ'}}</td>

          </tr>

          @endforeach
          <tr>
            <td colspan="5" style="text-align: right">Thanh toán: {{number_format($total).'đ'}}</td>
          </tr>
  
        </tbody>

      </table>
      <a href="{{URL::to('/print-order/'.$val->order_id)}}">In đơn hàng</a>
   
    </div>
  </div>

</div>
</div>
@endsection