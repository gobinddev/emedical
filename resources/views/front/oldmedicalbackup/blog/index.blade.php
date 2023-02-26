@include('layouts.front.header')
@php
    use App\Helpers\Helper; 
@endphp
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners1.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Blog</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
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
						<!--=======  single sidebar widget  =======-->

						<div class="single-sidebar-widget mb-40">
							

							<div class="search-widget">
								<form action="#">
									<input type="search" placeholder="Search products ...">
									<button type="button"><i class="ion-android-search"></i></button>
								</form>
							</div>

							
						</div>


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
                                    @foreach($recent_blogs as $blog)
                                        <div class="single-widget-post">
                                            @php
                                                $url = asset('assets/img/no-image-icon.png');
                                                if($blog->file_name!=NULL && \File::exists(public_path().'/uploads/blog/'.$blog->file_name))
                                                {
                                                    $url = asset('uploads/blog/'.$blog->file_name);
                                                }
                                            @endphp
                                            <div class="image">
                                                <img src="{{$url}}" class="img-fluid" alt="">
                                            </div>
                                            <div class="content">
                                                <h3 class="widget-post-title"><a href="#">{{$blog->title}}</a></h3>
                                                <p class="widget-post-date">{{date('F d, Y',strtotime($blog->created_at))}}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                                <!--=======  End of widget post wrapper  =======-->
                            </div>
                        @endif

						<!--=======  End of single sidebar widget  =======-->

						<!--=======  single sidebar widget  =======-->

						<div class="single-sidebar-widget mb-40">
							<!--=======  blog sidebar banner  =======-->

							<div class="blog-sidebar-banner">
								<img src="assets/images/banners/ADS-blog.png" class="img-fluid" alt="">
							</div>

							<!--=======  End of blog sidebar banner  =======-->
						</div>

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
                        @forelse($blogs as $blog)

                            {{--<div class="col-md-12 mb-60">
                                <div class="single-slider-post single-slider-post--list">
                                    <!--=======  image  =======-->

                                    <div class="single-slider-post__image single-slider-post--list__image mb-sm-30">
                                        <a href="blog-detail.php">
                                            <img src="assets/images/blog/post-thumbnail-1-370x200.png" class="img-fluid" alt="">
                                        </a>
                                    </div>

                                    <!--=======  End of image  =======-->

                                    <!--=======  content  =======-->

                                    <div class="single-slider-post__content single-slider-post--list__content">
                                        <div class="post-date">
                                            <i class="ion-android-calendar"></i>
                                            <a href="blog-detail.php"> june 5, 2018</a>
                                        </div>
                                        <h2 class="post-title"><a href="blog-detail.php">Chic Fashion Phenomenon</a></h2>
                                        <p class="post-excerpt">Michele seemed to say, was the 21st-century Gucci girl, an eccentric,
                                            fresh-faced weirdo who wasn’t afraid to wear backless fur-lined loafers, to personify the idea of
                                            “ugly pretty.”</p>
                                        <a href="blog-detail.php" class="blog-readmore-btn">read more</a>
                                    </div>

                                    <!--=======  End of content  =======-->
                                </div>
                            </div>

                            <div class="col-md-12 mb-60">
                                <div class="single-slider-post single-slider-post--list">
                                    <!--=======  image  =======-->

                                    <div class="single-slider-post__image single-slider-post--list__image mb-sm-30">
                                        <a href="blog-detail.php">
                                            <img src="assets/images/blog/post-thumbnail-2-1-370x200.png" class="img-fluid" alt="">
                                        </a>
                                    </div>

                                    <!--=======  End of image  =======-->

                                    <!--=======  content  =======-->

                                    <div class="single-slider-post__content single-slider-post--list__content">
                                        <div class="post-date">
                                            <i class="ion-android-calendar"></i>
                                            <a href="blog-detail.php"> june 6, 2018</a>
                                        </div>
                                        <h2 class="post-title"><a href="blog-detail.php">Shirt Color Picking Guide</a></h2>
                                        <p class="post-excerpt">Michele seemed to say, was the 21st-century Gucci girl, an eccentric,
                                            fresh-faced weirdo who wasn’t afraid to wear backless fur-lined loafers, to personify the idea of
                                            “ugly pretty.”</p>
                                        <a href="blog-detail.php" class="blog-readmore-btn">read more</a>
                                    </div>

                                    <!--=======  End of content  =======-->
                                </div>
                            </div>

                            <div class="col-md-12 mb-60">
                                <div class="single-slider-post single-slider-post--list">
                                    <!--=======  image  =======-->

                                    <div class="single-slider-post__image single-slider-post--list__image mb-sm-30">
                                        <a href="blog-detail.php">
                                            <img src="assets/images/blog/post-thumbnail-8-370x200.png" class="img-fluid" alt="">
                                        </a>
                                    </div>

                                    <!--=======  End of image  =======-->

                                    <!--=======  content  =======-->

                                    <div class="single-slider-post__content single-slider-post--list__content">
                                        <div class="post-date">
                                            <i class="ion-android-calendar"></i>
                                            <a href="blog-detail.php"> june 8, 2018</a>
                                        </div>
                                        <h2 class="post-title"><a href="blog-detail.php">Perfect Perfume & Cologne</a></h2>
                                        <p class="post-excerpt">Michele seemed to say, was the 21st-century Gucci girl, an eccentric,
                                            fresh-faced weirdo who wasn’t afraid to wear backless fur-lined loafers, to personify the idea of
                                            “ugly pretty.”</p>
                                        <a href="blog-detail.php" class="blog-readmore-btn">read more</a>
                                    </div>

                                    <!--=======  End of content  =======-->
                                </div>
                            </div>

                            <div class="col-md-12 mb-60">
                                <div class="single-slider-post single-slider-post--list">
                                    <!--=======  image  =======-->

                                    <div class="single-slider-post__image single-slider-post--list__image mb-sm-30">
                                        <a href="blog-detail.php">
                                            <img src="assets/images/blog/post-thumbnail-370x200.png" class="img-fluid" alt="">
                                        </a>
                                    </div>

                                    <!--=======  End of image  =======-->

                                    <!--=======  content  =======-->

                                    <div class="single-slider-post__content single-slider-post--list__content">
                                        <div class="post-date">
                                            <i class="ion-android-calendar"></i>
                                            <a href="blog-detail.php"> june 10, 2018</a>
                                        </div>
                                        <h2 class="post-title"><a href="blog-detail.php">T-Shirts as Minimalist Style</a>
                                        </h2>
                                        <p class="post-excerpt">Michele seemed to say, was the 21st-century Gucci girl, an eccentric,
                                            fresh-faced weirdo who wasn’t afraid to wear backless fur-lined loafers, to personify the idea of
                                            “ugly pretty.”</p>
                                        <a href="blog-detail.php" class="blog-readmore-btn">read more</a>
                                    </div>

                                    <!--=======  End of content  =======-->
                                </div>
                            </div>

                            <div class="col-md-12 mb-60">
                                <div class="single-slider-post single-slider-post--list">
                                    <!--=======  image  =======-->

                                    <div class="single-slider-post__image single-slider-post--list__image mb-sm-30">
                                        <a href="blog-detail.php">
                                            <img src="assets/images/blog/post-thumbnail-1-370x200.png" class="img-fluid" alt="">
                                        </a>
                                    </div>

                                    <!--=======  End of image  =======-->

                                    <!--=======  content  =======-->

                                    <div class="single-slider-post__content single-slider-post--list__content">
                                        <div class="post-date">
                                            <i class="ion-android-calendar"></i>
                                            <a href="blog-detail.php"> june 5, 2018</a>
                                        </div>
                                        <h2 class="post-title"><a href="blog-detail.php">Chic Fashion Phenomenon</a></h2>
                                        <p class="post-excerpt">Michele seemed to say, was the 21st-century Gucci girl, an eccentric,
                                            fresh-faced weirdo who wasn’t afraid to wear backless fur-lined loafers, to personify the idea of
                                            “ugly pretty.”</p>
                                        <a href="blog-detail.php" class="blog-readmore-btn">read more</a>
                                    </div>

                                    <!--=======  End of content  =======-->
                                </div>
                            </div>

                            <div class="col-md-12 mb-60">
                                <div class="single-slider-post single-slider-post--list">
                                    <!--=======  image  =======-->

                                    <div class="single-slider-post__image single-slider-post--list__image mb-sm-30">
                                        <a href="blog-detail.php">
                                            <img src="assets/images/blog/post-thumbnail-2-1-370x200.png" class="img-fluid" alt="">
                                        </a>
                                    </div>

                                    <!--=======  End of image  =======-->

                                    <!--=======  content  =======-->

                                    <div class="single-slider-post__content single-slider-post--list__content">
                                        <div class="post-date">
                                            <i class="ion-android-calendar"></i>
                                            <a href="blog-detail.php"> june 6, 2018</a>
                                        </div>
                                        <h2 class="post-title"><a href="blog-detail.php">Shirt Color Picking Guide</a></h2>
                                        <p class="post-excerpt">Michele seemed to say, was the 21st-century Gucci girl, an eccentric,
                                            fresh-faced weirdo who wasn’t afraid to wear backless fur-lined loafers, to personify the idea of
                                            “ugly pretty.”</p>
                                        <a href="blog-detail.php" class="blog-readmore-btn">read more</a>
                                    </div>

                                    <!--=======  End of content  =======-->
                                </div>
                            </div>

                            <div class="col-md-12 mb-60">
                                <div class="single-slider-post single-slider-post--list">
                                    <!--=======  image  =======-->

                                    <div class="single-slider-post__image single-slider-post--list__image mb-sm-30">
                                        <a href="blog-detail.php">
                                            <img src="assets/images/blog/post-thumbnail-8-370x200.png" class="img-fluid" alt="">
                                        </a>
                                    </div>

                                    <!--=======  End of image  =======-->

                                    <!--=======  content  =======-->

                                    <div class="single-slider-post__content single-slider-post--list__content">
                                        <div class="post-date">
                                            <i class="ion-android-calendar"></i>
                                            <a href="blog-detail.php"> june 8, 2018</a>
                                        </div>
                                        <h2 class="post-title"><a href="blog-detail.php">Perfect Perfume & Cologne</a></h2>
                                        <p class="post-excerpt">Michele seemed to say, was the 21st-century Gucci girl, an eccentric,
                                            fresh-faced weirdo who wasn’t afraid to wear backless fur-lined loafers, to personify the idea of
                                            “ugly pretty.”</p>
                                        <a href="blog-detail.php" class="blog-readmore-btn">read more</a>
                                    </div>

                                    <!--=======  End of content  =======-->
                                </div>
                            </div>

                            <div class="col-md-12 mb-60">
                                <div class="single-slider-post single-slider-post--list border-0 pb-0">
                                    <!--=======  image  =======-->

                                    <div class="single-slider-post__image single-slider-post--list__image mb-sm-30">
                                        <a href="blog-detail.php">
                                            <img src="assets/images/blog/post-thumbnail-370x200.png" class="img-fluid" alt="">
                                        </a>
                                    </div>

                                    <!--=======  End of image  =======-->

                                    <!--=======  content  =======-->

                                    <div class="single-slider-post__content single-slider-post--list__content">
                                        <div class="post-date">
                                            <i class="ion-android-calendar"></i>
                                            <a href="blog-detail.php"> june 10, 2018</a>
                                        </div>
                                        <h2 class="post-title"><a href="blog-detail.php">T-Shirts as Minimalist Style</a>
                                        </h2>
                                        <p class="post-excerpt">Michele seemed to say, was the 21st-century Gucci girl, an eccentric,
                                            fresh-faced weirdo who wasn’t afraid to wear backless fur-lined loafers, to personify the idea of
                                            “ugly pretty.”</p>
                                        <a href="blog-detail.php" class="blog-readmore-btn">read more</a>
                                    </div>

                                    <!--=======  End of content  =======-->
                                </div>
                            </div>--}}

                            @php
                                $url = asset('assets/img/no-image-icon.png');
                                if($blog->file_name!=NULL && \File::exists(public_path().'/uploads/blog/'.$blog->file_name))
                                {
                                    $url = asset('uploads/blog/'.$blog->file_name);
                                }
                            @endphp

                            <div class="col-md-12 mb-60">
                                <div class="single-slider-post single-slider-post--list border-0 pb-0">
                                    <!--=======  image  =======-->

                                    <div class="single-slider-post__image single-slider-post--list__image mb-sm-30">
                                        <a href="blog-detail.php">
                                            <img src="{{$url}}" class="img-fluid" alt="">
                                        </a>
                                    </div>

                                    <!--=======  End of image  =======-->

                                    <!--=======  content  =======-->

                                    <div class="single-slider-post__content single-slider-post--list__content">
                                        <div class="post-date">
                                            <i class="ion-android-calendar"></i>
                                            <a href="{{route('customer.blog-detail',['id'=>Crypt::encryptString($blog->id)])}}"> {{date('F d, Y',strtotime($blog->created_at))}}</a>
                                        </div>
                                        <h2 class="post-title"><a href="{{route('customer.blog-detail',['id'=>Crypt::encryptString($blog->id)])}}">{{$blog->title}}</a>
                                        </h2>
                                        <p class="post-excerpt">{{\Str::limit($blog->short_description,30,'...')}}</p>
                                        <a href="{{route('customer.blog-detail',['id'=>Crypt::encryptString($blog->id)])}}" class="blog-readmore-btn">read more</a>
                                    </div>

                                    <!--=======  End of content  =======-->
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 text-center mb-60">
                                No Blog Available
                            </div>
                        @endforelse
                        </div>

                        <div class="row">
                            <!-- <div class="col-lg-12">
                                
                                <div class="pagination text-center">
                                    <ul>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">NEXT</a></li>
                                    </ul>
                                </div>

                               
                            </div> -->
                            <div class="col-12">
                                <div class="paging_simple_numbers">
                                    {!! $blogs->render() !!}
                                </div>
                            </div>
                        </div>

				</div>
			</div>
		</div>
	</div>


@include('layouts.front.footer')