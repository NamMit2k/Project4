<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Social;
use Socialite;
use App\Login;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha; 
use Cart;
use PDF;
use Carbon\Carbon;

class OrderController extends Controller
{

	public function manager_order()
	{
		$order=DB::table('tbl_order')->get();
		return view('admin.manager_order',compact('order'));
	}
	public function view_order($orderid)
	{
		$order_detail=DB::table('tbl_order_details')->where('order_id',$orderid)->get();
		$order=DB::table('tbl_order')->where('order_id',$orderid)->get();
		foreach ($order as $val) 
		{
			$customer_id=$val->customer_id;
			$shipping_id=$val->shipping_id;		
		}
		$customer=DB::table('tbl_customer')->where('customer_id',$customer_id)->first();
		$shipping=DB::table('tbl_shipping')->where('shipping_id',$shipping_id)->first();
		return view('admin.view_order',compact('order_detail','customer','shipping'));
	}
	public function print_order($checkout_code)
	{
		$pdf=\App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_order_convert($checkout_code));
		return $pdf->stream();
	}

	//in hóa đơn ở chi tiết
	public function print_order_convert($checkout_code)
	{
		$order_detail=DB::table('tbl_order_details')->where('order_id',$checkout_code)->get();
		$order=DB::table('tbl_order')->where('order_id',$checkout_code)->get();
		foreach ($order as $val) 
		{
			$customer_id=$val->customer_id;
			$shipping_id=$val->shipping_id;		
		}
		$customer=DB::table('tbl_customer')->where('customer_id',$customer_id)->first();
		$shipping=DB::table('tbl_shipping')->where('shipping_id',$shipping_id)->first();

		$output='';

		$output.=
		'
		<style> 
		body
		{
			font-family: DejaVu Sans;

		}
		</style>
	
		<h1 style="text-align: center;">Của Hàng Mỹ Phẩm OHUI</h1>
		<p style="text-align: center;margin-top:-10px;">ĐC:Đại Tập, Khoái Châu,Hưng Yên</p>
		<p style="text-align: center;margin-top:-10px;">SDT:0367725188</p>
		<p style="text-align: center;margin-top:-10px;">-------------</p>
		<h2 style="text-align: center">Hóa đơn bán hàng</h2>
		';

		$output.='
		

		<span>Tên khác hàng: <span style="margin-left:20px;">'.$customer->customer_name.'</span> </span >
		<span style="margin-left:130px;">Người nhận hàng:<span style="margin-left:20px;">'.$shipping->shipping_name.'</span></span>
		<br>
		<span>Số điện thoại: <span style="margin-left:33px;">'.$customer->customer_phone.'</span> </span>
		<br>				
		<span>Địa chỉ nhận hàng: <span style="margin-left:5px;">'.$shipping->shipping_address.'</span> </span>
		';

		$output.='
		
		';
		$output.='
		<table  border="1" style="width:100%;border-collapse: collapse;margin-top:30px;" >
			<thead>
				<tr style="text-align:center">
					<td>STT</td>
					<td>Tên sản phẩm</td>
					<td>Số lượng</td>
					<td>Giá bán</td>
					<td>Thành tiền</td>
				</tr>
			</thead>
			<tbody>';
			$total=0;
			$stt=1;
			foreach($order_detail as $key =>$val)
			{
				$subtotal=$val->product_price*$val->product_sales_quantity;
				$total +=$subtotal;
		
	
		$output.='
				<tr >
					<td style="text-align:center">'.$stt++.'</td>
					<td>'.$val->product_name.'</td>
					<td style="text-align:right">'.$val->product_sales_quantity.'</td>
					<td style="text-align:right">'.number_format($val->product_price).'</td>
					<td style="text-align:right">'.number_format($subtotal).'</td>	
				</tr>';
					}
		$output.='	
			</tbody>

		</table>
		<br>
		<div>--------------------------------------------------------------------------------------------------------------------------</div>
			<div style="padding-left:370px;">
				<p >Tổng tiền hàng :<span style="margin-left:50px;">'.number_format($total).'đ'.'</span></p>
				<p style="margin-top:-13px;">Chiết khấu : <span style="margin-left:100px;"> 0%</span> </p>
				<p style="margin-top:-13px;"><b>Tổng cộng</b> :  <b style="margin-left:62px;">'.number_format($total).'đ'.'</b></p>
			</div>
		<p style="text-align:center" >----------------------------------------------------------------------</p>
		<p style="text-align:center"><b>Xin cảm ơn quý khách,hẹn gặp lại!</b></p>
		';
		return $output;
	}
}
