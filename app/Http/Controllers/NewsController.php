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
class NewsController extends Controller
{

	public function index()
	{
		$dnews=  DB::table('tbl_news')->orderby('news_id','DESC')->get();
		return view('pages.news.news_view',compact('dnews'));
	}	
	public function details_news($id)
	{
		$news=  DB::table('tbl_news')->where('news_id',$id)->get();
		return view('pages.news.details_new',compact('news'));
	}
	public function all_news()
	{
		$data=  DB::table('tbl_news')->orderby('news_id','DESC')->get();
		return view('admin.all_news',compact('data'));
	}
	public function add_news()
	{
		return view('admin.add_news');
	}
	public function save_news(Request $request)
	{
		$data = array();
    	//Tên cột trong database=tên input truyền vào
		$data['news_name']= $request->news_name;
		$data['news_content']= $request->news_content;
		$data['created_at']= Carbon::now('Asia/Ho_Chi_Minh');
		//image
		$get_image = $request->file('news_image');

		if($get_image){
			$get_name_image = $get_image->getClientOriginalName();
			//current lấy ký tự trc dấu chấm
			$name_image = current(explode('.',$get_name_image));
			//random thêm số vào trong tên file ảnh
			$new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
			$get_image->move('public/uploads/news',$new_image);
			$data['news_image'] = $new_image;
			DB::table('tbl_news')->insert($data);
			Session::put('message','Thêm sản phẩm thành công');
			return Redirect::to('all-news');
		}
		$data['news_image'] = '';
		DB::table('tbl_news')->insert($data);
		//Session::put('message','Thêm sản phẩm thành công');
		return Redirect::to('all-news');

	}
	public function edit_news($id)
	{
		$edit_news=DB::table('tbl_news')->where('news_id',$id)->get();
		return view('admin.edit_new',compact('edit_news'));	
	}
	public function update_news(Request $request, $id)
	{
		$data=array();	
		$data['news_name']= $request->news_name;
		$data['news_content']= $request->news_content;

		$data['updated_at']= Carbon::now('Asia/Ho_Chi_Minh');
		$get_image=$request->file('news_image');
		if($get_image){
			$get_name_image = $get_image->getClientOriginalName();
			$name_image = current(explode('.',$get_name_image));
			$new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
			$get_image->move('public/uploads/news',$new_image);
			$data['news_image'] = $new_image;
			DB::table('tbl_news')->where('news_id',$id)->update($data);
			//Session::put('message','Cập nhật sản phẩm thành công');
			return Redirect::to('all-news');
		}

		DB::table('tbl_news')->where('news_id',$id)->update($data);
		//Session::put('message','Cập nhật sản phẩm thất bại');
		return Redirect::to('all-news');
	}
	public function delete_news($id)
	{	
		;
		DB::table('tbl_news')->where('news_id',$id)->delete();
		//Session::put('message','Xóa danh mục sản phẩm thành công');
		return Redirect::to('all-news');	
	}
}
