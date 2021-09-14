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
use App\Exports\ExportOrder;
use Excel;
use App\HelpersClass\Date;
class AdminController extends Controller
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
	public function index()
	{
		return view('admin_login');
	}
	public function showdashboard()
	{
		$this->AuthLogin();

		$product= DB::table('tbl_products')->get()->count();
		$sl_pro= DB::table('tbl_products')->get()->sum("product_quantity");
		$cate= DB::table('tbl_category_product')->get()->count();
		$customer= DB::table('tbl_customer')->get()->count();
		$admin= DB::table('tbl_admin')->get()->count();
		$order= DB::table('tbl_order')->get()->count();

		$orderactive=DB::table('tbl_order')->where('order_status',1)->paginate(5);
		if (request()->date_from && request()->date_to)
		{
			$orderactive=DB::table('tbl_order')->where('order_status',1)->where('created_at','>=',request()->date_from)->where('created_at','<=',request()->date_to)->paginate(5);
		}	

		$orderun=DB::table('tbl_order')->where('order_status',0)->paginate(5);
		if (request()->date_from1 && request()->date_to1)
		{
			$orderun=DB::table('tbl_order')->where('order_status',0)->where('created_at','>=',request()->date_from1)->where('created_at','<=',request()->date_to1)->paginate(5);
		}	

		$total_order=DB::table('tbl_order')->where('order_status',1)->where('order_status',1)->paginate(5);
		if (request()->date_from1 && request()->date_to1)
		{
			$total_order=DB::table('tbl_order')->where('order_status',1)->where('created_at','>=',request()->date_from1)->where('created_at','<=',request()->date_to1)->count();
		}	

		$total_order1=DB::table('tbl_order')->where('order_status',1)->where('order_status',1)->get();
		if (request()->date_from1 && request()->date_to1)
		{
			$total_order1=DB::table('tbl_order')->where('order_status',1)->where('created_at','>=',request()->date_from1)->where('created_at','<=',request()->date_to1)->get();
		}	
		$cus=DB::table('tbl_customer')->get();

		//Lấy về các ngày trong tháng
		$listday=Date::getListDayInMonth();	
		$day=json_encode($listday);
		
		//Tính doanh thu của ngày
		$doanhthu= DB::table('tbl_order')
		->where('order_status',1)
		->whereMonth('created_at',date('m'))
		->select(\DB::raw('DATE(created_at) day'))
		->groupBy('day')
		->get();

		$kq1= DB::table('tbl_order')
		->where('order_status',1)->get();
	
		$arrdate = [];
		foreach ($listday as $list) 
		{	
			$d=0;
			$d1=0;
			$d2=0;
			foreach ($kq1 as $val) 
			{		
				$val->created_at = date('Y-m-d', strtotime($val->created_at));
				if ($val->created_at == $list)
				{				
					$d= str_replace(".00","",$val->order_total);		
		 			$d1 = str_replace(",","",$d);	
		 			$d2 +=$d1;
						 		
				}
			}	
			$arrdate[]=(int)$d2;			
		}
		//dd($arrdate);	
		$money= json_encode($arrdate);
		return view('admin.dashboard',compact('product','cate','customer','admin','order','sl_pro','orderactive','orderun','total_order','total_order1','cus','day','money'));
	}  
	public function dashboard(Request $request)
	{
		$admin_email=$request->admin_email;
		$admin_password=md5($request->admin_password);
		//mã hóa md5 ở bên mysql
		$result= DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
		if($result)
		{
			Session::put('admin_name',$result->admin_name);
			Session::put('admin_id',$result->admin_id);
		     		//trả về trang dashboard
			return Redirect::to('/dashboard');
		}
		else
		{
			Session::put('message','Tài khoản hoặc mật khẩu sai.Mời bạn nhập lại thông tin');
			return Redirect::to('/admin');
		};
	}

	public function locdon()
	{
		return view('admin.locdon');
	}
	public function search_order(Request $request)
	{
		if (request()->date1 && request()->date2)
		{
			$total_order=DB::table('tbl_order')->where('order_status',1)->where('created_at','>=',request()->date1)->where('created_at','<=',request()->date2)->get();
		}	
		return view('admin.kq',compact('total_order'));
	}


	public function export_order()
	{
		return Excel::download(new ExportOrder,'Doanhthu.xlsx');
	}
	public function desc()
	{
	$data=DB::table('tbl_order_details')
                   ->get()->groupBy(function($data) {
            return $data->product_id;
        });
                       // echo '<pre>';
                       // print_r($data);
                       // echo '</pre>';
	return view('kq',compact('data'));	
	}
}
