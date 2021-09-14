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

class BrandProduct extends Controller
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
	public function add_brand_product()
	{
		$this->AuthLogin();
		return view('admin.add_brand_product');
	}
	public function all_brand_product()
	{
		$this->AuthLogin();
		$all_brand_product=DB::table('tbl_brand_product')->get();
		$manager_brand_product=view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
    	//
		return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);	
	} 
	public function save_brand_product(Request $request)
	{
		$this->AuthLogin();
		$data = array();
    	//Tên cột trong database=tên input truyền vào
		$data['brand_name']= $request->brand_product_name;
		$data['brand_desc']= $request->brand_product_desc;
		$data['brand_status']= $request->brand_product_status;

    	//Add data
		DB::table('tbl_brand_product')->insert($data);
		Session::put('message','Thêm danh mục sản phẩm thành công');
		return Redirect::to('all-brand-product');
    	// echo "<pre>";
    	// print_r($data);
    	// echo "</pre>";
	}
	public function unactive_brand_product($brand_product_id)
	{
		$this->AuthLogin();
		DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
		Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
		return Redirect::to('all-brand-product');
	}  
	public function active_brand_product($brand_product_id)
	{$this->AuthLogin();
		DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
		Session::put('message','Kích hoạt danh mục sản phẩm thành công');
		return Redirect::to('all-brand-product');
	}
	public function edit_brand_product($brand_product_id)
	{
		$this->AuthLogin();
		$edit_brand_product=DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get();// check mã trung vs mã cần sửa->lấy dữ liệu ra
		$manager_brand_product=view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
		return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);	
	}
	public function update_brand_product(Request $request,$brand_product_id)
	{
		$this->AuthLogin();
		$data=array();	
		$data['brand_name']= $request->brand_product_name;
		$data['brand_desc']= $request->brand_product_desc;
		//update data
		DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update($data);
		Session::put('message','Cập nhật danh mục sản phẩm thành công');
		return Redirect::to('all-brand-product');	
	}
	public function delete_brand_product($brand_product_id)
	{
		$this->AuthLogin();
		DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->delete();
		Session::put('message','Xóa danh mục sản phẩm thành công');
		return Redirect::to('all-brand-product');	
	}
}
