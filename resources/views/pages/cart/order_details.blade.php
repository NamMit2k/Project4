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
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese" rel="stylesheet">
    <link href="./assets/css/sp/sp.css" rel="stylesheet" />
    <link href="./assets/css/sp/spresponsive.css" rel="stylesheet" />
    <style>
        td {
            font-size: 14px;
            padding-right: 20px !important;
        }
        
        td:first-child {
            border-right: 1px solid #e5e5e5;
            color: #999;
            font-size: 12px;
            padding-right: 10px !important;
        }
        
        tr:last-child {
            border-bottom: 1px solid #e5e5e5;
        }
        
        a {
            color: #666
        }
        
        .header-profile {
            display: flex;
        }
        
        .user-page-container {
            display: flex;
            padding: 20px 0;
        }
        
        .userpage-sidebar {
            display: block;
            width: 180px;
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
        }
        
        .user-page-brief {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #efefef;
        }
        
        .user-page-brief__avatar>img {
            width: 50px;
            height: 50px;
        }
        
        .user-page-brief__right {
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            -webkit-box-pack: center;
            justify-content: center;
            padding-left: 15px;
            overflow: hidden;
        }
        
        .user-page-brief__username {
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
            font-size: 14px;
        }
        
        .userpage-sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 27px 0 0;
            cursor: pointer;
        }
        
        .userpage-sidebar-menu-entry__icon {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background-color: rgb(68, 181, 255);
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 8px;
        }
        
        .userpage-sidebar-menu-entry__text {
            font-size: 14px;
        }
        
        .userpage-sidebar-menu-entry {
            text-decoration: none;
            color: rgba(0, 0, 0, 0.8);
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            text-transform: capitalize;
            margin-bottom: 18px;
            -webkit-transition: color 0.1s cubic-bezier(0.4, 0, 0.2, 1);
            transition: color 0.1s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .user-page__content {
            margin-bottom: 15px;
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -moz-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 980px;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding-left: 1.6875rem;
            min-width: 0;
            height: 100%;
        }
        
        .h25IfI {
            position: relative;
            min-height: 50px;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
            border-radius: .125rem;
            overflow: hidden;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.13);
            background: #fff;
        }
        
        .my-account-section {
            padding: 30px;
        }
        
        .my-account-section__header {
            height: auto;
            padding-top: 0;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            border-bottom: 1px solid #efefef;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding-bottom: 22px;
        }
        
        .my-account-section__header-title {
            font-size: 16px;
            font-weight: 600;
        }
        
        .my-account-section__header-subtitle {
            font-size: 14px;
        }
        /* .my-account-profile-form {} */
        
        .my-account-profile {
            display: flex;
            align-items: flex-start;
            padding-top: 30px;
        }
        
        .my-account-profile__left {
            flex: 1;
            padding-right: 50px;
        }
        
        .my-account-profile .input-with-label {
            margin-bottom: 30px;
        }
        
        .input-with-label__wrapper {
            display: flex;
            justify-content: flex-end;
            -webkit-box-align: center;
            align-items: center;
        }
        
        .input-with-label__label {
            width: 20%;
            text-align: right;
            color: rgba(85, 85, 85, 0.8);
            text-transform: capitalize;
            overflow: hidden;
            font-size: 14px;
        }
        
        .input-with-label__content {
            width: 80%;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding-left: 20px;
        }
        
        .input-with-validator {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            background-color: #fff;
            border-radius: .125rem;
            border: 1px solid rgba(0, 0, 0, .14);
            box-sizing: border-box;
            box-shadow: inset 0 2px 0 0 rgba(0, 0, 0, .02);
            color: #222;
            height: 40px;
            padding: .625rem;
            -webkit-transition: border-color .1s ease;
            transition: border-color .1s ease;
        }
        
        .input-with-validator input {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -moz-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            font-size: 14px;
            background: transparent;
            outline: none;
            box-shadow: none;
            border: none;
        }
        
        .my-account__inline-container {
            display: flex;
            align-items: center;
        }
        
        .my-account__input-text {
            font-size: 14px;
            color: #333;
        }
        
        .stardust-radio-group {
            display: flex;
            justify-content: flex-start;
        }
        
        .stardust-radio {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .stardust-radio+.stardust-radio {
            margin-left: 12px;
        }
        
        .stardust-radio>input {
            cursor: pointer;
        }
        
        .stardust-radio-button {
            margin-right: 8px;
            flex-shrink: 0;
            position: relative;
            width: 7x;
            height: 7px;
        }
        
        .stardust-radio__content {
            font-size: 14px;
        }
        
        SELECT {
            padding: 5px;
            font-size: 14px;
            margin-right: 2px;
            width: 120px;
            cursor: pointer;
            height: 40px;
            outline: orangered;
            border: 1px solid #e5e5e5;
        }
        
        select:hover {
            border: 1px solid orangered;
        }
        
        SELECT+SELECT {
            margin-right: 2px;
        }
        
        input.date {
            width: 50px;
            padding: 5px;
        }
        
        .my-account-page__submit {
            margin-bottom: 60px;
            padding-left: calc(20% + 20px);
        }
        
        .my-account-profile__right {
            width: 300px;
            display: flex;
            justify-content: center;
            overflow: hidden;
            border-left: 1px solid #efefef;
        }
        
        .avatar-uploader {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .avatar-uploader__avatar {
            height: 100px;
            width: 100px;
            margin: 20px 0;
            position: relative;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        a:hover {
            color: orangered;
        }
        
        .avatar-uploader__avatar-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-position: 50%;
            background-size: cover;
            background-repeat: no-repeat;
            cursor: pointer;
        }
        
        .btn-light {
            background-color: #fff;
            color: #555;
            overflow: hidden;
            display: -webkit-box;
            text-overflow: ellipsis;
            flex-direction: column;
            font-size: 14px;
            box-sizing: border-box;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .09);
            border-radius: 2px;
            border: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: capitalize;
            outline: 0;
            cursor: pointer;
        }
        
        #exTab1 .tab-content {
            background-color: #428bca;
            padding: 5px 15px;
        }
        
        #exTab2 h3 {
            color: white;
            background-color: #428bca;
            padding: 5px 15px;
        }
        /* remove border radius for the tab */
        
        #exTab1 .nav-pills>li>a {
            border-radius: 0;
        }
        /* change border radius for the tab , apply corners on top*/
        
        #exTab3 .nav-pills>li>a {
            border-radius: 4px 4px 0 0;
        }
        
        #exTab3 .tab-content {
            color: white;
            background-color: #428bca;
            padding: 5px 15px;
        }
        
        .tab_header>li {
            display: flex;
            justify-content: center;
            width: calc(100% / 6);
            height: 50px;
            align-items: center;
            text-align: center;
            font-size: 14px;
        }
        
        .tab_header>li>a {
            color: #333;
        }
        
        .tab-content {
            margin: 20px 0;
            min-height: 300px;
        }
        
        .tab-pane {
            padding: 0;
            font-size: 14px;
        }
        
        .tab-pane-title {
            margin-bottom: 20px;
            font-size: 16px;
            font-weight: 500;
        }
        
        .input-search {}
        
        .tab_list.active {
            border-bottom: 1px solid orangered !important;
        }
        
        .tab_list.active>a {
            color: orangered;
        }
        
        .checkout-form {
            margin-bottom: 10px;
        }
        
        .cart-empty-page__content {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 50px 0;
        }
        
        .cart-empty-page__content-image {
            margin: 0;
            width: 300px;
        }
        
        .cart-empty-page__content-image>img {
            display: block;
            width: 100%;
            height: auto;
        }
        
        .cart-empty-page__content-text {
            margin: 20px 0 20px;
            font-size: 16px;
            font-weight: 500;
        }
        
        .btn--l {
            height: 48px;
            padding: 0 20px;
            min-width: 80px;
            max-width: 250px;
        }
        /* cart */
        
        .deltai-Cart {
            padding: 10px;
        }
        
        .cart-page-product-header {
            -webkit-box-align: center;
            align-items: center;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .05);
            border-radius: 2px;
            overflow: hidden;
            border-radius: 3px;
            height: 52px;
            font-size: 14px;
            background: #fff;
            text-transform: capitalize;
            margin-bottom: 12px;
            color: #888;
            padding: 0 20px;
            display: -webkit-box;
            display: flex;
        }
        
        .cart-page-product-header__product {
            width: 46.27949%;
        }
        
        .cart-page-product-header__unit-price {
            width: 15.88022%;
            text-align: center;
        }
        
        .cart-page-product-header__quantity {
            width: 15.4265%;
            text-align: center;
        }
        
        .cart-page-product-header__total-price {
            width: 10.43557%;
            text-align: center;
        }
        
        .cart-page-product-header__action {
            width: 12.70417%;
            text-align: center;
        }
        
        .cart-page-shop-section {
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .05);
            border-radius: .125rem;
            overflow: hidden;
            background: #fff;
            margin-bottom: .9375rem;
            overflow: visible;
        }
        
        .cart-page-shop-section__items {
            position: relative;
            padding-bottom: 1px;
        }
        
        .cart-page-shop-section__items>.cart-item:first-child {
            margin-top: 0;
        }
        
        .cart-page-shop-section__items>.cart-item:last-child {
            border-bottom: 0;
        }
        
        .cart-page-shop-section__items>.cart-item {
            border-bottom: 1px solid rgba(0, 0, 0, .09);
            padding-left: 20px;
            padding-right: 20px;
        }
        
        .cart-page-shop-section__items>.cart-item {
            border: none;
        }
        
        .cart-item__content {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
        }
        
        .cart-item__cell-overview {
            box-sizing: border-box;
            display: -webkit-box;
            display: flex;
        }
        
        .cart-item:last-child {
            padding-bottom: 10px;
        }
        
        .cart-item:first-child {
            padding-top: 10px;
        }
        
        .cart-item__cell-overview .cart-item-overview__thumbnail {
            max-width: 80px;
        }
        
        .cart-item-overview__thumbnail {
            background-position: 50%;
            background-size: contain;
            background-repeat: no-repeat;
            width: 80px;
            height: 80px;
        }
        
        .cart-item__flex {
            -webkit-box-flex: 1;
            flex: 1 1 auto;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            overflow: hidden;
        }
        
        .cart-item__flex .cart-item-overview__product-name-wrapper {
            padding: 0 10px;
        }
        
        .cart-item-overview__product-name-wrapper {
            -webkit-box-flex: 1;
            flex: 1 1 0;
        }
        
        .cart-item-overview__product-name-wrapper {
            display: -webkit-box;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            padding: .3125rem 1.25rem 0 .625rem;
            font-size: 14px;
            line-height: 1rem;
            width: 502px;
        }
        
        .cart-item-overview__name {
            text-decoration: none;
            color: rgba(0, 0, 0, .8);
            line-height: 20px;
            max-height: 40px;
            text-overflow: ellipsis;
            overflow: hidden;
            word-break: break-word;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
        
        .cart-item-overview__price {
            display: flex;
            align-items: center;
            font-size: 14px;
        }
        
        .cart-item__flex .cart-item__cell-unit-price {
            text-align: right;
            width: 110px;
        }
        
        .cart-item__cell-quantity,
        .cart-item__cell-unit-price {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }
        
        .cart-item__cell-unit-price,
        .cart-item__cell-variation {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
        }
        
        .cart-item__unit-price:last-child {
            margin: 0;
        }
        
        .cart-item__flex .cart-item__cell-unit-price {
            text-align: right;
            width: 110px;
        }
        
        .cart-item__cell-quantity,
        .cart-item__cell-unit-price {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }
        
        .cart-item__flex .cart-item__cell-quantity {
            width: 150px;
            margin: 0 14px;
        }
        
        .cart-item__cell-quantity {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 15.4265%;
        }
        
        .cart-item__cell-quantity,
        .cart-item__cell-unit-price {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }
        
        .cart-item__flex .cart-item__cell-total-price {
            text-align: center;
        }
        
        .cart-item__flex .cart-item__cell-total-price {
            text-align: center;
            width: 110px;
        }
        
        .cart-item__cell-total-price {
            width: 10.43557%;
            text-align: right;
            color: #ee4d2d;
        }
        
        .cart-item__cell-actions {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 12.70417%;
            text-transform: capitalize;
            font-size: 14px;
        }
        
        .cart-item__action {
            cursor: pointer;
            background: none;
            border: none;
        }
        
        .cart-item__cell-actions {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 12.70417%;
            text-transform: capitalize;
        }
        
        ._19lAw4 {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
        }
        
        ._1zT8xu:first-child {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        
        .btn-quantity {
            box-shadow: none;
        }
        
        ._1zT8xu {
            outline: none;
            cursor: pointer;
            border: none;
            font-size: .875rem;
            font-weight: 300;
            line-height: 1;
            letter-spacing: 0;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
            transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
            border: 1px solid rgba(0, 0, 0, .09);
            border-radius: 2px;
            background: transparent;
            color: rgba(0, 0, 0, .8);
            width: 50px;
            height: 32px;
        }
        
        .bt {
            overflow: hidden;
            display: -webkit-box;
            text-overflow: ellipsis;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            flex-direction: column;
            font-size: 4px;
            box-sizing: border-box;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .09);
            border-radius: 2px;
            border: 0;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            text-transform: capitalize;
            outline: 0;
            cursor: pointer;
            outline: none !important;
        }
        
        ._1zT8xu .tickid-svg-icon {
            font-size: 12px;
        }
        
        .tickid-svg-icon {
            display: inline-block;
            width: 10px;
            height: 10px;
            fill: currentColor;
            position: relative;
        }
        
        ._18Y8Ul {
            width: 50px;
            height: 32px;
            border-left: none;
            border-right: none;
            font-size: 1rem;
            font-weight: 400;
            box-sizing: border-box;
            text-align: center;
            cursor: text;
            border-radius: 0;
        }
        
        ._1zT8xu:last-child {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        
        .btn-quantity {
            box-shadow: none;
        }
        
        ._1zT8xu {
            outline: none;
            cursor: pointer;
            border: none;
            font-size: 14px;
            font-weight: 300;
            line-height: 1;
            letter-spacing: 0;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
            transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
            border: 1px solid rgba(0, 0, 0, .09);
            border-radius: 2px;
            background: transparent;
            color: rgba(0, 0, 0, .8);
            width: 50px;
            height: 32px;
        }
        
        .checkout {
            padding: 10px;
            background-color: #fff;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 8px 8px;
            /* border-top: 1px dashed #e5e5e5; */
            width: 480px;
            margin-left: calc(100% - 480px);
            padding-top: 20px;
        }
        
        .cart-info {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            flex: 1;
            height: 100%;
            padding: 20px;
            font-size: 14px;
        }
        
        .cart-value {
            color: var(--primary-color);
        }
        
        .cart-title {
            margin-right: 12px;
        }
        
        .check-out-adress {
            width: 100%;
        }
        
        .checkout-form {
            background-color: #fff;
        }
        
        .checkout-address-selection__section-header-text {
            font-size: 16px;
            color: var(--primary-color);
            display: flex;
            align-items: center;
        }
        
        .tickid-svg-icon {
            margin-right: 8px;
            font-size: 22px;
        }
        
        .auth-form__input {
            font-size: 14px;
            width: 45%;
            height: 40px;
            border-radius: 2px;
            outline: none;
        }
        
        .js-input-update-cart {
            border: none;
        }
        
        .btn-back {
            border: 1px solid #e5e5e5;
            margin-left: 12px;
            outline: none;
        }
        
        .infor-content-header-infor {
            margin: auto;
            margin-top: 14px;
            font-size: 1.4rem;
            line-height: 20px;
        }
        
        .infor-content-header-infor-item {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .infor-content-header-infor-item-left {
            display: flex;
            justify-content: flex-start;
            color: #999;
            width: 14%;
        }
        
        .infor-content-header-infor-item-right {
            display: flex;
            min-width: 12%;
            justify-content: flex-end;
        }
        
        .infor-content-header-infor-item-right--strong {
            font-size: 22px;
            color: var(--primary-color);
        }
        
        .btn {
            width: 200px;
            height: 42px;
        }
        
        .checkout-payment-method-view__current {
            min-height: auto;
            padding-top: 25px;
            padding-bottom: 25px;
        }
        
        .checkout-payment-method-view__current {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            min-height: 5.625rem;
            box-sizing: border-box;
            padding-left: 1.875rem;
        }
        
        .checkout-payment-method-view__current-title {
            font-size: 16px;
            width: 200px;
            color: #222;
        }
        
        .checkout-payment-method-view__current-title {
            margin-right: auto;
        }
        
        .checkout-payment-setting__payment-methods-tab>span:last-child .product-variation {
            margin-right: 0;
        }
        
        .product-variation {
            position: relative;
            padding: 0 10px;
            min-width: 60px;
        }
        
        .product-variation--selected,
        .product-variation:hover {
            color: #ee4d2d;
            border-color: #ee4d2d;
        }
        
        .product-variation {
            cursor: pointer;
            display: inline-block;
            min-width: 5rem;
            box-sizing: border-box;
            padding: 0 .75rem;
            height: 2.125rem;
            line-height: 1;
            margin: 0 8px 0 0;
            color: rgba(0, 0, 0, .8);
            text-align: center;
            white-space: nowrap;
            border-radius: 2px;
            border: 1px solid rgba(0, 0, 0, .09);
            position: relative;
            background: #fff;
            outline: 0;
        }
        
        .btn-methood {
            margin: 0;
            min-height: 32px;
            border: 1px solid var(--primary-color);
            color: orangered;
        }
        
        .checkout-payment-method-view__current-title-s {
            font-size: 13px;
        }
        
        .checkout-payment-method-view__current-s {
            border-bottom: 1px solid #e5e5e5;
        }
        
        .pagination {
            display: flex !important;
            text-align: center;
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }
        
        .pagination>li {
            display: inline;
        }
        
        .pagination>li>a,
        .pagination>li>span {
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
        
        .pagination>li:first-child>a,
        .pagination>li:first-child>span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        
        .pagination>li:last-child>a,
        .pagination>li:last-child>span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        
        .pagination>li>a:hover,
        .pagination>li>span:hover,
        .pagination>li>a:focus,
        .pagination>li>span:focus {
            z-index: 2;
            color: #23527c;
            background-color: #eee;
            border-color: #ddd;
        }
        
        .pagination>.active>a,
        .pagination>.active>span,
        .pagination>.active>a:hover,
        .pagination>.active>span:hover,
        .pagination>.active>a:focus,
        .pagination>.active>span:focus {
            z-index: 3;
            color: #fff;
            cursor: default;
            background-color: orangered;
            border-color: #fff;
        }
        
        .pagination>.disabled>span,
        .pagination>.disabled>span:hover,
        .pagination>.disabled>span:focus,
        .pagination>.disabled>a,
        .pagination>.disabled>a:hover,
        .pagination>.disabled>a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }
        
        .pagination-lg>li>a,
        .pagination-lg>li>span {
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.3333333;
        }
        
        .pagination-lg>li:first-child>a,
        .pagination-lg>li:first-child>span {
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
        }
        
        .pagination-lg>li:last-child>a,
        .pagination-lg>li:last-child>span {
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
        }
        
        .pagination-sm>li>a,
        .pagination-sm>li>span {
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
        }
        
        .pagination-sm>li:first-child>a,
        .pagination-sm>li:first-child>span {
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }
        
        .pagination-sm>li:last-child>a,
        .pagination-sm>li:last-child>span {
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
        
        .pager li>a,
        .pager li>span {
            display: inline-block;
            padding: 5px 14px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 15px;
        }
        
        .pager li>a:hover,
        .pager li>a:focus {
            text-decoration: none;
            background-color: #eee;
        }
        
        .pager .next>a,
        .pager .next>span {
            float: right;
        }
        
        .pager .previous>a,
        .pager .previous>span {
            float: left;
        }
        
        .pager .disabled>a,
        .pager .disabled>a:hover,
        .pager .disabled>a:focus,
        .pager .disabled>span {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
        }
        
        .tickid-svg-icon {
            margin-right: 0 !important;
        }
        
        .btn-d:hover {
            color: orangered !important;
            border: 1px solid orangered !important;
        }
        
        .ttdh {
            padding: 10px 0px;
            background: #fff
        }
        
        .filter_seach {
            display: flex;
            align-items: center;
            margin: 10px 0 -10px 0;
            height: 40px;
            width: 100%;
            background-color: #eaeaea;
        }
        
        .input-search {
            flex: 1;
            outline: none;
            border: none;
            font-size: 14px;
            padding-left: 8px;
            background-color: #eaeaea;
            height: 100%;
        }
        
        .filter_seach>svg {
            font-size: 16px;
            margin: 0 12px;
        }
    </style>

</head>

<body>
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
            <a href="{{ URL::to('/') }}" class="header__logo-link header__logo-link "
            style="-webkit-tap-highlight-color: transparent; ">
            <img class="header__logo-img"
            src="https://img.abaha.vn/photos/resized/320x/83-1574737287-myphamohui-lgvina.png"
            alt="Logo_img">
        </a>
    </div>
    <input type="checkbox" hidden id="mobile-search-checkbox " class="header__search-checkbox ">
    <div ng-controller="SearchController" class="header__search">
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

    <div class="user-page-container container">
        <div class="userpage-sidebar">
            <div class="user-page-brief">
                <div class="user-page-brief__avatar">
                    <img src="https://ohuivina.com/assets/images/avatar-default.png" alt="">
                </div>
                <div class="user-page-brief__right">
                    <div class="user-page-brief__username">
                        Ngọc Nam
                    </div>
                </div>
            </div>

        </div>
        <div class="user-page__content">

            <div class="tab-content">
                <div class="tab-pane  active" id="1a">
                    <div class="container-fluid mb-4 ttdh">
                        <nav class="navbar ">
                            <div class="container-fluid d-flex">
                                <a href="">
                                    <i style="transform: rotate(90deg);" class="fas fa-chevron-down"></i>
                                    <div class=" navbar-brand  text-uppercase">Trở lại</div>
                                </a>
                                @foreach($data as $v)
                                <div class="d-flex align-items-center">
                                    <div class=" navbar-brand">MÃ ĐƠN HÀNG: {{$v->order_id}}</div>
                                   
                            </div>
                            @endforeach

                        </div>
                    </nav>
                    <hr>

                    @foreach($ship as $shi)

                    <div class="card-body">
                        <h3 class="mb-4">Địa chỉ nhận hàng</h3>
                        <div class="row pt-3">
                            <label class="col-sm-2 col-form-label"><b>Tên khách hàng</b></label>
                            <label class="col-sm-4 col-form-label">{{$shi->shipping_name}}</label>

                        </div>
                        <div class=" row">
                            <label for="inputPassword" class="col-sm-2 col-form-label"><b>Số điện thoại</b></label>
                            <label for="inputPassword" class="col-sm-4 col-form-label">{{$shi->shipping_phone}}</label>
                        </div>
                        <div class=" row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">
                                <b>Địa chỉ nhận hàng</b>
                            </label> 
                            <label for="inputPassword" class="col-sm-4 col-form-label">
                                {{$shi->shipping_address}}
                            </label>
                        </div>
                    </div>

                    @endforeach

                    <hr>

                    <div class="tab-pane-title">
                        <div class=" checkout-form">
                            <div class="form-product">
                                @foreach($data as $val)                             
                                <div ng-repeat="i in cart1" class="cart-page-shop-section">
                                    <div class="cart-page-shop-section__items">
                                        <div class="cart-item js-product-cart">
                                            <div class="cart-item__content">
                                                <div class="cart-item__cell-overview">
                                                    @foreach($product as $pro)
                                                    @if($val->product_id==$pro->product_id)
                                                    <a class="cart-item-overview__thumbnail-wrapper" href="">
                                                        <img class="cart-item-overview__thumbnail" src="{{URL::to('public/uploads/product/'.$pro->product_image) }}" alt="">
                                                    </a>
                                                    @endif
                                                    @endforeach
                                                </div>
                                                <div class="cart-item__flex">
                                                    <div style="height: 80px" class="cart-item-overview__product-name-wrapper">
                                                        <a href="" class="cart-item-overview__name"> {{$val->product_name}}</a>
                                                        <div class="m-2">x 1</div>
                                                    </div>

                                                </div>
                                                <div class="cart-item__cell-actions">
                                                    <span class="cart-item__unit-price cart-item__unit-price--after js-cart-item-unit-price text-danger">
                                                        {{number_format($val->product_price)}}đ
                                                    </span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                               

                                @endforeach

                                @foreach($order as $od) 
                                <table class="table" style="text-align: right; width: 98%; margin: auto;">                                          

                                    <tbody class="">
                                        <tr class="row">
                                            <td class="col-sm-9">Tổng tiền hàng</td>
                                            <td class="col-sm-3">{{$od->order_total}}đ</td>

                                        </tr>
                                        <tr class="row">
                                            <td class="col-sm-9">Phí vận chuyển</td>
                                            <td class="col-sm-3">Chưa tính</td>

                                        </tr>
                                        <tr class="row">
                                            <td class="col-sm-9">Tổn số tiền</td>
                                            <td class="col-sm-3">

                                                <div style="font-size: 30px; line-height: 100%" class="cart-value">
                                                    {{$od->order_total}}đ</div>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    @endforeach
                                </div>
                                <div style="display: flex; align-items: center" class="cart-info">
                                    <img style="height:28px" class="mr-3" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/67454c89080444c5997b53109072c9e0.png" alt="">
                                    <div style="font-size: 12px; color: #999" class="cart-title">Phương thức thanh toán:</div>
                                    <div class="cart-value">
                                        Thanh toán khi nhận hàng
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class=" tab-pane " id="2a ">
                    <div class="no-salesinvoice ">
                        <div class="no-salesinvoice-content ">
                            <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/5fafbb923393b712b96488590b8f781f.png " alt=" ">
                            <div class=" ">Chưa có đơn hàng</div>
                        </div>
                    </div>
                    <div class="tab-pane-title ">

                    </div>


                </div>
                <div class="tab-pane " id="3a ">
                    <div class="tab-pane-title ">
                        Đơn hàng đã xác nhận:
                    </div>


                </div>
                <div class="tab-pane " id="4a ">
                    <div class="tab-pane-title ">
                        Đơn hàng đang giao:
                    </div>


                </div>
                <div class="tab-pane " id="5a ">
                    <div class="tab-pane-title ">
                        Đơn hàng đã giao:
                    </div>


                </div>
                <div class="tab-pane " id="6a ">
                    <div class="tab-pane-title ">
                        Đơn hàng đã hủy:
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js "></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js "></script>

</body>

</html>