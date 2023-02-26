@include('layouts.front.header')
@php
use App\Helpers\Helper;
    $b_url = asset('assets/images/inners1.png');
@endphp

<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url({{$b_url}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">Order</h1>
                </div>
            </div>
        </div>
    </div>

<section class="checkout-page orderview section-padding bg-light-theme">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="tracking-sec">
               <div class="tracking-details padding-20 p-relative">
                  <h5 class="text-light-black fw-600">BaseAire 15,000 mg/h Ozone Generator</h5>
                  <span class="text-light-white">Estimated Delivery time</span>
                  <h2 class="text-light-black fw-700 no-margin">9:00pm-9:10pm</h2>
                  <div id="add-listing-tab" class="step-app">
                     <ul class="step-steps">
                        <li class="done"><a href=""> <span class="number"></span><span class="step-name">Order sent<br>8:38pm</span></a></li>
                        <li class="active"><a href=""> <span class="number"></span><span class="step-name">In the works</span></a></li>
                        <li><a href=""> <span class="number"></span><span class="step-name">Out of delivery</span></a></li>
                        <li><a href=""> <span class="number"></span><span class="step-name">Delivered</span></a></li>
                     </ul>
                     <!-- <button type="button" class="fullpageview text-light-black fw-600">Full Page View</button> -->
                  </div>
               </div>
               <div class="tracking-map"><iframe id="pickupmap" title="map" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe></div>
            </div>
            <div class="recipt-sec padding-20">
               <div class="recipt-name titlege u-line full-width mb-xl-20">
                  <div class="recipt-name-box">
                     <h5 class="text-light-black fw-600 mb-2">BaseAire 15,000 mg/h Ozone Generator</h5>
                     <p class="text-light-white ">Estimated Delivery time</p>
                  </div>
                  <div class="countdown-box">
                     <div class="time-box"> <span id="hours">23</span></div>
                     <div class="time-box"> <span id="minutes">4</span></div>
                     <div class="time-box iop"> <span id="seconds">15</span></div>
                  </div>
                  <script type="text/javascript">
                 setInterval(function(){

        var currentTime = new Date();
        // var hours = currentTime.getHours();
        // var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();

      
        // Compose the string for display
        var currentTimeString = seconds;
        $(".iop").html(currentTimeString);

},1000);
                  </script>
               </div>
               <div class="u-line mb-xl-20">
                  <div class="row">
                      @php
                          $customer = Helper::get_customer_address($order->delivery_address_id);
                          $city_data = Helper::get_city_data($customer->city_id);
                          $state_data = Helper::get_state_data($customer->state_id);
                      @endphp
                     <div class="col-lg-4">
                        <div class="recipt-name full-width padding-tb-10 pt-0">
                           <h5 class="text-light-black fw-600">Delivery (ASAP) to:</h5>
                           <span class="text-light-white">{{$customer->name}}</span><span class="text-light-white">Home</span><span class="text-light-white">{{$customer->address_line_1}} {{$customer->address_line_2!=NULL ? ', '.$customer->address_line_2 : ''}}</span>
                           <span class="text-light-white">{{$city_data->name}}, {{$state_data->name}} {{$customer->pincode}}</span>
                           <p class="text-light-white">{{$customer->phone}}</p>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="recipt-name full-width padding-tb-10 pt-0">
                           <h5 class="text-light-black fw-600">Delivery instructions</h5>
                           <p class="text-light-white ">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua consectetur adipiscing elit.</p>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="ad-banner padding-tb-10 h-100"><img style="width: 212px;
    float: right;" src="{{asset('assets/img/doles.png')}}" class="img-fluid full-width" alt="banner-adv"></div>
                     </div>
                  </div>
               </div>
               <div class="u-line mb-xl-20">
                  <div class="row">
                     <div class="col-lg-12" style="margin-bottom: 20px;">
                        <h5 class="text-light-black fw-600 titlege">Your Order <span><a class="fs-12" href="">Print recipt</a></span></h5>
                        <p class="titlege text-light-white"> {{date('M d, Y h:i A',strtotime($order->ordered_at))}} <span class="text-light-black">#{{$order->order_no}}</span></p>
                     </div>
                     <div class="col-lg-12">
                        <!-- <div class="checkout-product">
                           <div class="img-name-value">
                              <div class="product-img"><a href=""><img src="{{asset('assets/img/reg1.png')}}" alt="#"></a></div>
                              <div class="product-value"> <span class="text-light-white">2</span></div>
                              <div class="product-name"> <span><a class="text-light-white" href="">BaseAire 15,000 mg/h Ozone</a></span></div>
                           </div>
                           <div class="price"> <span class="text-light-white">$21.98</span></div>
                        </div>
                        <div class="checkout-product">
                           <div class="img-name-value">
                              <div class="product-img"><a href=""><img src="{{asset('assets/img/reg2.png')}}" alt="#"></a></div>
                              <div class="product-value"> <span class="text-light-white">2</span></div>
                              <div class="product-name"> <span><a class="text-light-white" href="">BaseAire 15,000 mg/h Ozone</a></span></div>
                           </div>
                           <div class="price"> <span class="text-light-white">$14.5</span></div>
                        </div>
                        <div class="checkout-product">
                           <div class="img-name-value">
                              <div class="product-img"><a href=""><img src="{{asset('assets/img/reg3.png')}}" alt="#"></a></div>
                              <div class="product-value"> <span class="text-light-white">2</span></div>
                              <div class="product-name"> <span><a class="text-light-white" href="">BaseAire 15,000 mg/h Ozone</a></span></div>
                           </div>
                           <div class="price"> <span class="text-light-white">$15.5</span></div>
                        </div>
                        <div class="checkout-product">
                           <div class="img-name-value">
                              <div class="product-img"><a href=""><img src="{{asset('assets/img/reg4.png')}}" alt="#"></a></div>
                              <div class="product-value"> <span class="text-light-white">2</span></div>
                              <div class="product-name"> <span><a class="text-light-white" href="">BaseAire 15,000 mg/h Ozone</a></span></div>
                           </div>
                           <div class="price"> <span class="text-light-white">$30.6</span></div>
                        </div>
                        <div class="checkout-product">
                           <div class="img-name-value">
                              <div class="product-img"><a href=""><img src="{{asset('assets/img/reg5.png')}}" alt="#"></a></div>
                              <div class="product-value"> <span class="text-light-white">2</span></div>
                              <div class="product-name"> <span><a class="text-light-white" href="">BaseAire 15,000 mg/h Ozone</a></span></div>
                           </div>
                           <div class="price"> <span class="text-light-white">$5.5</span></div>
                        </div> -->
                        @foreach($order_items as $item)
                            @php
                                $url = asset('images/no-product.png');
                                $product_t = Helper::get_product_thumbnail_image($item->id);
                                $product = Helper::get_product_data($item->product_id);
                                if($product_t!=NULL)
                                {
                                    $url = asset('uploads/products/image/'.$product_t->file_name);
                                }
                            @endphp
                            <div class="checkout-product">
                                <div class="img-name-value">
                                    <div class="product-img"><a href=""><img src="{{$url}}" alt="#"></a></div>
                                    <div class="product-name"> <span><a class="text-light-white" href="">{{\Str::limit($product->product_title,100,'...')}}</a></span></div>
                                    <div class="product-value"> <span class="text-light-white">{{$item->quantity}}</span></div>
                                </div>
                                <div class="price"> <span class="text-light-white">${{$item->price}}</span></div>
                            </div>
                        @endforeach
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-7">
                     <div class="payment-method mb-md-40">
                         @php
                                $payment_method = '--';
                                if($order->payment_method==1)
                                { 
                                  $payment_method = 'Cash On Delivery';
                                }
                                elseif($order->payment_method==2)
                                {
                                  $payment_method = 'Paypal';
                                }
                         @endphp
                        <h5 class="text-light-black fw-600">Payment Method</h5>
                        <div class="method-type"> <i class="fa fa-credit-card text-dark-white"></i><span class="text-light-white">{{$payment_method}}</span></div>
                     </div>
                  </div>
                  <div class="col-lg-5">
                     <div class="price-table u-line">
                        <div class="item"> <span class="text-light-white">Item subtotal:</span><span class="text-light-white">${{$order->sub_total}}</span></div>
                        <div class="item"> <span class="text-light-white">Shipping Charge:</span><span class="text-light-white">${{$order->shipping_charge}}</span></div>
                        <!-- <div class="item"> <span class="text-light-white">Delivery fee:</span><span class="text-light-white">$30.5</span></div>
                        <div class="item"> <span class="text-light-white">Tax and fees:</span><span class="text-light-white">$30.5</span></div>
                        <div class="item"> <span class="text-light-white">Driver tip:</span><span class="text-light-white">$30.5</span></div> -->
                     </div>
                     <div class="total-price padding-tb-10">
                        <h5 class="titlege text-light-black fw-700">Total: <span>${{$order->total_price}}</span></h5>
                     </div>
                  </div>
                  <div class="col-12 d-flex"> <a class="btn-first white-btn fw-600 help-btn" href="">Need Help?</a></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@include('layouts.front.footer')