<!doctype html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>E-MEDICAL</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">

        <!-- All css here -->
        <link rel="stylesheet" href=" {{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('css/meanmenu.css')}}">
        <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-futuraPT.css')}}">
        <link rel="stylesheet" href="{{asset('css/default.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    </head>
    <body>
     
        <!--  ====== preloader start =============================================  -->
        <div id="loading" class="home3">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!--  preloader-end -->


@php
    use App\Helpers\Helper;
  
    use App\Wishlist;

    $brands = Helper::get_brands();

    $categories = Helper::get_categories();

    $categories_menu = Helper::get_categories_menu();
@endphp


        <header  class="d-none d-lg-block">
            <div class="top-banner  pt-2 pb-12">
                <div class="container d-flex align-items-center justify-content-center align-items-center">
                    <p class="text-white mb-0">We promise at e-commerce that 5% of your spend will be donated to a medical and dental charitable organisation..</p>
                   <ul class="header-social-link d-flex">
                                            <!--<li>-->
                                            <!--    <a class="d-inline-block font13" href="#">-->
                                            <!--        <span class="text-center"><i class="fab fa-facebook-f"></i></span>-->
                                            <!--    </a>-->
                                            <!--</li>-->
                                            <!--<li>-->
                                            <!--    <a class="d-inline-block font13" href="#">-->
                                            <!--        <span class="text-center"><i class="fab fa-instagram"></i></span>-->
                                            <!--    </a>-->
                                            <!--</li>-->
                                            <!--<li>-->
                                            <!--    <a class="d-inline-block font13" href="#">-->
                                            <!--        <span class="text-center"><i class="fab fa-twitter"></i></span>-->
                                            <!--    </a>-->
                                            <!--</li>-->
                                            
                                            <!--<li>-->
                                            <!--    <a class="d-inline-block font13" href="#">-->
                                            <!--        <span class="text-center"><i class="fab fa-linkedin"></i></span>-->
                                            <!--    </a>-->
                                            <!--</li>-->
                                          
                                        </ul>
                </div> 
            </div>

            <div class="header-area header-area2">
                <div class="header header2 pt-30">
                    <div class="container">
                        <div class="header-top">
                            <div class="row">
                                <div class="col-xxl-3 col-xl-3 col-lg-3  col-md-3  col-sm-8 col-8 pl-0 pr-md-0">
                                    <div class="logo-area">
                                        <div class="logo2 white-bg z-index1 position-relative">
                                            <a href="{{Url('/')}}" class="d-block" data-toggle="tooltip" data-selector="true" data-placement="bottom" title="stepmeds">
                                                <img src="{{asset('images/logos.png')}}" alt="stepmeds">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6  col-lg-6  col-md-6  col-sm-1 col-1 pl-0 pr-0 justify-content-center">
                                    <div class="header-search w-100 position-relative mr-1 d-lg-inline-block" data-toggle="tooltip" data-selector="true" data-placement="bottom" title="Search">
                                         <div class="search-form">
                                            <div class="d-none d-md-inline-block width100">
                                                <form action="{{Url('search')}}" method="post">
                                                @csrf    
                                                <input type="text" placeholder="Search Product by Name" name="query" value="{{ old('query') }}" required oninvalid="this.setCustomValidity('Enter Something Here')" class="pl-25 width100 rounded-0 h2-gray-border1" >
                                                <button type="submit" style="padding: 10px;
                                                    right: 0px;
                                                    position: absolute;
                                                    border: none;
                                                    background: transparent;"><span class="icon-search"></span></button>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-3  col-lg-3  col-md-3  col-sm-3 col-3  pl-0 d-flex  align-items-center justify-content-end">
                                    <div class="header-right d-flex align-items-center">
                                       
                                        <ul class="header-account d-none d-md-block">
                                            <li class="d-none d-md-inline-block">
                                            
                                            @php $name = Session::get('user_name');
                                            @endphp
                                            @if(Session::get('user_name') == '')
                                            <a href="{{Url('logincustomer')}}" data-toggle="tooltip" data-selector="true" data-placement="bottom" title="My Account" class="dark-black-color"><span>LOGIN / REGISTER</span>
                                                </a>
                                                @else
                                                <a href="#" data-toggle="tooltip" data-selector="true" data-placement="bottom" title="Logout" class="dark-black-color"><span>Hi {{$name}} &nbsp; &nbsp;<i class="fa fa-sign-out" style="color:red"></i></span>
                                                </a>
                                                @endif
                                                
                                            </li>
                                        </ul>
                                        
                                        <ul class="h-shop position-relative pl-25 d-md-block">
                                            <li class="position-relative">
                                                <ul class="header-cart-wrapper d-flex align-items-center">
                                                    <li class="header-shopping-cart cart-item position-relative">
                                                        <span class="" data-toggle="tooltip" data-selector="true" data-placement="bottom" title="Add to cart"><i class="fal fa-shopping-bag"></i></span>
                                                        <span class="s-count position-absolute h2-theme-bg text-white text-center" id="counttotal"></span>
                                                    </li>
                                                </ul>
                                                
                                                <div class="header-shopping-cart-details border-t-gray1 mt-1 position-absolute bg-white pl-30 pr-30 pt-35 pb-60">
                                                <div class="d-sm-flex justify-content-between">
                                                    <a data-animation="fadeInUp" data-delay="1.7s" href="{{Url('/cart')}}" class="web-btn h2-web-btn mt-25 d-inline-block text-uppercase white h2-theme-bg position-relative over-hidden pl-30 pr-30 ptb-12 line-height-1 font12">view cart</a>
                                                    <!--<a data-animation="fadeInUp" data-delay="1.7s" href="{{Url('/checkout')}}" class="web-btn h2-web-btn mt-25 d-inline-block text-uppercase white h2-theme-bg position-relative over-hidden pl-30 pr-30 ptb-12 line-height-1 font12">checkout</a>-->
                                                </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
     
                        <div class="header-bottom home2-header-bottom" id="header-sticky">
                            <div class="row align-items-center justify-content-lg-between position-relative">
                                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-1 col-sm-1 col-1 d-flex align-items-center position-static">
                                    <div class="logo2 pr-20 white-bg z-index1 position-relative">
                                        <a href="{{Url('/')}}" class="d-block" data-toggle="tooltip" data-selector="true" data-placement="bottom" title="stepmeds">
                                            <img src="{{asset('images/logos.png')}}" alt="stepmeds">
                                        </a>
                                    </div>

                                    <div class="main-menu main-menu-2">
                                        <nav id="mobile-menu">
                                            <ul class="d-block">
                                                <li><a href="{{Url('/')}}">Home</a></li>
                                                <li class="full-mega-menu-position">
                                                    <a class="dp-menu" href="javascript:void(0);">e-Dental</a>
                                                     <ul class="mega-menu  pt-20 pb-20 pl-30 pr-30">
                                                         @foreach($categories as $list)
                                                        <li><a href="{{Url('category/product/'.$list->id)}}">{{$list->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li><a class="dp-menu" href="javascript:void(0);">e-Medical</a>
                                                    <ul class="mega-menu mega-dropdown-menu pt-20 pb-20 pl-30 pr-30">
                                                        @foreach($categories_menu as $list)
                                                        <li><a href="{{Url('category/product/'.$list->id)}}">{{$list->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <!--<li><a href="{{Url('about-us')}}">ABOUT</a></li>-->
                                                <li>
                                                    <a class="mr-0" href="{{Url('contact-us')}}">Contact</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-3  col-lg-3 col-md-11 col-sm-12 col-12">
                                    <div class="header-bottom-right d-flex align-items-center justify-content-end">
                                        <!--<ul class="track-order pr-20 position-relative d-none d-xl-inline-block">-->
                                        <!--    <li>-->
                                        <!--        <a href="#">Order</a>-->
                                        <!--    </li>-->
                                        <!--</ul>-->
                                        <!--<ul class="free-order d-block pl-20 pr-20 position-relative">-->
                                        <!--    <li>-->
                                        <!--        <a href="#">FAQs</a>-->
                                        <!--    </li>-->
                                        <!--</ul>-->
                                        <!--<ul class="news-letter pl-20 position-relative">-->
                                        <!--    <li class="position-relative">-->
                                        <!--        <a class="newsletter-tootle" href="#">Newsletter</a>-->
                                        <!--    </li>-->
                                        <!--    <li class="subscribe-form-area white-bg border-t-gray1 position-absolute subscribe-form-area1 pt-30 pl-25 pr-25 pb-30">-->
                                        <!--        <h5 class="title position-relative d-inline-block font500 light-black-color2 mb-20 hvr">Join Our Newsletter</h5>-->
                                        <!--        <form action="#">-->
                                        <!--            <div class="">-->
                                        <!--                <div class="subscribe-info position-relative mb-15 w-100">-->
                                        <!--                    <input class="sub-name form-control border-0 pl-35 h2-theme-color light-theme-bg w-100" type="email" name="name" id="sub-name" placeholder="Enter Your Email Address">-->
                                        <!--                </div>-->
                                        <!--                <div class="subscribe-btn">-->
                                        <!--                    <div class="d-inline-block">-->
                                        <!--                        <a href="#" class="web-btn h2-web-btn h2-theme-border1 d-inline-block text-capitalize white h2-theme-bg position-relative over-hidden pl-35 pr-35 ptb-12">Subscribe</a>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="save-info d-flex align-items-start mb-15 mt-18">-->
                                        <!--                <input class="p-0 mr-10" type="checkbox" aria-label="Checkbox for following text input">-->
                                        <!--                <p class="mb-0 cursor-pinter light-black-color7">-->
                                        <!--                    Accept-->
                                        <!--                    <a class="light-black-color7 line-height-1" href="{{Url('terms-and-condition')}}">Terms & Conditions</a>-->
                                        <!--                    and-->
                                        <!--                    <a class="light-black-color7 line-height-1" href="{{Url('privacy')}}">Privacy Policy</a>-->
                                        <!--                </p>-->
                                        <!--            </div>-->
                                        <!--        </form>-->
                                        <!--    </li>-->
                                        <!--</ul>-->
                                        <!--<div class="d-block d-lg-none">-->
                                        <!--    <a class="mobile-menubar pt-0 ml-20 hvr2" href="javascript:void(0);"><span class="icon-menu"></span></a>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    
       <div class="mobile-menu-area pt-30 pb-30 d-lg-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <a href="{{Url('/')}}">
                        <div class="logo">
                            <img src="{{asset('images/logos.png')}}" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-6 ">
                    <button class="mobile-menubar bar-style">
                        <i class="fal fa-bars"></i>
                    </button>
                    <ul class="h-shop position-relative pl-25 d-md-block float-end pr-10">
                        <li class="position-relative">
                            <ul class="header-cart-wrapper d-flex align-items-center">
                                <li class="header-shopping-cart cart-item position-relative">
                                    <span class="" data-toggle="tooltip" data-selector="true" data-placement="bottom" title="Add to cart"><i class="fal fa-shopping-bag"></i></span>
                                    <span class="s-count position-absolute h2-theme-bg text-white text-center">0</span>
                                </li>
                            </ul>
                            
                            <div class="header-shopping-cart-details border-t-gray1 mt-1 position-absolute bg-white pl-30 pr-30 pt-35 pb-60">
                            <!--<div class="h-shop-cart-contetn pt-20 over-x-hidden over-y-scroll">-->
                            <!--    <h5 class="mb-30 font500 position-relative hvr2">Your Cart</h5>-->
                            <!--    <p>No products in the cart.</p>-->
                            <!--</div>-->
                            <div class="d-sm-flex justify-content-between">
                                <a data-animation="fadeInUp" data-delay="1.7s" href="{{Url('cart')}}" class="web-btn h2-web-btn mt-25 d-inline-block text-uppercase white h2-theme-bg position-relative over-hidden pl-30 pr-30 ptb-12 line-height-1 font12">view cart</a>
                                <!--<a data-animation="fadeInUp" data-delay="1.7s" href="{{Url('checkout-page')}}" class="web-btn h2-web-btn mt-25 d-inline-block text-uppercase white h2-theme-bg position-relative over-hidden pl-30 pr-30 ptb-12 line-height-1 font12">checkout</a>-->
                            </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
   
        <div class="side-mobile-menu bg-white pt-20 pb-30 pl-40 pr-40 pb-100 hm2">
            <div class="close-icon d-flex justify-content-end mt-0">
                <a class="close-menu d-block" href="javascript:void(0);"><span class="icon-clear"></span></a>
            </div>

            <div class="header-search-content position-relative d-block d-xl-none mt-20">
                <form action="#" class="position-relative">
                    <input class="form-control rounded-0 h5-theme-color px-0" type="text" placeholder="Enter Keyword...">
                    <a class="position-absolute primary-color d-block" href="#"><span class="icon-search"></span></a>
                </form>
            </div>
            <div class="mobile-menu mt-10"></div>
            <div class="menu-login pt-10 d-block d-md-none">
                <ul class="header-login d-flex justify-content-between mobile-border-b ">
                    <li><a href="login.html">My Account</a></li>
                    <li><a href="login.html"><span><i class="far fa-user-circle"></i></span></a></li>
                </ul>
              
            </div>


            <!--<h6 class="light-black-color2 font600 mt-30 pb-1 border-primary-b d-inline-block">Contact us</h6>-->
            <!--<ul class="contact-add mt-20">-->
            <!--    <li class="mb-15 primary-color">-->
            <!--        <span class="pr-1"><i class="fas fa-map-marker-alt"></i></span> -->
            <!--        PO Box 16122 Collins Street Victoria 8007 Australia-->
            <!--    </li>-->
            <!--    <li class="mb-20 primary-color">-->
            <!--        <span class="pr-1"><i class="far fa-envelope"></i></span> -->
            <!--        contact@example.com-->
            <!--    </li>-->
            <!--    <li class="mb-15">-->
            <!--        <a class=" primary-color" href="tell:+01500123994"><span class="pr-1"><i class="fas fa-phone"></i></span> +01 500 123 994</a>-->
            <!--    </li>-->
            <!--</ul>-->
            <!--<ul class="social-link pt-2 mb-150">-->
            <!--    <li class="d-inline-block">-->
            <!--        <a class="active  primary-color-center pr-0 d-inline-block transition-3" href="#"><i class="fab fa-facebook-f"></i></a>-->
            <!--    </li>-->
            <!--    <li class="d-inline-block">-->
            <!--        <a class=" primary-color text-center pr-0 d-inline-block transition-3" href="#"><i class="fab fa-twitter"></i></a>-->
            <!--    </li>-->
            <!--    <li class="d-inline-block">-->
            <!--        <a class=" primary-color text-center pr-0 d-inline-block transition-3" href="#"><i class="fab fa-instagram"></i></a>-->
            <!--    </li>-->
            <!--    <li class="d-inline-block">-->
            <!--        <a class=" primary-color text-center pr-0 d-inline-block transition-3" href="#"><i class="fab fa-linkedin"></i></a>-->
            <!--    </li>-->
              
            <!--</ul>-->
        </div>
        <div class="body-overlay"></div>
   