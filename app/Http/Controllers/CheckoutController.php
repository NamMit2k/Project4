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
use Carbon\Carbon;
use App\Models\CategoryModel;

class CheckoutController extends Controller
{
	public function Login_checkout()
	{
		$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
		return view('pages.checkout.login_checkout');
	}
	public function logout_checkout()
	{
		Session::flush();
		return Redirect('/');
	}	
	public function login_customer(Request $request)
	{
		$email=$request->email_account;
		$password=md5($request->password_account);
		$result= DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();

		if ($result)
		{
			Session::put('customer_id',$result->customer_id);
			return Redirect::to('/');
		}
		else
		{
			return Redirect::to('login-checkout');			
		}		
	}
	public function Signin()
	{
		return view('pages.checkout.signin');
	}
	public function add_customer(Request $request)
	{
		$data = array();
		$data['customer_name'] = $request->customer_name;
		$data['customer_phone'] = $request->customer_phone;
		$data['customer_email'] = $request->customer_email;
		$data['customer_password'] = md5($request->customer_password);


		$customer_id = DB::table('tbl_customer')->insertGetId($data);

		Session::put('customer_id',$customer_id);
		Session::put('customer_name',$request->customer_name);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		return Redirect::to('/checkout');

	}
	public function checkout()
	{
		return view('pages.checkout.show_checkout');
	}
	public function save_checkout_customer(Request $request){
		$data = array();
		$data['shipping_name'] = $request->shipping_name;
		$data['shipping_phone'] = $request->shipping_phone;
		$data['shipping_email'] = $request->shipping_email;
		$data['shipping_note'] = $request->shipping_note;
		$data['shipping_address'] = $request->shipping_address;
		$data['created_at']= Carbon::now('Asia/Ho_Chi_Minh');

		$shipping_id = DB::table('tbl_shipping')->insertGetId($data);

		Session::put('shipping_id',$shipping_id);
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';

		return Redirect::to('/payment');
	}
	public function payment()
	{
		return view('pages.checkout.payment');
	}
	public function order_place(Request $request)
	{
		//Lấy hình thức thanh toán
		$data = array();
		$data['payment_method'] = $request->payment_option;
		$data['payment_status'] = 1;
		$payment_id = DB::table('tbl_payment')->insertGetId($data);
		//insert vào order
		$order_data = array();
		//lấy thông tin customer đựa vào session
		$order_data['customer_id'] = Session::get('customer_id');
		$order_data['shipping_id'] = Session::get('shipping_id');
		$order_data['payment_id'] = $payment_id;
		$order_data['order_total'] = Cart::priceTotal();
		$order_data['order_status'] = 0;
		$order_data['created_at']= Carbon::now('Asia/Ho_Chi_Minh');
		$order_id = DB::table('tbl_order')->insertGetId($order_data);


		//insert vào order_details
		$content=Cart::content();
		foreach ($content as $key => $v_content)
		{
			$order_d_data = array();
			//lấy thông tin customer đựa vào session
			$order_d_data['order_id'] = $order_id;
			$order_d_data['product_id'] = $v_content->id;
			$order_d_data['product_name'] = $v_content->name;
			$order_d_data['product_price'] = $v_content->price;
			$order_d_data['product_sales_quantity'] = $v_content->qty;
				$order_d_data['created_at']= Carbon::now('Asia/Ho_Chi_Minh');
			DB::table('tbl_order_details')->insert($order_d_data);
		}
		if ($data['payment_method']==1)
		{
			echo "Thanh toán bằng thẻ ATM";
		}
		else
		{
			//thanh toán bằng tiền mặt
			Cart::destroy();
			return view('pages.checkout.handcash');
		}
	}
	
}
