<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Toovem</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset('assets/images/favicon.png')}}">
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/themify-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/helper.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/main.css?ver=0.1')}}" rel="stylesheet"> 
  <link href="{{asset('assets/css/style1.css?ver=0.1')}}" rel="stylesheet">
   <link href="{{asset('assets/css/menu.css')}}" rel="stylesheet"> 
   <link href="{{asset('assets/css/nice-select.css')}}" rel="stylesheet"> 
  <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/revolution/css/settings.css')}}" rel="stylesheet">
  <link href="{{asset('assets/revolution/css/navigation.css')}}" rel="stylesheet">
  <link href="{{asset('assets/revolution/custom-setting.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/bootstrap-tagsinput.css')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
 <!-- jQuery JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="{{asset('assets/js/vendor/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
  
  
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
   </style>
<body>

      @php
         use App\Helpers\Helper;
         //use Darryldecode\Cart\Cart;
         use App\Wishlist;

         $brands = Helper::get_brands();

         $categories = Helper::get_categories();
      @endphp
   
      <!-- Humberger End -->
      <!-- Header Section Begin -->
      <header class="header">
         <div class="header__top">
            <div class="container" style="width: 100%;">
               <div class="row">
                  <div class="col-lg-9 col-md-9">
                     <div class="header__top__left">
                        <ul class="topbarul">
           
                           <li><a href=""><i class="fa fa-map-marker" aria-hidden="true"></i> Track Order</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
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
                        <div class="scope">
                           <img src="{{asset('assets/img/drop.png')}}">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container" style="width:100%;">
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
                           <select style="">
                              <option selected="selected">All Category</option>
                              {{--<option>Solvents</option>
                              <option>Greener</option>
                              <option>Sealers</option> 
                              <option>Encapsulants</option>--}}
                              @if(count($categories)>0)
                                 @foreach($categories as $item)
                                    <option value="{{$item->id}}">{{ucwords($item->name)}}</option>
                                 @endforeach
                              @endif
                           </select>
                           
                           <form action="#">
                              <input type="text" id="productSearch" placeholder="Search Product Here">
                              <button type="submit" class="site-btn"><i class="fa fa-search"></i></button>
                           </form>
                          
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 pdn">
                  <div class="header__cart">
                     <ul>
                       <li><a href="{{url('/compare')}}"><i class="fa fa-retweet" aria-hidden="true"></i><p>Compare</p></a></li>
                        
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
                        <li>
                           <a href="{{url('/cart')}}">
                              <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> 
                              @auth('customer')
                                 @php
                                    $user_id = Auth::guard('customer')->user()->id;
                                    $cart_content = \Cart::session($user_id)->getContent()->count();
                                 @endphp
                                 <span>{{$cart_content}}</span><p>Cart</p>
                              @else
                                 <span>0</span><p>Cart</p>
                              @endif
                           </a>
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
      </header>
      <!-- Header Section End -->
      <section class="secheader">
         <div class="container" style="width:100%;">
            <div class="row">
               <div class="col-lg-3">
                  <div class="hero__categories">
                     <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Brands</span>
                     </div>
                     @if(count($brands)>0)
                     <ul style="display: none;">
                     {{--<li><a href="#">Coatings & Sealers</a></li>
                        <li><a href="#">Encapsulants & Agents</a></li>
                        <li><a href="#">Greener Solutions</a></li>
                        <li><a href="#">Coatings & Sealers</a></li>
                        <li><a href="#">Solvents</a></li>
                        <li><a href="#">Coatings & Sealers</a></li>
                        <li><a href="#">Encapsulants & Agents</a></li>
                        <li><a href="#">Greener Solutions</a></li>
                        <li><a href="#">Coatings & Sealers</a></li>
                        <li><a href="#">Solvents</a></li>
                        <li><a href="#">Greener Solutions</a></li>
                        <li><a href="#">Coatings & Sealers</a></li>--}}
                        @foreach($brands as $item)
                           <li><a href="{{url('/product/?brand_id='.Crypt::encryptString($item->id))}}">{{$item->name}}</a></li>
                        @endforeach

                     </ul>
                     @endif
                  </div>
               </div>
               <div class="col-lg-8 pdn">
                  <nav class="header__menu">
                   
                     <div class="ruby-menu-demo-header">
                        <div class="ruby-wrapper">
                           <button class="c-hamburger c-hamburger--htx visible-xs">
                           <span>toggle menu</span>
                           </button>
                           <ul class="ruby-menu">
                              {{--<li class=""><a href="#">Chemical</a></li>
                              <li>
                                 <a href="#">Parts</a>
                                 <ul class="">
                                    <li><a href="#">Adhesive & Removers</a></li>
                                    <li><a href="#">Paint Removers</a></li>
                                    <li>
                                       <a href="#">Cleaning</a>
                                       <ul>
                                          <li>
                                             <a href="#">Disinfectants</a>
                                             <ul>
                                                <li><a href="#">Coatings & Sealers</a></li>
                                                <li><a href="#">Encapsulants & Agents</a></li>
                                             </ul>
                                             <span class="ruby-dropdown-toggle"></span>
                                          </li>
                                          <li><a href="#">Greener Solutions</a></li> 
                                           <li><a href="#">Antimicrobials</a></li>
                                          <li>
                                             <a href="#">Coatings & Sealers</a>
                                             <ul>
                                                <li><a href="#">Solvents</a></li>
                                                <li><a href="#">Paint Removers</a></li>
                                                <li><a href="#">Antimicrobials</a></li>
                                             </ul>
                                             <span class="ruby-dropdown-toggle"></span>
                                          </li>
                                       </ul>
                                       <span class="ruby-dropdown-toggle"></span>
                                    </li>
                                    <li class="ruby-open-to-left">
                                       <a href="#">Coatings & Sealers</a>
                                       <ul>
                                          <li><a href="#">Wetting Agents</a></li>
                                          <li><a href="#">Greener Solutions</a></li>
                                          <li><a href="#">Coatings & Sealers</a></li>
                                       </ul>
                                       <span class="ruby-dropdown-toggle"></span>
                                    </li>
                                    <li><a href="#">Solvents</a></li>
                                 </ul>
                                 <span class="ruby-dropdown-toggle"></span>
                              </li>
                              <li class="ruby-menu-mega">
                                 <a href="#">Plastics & Adhesive</a>
                                 <div style="height:375px;" class="">
                                    <ul>
                                       <li class="ruby-active-menu-item">
                                          <div class="ruby-grid ruby-grid-lined">
                                             <div class="ruby-row">
                                                <div class="ruby-col-3">
                                                   <h3 class="ruby-list-heading">Lorem</h3>
                                                   <ul>
                                                      <li>
                                                         <a href="#">
                                                            Disinfectants
                                                      <li><a href="#">Coatings & Sealers</a></li>
                                                      <li><a href="#">Encapsulants & Agents</a></li>
                                                      <li><a href="#">Greener Solutions</a></li>
                                                      <li><a href="#">Coatings & Sealers</a></li>
                                                      <li><a href="#">Solvents</a></li>
                                                   </ul>
                                                   <button class="butnmenu">VIEW OUR BRANDS</button>
                                                </div>
                                                <div class="ruby-col-3">
                                                   <h3 class="ruby-list-heading">Ipsum</h3>
                                                   <ul>
                                                      <li>
                                                         <a href="#">
                                                            Disinfectants
                                                      <li><a href="#">Coatings & Sealers</a></li>
                                                      <li><a href="#">Encapsulants & Wetting</a></li>
                                                      <li><a href="#">Greener Solutions</a></li>
                                                      <li><a href="#">Coatings & Sealers</a></li>
                                                      <li><a href="#">Solvents</a></li>
                                                   </ul>
                                                   <button class="butnmenu">VIEW OUR BRANDS</button>
                                                </div>
                                                <div class="ruby-col-6">
                                                   <div class="groupimage">
                                                      <div class="row">
                                                         <div class="ruby-col-6">
                                                            <div class="rightsome">
                                                               <img src="{{asset('assets/img/cooltech2.png')}}">
                                                            </div>
                                                         </div>
                                                         <div class="ruby-col-6">
                                                            <div class="rightsome">
                                                               <img src="{{asset('assets/img/cooltech3.png')}}">
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="ruby-col-6">
                                                            <div class="rightsome">
                                                               <img src="{{asset('assets/img/cooltech1.png')}}">
                                                            </div>
                                                         </div>
                                                         <div class="ruby-col-6">
                                                            <div class="rightsome">
                                                               <img src="{{asset('assets/img/cooltech2.png')}}">
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <span class="ruby-dropdown-toggle"></span>
                                       </li>
                                    </ul>
                                 </div>
                                 <span class="ruby-dropdown-toggle"></span>
                              </li>
                              <li class="ruby-menu-mega-blog">
                              </li>
                              <li class="ruby-menu-mega-shop">
                                 <a href="#">safety & ppe</a>
                                 <div style="height:375px;" class="">
                                    <ul>
                                       <li class="ruby-active-menu-item">
                                          <div class="ruby-grid ruby-grid-lined">
                                             <div class="ruby-row">
                                                <div class="ruby-col-3">
                                                   <h3 class="ruby-list-heading">TOPS</h3>
                                                   <ul>
                                                      <li>
                                                         <a href="#">
                                                            Disinfectants
                                                      <li><a href="#">Coatings & Sealers</a></li>
                                                      <li><a href="#">Encapsulants & Agents</a></li>
                                                      <li><a href="#">Greener Solutions</a></li>
                                                      <li><a href="#">Coatings & Sealers</a></li>
                                                      <li><a href="#">Solvents</a></li>
                                                   </ul>
                                                   <button class="butnmenu">VIEW OUR BRANDS</button>
                                                </div>
                                                <div class="ruby-col-3">
                                                   <h3 class="ruby-list-heading">Brand</h3>
                                                   <ul>
                                                      <li>
                                                         <a href="#">
                                                            Disinfectants
                                                      <li><a href="#">Coatings & Sealers</a></li>
                                                      <li><a href="#">Encapsulants & Wetting</a></li>
                                                      <li><a href="#">Greener Solutions</a></li>
                                                      <li><a href="#">Coatings & Sealers</a></li>
                                                      <li><a href="#">Solvents</a></li>
                                                   </ul>
                                                   <button class="butnmenu">VIEW OUR BRANDS</button>
                                                </div>
                                                <div class="ruby-col-6">
                                                   <div class="groupimage">
                                                      <div class="row">
                                                         <div class="ruby-col-6">
                                                            <div class="rightsome">
                                                               <img src="{{asset('assets/img/cooltech2.png')}}">
                                                            </div>
                                                         </div>
                                                         <div class="ruby-col-6">
                                                            <div class="rightsome">
                                                               <img src="{{asset('assets/img/cooltech3.png')}}">
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="ruby-col-6">
                                                            <div class="rightsome">
                                                               <img src="{{asset('assets/img/cooltech1.png')}}">
                                                            </div>
                                                         </div>
                                                         <div class="ruby-col-6">
                                                            <div class="rightsome">
                                                               <img src="{{asset('assets/img/cooltech2.png')}}">
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <span class="ruby-dropdown-toggle"></span>
                                       </li>
                                    </ul>
                                 </div>
                                 <span class="ruby-dropdown-toggle"></span>
                              </li>
                              <li class="ruby-menu-right">
                                 <a href="#">Tools & Supply</a>
                                 <ul class="">
                                    <li><a href="#">Adhesive & Coating</a></li>
                                    <li><a href="#">Paint Removers</a></li>
                                    <li><a href="#">Cleaning</a></li>
                                    <li class="ruby-open-to-left">
                                       <a href="#">Coatings & Sealers</a>
                                       <ul>
                                          <li><a href="#">Wetting Agents</a></li>
                                          <li><a href="#">Greener Solutions</a></li>
                                          <li><a href="#">Coatings & Sealers</a></li>
                                       </ul>
                                       <span class="ruby-dropdown-toggle"></span>
                                    </li>
                                    <li><a href="#">Solvents</a></li>
                                 </ul>
                                 <span class="ruby-dropdown-toggle"></span>
                              </li>--}}
                              
                              @if(count($categories)>0)
                                 <li>
                                    <a href="#">Shop</a>
                                    <ul class="">
                                    @foreach($categories as $item)
                                       <li><a href="{{url('/product/?category_id='.Crypt::encryptString($item->id))}}">{{$item->name}}</a></li>
                                    @endforeach
                                    </ul>
                                 </li>
                              @endif
                              <li class=""><a href="{{url('/about_us')}}">About Us</a></li>
                              <li class=""><a href="{{url('/contactus')}}">Contact Us</a></li>
                              <li class=""><a href="{{route('customer.community')}}">Community</a></li>
                           </ul>
                        </div>
                     </div>
                  </nav>
               </div>
              
            </div>
         </div>
      </section>


