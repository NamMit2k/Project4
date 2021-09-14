@extends('admin_layout')
@section('admin_content')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css"></script>

<div class="row">
	<!-- 	//left -->
	<div class="col-sm-5" >
		<div class="col-sm-7" style="margin-top: 40px;">
			<center><h2>Biểu đồ thống kê</h2></center>
			<div style="margin-top: 20px;width: 900px height:700px"  id="donut-example" class="morris-donut-inverse">	

			</div>
		</div>
		<div class="col-sm-5" style="margin-top: 50px;">
			<h3 >Ghi chú</h3>
			<table border="2px solid gray" style="width: 200px;height: 200px;border: 2px dashed gray">
				<tr>
					<td style="width: 50px;height: 50px;">
						<div style="width:30px;height:30px;background:#76ed26;border-radius:5px;margin-left: 10px"></div>
					</td>
					<td style="text-align: center;">Tổng Số Lượng Sản Phẩm</td>
				</tr>
				<tr>
					<td style="width: 50px;height: 50px;">
						<div style="width:30px;height:30px;background:#eb4034;border-radius:5px;margin-left: 10px"></div>
					</td>
					<td style="text-align: center;">Sản Phẩm</td>
				</tr>
				<tr>
					<td style="width: 50px;height: 50px;">
						<div style="width:30px;height:30px;background:#edd626;border-radius:5px;margin-left: 10px"></div>
					</td>
					<td style="text-align: center;">Danh Mục</td>
				</tr>
				<tr>
					<td style="width: 50px;height: 50px;">
						<div style="width:30px;height:30px;background:#fc0303;border-radius:5px;margin-left: 10px"></div>
					</td>
					<td style="text-align: center;">Khách Hàng</td>
				</tr>
				<tr>
					<td style="width: 50px;height: 50px;">
						<div style="width:30px;height:30px;background:#8626ed;border-radius:5px;margin-left: 10px"></div>
					</td>
					<td style="text-align: center;">Admin</td>
				</tr>
				<tr>
					<td style="width: 50px;height: 50px;">
						<div style="width:30px;height:30px;background:#26C6DA;border-radius:5px;margin-left: 10px"></div>
					</td>
					<td style="text-align: center;">Đặt hàng</td>
				</tr>

			</table>
		</div>
	</div>
	<!-- 	//right -->
	<div class="col-sm-7">
		<div 💈 id="bieudo" data-list="{{ $day }}" data-money="{{ $money }}"></div>
	</div>
	

</div>




<!-- hàng2 -->
<div class="row">
	<div class="col-sm-6" style="margin-top: 20px;">
		<center><h3>Danh sách đơn hàng chờ xác nhận</h3></center>		
		<form action=" " method="GET" style="display:flex;">
			<div class="form-group">
				<input style="width: 200px;" type="date" name="date_from1" class="form-control">					
			</div>
			<div class="form-group">
				<input style="width: 200px;margin-left: 10px;" type="date" name="date_to1" class="form-control" >					
			</div>
			<input style="width: 100px;margin-left: 20px;" class="form-control"  type="submit" name="" value="Tìm kiếm">
		</form>	
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<td  style="color: black;text-align: center;">STT</td>
					<td  style="color: black;text-align: center;">Tên khách hàng</td>
					<td  style="color: black;text-align: center;">Thành tiền</td>
					<td  style="color: black;text-align: center;">Ngày đặt</td>
					<td  style="color: black;text-align: center;">Chi tiết</td>
					<td  style="color: black;text-align: center;">Trạng thái</td>
				</tr>
			</thead>
			<tbody>
				<?php $stt=1; ?>
				@foreach($orderun as $val1)
				<tr>
					<td  style="color: black">{{$stt++}}</td>
					@foreach($cus as $k)
					@if($val1->customer_id==$k->customer_id)
					<td  style="color: black;">{{$k->customer_name}}</td>
					@endif
					@endforeach
					<td  style="color: black;text-align: right;">{{$val1->order_total}}đ</td>
					<td  style="color: black">{{date('d/m/Y', strtotime($val1->created_at))}}</td>
					<td  style="color: black"> <a href="{{URL::to('/view-order/'.$val1->order_id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-eye text-success text-active"></i></a>
					</td>	
					<td  style="color: black">   <?php
					if($val1->order_status==1){
						?>
						<a  href="" style="color: blue"><i class="fa fa-vimeo" aria-hidden="true"></i>Đơn hàng đã xác nhận</a>
						<?php
					}else{
						?>  
						<a onclick="return confirm('Bạn có chắc chấp nhận đơn hàng này không?')" href="{{URL::to('/active-order/'.$val1->order_id)}}" style="color:red"><i class="fa fa-times" aria-hidden="true"></i>Đơn hàng chưa xác nhận</a>
						<?php
					}
					?></td>
				</tr>
				@endforeach
			</tbody>

		</table>
		<center>{{$orderun->links()}}</center>
	</div>
	<div class="col-sm-6" style="margin-top: 20px;">
		<center><h3>Thống kê doanh số</h3></center>		
		<form action=" " method="GET" style="display:flex;">
			<div class="form-group">
				<input style="width: 200px;" type="date" name="date_from1" class="form-control">					
			</div>
			<div class="form-group">
				<input style="width: 200px;margin-left: 10px;" type="date" name="date_to1" class="form-control" >					
			</div>
			<input style="width: 100px;margin-left: 20px;" class="form-control"  type="submit" name="" value="Tìm kiếm">
		</form>	
		<table border="1" id="doanhso" class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<td  style="color: black;text-align: center;">Tên khách hàng</td>
					<td  style="color: black;text-align: center">Thành tiền</td>	

				</tr>				
			</thead>
			<style type="text/css">
				p{
					text-align: right;
					color: black;
				}			
			</style>
			<tbody>
				<?php 
				$d3=0;
				$d=0;
				?>
				@foreach($total_order1 as $va)
				<tr>
					@foreach($cus as $valc)
					@if($valc->customer_id == $va->customer_id)
					<td style="color: black">{{$valc->customer_name}}</td>
					@endif
					@endforeach
					<td><p style="text-align: right">{{$va->order_total}}đ</p></td>


					<?php 
					$d1 = str_replace(".00","",$va->order_total);		
					$d2 = str_replace(",","",$d1);		
					$d3 +=$d2;							
					?>			
					@endforeach

					

				</tr>
				<td></td>
				<?php 
				echo  "<td><p> Tổng tiền danh sách hóa đơn:".number_format($d3)."đ</p></td>";
				?>	


				
			</table>
			<form action="{{URL::to('/export-order')}}" method="post" enctype="multidata/form-data">
				@csrf				
				<input type="submit"  name="xuattep" value="Xuất Tệp" class="btn btn-primary">
			</form>
		</div>

	</div>

</div>
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script>
	var listday=$("#bieudo").attr("data-list");
	listday=JSON.parse(listday);
	var listmoney=$("#bieudo").attr("data-money");
	listmoney=JSON.parse(listmoney);
	console.log(listmoney);
	$(function () {
		Highcharts.chart('bieudo', {
			title: {
				text: 'Biểu đồ doanh số các ngày trong tháng này',
			},
			xAxis: {
				categories: listday
			},
			yAxis: {
				title: {
					text: 'Giá trị'
				},
				plotLines: [{
					value: 100,
					width: 1,
					color: '#808080'
				}]
			},
			tooltip: {
				valueSuffix: 'vnđ'
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle',
				borderWidth: 0
			},
			series: [{
				data: listmoney
			}]
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#doanhso').DataTable( {
			dom: 'Bfrtip',
			buttons: [
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            'excel', 'pdf',
            ]
        } );
	} );
</script>
<script type="text/javascript">
	var colorDanger = "#FF1744";
	Morris.Donut({
		element: 'donut-example',
		resize: true,
		colors: [
		'#76ed26',
		'#eb4034',
		'#edd626',
		'#fc0303',
		'#8626ed',
		'#26C6DA',

		],
  //labelColor:"#cccccc", // text color
  //backgroundColor: '#333333', // border color
  data: [
  {label:"Tổng số lượng sản phẩm", value:<?php echo $sl_pro; ?>},
  {label:"Sản phẩm", value:<?php echo $product; ?>},
  
  {label:"Danh mục", value:<?php echo $cate; ?>},
  {label:"Khách hàng", value:<?php echo $customer; ?>},
  {label:"Admin", value:<?php echo $admin; ?>},
  {label:"Đặt hàng", value:<?php echo $order; ?>}
  ]
});

</script> 
@endsection