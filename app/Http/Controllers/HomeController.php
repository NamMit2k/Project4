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
use App\Models\HomeModel;
use App\Models\CategoryModel;


class HomeController extends Controller
{
 public function index()
 {
       //$cate_product = DB::table('tbl_category_product')->whereraw('category_status = 0 and category_parent = 0')->orderby('category_id','asc')->get();  
   $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 

   $danhmuc=CategoryModel::has('children')->get();

   $product= DB::table('tbl_products')->where('product_status','0')->orderby('product_id','desc')->get();
   $product1= DB::table('tbl_products')->where('product_status','0')->orderby('product_id','desc')->limit(25)->get();

   return view('pages.home')->with('category',$cate_product)->with('product',$product)->with('product1',$product1)->with('cate',$danhmuc);


 }
 public function search(Request $request)
 {
  $keywords = $request->keywords_submit;
  $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
  $search_product = DB::table('tbl_products')->where('product_name','like','%'.$keywords.'%')->paginate(12); 
  return view('pages.Product.search')->with('category',$cate_product)->with('search_product',$search_product);
}
public function allproduct()
{  
  $category = DB::table('tbl_category_product')->where('category_status',0)->orderby('category_id','desc')->get(); 

  $data= DB::table('tbl_products')->paginate(12);
  return view('pages.allproduct',compact('data','category'));
}
public function order_cus(Request $request)
{  

  if ($request->session()->has('customer_id'))
  {
    $cus=$request->session()->get('customer_id');
      //$data=DB::table('tbl_order')->where('customer_id',$cus)->get();
    $customer=DB::table('tbl_customer')->get();
    $product=DB::table('tbl_products')->get();
    $order_details= DB::table('tbl_order_details')->get();

    $dt = DB::table('tbl_order')
    ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
    ->where('tbl_customer.customer_id',$cus)->get();
      //đơn hàng chờ
    $data_no = DB::table('tbl_order')
    ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
    ->where('tbl_customer.customer_id',$cus)->where('order_status',0)->get();

        //đơn hàng xác nhận
    $data_yes = DB::table('tbl_order')
    ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
    ->where('tbl_customer.customer_id',$cus)->where('order_status',1)->get();
    
    //đơn hàng hủy
     $cancel = DB::table('tbl_order')
    ->where('order_status',2)->get();
    return view('pages.cart.order_cus',compact('cus','customer','dt','product','order_details','data_no','data_yes','cancel'));      
  }
  else
  {
    return Redirect('/login-checkout');
  }
}

public function chi_tiet_don($id)
{
  $product=DB::table('tbl_products')->get();
  $ship=DB::table('tbl_shipping')
  ->join('tbl_order','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
  ->where('tbl_order.order_id',$id)
  ->get();
  $order= DB::table('tbl_order')->where('order_id',$id)->get();
  $data=DB::table('tbl_order')
  ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
  ->where('tbl_order.order_id',$id)->get();
  //return$order;
  return view('pages.cart.order_details',compact('data','product','order','ship'));

}
public function active_order($id)
{
  DB::table('tbl_order')->where('order_id',$id)->update(['order_status'=>1]);

  $data=DB::table('tbl_order_details')
  ->join('tbl_order','tbl_order.order_id','=','tbl_order_details.order_id')
  ->where('tbl_order.order_status',1)
  ->get();
  $product= DB::table('tbl_products')->get();

  $d=DB::table('tbl_order_details')
  ->join('tbl_products','tbl_products.product_id','=','tbl_order_details.product_id')
  ->where('tbl_order_details.order_id',$id)
  ->get();
  
  foreach($d as $val)
  {
        $db=DB::table('tbl_products')->where('product_id', $val->product_id)->get();      
        $sl = $db[0]->product_quantity-$val->product_sales_quantity;        
        DB::table('tbl_products')->where('product_id', $val->product_id)->update(['product_quantity' => $sl]);       
  }
  return Redirect::to('manager-order');
}
public function cancel_order($id)
{
  DB::table('tbl_order')->where('order_id',$id)->update(['order_status'=>2]);
  return Redirect::to('/order-cus');
}
public function reset_order($id)
{
  DB::table('tbl_order')->where('order_id',$id)->update(['order_status'=>0]);
  return Redirect::to('/order-cus');
}
}
