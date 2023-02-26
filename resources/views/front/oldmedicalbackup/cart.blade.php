@include('layouts.front.header')
<style>
	input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}

input[type=number] {
    -moz-appearance:textfield; /* Firefox */
}
</style>
@php
	use App\Helpers\Helper;
@endphp
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners1.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Shopping Cart</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">Shopping Cart</li>
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
            </div>
            @if(count($cartItems)>0)
                <form method="post" action="{{route('customer.cart.update')}}">
                    @csrf
			@endif
                <div class="row">

                    <div class="col-lg-12 mb-30">
                        <!--=======  cart table  =======-->

                        <div class="cart-table-container">
                            <table class="cart-table">
                                <thead>
                                    <tr>
                                        <th class="product-name" colspan="2">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity text-center" width="15%">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove" width="10%">&nbsp;</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- <tr>
                                        <td class="product-thumbnail">
                                            <a href="shop-product-basic.html">
                                                <img src="{{asset('assets/images/products/bag-1-1-600x800.jpg')}}" class="img-fluid" alt="">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="shop-product-basic.html">Black Fabric Watch</a>
                                            <span class="product-variation">Color: Black</span>
                                        </td>

                                        <td class="product-price"><span class="price">$100.00</span></td>

                                        <td class="product-quantity">
                                            <div class="pro-qty d-inline-block mx-0">
                                                <input type="text" value="1">
                                            </div>
                                        </td>

                                        <td class="total-price"><span class="price">$100.00</span></td>

                                        <td class="product-remove">
                                            <a href="#">
                                                <i class="ion-android-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="shop-product-basic.html">
                                                <img src="{{asset('assets/images/products/watch-1-1-600x800.jpg')}}" class="img-fluid" alt="">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="shop-product-basic.html">Brown watch</a>
                                            <span class="product-variation">Color: Brown</span>
                                        </td>

                                        <td class="product-price"><span class="price">$150.00</span></td>

                                        <td class="product-quantity">
                                            <div class="pro-qty d-inline-block mx-0">
                                                <input type="text" value="1">
                                            </div>
                                        </td>

                                        <td class="total-price"><span class="price">$250.00</span></td>

                                        <td class="product-remove">
                                            <a href="#">
                                                <i class="ion-android-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="shop-product-basic.html">
                                                <img src="{{asset('assets/images/products/cloth-1-1-600x800.jpg')}}" class="img-fluid" alt="">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="shop-product-basic.html">High weist pant</a>
                                            <span class="product-variation">Color: Blue</span>
                                        </td>

                                        <td class="product-price"><span class="price">$10.00</span></td>

                                        <td class="product-quantity">
                                            <div class="pro-qty d-inline-block mx-0">
                                                <input type="number" value="1" min="1">
                                            </div>
                                        </td>

                                        <td class="total-price"><span class="price">$260.00</span></td>

                                        <td class="product-remove">
                                            <a href="#">
                                                <i class="ion-android-close"></i>
                                            </a>
                                        </td>
                                    </tr> -->
                                    @if(count($cartItems)>0)
                                        @php
                                            $i=0;
                                        @endphp
                                        @foreach($cartItems as $key => $item)
                                            @php
                                                $url = asset('images/no-product.png');
                                                $product_t = Helper::get_product_thumbnail_image($item->associatedModel->id);
                                                if($product_t!=NULL)
                                                {
                                                    $url = asset('uploads/products/image/'.$product_t->file_name);
                                                }
                                            @endphp
                                            <tr>
                                                <input type="hidden" name="item_id[]" value="{{Crypt::encryptString($item->id)}}">
                                                <td class="product-thumbnail">
                                                    <a href="{{url('/product-detail',['id'=>Crypt::encryptString($item->associatedModel->id)])}}">
                                                        <img src="{{$url}}" class="img-fluid" alt="">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="{{url('/product-detail',['id'=>Crypt::encryptString($item->associatedModel->id)])}}">{{$item->name}}</a>
                                                </td>

                                                <td class="product-price"><span class="price">${{$item->price}}</span></td>

                                                <td class="product-quantity text-center">
                                                    <div class="pro-qty d-inline-block mx-0">
                                                        <input type="text" value="{{$item->quantity}}" name="quantity[]">
                                                    </div>
                                                    @if($errors->has('quantity.'.$i))
                                                        <div class="error text-danger">
                                                            {{$errors->first('quantity.'.$i)}}
                                                        </div>
                                                    @endif
                                                </td>

                                                <td class="total-price"><span class="price">${{\Cart::session(Auth::guard('customer')->user()->id)->get($item->id)->getPriceSum()}}</span></td>

                                                <td class="product-remove">
                                                    <a href="{{route('customer.cart.delete',['id'=>Crypt::encryptString($item->id)])}}">
                                                        <i class="ion-android-close"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr class="text-center">
                                            <td colspan="5">No Shopping Cart Item Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <!--=======  End of cart table  =======-->
                    </div>
                    @if(count($cartItems)>0)
                        <div class="col-lg-12 mb-80">
                            <!--=======  coupon area  =======-->

                            <div class="cart-coupon-area pb-30">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 mb-md-30 mb-sm-30">
                                        <!--=======  coupon form  =======-->

                                        <!-- <div class="lezada-form coupon-form">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-md-7 mb-sm-10">
                                                        <input type="text" placeholder="Enter your coupon code">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <button class="lezada-button lezada-button--medium">apply coupon</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> -->

                                        <!--=======  End of coupon form  =======-->
                                    </div>

                                        <div class="col-lg-6 text-left text-lg-right">
                                            <!--=======  update cart button  =======-->

                                            <button type="submit" class="lezada-button lezada-button--medium">update cart</button>

                                            <!--=======  End of update cart button  =======-->
                                        </div>

                                </div>
                            </div>

                            <!--=======  End of coupon area  =======-->
                        </div>

                        <div class="col-xl-4 offset-xl-8 col-lg-5 offset-lg-7">
                            <div class="cart-calculation-area">
                                <h2 class="mb-40">Cart totals</h2>

                                <table class="cart-calculation-table mb-30">
                                    <tr>
                                        <th>SUBTOTAL</th>
                                        <td class="subtotal">${{\Cart::session(Auth::guard('customer')->user()->id)->getSubTotal()}}</td>
                                    </tr>
                                    <tr>
                                        <th>TOTAL</th>
                                        <td class="total">${{\Cart::session(Auth::guard('customer')->user()->id)->getTotal()}}</td>
                                    </tr>
                                </table>

                                <div class="cart-calculation-button text-center">
                                    <a href="{{url('/checkout')}}" class="lezada-button lezada-button--medium">proceed to checkout</a>
                                </div>
                            </div>
                        </div>

                    @endif

                </div>
            @if(count($cartItems)>0)
                </form>
            @endif
		</div>
	</div>
	<script>
	</script>
	@include('layouts.front.footer')
