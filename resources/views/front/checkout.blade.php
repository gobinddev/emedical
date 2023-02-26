@include('layouts.front.header')
        <main>
            <div class="slider-area over-hidden">
                <div class="single-slider page-height3 d-flex align-items-center" data-background="images/bg/product.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 d-flex align-items-center justify-content-center">
                                <div class="page-title mt-10 text-center">
                                    <h2 class="text-capitalize font600 mb-10">Checkout</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center bg-transparent">
                                        <li class="breadcrumb-item"><a class="primary-color" href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active text-capitalize" aria-current="page">Checkout</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="coupon-area mt-50">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6  col-lg-6  col-md-6  col-sm-12 col-12">
                            <div class="coupon-accordion">
                           
                                <h6 class="pt-15 pl-40 pb-15 mb-25 position-relative">Returning customer? <span id="login" class="light-black-color2 font600 transition-3">Click here to login</span></h6>
                                <div id="checkout-login" class="coupon-content border-gray pt-20 pb-35 pl-30 pr-30 mb-25">
                                    <div class="coupon-info">
                                        <p class="coupon-text mb-15">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                            sit amet ipsum luctus.</p>
                                        <form action="#">
                                            <p class="log-mail mb-0">
                                                <label>Username or email <span class="required"><span class="theme-color">*</span></span></label>
                                                <input type="text" class="form-control primary-bg2 border-gray">
                                            </p>
                                            <p class="log-pass mb-0">
                                                <label>Password <span class="required"><span class="theme-color">*</span></span></label>
                                                <input type="text" class="form-control primary-bg2 border-gray">
                                            </p>
                                            <div class="log-btn mb-0">
                                                <a href="#" class="web-btn h2-theme-border1 d-inline-block text-capitalize white mt-15 mb-30 rounded-0 h2-theme-color h2-theme-bg position-relative over-hidden pl-60 pr-60 ptb-17 mr-20">Login</a>
                                                <div class="save-info d-inline-block mb-30 mt-2">
                                                    <input class="p-0 pr-1" type="checkbox" aria-label="Checkbox for following text input">
                                                    <p class="mb-0 d-inline-block">Remember me</p>
                                                </div>
                                            </div>
                                            <p class="lost-password mb-0">
                                                <a href="#" class="light-black-color2 font600">Lost your password?</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-xl-6  col-lg-6  col-md-6  col-sm-12 col-12">
                            <div class="coupon-accordion">
                                <!-- accordion start -->
                                <h6 class="pt-15 pl-40 pb-15 mb-25 position-relative">Have a coupon? <span  id="couponshow" class="light-black-color2 font600 transition-3">Click here to enter your code</span></h6>
                                <div id="checkout-coupon" class="checkout-content">
                                    <div class="coupon-info">
                                        <form action="#">
                                            <p class="checkout-coupon">
                                                <input type="text" class="form-control primary-bg2 border-gray" placeholder="Coupon Code">
                                                <a href="#" class="web-btn h2-theme-border1 d-inline-block text-capitalize white mt-15 mb-30 rounded-0 h2-theme-color h2-theme-bg position-relative over-hidden pl-60 pr-60 ptb-17 mr-20">Apply coupon</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           
       <div class="checkout-area mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6  col-lg-6  col-md-12  col-sm-12 col-12">
                            <div class="checkbox-form">
                                  @if ($errors->any())
                                     @foreach ($errors->all() as $error)
                                      <div class="text-danger">{{$error}}</div>
                                     @endforeach
                                     @endif
                                <h4 class="pb-10 mb-20 border-b-light-gray2">Billing Details</h4>
                                <div class="row">
                                  <form method="post" action="{{Url('place_order')}}" class="checkout-form" id="checkout-form">
							         @csrf
                                    <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6 col-12">
                                        <div class="checkout-form-list mb-20">
                                            <label>Name <span class="theme-color">*</span></label>
                                            <input type="text" name="name" value="{{$customer[0]->display_name}}" placeholder="" class="form-control primary-bg2 border-gray">
                                        </div>
                                    </div>
                                    
                                    <!--<div class="col-xl-6  col-lg-6  col-md-6  col-sm-6 col-12">-->
                                    <!--    <div class="checkout-form-list mb-20">-->
                                    <!--        <label>Last Name <span class="theme-color">*</span></label>-->
                                    <!--        <input type="text" value="{{$customer['0']->last_name}}" placeholder="" class="form-control primary-bg2 border-gray">-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                     <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6 col-12">
                                        <div class="checkout-form-list mb-20">
                                            <label>Email Address <span class="theme-color">*</span></label>
                                            <input type="email" name="email" value="{{$customer['0']->email}}" placeholder="" class="form-control primary-bg2 border-gray">
                                        </div>
                                    </div>
                                    <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6 col-12">
                                        <div class="checkout-form-list mb-20">
                                            <label>Phone <span class="theme-color">*</span></label>
                                            <input type="text" name="phone" value="@if(!empty($customeradd['0']['phone'])) {{$customeradd['0']['phone']}} @endif" placeholder="Phone" class="form-control primary-bg2 border-gray">
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12">
                                        <div class="checkout-form-list mb-20">
                                            <label>Address <span class="theme-color">*</span></label>
                                            <input type="text" name="address_line_1" value="@if(!empty($customeradd['0']['address_line_1'])) {{$customeradd['0']['address_line_1']}} @endif" placeholder="Street address" class="form-control primary-bg2 border-gray">
                                        </div>
                                    </div>
                                    <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12">
                                        <div class="checkout-form-list mb-20">
                                            <input type="text" name="address_line_2" value="@if(!empty($customeradd['0']['address_line_2'])) {{$customeradd['0']['address_line_2']}} @endif" placeholder="Apartment, suite, unit etc. (optional)" class="form-control primary-bg2 border-gray">
                                        </div>
                                    </div>
                                    
                                      <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6 col-6">
                                        <div class="country-select">
                                            <label>Country <span class="theme-color">*</span></label>
                                            <select class="w-100 primary-bg2 mb-20" name="country">
                                                  @foreach($countries as $list)
                                                        <option value="{{$list->id}}">{{$list->name}}</option>
                                                  @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6 col-12">
                                        <div class="state-select mb-30">
                                            <label>Provions(State) <span class="theme-color">*</span></label>
                                            <select class="w-100 primary-bg2 mb-20" name="state">
                                                  @foreach($states as $list)
                                                        <option value="{{$list->id}}">{{$list->name}}</option>
                                                  @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6 col-6">
                                        <div class="checkout-form-list mb-20">
                                            <label>Town / City <span class="theme-color">*</span></label>
                                            <input type="text" name="city" value="@if(!empty($customeradd['0']['geo_city'])) {{$customeradd['0']['geo_city']}} @endif" placeholder="Town / City" class="form-control primary-bg2 border-gray">
                                        </div>
                                    </div>
                                    <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6 col-12">
                                        <div class="checkout-form-list mb-20">
                                            <label>Zip <span class="theme-color">*</span></label>
                                            <input type="text" name="zip_code" value="@if(!empty($customeradd['0']['pincode'])) {{$customeradd['0']['pincode']}} @endif" placeholder="Postcode / Zip" class="form-control primary-bg2 border-gray">
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                        <div class="col-xl-6  col-lg-6  col-md-12  col-sm-12 col-12">
                            <div class="your-order mb-30 pt-30 pr-40 pb-60 pl-40 mt-15">
                                <h4 class="pb-10 mb-20 border-b-light-gray3">Your order</h4>
                                <div class="your-order-table table-responsive">
                                    <table class="width100">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-quantity">Qty</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $subtotal =0; ?>
                                            
                                        @foreach($cartItems as $itmes)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{$itmes->product_name}}
                                                    <!--<strong class="product-quantity">x{{$itmes->product_qty}}</strong>-->
                                                </td>
                                                <td class="product-quantity">
                                                    <span class="product-quantity">{{$itmes->product_qty}}</span>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">$ {{$itmes->total_price}}</span>
                                                </td>
                                             @php $subtotal = $subtotal + $itmes->total_price @endphp
                                            </tr>
                                           
                                        @endforeach
                                    
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">$ {{$subtotal}}</span></td>
                                            </tr>
                                            <!--<tr class="shipping">-->
                                            <!--    <th>Shipping</th>-->
                                            <!--    <td>-->
                                            <!--        <ul>-->
                                                        <!--<li class="d-flex">-->
                                                        <!--    <input type="radio" class="r-inpt mb-2 mr-1">-->
                                                        <!--    <label>-->
                                                        <!--        Standared Shipping: <span class="amount">$8.00</span>-->
                                                        <!--    </label>-->
                                                        <!--</li>-->
                                                       
                                                        <!--<li></li>-->
                                            <!--        </ul>-->
                                            <!--    </td>-->
                                            <!--</tr>-->
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount"><b>$ {{$subtotal}}</b></span></strong>
                                                <input type="hidden" name="subtotal" value="{{$subtotal}}">
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method mt-40">
                                    <div class="col-12">
                                        <h4 class="checkout-title">Payment Method</h4>
                                            <div class="checkout-payment-method">
                                                <div class="single-method">
													<input type="radio" id="payment_cash" name="payment-method" value="cash">
													<label for="payment_cash">Cash on Delivery</label>
													<p data-method="cash">Please send a Check to Store name with Store Street, Store Town, Store
														State, Store Postcode, Store Country.</p>
												</div>
                                                <div class="single-method">
													<input type="radio" id="payment_paypal" name="payment-method" value="paypal">
													<label for="payment_paypal">Paypal</label>
													<p data-method="paypal">Please send a Check to Store name with Store Street, Store Town, Store
														State, Store Postcode, Store Country.</p>
												</div>
                                                <div class="single-method">
													<input type="checkbox" name="accept_terms" id="accept_terms">
													<label for="accept_terms">I’ve read and accept the terms & conditions</label>
												</div>
												<p style="margin-bottom: 2px;" class="text-danger error-container error-payment-method" id="error-payment-method"></p>
												<p style="margin-bottom: 2px;" class="text-danger error-container error-accept_terms" id="error-accept_terms"></p>
											</div>
                                             <button type="submit" class=" place_order lezada-button lezada-button--medium mt-30">Place order</button>
                                        </div>
                                  </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>

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
 </script>


