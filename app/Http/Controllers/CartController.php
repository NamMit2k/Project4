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


class CartController extends Controller
{
	public function save_cart(Request $request)
	{
		// khi nhấn thêm vòa giỏ hàng thì sẽ post 1 form -> lấy về id sp khi thêm
		$product_id = $request->productid_hidden;
		// lấy về id sp khi thêm
		$quantity	= $request->qty;
		//truy vấn đến banggr sản phẩm và lấy thông tin sp có id== id truyền vào
		$product_info=DB::table('tbl_products')->where('product_id',$product_id)->first();
		//gán gtri của cart= gtri lấy dk từ câu truy vấn trên
		$data['id']=$product_info->product_id;
		$data['qty']=$quantity;
		$data['name']=$product_info->product_name;
		$data['price']=$product_info->product_price;
		$data['options']['image']=$product_info->product_image;
		$data['weight']='10';
		// Cart và thực thi add vào dlieu cart
		Cart::add($data);
		return Redirect::to('/show-card');
    	// echo "<pre>";
    	// print_r($data);
    	// echo "</pre>";
	}
	public function show_cart()
	{
		$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
		return view('pages.cart.showcart')->with('category',$cate_product);
	}
	public function delete_to_cart($rowId)
	{
		//Xóa sản phẩm dựa vào rowid đưa số lượng sp trong giỏ hàng bằng 0
		Cart::update($rowId,0);
		return Redirect::to('/show-card');
	}
	public function update_cart_quantity(Request $request)
	{
		$rowId=$request->rowId_cart;
		$qty=$request->cart_quantity;
		Cart::update($rowId,$qty);
		return Redirect::to('/show-card');
	}
	public function add_cart_ajax(Request $request){
		$data = $request->all();
		$session_id = substr(md5(microtime()),rand(0,26),5);
		$cart = Session::get('cart');
		if($cart==true){
			$is_avaiable = 0;
            //Nếu tồn tại thì vòng lặp lấy dlieu ra
			foreach($cart as $key => $val){
				if($val['product_id']==$data['cart_product_id']){
					$is_avaiable++;
				}
			}
            //Nếu không có trung thì tạo cart mới
			if($is_avaiable == 0){
				$cart[] = array(
					'session_id' => $session_id,
					'product_name' => $data['cart_product_name'],
					'product_id' => $data['cart_product_id'],
					'product_image' => $data['cart_product_image'],
					'product_qty' => $data['cart_product_qty'],
					'product_price' => $data['cart_product_price'],
				);
				Session::put('cart',$cart);
			}
		}else{
				$cart[] = array(
					'session_id' => $session_id,
					'product_name' => $data['cart_product_name'],
					'product_id' => $data['cart_product_id'],
					'product_image' => $data['cart_product_image'],
					'product_qty' => $data['cart_product_qty'],
					'product_price' => $data['cart_product_price'],

				);
				Session::put('cart',$cart);
		}       
		Session::save();

	}  
	public function gio_hang(Request $request)
	{
     	  //seo 
		$meta_desc = "Giỏ hàng của bạn"; 
		$meta_keywords = "Giỏ hàng Ajax";
		$meta_title = "Giỏ hàng Ajax";
		$url_canonical = $request->url();
        //--seo
		$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
		$brand_product = DB::table('tbl_brand_product')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

		return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
	} 
	public function update_cart_ajax(Request $request)
	{
		//Gửi bnhieu lấy bấy nhiêu
		$data=$request->all();
		$cart=Session::get('cart');
		if ($cart==true) {
			foreach ($data['cart_qty'] as $key => $qty) {
				foreach ($cart as  $session =>$val) {

					if ($val['session_id']==$key) {
						//update sesstion id vs số lượng = số lượng mới
						$cart[$session]['product_qty']=$qty;
					}
				}
			}
			Session::put('cart',$cart);
			return redirect()->back()->with('message','Cập nhật số lượng sản phẩm thành công');
		}
		else
		{
			return redirect()->back()->with('message','Cập nhật số lượng sản phẩm thất bại');
		}
	}

	public function delete_cart($session_id)
	{
		$cart =Session::get('cart');
		if($cart==true)
		{
			foreach ($cart as $key => $val) {
				if ($val['session_id']==$session_id)
				{
     				//unset cart mang vị trí đó
					unset($cart[$key]);
				}
			}
			Session::put('cart',$cart);
			return redirect()->back()->with('message','Xóa sản phẩm thành công');
		}
		else
		{
			return redirect()->back()->with('message','Xóa sản phẩm thất bại');
		}
	}
	public function delete_all_cart()
	{
		$cart=Session::get('cart');
		if ($cart==true) 
		{
			//Nếu dùng session::destroy thì xóa tất cả session cả login
			Session::forget('cart');
			return redirect()->back()->with('message','Xóa hết sản phẩm thành công');
		}
	}
}
