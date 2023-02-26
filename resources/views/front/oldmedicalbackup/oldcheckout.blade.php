@include('layouts.front.header')
<style>
	.checkout-form .nice-select .list {
    width: 100%;
    height: 150px;
    overflow-y: scroll;
}
</style>
@php
use App\Helpers\Helper;
@endphp
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Checkout</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">Checkout</li>
					</ul>

					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>


<div class="checkout-page-area mb-130">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="lezada-form">
						<!-- Checkout Form s-->
						<form method="post" action="{{route('customer.place_order')}}" class="checkout-form" id="checkout-form">
							@csrf
							<div class="row row-40">

								<div class="col-lg-7 mb-20">

									<!-- Billing Address -->
									<div id="billing-form" class="mb-40">
										<h4 class="checkout-title">Billing Address</h4>
										@php
											$i=0;
										@endphp
										@if(count($customer_addresses)>0)
											@foreach($customer_addresses as $key => $cust_addr)
												@php
													$city_data = Helper::get_city_data($cust_addr->city_id);
													$state_data = Helper::get_state_data($cust_addr->state_id);
												@endphp
												<div class="custom-control custom-radio">
													<input type="radio" id="bill_address{{$i}}" name="bill_address" class="custom-control-input bill_address" value="{{Crypt::encryptString($cust_addr->id)}}" @if($cust_addr->is_default==1) checked @endif>
													<label class="custom-control-label" for="bill_address{{$i}}">
														<address>
															<p><strong>{{$cust_addr->name}}</strong></p>
															<p>{{$cust_addr->address_line_1}} {{$cust_addr->address_line_2!=NULL ? ', '.$cust_addr->address_line_2 : ''}} <br>
																{{$city_data->name}}, {{$state_data->name}} {{$cust_addr->pincode}}</p>
															<p>Mobile: {{$cust_addr->phone}}</p>
														</address>
													</label>
												</div>
												@php
													$i++;
												@endphp
											@endforeach
										@endif
										<div class="custom-control custom-radio pb-3">
											<input type="radio" id="bill_address{{$i}}" name="bill_address" class="custom-control-input bill_address" value="new" @if(count($customer_addresses)==0) checked @endif>
											<label class="custom-control-label" for="bill_address{{$i}}">
												<i class="fa fa-plus"></i> Add Address
											</label>
										</div>
										<div class="row mt-3 bill_new  @if(count($customer_addresses)>0) d-none @endif">

											<div class="col-md-6 col-12 mb-20">
												<label> Name*</label>
												<input type="text" name="name" placeholder="First Name">
												<p style="margin-bottom: 2px;" class="text-danger error-container error-name" id="error-name"></p>
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Email Address*</label>
												<input type="email" name="email" placeholder="Email Address">
												<p style="margin-bottom: 2px;" class="text-danger error-container error-email" id="error-email"></p>
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Phone no*</label>
												<input type="text" name="phone" placeholder="Phone number">
												<p style="margin-bottom: 2px;" class="text-danger error-container error-phone" id="error-phone"></p>
											</div>

											<div class="col-12 mb-20">
												<label>Address*</label>
												<input type="text" name="address_line_1" placeholder="Address line 1">
												<input type="text" name="address_line_2" placeholder="Address line 2">
												<p style="margin-bottom: 2px;" class="text-danger error-container error-address_line_1" id="error-address_line_1"></p>
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Country*</label>
												<select class="" name="country" id="country">
													<option value="">--Select--</option>
													@foreach($countries as $country)
														<option value="{{$country->id}}" @if($country->id=='101') selected @endif>{{$country->name}}</option>
													@endforeach
												</select>
												<p style="margin-bottom: 2px;" class="text-danger error-container error-country" id="error-country"></p>
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>State*</label>
												<select class="" name="state" id="state">
													<option value="">--Select--</option>
													@foreach($states as $state)
														<option value="{{$state->id}}">{{$state->name}}</option>
													@endforeach
												</select>
												<p style="margin-bottom: 2px;" class="text-danger error-container error-state" id="error-state"></p>
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Town/City*</label>
												<select class="" name="city" id="city">
													<option value="">--Select--</option>
												</select>
												<p style="margin-bottom: 2px;" class="text-danger error-container error-city" id="error-city"></p>
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Zip Code*</label>
												<input type="text" name="zip_code" placeholder="Zip Code">
												<p style="margin-bottom: 2px;" class="text-danger error-container error-zip_code" id="error-zip_code"></p>
											</div>

											<div class="col-md-12 col-12 mb-20">
												<label>Landmark </label>
												<input type="text" name="landmark" id="landmark" placeholder="Landmark">
												<p style="margin-bottom: 2px;" class="text-danger error-container error-landmark" id="error-landmark"></p>
											</div>

											<div class="col-md-12 col-12 mb-20">
												<label>Location <small>(Search & Select the Place)</small>*</label>
												<input type="text" name="location" id="location_add" placeholder="Location">
												<input type="hidden" id="geo_city_add" name="geo_city" />
												<input type="hidden" id="geo_addr_add" name="geo_addr" />
												<input type="hidden" id="geo_lat_add" name="geo_lat" />
												<input type="hidden" id="geo_long_add" name="geo_long" />
												<p style="margin-bottom: 2px;" class="text-danger error-container error-location" id="error-location"></p>
											</div>
											<p style="margin-bottom: 2px;" class="text-danger error-container error-all" id="error-all"></p>
											<!-- <div class="col-12 mb-20">
												<div class="check-box">
													<input type="checkbox" id="create_account">
													<label for="create_account">Create an Acount?</label>
												</div>
												<div class="check-box">
													<input type="checkbox" id="shiping_address" data-shipping>
													<label for="shiping_address">Ship to Different Address</label>
												</div>
											</div> -->

										</div>

									</div>

									<!-- Shipping Address -->
									<!-- <div id="shipping-form" class="mb-40">
										<h4 class="checkout-title">Shipping Address</h4>

										<div class="row">

											<div class="col-md-6 col-12 mb-20">
												<label>First Name*</label>
												<input type="text" placeholder="First Name">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Last Name*</label>
												<input type="text" placeholder="Last Name">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Email Address*</label>
												<input type="email" placeholder="Email Address">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Phone no*</label>
												<input type="text" placeholder="Phone number">
											</div>

											<div class="col-12 mb-20">
												<label>Company Name</label>
												<input type="text" placeholder="Company Name">
											</div>

											<div class="col-12 mb-20">
												<label>Address*</label>
												<input type="text" placeholder="Address line 1">
												<input type="text" placeholder="Address line 2">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Country*</label>
												<select class="nice-select">
													<option>Bangladesh</option>
													<option>China</option>
													<option>country</option>
													<option>India</option>
													<option>Japan</option>
												</select>
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Town/City*</label>
												<input type="text" placeholder="Town/City">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>State*</label>
												<input type="text" placeholder="State">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Zip Code*</label>
												<input type="text" placeholder="Zip Code">
											</div>

										</div>

									</div> -->

								</div>

								<div class="col-lg-5">
									<div class="row">

										<!-- Cart Total -->
										<div class="col-12 mb-60">

											<h4 class="checkout-title">Cart Total</h4>
											@if(count($cartItems)>0)

												<div class="checkout-cart-total">

													<h4>Product <span>Total</span></h4>

													<ul>
														<!-- <li>Cillum dolore tortor nisl X 01 <span>$25.00</span></li>
														<li>Auctor gravida pellentesque X 02 <span>$50.00</span></li>
														<li>Condimentum posuere consectetur X 01 <span>$29.00</span></li>
														<li>Habitasse dictumst elementum X 01 <span>$10.00</span></li> -->

														@foreach($cartItems as $item)
															<li>{{Str::limit($item->name,'25','...')}} X {{$item->quantity}} <span>${{\Cart::session(Auth::guard('customer')->user()->id)->get($item->id)->getPriceSum()}}</span></li>
														@endforeach

													</ul>

													<p>Sub Total <span>$ {{\Cart::session(Auth::guard('customer')->user()->id)->getSubTotal()}}</span></p>

													<p>Shipping Fee <span>$00.00</span></p>

													<h4>Grand Total <span>${{\Cart::session(Auth::guard('customer')->user()->id)->getTotal()}}</span></h4>

												</div>
											@endif
										</div>

										<div class="col-12 mb-60">
											<h4 class="checkout-title">Pickup Option</h4>
											<select class="nice-select" name="pick_up_option">
												<option value="">--Select--</option>
												<option value="0">Pickup Point</option>
												<option value="1">Door Step</option>
											</select>
											<p style="margin-bottom: 2px;" class="text-danger error-container error-pick_up_option" id="error-pick_up_option"></p>
										</div>

										<!-- Payment Method -->
										<div class="col-12">

											<h4 class="checkout-title">Payment Method</h4>

											<div class="checkout-payment-method">

												<!-- <div class="single-method">
													<input type="radio" id="payment_check" name="payment-method" value="check">
													<label for="payment_check">Check Payment</label>
													<p data-method="check">Please send a Check to Store name with Store Street, Store Town, Store
														State, Store Postcode, Store Country.</p>
												</div>

												<div class="single-method">
													<input type="radio" id="payment_bank" name="payment-method" value="bank">
													<label for="payment_bank">Direct Bank Transfer</label>
													<p data-method="bank">Please send a Check to Store name with Store Street, Store Town, Store
														State, Store Postcode, Store Country.</p>
												</div> -->

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


												<!-- <div class="single-method">
													<input type="radio" id="payment_payoneer" name="payment-method" value="payoneer">
													<label for="payment_payoneer">Payoneer</label>
													<p data-method="payoneer">Please send a Check to Store name with Store Street, Store Town,
														Store State, Store Postcode, Store Country.</p>
												</div> -->

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
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
			$("#country").niceSelect();
			$("#state").niceSelect();
			$("#city").niceSelect();

			 //on change country
			 $(document).on('change','#country',function(){
				var id = $(this).val();
				$.ajax({
						type:"post",
						url:"{{route('customer.getstate')}}",
						data:{'country_id':id,"_token": "{{ csrf_token() }}"},
						success:function(data)
						{
							$("#state").empty();
							$("#state").html('<option>--Select--</option>');

							$("#city").empty();
							$("#city").html('<option value="">--Select--</option>');
							$.each(data,function(key,value){
							$("#state").append('<option value="'+value.id+'">'+value.name+'</option>');
							});

							$("#state").niceSelect('update');
							$("#city").niceSelect('update');
						}
					});
			 });

			// on change state
			$(document).on('change','#state',function(){
				var id = $(this).val();
				$.ajax({
						type:"post",
						url:"{{route('customer.getcity')}}",
						data:{'state_id':id,"_token": "{{ csrf_token() }}"},
						success:function(data)
						{
							$("#city").empty();
							$("#city").html('<option value="">--Select--</option>');
							$.each(data,function(key,value){
								$("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
							});

							$("#city").niceSelect('update');

						}

					});
			});

			$(document).on('change','.bill_address',function(){
				var _this = $(this);
				var value = _this.val();
				console.log(value);
				if(value=='new')
				{
					$('.bill_new').removeClass('d-none');
				}
				else
				{
					$('.bill_new').addClass('d-none');
					$('p.error-container').html("");
				}
			});

			$(document).on('submit', 'form#checkout-form', function (event) {
                event.preventDefault();
                //clearing the error msg
                $('p.error-container').html("");

                var form = $(this);
                var data = new FormData($(this)[0]);
                var url = form.attr("action");
                var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
                $('.place_order').attr('disabled',true);
				$('.place_order').css({'opacity':0.5});
                if ($('.place_order').html() !== loadingText) {
                    $('.place_order').html(loadingText);
                }
                    $.ajax({
                        type: form.attr('method'),
                        url: url,
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            window.setTimeout(function(){
                                $('.place_order').attr('disabled',false);
								$('.place_order').css({'opacity':1});
                                $('.place_order').html('PLACE ORDER');
                            },2000);
                            if(response.success==true) {
                                // redirect to google after 5 seconds
                                window.setTimeout(function() {
                                    window.location=response.url;
                                }, 2000);

                            }
                            //show the form validates error
                            if(response.success==false ) {
                                for (control in response.errors) {
                                var error_text = control.replace('.',"_");
                                $('.error-'+error_text).html(response.errors[control]);
                                // $('#error-'+error_text).html(response.errors[error_text][0]);
                                // console.log('#error-'+error_text);
                                }
                                // console.log(response.errors);
                            }
                        },
                        error: function (response) {
                            // alert("Error: " + errorThrown);
                            // console.log(response);
                        }
                    });
                    event.stopImmediatePropagation();
                    return false;
    		});


		});
	</script>
@include('layouts.front.footer')
