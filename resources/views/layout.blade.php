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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <link rel="stylesheet" href="{{asset('public/css/sweetalert.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese"
    rel="stylesheet">
    <style>
        #hearder__navbar-user {
            display: none;
            .cart-check-info {
                display: flex;
                justify-content: space-between;
                margin: 8px 12px 8px 12px;
                padding: 0 10px 0 0;
            }

            .cart-check-title {
                font-size: 14px;
            }

            .cart-check-value {
                font-size: 14px;
            }

            .header__cart-notice {
                width: 34px !important;
                left: 23px;
                text-align: center;
            }

            .auth-form__input {
                font-size: 14px;
                width: 100%;
                height: 40px;
                border-radius: 2px;
                outline: none;
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
                                    <img src="{{asset('public/img/QR-Code.png') }}" alt="QR_Code" class="header__qr-img">
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
                                    <a href="{{URl::to('/news')}}" class="header__navbar-item-link">
                                        <i class="header__navbar-icon far fa-bell"></i> Tin tức
                                    </a>

                                </li>
                                <?php
                                $id = Session::get('customer_id');
                                if($id){
                                    ?>
                                    <li class="hearder__navbar-item">
                                        <a href="{{URl::to('/order-cus')}}" class="header__navbar-item-link">
                                            <i class="far fa-file-alt"></i>&nbsp; Đơn hàng
                                        </a>
                                    </li>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <li class="hearder__navbar-item">
                                        <a href="{{URl::to('/order-cus?id=')}}" class="header__navbar-item-link">
                                            <i class="far fa-file-alt"></i> &nbsp;Đơn hàng
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
                            </a>
                            <?php
                        }
                        ?>



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
        <a href="/{{ URL::to('/') }}" class="header__logo-link header__logo-link "
        style="-webkit-tap-highlight-color: transparent; ">
        <img class="header__logo-img"
        src="https://img.abaha.vn/photos/resized/320x/83-1574737287-myphamohui-lgvina.png"
        alt="Logo_img">
    </a>
</div>
<input type="checkbox" hidden id="mobile-search-checkbox " class="header__search-checkbox ">
<div   class="header__search">
  <div class="header__search-input-wrap" style="margin-top: 25px;">
    <form action="{{ URL::to('/tim-kiem')}}" method="post" >
        {{csrf_field()}}
        <input style="font-size: 16px;"  id="name" name="keywords_submit" type="text" class="header__search-input"
        placeholder="Tìm kiếm sản phẩm... " >
    </form>
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
                <a href="#" class="nav__mobile-user-link ">Đăng ký</a>
            </div>
            <div class="nav__mobile-user-item nav__mobile-user-item--active ">
                <a href="#" class="nav__mobile-user-link ">Đăng nhập</a>
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
    <div class="container" >
        <div class="wrapper row " >
            <div class="sidebar " style="width: 230px;">
                <h4 ><b style="font-family: sans-serif;font-size: 15px">Danh mục sản phẩm</b></h4>
                <ul>
                   <li class="category-item"><a  style="font-family: sans-serif;font-size: 13px;cursor: pointer;" href="{{ URL::to('/all') }}">Tất Cả Sản Phẩm </a></li>
                   @foreach($category as $key => $cate)
                   @if($cate->category_parent==0)
                   <li class="category">
                    <a style="font-family: sans-serif;font-size: 13px;" href="{{ URL::to('danh-muc-san-pham-dad/'.$cate->category_id) }}">{{ $cate->category_name }}</a>
                    <ul class="categories">
                     @foreach($category as $key => $cate_sub)

                     @if($cate_sub->category_parent==$cate->category_id )
                     <li class="category-item">
                        <a href="{{ URL::to('danh-muc-san-pham/'.$cate_sub->category_id) }}">{{ $cate_sub->category_name }} </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </li>
            @endif
            @endforeach
        </ul>
    </div>


    <div class="main_content " style="width: 600px; ">
        <div id="demo" class="carousel slide" data-ride="carousel" style="margin-left: 20px;margin-top: -70px;">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('public/img/slide1.png')}}"
                    alt="Los Angeles" width="100%" height="310px;" >
                </div>
                <div class="carousel-item">
                 <img src="{{asset('public/img/slide2.png')}}"
                 alt="Chicago" width="100%" height="310px">
                </div>
                 <div class="carousel-item">
                <img src="https://img.abaha.vn/photos/resized/850x500/83-1589892101-myphamohui-lgvina.png"
                alt="New York" width="100%" height="310px">
                </div>
            </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <i class="fa fa-angle-right"></i>s
        </a>
    </div>
</div>

<div style="width: 275px;margin-top:20px;height: 300px;margin-left: 10px;">
    <img  style="width: 100%;height: 150px;" src="{{asset('public/img/tintuc1.png')}}">
    <img  style="width: 100%;height: 150px;margin-top: 10px;" src="https://img.abaha.vn/photos/resized/850x500/83-1621513412-myphamohui-lgvina.png">

</div>
</div>

@yield('content')
</div>
</div>




<footer class="footer "  >
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
<script type="text/javascript">
  $(document).ready(function() {

  });
</script>
</body>

</html>
