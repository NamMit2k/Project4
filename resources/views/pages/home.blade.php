@extends('layout')  
@section('content')
<style type="text/css">
  .col:hover
  {
    transform: translatey(-10px);
         box-shadow:
                0 0 1px 2px #f0eded,
                0 0 1px 2px #f0eded,
                2px 0 1px 2px #f0eded;
    transition-delay: 0.1s;
  
  }
</style>

<div class="container" >
  <div class="row" >
    <div  class="col-md-12">
      <h2 class="title-product-selling" style="font-family: sans-serif;" >Sản phẩm bán mới</h2>
      <div  id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
          <li style="background-color: #333;width: 8px;height: 8px;" data-target="#myCarousel"
          data-slide-to="0" class="active"></li>
          <li style="background-color: #333; width: 8px;height: 8px;" data-target="#myCarousel"
          data-slide-to="1">
        </li>

      </ol>
      <!-- Wrapper for carousel items -->
      <div class="carousel-inner row" style="margin-top: -60px">
        <div class="carousel-item active ">
          <div class="row">
           @for($i=0;$i<4;$i++)
           <div class="col-sm-3"> 
            <a href="{{ URL::to('/chi-tiet-san-pham/'.$product[$i]->product_id) }}" class="thumb-wrapper">
              <div class="img-box" >
                <img style="width: 200px;height: 200px;"  src="{{URL::to('public/uploads/product/'.$product[$i]->product_image) }}"
                class="img-fluid" alt="lỗi" />
              </div>
              <div class="thumb-content">
                <p class="procduct-name-selling">{{ $product[$i]->product_name }} </p>
                <p class="item-price">
                  <span>{{number_format($product[$i]->product_price).'vnđ'}}</span></p>
                </div>
              </a>  
            </div>
            @endfor
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            @for($i=4;$i<8;$i++)
            <div class="col-sm-3"> 
              <a href="{{ URL::to('/chi-tiet-san-pham/'.$product[$i]->product_id) }}" class="thumb-wrapper">
                <div class="img-box">
                  <img style="width: 200px;height: 200px;" src="{{URL::to('public/uploads/product/'.$product[$i]->product_image) }}"
                  class="img-fluid" alt="lỗi" />
                </div>
                <div class="thumb-content">
                  <p class="procduct-name-selling">{{ $product[$i]->product_name }} </p>
                  <p class="item-price">
                    <span>{{number_format($product[$i]->product_price).'vnđ'}}</span></p>
                  </div>
                </a>  
              </div>
              @endfor
            </div>
          </div>

        </div>
        <!-- Carousel controls -->
        <a style="margin: 0;top: 50%;transform: translateY(-50%); color: #a3a3a3;display: none"
        class="carousel-control-prev" href="#myCarousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
      </a>
      <a tyle="margin: 0;top: 50%;transform: translateY(-50%); color: #a3a3a3;"
      class="carousel-control-next" href="#myCarousel" data-slide="next">
      <i class="fa fa-angle-right"></i>
    </a>
  </div>
</div>
<div class="container row" style="margin-top: 20px;" >
  <div class="banner1 col-sm-6">
    <img style="width: 99.99%" src="{{asset('public/img/banner1.png')}}">
  </div> 
  <div class="banner1 col-sm-6">
    <img style="width: 99.99%" src="{{asset('public/img/banner2.png')}}">
  </div>
</div>

<div class="container">
  <div class="spacing ">
    @foreach($cate as $val)
    <div class="offers row" style="border-top: 1px solid red;">
      <div class="offer__head row col-sm-10">
        <div class="offer-title " style="font-size: 30px;">
         {{ $val->category_name }}
       </div>
     </div>
     <div class="col-sm-2" style="margin-left: 22px;margin-top: 15px;">
       <a style="font-size: 18px;" href="{{ URL::to('danh-muc-san-pham-dad/'.$val->category_id) }}">Xem tất cả</a>
     </div>

   </div>
   <div class="offer__body row" style="">
    <div  class="offer__body-right row " >

     @for($i =0 ; $i<count($val->getProduct($val->category_id)); $i++)


     <div class="col-sm-3" style="width: 95%;margin-left: -8px;margin-top: 10px;">
      <div class="col" style="width: 98%;">
        <a href="{{ URL::to('/chi-tiet-san-pham/'.$val->getProduct($val->category_id)[$i]->product_id) }}">
          <img style="width: 100%;height: 230px;margin-top: 10px;" 
          src="{{ asset('public/uploads/product').'/'.$val->getProduct($val->category_id)[$i]->product_image }}" /> 
        </a>

        <div class="name" style="margin-top: 10px;">

          <h3 style="padding-left: 4px;width: 100%;height:40px" class="title">
           <a class="procduct-name-bdm"
           style="font-size: 16px; font-weight: 300; color: black" href="{{ URL::to('/chi-tiet-san-pham/'.$val->getProduct($val->category_id)[$i]->product_id) }}"> <center>{{ $val->getProduct($val->category_id)[$i]->product_name}}</center></a>
         </h3> 
         <div class="info-price">
          <div style="padding-left: 10px;" class="price">
            <div style="font-size: 15px;color: orangered;"
            class="price-new">{{number_format($val->getProduct($val->category_id)[$i]->product_price).'vnđ'}}</div>

          </div>
        </div>
        <span style="font-size: 17px">

        </span>
      </div>
      <div class="mota" style="display:flex;font-size: 15px;">
        <div class="left">
         <i class="far fa-heart"></i>
         <p>{{ $val->category_name }}</p>
       </div>
       <div class="right" >
        <div class="star" style="margin-left: 80px">
          <i style="color: yellow;" class="fa fa-star" aria-hidden="true"></i>
          <i style="color: yellow;" class="fa fa-star" aria-hidden="true"></i>
          <i style="color: yellow;" class="fa fa-star" aria-hidden="true"></i>
          <i style="color: yellow;" class="fa fa-star" aria-hidden="true"></i>
          <i style="color: yellow;" class="fa fa-star-half-o" aria-hidden="true"></i>
          <p style="margin-left: 30px;">Hàn quốc</p>
        </div>               

      </div>
    </div>
  </div>
</div>  
@endfor
</div>
</div>
@endforeach
</div>
</div>
</div>



@endsection