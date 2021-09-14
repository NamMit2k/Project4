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
use DateTime;
use Carbon\Carbon;
use Cart;

class ImportbillController extends Controller
{

	public function manager_importbill()
	{
		$admin=DB::table('tbl_admin')->get();
	 $data= DB::table('tbl_bill')->orderBy('bill_id','DESC')->get();
	 return view('admin.manager_importbill',compact('data','admin'));		
	}
	public function import_bill(Request $request)
	{
		$product= DB::table('tbl_products')->where('product_status',0)->orderBy('product_id','DESC')->paginate(8);
		$keywords = $request->keywords_submit;
		$search_product = DB::table('tbl_products')->where('product_name','like','%'.$keywords.'%')->orderBy('product_id','DESC')->paginate(8); 
		return view('admin.import_bill',compact('product','search_product'));    	
	}
	public function save_bill(Request $request)
	{
		$product_id = $request->productid_hidden;
		$quantity	= 1;
		$product_info=DB::table('tbl_products')->where('product_id',$product_id)->first();
		$data['id']=$product_info->product_id;
		$data['qty']=$quantity;
		$data['name']=$product_info->product_name;
		$data['price']=$product_info->product_price;
		$data['options']['image']=$product_info->product_image;
		$data['weight']='10';
		Cart::add($data);

    	//  echo "<pre>";
    	//  print_r($data);
    	//  echo "</pre>";
		return Redirect::to('/bill');
	}
	public function delete_bill($rowId)
	{
		//Xóa sản phẩm dựa vào rowid đưa số lượng sp trong giỏ hàng bằng 0
		Cart::update($rowId,0);
		return Redirect::to('/bill');
	}
	public function update_bill_quantity(Request $request)
	{
		$rowId=$request->rowId_cart;
		$qty=$request->cart_quantity;
		Cart::update($rowId,$qty);
		return Redirect::to('/bill');
	}

	public function add_bill(Request $request)
	{
		$content=Cart::content();
		$d=0;
		$d1=0;

		foreach ($content as $val)
		{
			$d=$val->price*$val->qty;
			$d1 += $d;
		}
		// echo '<pre>';
		// print_r($d1);
		// echo '</pre>';
		//insert vào order
		$bill_data = array();
		 //lấy thông tin customer đựa vào session
		$bill_data['admin_id'] = Session::get('admin_id');
		$bill_data['bill_total'] = $d1;
		$bill_data['created_at']= Carbon::now('Asia/Ho_Chi_Minh');
		$bill_id = DB::table('tbl_bill')->insertGetId($bill_data);

		//insert vào order_details
		foreach($content as $key => $v_content)
		{
			$bill_d_data = array();
		 	//lấy thông tin customer đựa vào session
			$bill_d_data['bill_id'] = $bill_id;
			$bill_d_data['product_id'] = $v_content->id;
			$bill_d_data['product_name'] = $v_content->name;
			$bill_d_data['product_price'] = $v_content->price;
			$bill_d_data['product_quantity'] = $v_content->qty;
			$bill_d_data['created_at']= Carbon::now('Asia/Ho_Chi_Minh');
			$billdetails_id=DB::table('tbl_bill_details')->insertGetId($bill_d_data);
		}	
		Cart::destroy();

		$d=DB::table('tbl_bill_details')  
		->join('tbl_bill','tbl_bill.bill_id','=','tbl_bill_details.bill_id')
  		->where('tbl_bill_details.bill_id',$bill_id)
  		->get();
		foreach($d as $val)
		{
			$db=DB::table('tbl_products')->where('product_id', $val->product_id)->get();      
			$sl1 = $db[0]->product_quantity+$val->product_quantity;        
			DB::table('tbl_products')->where('product_id', $val->product_id)->update(['product_quantity' => $sl1]);  
		}
		
		//return view('kq');	
	}
}
