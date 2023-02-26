@include('layouts.front.header')
@php
   use App\Helpers\Helper;
   use App\Wishlist;

   $min_product = Helper::getMinProductPrice();
   $max_product = Helper::getMaxProductPrice();

   //dd($max_product);
@endphp

<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners1.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Shop</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">Products</li>
					</ul>

					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
</div>
<div class="shop-page-wrapper">

		<!--=======  shop page header  =======-->

		<div class="shop-page-header">
			<div class="container">
				<div class="row align-items-center">

					<div class="col-12 col-lg-7 col-md-10 d-none d-md-block">
						<!--=======  fitler titles  =======-->
						<div class="filter-title filter-title--type-two">
							<ul class="product-filter-menu">
								<li class="active" data-filter="*">All</li>
								<li data-filter=".hot">Hot Products</li>
								<!-- <li data-filter=".new">New products</li> -->
								<!-- <li data-filter=".sale">saler Ranking</li> -->
							</ul>
						</div>
						<!--=======  End of fitler titles  =======-->
					</div>

					<div class="col-12 col-lg-5 col-md-2">
						<!--=======  filter icons  =======-->

						<div class="filter-icons">
							<!--=======  filter dropdown  =======-->

							{{-- <div class="single-icon filter-dropdown">
								<select class="nice-select sorting">
									<option value="0">Default sorting</option>
									<option value="1">Sort by popularity</option>
									<option value="2">Sort by average rating</option>
									<option value="3">Sort by latest</option>
									<option value="4">Sort by price: low to high</option>
									<option value="5">Sort by price: high to low</option>
								</select>
							</div> --}}

							<!--=======  End of filter dropdown  =======-->

							<!--=======  grid icons  =======-->

							<div class="single-icon grid-icons">
								<a data-target="five-column" href="javascript:void(0)"><i class="ti-layout-grid4-alt"></i></a>
								<a data-target="four-column" class="active" href="javascript:void(0)"><i
										class="ti-layout-grid3-alt"></i></a>
								<a data-target="three-column" href="javascript:void(0)"><i class="ti-layout-grid2-alt"></i></a>
								<a data-target="list" href="javascript:void(0)"><i class="ti-view-list"></i></a>
							</div>

							<!--=======  End of grid icons  =======-->

							<!--=======  advance filter icon  =======-->

							<!-- <div class="single-icon advance-filter-icon">
								<a href="javascript:void(0)" id="advance-filter-active-btn"><i class="ion-android-funnel"></i>
									Filters</a>
							</div> -->

							<!--=======  End of advance filter icon  =======-->
						</div>

						<!--=======  End of filter icons  =======-->
					</div>

				</div>
			</div>
		</div>

		<!--=======  End of shop page header  =======-->


		<!--=============================================
		=            shop page content         =
		=============================================-->

		@php
			$categories = Helper::get_categories();
			$brands = Helper::get_brands();
		@endphp

		<div class="shop-page-content mt-100 mb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 order-2 order-lg-1">
						<!--=======  page sidebar  =======-->

						<div class="page-sidebar">
							<!--=======  single sidebar widget  =======-->

							<div class="single-sidebar-widget mb-40">
								<!--=======  search widget  =======-->

								<div class="search-widget">
									{{-- <form action="#">
										<input type="search" placeholder="Search products ...">
										<button type="button"><i class="ion-android-search"></i></button>
									</form> --}}
								</div>

								<!--=======  End of search widget  =======-->
							</div>


							<!--=======  End of single sidebarwidget  =======-->

							<!--=======  single sidebar widget  =======-->
							@if(count($categories)>0)
								<div class="single-sidebar-widget mb-40">
									<h2 class="single-sidebar-widget--title">Categories</h2>
									<ul class="single-sidebar-widget--list single-sidebar-widget--list--category">
										@foreach($categories as $item)
											@php
												$category_products = Helper::get_category_products($item->id);
											@endphp
											<li><a href="{{url('/product/?category_id='.Crypt::encryptString($item->id))}}">{{$item->name}}</a> <span class="quantity">({{count($category_products)}})</span></li>
										@endforeach
									</ul>
								</div>
							@endif

							<!--=======  End of single sidebar widget  =======-->

							<!--=======  single sidebar widget  =======-->
							@if(count($brands)>0)
								<div class="single-sidebar-widget mb-40">
									<h2 class="single-sidebar-widget--title">Brands</h2>
									<ul class="single-sidebar-widget--list single-sidebar-widget--list--category">
										@foreach($brands as $item)
											@php
												$brand_products = Helper::get_brand_products($item->id)
											@endphp
											<li><a href="{{url('/product/?brand_id='.Crypt::encryptString($item->id))}}">{{$item->name}}</a> <span class="quantity">({{count($brand_products)}})</span></li>
										@endforeach
									</ul>
								</div>
							@endif
							<!--=======  End of single sidebar widget  =======-->

							<!--=======  single sidebar widget  =======-->

							<div class="single-sidebar-widget mb-40">
								<h2 class="single-sidebar-widget--title">Filters</h2>
								<div class="sidebar-price">
									<div id="price-range"></div>
									<div class="output-wrapper mt-20">
										<input type="text" id="price-amount" class="price-amount" readonly>
										<form method="get" action="" id="price_filter_frm">
											<input type="hidden" id="min-price" name="min-price" value="{{isset($_GET['min-price']) ? $_GET['min-price'] : 0 }}">
											<input type="hidden" id="max-price" name="max-price" value="{{isset($_GET['max-price']) ? $_GET['max-price'] : 500 }}">
											{{-- <button class="price-range-button" type="submit"><i class="ion-android-funnel"></i> Filter</button> --}}
										</form>
									</div>
								</div>
							</div>

							<!--=======  End of single sidebar widget  =======-->

							<!--=======  single sidebar widget  =======-->

							@if(count($top_3_products)>0)
								<div class="single-sidebar-widget mb-40">
									<h2 class="single-sidebar-widget--title">Popular products</h2>

									<!--=======  widget product wrapper  =======-->

									<div class="widget-product-wrapper">
										<!--=======  single widget product  =======-->

										@foreach($top_3_products as $item)
											@php
												$url = asset('images/no-product.png');
												$product_t = Helper::get_product_thumbnail_image($item->id);
												if($product_t!=NULL)
												{
													$url = asset('uploads/products/image/'.$product_t->file_name);
												}

                                                $user_product_attr = Helper::getProductAttributeByPrice($item->id);
											@endphp
											<div class="single-widget-product-wrapper">
												<div class="single-widget-product">
													<!--=======  image  =======-->

													<div class="single-widget-product__image">
														<a href="">
															<img src="{{$url}}" class="img-fluid" alt="">
														</a>
													</div>

													<!--=======  End of image  =======-->

													<!--=======  content  =======-->

													<div class="single-widget-product__content">

														<div class="single-widget-product__content__top">
															<h3 class="product-title"><a href="" title="{{$item->product_title}}">{{Str::limit($item->product_title,30,'...')}}</a></h3>
															<div class="price">
																<span class="main-price discounted">${{$user_product_attr->price}}</span>
																<span class="discounted-price">${{$user_product_attr->discounted_price}}</span>
															</div>
														</div>

													</div>

													<!--=======  End of content  =======-->
												</div>
											</div>
										@endforeach
									</div>
								</div>
							@endif

						</div>

						<!--=======  End of page sidebar  =======-->
					</div>
					<div class="col-lg-9 order-1 order-lg-2 mb-md-80 mb-sm-80">
						@if(count($all_products)>0)
							<div class="row product-isotope shop-product-wrap four-column">

								@foreach($all_products as $item)
									@php
										$url = asset('images/no-product.png');
										$product_t = Helper::get_product_thumbnail_image($item->product_id);
										if($product_t!=NULL)
										{
											$url = asset('uploads/products/image/'.$product_t->file_name);
										}
										$hot = '';
										if($item->is_popular==1)
										{
											$hot = 'hot';
										}

                                        $user_product_attr = Helper::getProductAttributeByPrice($item->product_id);
									@endphp
									<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 {{$hot}}">
										<div class="single-product">
											<!--=======  single product image  =======-->

											<div class="single-product__image">
												<a class="image-wrap" href="{{url('/product-detail',['id'=>Crypt::encryptString($item->product_id)])}}">
													<img src="{{$url}}" class="img-fluid" alt="">
													<img src="{{$url}}" class="img-fluid" alt="">
												</a>
												@if($item->is_popular==1)
													<div class="single-product__floating-badges">
														<span class="hot">hot</span>
													</div>
												@endif

												<div class="single-product__floating-icons">
													<span class="wishlist">
													@auth('customer')
														@php
															$user_id = Auth::guard('customer')->user()->id;
															$wish_item = Wishlist::where(['user_id'=>$user_id,'product_id'=>$item->product_id])->first();
														@endphp
														<a href="javascript:void(0)" @if($wish_item==NULL) class="add_wishlist" data-id="{{Crypt::encryptString($item->product_id)}}" @else class="disabled-link" @endif data-tippy="Add to wishlist" data-tippy-inertia="true"
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
													<span class="compare"><a href="#" class="compareproduct" rel="{{$item->product_id}}" data-tippy="Compare" data-tippy-inertia="true"
															data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
															data-tippy-theme="sharpborder" data-tippy-placement="left"><i
																class="ion-ios-shuffle-strong"></i></a></span>
													<!-- <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
															data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
															data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
																class="ion-ios-search-strong"></i></a></span> -->
												</div>
											</div>

											<!--=======  End of single product image  =======-->

											<!--=======  single product content  =======-->

											<div class="single-product__content">
												<div class="title">
													<h3> <a href="{{url('/product-detail',['id'=>Crypt::encryptString($item->product_id)])}}">{{Str::limit($item->product_title,30,'...')}}</a></h3>

												</div>
												<div class="price">
													<span class="discounted-price">${{$user_product_attr->discounted_price}}</span>
												</div>
											</div>

											<!--=======  End of single product content  =======-->
										</div>
										<div class="single-product--list">
											<!--=======  single product image  =======-->

											<div class="single-product__image">
												<a class="image-wrap" href="{{url('/product-detail',['id'=>Crypt::encryptString($item->product_id)])}}">
													<img src="{{$url}}" class="img-fluid" alt="">
													<img src="{{$url}}" class="img-fluid" alt="">
												</a>

												@if($item->is_popular==1)
													<div class="single-product__floating-badges">
														<span class="hot">hot</span>
													</div>
												@endif

												<div class="single-product__floating-icons">
													<span class="wishlist">
													@auth('customer')
														@php
															$user_id = Auth::guard('customer')->user()->id;
															$wish_item = Wishlist::where(['user_id'=>$user_id,'product_id'=>$item->product_id])->first();
														@endphp
														<a href="javascript:void(0)" @if($wish_item==NULL) class="add_wishlist" data-id="{{Crypt::encryptString($item->product_id)}}" @else class="disabled-link" @endif data-tippy="Add to wishlist" data-tippy-inertia="true"
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

													<span class="compare"><a href="#" class="compareproduct" rel="{{$item->product_id}}" data-tippy="Compare" data-tippy-inertia="true"
															data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
															data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
																class="ion-ios-shuffle-strong"></i></a></span>

													<!-- <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
															data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
															data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
																class="ion-ios-search-strong"></i></a></span> -->
												</div>



											</div>

											<!--=======  End of single product image  =======-->

											<!--=======  single product content  =======-->

											<div class="single-product__content">

												<div class="title">
													<h3> <a href="{{url('/product-detail',['id'=>Crypt::encryptString($item->id)])}}">{{Str::limit($item->product_title,30,'...')}}</a></h3>
												</div>
												<div class="price">

													<span class="discounted-price">${{$user_product_attr->discounted_price}}</span>
												</div>
												<p class="short-desc">
													{{$item->short_description}}
												</p>

												{{-- <a href="{{url('/cart/add',['id'=>Crypt::encryptString($item->id)])}}" class="lezada-button lezada-button--medium">ADD TO CART</a> --}}

											</div>

											<!--=======  End of single product content  =======-->
										</div>
									</div>
								@endforeach

							</div>

							<div class="row">
								<div class="col-lg-12 text-center mt-30">
									{{-- <a class="lezada-button lezada-button--medium lezada-button--icon--left" href="#"><i
											class="ion-android-add"></i> MORE</a> --}}
                                        {!! $all_products->render() !!}
								</div>
							</div>
						@endif

					</div>
				</div>
			</div>
		</div>

		<!--=====  End of shop page content  ======-->
</div>

@include('layouts.front.footer')

<script type="text/javascript">
	/*----------  price filter  ----------*/
    var min_price = parseInt("{{$min_product!=NULL ? $min_product->price : 0}}");
    var max_price = parseInt("{{$max_product!=NULL ? $max_product->price : 500}}");
  $("#price-range").slider({
    range: true,
    min: min_price,
    max: max_price,
    values: [min_price, max_price],
    slide: function (event, ui) {
    	$('#min-price').val(ui.values[0]);
    	$('#max-price').val(ui.values[1]);
      $("#price-amount").val(
        "Price: " + "$" + ui.values[0] + " - $" + ui.values[1]
      );

	  window.setTimeout(function() {
		$('#price_filter_frm').submit();
	  }, 2000);

    }
  });
  $("#price-amount").val(
    "Price: " +
      "$" +
      $("#price-range").slider("values", "{{isset($GET['min-price']) ? $GET['min-price'] : 0 }}") +
      " - $" +
      $("#price-range").slider("values", "{{isset($GET['max-price']) ? $GET['max-price'] : 1}}")
  );
</script>
