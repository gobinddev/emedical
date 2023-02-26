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
      <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
      <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
      <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
      <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
      <link href="{{asset('assets/revolution/css/settings.css')}}" rel="stylesheet">
      <link href="{{asset('assets/revolution/css/navigation.css')}}" rel="stylesheet">
      <link href="{{asset('assets/revolution/custom-setting.css')}}" rel="stylesheet">
      <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="{{asset('assets/js/vendor/jquery.min.js')}}"></script>
   </head>
   <body>
      <header id="headersticky" class="">
         <div class="headerTop" style="padding:2px 0px 7px 0px">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="col-right" style="">
                 <div class="header__top">
      
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
                           <img src="assets/img/drop.png">
                        </div> -->
                     </div>
                     <div class="header__top__left">
                        <ul class="topbarul">
                        <li><a href="">Franchise</a></li>
                        <li><a href="">Rent</a></li>
                        <li><a href="">Buy now</a></li>
                     <li><a href="">Academy</a></li>
                     <li><a href="">Community</a></li> 
                     <li><a href="">Link</a></li> 
                      <li><a href="">Insight and Contribute</a></li>
                        </ul>
                     </div>
              
         </div>
                     </div>
                     <div class="headertoprt">
                        <div class="mobilemenutrigger"><a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a></div>
                        <ul class="topfollowWrap">
                           <li><a target="_blank" href=""><i class="fa fa-youtube-play"></i></a></li>
                           <li><a target="_blank" href=""><i class="fa fa-linkedin"></i></a></li>
                           <li><a target="_blank" href=""><i class="fa fa-facebook"></i></a></li>
                        </ul>
                        <section class="topSearchwrap">
                           <div class="search-sec">
                              <form method="GET" action="#" data-hs-cf-bound="true">
                                 <div class="hide-textbox">
                                    <input type="text" name="s" value="" placeholder="Search" id="websearch">
                                 </div>
                                 
                              </form>
                           </div>
                           <div style="display:none;" class="globicon"><a href="#"><i class="fa fa-globe"></i></a></div>
                           <div class="selectLanguagewrap country">
                              <select name="country" class="changecountry">
                                 <option value="">Country</option>
                                 <option value="">Bangladesh</option>
                                 <option value="">Brazil</option>
                                 <option value="">China</option>
                                 <option value="">India</option>
                                 <option value="">Korea</option>
                                 <option value="">Malaysia</option>
                                 <option value="">Nigeria</option>
                           
                                 <option value="">USA</option>
                              </select>
                              <script>
                                 jQuery(document).ready(function($){
                                 $(".changecountry").on('change', function() {
                                 var redirectURL = $(this).val();
                                 location.href=redirectURL;
                                 });
                                 });
                                 
                              </script>
                           </div>
                        </section>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="header header-without-topbar header-sticky">
    <div class="header-bottom pt-md-40 pb-md-40 pt-sm-40 pb-sm-40">
      <div class="container">
        <div class="header-bottom-container">
          <div class="logo-with-offcanvas d-flex">
            <div class="logo">
              <a href="{{url('/')}}">
                <img src="{{asset('assets/img/logo.png')}}" class="img-fluid" alt="">
              </a>
            </div>
          </div>
          <div class="header-bottom-navigation">
            
            <div class="nevbar">
  <div class="site-main-nav d-none d-lg-block">
              <nav class="site-nav center-menu">
                <ul>
                  <li class="menu-item-has-children"><a href="#">Chemical</a>
                    <ul class="sub-menu mega-menu mega-menu-column-5">
                      <li><a href="javascript:void(0)" class="mega-column-title">Home Group</a>
                        <ul class="mega-sub-menu">
                      <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li><a href="javascript:void(0)" class="mega-column-title">Parts</a>
                        <ul class="mega-sub-menu">
                          <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li><a href="javascript:void(0)" class="mega-column-title">shopse</a>
                        <ul class="mega-sub-menu">
                          <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li><a href="javascript:void(0)" class="mega-column-title">shop1</a>
                        <ul class="mega-sub-menu">
                          <li><a href="#">Creative</a><img src="{{asset('assets/images/home-preview/17.png')}}" class="img-fluid" alt=""></li>
                        </ul>
                      </li>
                      <li>
                        <div class="menu-image">
                          <img src="{{asset('assets/img/product10.png')}}" class="img-fluid" alt="">
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-item-has-children"><a href="#">Parts</a>
                    <ul class="sub-menu mega-menu mega-menu-column-4">
                      <li><a href="javascript:void(0)" class="mega-column-title">Shop Pages</a>
                        <ul class="mega-sub-menu">
                     <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li><a href="javascript:void(0)" class="mega-column-title">Shop Pages</a>
                        <ul class="mega-sub-menu">
                          <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li><a href="javascript:void(0)" class="mega-column-title">Shop Pages</a>
                        <ul class="mega-sub-menu">
                       <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li>
                        <div class="menu-image">
                          <img src="{{asset('assets/img/product8.png')}}" class="img-fluid" alt="">
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-item-has-children"><a href="javascript:void(0)">Plastics &amp; Adhesive</a>
                    <ul class="sub-menu mega-menu mega-menu-column-5">
                      <li><a href="javascript:void(0)" class="mega-column-title">Shop / Products</a>
                        <ul class="mega-sub-menu">
                          <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li><a href="javascript:void(0)" class="mega-column-title">Shop / Products</a>
                        <ul class="mega-sub-menu">
                       <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li><a href="javascript:void(0)" class="mega-column-title">Theming</a>
                        <ul class="mega-sub-menu">
                          <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li><a href="javascript:void(0)" class="mega-column-title">Theming</a>
                        <ul class="mega-sub-menu">
                           <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li>
                        <div class="menu-image">
                          <img src="{{asset('assets/img/product9.png')}}" class="img-fluid" alt="">
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-item-has-children"><a href="javascript:void(0)">Safety &amp; ppe</a>
                    <ul class="sub-menu single-column-menu">
                      <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                    </ul>
                  </li>
                       
                  
                  <li class="menu-item-has-children "><a href="javascript:void(0)">Tools &amp; Supply </a>
                    <ul class="sub-menu single-column-menu single-column-has-children">
                      <li><a href="#">Lorem Ipsum</a>
                        <ul class="multilevel-submenu">
                         <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
               
                        </ul>
                      </li>
                      <li><a href="#">Greener Solutions</a>
                        <ul class="multilevel-submenu">
                             <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Greener Solutions</a>
                        <ul class="multilevel-submenu">
                          <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Solvents</a>
                        <ul class="multilevel-submenu">
                            <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Coatings</a>
                        <ul class="multilevel-submenu">
                   <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Ipsum Layout</a>
                        <ul class="multilevel-submenu">
                         <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
             <li><a href="">Brands</a></li>
                  <li><a href="">Promotions</a></li>
                 <!--  <li><a href="">Services</a></li> 
                  <li><a href="">Support</a></li> -->
                </ul>
              </nav>
            </div>
</div>
          </div>

          <div class="header-right-container">
            <div class="header-right-icons d-flex justify-content-end align-items-center h-100">
    
              <div class="single-icon search">
                <a href="javascript:void(0)" id="search-icon">
                  <i class="ion-ios-search-strong"></i>
                </a>
              </div>

              <div class="single-icon user-login">
                <a href="#">
                  <i class="ion-android-person"></i>
                </a>
              </div>

              <div class="single-icon wishlist">
                <a href="javascript:void(0)" id="offcanvas-wishlist-icon">
                  <i class="ion-android-favorite-outline"></i>
                  <span class="count">2</span>
                </a>
              </div>

              <div class="single-icon cart">
                <a href="javascript:void(0)" id="offcanvas-cart-icon">
                  <i class="ion-ios-cart"></i>
                  <span class="count">3</span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="site-mobile-navigation d-block d-lg-none">
          <div id="dl-menu" class="dl-menuwrapper site-mobile-nav">
            <button class="dl-trigger hamburger hamburger--spin">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
            <ul class="dl-menu dl-menu-toggle">
              <li class=""><a href="#">Home</a>
                <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                  <li class=""> <a href="#">Section One</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
         <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                    </ul>
                  </li>
                  <li> <a href="#">Home Group Two</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
               <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                    </ul>
                  </li>
                  <li> <a href="#">Home Group three</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                    <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                    </ul>
                  </li>
                  <li> <a href="#">Home Group four</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li><a href="#">Shop</a>
                <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                  <li class=""> <a href="#">Shop Pages</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                    <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                    </ul>
                  </li>
                  <li class=""> <a href="#">Product Details Pages</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
             <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>


                    </ul>
                  </li>
                  <li class=""> <a href="#">Other Shop Pages</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
    <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>

                    </ul>
                  </li>


                </ul>
              </li>
              <li><a href="#">Elements</a>
                <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                  <li class=""> <a href="#">Shop / Products</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                     <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                    </ul>
                  </li>
                  <li class=""> <a href="#">Shop / Products</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
     <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                    </ul>
                  </li>
                  <li class=""> <a href="#">Theming</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                      <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>

                    </ul>
                  </li>


                </ul>
              </li>
              <li><a href="#">Tool</a>
                <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                  <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                </ul>
              </li>
              <li><a href="#">Blog</a>
                <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                  <li><a href="#">Normal Layout</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                   <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Ipsum Layout</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                      <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
               
                    </ul>
                  </li>
                  <li><a href="#">Lorm Layout</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                    <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
      
                    </ul>
                  </li>
                  <li><a href="#">Masonry Layout</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
               
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Ipsum</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                  <li><a href="#">Greener Solutions</a></li>
                 <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Solvents</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Lorem</a>
                    <ul class="dl-submenu"><li class="dl-back"><a href="#">Back</a></li>
                   <li><a href="#"> Disinfectants </a></li>
                   <li><a href="#">Coatings &amp; Sealers</a></li>
                   <li><a href="#">Encapsulants</a></li>
               
                   </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div> -->

        <!-- Mobile Navigation End Here -->


      </div>
    </div>


  </div>
      </header>
      <!-- <div class="tabHolder">
         <div class="container">
            <ul class="pagetabbing">
               <li class="tabpageloop">
                  <a href="" class="active">
                  <span>Newsletters</span>
                  </a>
               </li>
               <li class="tabpageloop">
                  <a href="" class="no-active">
                  <span><span>Product </span> Brochures </span>
                  </a>
               </li>
               <li class="tabpageloop">
                  <a href="" class="no-active">
                  <span><span>Technical</span> Specifications</span>
                  </a>
               </li>
               <li class="tabpageloop">
                  <a href="" class="no-active">
                  <span><span>Engineering </span> Manuals</span>
                  </a>
               </li>
               <li class="tabpageloop">
                  <a href="" class="no-active">
                  <span><span>Case</span> Studies</span>
                  </a>
               </li>
               <li class="tabpageloop">
                  <a href="" class="no-active">
                  <span><span>Technical</span> Articles</span>
                  </a>
               </li>
               <li class="tabpageloop">
                  <a href="" class="no-active">
                  <span>Videos</span>
                  </a>
               </li>
            </ul>
         </div>
      </div> -->