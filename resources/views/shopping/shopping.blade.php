<?php $number = 0; ?>

@extends('layouts.auth')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <link rel = "icon" href =  "/images/logo2.png" type = "image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chosen.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/color-01.css')}}">
    <style>
    html,body{
        max-width:100%;
        overflow-x:hidden;
    }
    /* .maindiv{
        padding-top: -0.5rem;
    } */
    .navbar-default{
    background-color:#0f1442;
    border-color: white;
  }
  .nav-link
  {
    font-size: 14.4px;
  }
  .menu-item
  {
    font-size: 14.4px;
  }
  .card-color{
    background-color:#F4F6F9;
    border-color: white;
  }
  .thcolor{
    background-color: #0f1442;
    color:white;
  }
  .table-responsive{
    max-height:350px;
  }
  
    </style>
</head>
<body>
@section('content')
<!-- navbar -->
<div>
  <nav class="navbar fixed-top navbar-default navbar-expand-lg navbar-dark ">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link active" href="/home">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="/maintenance">Pay Maintenance</a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="/shopping"><b>Shopping</b></a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="/amenity_bookings">Amenities Booking</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link active" href="/parking">Parking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="/complaints">Complaints</a>
      </li>
  
    </ul>
    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                      <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{__(Auth::user()->name)}} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
  </div>
  </nav>
<!-- navbar -->


  <!--header-->
  <header id="header" class="header header-style-1">
    <div class="container-fluid">
      <div class="row">
        <div class="topbar-menu-area">
          

        <div class="container">
          <div class="mid-section main-info-area">

            <div class="wrap-logo-top left-section">
              <a href="index.html" class="link-to-home"><img src="{{asset('assets/images/softcare.png')}}" alt="mercado"></a>
            </div>

            <div class="wrap-search center-section">
              <div class="wrap-search-form">
                <form action="#" id="form-search-top" name="form-search-top">
                  <input type="text" name="search" value="" placeholder="Search here...">
                  <button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                  <div class="wrap-list-cate">
                    <input type="hidden" name="product-cate" value="0" id="product-cate">
                    <a href="#" class="link-control">All Category</a>
                    <ul class="list-cate">
                      <li class="level-0">All Category</li>
                      <li class="level-1">-Electronics</li>
                      <li class="level-2">Batteries & Chargens</li>
                      <li class="level-2">Headphone & Headsets</li>
                      <li class="level-2">Mp3 Player & Acessories</li>
                      <li class="level-1">-Smartphone & Table</li>
                      <li class="level-2">Batteries & Chargens</li>
                      <li class="level-2">Mp3 Player & Headphones</li>
                      <li class="level-2">Table & Accessories</li>
                      <li class="level-1">-Electronics</li>
                      <li class="level-2">Batteries & Chargens</li>
                      <li class="level-2">Headphone & Headsets</li>
                      <li class="level-2">Mp3 Player & Acessories</li>
                      <li class="level-1">-Smartphone & Table</li>
                      <li class="level-2">Batteries & Chargens</li>
                      <li class="level-2">Mp3 Player & Headphones</li>
                      <li class="level-2">Table & Accessories</li>
                    </ul>
                  </div>
                </form>
              </div>
            </div>

            <div class="wrap-icon right-section">
              <div class="wrap-icon-section wishlist">
                <a href="#" class="link-direction">
                  <i class="fa fa-heart" aria-hidden="true"></i>
                  <div class="left-info">
                    <span class="index">0 item</span>
                    <span class="title">Wishlist</span>
                  </div>
                </a>
              </div>
              <div class="wrap-icon-section minicart">
                <a href="#" class="link-direction">
                  <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                  <div class="left-info">
                    <span class="index">4 items</span>
                    <span class="title">CART</span>
                  </div>
                </a>
              </div>
              <div class="wrap-icon-section show-up-after-1024">
                <a href="#" class="mobile-navigation">
                  <span></span>
                  <span></span>
                  <span></span>
                </a>
              </div>
            </div>

          </div>
        </div>

      
          <div class="primary-nav-section">
            <div class="container">
              <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                <li class="menu-item home-icon">
                  <a href="/home1" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
                </li>
                <li class="menu-item">
                  <a href="/aboutus" class="link-term mercado-item-title">About Us</a>
                </li>
                <li class="menu-item">
                  <a href="/shop" class="link-term mercado-item-title">Shop</a>
                </li>
                <li class="menu-item">
                  <a href="/cart" class="link-term mercado-item-title">Cart</a>
                </li>
                <li class="menu-item">
                  <a href="/checkout" class="link-term mercado-item-title">Checkout</a>
                </li>
                <li class="menu-item">
                  <a href="/contactus" class="link-term mercado-item-title">Contact Us</a>
                </li>                                 
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>


<main id="main">
    <div class="container">

       <!--MAIN SLIDE-->
      <div class="wrap-main-slide">
        <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
          <div class="item-slide">
            <img src="{{asset('assets/images/G1.jpg')}}" alt="" class="img-slide">
            <div class="slide-info slide-1">
              <h2 class="f-title"> <b>GROCERY SHOPPING</b><br><br>
              <a href="#" class="btn-link">Shop Now</a>
            </div>
          </div>
          <div class="item-slide">
            <img src="{{asset('assets/images/G3.jpg')}}" alt="" class="img-slide">
            <div class="slide-info slide-2">
              <h2 class="f-title">MILK AND DAIRY</h2><br><br>
              <a href="#" class="btn-link">Shop Now</a>
              
              <h4 class="s-title"></h4>
              <p class="s-subtitle"></p>
            </div>
          </div>
          <div class="item-slide">
            <img src="{{asset('assets/images/G4.jpg')}}" alt="" class="img-slide">
            <div class="slide-info slide-3"><br><br>
              <h2 class="f-title"><b>DAILY ESSENTIALS</b></h2>
              <a href="#" class="btn-link">Shop Now</a>
            </div>
          </div>
        </div>
      </div>


      <!--Product Categories-->
      <div class="wrap-show-advance-info-box style-1">
        <h3 class="title-box">Product Categories</h3>
        <div class="wrap-top-banner">
          <a href="#" class="link-banner banner-effect-2">
            <figure><img src="{{asset('assets/images/d1.png')}}" width="1170" height="240" alt=""></figure>
          </a>
        </div>
        <div class="wrap-products">
          <div class="wrap-product-tab tab-style-1">
            <div class="tab-control">
              <a href="#fashion_1a" class="tab-control-item active">Dairy</a>
              <a href="#fashion_1b" class="tab-control-item">Laundry</a>
              <a href="#fashion_1c" class="tab-control-item">Medical</a>
              <a href="#fashion_1d" class="tab-control-item">Grocery</a>
            </div>

            <div class="tab-contents">
              <div class="tab-content-item active" id="fashion_1a">

              </div>
            </div>
            <div class="tab-contents">

              <div class="tab-content-item active" id="fashion_1a">
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/d2.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item new-label">new</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Dairy products</span></a>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/d4.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item sale-label">sale</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Choclates </span></a>
                      <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/d8.png')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Milk </span></a>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                  <div class="product-thumnail">
                    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                      <figure><img src="{{asset('assets/images/d6.jpg')}}" width="90" height="10" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                    </a>
                    <div class="group-flash">
                      <span class="flash-item new-label">new</span>
                      <span class="flash-item sale-label">sale</span>
                    </div>
                    <div class="wrap-btn">
                      <a href="#" class="function-link">quick view</a>
                    </div>
                  </div>
                  <div class="product-info">
                    <a href="#" class="product-name"><span>Fresh Dairy Products</span></a>
                    <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">RS.250.00</p></del></div>
                  </div>
                </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/d7.png')}}" width="800" height="500" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item bestseller-label">Bestseller</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Amritha dairy Products</span></a>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/d10.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item sale-label">sale</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Milk products</span></a>
                      <div class="wrap-price"><ins><p class="product-price">RS.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/d13.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item new-label">new</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Bakery Products</span></a>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/d5.jpg')}}" width="80" height="80" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item bestseller-label">Bestseller</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Choclates</span></a>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="tab-content-item" id="fashion_1b">
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/c3.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item bestseller-label">Bestseller</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Floor And Kitchen Cleaning Products</span></a>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/c10.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item bestseller-label">Bestseller</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Lux Saop</span></a>
                      <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/c12.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item bestseller-label">Bestseller</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Soaps</span></a>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/c5.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item bestseller-label">Bestseller</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quic view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Fairy Cleaning Products</span></a>
                      <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                  

                   <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/c11.png')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item bestseller-label">Bestseller</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Pears</span></a>
                      <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/c13.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item bestseller-label">Bestseller</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Soaps</span></a>
                      <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/c15.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item bestseller-label">Bestseller</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Cleaning Products</span></a>
                      <div class="wrap-price"><span class="product-price">Rs250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/c8.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item bestseller-label">Bestseller</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Floor And Glass Cleaning Products</span></a>
                      <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="tab-content-item" id="fashion_1c">
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/medi1.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item new-label">new</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Capsules</span></a>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/medi2.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item new-label">new</span>
                        <span class="flash-item sale-label">sale</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Tablets</span></a>
                      <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/medi4.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item new-label">new</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Syrup and Tablets</span></a>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/medi2.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item new-label">new</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Tablets</span></a>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/medi5.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item new-label">new</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Capsules</span></a>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/medi1.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item new-label">new</span>
                        <span class="flash-item sale-label">sale</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Tablets</span></a>
                      <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/medi6.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item new-label">new</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quic view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Capsules</span></a>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/medi8.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item new-label">new</span>
                        <span class="flash-item sale-label">sale</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quic view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Capsules</span></a>
                      <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="tab-content-item" id="fashion_1d">
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/G15.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quick view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Spices</span></a>
                      <div class="product-rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </div>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/G2.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item sale-label">sale</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quic view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Vegies</span></a>
                      <div class="product-rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </div>
                      <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/G7.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item new-label">new</span>
                        <span class="flash-item sale-label">sale</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quic view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span>Vegetables</span></a>
                      <div class="product-rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </div>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/G4.png')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item bestseller-label">Bestseller</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quic view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span></span></a>
                      <div class="product-rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </div>
                      <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/G7.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quic view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span></span></a>
                      <div class="product-rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </div>
                      <div class="wrap-price"><span class="product-price">$250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/G13.png')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item sale-label">sale</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quic view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span></span></a>
                      <div class="product-rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </div>
                      <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/G14.png')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item new-label">new</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quic view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span></span></a>
                      <div class="product-rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </div>
                      <div class="wrap-price"><span class="product-price">Rs.250.00</span></div>
                    </div>
                  </div>

                  <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                      <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                        <figure><img src="{{asset('assets/images/G16.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                      </a>
                      <div class="group-flash">
                        <span class="flash-item bestseller-label">Bestseller</span>
                      </div>
                      <div class="wrap-btn">
                        <a href="#" class="function-link">quic view</a>
                      </div>
                    </div>
                    <div class="product-info">
                      <a href="#" class="product-name"><span></span></a>
                      <div class="product-rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </div>
                      <div class="wrap-price"><ins><p class="product-price">Rs.168.00</p></ins> <del><p class="product-price">Rs.250.00</p></del></div>
                    </div>
                  </div>

                </div>
              </div>


            </div>
          </div>
        </div>
      </div> 
      <br><br>

     

      <!--BANNER-->
      <!-- <div class="wrap-banner style-twin-default">
        <div class="banner-item">
          <a href="#" class="link-banner banner-effect-1">
            <figure><img src="{{asset('assets/images/G15.jpg')}}" alt="" width="580" height="190"></figure>
          </a>
        </div>
        <div class="banner-item">
          <a href="#" class="link-banner banner-effect-1">
            <figure><img src="{{asset('assets/images/G3.jpg')}}" alt="" width="580" height="190"></figure>
          </a>
        </div>
      </div> -->

      
      <!--Latest Products-->
      <!-- <div class="wrap-show-advance-info-box style-1">
        <h3 class="title-box">Latest Products</h3>
        <div class="wrap-top-banner">
          <a href="#" class="link-banner banner-effect-2">
            <figure><img src="{{asset('assets/images/G6.jpg')}}" width="1170" height="240" alt=""></figure>
          </a>
        </div>
        
           

    </div> -->

    

  </main>
  <footer id="footer">
    <div class="wrap-footer-content footer-style-1">

      <div class="wrap-function-info">
        <div class="container">
          <ul>
            <li class="fc-info-item">
              <i class="fa fa-truck" aria-hidden="true"></i>
              <div class="wrap-left-info">
                <h4 class="fc-name">Free Shipping</h4>
                <p class="fc-desc">Free On Oder Over $99</p>
              </div>

            </li>
            <li class="fc-info-item">
              <i class="fa fa-recycle" aria-hidden="true"></i>
              <div class="wrap-left-info">
                <h4 class="fc-name">Guarantee</h4>
                <p class="fc-desc">30 Days Money Back</p>
              </div>

            </li>
            <li class="fc-info-item">
              <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
              <div class="wrap-left-info">
                <h4 class="fc-name">Safe Payment</h4>
                <p class="fc-desc">Safe your online payment</p>
              </div>

            </li>
            <li class="fc-info-item">
              <i class="fa fa-life-ring" aria-hidden="true"></i>
              <div class="wrap-left-info">
                <h4 class="fc-name">Online Suport</h4>
                <p class="fc-desc">We Have Support 24/7</p>
              </div>

            </li>
          </ul>
        </div>
      </div>
      <!--End function info-->

      <div class="main-footer-content">

        <div class="container">

          <div class="row">

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
              <div class="wrap-footer-item">
                <h3 class="item-header">Contact Details</h3>
                <div class="item-content">
                  <div class="wrap-contact-detail">
                    <ul>
                      <li>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p class="contact-txt">Contact
                        Centre -PANVEL,
                        Shop NO.-A224,225,226,227,
                        Sai Arcade,above G.P.Parsik Bank
                        Behind Life Line Hospital,
                        Opp. S.T.Depot Panvel,Raigad,
                        Panvel-410 206,Maharashtra</p>
                      </li>
                      <li>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <p class="contact-txt"> Tel: 8446915849</p>
                      </li>
                      <li>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <p class="contact-txt"> Website: <a href="#">www.icajobgaruntee.com</a></p>
                      </li>                     
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

              <div class="wrap-footer-item">
                <h3 class="item-header">Hot Line</h3>
                <div class="item-content">
                  <div class="wrap-hotline-footer">
                    <span class="desc">Call Us toll Free</span>
                    <b class="phone-number">+91-8446915849</b>
                  </div>
                </div>
              </div>

              <div class="wrap-footer-item footer-item-second">
                <h3 class="item-header">Sign up for newsletter</h3>
                <div class="item-content">
                  <div class="wrap-newletter-footer">
                    <form action="#" class="frm-newletter" id="frm-newletter">
                      <input type="email" class="input-email" name="email" value="" placeholder="Enter your email address">
                      <button class="btn-submit">Subscribe</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
              <div class="row">
                <div class="wrap-footer-item twin-item">
                  <h3 class="item-header">My Account</h3>
                  <div class="item-content">
                    <div class="wrap-vertical-nav">
                      <ul>
                        <li class="menu-item"><a href="#" class="link-term">My Account</a></li>
                        <li class="menu-item"><a href="#" class="link-term">Brands</a></li>
                        <li class="menu-item"><a href="#" class="link-term">Gift Certificates</a></li>
                        <li class="menu-item"><a href="#" class="link-term">Affiliates</a></li>
                        <li class="menu-item"><a href="#" class="link-term">Wish list</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="wrap-footer-item twin-item">
                  <h3 class="item-header">Infomation</h3>
                  <div class="item-content">
                    <div class="wrap-vertical-nav">
                      <ul>
                        <li class="menu-item"><a href="#" class="link-term">Contact Us</a></li>
                        <li class="menu-item"><a href="#" class="link-term">Returns</a></li>
                        <li class="menu-item"><a href="#" class="link-term">Site Map</a></li>
                        <li class="menu-item"><a href="#" class="link-term">Specials</a></li>
                        <li class="menu-item"><a href="#" class="link-term">Order History</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
              <div class="wrap-footer-item">
                <h3 class="item-header">We Using Safe Payments:</h3>
                <div class="item-content">
                  <div class="wrap-list-item wrap-gallery">
                    <img src="{{asset('assets/images/payment.png')}}" style="max-width: 260px;">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
              <div class="wrap-footer-item">
                <h3 class="item-header">Social network</h3>
                <div class="item-content">
                  <div class="wrap-list-item social-network">
                    <ul>
                      <li><a href="#" class="link-to-item" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                      <li><a href="#" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                      <li><a href="#" class="link-to-item" title="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                      <li><a href="#" class="link-to-item" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                      <li><a href="#" class="link-to-item" title="vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
              <div class="wrap-footer-item">
                <h3 class="item-header">Dowload App</h3>
                <div class="item-content">
                  <div class="wrap-list-item apps-list">
                    <ul>
                      <li><a href="#" class="link-to-item" title="our application on apple store"><figure><img src="{{asset('assets/images/brands/apple-store.png')}}" alt="apple store" width="128" height="36"></figure></a></li>
                      <li><a href="#" class="link-to-item" title="our application on google play store"><figure><img src="{{asset('assets/images/brands/google-play-store.png')}}" alt="google play store" width="128" height="36"></figure></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

       

      <div class="coppy-right-box">
        <div class="container">
          <div class="coppy-right-item item-left">
            <p class="coppy-right-text">Copyright 2020 SoftCare TechnoKraft Pvt Ltd. All rights reserved.</p>
          </div>
          <div class="coppy-right-item item-right">
            <div class="wrap-nav horizontal-nav">
              <ul>
                <li class="menu-item"><a href="about-us.html" class="link-term">About us</a></li>               
                <li class="menu-item"><a href="privacy-policy.html" class="link-term">Privacy Policy</a></li>
                <li class="menu-item"><a href="terms-conditions.html" class="link-term">Terms & Conditions</a></li>
                <li class="menu-item"><a href="return-policy.html" class="link-term">Return Policy</a></li>               
              </ul>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </footer>
  <script src="{{asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
  <script src="{{asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
  <script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('assets/js/functions.js')}}"></script>



@endsection    
</body>
</html>
