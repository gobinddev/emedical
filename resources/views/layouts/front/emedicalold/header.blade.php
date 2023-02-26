<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-medical</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="rel" href="{{asset('assets/img/favicon.png')}}"> 
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/themify-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/helper.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/main.css?ver=0.1')}}" rel="stylesheet">
  <link href="{{asset('assets/css/style3.css?ver=0.1')}}" rel="stylesheet">
   <link href="{{asset('assets/css/menu.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/revolution/css/settings.css')}}" rel="stylesheet">
  <link href="{{asset('assets/revolution/css/navigation.css')}}" rel="stylesheet">
  <link href="{{asset('assets/revolution/custom-setting.css')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
 <!-- jQuery JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="{{asset('assets/js/vendor/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>

</head>
<style>
   .header__cart ul li{
      width: 20%;

   }
   .wishlist a i.ion-android-favorite,.wishlist-icon a i.ion-android-favorite{
      color: red;
   }
   .disabled-link{
      pointer-events: none;
   }
   .cursor-pointer{
      cursor:pointer;
   }
   .header-sticky.is-sticky{
      z-index: 9999 !important;
   }
   .modal{
      z-index: 99999;
   }

   #searchList ul li a:hover{
       color: #0056b3;
   }
   .compare-table .table tbody tr td.product-image-title .image img{
       max-height: 300px;
   }
   .font-18{
       font-size: 18px;
   }
   </style>
<body>

@php
    use App\Helpers\Helper;
    //use Darryldecode\Cart\Cart;
    use App\Wishlist;

    $brands = Helper::get_brands();

    $categories = Helper::get_categories();

    $categories_menu = Helper::get_categories_menu();
@endphp

   <header id="headersticky" class="">
         <div class="headerTop">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="col-right" style="">
                 <div class="header__top">


                     <div class="header__top__left">
                        <ul class="topbarul">
                        <li><a href="{{url('/franchise')}}">Franchise</a></li>
                        <li><a href="{{url('/rent')}}">Rent</a></li>
                        {{-- <li><a href="">Buy now</a></li> --}}
                     <li><a href="{{route('customer.academy')}}">Academy</a></li>
                     <li ><a href="{{route('customer.community')}}">Community</a>

                     </li>

                        </ul>
                     </div>

         </div>
                     </div>
                     <div class="headertoprt">

                          <div class="header__top__right">
                        <div class="header__top__right__language">
                           <img src="{{asset('assets/img/language.png')}}" alt="">
                           <div>English</div>
                           <span class="arrow_carrot-down"></span>
                           <ul>
                              <li><a href="#">Spanish</a></li>
                              <li><a href="#">English</a></li>
                           </ul>
                        </div>
                       <!--  <div class="scope">
                           <img src="{{asset('assets/img/drop.png')}}">
                        </div> -->
                     </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="header header-without-topbar header-sticky">
    <div class="header-bottom pt-md-40 pb-md-40 pt-sm-40 pb-sm-40">
      <div class="container">
            <div class="row">
               <div class="col-lg-2">
                  <div class="header__logo">
                     <a href="{{url('/')}}"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
                  </div>
               </div>
               <div class="col-lg-7">
                  <div class="sde">
                     <div class="hero__search">
                        <div class="hero__search__form">
                            <select name="category" class="s-category">
                                <option value="" selected="selected">All Category</option>
                                @if(count($categories)>0)
                                    @foreach($categories as $item)
                                        <option value="{{$item->id}}">{{ucwords($item->name)}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <form method="get" action="" id="search_frm">
                                <input type="hidden" name="p_id" class="p_id">
                                <input type="text" name="search" class="search" id="search-product" placeholder="Search Product Here">
                                <div id="searchList" style="max-height: 300px; overflow-y:scroll;">
                                </div>
                                <button type="submit" class="site-btn"><i class="fa fa-search"></i></button>
                            </form>

                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 pdn">
                  <div class="header__cart">
                     <ul>
                       <li>
                           @php
                               $compare_session = 0;
                               if(session()->exists('compareids'))
                               {
                                   $compare_session = count(session()->get('compareids'));
                               }
                           @endphp
                           <a href="{{url('/compare')}}">
                                <i class="fa fa-retweet" aria-hidden="true"></i><span class="compare_cnt">{{$compare_session}}</span><p>Compare</p>
                           </a>
                        <li>
                           <a href="{{url('/wishlist')}}">
                              <div class="hero__search__phone__icon">
                                 <i class="fa fa-heart"></i>
                                 @auth('customer')
                                    @php
                                       $user_id = Auth::guard('customer')->user()->id;
                                       $wish_content = Wishlist::where('user_id',$user_id)->count();
                                    @endphp
                                    <span class="wish_cnt">{{$wish_content}}</span><p>Wishlist</p>
                                 @else
                                    <span>0</span><p>Wishlist</p>
                                 @endif
                              </div>
                           </a>
                        </li>
                        <li><a href="{{url('/cart')}}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                              @auth('customer')
                                 @php
                                    $user_id = Auth::guard('customer')->user()->id;
                                    $cart_content = \Cart::session($user_id)->getContent()->count();
                                 @endphp
                                 <span>{{$cart_content}}</span><p>Cart</p>
                              @else
                                 <span>0</span><p>Cart</p>
                              @endif</a>
                        </li>
                        @auth('customer')
                           <li class="pt-1"><a href="{{url('/myaccount')}}"><i class="fa fa-user" style="font-size: 24px;"></i><p></p></a></li>
                        @else
                           <li class="pt-1"><a href="{{url('/login')}}"><i class="fa fa-user" style="font-size: 24px;"></i><p></p></a></li>
                        @endif
                     </ul>
                  </div>
               </div>

            </div>
            <div class="humberger__open">
               <i class="fa fa-bars"></i>
            </div>
         </div>
    </div>


  </div>
      </header>


      <section class="secheader">
         <div class="container">
            <div class="row">
               <div class="col-lg-2">
                  <div class="hero__categories">
                     <div class="hero__categories__all">

                        <span>All Brand</span>
                     </div>
                     <ul style="display: none;">

                        <!-- <li><a href="#">Icycooling</a></li>
                        <li><a href="#">Alorair</a></li>
                        <li><a href="#">Abestorm</a></li>
                        <li><a href="#">Coairo</a></li>
                        <li><a href="#">PureAiro</a></li>
                        <li><a href="#">Unipdry</a></li>
                        <li><a href="#">Base aire</a></li> -->
                        @foreach($brands as $item)
                           <li><a href="{{url('brand-promotion',['id'=>Crypt::encryptString($item->id)])}}">{{$item->name}}</a></li>
                        @endforeach


                     </ul>
                  </div>
               </div>
               <div class="col-lg-10 pdn">
                  <nav class="header__menu">

                     <div class="ruby-menu-demo-header">
                        <div class="ruby-wrapper">
                           <button class="c-hamburger c-hamburger--htx visible-xs">
                           <span>toggle menu</span>
                           </button>
                           <ul class="ruby-menu">
                              {{-- @if(count($categories)>0)
                                 <li>
                                    <a href="#">Shop</a>
                                    <ul class="">
                                    @foreach($categories as $item)
                                       <li><a href="{{url('/product/?category_id='.Crypt::encryptString($item->id))}}">{{$item->name}}</a></li>
                                    @endforeach
                                    </ul>
                                 </li>
                              @endif --}}
                              {{-- <li class=""><a href="{{url('/about_us')}}">About Us</a></li>
                              <li class=""><a href="{{url('/contactus')}}">Contact Us</a></li>
                              <li class=""><a href="{{route('customer.blog')}}">Blog</a></li> --}}

                              @if(count($categories_menu)>0)
                                 @foreach ($categories_menu as $item)
                                    @php
                                        $sub_categories = Helper::getSubCategories($item->id);
                                    @endphp
                                    <li class="ruby-menu-mega">
                                        <a href="{{url('/product/?category_id='.Crypt::encryptString($item->id))}}">{{$item->name}}</a>
                                        @if(count($sub_categories)>0)
                                            <div style="height:375px;" class="">
                                                <ul>
                                                    <li class="ruby-active-menu-item">
                                                        <div class="ruby-grid ruby-grid-lined">
                                                            <div class="ruby-row">
                                                                @foreach ($sub_categories as $sub_item)
                                                                    <div class="ruby-col-3">
                                                                        <a href="{{url('/product/?category_id='.Crypt::encryptString($sub_item->id))}}">
                                                                            <h3 class="ruby-list-heading">{{$sub_item->name}}</h3>
                                                                            <hr>
                                                                        </a>
                                                                        @php
                                                                            $sub_sub_categories = Helper::getSubCategories($sub_item->id);
                                                                        @endphp
                                                                        @if(count($sub_sub_categories)>0)
                                                                            <ul>
                                                                                @foreach ($sub_sub_categories as $sub_sub_item)
                                                                                    <li>
                                                                                        <a href="{{url('/product/?category_id='.Crypt::encryptString($sub_sub_item->id))}}">
                                                                                            {{$sub_sub_item->name}}
                                                                                        </a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                                @if(count($sub_categories)<=2)
                                                                    <div class="ruby-col-6">
                                                                        <div class="groupimage">
                                                                            <div class="row">
                                                                                <div class="ruby-col-6">
                                                                                <div class="rightsome">
                                                                                    <img src="assets/img/cooltech2.png">
                                                                                </div>
                                                                                </div>
                                                                                <div class="ruby-col-6">
                                                                                <div class="rightsome">
                                                                                    <img src="assets/img/cooltech3.png">
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="ruby-col-6">
                                                                                <div class="rightsome">
                                                                                    <img src="assets/img/cooltech1.png">
                                                                                </div>
                                                                                </div>
                                                                                <div class="ruby-col-6">
                                                                                <div class="rightsome">
                                                                                    <img src="assets/img/cooltech2.png">
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <span class="ruby-dropdown-toggle"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <span class="ruby-dropdown-toggle"></span>
                                        @endif
                                    </li>
                                 @endforeach
                              @endif
                           </ul>
                        </div>
                     </div>
                  </nav>
               </div>

            </div>
         </div>
      </section>


