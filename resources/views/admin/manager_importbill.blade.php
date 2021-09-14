@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng nhập
    </div>
    
    
    <div class="table-responsive">
      <table class="table table-bordered table-striped b-t b-light">
        <?php
        $stt=1
        ?>
        <thead>
          <tr>

            <th style="color: black"><center>STT</center></th>
            <th style="color: black"><center>Tên nhân viên</center></th>
            <th style="color: black"><center>Tổng tiền</center></th>
            <th style="color: black"><center>Ngày nhập hàng</center></th> 
            <th  style="color: black"><center>Chức năng</center></th>
          </tr>
        </thead>
        <tbody>

          @foreach($data as $key => $val)
          <tr>       
            <td style="color: black">{{$stt++}}</td>  
            @foreach($admin as $ad)
            @if($ad->admin_id==$val->admin_id)
            <td style="color: black">{{ $ad->admin_name }}</td>
            @endif
            @endforeach
            <td style="color: red;text-align: right">{{number_format( $val->bill_total )}} đ</td>
            <td style="color: black">{{  date('d/m/Y', strtotime($val->created_at)) }}</td>
            <td>
              <a href="{{URL::to('/view-bill/'.$val->bill_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-eye text-success text-active"></i></a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>

  </div>
</div>
@endsection