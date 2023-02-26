@include('layouts.front.header')
@php
   use App\Helpers\Helper;
   use App\Wishlist;

@endphp
{{-- <div class="main-banner rentse" style="background-image:url(assets/img/rent.png);">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="main-banner-content text-center">
                    <h1>Toovem Machine Rental <br>For Your Business</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco lab
                    </p>

                </div>
            </div>
        </div>
    </div>

</div>

<div class="about-area ptb-110">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="about-image" style="padding-bottom: 0px;">
                    <img src="assets/img/productImg11.jpg" alt="image">

                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-content">
                    <h2>Toovem Machine rental for your business</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
                    <a href="/about-one" class="btn btn-primary discover">Rent Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-img1">
        <img src="assets/img/shape-1.png" alt="image">
    </div>
    <div class="shape-img2">
        <img src="assets/img/down.svg" alt="image">
    </div>
    <div class="shape-img3">
        <img src="assets/img/shape-3.png" alt="image">
    </div>
    <div class="shape-img4">
        <img src="assets/img/down.svg" alt="image">
    </div>
    <div class="shape-img5">
        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMiIgaGVpZ2h0PSIyMiIgdmlld0JveD0iMCAwIDIyIDIyIj4NCiAgPGRlZnM+DQogICAgPHN0eWxlPg0KICAgICAgLmNscy0xIHsNCiAgICAgICAgZm9udC1zaXplOiAyNXB4Ow0KICAgICAgICBmaWxsOiAjMjdlYWM4Ow0KICAgICAgICB0ZXh0LWFuY2hvcjogbWlkZGxlOw0KICAgICAgICBmb250LWZhbWlseTogUm9ib3RvOw0KICAgICAgfQ0KICAgIDwvc3R5bGU+DQogIDwvZGVmcz4NCiAgPHRleHQgaWQ9Il8iIGRhdGEtbmFtZT0iKyIgY2xhc3M9ImNscy0xIiB0cmFuc2Zvcm09Im1hdHJpeCgxLjQzNywgMS40MzQsIC0xLjQzNywgMS40MzQsIC0wLjgzMiwgMjMuMDY2KSI+PHRzcGFuIHg9IjAiPis8L3RzcGFuPjwvdGV4dD4NCjwvc3ZnPg0K"
            alt="image">
    </div>
    <div class="shape-img6">
        <img src="assets/img/shape-6.png" alt="image">
    </div>
    <div class="dot-shape1">
        <img src="assets/img/dot.png" alt="image">
    </div>
    <div class="dot-shape2">
        <img src="assets/img/dot-3.png" alt="image">
    </div>
</div>
<div class="services-area bg-f2f6f9 ptb-110">
    <div class="container">

        <div class="row ">
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-services-box">
                    <div class="icon">
                        <i class="fa fa-database"></i>
                    </div>
                    <h3>
                        <a href="">For Our Customer</a>
                    </h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-services-box">
                    <div class="icon">
                        <i class="fa fa-podcast"></i>
                    </div>
                    <h3>
                        <a href="">For Suppliers</a>
                    </h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout.</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2"></div>
        </div>
    </div>
    <div class="shape-img2">
        <img src="assets/img/down.svg" alt="image">
    </div>
    <div class="shape-img3">
        <img src="assets/img/shape-3.png" alt="image">
    </div>
    <div class="shape-img4">
        <img src="assets/img/down.svg" alt="image">
    </div>
    <div class="shape-img5">
        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMiIgaGVpZ2h0PSIyMiIgdmlld0JveD0iMCAwIDIyIDIyIj4NCiAgPGRlZnM+DQogICAgPHN0eWxlPg0KICAgICAgLmNscy0xIHsNCiAgICAgICAgZm9udC1zaXplOiAyNXB4Ow0KICAgICAgICBmaWxsOiAjMjdlYWM4Ow0KICAgICAgICB0ZXh0LWFuY2hvcjogbWlkZGxlOw0KICAgICAgICBmb250LWZhbWlseTogUm9ib3RvOw0KICAgICAgfQ0KICAgIDwvc3R5bGU+DQogIDwvZGVmcz4NCiAgPHRleHQgaWQ9Il8iIGRhdGEtbmFtZT0iKyIgY2xhc3M9ImNscy0xIiB0cmFuc2Zvcm09Im1hdHJpeCgxLjQzNywgMS40MzQsIC0xLjQzNywgMS40MzQsIC0wLjgzMiwgMjMuMDY2KSI+PHRzcGFuIHg9IjAiPis8L3RzcGFuPjwvdGV4dD4NCjwvc3ZnPg0K"
            alt="image">
    </div>
    <div class="shape-img7">
        <img src="assets/img/shape-3.png" alt="image">
    </div>
    <div class="dot-shape1">
        <img src="assets/img/dot.png" alt="image">
    </div>
    <div class="dot-shape2">
        <img src="assets/img/dot-3.png" alt="image">
    </div>
    <div class="dot-shape4">
        <img src="assets/img/dot-4.png" alt="image">
    </div>
    <div class="dot-shape5">
        <img src="assets/img/dot-5.png" alt="image">
    </div>
    <div class="dot-shape6">
        <img src="assets/img/dot-6.png" alt="image">
    </div>
</div>

<div>
    <!---->
    <div class="webinar-area">
        <div class="row m-0">
            <div class="col-lg-6 p-0">
                <div class="webinar-content">
                    <h2>For long term out our Lorem</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, by injected humour, or randomised words which don't look even slightly
                        believable. If you are going to use a passage.</p>
                    <a href="" class="btn btn-primary discover">Read More</a>
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="webinar-video-image" style="background-image: url(assets/img/11.jpg);">

                </div>
            </div>
        </div>
    </div>
</div> --}}

{!! $cms->description !!}

@if(count($rent_products)>0)
    <section class="ourequipment bg-f2f6f9 padding">
        <div class="container">
            <div class="section-title">
                <h3 style="font-weight: 600;">Our Equipment</h3>
                <br>
                <p>Lorem ipsum dolor sit amet</p>
            </div>
        </div>

        <div class="prose_maile">
            <div class="container">
                <div class="row product-isotope shop-product-wrap four-column">
                    @foreach ($rent_products as $product)
                    @php
                       $url = asset('images/no-product.png');
                        $product_t = Helper::get_product_thumbnail_image($product->product_id);
                        if($product_t!=NULL)
                        {
                            $url = asset('uploads/products/image/'.$product_t->file_name);
                        }
                    @endphp
                    {{-- <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 hot sale">
                        <div class="single-product">
                            <div class="single-product__image">
                                <a class="image-wrap" href="">
                                    <img src="assets/img/product6.png" class="img-fluid" alt="">
                                    <img src="assets/img/product7.png" class="img-fluid" alt="">
                                </a>

                                <div class="single-product__floating-badges">
                                    <span class="onsale">-10%</span>
                                    <span class="hot">hot</span>
                                </div>

                                <div class="single-product__floating-icons">
                                    <span class="wishlist"><a href="#" data-tippy="Add to wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="left"><i
                                                class="ion-android-favorite-outline"></i></a></span>

                                    <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                                class="ion-ios-shuffle-strong"></i></a></span>

                                    <span class="quickview"><a class="cd-trigger" href="#qv-1"
                                            data-tippy="Quick View" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                                class="ion-ios-search-strong"></i></a></span>
                                </div>


                            </div>
                            <div class="single-product__content">

                                <div class="title">
                                    <h3> <a href="">ALORAIR PureAiro HEPA Max 970</a></h3>

                                </div>
                                <div class="price">
                                    <button class="btn rentnow">Rent Now</button>
                                </div>
                            </div>
                        </div>
                        <div class="single-product--list">
                            <div class="single-product__image">
                                <a class="image-wrap" href="">
                                    <img src="assets/img/product2.png" class="img-fluid" alt="">
                                    <img src="assets/img/product10.png" class="img-fluid" alt="">
                                </a>

                                <div class="single-product__floating-badges">
                                    <span class="onsale">-10%</span>
                                    <span class="hot">hot</span>
                                </div>

                                <div class="single-product__floating-icons">
                                    <span class="wishlist"><a href="#" data-tippy="Add to wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="bottom"><i
                                                class="ion-android-favorite-outline"></i></a></span>

                                    <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                                                class="ion-ios-shuffle-strong"></i></a></span>

                                    <span class="quickview"><a class="cd-trigger" href="#qv-1"
                                            data-tippy="Quick View" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                                                class="ion-ios-search-strong"></i></a></span>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 sale">
                        <div class="single-product">
                            <div class="single-product__image">
                                <a class="image-wrap" href="">
                                    <img src="assets/img/product10.png" class="img-fluid" alt="">
                                    <img src="assets/img/product4.png" class="img-fluid" alt="">
                                </a>

                                <div class="single-product__floating-badges">
                                    <span class="onsale">-25%</span>
                                </div>

                                <div class="single-product__floating-icons">
                                    <span class="wishlist"><a href="#" data-tippy="Add to wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="left"><i
                                                class="ion-android-favorite-outline"></i></a></span>
                                    <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                                class="ion-ios-shuffle-strong"></i></a></span>
                                    <span class="quickview"><a class="cd-trigger" href="#qv-1"
                                            data-tippy="Quick View" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                                class="ion-ios-search-strong"></i></a></span>
                                </div>
                            </div>
                            <div class="single-product__content">
                                <div class="title">
                                    <h3> <a href="">ALORAIR PureAiro HEPA Max 970</a></h3>
                                    <a href="#">Add to cart</a>
                                </div>
                                <div class="price">
                                    <span class="discounted-price">US$799.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-product--list">
                            <div class="single-product__image">
                                <a class="image-wrap" href="">
                                    <img src="assets/img/product2.png" class="img-fluid" alt="">
                                    <img src="assets/img/product1.png" class="img-fluid" alt="">
                                </a>

                                <div class="single-product__floating-badges">
                                    <span class="onsale">-25%</span>
                                </div>

                                <div class="single-product__floating-icons">
                                    <span class="wishlist"><a href="#" data-tippy="Add to wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="bottom"><i
                                                class="ion-android-favorite-outline"></i></a></span>

                                    <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                                                class="ion-ios-shuffle-strong"></i></a></span>

                                    <span class="quickview"><a class="cd-trigger" href="#qv-1"
                                            data-tippy="Quick View" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                                                class="ion-ios-search-strong"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 sale">
                        <div class="single-product">
                            <div class="single-product__image">
                                <a class="image-wrap" href="">
                                    <img src="assets/img/product7.png" class="img-fluid" alt="">
                                    <img src="assets/img/product3.png" class="img-fluid" alt="">
                                </a>

                                <div class="single-product__floating-badges">
                                    <span class="onsale">-25%</span>
                                </div>

                                <div class="single-product__floating-icons">
                                    <span class="wishlist"><a href="#" data-tippy="Add to wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="left"><i
                                                class="ion-android-favorite-outline"></i></a></span>
                                    <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                                class="ion-ios-shuffle-strong"></i></a></span>
                                    <span class="quickview"><a class="cd-trigger" href="#qv-1"
                                            data-tippy="Quick View" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                                class="ion-ios-search-strong"></i></a></span>
                                </div>
                            </div>
                            <div class="single-product__content">
                                <div class="title">
                                    <h3> <a href="">ALORAIR PureAiro HEPA Max 970</a></h3>
                                    <a href="#">Add to cart</a>
                                </div>
                                <div class="price">
                                    <span class="discounted-price">US$799.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-product--list">
                            <div class="single-product__image">
                                <a class="image-wrap" href="">
                                    <img src="assets/img/product4.png" class="img-fluid" alt="">
                                    <img src="assets/img/product8.png" class="img-fluid" alt="">
                                </a>

                                <div class="single-product__floating-badges">
                                    <span class="onsale">-25%</span>
                                </div>

                                <div class="single-product__floating-icons">
                                    <span class="wishlist"><a href="#" data-tippy="Add to wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="bottom"><i
                                                class="ion-android-favorite-outline"></i></a></span>

                                    <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                                                class="ion-ios-shuffle-strong"></i></a></span>

                                    <span class="quickview"><a class="cd-trigger" href="#qv-1"
                                            data-tippy="Quick View" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                                                class="ion-ios-search-strong"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 sale">
                        <div class="single-product">
                            <div class="single-product__image">
                                <a class="image-wrap" href="">
                                    <img src="{{$url}}" class="img-fluid" alt="">
                                    <img src="assets/img/product10.png" class="img-fluid" alt="">
                                </a>

                                <div class="single-product__floating-badges">
                                    <span class="onsale">-25%</span>
                                </div>

                                <div class="single-product__floating-icons">
                                    <span class="wishlist"><a href="#" data-tippy="Add to wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="left"><i
                                                class="ion-android-favorite-outline"></i></a></span>
                                    <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                                class="ion-ios-shuffle-strong"></i></a></span>
                                    <span class="quickview"><a class="cd-trigger" href="#qv-1"
                                            data-tippy="Quick View" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                                class="ion-ios-search-strong"></i></a></span>
                                </div>
                            </div>
                            <div class="single-product__content">
                                <div class="title">
                                    <h3> <a href="">ALORAIR PureAiro HEPA Max 970</a></h3>
                                    <a href="#">Add to cart</a>
                                </div>
                                <div class="price">
                                    <span class="discounted-price">US$799.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-product--list">
                            <div class="single-product__image">
                                <a class="image-wrap" href="">
                                    <img src="assets/img/product3.png" class="img-fluid" alt="">
                                    <img src="assets/img/product2.png" class="img-fluid" alt="">
                                </a>

                                <div class="single-product__floating-badges">
                                    <span class="onsale">-25%</span>
                                </div>

                                <div class="single-product__floating-icons">
                                    <span class="wishlist"><a href="#" data-tippy="Add to wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="bottom"><i
                                                class="ion-android-favorite-outline"></i></a></span>

                                    <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                                                class="ion-ios-shuffle-strong"></i></a></span>

                                    <span class="quickview"><a class="cd-trigger" href="#qv-1"
                                            data-tippy="Quick View" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                                                class="ion-ios-search-strong"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 sale">
                        <div class="single-product">
                            <div class="single-product__image">
                                <a class="image-wrap" href="{{route('customer.rent-detail')}}">
                                    <img src="{{$url}}" class="img-fluid" alt="">
                                    <img src="{{$url}}" class="img-fluid" alt="">
                                </a>

                                <div class="single-product__floating-badges">
                                    {{-- <span class="onsale">-25%</span> --}}
                                </div>

                                <div class="single-product__floating-icons">
                                    <span class="wishlist"><a href="#" data-tippy="Add to wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="left"><i
                                                class="ion-android-favorite-outline"></i></a></span>
                                    <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                                                class="ion-ios-shuffle-strong"></i></a></span>

                                </div>
                            </div>
                            <div class="single-product__content">
                                <div class="title">
                                    <h3> <a href="{{route('customer.rent-detail')}}">{{$product->product_title}}</a></h3>
                                    {{-- <a href="#">Add to cart</a> --}}
                                </div>
                                <div class="price">
                                    <span class="discounted-price">US${{$product->rent_price}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-product--list">
                            <div class="single-product__image">
                                <a class="image-wrap" href="">
                                    <img src="{{$url}}" class="img-fluid" alt="">
                                    <img src="{{$url}}" class="img-fluid" alt="">
                                </a>

                                <div class="single-product__floating-badges">
                                    {{-- <span class="onsale">-25%</span> --}}
                                </div>

                                <div class="single-product__floating-icons">
                                    <span class="wishlist"><a href="#" data-tippy="Add to wishlist"
                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                            data-tippy-placement="bottom"><i
                                                class="ion-android-favorite-outline"></i></a></span>

                                    <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                            data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                                                class="ion-ios-shuffle-strong"></i></a></span>

                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
                <a href="{{route('customer.rent-listing')}}" class="btn btn-primary discover" style="margin: 0 auto;display: table;">View More</a>
            </div>
        </div>

    </section>
@endif
@include('layouts.front.footer')
