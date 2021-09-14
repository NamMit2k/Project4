<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//user
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/desc','App\Http\Controllers\AdminController@desc');

Route::get('/all','App\Http\Controllers\HomeController@allproduct');

//get loại
Route::get('/getloai','App\Http\Controllers\CategoryProduct@getdata');

Route::get('/trangchu','App\Http\Controllers\HomeController@index');
//tìm kiếm
Route::post('/tim-kiem','App\Http\Controllers\HomeController@search');
//chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{category_id}','App\Http\Controllers\ProductsController@details_product');



//cart
Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');
Route::post('/update-cart-quantity','App\Http\Controllers\CartController@update_cart_quantity');
Route::get('/show-card','App\Http\Controllers\CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','App\Http\Controllers\CartController@delete_to_cart');


//add cart using ajax
Route::post('/add-cart-ajax','App\Http\Controllers\CartController@add_cart_ajax');
Route::get('/giohang-ajax','App\Http\Controllers\CartController@gio_hang');
Route::post('/update-cart-ajax','App\Http\Controllers\CartController@update_cart_ajax');
Route::get('/delete-cart/{session_id}','App\Http\Controllers\CartController@delete_cart');
Route::get('/delete-all-cart','App\Http\Controllers\CartController@delete_all_cart');


//Checkout login
Route::get('/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/logout-checkout','App\Http\Controllers\CheckoutController@logout_checkout');
Route::post('/login-customer','App\Http\Controllers\CheckoutController@login_customer');
Route::get('/signin','App\Http\Controllers\CheckoutController@Signin');
Route::post('/add-customer','App\Http\Controllers\CheckoutController@add_customer');
Route::post('/save-checkout-customer','App\Http\Controllers\CheckoutController@save_checkout_customer');
Route::post('/order-place','App\Http\Controllers\CheckoutController@order_place');
Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');
Route::get('/payment','App\Http\Controllers\CheckoutController@payment');



//order
Route::get('/manager-order','App\Http\Controllers\OrderController@manager_order');
Route::get('/view-order/{orderid}','App\Http\Controllers\OrderController@view_order');
Route::get('/print-order/{checkout_code}','App\Http\Controllers\OrderController@print_order');
//đơn hàng
Route::get('/order-cus','App\Http\Controllers\HomeController@order_cus');
Route::get('/chi-tiet-don/{id}','App\Http\Controllers\HomeController@chi_tiet_don');
Route::get('/active-order/{id}','App\Http\Controllers\HomeController@active_order');

Route::get('/cancel-order/{id}','App\Http\Controllers\HomeController@cancel_order');
Route::get('/reset-order/{id}','App\Http\Controllers\HomeController@reset_order');

//Bill import
Route::get('/manager-importbill','App\Http\Controllers\ImportbillController@manager_importbill');
Route::get('/bill','App\Http\Controllers\ImportbillController@import_bill');
Route::post('/save-bill','App\Http\Controllers\ImportbillController@save_bill');
Route::post('/update-bill-quantity','App\Http\Controllers\ImportbillController@update_bill_quantity');
Route::get('/delete-bill/{rowId}','App\Http\Controllers\ImportbillController@delete_bill');
Route::post('/add-bill','App\Http\Controllers\ImportbillController@add_bill');
Route::get('/search-bill','App\Http\Controllers\ImportbillController@import_bill');

//search-order
Route::get('/loc-don','App\Http\Controllers\AdminController@locdon');
Route::post('/search-order','App\Http\Controllers\AdminController@search_order');
Route::post('/export-order','App\Http\Controllers\AdminController@export_order');





//admin
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@showdashboard');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');


//logout
Route::get('/logout','App\Http\Controllers\AdminController@logout');



//Danh mục sản phẩm
Route::get('/danh-muc-san-pham/{category_parent}','App\Http\Controllers\CategoryProduct@show_category_home');
//Danh mục sản phẩm cha
Route::get('/danh-muc-san-pham-dad/{category_parentt}','App\Http\Controllers\CategoryProduct@show_category_daddy');
//Category Product
Route::get('/add-category-product','App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/all-category-product','App\Http\Controllers\CategoryProduct@all_category_product');
//Post add
Route::post('/save-category-product','App\Http\Controllers\CategoryProduct@save_category_product');
//lấy dữu liệu ra textbox để edit
Route::get('/edit-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@delete_category_product');
//Thực thi update
Route::post('/update-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@update_category_product');
//active category
Route::get('/unactive-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','App\Http\Controllers\CategoryProduct@active_category_product');

Route::post('/import-csv','App\Http\Controllers\CategoryProduct@import_csv');
Route::post('/export-csv','App\Http\Controllers\CategoryProduct@export_csv');


//Brand Product
Route::get('/add-brand-product','App\Http\Controllers\BrandProduct@add_brand_product');
Route::get('/all-brand-product','App\Http\Controllers\BrandProduct@all_brand_product');
//Post add
Route::post('/save-brand-product','App\Http\Controllers\BrandProduct@save_brand_product');
//Thực thi update
Route::post('/update-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@update_brand_product');
//lấy dữu liệu ra textbox để edit
Route::get('/edit-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@delete_brand_product');
//active Brand
Route::get('/unactive-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','App\Http\Controllers\BrandProduct@active_brand_product');



//Product
Route::get('/add-product','App\Http\Controllers\ProductsController@add_product');
Route::get('/all-product','App\Http\Controllers\ProductsController@all_product');
//Post add
Route::post('/save-product','App\Http\Controllers\ProductsController@save_product');
//Thực thi update
Route::post('/update-product/{product_id}','App\Http\Controllers\ProductsController@update_product');
//lấy dữu liệu ra textbox để edit
Route::get('/edit-product/{product_id}','App\Http\Controllers\ProductsController@edit_product');
Route::get('/delete-product/{product_id}','App\Http\Controllers\ProductsController@delete_product');

//active Brand
Route::get('/unactive-product/{product_id}','App\Http\Controllers\ProductsController@unactive_product');
Route::get('/active-product/{product_id}','App\Http\Controllers\ProductsController@active_product');

//News
Route::get('/news','App\Http\Controllers\NewsController@index');
Route::get('/details-news/{id}','App\Http\Controllers\NewsController@details_news');

Route::get('/add-news','App\Http\Controllers\NewsController@add_news');

Route::get('/all-news','App\Http\Controllers\NewsController@all_news');
//Post news
Route::post('/save-news','App\Http\Controllers\NewsController@save_news');

//Thực thi update
Route::post('/update-news/{id}','App\Http\Controllers\NewsController@update_news');
//lấy dữu liệu ra textbox để edit
Route::get('/edit-news/{id}','App\Http\Controllers\NewsController@edit_news');
Route::get('/delete-news/{id}','App\Http\Controllers\NewsController@delete_news');






