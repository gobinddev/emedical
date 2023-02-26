@include('layouts.front.header')
@php
    use App\Helpers\Helper;
    $b_url = asset('assets/images/inners1.png');
@endphp
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url({{$b_url}});">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Blog</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="index.php">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">Blog</li>
					</ul>

					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>

         @php
			$categories = Helper::get_blog_categories();
		@endphp
	<div class="blog-page-wrapper mb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2">
					<!--=======  page sidebar  =======-->

					<div class="page-sidebar">


						<!-- <div class="single-sidebar-widget mb-40">

							<div class="search-widget">
								<form action="#">
									<input type="search" placeholder="Search products ...">
									<button type="button"><i class="ion-android-search"></i></button>
								</form>
							</div>


						</div> -->


						<!--=======  End of single sidebarwidget  =======-->

						<!--=======  single sidebar widget  =======-->


						@if(count($categories)>0)
								<div class="single-sidebar-widget mb-40">
									<h2 class="single-sidebar-widget--title">Categories</h2>
									<ul class="single-sidebar-widget--list single-sidebar-widget--list--category">
										<!-- <li class="has-children">
											<a href="shop-left-sidebar.html">Insulation Drying </a> <span class="quantity">(31)</span>
											<ul>
												<li><a href="">Restoration Heater & Heat Drying(59)</a></li>
												<li><a href="">Crawlspace Ventilation Fan(47)</a></li>
												<li><a href="">Wholehouse Humidifier(167)</a></li>
												<li><a href="">Wholehouse Humidifier(167)</a></li>
											</ul>
										</li>

										<li class="has-children">
											<a href="">Ventilation Exhaust Fan </a> <span class="quantity">(11)</span>
											<ul>
												<li><a href="">Air Mover & Fan(30)</a></li>
												<li><a href="">Air Purifier(50)</a></li>
												<li><a href="">Air Scrubber(153)</a></li>
												<li><a href="">Ozone Generator(73)</a></li>
											</ul>
										</li>
										<li><a href="">Air Conditioning </a> <span class="quantity">(33)</span></li>
										<li><a href="">Grinders & Polishers </a> <span class="quantity">(82)</span></li>
										<li><a href="">Vacuums </a> <span class="quantity">(32)</span></li> -->
										@foreach($categories as $item)
											@php
												$category_blogs = Helper::get_category_blogs($item->id)
											@endphp
											<li><a href="{{url('/blog/?category_id='.Crypt::encryptString($item->id))}}">{{$item->name}}</a> <span class="quantity">({{count($category_blogs)}})</span></li>
										@endforeach
									</ul>
								</div>
							@endif

						<!--=======  End of single sidebar widget  =======-->



						<!--=======  single sidebar widget  =======-->

						@if(count($recent_blogs)>0)
                            <div class="single-sidebar-widget mb-40">


                                <!--=======  widget post wrapper  =======-->

                                <div class="widget-post-wrapper">
                                    <!--=======  single widget post  =======-->

                                    <!-- <div class="single-widget-post">
                                        <div class="image">
                                            <img src="assets/images/blog/post-thumbnail-100x120.png" class="img-fluid" alt="">
                                        </div>
                                        <div class="content">
                                            <h3 class="widget-post-title"><a href="#">Chic Fashion Phenomenon</a></h3>
                                            <p class="widget-post-date">June 5, 2018</p>
                                        </div>
                                    </div> -->

                                    <!--=======  End of single widget post  =======-->
                                    <!--=======  single widget post  =======-->

                                    <!-- <div class="single-widget-post">
                                        <div class="image">
                                            <img src="assets/images/blog/post-thumbnail-6-100x120.png" class="img-fluid" alt="">
                                        </div>
                                        <div class="content">
                                            <h3 class="widget-post-title"><a href="#">Go Your Own Way</a></h3>
                                            <p class="widget-post-date">June 5, 2018</p>
                                        </div>
                                    </div> -->

                                    <!--=======  End of single widget post  =======-->
                                    <!--=======  single widget post  =======-->

                                    <!-- <div class="single-widget-post">
                                        <div class="image">
                                            <img src="assets/images/blog/post-thumbnail-9-100x120.png" class="img-fluid" alt="">
                                        </div>
                                        <div class="content">
                                            <h3 class="widget-post-title"><a href="#">Home-made Body Lotion</a></h3>
                                            <p class="widget-post-date">June 5, 2018</p>
                                        </div>
                                    </div> -->

                                    <!--=======  End of single widget post  =======-->
                                    @foreach($recent_blogs as $r_blog)
                                        <div class="single-widget-post">
                                            @php
                                                $url = asset('assets/img/no-image-icon.png');
                                                if($r_blog->file_name!=NULL && \File::exists(public_path().'/uploads/blog/'.$r_blog->file_name))
                                                {
                                                    $url = asset('uploads/blog/'.$r_blog->file_name);
                                                }
                                            @endphp
                                            <div class="image">
                                                <img src="{{$url}}" class="img-fluid" alt="">
                                            </div>
                                            <div class="content">
                                                <h3 class="widget-post-title"><a href="#">{{$r_blog->title}}</a></h3>
                                                <p class="widget-post-date">{{date('F d, Y',strtotime($r_blog->created_at))}}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                                <!--=======  End of widget post wrapper  =======-->
                            </div>
                        @endif

						<!--=======  End of single sidebar widget  =======-->

						<!--=======  single sidebar widget  =======-->

						<!-- <div class="single-sidebar-widget mb-40">


							<div class="blog-sidebar-banner">
								<img src="{{asset('assets/images/banners/ADS-blog.png')}}" class="img-fluid" alt="">
							</div>


						</div> -->

						<!--=======  End of single sidebar widget  =======-->

						<!--=======  single sidebar widget  =======-->

                        @if(count($tags)>0)
                            <div class="single-sidebar-widget">
                                <h2 class="single-sidebar-widget--title"> Popular Tags</h2>

                                <div class="tag-container">
                                    <!-- <a href="#">bags</a>
                                    <a href="#">chair</a>
                                    <a href="#">clock</a>
                                    <a href="#">comestic</a>
                                    <a href="#">fashion</a>
                                    <a href="#">furniture</a>
                                    <a href="#">holder</a>
                                    <a href="#">mask</a>
                                    <a href="#">men</a>
                                    <a href="#">oil</a> -->
                                    @foreach($tags as $tag)
                                        <a href="{{url('/blog/?tag_id='.Crypt::encryptString($tag->id))}}">{{$tag->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

						<!--=======  End of single sidebar widget  =======-->
					</div>

					<!--=======  End of page sidebar  =======-->
				</div>
				<div class="col-lg-9 order-1 mb-md-70 mb-sm-70">
					<div class="row">
						@php
							$url = asset('assets/img/no-image-icon.png');
							if($blog->file_name!=NULL && \File::exists(public_path().'/uploads/blog/'.$blog->file_name))
							{
								$url = asset('uploads/blog/'.$blog->file_name);
							}
						@endphp
						<div class="col-md-12 mb-40">
							<div class="single-slider-post single-slider-post--sticky pb-60">
								<!--=======  image  =======-->

								<div class="single-slider-post__image single-slider-post--sticky__image mb-30">
									<img src="{{$url}}" class="img-fluid" alt="">
								</div>

								<!--=======  End of image  =======-->

								<!--=======  content  =======-->

								<div class="single-slider-post__content single-slider-post--sticky__content">
									<!--=======  post category  =======-->

									<div class="post-category mb-10">
										<a href="#">fashion</a>
									</div>

									<h2 class="post-title"><a href="#">{{$blog->title}}</a></h2>

									<!--=======  End of post category  =======-->

									<!--=======  post info  =======-->

									<div class="post-info d-flex flex-wrap align-items-center mb-50">
										<!-- <div class="post-user">
											<i class="ion-android-person"></i> By
											<a href="blog-standard-left-sidebar.html"> Owen Christ</a>
										</div> -->
										<div class="post-date mb-0 pl-30">
											<i class="ion-android-calendar"></i>
											<a href="#"> {{date('F d, Y',strtotime($blog->created_at))}}</a>
										</div>
										<!-- <div class="post-category pl-30">
											<a href="#">fashion</a>
										</div> -->
										<!-- <div class="post-comment pl-30">
											<i class="ion-ios-chatbubble-outline"></i>
											<a href="blog-standard-left-sidebar.html"> 4 Comments</a>
										</div> -->
									</div>

									<!--=======  End of post info  =======-->


									<!--=======  single blog post section  =======-->

									<div class="single-blog-post-section">
										<!-- <h3 class="mb-30">Sequins</h3>
										<p class="mb-30">To say sequins and sparkles will be a big deal next summer is an understatement. In
											every fashion capital, glitter prevailed, starting with Tom Ford and Marc Jacobs right through to
											Gucci (pictured here), Dior and Chanel. Style yours with a sweatshirt to give them daytime
											longevity.</p>
										<h3 class="mb-30">Pastels</h3>
										<p class="mb-30">Whether lilac, pink, lemon or duck egg blue, expect to see an array of fashion’s
											prettiest shades next season. But as Victoria Beckham (pictured) said “delicacy can be strong”;
											saccharine these colours are not – consider tailoring in ice cream hues or wearing them in
											unexpected ways like at Celine.</p>
										<h3 class="mb-30">Checks</h3>
										<p class="mb-30">It looks as if heritage checks are going nowhere for the season ahead. Balenciaga’s
											came via voluminous coats as seen here, while Victoria Beckham’s had a more traditional appeal.
											Anyone looking for floaty feminine styles should turn to Sonia Rykiel where they were bright and
											summer-ready. Burberry’s homage was perhaps the most overt – expect to see its check caps
											everywhere next season.</p>
										<h3 class="mb-30">Plastic</h3>
										<p class="mb-30">Perfect for British summers, waterproof plastics were a predominant look for
											spring/summer 2018. As seen at Chanel (pictured), Isabel, Marant, Burberry, Topshop, Calvin Klein
											and Fendi, plastic in varying shades will be everywhere in 12 months time.</p> -->
                                            {!! $blog->description !!}
									</div>

									<!--=======  End of single blog post section  =======-->


									<div class="row mt-30 align-items-center">
										<div class="col-md-6 text-center text-md-left mb-sm-15">
                                            @if(count($tags)>0)
											<div class="post-tags">
												<i class="ion-ios-pricetags"></i>
												<ul class="tag-list">
													<!-- <li><a href="#">accessories</a>,</li>
													<li><a href="#">clothes</a>,</li>
													<li><a href="#">fashion</a>,</li>
													<li><a href="#">greenspace</a>,</li>
													<li><a href="#">Instagram</a>,</li>
													<li><a href="#">Interior</a>,</li>
													<li><a href="#">lezada</a>,</li>
													<li><a href="#">lifestyle</a>,</li>
													<li><a href="#">shop</a>,</li>
													<li><a href="#">stores</a></li> -->
                                                    @foreach($tags as $tag)
                                                        <li><a href="#">{{$tag->name}}</a></li>
                                                    @endforeach
												</ul>
											</div>
                                            @endif
										</div>

										<div class="col-md-6 text-center text-md-right">
											<div class="post-share">
												<span>Share this post:</span>
												<ul>
													<li><a href="#"><i class="fa fa-facebook"></i></a></li>
													<li><a href="#"><i class="fa fa-twitter"></i></a></li>
													<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
													<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<!--=======  End of content  =======-->
							</div>
						</div>

						{{--<div class="col-md-12 mb-40">
							<!--=======  author info  =======-->

							<div class="single-author">
								<div class="single-author__image">
									<img src="{{asset('assets/images/user/user3.jpg')}}" class="img-fluid" alt="">
								</div>
								<div class="single-author__content">


									<!--=======  username and date  =======-->

									<p class="username">Edna Watson</p>

									<!--=======  End of username and date  =======-->

									<!--=======  message  =======-->

									<p class="message">
										Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
										est laboruLorem ipsum dolor sit amet datat non proident
									</p>

									<!--=======  End of message  =======-->
								</div>
							</div>

							<!--=======  End of author info  =======-->
						</div>--}}

						{{--<div class="col-lg-12 mb-40">
							<!--=======  commenter info  =======-->

							<h2 class="comment-title mb-30">Comments <span>(4)</span></h2>

							<!--=======  single comment  =======-->

							<div class="single-comment">
								<div class="single-comment__image">
									<img src="{{asset('assets/images/user/user1.jpg')}}" class="img-fluid" alt="">
								</div>
								<div class="single-comment__content">

									<!--=======  username and date  =======-->

									<p class="username">Scott James <span class="date">/ April 5, 2018</span></p>

									<!--=======  End of username and date  =======-->

									<!--=======  message  =======-->

									<p class="message">
										Thanks for always keeping your WordPress themes up to date. Your level of support and dedication is
										second to none.
									</p>

									<!--=======  End of message  =======-->

									<!--=======  reply link  =======-->

									<a href="#" class="reply-link"><i class="ion-reply"></i> reply</a>

									<!--=======  End of reply link  =======-->
								</div>
							</div>

							<!--=======  End of single comment  =======-->

							<!--=======  single comment  =======-->

							<div class="single-comment">
								<div class="single-comment__image">
									<img src="{{asset('assets/images/user/user2.jpg')}}" class="img-fluid" alt="">
								</div>
								<div class="single-comment__content">

									<!--=======  username and date  =======-->

									<p class="username">Edna Watson <span class="date">/ April 5, 2018</span></p>

									<!--=======  End of username and date  =======-->

									<!--=======  message  =======-->

									<p class="message">
										Thanks for always keeping your WordPress themes up to date. Your level of support and dedication is
										second to none.
									</p>

									<!--=======  End of message  =======-->

									<!--=======  reply link  =======-->

									<a href="#" class="reply-link"><i class="ion-reply"></i> reply</a>

									<!--=======  End of reply link  =======-->
								</div>
							</div>

							<!--=======  End of single comment  =======-->

							<!--=======  single comment  =======-->

							<div class="single-comment">
								<div class="single-comment__image">
									<img src="{{asset('assets/images/user/user3.jpg')}}" class="img-fluid" alt="">
								</div>
								<div class="single-comment__content">

									<!--=======  username and date  =======-->

									<p class="username">Owen Christ <span class="date">/ April 5, 2018</span></p>

									<!--=======  End of username and date  =======-->

									<!--=======  message  =======-->

									<p class="message">
										Thanks for always keeping your WordPress themes up to date. Your level of support and dedication is
										second to none.
									</p>

									<!--=======  End of message  =======-->

									<!--=======  reply link  =======-->

									<a href="#" class="reply-link"><i class="ion-reply"></i> reply</a>

									<!--=======  End of reply link  =======-->
								</div>
							</div>

							<!--=======  End of single comment  =======-->

							<!--=======  single comment  =======-->

							<div class="single-comment single-comment--reply">
								<div class="single-comment__image">
									<img src="{{asset('assets/images/user/user1.jpg')}}" class="img-fluid" alt="">
								</div>
								<div class="single-comment__content">

									<!--=======  username and date  =======-->

									<p class="username">Scott James <span class="date">/ April 5, 2018</span></p>

									<!--=======  End of username and date  =======-->

									<!--=======  message  =======-->

									<p class="message">
										Thanks for always keeping your WordPress themes up to date. Your level of support and dedication is
										second to none.
									</p>

									<!--=======  End of message  =======-->

									<!--=======  reply link  =======-->

									<a href="#" class="reply-link"><i class="ion-reply"></i> reply</a>

									<!--=======  End of reply link  =======-->
								</div>
							</div>

							<!--=======  End of single comment  =======-->

							<!--=======  End of commenter info  =======-->
						</div>--}}

						{{--<div class="col-lg-12">

							<h2 class="comment-title mb-30">Leave your thought here</h2>
							<!--=======  comment form  =======-->

							<div class="lezada-form comment-gorm">
								<form action="#">
									<div class="row">
										<div class="col-lg-4 mb-20">
											<input type="text" placeholder="Name (*)" required>
										</div>
										<div class="col-lg-4 mb-20">
											<input type="email" placeholder="Email (*)" required>
										</div>
										<div class="col-lg-4 mb-20">
											<input type="text" placeholder="Website">
										</div>
										<div class="col-lg-12 mb-20">
											<textarea cols="30" rows="10" placeholder="Message"></textarea>
										</div>
										<div class="col-lg-12 text-center">
											<button type="submit" class="lezada-button lezada-button--medium">submit</button>
										</div>
									</div>
								</form>
							</div>

							<!--=======  End of comment form  =======-->
						</div>--}}
					</div>
				</div>
			</div>
		</div>
	</div>

@include('layouts.front.footer')
