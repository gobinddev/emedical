@include('layouts.front.header')

@php
$products = (array) json_decode(json_encode($products),true);
// echo "<pre>"; print_r($products[0]['product_title']); die;
@endphp
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners1.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Compare</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">Compare</li>
					</ul>

					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>

<div class="compare-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70">
		<div class="container">
			<div class="row">
                @if(Session::has('message'))
                    <div class="col-12 pt-4">
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    </div>
                @endif
				<div class="col-lg-12">
					<!-- Compare Page Content Start -->
					<div class="compare-page-content-wrap">
						<div class="compare-table table-responsive">
							<table class="table table-bordered mb-0">
                                <tbody>
                                @if(count($products)>0)
									<tr>
										<th class="first-column">Product Info</th>

										{{-- <td class="product-image-title">
											<div class="compare-remove">
												<a href="#"><i class="fa fa-times"></i>remove</a>
											</div>
											<a href="#" class="image">
												<img class="img-fluid" src="{{asset('uploads/products/image/'.$products[0]['images']['file_name'])}}" alt="Compare Product">
											</a>
											<div class="pro-title">
												<a href="#">@php echo $products[0]['product_title']; @endphp</a>
											</div>
											<div class="compare-btn">
												<a href="{{url('/cart')}}">Add to cart</a>
											</div>
										</td>
										<td class="product-image-title">
											<div class="compare-remove">
												<a href="#"><i class="fa fa-times"></i>remove</a>
											</div>
											<a href="#" class="image">
												<img class="img-fluid" src="{{asset('uploads/products/image/'.$products[1]['images']['file_name'])}}" alt="Compare Product">
											</a>
											<div class="pro-title">
												<a href="#">@php echo $products[1]['product_title']; @endphp</a>
											</div>
											<div class="compare-btn">
												<a href="{{url('/cart')}}">Add to cart</a>
											</div>
										</td> --}}

                                        @foreach ($products as $product)
                                            <td class="product-image-title">
                                                <div class="compare-remove">
                                                    <a href="javascript:;" class="remove-compare" rel="{{Crypt::encryptString($product['id'])}}"><i class="fa fa-times"></i>remove</a>
                                                </div>
                                                <a href="#" class="image">
                                                    <img class="img-fluid" src="{{asset('uploads/products/image/'.$product['images']['file_name'])}}" alt="Compare Product">
                                                </a>
                                                <div class="pro-title">
                                                    <a href="#">@php echo $product['product_title']; @endphp</a>
                                                </div>
                                                {{-- <div class="compare-btn">
                                                    <a href="{{url('/cart')}}">Add to cart</a>
                                                </div> --}}
                                            </td>
                                        @endforeach

									</tr>
									<tr>
										<th class="first-column">Price</th>
										{{-- <td class="pro-price">${{$products[0]['attributes']['discounted_price']}}</td>
										<td class="pro-price">${{$products[1]['attributes']['discounted_price']}}</td> --}}
                                        @foreach ($products as $product)
                                            <td class="pro-price">${{$product['attributes']['discounted_price']}}</td>
                                        @endforeach
									</tr>
									<tr>
										<th class="first-column">Sku</th>
										{{-- <td class="pro-sku">REF. {{$products[0]['attributes']['sku']}}</td>
										<td class="pro-sku">REF. {{$products[1]['attributes']['sku']}}</td> --}}
                                        @foreach ($products as $product)
                                            <td class="pro-sku">REF. {{$product['attributes']['sku']}}</td>
                                        @endforeach
									</tr>
									<tr>
										<th class="first-column">Description</th>
                                        {{-- <td class="pro-desc">
											<p>@php echo $products[0]['short_description']; @endphp</p>
										</td>
										<td class="pro-desc">
											<p>@php echo $products[1]['short_description']; @endphp</p>
										</td> --}}
                                        @foreach ($products as $product)
                                            <td class="pro-desc">
                                                <p>{{$product['short_description']}}</p>
                                            </td>
                                        @endforeach
									</tr>
									<tr>
										<th class="first-column">Availability</th>
                                        {{-- <td class="pro-stock">In Stock</td>
										<td class="pro-stock">in stock</td> --}}
                                        @foreach ($products as $product)
										    <td class="pro-stock">In Stock</td>
                                        @endforeach
									</tr>
									<tr>
										<th class="first-column">Weight</th>
										{{-- <td class="pro-weight">N/A</td>
										<td class="pro-weight">N/A</td> --}}
                                        @foreach ($products as $product)
                                            <td class="pro-weight">N/A</td>
                                        @endforeach
									</tr>
									<tr>
										<th class="first-column">Dimensions</th>
										{{-- <td class="pro-dimensions">N/A</td>
										<td class="pro-dimensions">N/A</td> --}}
                                        @foreach ($products as $product)
                                            <td class="pro-dimensions">N/A</td>
                                        @endforeach
									</tr>
                                @else
                                    <tr class="text-center">
                                        <td colspan="3">No Products to Compare</td>
                                    </tr>
                                @endif
								</tbody>
							</table>
						</div>
					</div>
					<!-- Compare Page Content End -->
				</div>
			</div>
		</div>
	</div>

@include('layouts.front.footer')
