@include('layouts.front.header')
 <main>
  
<div class="tab-content">
  <div id="homes" class="tab-pane fade in active show">

            <div class="Featured-product-area mb-30 hm3">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 pb-15">
                            <div class="section-title pt-10 text-center">
                                Explore Category Product
                            </div>
                        </div>
                        <div class="row h3-purchased-product-active white-bg">
                          <div class="col-lg-3 col-sm-3">
                              
                              </div>
                                <div class="col-lg-9 col-sm-9">
                                     <div class="row">
                            @foreach($product as $list)
                            <div class="col-xl-3 col-lg-12  col-md-6  col-sm-6 col-12 plr-14">
                                <div class="single-product mb-10">
                                    <div class="single-product-img position-relative over-hidden mb-5">
                                        <div class="single-product-label position-absolute theme-bg text-center  transition-3 z-index1">  
                                            <span class="white text-uppercase d-block font500">-20%</span>  
                                        </div>
                                       <div class="most-purchased-item-img  position-relative text-center">
                                            <a class="position-relative" href="{{Url('product/'.$list->id)}}">
                                                <img src="{{asset('uploads/products/image/'.$list->image)}}" alt="product">
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
                                                <a href="{{Url('product/'.$list->id)}}">{{ $list->product_title}}</a>
                                            </h6>
                                            @if(Session::get('user_name') == '')
                                              <button class="disable signprice">SIGN FOR PRICE</button>
                                            @else
                                              <button class="signprice" id="addtocart">Add to cart</button>
                                              <ul class="single-product-price d-flex mt-2 transition-3 justify-content-center">
                                                <li>
                                                 <span class="theme-color pr-2 d-inline-block">$ {{ $list->price}}</span>
                                                <span class="theme-color">-</span>
                                                 <span class="theme-color d-inline-block font600">$ {{ $list->discounted_price}}</span>
                                                 </li>
                                               </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
       </div>
   </div>    
</main>
@include('layouts.front.footer')

