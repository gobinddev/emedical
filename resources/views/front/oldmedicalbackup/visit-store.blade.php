@include('layouts.front.header')
@php
    use App\Helpers\Helper;
    use App\Wishlist;
@endphp

<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70" style="background-image: url(https://m.media-amazon.com/images/S/stores-image-uploads-eu-prod/e/AmazonStores/A21TJRUUN4KGV/aee81d310aab645cca6e93d7a507f940.w3000.h600._CR0%2C0%2C3000%2C600_SX1500_.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="breadcrumb-title">{{$vendor->business_name}}</h1>
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
                        </ul>
                    </div>
                    <!--=======  End of fitler titles  =======-->
                </div>

                <div class="col-12 col-lg-5 col-md-2">
                    <!--=======  filter icons  =======-->

                    <div class="filter-icons">
                        <!--=======  filter dropdown  =======-->

                        <div class="single-icon filter-dropdown">

                        </div>

                        <!--=======  End of filter dropdown  =======-->

                        <!--=======  grid icons  =======-->

                        <div class="single-icon grid-icons">
                            <a data-target="five-column" href="javascript:void(0)"><i
                                    class="ti-layout-grid4-alt"></i></a>
                            <a data-target="four-column" class="active" href="javascript:void(0)"><i
                                    class="ti-layout-grid3-alt"></i></a>
                            <a data-target="three-column" href="javascript:void(0)"><i
                                    class="ti-layout-grid2-alt"></i></a>
                            <a data-target="list" href="javascript:void(0)"><i class="ti-view-list"></i></a>
                        </div>

                        <!--=======  End of grid icons  =======-->

                        <!--=======  advance filter icon  =======-->

                        <div class="single-icon advance-filter-icon">

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

                <div class="col-lg-12 order-1 order-lg-2 mb-md-80 mb-sm-80">

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
