@include('layouts.front.header')
@php
   use App\Helpers\Helper;
   use App\Wishlist;

   $slider = Helper::get_slider();
@endphp
<div class="slider-area">
   <div class=" wide">
      <div class="row" style="margin:0px;">
         <div class="col-lg-12 pdn">
            <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="homepage-6"
               data-source="gallery">
               <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
                  <ul>
                     <!-- SLIDE  -->
                     {{--<li data-index="rs-10"
                        data-transition="boxfade,boxslide,parallaxtoright,parallaxtoleft,parallaxtotop,parallaxtobottom,parallaxhorizontal,parallaxvertical"
                        data-slotamount="default,default,default,default,default,default,default,default"
                        data-hideafterloop="0" data-hideslideonmobile="off"
                        data-easein="default,default,default,default,default,default,default,default"
                        data-easeout="default,default,default,default,default,default,default,default"
                        data-masterspeed="700,default,default,default,default,default,default,default"
                        data-thumb="assets/img/banner4.jpg"
                        data-rotate="0,0,0,0,0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1=""
                        data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                        data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="assets/img/banner4.jpg" alt=""
                           data-lazyload="assets/img/banner4.jpg"
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
                     </li>--}}
                     <!-- SLIDE  -->
                     {{--<li data-index="rs-11"
                        data-transition="boxslide,slotslide-horizontal,slotslide-vertical,boxfade,slotfade-horizontal,slotfade-vertical"
                        data-slotamount="default,default,default,default,default,default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default,default,default,default,default,default"
                        data-easeout="default,default,default,default,default,default"
                        data-masterspeed="700,default,default,default,default,default"
                        data-thumb="assets/img/banner3.jpg"
                        data-rotate="0,0,0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                        data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                        data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="assets/img/banner3.jpg" alt=""
                           data-lazyload="assets/img/banner3.jpg"
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
                     </li>--}}
                     <!-- SLIDE  -->
                     {{--<li data-index="rs-12"
                        data-transition="boxfade,boxslide,parallaxtoright,parallaxtoleft,parallaxtotop,parallaxtobottom,parallaxhorizontal,parallaxvertical"
                        data-slotamount="default,default,default,default,default,default,default,default"
                        data-hideafterloop="0" data-hideslideonmobile="off"
                        data-easein="default,default,default,default,default,default,default,default"
                        data-easeout="default,default,default,default,default,default,default,default"
                        data-masterspeed="700,default,default,default,default,default,default,default"
                        data-thumb="assets/img/banner2.jpg"
                        data-rotate="0,0,0,0,0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1=""
                        data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="">
                        <img src="assets/img/banner2.jpg" alt=""
                           data-lazyload="assets/img/banner2.jpg"
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
                         Toovem Products specializes
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
                        Home comfort systems for humid environments
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
                     </li>--}}

                     @if(count($slider)>0)
                        @foreach($slider as $key => $s)
                           <li data-index="rs-1{{$key}}"
                              data-transition="boxfade,boxslide,parallaxtoright,parallaxtoleft,parallaxtotop,parallaxtobottom,parallaxhorizontal,parallaxvertical"
                              data-slotamount="default,default,default,default,default,default,default,default"
                              data-hideafterloop="0" data-hideslideonmobile="off"
                              data-easein="default,default,default,default,default,default,default,default"
                              data-easeout="default,default,default,default,default,default,default,default"
                              data-masterspeed="700,default,default,default,default,default,default,default"
                              data-thumb="{{asset('images/slider_images/'.$s->slider_image)}}"
                              data-rotate="0,0,0,0,0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1=""
                              data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="">
                              <img src="{{asset('images/slider_images/'.$s->slider_image)}}" alt=""
                                 data-lazyload="{{asset('images/slider_images/'.$s->slider_image)}}"
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
                                 style="z-index: 5; white-space: nowrap; font-size: 24px; line-height: 36px; font-weight: 400; color: #e3683d; letter-spacing: 0px;font-family:Work Sans;">
                                 <span style="color: #e3683d !important">{{$s->heading}}</span>
                              </div>
                              <div class="tp-caption   tp-resizeme" id="slide-12-layer-3"
                                 data-x="['center','center','center','center']" data-hoffset="['0','14','0','0']"
                                 data-y="['top','middle','middle','top']" data-voffset="['171','-202','-230','235']"
                                 data-fontsize="['56','56','56','40']" data-lineheight="['60','60','60','50']" data-width="none"
                                 data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                                 data-frames='[{"delay":1540,"speed":1400,"sfxcolor":"#ffffff","sfx_effect":"blockfromright","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                 data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                 data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                 style="z-index: 6; white-space: nowrap; font-size: 56px; line-height: 60px; font-weight: 300; color: #e3683d; letter-spacing: 0px;font-family:Work Sans;">
                                 {{$s->description}}
                              </div>
                              @if($s->url!=NULL)
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

                                       <a class="revslider-button" href="{{$s->url}}"> SHOP NOW</a>
                                 </div>
                              @endif
                           </li>
                        @endforeach
                     @endif
                  </ul>
                  <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<section class="categories">
        <div class="backings container">
        <div class="row">
          <div class="col-lg-9">
            <div class="lefttile">
              <h2>Explore Our Industry-Focused Areas of Expertise</h2>
            </div>
          </div>

          <div class="col-lg-3 col-sm-3">
      <div class="joincomunity">
          <div class="flex align-center">
          <div class="tri f-sxx bbold pv-xs ph-s mr-s relative">
           <a class="text-dark" href="{{route('customer.community')}}"> Join Our Community</a>
          </div>
          <img class="dlwe" src="assets/img/join.png">
        </div>
      </div>
      </div>
        </div>
        </div>
         <div class="flser">
         <div class="container">
            <div class="categories__slider">
                @php
                    $tags = Helper::get_tags();
                @endphp
                @if(count($tags)>0)
               <div class="row">
                  <!-- <div class="col-lg-3">
                     <div class="categories__item">
                      <div class="imageblock">

                        <img src="assets/img/reg1.png">
                      </div>
                      <h5><a href="#">Restoration</a></h5>
                      <div class="case-studies-overlay">
                        <div class="case-studies-info">

                        <button class="read">Read More</button>
                        </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="categories__item">
                      <div class="imageblock">

                        <img src="assets/img/reg2.png">
                      </div>
                    <h5><a href="#">Abatement</a></h5>
                    <div class="case-studies-overlay">
                        <div class="case-studies-info">

                        <button class="read">Read More</button>
                        </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="categories__item">
                       <div class="imageblock">

                        <img src="assets/img/reg3.png">
                      </div>
                     <h5><a href="#">crawl space & basement repairs</a></h5>
                    <div class="case-studies-overlay">
                        <div class="case-studies-info">

                        <button class="read">Read More</button>
                        </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="categories__item">
                      <div class="imageblock">

                        <img src="assets/img/reg4.png">
                      </div>
                     <h5><a href="#">dehumidification</a></h5>
                     <div class="case-studies-overlay">
                        <div class="case-studies-info">

                        <button class="read">Read More</button>
                        </div>
                        </div>
                     </div>
                  </div> -->
                  <!-- <div class="col-lg-3">
                     <div class="categories__item">
                        <div class="imageblock">
                       <h5><a href="#">Air conditioning</a></h5>
                        <img src="assets/img/reg5.png">
                      </div>
                      <div class="case-studies-overlay">
                        <div class="case-studies-info">

                        <button class="read">Read More</button>
                        </div>
                        </div>
                     </div>
                  </div> -->

                  <!-- <div class="col-lg-4">
                     <div class="categories__item">
                      <div class="imageblock">

                        <img src="assets/img/reg6.png">
                      </div>
                    <h5><a href="#">robot care cleaner</a></h5>
                    <div class="case-studies-overlay">
                            <div class="case-studies-info">

                            <button class="read">Read More</button>
                            </div>
                            </div>
                        </div>
                  </div>
                    <div class="col-lg-4">
                     <div class="categories__item">
                      <div class="imageblock">

                        <img src="assets/img/reg9.png">
                      </div>
                       <h5><a href="#">equipment financing</a></h5>
                        <div class="case-studies-overlay">
                            <div class="case-studies-info">

                            <button class="read">Read More</button>
                            </div>
                            </div>
                        </div>
                    </div>
               <div class="col-lg-4">
                     <div class="categories__item">
                      <div class="imageblock">

                        <img src="assets/img/reg8.png">
                      </div>
                        <h5><a href="#">training, rental, repairs</a></h5>
                      <div class="case-studies-overlay">
                        <div class="case-studies-info">

                        <button class="read">Read More</button>
                        </div>
                        </div>
                     </div>
               </div> -->
               @foreach($tags as $tag)
                    @php
                        $url = asset('images/no-product.png');
                        if($tag->file_name!=NULL)
                        {
                            $url = asset('images/tag_master/'.$tag->file_name);
                        }
                    @endphp
                  <div class="col-lg-3">
                     <div class="categories__item">
                      <div class="imageblock">
                            <img src="{{$url}}">
                      </div>
                      <h5><a href="#">{{$tag->name}}</a></h5>
                      <div class="case-studies-overlay">
                        <div class="case-studies-info">

                        <a href="{{url('/community/?tag_id='.Crypt::encryptString($tag->id))}}" class="read">Read More</a>
                        </div>
                        </div>
                     </div>
                  </div>
                @endforeach

            </div>
            @endif
               </div>
            </div>
         </div>
      </section>

<section class="shop-services section mbottom">
   <div class="">
      <div class="row">
         <div class="stepforpart">
            <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
               <img src="assets/img/shipping.png">
               <div class="contprocs">
                  <span>ALL FREE</span>
                  <h4>SHIPPING</h4>
                  <p>TOOVEM seeks to reclaim its position on the traditional market by invoking a win and win scenario. </p>
               </div>
            </div>
         </div>
         <div class="stepforpart">
            <div class="single-service  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
               <img src="assets/img/manufac.png">
               <div class="contprocs">
                  <span>99% POSITIVE</span>
                  <h4>manufacture</h4>
                  <p>TOOVEM seeks to reclaim its position on the traditional market by invoking a win and win scenario. </p>
               </div>
            </div>
         </div>
         <div class="stepforpart">
            <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
               <img src="assets/img/training.png">
               <div class="contprocs">
                  <span>FREE 365 DAYS</span>
                  <h4>TRAINING</h4>
          <p>TOOVEM seeks to reclaim its position on the traditional market by invoking a win and win scenario. </p>
               </div>
            </div>
         </div>
         <div class="stepforpart">
            <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
               <img src="assets/img/paym.png">
               <div class="contprocs">
                  <span>SECURE SYSTEM</span>
                  <h4>PAYMENT</h4>
                <p>TOOVEM seeks to reclaim its position on the traditional market by invoking a win and win scenario. </p>
               </div>
            </div>
         </div>
          <div class="stepforpart">
            <div class="single-service bordernone wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
               <img src="assets/img/discount.png">
               <div class="contprocs">
                  <span>SAVE MONEY</span>
                  <h4>DISCOUNT</h4>
                 <p>TOOVEM seeks to reclaim its position on the traditional market by invoking a win and win scenario. </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@php
   $brands = Helper::get_brands();
@endphp

<div  class="lezada-testimonial multi-item-testimonial-area mb-md-80 mb-sm-80" style="background-image:url(assets/img/tooback.jpg);">
  <div class="safefeture">
    <img src="{{asset('assets/img/sdee-2.png')}}">
  </div>
  <div class="features-shape fs-one"><img src="assets/img/slider_shape01.png" alt=""></div>
  <div class="features-polygon" style=" z-index: 9;right:0;"><img src="{{asset('assets/img/features_polygon.png')}}" alt="" data-parallax="{&quot;y&quot;: -100}" style="transform:translate3d(0px, -31.728px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0px, -31.728px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1);"></div>
   <div class="area-wrapper black-bg position-relative">
      <div class="container">
         <!-- brand-area -->
         <div class="brand-area pt-120">
            <div class="container">
               <div class="brand-wrap">
                  <div class="row no-gutters justify-content-center">
                     <!-- <div class="brand-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <img src="assets/img/clientlogo1.png" alt="">
                     </div>
                     <div class="brand-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                        <img src="assets/img/clientlogo2.png" alt="">
                     </div>
                     <div class="brand-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                        <img src="assets/img/clientlogo3.png" alt="">
                     </div>
                     <div class="brand-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
                        <img src="assets/img/clientlogo4.png" alt="">
                     </div>
                     <div class="brand-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <img src="assets/img/clientlogo5.png" alt="">
                     </div>
                     <div class="brand-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <img src="assets/img/clientlogo6.png" alt="">
                     </div>
                     <div class="brand-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                        <img src="assets/img/clientlogo7.png" alt="">
                     </div>
                     <div class="brand-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                        <img src="assets/img/clientlogo1.png" alt="">
                     </div>
                     <div class="brand-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
                        <img src="assets/img/clientlogo2.png" alt="">
                     </div>
                     <div class="brand-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <img src="assets/img/clientlogo3.png" alt="">
                     </div> -->
                     @if(count($brands)>0)
                        @foreach($brands as $brand)
                           <div class="brand-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                            <a href="{{url('brand-promotion',['id'=>Crypt::encryptString($brand->id)])}}"><img src="{{asset('uploads/brands/'.$brand->logo)}}" alt=""></a>
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
                       @php
                           $testimonial = Helper::get_testimonials();
                       @endphp
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
                           <!-- <div class="col">
                              <div class="testimonial-item multi-testimonial-single-item">
                                 <div class="multi-testimonial-single-item__text">
                                    I can say your dedication is second to none. I like the fact that you are strongly proud of your work
                                    in every way.
                                 </div>
                                 <div class="multi-testimonial-single-item__author-info">
                                    <div class="image">
                                       <img src="assets/img/testi_avatar.png" class="img-fluid" alt="">
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
                                       <img src="assets/img/testi_avatar.png" class="img-fluid" alt="">
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
                                       <img src="assets/img/testi_avatar.png" class="img-fluid" alt="">
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
                                       <img src="assets/img/testi_avatar.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="content">
                                       <p class="name">Anais Coulon</p>
                                       <span class="designation">/ Model</span>
                                    </div>
                                 </div>
                              </div>
                           </div> -->
                           @if(count($testimonial)>0)
                              @foreach($testimonial as $test)
                                 <div class="col">
                                    <div class="testimonial-item multi-testimonial-single-item">
                                       <div class="multi-testimonial-single-item__text">
                                          {{$test->message}}
                                       </div>
                                       <div class="multi-testimonial-single-item__author-info">
                                          <div class="image">
                                             @if($test->image!=NULL)
                                                <img src="{{asset('uploads/testimonial/'.$test->image)}}" class="img-fluid" alt="">
                                             @else
                                                <img src="assets/img/profile-default-avtar.jpg" class="img-fluid" alt="">
                                             @endif
                                          </div>
                                          <div class="content">
                                             <p class="name">{{$test->author}}</p>
                                             <span class="designation">/ Author</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="testimonial-small-quote"><img src="assets/img/testi_quote02.png" alt=""></div>
               </div>
            </div>
         </section>
         <div class="testi-bg-shape"><img src="assets/img/testi_shape.png" class="rotateme" alt=""></div>
      </div>
   </div>
   <div class="features-shape fs-four"><img src="assets/img/slider_bottom_shape.png" class="rotateme" alt=""></div>
   <div class="features-shape fs-three"><img src="assets/img/slider_shape03.png" alt=""></div>
   <div class="features-shape fs-two" style=" top: 0px;left: 20px;"><img src="assets/img/slider_shape02.png" alt=""></div>
</div>
<div class="small-separator">
   <span></span>
</div>


<section class="features-area features-bg pt-120">
   <div class="container">
      <div class="row justify-content-center align-items-center">
         <div class="col-lg-6 shoptext">
            <div class="leftbars white-title mb-40 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
    <span>What We do</span>

                <div class="distributortext">
                  <br>
                        <button class="flex f-sm mb-s play-video md-m-auto">
         <i class="fa fa-play-circle-o icon-play" aria-hidden="true"></i><span class="bbold">Play Video</span>
          </button>
          <br>
    </div>

 <div class="row">

   <div class="rightmoil">
    <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">Commercial <br>Quality With The</h3>
    <h2 class="orange wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s" >Best Warranty</h2>
 <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">Toovem Products specializes in home comfort systems for humid environments with a broad selection of residential dehumidifiers and air purifiers with an industry-best bumper to bumper warranty service. Improve your indoor air quality by reducing humidity in wet basements, crawl spaces, home theaters, conditioned garages, and exercise rooms with an American-made dehumidifier for your home.</p>
  </div>
     </div>
            </div>
            <div class="features-btn wow fadeInUp" data-wow-delay="0.4s">
               <a href="#" class="joinus ">Contact More Dealer</a>
            </div>

         </div>
         <div class="col-lg-6">
            <div class="features-top-content">
              <div class="rightblacks">
                     <h1>After - Sales Service System</h1>
                     <p>Every toovem product is backed with a one-click maintenance. </p>
                     <div class="row">
                        <div class="col-lg-4 col-sm-4">
                           <div class="se_xseicon wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                              <img src="assets/img/phones.png">
                              <p>APP Smart Reminder</p>
                           </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                           <div class="se_xseicon wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                              <img src="assets/img/online-test.png">
                              <p>Register Online</p>
                           </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                           <div class="se_xseicon wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
                              <img src="assets/img/hours.png">
                              <p>24-Hour Service</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">

                        <button class="btn oneclick">One Click Maintainance</button>
                     </div>
                  </div>

            </div>
         </div>
      </div>
         <div class="col-lg-12 widthse text-center">
                      <img src="assets/img/who.png">
               </div>
   </div>
   <div class="features-shape fs-one"><img src="assets/img/slider_shape01.png" alt=""></div>
   <div class="features-shape fs-two"><img src="assets/img/slider_shape02.png" alt=""></div>
   <div class="features-shape fs-three"><img src="assets/img/slider_shape03.png" alt=""></div>
   <div class="features-shape fs-four"><img src="assets/img/slider_bottom_shape.png" class="rotateme" alt=""></div>
   <div class="features-polygon"><img src="assets/img/features_polygon.png" alt="" data-parallax="{&quot;y&quot;: -100}" style="transform:translate3d(0px, -31.728px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0px, -31.728px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); "></div>
</section>




















<section class="coolsec">
    @php
        $latest_blogs = Helper::getBlogs();
    @endphp
   <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                    <h2>Cool Tech from Manufacturers</h2>
                    <span>Our Blogs</span>
                </div>
            </div>
        </div>
        @if(count($latest_blogs)>0)
            <div class="dblogse">
                <div class="row">
                    {{-- <div class="col-lg-4 col-sm-4">
                        <div class="form_blogs">
                        <div class="overflow">
                            <img src="{{asset('assets/img/bom1.png')}}">
                        </div>
                        <div class="bomcont">
                            <h3>UV-C Light</h3>
                            <p>Professional Version Air Scrubber with UV-C Light Sterilization Technology for COVID-19</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="form_blogs">
                        <div class="overflow">
                            <img src="{{asset('assets/img/bom2.png')}}">
                        </div>
                        <div class="bomcont">
                            <h3>HOW DOES SLGR WORK?</h3>
                            <p>SLGR microchannel technology has improved the performance and efficiency</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="form_blogs">
                        <div class="overflow">
                            <img src="{{asset('assets/img/bom3.png')}}">
                        </div>
                        <div class="bomcont">
                            <h3>ENERGY STAR</h3>
                            <p>SLGR microchannel technology has improved the performance and efficiency</p>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-4">
                        <div class="form_blogs">
                        <div class="overflow">
                            <img src="{{asset('assets/img/bom4.png')}}">
                        </div>
                        <div class="bomcont">
                            <h3>wifi app control</h3>
                            <p>Commercial Dehumidifier for Water Damage Restoration with Wifi App Control</p>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-4">
                        <div class="form_blogs">
                        <div class="overflow">
                            <img src="{{asset('assets/img/bom5.png')}}">
                        </div>
                        <div class="bomcont">
                            <h3>SUMP PUMP</h3>
                            <p>Sump pump with wifi support</p>
                        </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-sm-4">
                        <div class="form_blogs">
                        <div class="overflow">
                            <img src="{{asset('assets/img/bom6.png')}}">
                        </div>
                        <div class="bomcont">
                            <h3>REMOTE CONTROL</h3>
                            <p>Best Crawlspace & Basement Dehumidifiers with Remote Control</p>
                        </div>
                        </div>
                    </div> --}}
                    @foreach ($latest_blogs->take(6) as $b_item)
                        @php
                            $url = asset('assets/img/no-image-icon.png');
                            if($b_item->file_name!=NULL && \File::exists(public_path().'/uploads/blog/'.$b_item->file_name))
                            {
                                $url = asset('uploads/blog/'.$b_item->file_name);
                            }
                        @endphp
                        <div class="col-lg-4 col-sm-4">
                            <a href="{{route('customer.blog-detail',['id'=>Crypt::encryptString($b_item->id)])}}">
                                <div class="form_blogs">
                                    <div class="overflow">
                                        <img src="{{$url}}">
                                    </div>
                                    <div class="bomcont">
                                        <h3>{{$b_item->title}}</h3>
                                        <p>{{\Str::limit($b_item->short_description,50,'...')}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
   </div>
</section>

<section class="jointhe">
    @php
        $latest_topics = Helper::getTopics();
    @endphp
   <div class="row">
        <div class="col-lg-12">
            <div class="title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                <h2>Join the Conversation</h2>
                <span>Our Team</span>
            </div>
        </div>
    </div>
    @if(count($latest_topics)>0)
        <div class="container" style="padding: 0px 6%;">
            <div class="join_slider owl-carousel owl-theme">  <!--  -->
                {{-- <div class="item">
                    <div class="joinmember">
                    <span>JAN 1, 2121</span>
                    <p>Carpet Cleaning, Enzymes</p>
                    <h3>Powdered Enzyme Pre-sprays or Pre-sprays with Enzymes</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="joinmember">
                    <span>JAN 2, 2121</span>
                    <p>Carpet Cleaning, Enzymes</p>
                    <h3>Powdered Enzyme Pre-sprays or Pre-sprays with Enzymes</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="joinmember">
                    <span>JAN 22, 2121</span>
                    <p>Carpet Cleaning, Enzymes</p>
                    <h3>Powdered Enzyme Pre-sprays or Pre-sprays with Enzymes</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="joinmember">
                    <span>JAN 28, 2121</span>
                    <p>Carpet Cleaning, Enzymes</p>
                    <h3>Powdered Enzyme Pre-sprays or Pre-sprays with Enzymes</h3>
                    </div>
                </div> --}}
                @foreach ($latest_topics->take(4) as $lt_item)
                    <div class="item">
                        <div class="joinmember">
                            <a href="{{route('customer.community-detail',['id'=>Crypt::encryptString($lt_item->id)])}}"><span>{{date('M d, Y',strtotime($lt_item->created_at))}}</span>
                            <h3>{{$lt_item->title}}</h3></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
   @endif
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


<section class="from-blog spad customer_service">
    @php
        $latest_academies = Helper::getAcademies();
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                <h2>COVID-19 Updates & Family Finds</h2>
                <span>Our Best</span>

                </div>
            </div>
        </div>
        @if(count($latest_academies)>0)
            <div class="row">
                {{-- <div class="col-lg-3 col-xs-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                        <img src="{{asset('assets/img/service1.png')}}" alt="">
                        </div>
                        <div class="blog__item__text">
                        <h5><a href="#">Private Manufacturing</a></h5>
                        <p>Toovem Products specializes in home comfort systems.</p>
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
                        <h5><a href="#">Toovem Training</a></h5>
                        <p>Toovem Products specializes in home comfort systems.</p>
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
                        <h5><a href="#">Used Equipment Sales</a></h5>
                        <p>Toovem Products specializes in home comfort systems.</p>
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
                        <h5><a href="#">Equipment Rentals</a></h5>
                        <p>Toovem Products specializes in home comfort systems.</p>
                        <a href="" class="servread">Read More <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        </div>
                    </div>
                </div> --}}
                @foreach ($latest_academies->take(4) as $la_item)
                    @php
                        $url = asset('assets/img/no-image-icon.png');
                        if($la_item->thumbnail!=NULL)
                        {
                            $url = asset('uploads/academy/'.$la_item->thumbnail);
                        }
                    @endphp
                    <div class="col-lg-3 col-xs-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{$url}}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <h5><a href="{{route('customer.academy-detail',['id'=>Crypt::encryptString($la_item->id)])}}">{{$la_item->title}}</a></h5>
                                <p>{{\Str::limit($la_item->short_description,50,'...')}}</p>
                                <a href="{{route('customer.academy-detail',['id'=>Crypt::encryptString($la_item->id)])}}" class="servread">Read More <span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>




<div class="product-carousel-container produthot">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                <h2>Hot Product</h2>
               <span>Deal Of the day</span>
            </div>
         </div>
      </div>
      @if(count($hot_products)>0)
        <div class="row">
            <!-- <div class="productmatch mb-45">
                <div class="single-product">
                <div class="single-product__image">
                    <a class="image-wrap" href="">
                    <img src="assets/img/toovem1.png" class="img-fluid" alt="">
                    <img src="assets/img/toovem1-1.png" class="img-fluid" alt="">
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
                    <img src="assets/img/toovem2.png" class="img-fluid" alt="">
                    <img src="assets/img/toovem2-1.png" class="img-fluid" alt="">
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
                    <img src="assets/img/toovem3.png" class="img-fluid" alt="">
                    <img src="assets/img/toovem3-1.png" class="img-fluid" alt="">
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
                    <img src="assets/img/toovem1.png" class="img-fluid" alt="">
                    <img src="assets/img/toovem1-1.png" class="img-fluid" alt="">
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
                    <img src="assets/img/toovem2.png" class="img-fluid" alt="">
                    <img src="assets/img/toovem2-1.png" class="img-fluid" alt="">
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
                    <img src="assets/img/toovem3.png" class="img-fluid" alt="">
                    <img src="assets/img/toovem3-1.png" class="img-fluid" alt="">
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
                    <img src="assets/img/toovem1.png" class="img-fluid" alt="">
                    <img src="assets/img/toovem1-1.png" class="img-fluid" alt="">
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
                    <img src="assets/img/toovem1.png" class="img-fluid" alt="">
                    <img src="assets/img/toovem1-1.png" class="img-fluid" alt="">
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
                    <img src="assets/img/toovem2.png" class="img-fluid" alt="">
                    <img src="assets/img/toovem2-1.png" class="img-fluid" alt="">
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
                    <img src="assets/img/toovem3.png" class="img-fluid" alt="">
                    <img src="assets/img/toovem3-1.png" class="img-fluid" alt="">
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

                    $user_product_attr = Helper::getProductAttributeByPrice($product->id);
                    //dd(Helper::getProductAttributeByPrice($product->id));
                @endphp
                <div class="productmatch mb-25">
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
                            <span class="compare"><a href="#" class="compareproduct" rel="{{$product->id}}" data-tippy="Compare" data-tippy-inertia="true"
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
                            {{-- <a href="{{url('/cart/add',['id'=>Crypt::encryptString($product->id)])}}">Add to cart</a> --}}
                            </div>
                            <div class="price">
                            <span class="main-price discounted">$ {{$user_product_attr->price}}</span>
                            <span class="discounted-price">$ {{$user_product_attr->discounted_price}}</span>
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
               <img src="assets/images/countdown/countdown-4.png" class="img-fluid" alt="">
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
    $feature_product = Helper::get_feature_product_data();

        $url = asset('images/no-product.png');
        $product_t = Helper::get_product_thumbnail_image($feature_product->id);
        if($product_t!=NULL)
        {
            $url = asset('uploads/products/image/'.$product_t->file_name);
        }

@endphp
<div id="growtop" class="cabinet-revslider-area mt-md-30 mt-sm-30 mb-0 mb-md-80 mb-sm-80">
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
                        <img src="assets/img/transparent.png" data-bgcolor='#ffffff' style='background:#ffffff'
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
                           style="z-index: 6;"><img src="{{$url}}" alt=""
                           data-ww="['588auto','362px','393px','322px']" data-hh="['400px','400px','400px','400px']"
                           data-no-retina style="height: auto !important;"> </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption   tp-resizeme" id="slide-14-layer-5" data-x="['right','right','right','right']"
                           data-hoffset="['480','-41','-32','613']" data-y="['top','top','top','top']"
                           data-voffset="['313','322','302','297']" data-fontsize="['35','70','70','130']"
                           data-lineheight="['80','80','80','130']" data-fontweight="['700','600','600','600']"
                           data-color="['rgb(51,51,51)','rgb(51,51,51)','rgb(51,51,51)','rgb(255,255,255)']" data-width="none"
                           data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                           data-frames='[{"delay":410,"speed":2020,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;rZ:90;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 7; white-space: nowrap; font-size: 35px; line-height: 80px; font-weight: 700; color: #333333; letter-spacing: 0px;font-family:Work Sans;top:-75px;">
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
                           style="z-index: 8;background-color:rgb(104 62 136);border-radius:50px 50px 50px 50px;"> </div>
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
                           ${{$feature_product->discounted_price}}
                        </div>
                        <!-- LAYER NR. 7 -->
                        <div class="tp-caption   tp-resizeme" id="slide-14-layer-9" data-x="['left','left','left','left']"
                           data-hoffset="['187','93','89','21']" data-y="['top','top','top','top']"
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
                           data-hoffset="['181','91','88','21']" data-y="['top','top','top','top']"
                           data-voffset="['208','116','97','142']" data-fontsize="['60','60','60','60']"
                           data-lineheight="['64','64','64','45']" data-width="none" data-height="none"
                           data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                           data-frames='[{"delay":1050,"speed":1230,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 12; white-space: nowrap; font-size: 48px; line-height: 64px; font-weight: 600; color: #333333; letter-spacing: 0px;font-family:Work Sans;">
                           Best <br> Warranty
                        </div>
                        <!-- LAYER NR. 9 -->
                        <div class="tp-caption   tp-resizeme" id="slide-14-layer-11" data-x="['left','left','left','left']"
                           data-hoffset="['182','90','90','23']" data-y="['top','top','top','top']"
                           data-voffset="['368','283','262','250']" data-fontsize="['23','23','23','23']" data-width="none"
                           data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                           data-frames='[{"delay":1300,"speed":1180,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                           data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                           style="z-index: 13; white-space: nowrap; font-size: 16px; line-height: 26px; font-weight: 400; color: #7e7e7e; letter-spacing: 0.5px;font-family:Work Sans;">
                           Toovem Products specializes in home comfort systems for <br>humid environments with a broad selection of residential<br> dehumidifiers and air purifiers with an industry-best <br>bumper to bumper warranty service.
                        </div>
                        <br>
                        <!-- LAYER NR. 10 -->
                        <!-- <div class="tp-caption Slider-button-alt rev-btn " id="slide-14-layer-12"
                           data-x="['left','left','left','left']" data-hoffset="['182','91','89','29']"
                           data-y="['top','top','top','top']" data-voffset="['500','384','364','349']" data-width="none"
                           data-height="none" data-whitespace="nowrap" data-type="button" data-responsive_offset="on"
                           data-responsive="off"
                           data-frames='[{"delay":1580,"speed":1270,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(51,51,51);bg:transparent;"}]'
                           data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,12]"
                           data-paddingright="[35,35,35,35]" data-paddingbottom="[12,12,12,12]"
                           data-paddingleft="[35,35,35,35]"
                           style="z-index: 14; white-space: nowrap; letter-spacing: 1px;border-color:rgba(0,0,0,1);outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                           <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                           <a class="revslider-button" href=""> ONLY ${{$feature_product->discounted_price}}</a>
                        </div> -->
                     </li>
                  </ul>
                  <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


@include('layouts.front.footer')
