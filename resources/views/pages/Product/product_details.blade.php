
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="{{asset('public/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/grid.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/sweetalert.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese"
    rel="stylesheet">
    <link href="{{asset('public/css/sp/sp.css')}}" rel="stylesheet" />
    <link href="{{asset('public/css/sp/spresponsive.css')}}" rel="stylesheet" />
    <style>
        p
        {
            margin-top: -10px;
        }
        .img-1 {
            margin-left: 0;
            margin-top: 18px;
            position: relative;
            width: 20%;
            border: 2px solid #ed145b;
        }

        .btn-add {
            outline: none !important;
        }

        .btn-mua {
            outline: none !important;
        }
    </style>

</head>

<body ng-app="Homeapp">
    <header class="header">
        <div class="container-fluid">
            <div class="container">
                <nav class="header__navbar hide-on-mobile-tablet">
                    <ul class="header__navbar-list">
                        <li class="hearder__navbar-item header__navbar-item--has-qr hearder__navbar-item--separate">
                            Vào cửa hàng trên ứng dụng MyOhui
                            <!-- Header-QR-Code -->
                            <div class="header__qr">
                                <img src="{{ asset('public/img/QR-Code.png') }}" alt="QR_Code" class="header__qr-img">
                                <div class="header__qr-apps">
                                    <a href="" class="header__qr-link">
                                        <img src="{{asset('public/img/Google Play.png')}}" alt="Google Play"
                                        class="header__qr-dowload-img">
                                    </a>
                                    <a href="" class="header__qr-link"><img src="{{asset('public/img/App Store.png')}}"
                                        alt="App Store" class="header__qr-dowload-img"></a>
                                    </div>
                                </div>
                            </li>
                            <li class="hearder__navbar-item">
                                <span class="hearder__navbar-title--no-pointer">Kết nối</span>
                                <a href="https://www.facebook.com/MyphamOhuiLGvina/" class="header__navbar-icon-link">
                                    <i class="header__navbar-icon fab fa-facebook"></i>

                                </a>
                                <a href="https://zalo.me/0965866851" class="header__navbar-icon-link">
                                    <button class="header__navbar-icon header__navbar-icon-zalo"></button>
                                </a>
                            </li>
                        </ul>


                        <ul ng-controller="LoginController" class="header__navbar-list">
                            <li class="hearder__navbar-item hearder__navbar-item--has-notify">
                                <a href="{{URL::to('/news')}}" class="header__navbar-item-link">
                                    <i class="header__navbar-icon far fa-bell"></i> Tin tức
                                </a>

                            </li>
                            <?php
                            $id = Session::get('customer_id');
                            if($id){
                                ?>
                                <li class="hearder__navbar-item">
                                    <a href="{{URL::to('/order-cus')}}" class="header__navbar-item-link">
                                        <i class="far fa-file-alt"></i>&nbsp; Đơn hàng
                                    </a>
                                </li>
                                <?php
                            }

                            ?>
                            <div id="hearder__navbar-account">
                               <?php
                               $customer_id = Session::get('customer_id');
                               if($customer_id!=NULL){ 
                                   ?>
                                   <a style="text-decoration: none;" href="{{ URL::to('/logout-checkout') }}" >
                                    <li class="hearder__navbar-item hearder__navbar-item--strong">Đăng xuất</li>
                                </a>
                                <?php
                            }else{
                               ?>
                               <a style="text-decoration: none;" href="{{ URL::to('/login-checkout') }}" >
                                <li class="hearder__navbar-item hearder__navbar-item--strong">Đăng nhập</li>
                                </a>    <?php 
                            }
                            ?>

                        </a>
                    </div>

                </ul>
            </nav>
        </div>
        <!-- header-with-search -->

        <div class="container">
            <div class="header-with-search  ">
                <!-- nav__mobile-cotegory -->
                <div class="nav__mobile-cotegory ">
                    <label for="nav__mobile-cotegory-check" class="nav__mobile-cotegory-icon"
                    style="display: block;">
                    <svg class="nav__mobile-bar-icon" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" color="#fff">
                    <path fill="currentColor"
                    d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z ">
                </path>
            </svg>
        </label>
        <input type="checkbox" id="nav__mobile-cotegory-check" style="display: none;">
        <label for="nav__mobile-cotegory-check" class="nav__overlay-category"></label>
        <div class="nav__mobile">
            <ul class="nav__list">
                <li class="nav__item">
                    <a style="color: orangered;" href="./index.html" class="nav__link">Tất Cả Sản
                    Phẩm</a>
                </li>
                <input type="checkbox" hidden id="nav__category-input">
                <li class="nav__item nav__item-first">
                    <label for="nav__category-input">
                        <svg class="nav__icon " aria-hidden="true " focusable="false "
                        data-prefix="fas " data-icon="chevron-right "
                        class="svg-inline--fa fa-chevron-right fa-w-10 " role="img " xmlns="http://www.w3.org/2000/svg
                        " viewBox="0 0 320 512 ">
                        <path fill="currentColor " d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373
                        24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z "></path>
                    </svg>
                </label>
                <a href=" " class="nav__link nav__link-first ">Ohui</a>
            </li>
            <li class="nav__item nav__item-1 ">
                <a href="./OhuiTheFirstTaiSinh.html" class="category-item__link ">Ohui Thefirst Tái
                Sinh </a>
            </li>
            <li class="nav__item nav__item-1 ">
                <a href="./OhuiDưỡngTrắng.html" class="category-item__link ">Ohui Dưỡng Trắng</a>
            </li>
            <li class="nav__item nav__item-1 ">
                <a href="./OhuiPrimeAdvancer.html" class="category-item__link ">Ohui Prime
                Advancer</a>
            </li>
            <li class="nav__item nav__item-1 ">
                <a href="./OhuiDưỡngẨm.html" class="category-item__link ">Ohui Dưỡng Ẩm</a>
            </li>
            <li class="nav__item nav__item-1 ">
                <a href="./OhuiChốngLãoHóa.html" class="category-item__link ">Ohui Chống Lão Hóa</a>
            </li>
            <li class="nav__item nav__item-1 ">
                <a href="./OhuiMakeUp.html" class="category-item__link ">Ohui Make Up</a>
            </li>
            <li class="nav__item nav__item-1 ">
                <a href="./OhuiChốngNắng.html" class="category-item__link ">Ohui Chống Nắng</a>
            </li>
            <li class="nav__item ">
                <a href=" " class="nav__link ">Thực phẩm chức năng</a>
            </li>
            <li class="nav__item ">
                <a href=" " class="nav__link ">Dịch vụ</a>
            </li>
            <li class="nav__item ">
                <a href=" " class="nav__link ">Tin tức</a>
            </li>
            <li class="nav__item ">
                <a href=" " class="nav__link ">Liên hệ</a>
            </li>
        </ul>
    </div>
</div>
<label for="mobile-search-checkbox " class="header__mobile-search ">
    <i class="header__mobile-search-icon fas fa-search "></i>
</label>
<div class="header__logo ">
    <a href="http://localhost:8080/Project4" class="header__logo-link header__logo-link "
    style="-webkit-tap-highlight-color: transparent; ">
    <img class="header__logo-img"
    src="https://img.abaha.vn/photos/resized/320x/83-1574737287-myphamohui-lgvina.png"
    alt="Logo_img">
</a>
</div>
<input type="checkbox" hidden id="mobile-search-checkbox " class="header__search-checkbox ">
<div ng-controller="SearchController" class="header__search">
    <div class="header__search-input-wrap">
        <input id="name" type="text" class="header__search-input"
        placeholder="Tìm kiếm sản phẩm... " ng-model="name">

    </div>
    <div class="header__search-select ">
        <span class="header__search-select-label ">Trong shop</span>
        <i class="header__search-select-icon fas fa-angle-down "></i>
        <ul class="header__search-option ">
            <li class="header__search-option-item header__search-option-item--active ">
                <span>Trong Shop</span>
                <i class="fas fa-check "></i>
            </li>
        </ul>
    </div>
    <a href="" class="header__search-btn " id="search-btn">
        <i style="font-size: 1.8rem;
        color: #fff;" class="fas fa-search"></i>
    </a>
</div>
<!-- Cart layout -->
<div ng-controller="StoreController" class="header__cart ">
    <div class="header__cart-wrap ">
        <a href="./Giohang.html"><i class="header__cart-icon fas fa-cart-plus "></i></a>
        <input style="width:26px;display: flex;justify-content: center;" class="header__cart-notice"
        id="header__cart-notice" value="0"></input>
        <!-- No cart: header__cart-list--no-cart -->
        <div id="header__cart-list" class="header__cart-list ">
            <div id="no_cart">

                <img style="display: initial" src="{{ asset('public/img/no-cart.png') }}" alt="No-cart "
                class="header__cart-no-cart-img ">
                <span style="display: block" class="header__cart-list-no-cart-msg ">
                    Chưa có sản phẩm
                </span>
            </div>
            <div id="carts">
                <h4 class="header__cart-heading ">Sản phẩm đã thêm</h4>
                <ul class="header__cart-list-item ">

                    <li ng-repeat="i in cart1" class="header__cart-list-item header__cart-item">
                        <div class="header__cart-item-info ">
                            <div class="header__cart-item-head ">

                                <img src="https://img.abaha.vn/photos/resized/320x/83-1596776828-myphamohui-lgvina.png"
                                alt="myphamohui " class="header__cart-img ">
                                <span class="header__cart-item-name ">
                                    Bộ cấp Nước Se Khít Lỗ Chân Lông Sum37 Water-full Set 5p
                                </span>
                                <div class="header__cart-item-price-wrap ">
                                    <span class="header__cart-item-price ">450.000đ</span>
                                    <span class="header__cart-item-multiply ">x</span>
                                    <span class="cart-quantity cart-column ">
                                        <input disabled class="cart-quantity-input " type="number "
                                        value="1">
                                    </span>
                                </div>
                            </div>
                            <div class="header__cart-item-body ">
                                <span class="header__cart-item-description ">Mỹ phẩm: Su:m37</span>

                            </div>
                        </div>
                    </li>
                </ul>

                <div class="cart-check">
                    <div class="cart-check-info">
                        <div class="cart-check-title">Tổng tiền:</div>
                        <div class="cart-check-value">450.00đ</div>
                    </div>
                    <div>
                        <a href="/Product/ChitietGioHang"
                        class="header__cart-view-cart btn btn--primary ">Xem giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="header__user ">
    <label for="nav-mobile-input" class="header__user-link ">
        <img src="https://1.bp.blogspot.com/-m3UYn4_PEms/Xnch6mOTHJI/AAAAAAAAZkE/GuepXW9p7MA6l81zSCnmNaFFhfQASQhowCLcBGAsYHQ/s1600/Cach-Lam-Avatar-Dang-Hot%2B%25281%2529.jpg "
        alt=" " class="header__user-img ">
    </label>
    <input type="checkbox" hidden id="nav-mobile-input">
    <label for="nav-mobile-input" class="nav__overlay "></label>
    <nav class="nav__mobile-user ">
        <div class="nav__mobile-user-img ">
            <img src="https://1.bp.blogspot.com/-m3UYn4_PEms/Xnch6mOTHJI/AAAAAAAAZkE/GuepXW9p7MA6l81zSCnmNaFFhfQASQhowCLcBGAsYHQ/s1600/Cach-Lam-Avatar-Dang-Hot%2B%25281%2529.jpg "
            alt=" " class="header__user-img1 ">
        </div>
        <div class="nav__mobile-user-list ">
            <div class="nav__mobile-user-item ">
                <a href="/Account/Registar" class="nav__mobile-user-link ">Đăng ký</a>
            </div>
            <div class="nav__mobile-user-item nav__mobile-user-item--active ">
                <a href="/Account/Login" class="nav__mobile-user-link ">Đăng nhập</a>
            </div>
        </div>
        <div class="nav__mobile-user-list-news ">
            <div class="nav__mobile-news-item ">
                <a href=" " class="nav__mobile-news-link ">Tin tức</a>
            </div>
            <div class="nav__mobile-news-item ">
                <a href="" class="nav__mobile-news-link ">Giỏ hàng</a>
            </div>
        </div>
    </nav>
</div>
</div>
</div>
</div>

</header>
<div>
    @foreach($details_product as $key =>$detail_pro)
    <div class="main" style="background-color: #f5f5f5; overflow: hidden;">
        <!-- Product -->
        <div class="grid wide main__product" style="display: flex;background-color: #fff;">
            <div class="main__product-ft">

                <div class="main__product-img">

                    <img class="main__product-img"
                    src="{{URL::to('/public/uploads/product/'.$detail_pro->product_image)}}" />
                </div>
                <div class="main__product-img-sp" class="_3ZDC1p">
                    <div>
                        <img class="img-1"
                        src="{{URL::to('/public/uploads/product/'.$detail_pro->product_image)}}" />
                    </div>
                </div>
                <div style="display: flex;">
                    <div style="margin-top: 6px;" class="home__product-share">
                        <label style="font-size: 1.6rem;" for="">Chia sẻ:</label>
                        <i style="font-size: 1.6rem;color:
                        #3b5999; cursor: pointer;" class="header__navbar-icon fab fa-facebook"></i>
                    </div>
                    <span style="cursor: pointer; font-size: 1.6rem; flex: 1; margin-left: 50px; top: 4px; position: relative;" class="home-product-item__like home-product-item__like--liked">
                        <input type="checkbox" hidden name="" id="home-product-item__like--liked">
                        <i class="home-product-item__like-icon-empty-1 far fa-heart "></i>
                        <i class="home-product-item__like-icon-fill-1 fas fa-heart "></i>
                        <label style="color: #333;margin-left: 6px;font-size: 1.6rem;cursor: pointer;"
                        for="home-product-item__like--liked">Yêu thích</label>
                    </span>
                </div>
            </div>
            <div style="margin-left: 18px;" class="main__product-info">
                <div class="main__product-info-header">
                    <div class="home-product-item__favourite-1 ">
                        <i class="fas fa-check home-product-item__favourite-like"></i>
                        <span >Yêu thích</span>
                    </div>
                    <p style="position: relative;margin-left: 10px;margin-top: 3px;font-size: 25px;" class="main__product-name">
                        {{ $detail_pro->product_name }}
                    </p>
                </div>
                <h1 class="home-product-item__point">4</h1>
                <div style="margin-bottom: 26px;" class="home-product-item__rating-1 ">
                    <i class="home-product-item__star-gold fas fa-star "></i>
                    <i class="home-product-item__star-gold fas fa-star "></i>
                    <i class="home-product-item__star-gold fas fa-star "></i>
                    <i class="home-product-item__star-gold fas fa-star "></i>
                    <i class="fas fa-star "></i>
                </div>
                <div class="home-product-item__price1">

                 <span style="color: #ee4d2d;font-size: 20px;margin-top: -25px;"
                 class="home-product-item__price-current">{{ number_format($detail_pro->product_price).'vnd' }}</span>
                 <!--   {{--    <div style="height: 17px;
                   width: 80px;
                   position: relative;
                   top: -8px;
                   margin-left: 12px;" class="home-product-item__favourite-1">
                   <span>10% Giảm</span>
               </div> --}} -->
           </div>
           <div class="content row" style="display: flex" >
            <div class="col-sm-3"> <p style="font-size: 20px;">Thông tin:</p></div>
            <div class="col-sm-9"> {!! $detail_pro->product_desc !!}   </div>

        </div>
        <form style="margin-top: 50px;margin-left: 60px" action="{{ URL::to('/save-cart') }}" method="post">
            {{ @csrf_field() }}

            <label style="font-size: 19px;">Số lượng <input  class="form-control" style="width: 100px;font-size: 18px;width: 200px;" type="number" name="qty" max="{{ $detail_pro->product_quantity }}" min="1" value="1"></label>
            <input class="form-control" type="hidden" name="productid_hidden" min="1" value="{{ $detail_pro->product_id }}">
            <button  class="btn btn-outline-secondary" type="submit" style="font-size: 18px;font-family: sans-serif;
            color: white ;background-color: red;margin-left: 10px;margin-top: -5px;height: 40px;" >Thêm vào giỏ hàng
        </button> 

    </form> 



 <!-- <form>
        @csrf
        <input type="hidden" value="{{$detail_pro->product_id}}" class="cart_product_id_{{$detail_pro->product_id}}">
        <input type="hidden" value="{{$detail_pro->product_name}}" class="cart_product_name_{{$detail_pro->product_id}}">
        <input type="hidden" value="{{$detail_pro->product_image}}" class="cart_product_image_{{$detail_pro->product_id}}">
        <input type="hidden" value="{{$detail_pro->product_price}}" class="cart_product_price_{{$detail_pro->product_id}}">
        <input type="hidden" value="1" class="cart_product_qty_{{$detail_pro->product_id}}">


        <button type="button" class="btn btn-danger add-to-cart" data-id_product="{{$detail_pro->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
    </form>  -->

</div>
</div>
<div class="grid wide info-content">
    <div class="infor-content-header">
        <div class="row infor-content-header-title">
            <p class="infor-content-header-title-text">Chi tiết sản phẩm</p>
        </div>
        <div class="infor-content-header-infor">
            <div class="infor-content-header-infor-item">
                <div class="infor-content-header-infor-item-left">Danh Mục</div>
                <div class="infor-content-header-infor-item-right">Ohui Thefirst Tái Sinh </div>
            </div>
            <div class="infor-content-header-infor-item">
                <div class="infor-content-header-infor-item-left">Xuất xứ</div>
                <div class="infor-content-header-infor-item-right">Hàn Quốc</div>
            </div>
            <div class="infor-content-header-infor-item">
                <div class="infor-content-header-infor-item-left">Thương hiêu</div>
                <div class="infor-content-header-infor-item-right">Ohui</div>
            </div>
        </div>

        <div class="row infor-content-header-title">
            <p class="infor-content-header-title-text">MÔ TẢ SẢN PHẨM</p>
        </div>
        <div class="info__product-header">
            <div class="info__product-header-info">
                <div class="info__product-header-info-item" style="display: flex">
                    <div class="info__product-header-info-img" >
                        <img  class="img-infor" style="margin-top: -100px;margin-left: -50px;width: 300px;height: 300px;" src="{{URL::to('/public/uploads/product/'.$detail_pro->product_image)}}" alt="lỗi">
                    </div>
                    <div class="ct" style="margin-top: -100px;">
                        <h4 class="infor-product-describe">
                            {!!$detail_pro->product_content!!}

                        </h4>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
</div>
@endforeach
</div>






<footer class="footer " style="margin-top:20px">
    <div class="grid wide footer__contain ">
        <div class="row ">
            <div class="col l-2-4 m-4 c-6 ">
                <h3 class="footer__heading ">Chắm sóc khách hàng</h3>
                <ul class="footer-list ">
                    <li class="footer-item ">
                        <a href=" " class="footer-item__link "><span>Trung tâm trợ giúp</span></a>
                    </li>
                    <li class="footer-item ">
                        <a href=" " class="footer-item__link "><span>Hướng dẫn mua hàng</span></a>
                    </li>
                    <li class="footer-item ">
                        <a href=" " class="footer-item__link "><span>Chính sách vận chuyển</span></a>
                    </li>
                </ul>
            </div>
            <div class="col l-2-4 m-4 c-6 ">
                <h3 class="footer__heading ">Về chúng tôi</h3>
                <ul class="footer-list ">
                    <li class="footer-item ">
                        <a href=" " class="footer-item__link "><span>Giới thiệu về Shop</span></a>
                    </li>
                    <li class="footer-item ">
                        <a href=" " class="footer-item__link "><span>Điều khoản về Shop</span></a>
                    </li>
                    <li class="footer-item ">
                        <a href=" " class="footer-item__link "><span>Chính sách bảo mật</span></a>
                    </li>
                </ul>
            </div>
            <div class="col l-2-4 m-4 c-6 footer__contain ">
                <h3 class="footer__heading ">Thanh toán</h3>
                <ul class="footer__contain-pay ">
                    <li class="footer__contain-pay-img ">
                        <div class="footer-vn-background footer-vn-visa-png " style="width: 55px; height: 29px; ">
                        </div>
                    </li>
                    <li class="footer__contain-pay-img ">
                        <div class="footer-vn-background footer-vn-mastercard-png "
                        style="width: 55px; height: 29px; "></div>
                    </li>
                    <li class="footer__contain-pay-img ">
                        <div class="footer-vn-background footer-vn-jcb-png " style="width: 55px; height: 23px; ">
                        </div>
                    </li>
                    <li class="footer__contain-pay-img ">
                        <div class="footer-vn-background footer-vn-amex-png "
                        style="width: 55px; height: 24px; margin-left: 0 14px; "></div>
                    </li>
                    <li class="footer__contain-pay-img ">
                        <div class="footer-vn-background footer-vn-vn_cod_footer-png "
                        style="width: 50px; height: 29px; "></div>
                    </li>
                    <li class="footer__contain-pay-img ">
                        <div class="footer-vn-background footer-vn-vn_installment_footer-png "
                        style="width: 55px; height: 29px; "></div>
                    </li>
                    <li class="footer__contain-pay-img ">
                        <div class="footer-vn-background footer-vn-air-pay-png "
                        style="width: 23px; height: 29px; margin-left: 16px; "></div>
                    </li>
                </ul>
            </div>
            <div class="col l-2-4 m-4 c-6 ">
                <h3 class="footer__heading ">Theo dõi chúng tôi trên</h3>
                <ul class="footer-list ">
                    <li class="footer-item ">
                        <a href="https://www.facebook.com/MyphamOhuiLGvina/ " class="footer-item__link ">
                            <i class="footer-item__icon fab fa-facebook "></i>
                            <span>Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a href=" " class="footer-item__link ">
                            <i class="footer-item__icon fab fa-instagram "></i>
                            <span>Instagram</span>
                        </a>
                    </li>
                    <li class="footer-item ">
                        <a href=" " class="footer-item__link ">
                            <i class="footer-item__icon fab fa-linkedin "></i>
                            <span>LinkedIn</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</footer> 

{{--     <script src="{{asset('public/script/jquery.js')}}"></script> --}}
{{--  <script src="{{asset('public/script/bootstrap.min.js')}}"></script>
<script src="{{asset('public/script/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/script/price-range.js')}}"></script>
<script src="{{asset('public/script/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/script/main.js')}}"></script>  --}}


<script src="{{ asset('public/script/sweetalert.min.js') }}"></script>


<script>
    $(document).ready(function () {
        var a = JSON.parse(localStorage.getItem('sp'));
        if (a.length < 1 || a == undefined) {
            $('#no_cart').css('display', 'block')
            $('#carts').css('display', 'none')
        }
        else {
            $('#no_cart').css('display', 'none')
            $('#carts').css('display', 'block')
        }
    })

    function check() {
        var a = document.getElementById('pass').value;
        var b = document.getElementById('repass').value;
        if (a != b || a == '' || b == '') {
            alert('false')
            document.getElementById('pass').value;
            document.getElementById('repass').value;
            return false;
        }
        else {
            return true;
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/add-cart-ajax')}}',
                method: 'POST',
                data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                success:function(data){                    
                    swal({
                        title: "Đã thêm sản phẩm vào giỏ hàng",
                        text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                    },
                    function() {
                        window.location.href = "{{url('/giohang-ajax')}}";
                    });


                }

            });
        });
    });
</script>

</body>

</html>