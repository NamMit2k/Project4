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
use App\Models\ProductModel;

class ProductsController extends Controller
{
	public function AuthLogin()
	{
		$admin_id= Session::get('admin_id');
		if ($admin_id)
		{
			return Redirect::to('admin.dashboard');
		}
		else
		{
			return Redirect::to('admin')->send();
		}
	}
	public function add_product()
	{
		$this->AuthLogin();

		$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
		$brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get(); 
		return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product',$brand_product);

	}
	public function all_product()
	{
		// $data = test->getdata();
		// return view('tets', ['data'=>$data]);


		$this->AuthLogin();
		$all_product=DB::table('tbl_products')->orderby('product_id','desc')->get();
		$cate_name = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
		$manager_product=view('admin.all_product')->with('all_product',$all_product)->with('cate',$cate_name);
		return view('admin_layout')->with('admin.all_product',$manager_product);	
	} 
	public function save_product(Request $request)
	{
		$this->AuthLogin();
		$data = array();
    	//Tên cột trong database=tên input truyền vào
		$data['product_name']= $request->product_name;
		$data['category_id']= $request->product_cate;
		$data['brand_id']= $request->product_brand;
		$data['product_desc']= $request->product_desc;
		$data['product_content']= $request->product_content;
		$data['product_price']= $request->product_price;
		$data['product_quantity']= $request->product_quantity;
		$data['product_status']= $request->product_status;
		$data['created_at']= Carbon::now('Asia/Ho_Chi_Minh');
		//image

		$get_image = $request->file('product_image');

		if($get_image){
			$get_name_image = $get_image->getClientOriginalName();
			//current lấy ký tự trc dấu chấm
			$name_image = current(explode('.',$get_name_image));
			//random thêm số vào trong tên file ảnh
			$new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
			$get_image->move('public/uploads/product',$new_image);
			$data['product_image'] = $new_image;
			DB::table('tbl_products')->insert($data);
			Session::put('message','Thêm sản phẩm thành công');
			return Redirect::to('all-product');
		}
		$data['product_image'] = '';
		DB::table('tbl_products')->insert($data);
		Session::put('message','Thêm sản phẩm thành công');
		return Redirect::to('all-product');

	}
	public function unactive_product($product_id)
	{$this->AuthLogin();
		DB::table('tbl_products')->where('product_id',$product_id)->update(['product_status'=>1]);
		Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
		return Redirect::to('all-product');
	}  
	public function active_product($product_id)
	{$this->AuthLogin();
		DB::table('tbl_products')->where('product_id',$product_id)->update(['product_status'=>0]);
		Session::put('message','Kích hoạt danh mục sản phẩm thành công');
		return Redirect::to('all-product');
	}
	public function edit_product($product_id)
	{
		$this->AuthLogin();
		$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
		$brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get(); 

		$edit_product=DB::table('tbl_products')->where('product_id',$product_id)->get();// check mã trung vs mã cần sửa->lấy dữ liệu ra
		$manager_product=view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
		return view('admin_layout')->with('admin.edit_product',$manager_product);	
	}
	public function update_product(Request $request,$product_id)
	{
		$this->AuthLogin();
		$data=array();	
		$data['product_name']= $request->product_name;
		$data['category_id']= $request->product_cate;
		$data['brand_id']= $request->product_brand;
		$data['product_desc']= $request->product_desc;
		$data['product_content']= $request->product_content;
		$data['product_price']= $request->product_price;
		$data['product_quantity']= $request->product_quantity;
		$data['updated_at']= Carbon::now('Asia/Ho_Chi_Minh');
		$get_image=$request->file('product_image');
		if($get_image){
			$get_name_image = $get_image->getClientOriginalName();
			$name_image = current(explode('.',$get_name_image));
			$new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
			$get_image->move('public/uploads/product',$new_image);
			$data['product_image'] = $new_image;
			DB::table('tbl_products')->where('product_id',$product_id)->update($data);
			Session::put('message','Cập nhật sản phẩm thành công');

			return Redirect::to('all-product');
		}

		DB::table('tbl_products')->where('product_id',$product_id)->update($data);
		Session::put('message','Cập nhật sản phẩm thất bại');
		return Redirect::to('all-product');
	}
	public function delete_product($product_id)
	{	
		$this->AuthLogin();
		DB::table('tbl_products')->where('product_id',$product_id)->delete();
		Session::put('message','Xóa danh mục sản phẩm thành công');
		return Redirect::to('all-product');	
	}

	public function details_product($product_id)
	{
		$cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
		$brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get(); 

		$details_product = DB::table('tbl_products')
		->join('tbl_category_product','tbl_category_product.category_id','=','tbl_products.category_id')
		->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_products.brand_id')
		->where('tbl_products.product_id',$product_id)->get();
		return view('pages.Product.product_details')->with('cate_product', $cate_product)->with('brand_product',$brand_product)->with('details_product',$details_product);
		// echo "<pre>";
		// print_r($details_product);
		// echo "</pre>";
	}

	
}
