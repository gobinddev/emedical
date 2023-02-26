@include('layouts.front.header')
@php
    use App\Helpers\Helper;
@endphp


<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners1.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="breadcrumb-title">Video Center</h1>
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
                    <li class="breadcrumb-list__item breadcrumb-list__item--active">Video-Center</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="shop-page-wrapper">
    <div class="shop-advance-filter-area" id="shop-advance-filter-area">
        <div class="shop-advance-filter-wrapper pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-50">
                        <div class="single-filter-widget">
                            <h2 class="single-filter-widget--title">Categories</h2>
                            <ul class="single-filter-widget--list single-filter-widget--list--category">
                                <li class="has-children">
                                    <a href="shop-left-sidebar.html">Cosmetic </a> <span class="quantity">5</span>
                                    <ul>
                                        <li><a href="shop-left-sidebar.html">For body</a></li>
                                        <li><a href="shop-left-sidebar.html">Make up</a></li>
                                        <li><a href="shop-left-sidebar.html">New</a></li>
                                        <li><a href="shop-left-sidebar.html">Perfumes</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="shop-left-sidebar.html">Furniture </a> <span class="quantity">23</span>
                                    <ul>
                                        <li><a href="shop-left-sidebar.html">Sofas</a></li>
                                        <li><a href="shop-left-sidebar.html">Armchairs</a></li>
                                        <li><a href="shop-left-sidebar.html">Desk Chairs</a></li>
                                        <li><a href="shop-left-sidebar.html">Dining Chairs</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-left-sidebar.html">Watches </a> <span class="quantity">12</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6 mb-50">
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
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6 mb-50">
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
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6 mb-50">

                        <div class="single-filter-widget">
                            <h2 class="single-filter-widget--title">Size</h2>
                            <ul class="single-filter-widget--list single-filter-widget--list--size">
                                <li><a href="#">L</a> <span class="quantity">5</span></li>
                                <li><a href="#">M</a> <span class="quantity">5</span></li>
                                <li><a href="#">S</a> <span class="quantity">5</span></li>
                                <li><a href="#">XS</a> <span class="quantity">5</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6 mb-50">

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
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="shop-page-content mt-50 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="page-sidebar">
                        <div class="single-sidebar-widget mb-40">
                            {{-- <div class="search-widget">
                                <form action="#">
                                    <input type="search" placeholder="Search products ...">
                                    <button type="button"><i class="ion-android-search"></i></button>
                                </form>
                            </div> --}}

                        </div>

                        <div class="single-sidebar-widget mb-40">
                            {{-- <h2 class="single-sidebar-widget--title">Categories</h2>
                            <ul class="single-sidebar-widget--list single-sidebar-widget--list--category">
                                <li class="has-children">
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
                                <li><a href="">Vacuums </a> <span class="quantity">(32)</span></li>
                            </ul> --}}

                            @if(count($productCategories)>0)
                                <h2 class="single-sidebar-widget--title">Categories</h2>
                                <ul class="single-sidebar-widget--list single-sidebar-widget--list--category">
                                    @foreach ($productCategories as $category)
                                        @php
                                            $lib_count = count(Helper::getDocumentCategory($category->id,1));
                                        @endphp
                                        <li><a href="{{url('/video-center/?category_id='.Crypt::encryptString($category->id))}}">{{$category->name}}({{$lib_count}})</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>



                    </div>

                    <!--=======  End of page sidebar  =======-->
                </div>
                <div class="col-lg-9 order-1 order-lg-2 mb-md-80 mb-sm-80">
                    <div class="row product-isotope shop-product-wrap four-column">
                        {{-- <div class="col-12 col-lg-4 col-md-6 col-sm-6 mb-45 hot sale">
                            <div class="videoframe">
                                <iframe id="player" style="width:100%;height:270px;" src="https://www.youtube.com/embed/eauIF1xWRe8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" class="lozad" data-loaded="true"></iframe>
                                <p class="v-title">AlorAir HEPA Pro 770 Industrial Air Scrubber</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 col-sm-6 mb-45 hot sale">
                            <div class="videoframe">
                                <iframe id="player" style="width:100%;height:270px;" src="https://www.youtube.com/embed/Ei3ck-pnSF0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" class="lozad" data-loaded="true"></iframe>
                                <p class="v-title">AlorAir PureAiro HEPA Max 970 Air Scrubber</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 col-sm-6 mb-45 hot sale">
                            <div class="videoframe">
                                <iframe id="player" style="width:100%;height:270px;" src="https://www.youtube.com/embed/eauIF1xWRe8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" class="lozad" data-loaded="true"></iframe>
                                <p class="v-title">AlorAir HEPA Pro 770 Industrial Air Scrubber</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 col-sm-6 mb-45 hot sale">
                            <div class="videoframe">
                                <iframe id="player" style="width:100%;height:270px;" src="https://www.youtube.com/embed/eauIF1xWRe8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" class="lozad" data-loaded="true"></iframe>
                                <p class="v-title">AlorAir HEPA Pro 770 Industrial Air Scrubber</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 col-sm-6 mb-45 hot sale">
                            <div class="videoframe">
                                <iframe id="player" style="width:100%;height:270px;" src="https://www.youtube.com/embed/Ei3ck-pnSF0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" class="lozad" data-loaded="true"></iframe>
                                <p class="v-title">AlorAir PureAiro HEPA Max 970 Air Scrubber</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 col-sm-6 mb-45 hot sale">
                            <div class="videoframe">
                                <iframe id="player" style="width:100%;height:270px;" src="https://www.youtube.com/embed/eauIF1xWRe8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" class="lozad" data-loaded="true"></iframe>
                                <p class="v-title">AlorAir HEPA Pro 770 Industrial Air Scrubber</p>
                            </div>
                        </div> --}}

                        @if(count($libraries)>0)
                            @foreach ($libraries as $library)
                                <div class="col-12 col-lg-4 col-md-6 col-sm-6 mb-45 hot sale">
                                    <div class="videoframe">
                                        <iframe id="player" style="width:100%;height:270px;" src="{{$library->document}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" class="lozad" data-loaded="true"></iframe>
                                        <p class="v-title">{{$library->title}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center">
                                <div class="videoframe">
                                    <p class="v-title font-18">No Video Available</p>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="row">
                        <div class="col-lg-12 text-center mt-30">
                            {{-- <a class="lezada-button lezada-button--medium lezada-button--icon--left" href="#">
                                <i class="ion-android-add"></i> MORE
                            </a> --}}
                            {!! $libraries->render() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--=====  End of shop page content  ======-->
</div>
@include('layouts.front.footer')
