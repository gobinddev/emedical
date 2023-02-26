@include('layouts.front.header')
@php
use App\Helpers\Helper;
@endphp

<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners1.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Wishlist</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">Wishlist</li>
					</ul>

					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>

<div class="shopping-cart-area mb-130">
		<div class="container">
			<div class="row">
				@if(Session::has('message'))
					<div class="col-12 mb-30">
						<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
					</div>
				@endif
				<div class="col-lg-12">
					<!--=======  cart table  =======-->

					<div class="cart-table-container">
						<table class="cart-table">
							<thead>
								<tr>
									<th class="product-name" width="50%" colspan="2">Product</th>
									<th class="product-price">Price</th>
									<th class="product-quantity text-center" width="15%">Quantity</th>
									<th class="product-subtotal">&nbsp;</th>
									<th class="product-remove">&nbsp;</th>
								</tr>
							</thead>

							<tbody>
								<!-- <tr>
									<td class="product-thumbnail">
										<a href="#">
											<img src="{{asset('assets/images/products/bag-1-1-600x800.jpg')}}" class="img-fluid" alt="">
										</a>
									</td>
									<td class="product-name">
										<a href="#">Black Fabric Watch</a>
										<span class="product-variation">Color: Black</span>
									</td>

									<td class="product-price"><span class="price">$100.00</span></td>

									<td class="product-quantity">
										<div class="pro-qty d-inline-block mx-0">
											<input type="text" value="1">
										</div>
									</td>

									<td class="add-to-cart"><button class="lezada-button lezada-button--small lezada-button--icon--left">
											<i class="ion-ios-cart-outline"></i> add to cart</button></td>

									<td class="product-remove">
										<a href="#">
											<i class="ion-android-close"></i>
										</a>
									</td>
								</tr>
								<tr>
									<td class="product-thumbnail">
										<a href="#">
											<img src="{{asset('assets/images/products/watch-1-1-600x800.jpg')}}" class="img-fluid" alt="">
										</a>
									</td>
									<td class="product-name">
										<a href="#">Brown watch</a>
										<span class="product-variation">Color: Brown</span>
									</td>

									<td class="product-price"><span class="price">$150.00</span></td>

									<td class="product-quantity">
										<div class="pro-qty d-inline-block mx-0">
											<input type="text" value="1">
										</div>
									</td>

									<td class="add-to-cart"><button class="lezada-button lezada-button--small lezada-button--icon--left">
											<i class="ion-ios-cart-outline"></i> add to cart</button></td>

									<td class="product-remove">
										<a href="#">
											<i class="ion-android-close"></i>
										</a>
									</td>
								</tr>
								<tr>
									<td class="product-thumbnail">
										<a href="#">
											<img src="{{asset('assets/images/products/cloth-1-1-600x800.jpg')}}" class="img-fluid" alt="">
										</a>
									</td>
									<td class="product-name">
										<a href="#">High weist pant</a>
										<span class="product-variation">Color: Blue</span>
									</td>

									<td class="product-price"><span class="price">$10.00</span></td>

									<td class="product-quantity">
										<div class="pro-qty d-inline-block mx-0">
											<input type="text" value="1">
										</div>
									</td>

									<td class="add-to-cart"><button class="lezada-button lezada-button--small lezada-button--icon--left">
											<i class="ion-ios-cart-outline"></i> add to cart</button></td>

									<td class="product-remove">
										<a href="#">
											<i class="ion-android-close"></i>
										</a>
									</td>
								</tr> -->
								@if(count($wishItems)>0)
									@foreach($wishItems as $key => $item)
										@php
											$user_id = Auth::guard('customer')->user()->id;
											$url = asset('images/no-product.png');
											$product_t = Helper::get_product_thumbnail_image($item->product_id);
											if($product_t!=NULL)
											{
												$url = asset('uploads/products/image/'.$product_t->file_name);
											}

											$product = Helper::get_product_data($item->product_id);

											// $cartItem = \Cart::session($user_id)->get($item->product_id);

                                            $cartItem = \Cart::session($user_id)->get($item->product_attribute_id);

                                            $product_attribute = Helper::productAttributeData($item->product_attribute_id);
										@endphp
										<tr>
											<td class="product-thumbnail">
												<a href="{{url('/product-detail',['id'=>Crypt::encryptString($item->product_id)])}}">
													<img src="{{$url}}" class="img-fluid" alt="">
												</a>
											</td>
											<td class="product-name">
												<a href="{{url('/product-detail',['id'=>Crypt::encryptString($item->product_id)])}}">{{$product->product_title}}</a>
											</td>

											<td class="product-price"><span class="price">${{$product_attribute!=NULL ? $product_attribute->discounted_price : $product->discounted_price}}</span></td>
											@if($cartItem!=NULL)
												<td class="product-quantity">
													&nbsp;
												</td>

												<td class="add-to-cart">
													<span class="badge badge-success">Added to Cart</span>
												</td>
											@else
												<form method="post" action="{{route('customer.wishlist.addToCart',['id'=>Crypt::encryptString($item->id)])}}" id="post_frm">
													@csrf
                                                    <input type="hidden" name="product_id" id="product_id" value="{{Crypt::encryptString($item->product_id)}}">
													<td class="product-quantity">
														<div class="pro-qty d-inline-block mx-0">
															<input type="text" value="{{$item->qty}}" name="quantity-{{$item->id}}">
														</div>
                                                        <p style="margin-bottom: 2px;" class="text-danger error-container error-quantity-{{$item->id}}" id="error-quantity-{{$item->id}}"></p>
														{{-- @if($errors->has('quantity-'.$item->id))
															<div class="error text-danger">
																{{$errors->first('quantity'.$item->id)}}
															</div>
														@endif --}}
													</td>

													<td class="add-to-cart">
														<button type="submit" class="lezada-button lezada-button--small lezada-button--icon--left submit" id="submit">
															<i class="ion-ios-cart-outline"></i> add to cart
														</button>
													</td>
												</form>
											@endif

											<td class="product-remove">
												<a href="{{route('customer.wishlist.delete',['id'=>Crypt::encryptString($item->product_id)])}}">
													<i class="ion-android-close"></i>
												</a>
											</td>
										</tr>
									@endforeach
								@else
									<tr class="text-center">
										<td colspan="5">Wishlist is Empty</td>
									</tr>
								@endif
							</tbody>
						</table>
					</div>

					<!--=======  End of cart table  =======-->
				</div>
			</div>
		</div>
	</div>

    <script>
        $(document).ready(function(){
            $(document).on('submit', 'form#post_frm', function(event) {
                    event.preventDefault();
                    //clearing the error msg
                    $('p.error-container').html("");
                    var _this = $(this);
                    var product_id = $('#product_id').val();

                    var form = $(this);
                    var data = new FormData($(this)[0]);
                    var url = form.attr("action");
                    var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
                    $('#submit').attr('disabled', true);
                    if ($('#submit').html() !== loadingText) {
                        $('#submit').html(loadingText);
                    }
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('customer.check-vendor-product') }}",
                        data: {'_token':'{{csrf_token()}}','product_id':product_id},
                        success: function(res) {
                            if(res.success==false)
                            {
                                window.location.href="{{route('customer.login')}}";
                            }
                            else if(res.success)
                            {
                                if(res.vendor_cnt > 1)
                                {
                                    swal({
                                        // icon: "warning",
                                        type: "warning",
                                        title: "Are you sure want to add this product to cart ?",
                                        text: "To add the others vendors product you need to remove the existing vendors product from cart.",
                                        dangerMode: true,
                                        showCancelButton: true,
                                        confirmButtonColor: "#92318B",
                                        confirmButtonText: "YES",
                                        cancelButtonText: "CANCEL",
                                        closeOnConfirm: false,
                                        closeOnCancel: false
                                        },
                                        function(e){
                                        if(e==true)
                                        {
                                            formAjax(form,data,url,loadingText);
                                            swal.close();
                                        }
                                        else
                                        {
                                            swal.close();
                                            window.setTimeout(function() {
                                                $('#submit').attr('disabled', false);
                                                $('#submit').html('<i class="ion-ios-cart-outline"></i> Add to Cart');
                                            }, 2000);
                                        }
                                    });
                                }
                                else
                                {
                                    formAjax(form,data,url,loadingText);
                                }
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {

                        }
                    });

                    event.stopImmediatePropagation();
                    return false;
            });
        });

        function formAjax(form,data,url,loadingText)
        {
            $.ajax({
                type: form.attr('method'),
                url: url,
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    window.setTimeout(function() {
                        $('#submit').attr('disabled', false);
                        $('#submit').html('<i class="ion-ios-cart-outline"></i> Add to Cart');
                    }, 2000);
                    if (response.success == true) {
                        // redirect to google after 5 seconds
                        window.setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    }
                    //show the form validates error
                    if (response.success == false) {
                        for (control in response.errors) {
                            var error_text = control.replace('.', "_");
                            $('.error-' + error_text).html(response.errors[control]);
                            // $('#error-'+error_text).html(response.errors[error_text][0]);
                            // console.log('#error-'+error_text);
                        }
                        // console.log(response.errors);
                    }
                },
                error: function(response) {
                    // alert("Error: " + errorThrown);
                    // console.log(response);
                }
            });
        }
    </script>

    @include('layouts.front.footer')
