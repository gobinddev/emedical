@include('layouts.front.header')


<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners.png);">
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
								<li data-filter=".hot">hot products</li>
								<li data-filter=".new">new products</li>
								<li data-filter=".sale">sale products</li>
							</ul>
						</div>
						<!--=======  End of fitler titles  =======-->
					</div>

					<div class="col-12 col-lg-5 col-md-2">
						<!--=======  filter icons  =======-->

						<div class="filter-icons">
							<!--=======  filter dropdown  =======-->

							<div class="single-icon filter-dropdown">
								<select class="nice-select">
									<option value="0">Default sorting</option>
									<option value="1">Sort ny popularity</option>
									<option value="0">Sort by average rating</option>
									<option value="0">Sort by latest</option>
									<option value="0">Sort by price: low to high</option>
									<option value="0">Sort by price: high to low</option>
								</select>
							</div>

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

							<div class="single-icon advance-filter-icon">
								<a href="javascript:void(0)" id="advance-filter-active-btn"><i class="ion-android-funnel"></i>
									Filters</a>
							</div>

							<!--=======  End of advance filter icon  =======-->
						</div>

						<!--=======  End of filter icons  =======-->
					</div>

				</div>
			</div>
		</div>

		<!--=======  End of shop page header  =======-->

		<!--=============================================
        =            shop advance filter area         =
        =============================================-->

		<div class="shop-advance-filter-area" id="shop-advance-filter-area">
			<div class="shop-advance-filter-wrapper pt-50">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-4 col-sm-6 mb-50">
							<!--=======  single advance filte  =======-->

							<div class="single-filter-widget">
								<h2 class="single-filter-widget--title">Sort by</h2>
								<ul class="single-filter-widget--list">
									<li><a href="#">Default</a></li>
									<li><a href="#">Popularity</a></li>
									<li><a href="#">Average rating</a></li>
									<li><a href="#">Newness</a></li>
									<li><a href="#">Price: low to high</a></li>
									<li><a href="#">Price: high to low</a></li>
								</ul>
							</div>

							<!--=======  End of single advance filte  =======-->
						</div>

						<div class="col-lg-2 col-md-4 col-sm-6 mb-50">
							<!--=======  single advance filte  =======-->

							<div class="single-filter-widget">
								<h2 class="single-filter-widget--title">Categories</h2>
								<ul class="single-filter-widget--list single-filter-widget--list--category">
									<li class="has-children">
										<a href="#">Cosmetic </a> <span class="quantity">5</span>
										<ul>
											<li><a href="#">For body</a></li>
											<li><a href="#">Make up</a></li>
											<li><a href="#">New</a></li>
											<li><a href="#">Perfumes</a></li>
										</ul>
									</li>
									<li class="has-children">
										<a href="#">Furniture </a> <span class="quantity">23</span>
										<ul>
											<li><a href="#">Sofas</a></li>
											<li><a href="#">Armchairs</a></li>
											<li><a href="#">Desk Chairs</a></li>
											<li><a href="#">Dining Chairs</a></li>
										</ul>
									</li>
									<li><a href="#">Watches </a> <span class="quantity">12</span></li>
								</ul>
							</div>

							<!--=======  End of single advance filte  =======-->
						</div>

						<div class="col-lg-2 col-md-4 col-sm-6 mb-50">
							<!--=======  single advance filte  =======-->

							<div class="single-filter-widget">
								<h2 class="single-filter-widget--title">Price filter</h2>
								<ul class="single-filter-widget--list">
									<li><a href="#">All</a></li>
									<li><a href="#">$0.00 - $70.00</a></li>
									<li><a href="#">$70.00 - $140.00</a></li>
									<li><a href="#">$140.00 - $210.00</a></li>
									<li><a href="#">$210.00 - $280.00</a></li>
									<li><a href="#">$280.00 - $350.00</a></li>
								</ul>
							</div>

							<!--=======  End of single advance filte  =======-->
						</div>

						<div class="col-lg-2 col-md-4 col-sm-6 mb-50">
							<!--=======  single advance filte  =======-->

							<div class="single-filter-widget">
								<h2 class="single-filter-widget--title">Color</h2>
								<ul class="single-filter-widget--list single-filter-widget--list--color">
									<li><a class="active" href="#" data-tippy="Black" data-tippy-inertia="true"
											data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
											data-tippy-theme="sharpborder"><span class="color-picker black"></span></a></li>
									<li><a href="#" data-tippy="Blue" data-tippy-inertia="true" data-tippy-animation="shift-away"
											data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
												class="color-picker blue"></span></a></li>
									<li><a href="#" data-tippy="Brown" data-tippy-inertia="true" data-tippy-animation="shift-away"
											data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
												class="color-picker brown"></span></a></li>
									<li><a href="#" data-tippy="Gold" data-tippy-inertia="true" data-tippy-animation="shift-away"
											data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
												class="color-picker gold"></span></a></li>
									<li><a href="#" data-tippy="Green Coral" data-tippy-inertia="true" data-tippy-animation="shift-away"
											data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
												class="color-picker green-coral"></span></a></li>
									<li><a href="#" data-tippy="Grey" data-tippy-inertia="true" data-tippy-animation="shift-away"
											data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
												class="color-picker grey"></span></a></li>
									<li><a href="#" data-tippy="Oak" data-tippy-inertia="true" data-tippy-animation="shift-away"
											data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
												class="color-picker oak"></span></a></li>
									<li><a href="#" data-tippy="Pink" data-tippy-inertia="true" data-tippy-animation="shift-away"
											data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
												class="color-picker pink"></span></a></li>
									<li><a href="#" data-tippy="Silver" data-tippy-inertia="true" data-tippy-animation="shift-away"
											data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
												class="color-picker silver"></span></a></li>
									<li><a href="#" data-tippy="White" data-tippy-inertia="true" data-tippy-animation="shift-away"
											data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
												class="color-picker white"></span></a></li>
								</ul>
							</div>

							<!--=======  End of single advance filte  =======-->
						</div>

						<div class="col-lg-2 col-md-4 col-sm-6 mb-50">
							<!--=======  single advance filte  =======-->

							<div class="single-filter-widget">
								<h2 class="single-filter-widget--title">Size</h2>
								<ul class="single-filter-widget--list single-filter-widget--list--size">
									<li><a href="#">L</a> <span class="quantity">5</span></li>
									<li><a href="#">M</a> <span class="quantity">5</span></li>
									<li><a href="#">S</a> <span class="quantity">5</span></li>
									<li><a href="#">XS</a> <span class="quantity">5</span></li>
								</ul>
							</div>

							<!--=======  End of single advance filte  =======-->
						</div>

						<div class="col-lg-2 col-md-4 col-sm-6 mb-50">
							<!--=======  single advance filte  =======-->

							<div class="single-filter-widget">
								<h2 class="single-filter-widget--title">Brands</h2>
								<ul class="single-filter-widget--list single-filter-widget--list--brand">
									<li><a href="#">Alliop</a> <span class="quantity">(12)</span></li>
									<li><a href="#">Burberry</a> <span class="quantity">(15)</span></li>
									<li><a href="#">Catmen</a> <span class="quantity">(13)</span></li>
									<li><a href="#">Houdini</a> <span class="quantity">(10)</span></li>
									<li><a href="#">Love</a> <span class="quantity">(70)</span></li>
									<li><a href="#">Made</a> <span class="quantity">(15)</span></li>
								</ul>
							</div>

							<!--=======  End of single advance filte  =======-->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--=====  End of shop advance filter area  ======-->

		<!--=============================================
		=            shop page content         =
		=============================================-->

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
									<form action="#">
										<input type="search" placeholder="Search products ...">
										<button type="button"><i class="ion-android-search"></i></button>
									</form>
								</div>

								<!--=======  End of search widget  =======-->
							</div>


							<!--=======  End of single sidebarwidget  =======-->

							<!--=======  single sidebar widget  =======-->

							<div class="single-sidebar-widget mb-40">
								<h2 class="single-sidebar-widget--title">Categories</h2>
								<ul class="single-sidebar-widget--list single-sidebar-widget--list--category">
									<li class="has-children">
										<a href="#">Cosmetic </a> <span class="quantity">5</span>
										<ul>
											<li><a href="#">For body</a></li>
											<li><a href="#">Make up</a></li>
											<li><a href="#">New</a></li>
											<li><a href="#">Perfumes</a></li>
										</ul>
									</li>
									<li class="has-children">
										<a href="#">Furniture </a> <span class="quantity">23</span>
										<ul>
											<li><a href="#">Sofas</a></li>
											<li><a href="#">Armchairs</a></li>
											<li><a href="#">Desk Chairs</a></li>
											<li><a href="#">Dining Chairs</a></li>
										</ul>
									</li>
									<li><a href="#">Watches </a> <span class="quantity">12</span></li>
									<li><a href="#">Bags </a> <span class="quantity">22</span></li>
									<li><a href="#">Uncategorized </a> <span class="quantity">14</span></li>
								</ul>
							</div>

							<!--=======  End of single sidebar widget  =======-->

							<!--=======  single sidebar widget  =======-->

							<div class="single-sidebar-widget mb-40">
								<h2 class="single-sidebar-widget--title">Filters</h2>
								<div class="sidebar-price">
									<div id="price-range"></div>
									<div class="output-wrapper mt-20">
										<input type="text" id="price-amount" class="price-amount" readonly>
										<a class="price-range-button" href="#"><i class="ion-android-funnel"></i> Filter</a>
									</div>
								</div>
							</div>

							<!--=======  End of single sidebar widget  =======-->

							<!--=======  single sidebar widget  =======-->

							<div class="single-sidebar-widget mb-40">
								<h2 class="single-sidebar-widget--title">Popular products</h2>

								<!--=======  widget product wrapper  =======-->

								<div class="widget-product-wrapper">
									<!--=======  single widget product  =======-->
									<div class="single-widget-product-wrapper">
										<div class="single-widget-product">
											<!--=======  image  =======-->

											<div class="single-widget-product__image">
												<a href="#">
													<img src="{{asset('assets/images/products/product-furniture-2-100x100.jpg')}}" class="img-fluid" alt="">
												</a>
											</div>

											<!--=======  End of image  =======-->

											<!--=======  content  =======-->

											<div class="single-widget-product__content">

												<div class="single-widget-product__content__top">
													<h3 class="product-title"><a href="#">Wooden Table</a></h3>
													<div class="price">
														<span class="main-price discounted">$270.00</span>
														<span class="discounted-price">$220.00</span>
													</div>
													<div class="rating">
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star-outline"></i>
														<i class="ion-android-star-outline"></i>
														<i class="ion-android-star-outline"></i>
													</div>
												</div>

											</div>

											<!--=======  End of content  =======-->
										</div>
									</div>

									<!--=======  End of single widget product  =======-->

									<!--=======  single widget product  =======-->
									<div class="single-widget-product-wrapper">
										<div class="single-widget-product">
											<!--=======  image  =======-->

											<div class="single-widget-product__image">
												<a href="#">
													<img src="{{asset('assets/images/products/product-furniture-11-100x100.jpg')}}" class="img-fluid" alt="">
												</a>
											</div>

											<!--=======  End of image  =======-->

											<!--=======  content  =======-->

											<div class="single-widget-product__content">

												<div class="single-widget-product__content__top">
													<h3 class="product-title"><a href="#">Sofa with cushion</a></h3>
													<div class="price">
														<span class="main-price discounted">$660.00</span>
														<span class="discounted-price">$600.00</span>
													</div>
													<div class="rating">
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
													</div>
												</div>



											</div>

											<!--=======  End of content  =======-->
										</div>
									</div>

									<!--=======  End of single widget product  =======-->

									<!--=======  single widget product  =======-->
									<div class="single-widget-product-wrapper">
										<div class="single-widget-product">
											<!--=======  image  =======-->

											<div class="single-widget-product__image">
												<a href="#">
													<img src="{{asset('assets/images/products/soccer-4-100x100.jpg')}}" class="img-fluid" alt="">
												</a>
											</div>

											<!--=======  End of image  =======-->

											<!--=======  content  =======-->

											<div class="single-widget-product__content">

												<div class="single-widget-product__content__top">
													<h3 class="product-title"><a href="#">High waist trousers</a></h3>
													<div class="price">
														<span class="main-price discounted">$36.00</span>
														<span class="discounted-price">$33.00</span>
													</div>
													<div class="rating">
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star-outline"></i>
													</div>
												</div>


											</div>

											<!--=======  End of content  =======-->
										</div>
									</div>
									<!--=======  End of single widget product  =======-->
								</div>

								<!--=======  End of widget product wrapper  =======-->
							</div>

							<!--=======  End of single sidebar widget  =======-->

							<!--=======  single sidebar widget  =======-->

							<div class="single-sidebar-widget">
								<h2 class="single-sidebar-widget--title">Tags</h2>

								<div class="tag-container">
									<a href="#">bags</a>
									<a href="#">chair</a>
									<a href="#">clock</a>
									<a href="#">comestic</a>
									<a href="#">fashion</a>
									<a href="#">furniture</a>
									<a href="#">holder</a>
									<a href="#">mask</a>
									<a href="#">men</a>
									<a href="#">oil</a>
								</div>
							</div>

							<!--=======  End of single sidebar widget  =======-->
						</div>

						<!--=======  End of page sidebar  =======-->
					</div>
					<div class="col-lg-9 order-1 order-lg-2 mb-md-80 mb-sm-80">

						<div class="row product-isotope shop-product-wrap four-column">

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 hot sale">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/cloth-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/cloth-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-10%</span>
											<span class="hot">hot</span>
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="single-product__variations">
											<div class="size-container mb-5">
												<span class="size">L</span>
												<span class="size">M</span>
												<span class="size">S</span>
												<span class="size">XS</span>
											</div>
											<div class="color-container">
												<span class="black"></span>
												<span class="blue"></span>
												<span class="yellow"></span>
											</div>
											<!-- <a href="#" class="clear-link">clear</a> -->
										</div>
										<div class="title">
											<h3> <a href="#">High-waist Trousers</a></h3>
											<a href="#">Select options</a>
										</div>
										<div class="price">
											<span class="main-price discounted">$160.00</span>
											<span class="discounted-price">$180.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/cloth-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/cloth-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-10%</span>
											<span class="hot">hot</span>
										</div>

										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>

										<div class="single-product__variations">
											<div class="size-container mb-5">
												<span class="size">L</span>
												<span class="size">M</span>
												<span class="size">S</span>
												<span class="size">XS</span>
											</div>
											<div class="color-container">
												<span class="black"></span>
												<span class="blue"></span>
												<span class="yellow"></span>
											</div>
											<!-- <a href="#" class="clear-link">clear</a> -->
										</div>

									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">High-waist Trousers</a></h3>
										</div>
										<div class="price">
											<span class="main-price discounted">$160.00</span>
											<span class="discounted-price">$180.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 sale">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/watch-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/watch-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-10%</span>
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#">Light Brown Watch</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price">$130.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/watch-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/watch-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-10%</span>
										</div>

										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Light Brown Watch</a></h3>
										</div>
										<div class="price">
											<span class="main-price">$130.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 hot">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/watch-2-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/watch-2-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="hot">hot</span>
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#">Dark Gray Watch</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price discounted">$260.00</span>
											<span class="discounted-price">$230.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/watch-2-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/watch-2-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="hot">hot</span>
										</div>

										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Dark Gray Watch</a></h3>
										</div>
										<div class="price">
											<span class="main-price discounted">$260.00</span>
											<span class="discounted-price">$230.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 new">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/watch-3-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/watch-3-2-600x800.jpg')}}" class="img-fluid" alt="">
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#"> Dark Brown Watch</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price discounted">$120.00</span>
											<span class="discounted-price">$100.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/watch-3-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/watch-3-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>



										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Dark Brown Watch</a></h3>
										</div>
										<div class="price">
											<span class="main-price discounted">$120.00</span>
											<span class="discounted-price">$100.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 sale">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/cosmetics-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/cosmetics-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-5%</span>
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#">Pink Clay Mask</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price discounted">$100.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/cosmetics-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/cosmetics-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-5%</span>
										</div>

										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Pink Clay Mask</a></h3>
										</div>
										<div class="price">
											<span class="main-price discounted">$100.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 sale">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/furniture-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/furniture-1-2-600x800.jpg')}}" class="img-fluid" alt="">
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#">Wooden Round Table</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price discounted">$400.00</span>
											<span class="discounted-price">$380.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/furniture-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/furniture-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-15%</span>
										</div>

										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Wooden Round Table</a></h3>
										</div>
										<div class="price">
											<span class="main-price discounted">$400.00</span>
											<span class="discounted-price">$380.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 new">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/furniture-2-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/furniture-2-2-600x800.jpg')}}" class="img-fluid" alt="">
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#">Sofa with Cushion</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price">$85.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/furniture-2-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/furniture-2-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>



										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Sofa with Cushion</a></h3>
										</div>
										<div class="price">
											<span class="main-price">$85.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 sale">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/furniture-3-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/furniture-3-2-600x800.jpg')}}" class="img-fluid" alt="">
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#">Green Coutch</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price discounted">$360.00</span>
											<span class="discounted-price">$300.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/furniture-3-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/furniture-3-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-25%</span>
										</div>

										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Green Coutch</a></h3>
										</div>
										<div class="price">
											<span class="main-price discounted">$360.00</span>
											<span class="discounted-price">$300.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->
							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 hot sale">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/cloth-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/cloth-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-10%</span>
											<span class="hot">hot</span>
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="single-product__variations">
											<div class="size-container mb-5">
												<span class="size">L</span>
												<span class="size">M</span>
												<span class="size">S</span>
												<span class="size">XS</span>
											</div>
											<div class="color-container">
												<span class="black"></span>
												<span class="blue"></span>
												<span class="yellow"></span>
											</div>
											<!-- <a href="#" class="clear-link">clear</a> -->
										</div>
										<div class="title">
											<h3> <a href="#">High-waist Trousers</a></h3>
											<a href="#">Select options</a>
										</div>
										<div class="price">
											<span class="main-price discounted">$160.00</span>
											<span class="discounted-price">$180.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/cloth-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/cloth-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-10%</span>
											<span class="hot">hot</span>
										</div>

										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>

										<div class="single-product__variations">
											<div class="size-container mb-5">
												<span class="size">L</span>
												<span class="size">M</span>
												<span class="size">S</span>
												<span class="size">XS</span>
											</div>
											<div class="color-container">
												<span class="black"></span>
												<span class="blue"></span>
												<span class="yellow"></span>
											</div>
											<!-- <a href="#" class="clear-link">clear</a> -->
										</div>

									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">High-waist Trousers</a></h3>
										</div>
										<div class="price">
											<span class="main-price discounted">$160.00</span>
											<span class="discounted-price">$180.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 sale">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/watch-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/watch-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-10%</span>
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#">Light Brown Watch</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price">$130.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/watch-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/watch-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-10%</span>
										</div>

										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Light Brown Watch</a></h3>
										</div>
										<div class="price">
											<span class="main-price">$130.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 hot">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/watch-2-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/watch-2-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="hot">hot</span>
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#">Dark Gray Watch</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price discounted">$260.00</span>
											<span class="discounted-price">$230.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/watch-2-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/watch-2-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="hot">hot</span>
										</div>

										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Dark Gray Watch</a></h3>
										</div>
										<div class="price">
											<span class="main-price discounted">$260.00</span>
											<span class="discounted-price">$230.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 new">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/watch-3-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/watch-3-2-600x800.jpg')}}" class="img-fluid" alt="">
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#"> Dark Brown Watch</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price discounted">$120.00</span>
											<span class="discounted-price">$100.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/watch-3-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/watch-3-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>



										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Dark Brown Watch</a></h3>
										</div>
										<div class="price">
											<span class="main-price discounted">$120.00</span>
											<span class="discounted-price">$100.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 sale">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/cosmetics-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/cosmetics-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-5%</span>
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#">Pink Clay Mask</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price discounted">$100.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/cosmetics-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/cosmetics-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-5%</span>
										</div>

										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Pink Clay Mask</a></h3>
										</div>
										<div class="price">
											<span class="main-price discounted">$100.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 sale">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/furniture-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/furniture-1-2-600x800.jpg')}}" class="img-fluid" alt="">
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#">Wooden Round Table</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price discounted">$400.00</span>
											<span class="discounted-price">$380.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/furniture-1-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/furniture-1-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-15%</span>
										</div>

										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Wooden Round Table</a></h3>
										</div>
										<div class="price">
											<span class="main-price discounted">$400.00</span>
											<span class="discounted-price">$380.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 new">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/furniture-2-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/furniture-2-2-600x800.jpg')}}" class="img-fluid" alt="">
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#">Sofa with Cushion</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price">$85.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/furniture-2-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/furniture-2-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>



										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Sofa with Cushion</a></h3>
										</div>
										<div class="price">
											<span class="main-price">$85.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->

							<!--=======  single product  =======-->
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 sale">
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/furniture-3-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/furniture-3-2-600x800.jpg')}}" class="img-fluid" alt="">
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

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="#">Green Coutch</a></h3>
											<a href="#">Add to cart</a>
										</div>
										<div class="price">
											<span class="main-price discounted">$360.00</span>
											<span class="discounted-price">$300.00</span>
										</div>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="#">
											<img src="{{asset('assets/images/products/furniture-3-1-600x800.jpg')}}" class="img-fluid" alt="">
											<img src="{{asset('assets/images/products/furniture-3-2-600x800.jpg')}}" class="img-fluid" alt="">
										</a>

										<div class="single-product__floating-badges">
											<span class="onsale">-25%</span>
										</div>

										<div class="single-product__floating-icons">
											<span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-android-favorite-outline"></i></a></span>

											<span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
													data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
													data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-shuffle-strong"></i></a></span>

											<span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
													data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
													data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
														class="ion-ios-search-strong"></i></a></span>
										</div>



									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">

										<div class="title">
											<h3> <a href="#">Green Coutch</a></h3>
										</div>
										<div class="price">
											<span class="main-price discounted">$360.00</span>
											<span class="discounted-price">$300.00</span>
										</div>
										<p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
											consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
											voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
										</p>

										<a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

									</div>

									<!--=======  End of single product content  =======-->
								</div>
							</div>
							<!--=======  End of single product  =======-->


						</div>

						<div class="row">
							<div class="col-lg-12 text-center mt-30">
								<a class="lezada-button lezada-button--medium lezada-button--icon--left" href="#"><i
										class="ion-android-add"></i> MORE</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!--=====  End of shop page content  ======-->
	</div>

	@include('layouts.front.footer')