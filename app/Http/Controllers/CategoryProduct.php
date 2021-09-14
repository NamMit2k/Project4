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
use App\Models\CategoryModel;
use App\Imports\ExcelImport;
use App\Exports\ExcelExport;
use Excel;

class CategoryProduct extends Controller
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
		// //Danh mục index
	public function show_category_home($category_parent)
	{
		//lấy ra layout
		$category = DB::table('tbl_category_product')->where('category_status',0)->orderby('category_id','desc')->get(); 
		 //lấy ra sản phẩm thuộc danh mục
		$d = CategoryModel::Getbyidchild($category_parent );		

		return view('pages.category.show_category')->with('category',$category)->with('category_by_id',$d);
	}	
	public function show_category_daddy($category_parentt)
	{
		$category = DB::table('tbl_category_product')->where('category_status',0)->orderby('category_id','desc')->get(); 
		$daddy = CategoryModel::Getbyiddaddy($category_parentt);		
		return view('pages.category.show_category_daddy')->with('category',$category)->with('daddy',$daddy);
	}

	public function add_category_product()
	{
		$this->AuthLogin();
		$category_products = DB::table('tbl_category_product')->where('category_parent','0')->orderby('category_id','desc')->get(); 
		return view('admin.add_category_product')->with('category_products',$category_products);
	}
	public function all_category_product()
	{
		$this->AuthLogin();
		$category_products = DB::table('tbl_category_product')->where('category_parent',0)->orderby('category_id','desc')->get(); 

		$datas= DB::table('tbl_category_product')->orderBy('category_id','DESC')->get();
		return view('admin.all_category_product')->with('datas',$datas)->with('category_products',$category_products);

	} 	
	public function unactive_category_product($category_product_id)
	{
		$this->AuthLogin();
		$data= CategoryModel::Unactive($category_product_id);
		Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
		return Redirect::to('all-category-product');
	}  
	public function active_category_product($category_product_id)
	{
		$this->AuthLogin();
		$data= CategoryModel::Active($category_product_id);
		Session::put('message','Kích hoạt danh mục sản phẩm thành công');
		return Redirect::to('all-category-product');
	}
	
	public function save_category_product()
	{
		$this->AuthLogin();
		$data= CategoryModel::Adddata();
		Session::put('message','Thêm danh mục sản phẩm thành công');
		return Redirect::to('all-category-product');
	}
	public function edit_category_product($category_id)
	{
		$this->AuthLogin();
		$data=CategoryModel::Edit($category_id);
		$cate=DB::table('tbl_category_product')->get();
		 // $manager_category_product=view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
		return view('admin.edit_category_product',compact('data','cate')); 
		//dd($data);
	}
	public function update_category_product(Request $request, $category_product_id)
	{
		$this->AuthLogin();
		$data= CategoryModel::Updatedata($category_product_id);
		if ($data)
		{
			Session::put('message','Cập nhật danh mục sản phẩm thành công');
			return Redirect::to('all-category-product');	
		}
		else
		{
			echo "Looi";
		}
	}
	public function delete_category_product($category_product_id)
	{
		$this->AuthLogin();
		$data= CategoryModel::Deletedata($category_product_id);
		Session::put('message','Xóa danh mục sản phẩm thành công');
		return Redirect::to('all-category-product');   
	}
	public function getdata()
	{
		$data=CategoryModel::all();
		return view('getloai',compact('datas'));
	}
	public function export_csv()
	{
		return Excel::download(new ExcelExport,'Danhmuc.xlsx');
	}

	public function import_csv(Request $request)
	{
		$path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImport, $path);
      	return back();

	}


}
