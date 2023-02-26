@include('layouts.front.header')
@php
   use App\Helpers\Helper;
   use App\Wishlist;
@endphp
<div class="slider-area">
   <div class="container wide">
      <div class="row" style="margin:0px;">
         <div class="col-lg-12 pdn">
            <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="homepage-6"
               data-source="gallery">
               <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
                  <ul>
                     <!-- SLIDE  -->
                     <li data-index="rs-10"
                        data-transition="boxfade,boxslide,parallaxtoright,parallaxtoleft,parallaxtotop,parallaxtobottom,parallaxhorizontal,parallaxvertical"
                        data-slotamount="default,default,default,default,default,default,default,default"
                        data-hideafterloop="0" data-hideslideonmobile="off"
                        data-easein="default,default,default,default,default,default,default,default"
                        data-easeout="default,default,default,default,default,default,default,default"
                        data-masterspeed="700,default,default,default,default,default,default,default"
                        data-thumb="{{asset('assets/img/banner4.jpg')}}"
                        data-rotate="0,0,0,0,0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1=""
                        data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                        data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/img/banner4.jpg')}}" alt=""
                           data-lazyload="{{asset('assets/img/banner4.jpg')}}"
                           data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone"
                           data-scalestart="100" data-scaleend="110" data-rotatestart="0" data-rotateend="0" data-blurstart="0"
                           data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption   tp-resizeme" id="slide-10-layer-3" data-x="['left','center','center','left']"
                           data-hoffset="['372','-209','-85','34']" data-y="['top','middle','middle','top']"
                           data-voffset="['330','0','-127','271']" data-fontsize="['56','56','56','50']" data-width="none"
                           data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                           data-frames='[{"delay":1270,"speed":1750,"sfxcolor":"#ffffff","sfx_effect":"blockfromtop","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 6; white-space: nowrap; font-size: 60px; line-height: 60px; font-weight: 300; color: #fff; letter-spacing: 0px;font-family:Work Sans;">
                           Moisture Extraction Machines  
                        </div>
                        <!-- LAYER NR. 1 -->
                       <div class="tp-caption   tp-resizeme" id="slide-10-layer-13" data-x="['left','center','left','left']"
                           data-hoffset="['376','-301','81','32']" data-y="['top','top','top','top']"
                           data-voffset="['280','305','275','216']"
                           data-color="['#fff','rgb(105,105,105)','rgb(105,105,105)','rgb(105,105,105)']"
                           data-letterspacing="['','','0','0']" data-width="none" data-height="none" data-whitespace="nowrap"
                           data-type="text" data-responsive_offset="on"
                           data-frames='[{"delay":700,"speed":1790,"sfxcolor":"#ffffff","sfx_effect":"blockfromtop","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 5;font-size: 24px; line-height: 36px; font-weight: 400;color:white !important;letter-spacing: 0px;font-family:Work Sans;">               
                           Automatically Turns ON and OFF
                           Prevents.
                        </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption Slider-button-alt rev-btn  tp-resizeme" id="slide-10-layer-20"
                           data-x="['left','center','center','left']" data-hoffset="['377','-358','-233','32']"
                           data-y="['top','top','top','top']" data-voffset="['438','457','427','368']" data-width="none"
                           data-height="none" data-whitespace="nowrap" data-type="button" data-actions=''
                           data-responsive_offset="on"
                           data-frames='[{"delay":1990,"speed":1040,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(51,51,51);bg:transparent;"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,12]"
                           data-paddingright="[35,35,35,35]" data-paddingbottom="[12,12,12,12]"
                           data-paddingleft="[35,35,35,35]"
                           style="z-index: 7; white-space: nowrap; letter-spacing: 1px;border-color:rgba(0,0,0,1);outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                           <a class="revslider-button" href=""> View More</a>
                        </div>
                     </li>
                     <!-- SLIDE  -->
                     <li data-index="rs-11"
                        data-transition="boxslide,slotslide-horizontal,slotslide-vertical,boxfade,slotfade-horizontal,slotfade-vertical"
                        data-slotamount="default,default,default,default,default,default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default,default,default,default,default,default"
                        data-easeout="default,default,default,default,default,default"
                        data-masterspeed="700,default,default,default,default,default"
                        data-thumb="{{asset('assets/img/banner3.jpg')}}"
                        data-rotate="0,0,0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                        data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                        data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/img/dummy.png')}}" alt=""
                           data-lazyload="{{asset('assets/img/banner3.jpg')}}"
                           data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone"
                           data-scalestart="100" data-scaleend="110" data-rotatestart="0" data-rotateend="0" data-blurstart="0"
                           data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption   tp-resizeme" id="slide-11-layer-3" data-x="['left','center','center','left']"
                           data-hoffset="['372','-209','-85','34']" data-y="['top','middle','middle','top']"
                           data-voffset="['330','0','-127','271']" data-fontsize="['56','56','56','50']" data-width="none"
                           data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                           data-frames='[{"delay":700,"speed":2000,"sfxcolor":"#ffffff","sfx_effect":"blockfromright","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 6; white-space: nowrap; font-size: 60px; line-height: 60px; font-weight: 300; color: #fff; letter-spacing: 0px;font-family:Work Sans;">
                           Smart and Quiet Ventilation 
                        </div>
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption   tp-resizeme" id="slide-11-layer-13" data-x="['left','center','left','left']"
                           data-hoffset="['376','-301','81','32']" data-y="['top','top','top','top']"
                           data-voffset="['280','305','275','216']"
                           data-color="['#fff','rgb(105,105,105)','rgb(105,105,105)','rgb(105,105,105)']"
                           data-letterspacing="['','','0','0']" data-width="none" data-height="none" data-whitespace="nowrap"
                           data-type="text" data-responsive_offset="on"
                           data-frames='[{"delay":700,"speed":2020,"sfxcolor":"#ffffff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 5; white-space: nowrap; font-size: 24px; line-height: 36px; font-weight: 400; color: #fff; letter-spacing: 0px;font-family:Work Sans;">
                           <p data-animate="fadeInUp" data-delay="700ms" style="animation-delay: 700ms; opacity: 1;" class="animated fadeInUp">Power-on indicator light.
                              Filter change indicator light. 
                           </p>
                        </div>
                        <!-- LAYER NR. 6 -->
                        <div class="tp-caption Slider-button-alt rev-btn  tp-resizeme" id="slide-11-layer-20"
                           data-x="['left','center','center','left']" data-hoffset="['377','-358','-233','32']"
                           data-y="['top','top','top','top']" data-voffset="['438','457','427','368']" data-width="none"
                           data-height="none" data-whitespace="nowrap" data-type="button" data-actions=''
                           data-responsive_offset="on"
                           data-frames='[{"delay":2130,"speed":1470,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(51,51,51);bg:transparent;"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,12]"
                           data-paddingright="[35,35,35,35]" data-paddingbottom="[12,12,12,12]"
                           data-paddingleft="[35,35,35,35]"
                           style="z-index: 7; white-space: nowrap; letter-spacing: 1px;border-color:rgba(0,0,0,1);outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                           <a class="revslider-button" href=""> SHOP NOW</a>
                        </div>
                     </li>
                     <!-- SLIDE  -->
                     <li data-index="rs-12"
                        data-transition="boxfade,boxslide,parallaxtoright,parallaxtoleft,parallaxtotop,parallaxtobottom,parallaxhorizontal,parallaxvertical"
                        data-slotamount="default,default,default,default,default,default,default,default"
                        data-hideafterloop="0" data-hideslideonmobile="off"
                        data-easein="default,default,default,default,default,default,default,default"
                        data-easeout="default,default,default,default,default,default,default,default"
                        data-masterspeed="700,default,default,default,default,default,default,default"
                        data-thumb="{{asset('assets/img/banner2.jpg')}}"
                        data-rotate="0,0,0,0,0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1=""
                        data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="">
                        <img src="{{asset('assets/img/banner2.jpg')}}" alt=""
                           data-lazyload="{{asset('assets/img/banner2.jpg')}}"
                           data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone"
                           data-scalestart="100" data-scaleend="110" data-rotatestart="0" data-rotateend="0" data-blurstart="0"
                           data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
                        <div class="tp-caption   tp-resizeme" id="slide-12-layer-13"
                           data-x="['center','center','center','center']" data-hoffset="['0','12','0','0']"
                           data-y="['top','top','top','top']" data-voffset="['107','94','151','186']"
                           data-fontsize="['24','24','24','18']"
                           data-color="['rgb(51,51,51)','rgb(105,105,105)','rgb(105,105,105)','rgb(105,105,105)']"
                           data-letterspacing="['','','0','0']" data-width="none" data-height="none" data-whitespace="nowrap"
                           data-type="text" data-responsive_offset="on"
                           data-frames='[{"delay":700,"speed":1300,"sfxcolor":"#ffffff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 5; white-space: nowrap; font-size: 24px; line-height: 36px; font-weight: 400; color: #333333; letter-spacing: 0px;font-family:Work Sans;">
                           Summer sale up to 30% 
                        </div>
                        <div class="tp-caption   tp-resizeme" id="slide-12-layer-3"
                           data-x="['center','center','center','center']" data-hoffset="['0','14','0','0']"
                           data-y="['top','middle','middle','top']" data-voffset="['171','-202','-230','235']"
                           data-fontsize="['56','56','56','40']" data-lineheight="['60','60','60','50']" data-width="none"
                           data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                           data-frames='[{"delay":1540,"speed":1400,"sfxcolor":"#ffffff","sfx_effect":"blockfromright","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 6; white-space: nowrap; font-size: 56px; line-height: 60px; font-weight: 300; color: #333333; letter-spacing: 0px;font-family:Work Sans;">
                           Beautiful interior 
                        </div>
                        <div class="tp-caption Slider-button-alt rev-btn  tp-resizeme" id="slide-12-layer-20"
                           data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                           data-y="['top','top','top','top']" data-voffset="['278','261','345','323']" data-width="none"
                           data-height="none" data-whitespace="nowrap" data-type="button" data-actions=''
                           data-responsive_offset="on"
                           data-frames='[{"delay":2210,"speed":1780,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(51,51,51);bg:transparent;"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,12]"
                           data-paddingright="[35,35,35,35]" data-paddingbottom="[12,12,12,12]"
                           data-paddingleft="[35,35,35,35]"
                           style="z-index: 7; white-space: nowrap; letter-spacing: 1px;border-color:rgba(0,0,0,1);outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                           <a class="revslider-button" href=""> SHOP NOW</a>
                        </div>
                     </li>
                  </ul>
                  <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--=====  End of slider area  ======-->
<section class="shop-services section mbottom">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-md-6 col-12 pdn">
            <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
               <img src="{{asset('assets/img/money-bag.png')}}">
               <div class="contprocs">
                  <h4>Earn Rewards</h4>
                  <p>Get 2% back on qualifying 
                     purchases  - Earning rewards is easy
                  </p>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-12 pdn">
            <div class="single-service  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
               <img src="{{asset('assets/img/free-delivery.png')}}">
               <div class="contprocs">
                  <h4>Free Shipping</h4>
                  <p>On most items.No minimum purchase.</p>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-12 pdn">
            <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
               <img src="{{asset('assets/img/save-time.png')}}">
               <div class="contprocs">
                  <h4>Instant Savings*</h4>
                  <p>Extra offers on top of alreadylow member prices.</p>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-12 pdn">
            <div class="single-service bordernone wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
               <img src="{{asset('assets/img/shopping-online.png')}}">
               <div class="contprocs">
                  <h4>All-Channel Experience</h4>
                  <p>Online shopping, offline experience,</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="hover-banner-area mb-65 mt-65 mb-md-45 mb-sm-45">
   <div class="container ">
      <div class="row">
         <div class="col-md-4 mb-30">
            <div class="single-category single-category--three">
               <div class="single-category__image single-category__image--three single-category__image--three--creativehome single-category__image--three--banner">
                  <img src="{{asset('assets/img/hot1.png')}}" class="img-fluid" alt="">
               </div>
               <div class="single-category__content single-category__content--three single-category__content--three--creativehome  single-category__content--three--banner mt-25 mb-25">
                  <div class="title">
                     <p><a href="">Abatement <span>Water</span></a></p>
                     <a href="">Shop Now</a>
                  </div>
               </div>
               <a href="" class="banner-link"></a>
            </div>
         </div>
         <div class="col-md-4 mb-30">
            <div class="single-category single-category--three">
               <div class="single-category__image single-category__image--three single-category__image--three--creativehome single-category__image--three--banner">
                  <img src="{{asset('assets/img/hot2.png')}}" class="img-fluid" alt="">
               </div>
               <div class="single-category__content single-category__content--three single-category__content--three--creativehome  single-category__content--three--banner mt-25 mb-25">
                  <div class="title">
                     <p><a href="">Abatement <span>Lead</span></a></p>
                     <a href="">Shop Now</a>
                  </div>
               </div>
               <a href="" class="banner-link"></a>
            </div>
         </div>
         <div class="col-md-4 mb-30">
            <div class="single-category single-category--three">
               <div
                  class="single-category__image single-category__image--three single-category__image--three--creativehome single-category__image--three--banner">
                  <img src="{{asset('assets/img/hot3.png')}}" class="img-fluid" alt="">
               </div>
               <div
                  class="single-category__content single-category__content--three single-category__content--three--creativehome  single-category__content--three--banner mt-25 mb-25">
                  <div class="title">
                     <p><a href="">Abatement <span>Basement</span></a></p>
                     <a href="">Shop Now</a>
                  </div>
               </div>
               <a href="" class="banner-link"></a>
            </div>
         </div>
      </div>
   </div>
</div>
<section class="hotproduct">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
               <h2>FOCUSED AREAS OF EXPERTISE</h2>
               <span>Explore, OUR INDUSTRY</span>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="categories__slider owl-carousel">
            <div class="col-lg-3">
               <div class="categories__item set-bg" data-setbg="{{asset('assets/img/area1.png')}}">
                  <h5><a href="#">RESTORATION: <br>WATER,FIRE,MOLD</a></h5>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="categories__item set-bg" data-setbg="{{asset('assets/img/area2.png')}}">
                  <h5><a href="#">ABATEMENT: <br>LEAD & ASBESTOS</a></h5>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="categories__item set-bg" data-setbg="{{asset('assets/img/area3.png')}}">
                  <h5><a href="#">CRAWLSPACE: <br>BASEMENT, PEPAIRS</a></h5>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="categories__item set-bg" data-setbg="{{asset('assets/img/area4.png')}}">
                  <h5><a href="#">DEHUMIDIFICATION: <br>& HUMIDIFICATION</a></h5>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="categories__item set-bg" data-setbg="{{asset('assets/img/area5.png')}}">
                  <h5><a href="#">AUTOMATIC POOL: <br>CLEANER</a></h5>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="categories__item set-bg" data-setbg="{{asset('assets/img/area1.png')}}">
                  <h5><a href="#">RESTORATION: <br>WATER,FIRE,MOLD</a></h5>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="categories__item set-bg" data-setbg="{{asset('assets/img/area2.png')}}">
                  <h5><a href="#">ABATEMENT: <br>LEAD & ASBESTOS</a></h5>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="product-carousel-container mt-90 mb-50 mb-md-30 mb-sm-30">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
               <h2>HOT PRODUCTS</h2>
               <span>DEAL OF THE DAY </span>
            </div>
         </div>
      </div>
      @if(count($hot_products)>0)
      <div class="row">
         <!-- <div class="productmatch mb-45">
            <div class="single-product">
               <div class="single-product__image">
                  <a class="image-wrap" href="">
                  <img src="{{asset('assets/img/toovem1.png')}}" class="img-fluid" alt="">
                  <img src="{{asset('assets/img/toovem1-1.png')}}" class="img-fluid" alt="">
                  </a>
                  <div class="single-product__floating-badges">
                     <span class="onsale">-15%</span>
                  </div>
                  <div class="single-product__floating-icons">
                     <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-android-favorite-outline"></i></a></span>
                     <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-shuffle-strong"></i></a></span>
                     <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                        data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-search-strong"></i></a></span>
                  </div>
               </div>
               <div class="single-product__content">
                  <div class="title">
                     <h3> <a href="">BaseAire 15,000 mg/h Ozone Generator, 0-UVC3 Pro</a></h3>
                     <a href="#">Add to cart</a>
                  </div>
                  <div class="price">
                     <span class="main-price discounted">$400.00</span>
                     <span class="discounted-price">$380.00</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="productmatch mb-45">
            <div class="single-product">
               <div class="single-product__image">
                  <a class="image-wrap" href="">
                  <img src="{{asset('assets/img/toovem2.png')}}" class="img-fluid" alt="">
                  <img src="{{asset('assets/img/toovem2-1.png')}}" class="img-fluid" alt="">
                  </a>
                  <div class="single-product__floating-badges">
                  </div>
                  <div class="single-product__floating-icons">
                     <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-android-favorite-outline"></i></a></span>
                     <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-shuffle-strong"></i></a></span>
                     <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                        data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-search-strong"></i></a></span>
                  </div>
               </div>
               <div class="single-product__content">
                  <div class="title">
                     <h3> <a href="">BaseAire 15,000 mg/h Ozone Generator, 0-UVC3 Pro</a></h3>
                     <a href="#">Add to cart</a>
                  </div>
                  <div class="price">
                     <span class="main-price">$85.00</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="productmatch mb-45">
            <div class="single-product">
               <div class="single-product__image">
                  <a class="image-wrap" href="">
                  <img src="{{asset('assets/img/toovem3.png')}}" class="img-fluid" alt="">
                  <img src="{{asset('assets/img/toovem3-1.png')}}" class="img-fluid" alt="">
                  </a>
                  <div class="single-product__floating-badges">
                     <span class="onsale">-25%</span>
                  </div>
                  <div class="single-product__floating-icons">
                     <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-android-favorite-outline"></i></a></span>
                     <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-shuffle-strong"></i></a></span>
                     <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                        data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-search-strong"></i></a></span>
                  </div>
               </div>
               <div class="single-product__content">
                  <div class="title">
                     <h3> <a href="">BaseAire 15,000 mg/h Ozone Generator, 0-UVC3 Pro</a></h3>
                     <a href="#">Add to cart</a>
                  </div>
                  <div class="price">
                     <span class="main-price discounted">$360.00</span>
                     <span class="discounted-price">$300.00</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="productmatch mb-45">
            <div class="single-product">
               <div class="single-product__image">
                  <a class="image-wrap" href="">
                  <img src="{{asset('assets/img/toovem1.png')}}" class="img-fluid" alt="">
                  <img src="{{asset('assets/img/toovem1-1.png')}}" class="img-fluid" alt="">
                  </a>
                  <div class="single-product__floating-badges">
                     <span class="onsale">-15%</span>
                  </div>
                  <div class="single-product__floating-icons">
                     <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-android-favorite-outline"></i></a></span>
                     <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-shuffle-strong"></i></a></span>
                     <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                        data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-search-strong"></i></a></span>
                  </div>
               </div>
               <div class="single-product__content">
                  <div class="title">
                     <h3> <a href="">BaseAire 15,000 mg/h Ozone Generator, 0-UVC3 Pro</a></h3>
                     <a href="#">Add to cart</a>
                  </div>
                  <div class="price">
                     <span class="main-price discounted">$400.00</span>
                     <span class="discounted-price">$380.00</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="productmatch mb-45">
            <div class="single-product">
               <div class="single-product__image">
                  <a class="image-wrap" href="">
                  <img src="{{asset('assets/img/toovem2.png')}}" class="img-fluid" alt="">
                  <img src="{{asset('assets/img/toovem2-1.png')}}" class="img-fluid" alt="">
                  </a>
                  <div class="single-product__floating-badges">
                  </div>
                  <div class="single-product__floating-icons">
                     <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-android-favorite-outline"></i></a></span>
                     <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-shuffle-strong"></i></a></span>
                     <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                        data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-search-strong"></i></a></span>
                  </div>
               </div>
               <div class="single-product__content">
                  <div class="title">
                     <h3> <a href="">BaseAire 15,000 mg/h Ozone Generator, 0-UVC3 Pro</a></h3>
                     <a href="#">Add to cart</a>
                  </div>
                  <div class="price">
                     <span class="main-price">$85.00</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="productmatch mb-45">
            <div class="single-product">
               <div class="single-product__image">
                  <a class="image-wrap" href="">
                  <img src="{{asset('assets/img/toovem3.png')}}" class="img-fluid" alt="">
                  <img src="{{asset('assets/img/toovem3-1.png')}}" class="img-fluid" alt="">
                  </a>
                  <div class="single-product__floating-badges">
                     <span class="onsale">-25%</span>
                  </div>
                  <div class="single-product__floating-icons">
                     <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-android-favorite-outline"></i></a></span>
                     <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-shuffle-strong"></i></a></span>
                     <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                        data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-search-strong"></i></a></span>
                  </div>
               </div>
               <div class="single-product__content">
                  <div class="title">
                     <h3> <a href="">BaseAire 15,000 mg/h Ozone Generator, 0-UVC3 Pro</a></h3>
                     <a href="#">Add to cart</a>
                  </div>
                  <div class="price">
                     <span class="main-price discounted">$360.00</span>
                     <span class="discounted-price">$300.00</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="productmatch mb-45">
            <div class="single-product">
               <div class="single-product__image">
                  <a class="image-wrap" href="">
                  <img src="{{asset('assets/img/toovem1.png')}}" class="img-fluid" alt="">
                  <img src="{{asset('assets/img/toovem1-1.png')}}" class="img-fluid" alt="">
                  </a>
                  <div class="single-product__floating-badges">
                     <span class="onsale">-15%</span>
                  </div>
                  <div class="single-product__floating-icons">
                     <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-android-favorite-outline"></i></a></span>
                     <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-shuffle-strong"></i></a></span>
                     <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                        data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-search-strong"></i></a></span>
                  </div>
               </div>
               <div class="single-product__content">
                  <div class="title">
                     <h3> <a href="">BaseAire 15,000 mg/h Ozone Generator, 0-UVC3 Pro</a></h3>
                     <a href="#">Add to cart</a>
                  </div>
                  <div class="price">
                     <span class="main-price discounted">$400.00</span>
                     <span class="discounted-price">$380.00</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="productmatch mb-45">
            <div class="single-product">
               <div class="single-product__image">
                  <a class="image-wrap" href="">
                  <img src="{{asset('assets/img/toovem1.png')}}" class="img-fluid" alt="">
                  <img src="{{asset('assets/img/toovem1-1.png')}}" class="img-fluid" alt="">
                  </a>
                  <div class="single-product__floating-badges">
                     <span class="onsale">-15%</span>
                  </div>
                  <div class="single-product__floating-icons">
                     <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-android-favorite-outline"></i></a></span>
                     <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-shuffle-strong"></i></a></span>
                     <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                        data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-search-strong"></i></a></span>
                  </div>
               </div>
               <div class="single-product__content">
                  <div class="title">
                     <h3> <a href="">BaseAire 15,000 mg/h Ozone Generator, 0-UVC3 Pro</a></h3>
                     <a href="#">Add to cart</a>
                  </div>
                  <div class="price">
                     <span class="main-price discounted">$400.00</span>
                     <span class="discounted-price">$380.00</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="productmatch mb-45">
            <div class="single-product">
               <div class="single-product__image">
                  <a class="image-wrap" href="">
                  <img src="{{asset('assets/img/toovem2.png')}}" class="img-fluid" alt="">
                  <img src="{{asset('assets/img/toovem2-1.png')}}" class="img-fluid" alt="">
                  </a>
                  <div class="single-product__floating-badges">
                  </div>
                  <div class="single-product__floating-icons">
                     <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-android-favorite-outline"></i></a></span>
                     <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-shuffle-strong"></i></a></span>
                     <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                        data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-search-strong"></i></a></span>
                  </div>
               </div>
               <div class="single-product__content">
                  <div class="title">
                     <h3> <a href="">BaseAire 15,000 mg/h Ozone Generator, 0-UVC3 Pro</a></h3>
                     <a href="#">Add to cart</a>
                  </div>
                  <div class="price">
                     <span class="main-price">$85.00</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="productmatch mb-45">
            <div class="single-product">
               <div class="single-product__image">
                  <a class="image-wrap" href="">
                  <img src="{{asset('assets/img/toovem3.png')}}" class="img-fluid" alt="">
                  <img src="{{asset('assets/img/toovem3-1.png')}}" class="img-fluid" alt="">
                  </a>
                  <div class="single-product__floating-badges">
                     <span class="onsale">-25%</span>
                  </div>
                  <div class="single-product__floating-icons">
                     <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-android-favorite-outline"></i></a></span>
                     <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                        data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                        data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-shuffle-strong"></i></a></span>
                     <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                        data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                        data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                        class="ion-ios-search-strong"></i></a></span>
                  </div>
               </div>
               <div class="single-product__content">
                  <div class="title">
                     <h3> <a href="">BaseAire 15,000 mg/h Ozone Generator, 0-UVC3 Pro</a></h3>
                     <a href="#">Add to cart</a>
                  </div>
                  <div class="price">
                     <span class="main-price discounted">$360.00</span>
                     <span class="discounted-price">$300.00</span>
                  </div>
               </div>
            </div>
         </div> -->
        
            @foreach($hot_products as $product)
               @php
                  $url = asset('images/no-product.png');
                  $product_t = Helper::get_product_thumbnail_image($product->id);
                  if($product_t!=NULL)
                  {
                     $url = asset('uploads/products/image/'.$product_t->file_name);
                  }
               @endphp
               <div class="productmatch mb-45">
                  <div class="single-product">
                     <div class="single-product__image">
                        <a class="image-wrap" href="{{url('/product-detail',['id'=>Crypt::encryptString($product->id)])}}">
                        <img src="{{$url}}" class="img-fluid" alt="">
                        <img src="{{$url}}" class="img-fluid" alt="">
                        </a>
                        <div class="single-product__floating-badges">
                        </div>
                        <div class="single-product__floating-icons">
                           <span class="wishlist">
                              @auth('customer')
                                 @php
                                    $user_id = Auth::guard('customer')->user()->id;
                                    $wish_item = Wishlist::where(['user_id'=>$user_id,'product_id'=>$product->id])->first();
                                 @endphp
                                 <a href="javascript:void(0)" @if($wish_item==NULL) class="add_wishlist" data-id="{{Crypt::encryptString($product->id)}}" @else class="disabled-link" @endif data-tippy="Add to wishlist" data-tippy-inertia="true"
                                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                    data-tippy-theme="sharpborder" data-tippy-placement="left">
                                    @if($wish_item!=NULL)
                                       <i class="ion-android-favorite"></i>
                                    @else
                                       <i class="ion-android-favorite-outline"></i>
                                    @endif
                                 </a>
                              @else
                                 <a href="javascript:void(0)" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                    data-tippy-theme="sharpborder" data-tippy-placement="left">
                                    <i class="ion-android-favorite-outline"></i>
                                 </a>
                              @endif
                           </span>
                           <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                              data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                              data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                              class="ion-ios-shuffle-strong"></i></a></span>
                           <!-- <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
                              data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                              data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                              class="ion-ios-search-strong"></i></a></span> -->
                        </div>
                     </div>
                     <div class="single-product__content">
                        <div class="title">
                           <h3> <a href="{{url('/product-detail',['id'=>Crypt::encryptString($product->id)])}}">{{$product->product_title}}</a></h3>
                           <a href="{{url('/cart/add',['id'=>Crypt::encryptString($product->id)])}}">Add to cart</a>
                        </div>
                        <div class="price">
                           <span class="main-price discounted">$ {{$product->price}}</span>
                           <span class="discounted-price">$ {{$product->discounted_price}}</span>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
      </div>
      <a href="{{url('/product')}}" class="btn viewall">VIEW ALL</a>
      @endif
   </div>
</div>
<!--   <div class="countdown-timer-area mb-100 mb-md-80 mb-sm-80 countdown-background countdown-bg-4 pt-30 pb-30">
   <div class="container">
     <div class="row">
       <div class="col-lg-12">
         <div class="row align-items-center">
           <div class="col-lg-4 col-xl-5">
             <div class="countdown-image text-center">
               <img src="{{asset('assets/images/countdown/countdown-4.png')}}" class="img-fluid" alt="">
             </div>
           </div>
           <div class=" col-12 col-xl-7 col-lg-8">
             <div class="countdown-wrapper text-center">
               <h3>Deal of the day</h3>
               <div class="deal-countdown" data-countdown="2020/01/01"></div>
               <a href="" class="lezada-button lezada-button--medium lezada-button--icon--left">
                 <i class="icon-left ion-ios-cart"></i> Only $39</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   </div> -->
@php
   $brands = Helper::get_brands();
@endphp
<div  class="lezada-testimonial multi-item-testimonial-area mb-100 mb-md-80 mb-sm-80">
   <div class="area-wrapper black-bg position-relative">
      <div class="container">
         <!-- brand-area -->
         <div class="brand-area pt-120">
            <div class="container">
               <div class="brand-wrap">
                  <div class="row no-gutters justify-content-center">
                     <!-- <div class="brand-item">
                        <img src="{{asset('assets/img/clientlogo1.png')}}" alt="">
                     </div>
                     <div class="brand-item">
                        <img src="{{asset('assets/img/clientlogo2.png')}}" alt="">
                     </div>
                     <div class="brand-item">
                        <img src="{{asset('assets/img/clientlogo3.png')}}" alt="">
                     </div>
                     <div class="brand-item">
                        <img src="{{asset('assets/img/clientlogo4.png')}}" alt="">
                     </div>
                     <div class="brand-item">
                        <img src="{{asset('assets/img/clientlogo5.png')}}" alt="">
                     </div>
                     <div class="brand-item">
                        <img src="{{asset('assets/img/clientlogo6.png')}}" alt="">
                     </div>
                     <div class="brand-item">
                        <img src="{{asset('assets/img/clientlogo7.png')}}" alt="">
                     </div>
                     <div class="brand-item">
                        <img src="{{asset('assets/img/clientlogo1.png')}}" alt="">
                     </div>
                     <div class="brand-item">
                        <img src="{{asset('assets/img/clientlogo2.png')}}" alt="">
                     </div>
                     <div class="brand-item">
                        <img src="{{asset('assets/img/clientlogo3.png')}}" alt="">
                     </div> -->
                     @if(count($brands)>0)
                        @foreach($brands as $brand)
                           <div class="brand-item">
                              <img src="{{asset('uploads/brands/'.$brand->logo)}}" alt="">
                           </div>
                        @endforeach
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <!-- brand-area-end -->
         <!-- testimonial-area -->
         <section class="testimonial-area pt-115">
            <div class="container">
               <div class="testi-wrap">
                  <div class="row">
                     <div class="col-lg-5">
                        <div class="section-title">
                           <h2>Feedback From our clients.</h2>
                        </div>
                        <div class="testi-quote">
                           <img src="{{asset('assets/img/testi_quote01.png')}}" alt="">
                        </div>
                     </div>
                     <div class="col-lg-7">
                        <div class="lezada-slick-slider multi-testimonial-slider-container" data-slick-setting='{
                           "slidesToShow": 1,
                           "arrows": true,
                           "autoplay": false,
                           "autoplaySpeed": 5000,
                           "speed": 1000,
                           "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ti-angle-left" },
                           "nextArrow": {"buttonClass": "slick-next", "iconClass": "ti-angle-right" }
                           }' data-slick-responsive='[
                           {"breakpoint":1501, "settings": {"slidesToShow": 1} },
                           {"breakpoint":1199, "settings": {"slidesToShow": 1} },
                           {"breakpoint":991, "settings": {"slidesToShow": 1, "arrows": false} },
                           {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false} },
                           {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false} },
                           {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                           ]'>
                           <div class="col">
                              <div class="testimonial-item multi-testimonial-single-item">
                                 <div class="multi-testimonial-single-item__text">
                                    I can say your dedication is second to none. I like the fact that you are strongly proud of your work
                                    in every way.
                                 </div>
                                 <div class="multi-testimonial-single-item__author-info">
                                    <div class="image">
                                       <img src="{{asset('assets/img/testi_avatar.png')}}" class="img-fluid" alt="">
                                    </div>
                                    <div class="content">
                                       <p class="name">Sally Ramsey</p>
                                       <span class="designation">/ Reporter</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="testimonial-item multi-testimonial-single-item">
                                 <div class="multi-testimonial-single-item__text">
                                    This has already been my fifth-time purchasing their theme. I have been highly satisfied with their
                                    work.
                                 </div>
                                 <div class="multi-testimonial-single-item__author-info">
                                    <div class="image">
                                       <img src="{{asset('assets/img/testi_avatar.png')}}" class="img-fluid" alt="">
                                    </div>
                                    <div class="content">
                                       <p class="name">Lois Thompson</p>
                                       <span class="designation">/ Actor</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="testimonial-item multi-testimonial-single-item">
                                 <div class="multi-testimonial-single-item__text">
                                    There's nothing would satisfy me much more than a worry-free clean and responsive theme for my
                                    high-traffic site.
                                 </div>
                                 <div class="multi-testimonial-single-item__author-info">
                                    <div class="image">
                                       <img src="{{asset('assets/img/testi_avatar.png')}}" class="img-fluid" alt="">
                                    </div>
                                    <div class="content">
                                       <p class="name">Florence Pittman</p>
                                       <span class="designation">/ Model</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="testimonial-item multi-testimonial-single-item">
                                 <div class="multi-testimonial-single-item__text">
                                    Five-star for good customer support. They have the ability to resolve any issue in less than the time
                                    for a coffee cup.
                                 </div>
                                 <div class="multi-testimonial-single-item__author-info">
                                    <div class="image">
                                       <img src="{{asset('assets/img/testi_avatar.png')}}" class="img-fluid" alt="">
                                    </div>
                                    <div class="content">
                                       <p class="name">Anais Coulon</p>
                                       <span class="designation">/ Model</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="testimonial-small-quote"><img src="{{asset('assets/img/testi_quote02.png')}}" alt=""></div>
               </div>
            </div>
         </section>
         <div class="testi-bg-shape"><img src="{{asset('assets/img/testi_shape.png')}}" class="rotateme" alt=""></div>
      </div>
   </div>
</div>
<div class="small-separator">
   <span></span>
</div>
<div class="cabinet-revslider-area mt-50 mt-md-30 mt-sm-30 mb-0 mb-md-80 mb-sm-80">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div id="rev_slider_6_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container"
               data-alias="banner-cabinet" data-source="gallery"
               style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
               <!-- START REVOLUTION SLIDER 5.4.7 fullwidth mode -->
               <div id="rev_slider_6_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
                  <ul>
                     <!-- SLIDE  -->
                     <li data-index="rs-14" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="470"
                        data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                        data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                        data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('assets/images/revimages/transparent.png')}}" data-bgcolor='#ffffff' style='background:#ffffff'
                           alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                           data-bgparallax="off" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-14-layer-1"
                           data-x="['right','right','right','right']" data-hoffset="['681','0','0','11']"
                           data-y="['top','top','top','top']" data-voffset="['82','70','70','209']"
                           data-width="['560','560','560','320']" data-height="['560','560','560','320']"
                           data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                           data-frames='[{"delay":410,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 5;background-color:rgb(146 84 193 / 23%);border-radius:280px 280px 280px 280px;">
                           <div class="rs-looped rs-pulse" data-easing="" data-speed="5" data-zoomstart="0.8"
                              data-zoomend="1.1"> </div>
                        </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-1" id="slide-14-layer-4"
                           data-x="['left','left','left','left']" data-hoffset="['836','132','84','33']"
                           data-y="['top','top','top','top']" data-voffset="['351','414','464','469']" data-width="none"
                           data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on"
                           data-frames='[{"delay":610,"speed":2170,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 6;"><img src="{{asset('assets/img/doles.png')}}" alt=""
                           data-ww="['788auto','762px','593px','422px']" data-hh="['470px','470px','470px','470px']"
                           data-no-retina style="height: auto !important;"> </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption   tp-resizeme" id="slide-14-layer-5" data-x="['right','right','right','right']"
                           data-hoffset="['480','-41','-32','613']" data-y="['top','top','top','top']"
                           data-voffset="['313','322','302','297']" data-fontsize="['77','70','70','130']"
                           data-lineheight="['80','80','80','130']" data-fontweight="['700','600','600','600']"
                           data-color="['rgb(51,51,51)','rgb(51,51,51)','rgb(51,51,51)','rgb(255,255,255)']" data-width="none"
                           data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                           data-frames='[{"delay":410,"speed":2020,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;rZ:90;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 7; white-space: nowrap; font-size: 77px; line-height: 80px; font-weight: 700; color: #333333; letter-spacing: 0px;font-family:Work Sans;top:-75px;">
                           hd-55 
                        </div>
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme rs-parallaxlevel-1" id="slide-14-layer-6"
                           data-x="['left','left','left','left']" data-hoffset="['1583','794','549','330']"
                           data-y="['top','top','top','top']" data-voffset="['315','406','407','394']" data-width="100"
                           data-height="100" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on"
                           data-frames='[{"delay":800,"speed":1000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 8;background-color:rgb(51,51,51);border-radius:50px 50px 50px 50px;"> </div>
                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-1" id="slide-14-layer-7"
                           data-x="['right','right','right','right']" data-hoffset="['263','156','156','76']"
                           data-y="['middle','middle','middle','middle']" data-voffset="['-49','41','41','29']"
                           data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                           data-responsive_offset="on"
                           data-frames='[{"delay":970,"speed":1400,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 9; white-space: nowrap; font-size: 16px; line-height: 25px; font-weight: 400; color: #ffffff; letter-spacing: 1px;font-family:Work Sans;">
                           ONLY 
                        </div>
                        <!-- LAYER NR. 6 -->
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-1" id="slide-14-layer-8"
                           data-x="['right','right','right','right']" data-hoffset="['265','158','158','80']"
                           data-y="['middle','middle','middle','middle']" data-voffset="['-22','72','72','60']"
                           data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                           data-responsive_offset="on"
                           data-frames='[{"delay":970,"speed":1410,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 10; white-space: nowrap; font-size: 20px; line-height: 25px; font-weight: 700; color: #ffffff; letter-spacing: 1px;font-family:Work Sans;">
                           $39 
                        </div>
                        <!-- LAYER NR. 7 -->
                        <div class="tp-caption   tp-resizeme" id="slide-14-layer-9" data-x="['left','left','left','left']"
                           data-hoffset="['287','93','89','21']" data-y="['top','top','top','top']"
                           data-voffset="['170','73','58','108']" data-width="none" data-height="none" data-whitespace="nowrap"
                           data-type="text" data-responsive_offset="on"
                           data-frames='[{"delay":660,"speed":1280,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 11; white-space: nowrap; font-size: 16px; line-height: 22px; font-weight: 500; color: #333333; letter-spacing: 2px;font-family:Work Sans;">
                           FEATURED PRODUCT 
                        </div>
                        <!-- LAYER NR. 8 -->
                        <div class="tp-caption   tp-resizeme" id="slide-14-layer-10" data-x="['left','left','left','left']"
                           data-hoffset="['281','91','88','21']" data-y="['top','top','top','top']"
                           data-voffset="['208','116','97','142']" data-fontsize="['48','48','48','40']"
                           data-lineheight="['64','64','64','45']" data-width="none" data-height="none"
                           data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                           data-frames='[{"delay":1050,"speed":1230,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 12; white-space: nowrap; font-size: 48px; line-height: 64px; font-weight: 400; color: #333333; letter-spacing: 0px;font-family:Work Sans;">
                           BEST <br>WARRANTY 
                        </div>
                        <!-- LAYER NR. 9 -->
                        <div class="tp-caption   tp-resizeme" id="slide-14-layer-11" data-x="['left','left','left','left']"
                           data-hoffset="['282','90','90','23']" data-y="['top','top','top','top']"
                           data-voffset="['368','283','262','250']" data-fontsize="['15','15','15','14']" data-width="none"
                           data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                           data-frames='[{"delay":1300,"speed":1180,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 13; white-space: nowrap; font-size: 15px; line-height: 26px; font-weight: 400; color: #7e7e7e; letter-spacing: 0.5px;font-family:Work Sans;">
                           Toovem Products specializes in home comfort systems for <br>humid environments with a broad selection of residential<br> dehumidifiers and air purifiers with an industry-best <br>bumper to bumper warranty service.
                        </div>
                        <br>
                        <!-- LAYER NR. 10 -->
                        <div class="tp-caption Slider-button-alt rev-btn " id="slide-14-layer-12"
                           data-x="['left','left','left','left']" data-hoffset="['282','91','89','29']"
                           data-y="['top','top','top','top']" data-voffset="['478','384','364','349']" data-width="none"
                           data-height="none" data-whitespace="nowrap" data-type="button" data-responsive_offset="on"
                           data-responsive="off"
                           data-frames='[{"delay":1580,"speed":1270,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(51,51,51);bg:transparent;"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,12]"
                           data-paddingright="[35,35,35,35]" data-paddingbottom="[12,12,12,12]"
                           data-paddingleft="[35,35,35,35]"
                           style="z-index: 14; white-space: nowrap; letter-spacing: 1px;border-color:rgba(0,0,0,1);outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                           <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                           <a class="revslider-button" href=""> ONLY $39</a>
                        </div>
                     </li>
                  </ul>
                  <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<section class="distbor padding mt-50">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
               <h2>BE OUR DISTRIBUTOR</h2>
               <span>Expand your business </span>
               <p>We are helping U.S. practitioners to establish and develop their businesses</p>
            </div>
         </div>
      </div>
      <div class="distributor">
         <div class="row justify-content-center align-items-center">
            <div class="col-lg-7 col-sm-7">
               <img src="{{asset('assets/img/who.png')}}" style="width:100%;"> 
            </div>
            <div class="col-lg-5 col-sm-5">
               <div class="distributortext">
                  <button class="flex f-sm mb-s play-video md-m-auto">
                  <i class="fa fa-play-circle-o icon-play" aria-hidden="true"></i><span class="bbold">Play Video</span>
                  </button>
                  <br>
                  <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">Toovem is a global online marketplace, where people come together to make, sell, buy, and collect unique items. just millions of people selling the things they love. We make the whole process easy, helping you connect directly with makers to find something extraordinary.</p>
                  <button class="btn oneclick wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">ONE CLICK MAINTAINANCE</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="features-area features-bg pt-120 pb-65">
   <div class="container">
      <div class="row justify-content-center align-items-center">
         <div class="col-lg-6 shoptext">
            <div class="leftbars white-title mb-40 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
               <span>What We do</span>
               <h2>AFTER-SALES SERVICE SYSTEM</h2>
               <p>Every toovem product is backed with a one-click maintenance.</p>
            </div>
            <div class="features-btn wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
               <a href="#" class="joinus ">ONE CLICK MAINTAINANCE</a>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="features-top-content">
               <p>Items Trending in Your Club. Improve your indoor air quality by reducing humidity in wet basements</p>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="features-box mb-50">
                        <div class="features-icon mb-20">
                           <img src="{{asset('assets/img/features_icon01.png')}}" alt="">
                        </div>
                        <div class="features-box-content">
                           <h5>Working 10 Years!</h5>
                           <p>exercise rooms with an American-made dehumidifier for your home</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="features-box mb-50">
                        <div class="features-icon mb-20">
                           <img src="{{asset('assets/img/features_icon02.png')}}" alt="">
                        </div>
                        <div class="features-box-content">
                           <h5>100% Response Rate</h5>
                           <p>Find technology or people for digital projects in public sector.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="features-box mb-50">
                        <div class="features-icon mb-20">
                           <img src="{{asset('assets/img/features_icon03.png')}}" alt="">
                        </div>
                        <div class="features-box-content">
                           <h5>Free Documentation</h5>
                           <p>Find technology or people for digital projects in public sector.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="features-box mb-50">
                        <div class="features-icon mb-20">
                           <img src="{{asset('assets/img/features_icon04.png')}}" alt="">
                        </div>
                        <div class="features-box-content">
                           <h5>30 Days Money Back Guaranty</h5>
                           <p>Find technology or people for digital projects in public sector.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="features-shape fs-one"><img src="{{asset('assets/img/slider_shape01.png')}}" alt=""></div>
   <div class="features-shape fs-two"><img src="{{asset('assets/img/slider_shape02.png')}}" alt=""></div>
   <div class="features-shape fs-three"><img src="{{asset('assets/img/slider_shape03.png')}}" alt=""></div>
   <div class="features-shape fs-four"><img src="{{asset('assets/img/slider_bottom_shape.png')}}" class="rotateme" alt=""></div>
   <div class="features-polygon"><img src="{{asset('assets/img/features_polygon.png')}}" alt="" data-parallax="{&quot;y&quot;: -100}" style="transform:translate3d(0px, -31.728px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0px, -31.728px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); "></div>
</section>
<section class="from-blog spad customer_service">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
               <h2>CUSTOMER SERVICES</h2>
               <span>OUR BEST</span>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-3 col-xs-6 col-sm-6">
            <div class="blog__item">
               <div class="blog__item__pic">
                  <img src="{{asset('assets/img/service1.png')}}" alt="">
               </div>
               <div class="blog__item__text">
                  <h5><a href="#">PRIVATE LABEL MANUFACTURING</a></h5>
                  <a href="" class="servread">Read More <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-xs-6 col-sm-6">
            <div class="blog__item">
               <div class="blog__item__pic">
                  <img src="{{asset('assets/img/service2.png')}}" alt="">
               </div>
               <div class="blog__item__text">
                  <h5><a href="#">TOOVEM TRAINING </a></h5>
                  <a href="" class="servread">Read More <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-xs-6 col-sm-6">
            <div class="blog__item">
               <div class="blog__item__pic">
                  <img src="{{asset('assets/img/service3.png')}}" alt="">
               </div>
               <div class="blog__item__text">
                  <h5><a href="#">USED EQUIPMENT SALES </a></h5>
                  <a href="" class="servread">Read More <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-xs-6 col-sm-6">
            <div class="blog__item">
               <div class="blog__item__pic">
                  <img src="{{asset('assets/img/service4.png')}}" alt="">
               </div>
               <div class="blog__item__text">
                  <h5><a href="#">EQUIPMENT RENTALS </a></h5>
                  <a href="" class="servread">Read More <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<div class="covidsec">
      <div class="with-bg-size" style="background-image:url(assets/img/covid.png);position:absolute; top:0px; left:0px; z-index:-2; width:100%; margin:auto;">
  
         <div id="color-overlay"></div>
         <div class="row">
            <div class="col-lg-6 col-sm-6">
               <p>&nbsp; </p>
            </div>
            <div class="col-lg-6 col-sm-6">
               <div class="covidtext">
                  <h2 class="yellow wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"> COVID-19 RESPONSE</h2>
                  <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">AMERICA IS REOPENING FOR<br>
                     BUSINESS. <br>
                     ARE YOU READY?
                  </h1>
                  <button class="learnmore wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">LEARN MORE</button>
               </div>
            </div>
         </div>
      </div>
</div>


<section id="growtop" class="sicialfeed">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-sm-6">
            <h3 class="socilfed">Like Us on Facebook</h3>
            <div class="postcloser">
               <div class="post-container">
                  <div class="post-oneBy">
                     <div class="body-content">
                        <div class="post-top-detail">
                           <div class="img-post">
                              <img src="{{asset('assets/img/logofoot.png')}}">  
                           </div>
                           <div class="post-name">
                              <a href="#">Linda Toovem</a>
                              <div class="ghjkh">
                                 <div class="jss486">June 18 </div>
                                 <div class="jss488">,</div>
                                 <div class="jss489">10:40</div>
                              </div>
                           </div>
                        </div>
                        <div class="more"><i class="fa fa-ellipsis-h"></i></div>
                        <div class="image_post">
                           <img src="{{asset('assets/img/topbaner2.png')}}">
                        </div>
                        <div class="MuiBox-root">
                           <p class="MuiTypography-root">Alorair's Storm Pro (yellow)</p>
                           <p class="MuiTypography-root  MuiTypography-body1">Alorair's Storm Pro (yellow) and Storm Ultra (blue) use smart WIFI control, Learn more:</p>
                           <div class="MuiBox-root">
                              <div class="jss570">www.toovem.com</div>
                           </div>
                        </div>
                        <div class="jss492">Posted on 6:03 AM · Dec 8th, 2021</div>
                        <div class="post-detail">
                           <div class="jss598">
                              <div class="jss599 clickable">
                                 <span class="jss600">131</span> Likes
                              </div>
                              <div class="jss599 clickable">
                                 <span class="jss600">115</span> Comment
                              </div>
                           </div>
                           <div>
                           </div>
                           <div class="MuiBox-root1">
                              <span class="likes"><a href="">Like <i class="fa fa-thumbs-up"></i></a> </span>
                              <span class="comments"><a href="">Comment <i class="fa fa-comments"></i></a></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-sm-3 col-xs-6">
            <h3 class="socilfed">Like Us on Twitter</h3>
            <br>
            <img src="{{asset('assets/img/twitters.png')}}" style="width:100%;">
         </div>
         <div class="col-lg-3 col-sm-3 col-xs-6">
            <h3 class="socilfed">Like Us on Youtube</h3>
            <br>
            <img src="{{asset('assets/img/youtube.jpg')}}" style="width:100%;">
         </div>
         <div class="col-lg-3 col-sm-3 col-xs-6">
            <h3 class="socilfed">Like Us on linkedin</h3>
            <br>
            <img src="{{asset('assets/img/linkdien.jpg')}}" style="width:100%;">
         </div>
      </div>
   </div>
</section>
@include('layouts.front.footer')