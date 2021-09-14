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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="{{asset('public/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/grid.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/responsive.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese"
    rel="stylesheet">
    <style>
        .product-grid:hover .product-image:before {
            opacity: 0;
        }
        
        .product-image .product-trend-label,
        .product-image .product-discount-label {
            content: "";
            color: #fff;
            background-color: #ff9600;
            border-radius: 50%;
            font-size: 12px;
            line-height: 28px;
            font-weight: 700;
            text-align: center;
            text-transform: uppercase;
            padding: 0 7px;
            position: absolute;
            top: 12px;
            left: 12px;
            z-index: 3;
            width: 40px;
            height: 40px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .product-trend-cart {
            padding: 0 7px;
            position: absolute;
            top: -14px;
            right: -21px;
            z-index: 3;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer
        }
        
        .info-price {
            position: relative;
            top: 24px;
            margin: 30px 0px;
        }
        
        .product-grid .product-image img {
            width: 100%;
            height: 280px;
        }
        
        .img-cart {
            width: 34px !important;
            height: 34px !important;
        }
        
        .pagination {
            display: flex !important;
            text-align: center;
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }
        
        .pagination > li {
            display: inline;
        }
        
        .pagination > li > a,
        .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: 12px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        
        .pagination > li:first-child > a,
        .pagination > li:first-child > span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        
        .pagination > li:last-child > a,
        .pagination > li:last-child > span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        
        .pagination > li > a:hover,
        .pagination > li > span:hover,
        .pagination > li > a:focus,
        .pagination > li > span:focus {
            z-index: 2;
            color: #23527c;
            background-color: #eee;
            border-color: #ddd;
        }
        
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
            z-index: 3;
            color: #fff;
            cursor: default;
            background-color: orangered;
            border-color: #fff;
        }
        
        .pagination > .disabled > span,
        .pagination > .disabled > span:hover,
        .pagination > .disabled > span:focus,
        .pagination > .disabled > a,
        .pagination > .disabled > a:hover,
        .pagination > .disabled > a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }
        
        .pagination-lg > li > a,
        .pagination-lg > li > span {
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.3333333;
        }
        
        .pagination-lg > li:first-child > a,
        .pagination-lg > li:first-child > span {
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
        }
        
        .pagination-lg > li:last-child > a,
        .pagination-lg > li:last-child > span {
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
        }
        
        .pagination-sm > li > a,
        .pagination-sm > li > span {
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
        }
        
        .pagination-sm > li:first-child > a,
        .pagination-sm > li:first-child > span {
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }
        
        .pagination-sm > li:last-child > a,
        .pagination-sm > li:last-child > span {
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
        }
        
        .pager {
            padding-left: 0;
            margin: 20px 0;
            text-align: center;
            list-style: none;
        }
        
        .pager li {
            display: inline;
        }
        
        .pager li > a,
        .pager li > span {
            display: inline-block;
            padding: 5px 14px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 15px;
        }
        
        .pager li > a:hover,
        .pager li > a:focus {
            text-decoration: none;
            background-color: #eee;
        }
        
        .pager .next > a,
        .pager .next > span {
            float: right;
        }
        
        .pager .previous > a,
        .pager .previous > span {
            float: left;
        }
        
        .pager .disabled > a,
        .pager .disabled > a:hover,
        .pager .disabled > a:focus,
        .pager .disabled > span {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
        }
        
        .arrow-up {
            position: absolute;
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 5px solid orangered;
            display: inline-block;
            margin-left: 78px;
            margin-top: -2px;
        }
        
        /*This class displays the DOWN arrow*/
        .arrow-down {
            position: absolute;
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid orangered;
            display: inline-block;
            margin-left: 80px;
            margin-top: -2px;
        }
        
        .home-filter > .home-filter__btn.btn {
            min-width: 106px;
        }
        
        .mobile-sort {
            text-align: center;
            margin: auto;
            border-right: 1px solid #e5e5e5;
        }
        
        .wrapper .sidebar {
            height: 100%;
        }
        
        .sidebar {
            margin-right: 85%;
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
                                <img src="./assets/img/QR-Code.png" alt="QR_Code" class="header__qr-img">
                                <div class="header__qr-apps">
                                    <a href="" class="header__qr-link">
                                        <img src="./assets/img/Google Play.png" alt="Google Play"
                                        class="header__qr-dowload-img">
                                    </a>
                                    <a href="" class="header__qr-link"><img src="./assets/img/App Store.png"
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
                                <a href="" class="header__navbar-item-link">
                                    <i class="header__navbar-icon far fa-bell"></i> Thông báo
                                </a>
                                <div class="header__notify">
                                    <header class="header__notify-header">
                                        <h3>Thông báo mới nhận</h3>
                                    </header>
                                    <ul class="header__notify-list">
                                        <li class="header__notify-item header__notify-item--viewed">
                                            <a href="" class="header__notify-link">
                                                <img src="https://img.abaha.vn/photos/resized/200x120/83-1589289429-myphamohui-lgvina.png"
                                                alt="Mỹ phẩm Ohui" class="header__notify-img">
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">CHƯƠNG TRÌNH KHUYẾN MÃI CHÀO THÁNG
                                                    5</span>
                                                    <span class="header__notify-descriotion">Khuyến mãi chào hè</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <footer class="header__notify-footer">
                                        <a href="" class="header__notify-footer-btn">Xem tất cả</a>
                                    </footer>
                                </div>
                            </li>
                            <li class="hearder__navbar-item">
                                <a href="" class="header__navbar-item-link">
                                    <i class="header__navbar-icon far fa-question-circle"></i> Trợ giúp
                                </a>
                            </li>
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
                    <li id="hearder__navbar-user" class="hearder__navbar-item hearder__navbar-user">
                            <!-- <img id="ViewAvatar" src="" alt="user-img" class="header__navbar-user-img">
                            <img id="ViewAvatar_none" src="https://1.bp.blogspot.com/-m3UYn4_PEms/Xnch6mOTHJI/AAAAAAAAZkE/GuepXW9p7MA6l81zSCnmNaFFhfQASQhowCLcBGAsYHQ/s1600/Cach-Lam-Avatar-Dang-Hot%2B%25281%2529.jpg" alt="user-img" class="header__navbar-user-img">
                            <span class="header__navbar-user-name"></span> -->
                            <ul class="hearder__navbar-user-menu">
                                <li class="hearder__navbar-user-item">
                                    <a href="/Account/HoSo">Tài khoản của tôi </a>
                                </li>
                                <li class="hearder__navbar-user-item">
                                    <a href="/Account/DonMua">Đơn mua </a>
                                </li>
                                <li class="hearder__navbar-user-item hearder__navbar-user-item--separate">
                                    <a onclick="Logout()" href="">Đăng xuất </a>
                                </li>
                            </ul>
                        </li>
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
        <a href="{{ URL::to('/') }}" class="header__logo-link header__logo-link "
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
        <!-- Search history -->
                            <!-- <div class="header__search-history ">
                                <h3 class="header__search-history-heading ">Gợi ý tìm kiếm:</h3>
                                <ul class="header__search-history-list ">
                                    <li class="header__search-history-item ">
                                        <a href=" "><i>Kem dưỡng da</i> </a>
                                    </li>
                                    <li class="header__search-history-item ">
                                        <a href=" "><i>Kem trị mụn</i> </a>
                                    </li>
                                </ul>
                            </div> -->
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
                        <div class="cart">
                          <!--   sd thư viện -->
                          <!--        <a style="font-size: 30px;color: white" href="{{ URL::to('/show-card')}}">   <i class="fa fa-cart-plus" aria-hidden="true"></i></a> -->
                          <!-- sd ajax -->
                          {{--        <a style="font-size: 30px;color: white" href="{{ URL::to('giohang-ajax') }}">   <i class="fa fa-cart-plus" aria-hidden="true"></i></a>    --}}
                          <a style="font-size: 30px;color: white" href="{{ URL::to('show-card') }}">   <i class="fa fa-cart-plus" aria-hidden="true"></i></a>
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
                            <a href="/Account/Login" class="nav__mobile-user-link ">Đăng nhậxp</a>
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
    <div>
        <ul class="header__sort-bar ">
            <li class="mobile-sort header__sort-item ">
                <div class=" home-filter__btn btn" type="button" >Phổ biến<div></div></div>
            </li>
            <li class="mobile-sort header__sort-item ">
                <div class="home-filter__btn btn " type="button" >Mới nhất<div></div></div>

            </li>
            <li class="mobile-sort header__sort-item ">
                <div class="home-filter__btn btn " type="button" >Bán chạy<div></div></div>

            </li>


            <li class="mobile-sort header__sort-item ">
                <div class="home-filter__btn btn " type="button" >Giá<div></div></div>

            </li>
        </ul>
        <div class="app__container ">
            <div class="grid wide ">
                <div class="wrapper row  " style="flex-direction:row-reverse;">
                 <div class="sidebar " style="width: 300px;">
                    <h4 ><b style="font-family: sans-serif;font-size: 15px">Danh mục sản phẩm</b></h4>
                    <ul>
                     <li class="category-item"><a  style="font-family: sans-serif;font-size: 13px;margin-left: 35px;cursor: pointer;" href="{{ URL::to('/all') }}">Tất Cả Sản Phẩm </a></li>
                     @foreach($category as $key => $cate)
                     @if($cate->category_parent==0)
                     <li class="category">
                        <a style="font-family: sans-serif;font-size: 13px;margin-left: 35px;" href="{{ URL::to('danh-muc-san-pham-dad/'.$cate->category_id) }}">{{ $cate->category_name }}</a>
                        <ul class="categories">
                         @foreach($category as $key =>$cate_sub)
                         @if($cate_sub->category_parent==$cate->category_id)
                         <li class="category-item"><a href="{{ URL::to('danh-muc-san-pham/'.$cate_sub->category_id) }}">{{ $cate_sub->category_name }} </a></li>

                         @endif     
                         @endforeach                   

                     </ul>
                 </li>

                 @endif
                 @endforeach
             </ul>
         </div>

         <div class="col l-10 m-12 c-12 ">
            <div class="home-filter hide-on-mobile-tablet ">
                <span class="home-filter__label ">
                    Sắp xếp theo
                </span>

                <div class="home-filter__btn btn " type="button" >Phổ biến<div></div></div>
                <div class="home-filter__btn btn " type="button" >Mới nhất<div></div></div>
                <div class="home-filter__btn btn " type="button" >Bán chạy<div></div></div>
                <div class="home-filter__btn btn " type="button" >Giá<div></div></div>


            </div>

            <div class="home-product" id="home-product">
                <div class="row sm-gutter" id="product">
                    @foreach($category_by_id as $key =>$val)
                    <!-- product item -->
                    <div  class="product-item col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ URL::to('/chi-tiet-san-pham/'.$val->product_id) }}">
                            <div class="product-grid" style="height: 100%;">
                                <div class="product-image">
                                    <img class="pic-1 pic-2" src="{{URL::to('/public/uploads/product/'.$val->product_image)}}" />
                                    <div class="home-product-item__sale-off ">
                                        <span class="home-product-item__sale-off-percent ">20%</span>
                                        <span class="home-product-item__sale-off-label ">GIẢM </span>
                                    </div>
                                </div>
                            </a>
                            <div style="box-shadow: 0 0.0625rem 0.125rem 0 rgba(0,0,0,.1);" class="product-content">
                                <div>
                                    <a href="{{ URL::to('/chi-tiet-san-pham/'.$val->product_id) }}">
                                        <p class="home-product-item__name">{{ $val->product_name }}</p>
                                    </a>
                                </div>
                                <div class="info-price">
                                    <div style="padding-left: 10px;margin-top: 16px;" class="price">
                                        <div style="font-size: 14px;color: orangered;font-weight: 300;" class="price-new">3.300.000đ</div>
                                        <div class="price-old">3.300.000đ</div>
                                    </div>
                                </div>
                                <div style="position: relative;bottom: -14px;font-size: 14px;" class="bottom-info">
                                    <div style="padding-left: 10px;" class="info">
                                        <div class="left-hert">
                                            <i class="far fa-heart"></i>
                                            @foreach($category as $key =>$data)
                                            @if($data->category_id==$val->category_id)
                                            <p>{{ $data->category_name }}</p>
                                            @endif
                                            @endforeach
                                        </div>
                                        <div class="right-star">
                                            <div style="height: 20px;" class="stars">
                                                <input type="radio" id="five" name="rate" value="5">
                                                <label for="five"></label>
                                                <input type="radio" id="four" name="rate" value="4">
                                                <label for="four"></label>
                                                <input type="radio" id="three" name="rate" value="3">
                                                <label for="three"></label>
                                                <input type="radio" id="two" name="rate" value="2">
                                                <label for="two"></label>
                                                <input type="radio" id="one" name="rate" value="1">
                                                <label for="one"></label>
                                                <span class="result"></span>
                                            </div>
                                            <p>Hàn Quốc</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">

            
                </ul>
            </nav>    
        </div>
    </div>
</div>
</div>
</div>
</div>






<footer class="footer ">
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


    login = function () {
        $('#loginform').css('display', 'flex');
        $('#registerform').css('display', 'none')
    }
    register = function () {
        $('#loginform').css('display', 'none');
        $('#registerform').css('display', 'flex')
    }
    backpage = function () {
        $('#loginform').css('display', 'none')
        $('#registerform').css('display', 'none')
    }
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
</body>

</html>