@include('layouts.front.header')


<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">About Us</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">About us</li>
					</ul>

					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>



	<div class="section-title-container mb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<!--=======  section title  =======-->

					<div class="section-title section-title--one text-center">

						<h1>Basic minimalism</h1>
						<p class="subtitle subtitle--deep mb-0">LEZADA STORE - SIMPLY AND BASIC</p>
					</div>

					<!--=======  End of section title  =======-->
				</div>
			</div>
		</div>
	</div>


	<div class="about-page-content mb-100 mb-sm-45">
		<div class="container wide">

			<div class="row">

				<div class="col-lg-6 mb-md-50 mb-sm-50">
					<!--=======  about page 2 image  =======-->

					<div class="about-page-2-image">
						<img src="{{asset('assets/images/backgrounds/image-about-us.png')}}" class="img-fluid" alt="">
					</div>

				</div>

				<div class="offset-xl-1 col-xl-4 col-lg-6 col-md-6 mb-sm-50">

					<div class="about-page-text">
						<p class=" mb-35">Lorem ipsum dolor sit amet, consectetur cing elit. Suspe ndisse suscipit sagittis leo sit
							estibulum issim Lorem ipsum dolor sit amet, consectetur cing elit. ipsum dolor sit amet, consectetur cing
							elit. Suspe ndisse suscipit sagittis leo sit es</p>
					</div>

					<div class="lezada-widget lezada-widget--about mb-35">
						<h2 class="widget-title mb-25">ADDRESS</h2>
						<p class="widget-content">1800 Abbot Kinney Blvd. Unit D & E Venice</p>
					</div>

					<div class="lezada-widget lezada-widget--about mb-35">
						<h2 class="widget-title mb-25">PHONE</h2>
						<p class="widget-content">Mobile: (+88) – 1990</p>
						<p class="widget-content">Hotline: 1800 – 1102</p>
					</div>

					<div class="lezada-widget lezada-widget--about">
						<h2 class="widget-title mb-25">EMAIL</h2>
						<p class="widget-content">contact@lezadastore.com</p>
					</div>

				</div>
			</div>
		</div>
	</div>



	<div class="instagram-slider-area mb-100">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-4 order-1 ">
					<!--=======  instagram intro  =======-->

					<div
						class="instagram-section-intro pl-50 pl-lg-50 pl-md-0 pl-sm-0 pl-xs-0 pl-xxs-0 mb-0 mb-lg-0 mb-md-50 mb-sm-50 mb-xs-50 mb-xxs-50">
						<p><a href="#">@lezada_shop</a></p>
						<h3>Follow us on Instagram</h3>
					</div>

					<!--=======  End of instagram intro  =======-->
				</div>
				<div class="col-lg-8 order-2">

					<div class="instagram-image-slider-area">
						<!--=======  instagram image container  =======-->

						<div class="instagram-image-slider-container">
							<div class="instagram-feed-thumb">
								<div id="instagramFeedThree" class="instagram-carousel">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="lezada-testimonial single-item-testimonial-area testimonial-bg testimonial-bg-1 mb-100 pt-135 pb-135">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  testmonial slider container  =======-->

					<div class="lezada-slick-slider multi-testimonial-slider-container" data-slick-setting='{
                        "slidesToShow": 1,
                        "arrows": true,
                        "autoplay": true,
                        "autoplaySpeed": 5000,
                        "speed": 1000,
                        "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ti-angle-left" },
                        "nextArrow": {"buttonClass": "slick-next", "iconClass": "ti-angle-right" }
                    }' data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 1} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 1} },
                        {"breakpoint":991, "settings": {"slidesToShow": 1, "arrows": false} },
                        {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false} },
                        {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                    ]'>

						<!--=======  single testimonial  =======-->

						<div class="col">
							<div class="testimonial-item single-testimonial-single-item">

								<div class="single-testimonial-single-item__image mb-sm-50">
									<img src="{{asset('assets/images/testimonial/testimonial-1.png')}}" class="img-fluid" alt="">
								</div>

								<div class="single-testimonial-single-item__content text-center">

									<div class="quote-icon d-inline-block mb-30">
										<img src="{{asset('assets/images/icons/quote.png')}}" class="img-fluid" alt="">
									</div>

									<div class="text mb-40">
										I can say your dedication is second to none. I like the fact that you are strongly proud of your
										work in every way.
									</div>

									<div class="client-info">
										<p class="name">Sally Ramsey</p>
										<span class="designation">/ Reporter</span>
									</div>

								</div>

							</div>
						</div>


						<div class="col">
							<div class="testimonial-item single-testimonial-single-item">

								<div class="single-testimonial-single-item__image mb-sm-50">
									<img src="{{asset('assets/images/testimonial/testimonial-2.jpg')}}" class="img-fluid" alt="">
								</div>

								<div class="single-testimonial-single-item__content text-center">

									<div class="quote-icon d-inline-block mb-30">
										<img src="{{asset('assets/images/icons/quote.png')}}" class="img-fluid" alt="">
									</div>

									<div class="text mb-40">
										This has already been my fifth-time purchasing their theme. I have been highly satisfied with their
										work.
									</div>

									<div class="client-info">
										<p class="name">Lois Thompson</p>
										<span class="designation">/ Model</span>
									</div>

								</div>

							</div>
						</div>


						<div class="col">
							<div class="testimonial-item single-testimonial-single-item">

								<div class="single-testimonial-single-item__image mb-sm-50">
									<img src="{{asset('assets/images/testimonial/testimonial-3.jpg')}}" class="img-fluid" alt="">
								</div>

								<div class="single-testimonial-single-item__content text-center">

									<div class="quote-icon d-inline-block mb-30">
										<img src="{{asset('assets/images/icons/quote.png')}}" class="img-fluid" alt="">
									</div>

									<div class="text mb-40">
										There's nothing would satisfy me much more than a worry-free clean and responsive theme for my
										high-traffic site.
									</div>

									<div class="client-info">
										<p class="name">Florence Pittman</p>
										<span class="designation">/ Actor</span>
									</div>

								</div>

							</div>
						</div>


						<div class="col">
							<div class="testimonial-item single-testimonial-single-item">

								<div class="single-testimonial-single-item__image mb-sm-50">
									<img src="{{asset('assets/images/testimonial/testimonial-4.jpg')}}" class="img-fluid" alt="">
								</div>

								<div class="single-testimonial-single-item__content text-center">

									<div class="quote-icon d-inline-block mb-30">
										<img src="{{asset('assets/images/icons/quote.png')}}" class="img-fluid" alt="">
									</div>

									<div class="text mb-40">
										Five-star for good customer support. They have the ability to resolve any issue in less than the
										time for a coffee cup.
									</div>

									<div class="client-info">
										<p class="name">Anais Coulon</p>
										<span class="designation">/ Reporter</span>
									</div>

								</div>

							</div>
						</div>


					</div>

				</div>
			</div>
		</div>
	</div>


	<div class="about-video-content mb-45">
		<div class="container wide">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  about video area  =======-->

					<div
						class="about-video-bg-area about-video-bg-1 pt-300 pb-300 pt-sm-200 pb-sm-200  pt-xs-150 pb-xs-150  mb-50">


						<!--=======  End of floating-text left  =======-->
						<div class="play-icon text-center mb-40">
							<a href="https://www.youtube.com/watch?v=feOScd2HdiU" class="popup-video">
								<img src="{{asset('assets/images/icons/icon-play-100x100.png')}}" class="img-fluid" alt="">
							</a>
						</div>
						<h1>OUR STORY</h1>

					</div>

				</div>
			</div>
		</div>
	</div>


	<div class="about-page-content mb-100">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6 mb-sm-50">
					<!--=======  about single block  =======-->

					<div class="about-single-block">
						<p class="subtitle">On at oders over $99</p>
						<h1>Free shipping & return</h1>
						<p>Lorem ipsum dolor sit amet, consectetur cing elit. Suspe ndisse suscipit sagittis leo sit met condimentum
							estibulum issim Lorem ipsum dolor sit amet, consectetur cing elit.</p>
						<a href="#">LEARN MORE</a>
					</div>

					<!--=======  End of about single block  =======-->
				</div>
				<div class="col-12 col-md-6">
					<!--=======  about single block  =======-->

					<div class="about-single-block">
						<p class="subtitle">Support 24/7</p>
						<h1>Money back</h1>
						<p>Lorem ipsum dolor sit amet, consectetur cing elit. Suspe ndisse suscipit sagittis leo sit met condimentum
							estibulum issim Lorem ipsum dolor sit amet, consectetur cing elit.</p>
						<a href="#">LEARN MORE</a>
					</div>

					<!--=======  End of about single block  =======-->
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of about two page content  ======-->

@include('layouts.front.footer')