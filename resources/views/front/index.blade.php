@include('layouts.front.header')
  <style>
      a.viewal {
    color: #ffffff;
    text-transform: uppercase;
    font-weight: 600;
    text-align: center;
    background: #2a7f8d;
    display: table;
    width: auto;
    margin: 0 auto;
    padding: 11px 37px;
  
}
  </style>  
       
        <main>
            <div class="position-relative slider3">
                <div class="slider-area over-hidden slider-dots2">
                    <div class="slider-active">
                     @foreach($slider as $list)
                       <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{asset('images/slider_images/'.$list->slider_image)}}">
                          <div class="container">
                                <div class="row">
                                    <div class="col-xl-6  col-lg-6  col-md-6  col-sm-12 col-12 d-flex align-items-center">
                                            <div class="slider-content position-absolutes mt--12 z-index1">
                                                <h3 data-animation="fadeInLeft" data-delay="1s" class=" mb-1 pb-15 font600">{{$list->heading}}</h3>
                                                <p class="" data-animation="fadeInLeft" data-delay="1.5s">E-medical supplies is competitively priced with a commitment to Human Rights, anti-modern slavery, also supporting charitable causes. </p>
                                               <br>
                                                <p>We promise that 5% of your spend will be donated to a medical and dental charitable organisation.</p>
                                                <br>
                                                <p>So please join us in trying to help those in need and in doing a worthy cause</p>
                                                <br>
                                                <p><b>"We can make the difference"</b></p><br>
                                               <a style="margin-top: 0px;" data-animation="fadeInUp" data-delay="1.7s" href="{{Url('logincustomer')}}" class="web-btn h3-web-btn  d-inline-block text-uppercase white h3-theme-bg position-relative over-hidden pl-30 pr-30 ptb-17">Sign up</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
             
            </div>


           <div class="off-banner-area pt-60 mb-30 hm3">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-xxl-4 col-xl-4  col-lg-4  col-md-12  col-sm-12 col-12 pb-15">
                            <div class="section-title mb-50">
                                <h3 class="font-pt light-black-color2 pb-1 pr-50 mb-10">EXPLORE </h3>
                                <p class="light-black-color7 font500 pb-10">We supply all medical and dental products globally.</br> Please register for pricing and shipping costs.</p>
                                <a href="{{Url('logincustomer')}}"class="btn btn-info">SIGN UP</a>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-8  col-lg-8  col-md-12  col-sm-12 col-12 position-relative">
                            <div class="off-banner-area mb-50 pl-40 wow fadeInRight animated pr-60" data-wow-duration="1.5s" >
                                <img class="width100" src="{{asset('images/off-banner1.jpg')}}" alt="">
                            </div>
                            <div class="b-pattern2 position-absolute">
                                <img src="{{asset('images/bg/Pattern-banner.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ====== product-items-area-start ========================================= -->
            <div class="product-category-area product-category-area3 hm3 wow fadeInUp animated" data-wow-duration=".9s" >
                <div class="product-category-bg white-bg position-relative pt-80 pb-20">
                    <div class="container  position-relative">
                        <div class="d-flex justify-content-between align-items-center"> 
                        <div class="leftitle">
                            <!--<span>EXPLORE</span>-->
                            <h2>Our Products</h2>
                        </div>
                        </div>
                        <ul class="nav nav-tabs product-category-active h2-gray-border10 d-xl-flex align-items-center justify-content-between">
                            @for($i=0; $i < count($data); $i++)
                            <li class="single-product-category position-relative text-center d-inline-block mt-25 ">
                                @if($i == 0)
                                <a  data-bs-toggle="tab" href="#category{{$data[$i]->id}}"  class="h3-theme-color line-height-1 active">
                                 <span><img src="{{asset('images/product_categories/'.$data[$i]->image)}}" alt="{{$data[$i]->name}}"></span>
                                <h5 class="mt-10">{{$data[$i]->name}}</h5>
                                </a> 
                                @else
                                 <a  data-bs-toggle="tab" href="#category{{$data[$i]->id}}"  class="h3-theme-color line-height-1">
                                <span><img src="{{asset('images/product_categories/'.$data[$i]->image)}}" alt="{{$data[$i]->name}}"></span>
                                    <h5 class="mt-10">{{$data[$i]->name}}</h5>
                                </a>
                                @endif
                               
                            </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
          

<div class="tab-content">
    
  <div id="category{{$categoryname['0']->id}}" class="tab-pane fade in active show">

            <div class="Featured-product-area mb-30 hm3">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 pb-15">
                            <div class="section-title pt-10 text-center">
                                <h3 class="font-pt light-black-color2 pb-1">@if($categoryname['0']->name) {{$categoryname['0']->name}} @endif</h3>
                                <!--<p class="light-black-color7 font300">@if($categoryname['0']->description){{$categoryname['0']->description}} @endif</p>-->
                            </div>
                        </div>
                        <div class="row h3-purchased-product-active white-bg" id="productlist">
                           @foreach($product as $list)
                            <div class="col-xl-3 col-lg-12  col-md-6  col-sm-6 col-12 plr-14">
                                <div class="single-product mb-10">
                                    <div class="single-product-img position-relative over-hidden">
                                        <!--<div class="single-product-label position-absolute theme-bg text-center  transition-3 z-index1">  -->
                                            <!--<span class="white text-uppercase d-block font500">-20%</span>  -->
                                        <!--</div>-->
                                       <div class="most-purchased-item-img  position-relative text-center">
                                            <a class="position-relative" href="{{Url('product/'.$list->product_id)}}">
                                                <img src="{{asset('uploads/products/image/'.$list->file_name)}}" alt="product">
                                            </a>
                                            
                                       </div>
                                        <div class="single-product-info text-center transition-3">
                                            <div class="rating rating-shop d-flex justify-content-center">
                                                <ul class="d-flex mt-3">
                                                    <li>
                                                        <span ><i class="fas fa-star"></i></span>
                                                    </li>
                                                    <li>
                                                        <span ><i class="fas fa-star"></i></span>
                                                    </li>
                                                    <li>
                                                        <span ><i class="fas fa-star"></i></span>
                                                    </li>
                                                    <li>
                                                        <span ><i class="far fa-star"></i></span>
                                                    </li>
                                                    <li>
                                                        <span ><i class="far fa-star"></i></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h6 class="light-black-color2">
                                                <a href="{{Url('product/'.$list->product_id)}}">{{ $list->product_title}}</a>
                                               
                                            </h6>
                                        
                                            
                                            @if(Session::get('user_name') == '')
                                              <a href="{{Url('logincustomer')}}"class="disable signprice">SIGN IN FOR PRICES</a>
                                            @else
                                              <button class="signprice">$ {{ $list->price}}</button>
                                             
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endforeach 
                           
                        </div>
                        <a href="{{Url('category/product/'.$categoryname['0']->id)}}" class="viewal">View All</a>
                    </div>
                </div>
            </div>
       </div>
       
       
       
       
      
        @for($i=0; $i < count($data); $i++)
       <div id="category{{$data[$i]->id}}" class="tab-pane fade">
           <div class="Featured-product-area mb-30 hm3">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 pb-15">
                            <div class="section-title pt-10 text-center">
                                <h3 class="font-pt light-black-color2 pb-1">@if($data[$i]->name) {{$data[$i]->name}} @endif</h3>
                                <!--<p class="light-black-color7 font300">@if($categoryname['0']->description){{$categoryname['0']->description}} @endif</p>-->
                            </div>
                        </div>
                        <div class="row h3-purchased-product-active white-bg" id="productlist">
                           @for($j=0; $j < count($fadeup); $j++)
                             @if($fadeup[$j]->category_id == $data[$i]->id)
                             
                            
                            <div class="col-xl-3 col-lg-12  col-md-6  col-sm-6 col-12 plr-14">
                                <div class="single-product mb-10">
                                    <div class="single-product-img position-relative over-hidden">
                                        <!--<div class="single-product-label position-absolute theme-bg text-center  transition-3 z-index1">  -->
                                        <!--    <span class="white text-uppercase d-block font500">-20%</span>  -->
                                        <!--</div>-->
                                       <div class="most-purchased-item-img  position-relative text-center">
                                            <a class="position-relative" href="{{Url('product/'.$fadeup[$j]->id)}}">
                                                <img src="{{asset('uploads/products/image/'.$fadeup[$j]->file_name)}}" alt="product">
                                            </a>
                                            
                                       </div>
                                        <div class="single-product-info text-center transition-3">
                                            <div class="rating rating-shop d-flex justify-content-center">
                                                <ul class="d-flex mt-3">
                                                    <li>
                                                        <span ><i class="fas fa-star"></i></span>
                                                    </li>
                                                    <li>
                                                        <span ><i class="fas fa-star"></i></span>
                                                    </li>
                                                    <li>
                                                        <span ><i class="fas fa-star"></i></span>
                                                    </li>
                                                    <li>
                                                        <span ><i class="far fa-star"></i></span>
                                                    </li>
                                                    <li>
                                                        <span ><i class="far fa-star"></i></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h6 class="light-black-color2">
                                                <!--<a href="{{Url('product/'.$list->id)}}">{{ $fadeup[$j]->product_title}}</a>-->
                                                 <a href="{{Url('product/'.$fadeup[$j]->id)}}">{{ $fadeup[$j]->product_title}}</a>
                                            </h6>
                                        
                                            
                                            @if(Session::get('user_name') == '')
                                              <a href="{{Url('logincustomer')}}"class="disable signprice">SIGN IN FOR PRICES</a>
                                            @else
                                              <button class="signprice">$ {{ $fadeup[$j]->price}}</button>
                                              
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                           @endfor
                           
                        </div>
                        <a href="{{Url('category/product/'.$data[$i]->id)}}" class="viewal">View All</a>
                    </div>
                </div>
            </div>
       </div>
      @endfor
      
           <!--<div class="off-banner-area pt-60 mb-30 hm3">-->
           <!--     <div class="container">-->
           <!--         <div class="row d-flex align-items-center">-->
           <!--             <div class="col-xxl-12 col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 position-relative">-->
           <!--                 <div class="off-banner-area mb-50 pl-40 wow fadeInRight animated pr-60" data-wow-duration="1.5s" >-->
           <!--                     <a href="{{Url('category/product/'.$data[0]->id)}}"><img class="width100" src="{{asset('images/HP1.png')}}" alt=""></a>-->
           <!--                 </div>-->
           <!--                 <div class="b-pattern2 position-absolute">-->
           <!--                     <img src="{{asset('images/bg/Pattern-banner.png')}}" alt="">-->
           <!--                 </div>-->
           <!--             </div>-->
           <!--         </div>-->
           <!--     </div>-->
           <!-- </div>-->
   
       
<div class="Featured-product-area mb-30 hm3">
                <div class="container">
                    <div class="row">
                        <!--<div class="col-xxl-12 col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 pb-15">-->
                        <!--    <div class="section-title pt-10 text-center">-->
                        <!--        <h3 class="font-pt light-black-color2 pb-1"> @if($categoryname['0']->name) {{$categoryname['0']->name}} @endif<br></h3>-->
                                
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="row h3-purchased-product-active white-bg">-->
                        <!--    @foreach($popular as $list)-->
                        <!--    <div class="col-xl-3 col-lg-12  col-md-6  col-sm-6 col-12 plr-14">-->
                        <!--        <div class="single-product mb-10">-->
                        <!--            <div class="single-product-img position-relative over-hidden">-->
                                        <!--<div class="single-product-label position-absolute theme-bg text-center  transition-3 z-index1">    -->
                                        <!--    <span class="white text-uppercase d-block font500">-20%</span>  -->
                                        <!--</div>-->
                        <!--               <div class="most-purchased-item-img  position-relative text-center">-->
                        <!--                    <a class="position-relative" href="">-->
                        <!--                        <img src="{{asset('uploads/products/image/'.$list->file_name)}}" alt="product">-->
                        <!--                    </a>-->
                                            
                        <!--               </div>-->
                        <!--                <div class="single-product-info text-center transition-3">-->
                                            <!--<div class="rating rating-shop d-flex justify-content-center">-->
                                            <!--    <ul class="d-flex mt-3">-->
                                            <!--        <li>-->
                                            <!--            <span ><i class="fas fa-star"></i></span>-->
                                            <!--        </li>-->
                                            <!--        <li>-->
                                            <!--            <span ><i class="fas fa-star"></i></span>-->
                                            <!--        </li>-->
                                            <!--        <li>-->
                                            <!--            <span ><i class="fas fa-star"></i></span>-->
                                            <!--        </li>-->
                                            <!--        <li>-->
                                            <!--            <span ><i class="far fa-star"></i></span>-->
                                            <!--        </li>-->
                                            <!--        <li>-->
                                            <!--            <span ><i class="far fa-star"></i></span>-->
                                            <!--        </li>-->
                                            <!--    </ul>-->
                                            <!--</div>-->
                                            <!--<h6 class="light-black-color2">-->
                                            <!--    <a href="{{Url('product/'.$list->product_id)}}">{{ $list->product_title}}</a>-->
                                            <!--</h6>-->
                                        
                                            
                                            <!--@if(Session::get('user_name') == '')-->
                                            <!--  <a href="{{Url('logincustomer')}}" class="disable signprice">SIGN IN FOR PRICES</a>-->
                                            <!--@else-->
                                            <!--  <button class="signprice">$ {{ $list->price}}</button>-->
                                              <!--<ul class="single-product-price d-flex mt-2 transition-3 justify-content-center">-->
                                              <!--  <li>-->
                                              <!--   <span class="theme-color pr-2 d-inline-block">$ {{ $list->price}}</span>-->
                                              <!--  <span class="theme-color">-</span>-->
                                              <!--   <span class="theme-color d-inline-block font600">$ {{ $list->discounted_price}}</span>-->
                                              <!--   </li>-->
                                              <!-- </ul>-->
                        <!--                    @endif-->
                                            
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--@endforeach-->
                        <!--</div>-->
                    </div>
                </div>
            </div>


            </div>
            <!-- subscribe-area-end  -->

        </main>
@include('layouts.front.footer')
<script>
      $(document).ready(function(){
      var cart ='countcart';
        $.ajax({
                url : "{{Url('countcart')}}",
                method : "POST",
                data : {cart:cart, _token:'{{csrf_token()}}'},
                success: function(data){
                    $('#counttotal').html(data);
                },
            });
    });
$(document).ready(function(){
    

    
    
    function subscribe()
    {
        var email = $("#email").val();
        if(email=='')
        {
        alert("please enter email id");
        }
        
        else{
        $.ajax({
                    type: "post",
                    url: "{{Url('/getsubscribe')}}",
                    dataType: 'json',
                    data: {'email': email, '_token': '{{csrf_token()}}'},
                    success: function (data) {
                        $("#msg").text('subscription taken successfully');
                    
                    },
        });
        
        }
        
    }
});
</script>
