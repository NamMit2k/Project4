@extends('admin_layout')
@section('admin_content')
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Page Title</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>	
	<div class="container">
		<form action="{{ URL::to('/search-bill')}}" method="Get" >
			{{csrf_field()}}  
			<div class="input-group rounded" style="width: 500px;margin-left: 550px;">
				<input class="form-control" style="font-size: 16px;width: 50%;margin-left: 10px;"  id="name" name="keywords_submit" type="text" 
				placeholder="Tìm kiếm sản phẩm... " > 
				<span class="input-group-text border-0" id="search-addon">
					<i class="fa fa-search" aria-hidden="true"></i>
				</span>
			</div>

		</form>
		<div class="container">
			<div class="row col-sm-12">
				@foreach($search_product as $val)
				<div class="col-sm-3" style="margin-top:15px;">
					<img style="width: 100%;height: 250px" src="public/uploads/product/{{ $val->product_image }}">	
					<p style="margin-left: 10px;font-size: 18px;font-family: sans-serif;height: 50px; overflow: hidden;
					text-overflow: ellipsis;
					line-height: 25px;
					-webkit-line-clamp: 2;">{{$val->product_name}}</p>
					<form style="margin-top: 50px;" action="{{ URL::to('/save-bill') }}" method="post">
						{{ @csrf_field() }}
						<input class="form-control" type="hidden" name="productid_hidden" value="{{ $val->product_id }}">
						<button  class="btn btn-outline-secondary" type="submit" style="font-size: 18px;font-family: sans-serif;
						color: white ;background-color: red;margin-top: -25px;height: 40px;width: 100%" >Thêm 
					</button> 

				</form> 				
			</div>	
			@endforeach
			<nav style="margin-left:400px;margin-top:20px;"  aria-label="Page navigation example">	
				<ul class="pagination">
					{{ $search_product->links() }}
				</ul>
			</nav>

		</div>
	</div>


	<?php
	$data = Cart::content();
	?>
	<div class="container" >
		<div class="row" >

		
				<table  style="margin-top: 20px" class="table table-striped table-bordered table-hover">
					<tr style="background-color: white;">			
						<td style="color: black"><b><center>Tên sản phẩm</center></b></td>
						<td style="color: black"><b><center>Giá</center></b></td>
						<td style="color: black"><b><center>Số lượng</center></b></td>
						<td style="color: black"><b><center>Tổng tiền</center></b></td>		
						<td style="color: black"><b><center>Chức năng</center></b></td>

					</tr>

					@foreach($data as $key =>$val1)
					<tr  style="background-color: white;">
						<td  style="color: black">{{$val1->name}}</td>
						<td  style="color: black">{{number_format($val1->price)}}đ</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{URL::to('/update-bill-quantity')}}" method="POST">
									{{ csrf_field() }}

									<input style="width: 100px;" class="cart_quantity_input " type="number" name="cart_quantity"  value="{{$val1->qty }}"  >
									<input type="hidden" value="{{$val1->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm"> 
								</form> 
							</div>
						</td>

						<td>
							<p class="cart_total_price">
								<?php
								$subtotal = $val1->price * $val1->qty;
								echo number_format($subtotal).' '.'vnđ';
								?>
							</p>
						</td>
						<td>
							<a class="cart_quantity_delete" href="{{URL::to('/delete-bill/'.$val1->rowId)}}"><i style="color: red" class="fa fa-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</table>

	
				<form method="POST" action="{{URL::to('/add-bill')}}">
				{{ csrf_field() }}
				<table  style="margin-top: 20px" class="table table-striped table-bordered table-hover">
					<tr style="background-color: white;">			
						<td style="color: black"><b><center>Tên sản phẩm</center></b></td>
						<td style="color: black"><b><center>Giá</center></b></td>
						<td style="color: black"><b><center>Số lượng</center></b></td>
						<td style="color: black"><b><center>Tổng tiền</center></b></td>		
						<td style="color: black"><b><center>Chức năng</center></b></td>

					</tr>

					@foreach($data as $key =>$val1)
					<tr  style="background-color: white;">
						<td  style="color: black">{{$val1->name}}</td>
						<td  style="color: black">{{number_format($val1->price)}}đ</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{URL::to('/update-bill-quantity')}}" method="POST">
									{{ csrf_field() }}

									<input style="width: 100px;" class="cart_quantity_input " type="number" name="cart_quantity"  value="{{$val1->qty }}"  >
									<input type="hidden" value="{{$val1->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm"> 
								</form> 
							</div>
						</td>

						<td>
							<p class="cart_total_price">
								<?php
								$subtotal = $val1->price * $val1->qty;
								echo number_format($subtotal).' '.'vnđ';
								?>
							</p>
						</td>
						<td>
							<a class="cart_quantity_delete" href="{{URL::to('/delete-bill/'.$val1->rowId)}}"><i style="color: red" class="fa fa-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</table>


				<div class="payment-options" style="margin-left: 700px;">				
					<input style="font-size: 17px;margin-left: 50px;width: 200px;" type="submit" value="Thêm hóa đơn" name="send_order_place" class="btn btn-danger btn-sm">
				</div>
			</form>
		</div>		
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script></body>
	</html>

	@endsection