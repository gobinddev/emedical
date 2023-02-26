@include('layouts.front.header')
@php
use App\Helpers\Helper;
use App\Wishlist;
@endphp
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100"
    style="background-image: url(assets/images/inners1.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="breadcrumb-title">SHOP</h1>

                <!--=======  breadcrumb list  =======-->

                <ul class="breadcrumb-list">
                    <li class="breadcrumb-list__item"><a href="{{ url('/') }}">HOME</a></li>
                    <li class="breadcrumb-list__item"><a href="">SHOP</a></li>
                    <li class="breadcrumb-list__item breadcrumb-list__item--active">SHOP PRODUCT</li>
                </ul>

                <!--=======  End of breadcrumb list  =======-->

            </div>
        </div>
    </div>
</div>

@php
$product_images = Helper::get_product_images($product->id);
$product_documents = Helper::get_product_documentation($product->id);

$product_document_d = Helper::get_product_documentation_d($product->id);
$product_document_v = Helper::get_product_documentation_v($product->id);

$user_product_attr = Helper::getProductAttributeByPrice($product->id);

$product_attributes = Helper::getProductAttribute($product->id);

@endphp
<div class="shop-page-wrapper mt-100 mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  shop product content  =======-->
                <div class="shop-product">
                    <div class="row pb-50">
                        <div class="col-lg-6 mb-md-70 mb-sm-70">
                            <!--=======  shop product big image gallery  =======-->
                            <div class="shop-product__big-image-gallery-wrapper mb-30">
                                <!--=======  shop product gallery icons  =======-->
                                <div
                                    class="single-product__floating-badges single-product__floating-badges--shop-product">
                                    @if ($product->is_popular == 1)
                                        <span class="hot">hot</span>
                                    @endif
                                </div>
                                <div class="shop-product-rightside-icons">
                                    <span class="wishlist-icon">
                                        @auth('customer')
                                            @php
                                                $user_id = Auth::guard('customer')->user()->id;
                                                $wish_item = Wishlist::where(['user_id' => $user_id, 'product_id' => $product->id])->first();
                                            @endphp
                                            <a href="javascript:void(0)"
                                                @if ($wish_item == null) class="add_wishlist" data-id="{{ Crypt::encryptString($product->id) }}" @else class="disabled-link" @endif
                                                data-tippy="Add to wishlist" data-tippy-placement="left"
                                                data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                data-tippy-delay="50" data-tippy-arrow="true"
                                                data-tippy-theme="sharpborder">
                                                @if ($wish_item != null)
                                                    <i class="ion-android-favorite"></i>
                                                @else
                                                    <i class="ion-android-favorite-outline"></i>
                                                @endif
                                            </a>
                                        @else
                                            <a href="javascript:void(0)" data-tippy="Add to wishlist"
                                                data-tippy-placement="left" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                <i class="ion-android-favorite-outline"></i>
                                            </a>
                                        @endif
                                        </span>
                                        <span class="enlarge-icon">
                                            <a class="btn-zoom-popup" href="#" data-tippy="Click to enlarge"
                                                data-tippy-placement="left" data-tippy-inertia="true"
                                                data-tippy-animation="shift-away" data-tippy-delay="50"
                                                data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
                                                    class="ion-android-expand"></i></a>
                                        </span>
                                    </div>
                                    <!--=======  End of shop product gallery icons  =======-->
                                    <div class="shop-product__big-image-gallery-slider">
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/11.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/12.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/13.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/14.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/11.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/12.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/13.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        @if (count($product_images) > 0)
                                            @foreach ($product_images as $image)
                                                <div class="single-image">
                                                    <img src="{{ $image['filePath'] }}" class="img-fluid" alt="">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="single-image">
                                                <img src="{{ asset('images/no-product.png') }}" class="img-fluid" alt="">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!--=======  End of shop product big image gallery  =======-->
                                <!--=======  shop product small image gallery  =======-->
                                <div class="shop-product__small-image-gallery-wrapper">
                                    <div class="shop-product__small-image-gallery-slider">
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/11.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/12.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/13.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/14.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/11.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/12.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        <!--=======  single image  =======-->
                                        <!-- <div class="single-image">
                                  <img src="{{ asset('assets/img/13.jpg') }}" class="img-fluid" alt="">
                               </div> -->
                                        <!--=======  End of single image  =======-->
                                        @if (count($product_images) > 0)
                                            @foreach ($product_images as $image)
                                                <div class="single-image">
                                                    <img src="{{ $image['filePath'] }}" class="img-fluid" alt="">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="single-image">
                                                <img src="{{ asset('images/no-product.png') }}" class="img-fluid" alt="">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!--=======  End of shop product small image gallery  =======-->
                            </div>
                            <div class="col-lg-6">
                                <!--=======  shop product description  =======-->
                                <form method="post" action="{{ route('customer.cart.add', ['id' => Crypt::encryptString($product->id)]) }}" id="cart_frm">
                                    @csrf
                                    <input type="hidden" name="product_id" id="product_id" value="{{Crypt::encryptString($product->id)}}">
                                    <div class="shop-product__description">
                                        <!--=======  shop product navigation  =======-->
                                        <!-- <div class="shop-product__navigation">
                                            <a href="shop-product-basic.html"><i class="ion-ios-arrow-thin-left"></i></a>
                                            <a href="shop-product-basic.html"><i class="ion-ios-arrow-thin-right"></i></a>
                                        </div> -->
                                        <div class="shop-product__title mb-15">
                                            <h2>{{ $product->product_title }}</h2>
                                        </div>
                                        <div class="shop-product__rating mb-15">
                                            @if(count($ratings)>0)
                                                <span class="product-rating">
                                                    <i class="active ion-android-star"></i>
                                                    <i class="active ion-android-star"></i>
                                                    <i class="active ion-android-star"></i>
                                                    <i class="active ion-android-star"></i>
                                                    <i class="ion-android-star-outline"></i>
                                                </span>
                                                <span class="review-link ml-20">
                                                    <a href="#">(3 customer reviews)</a>
                                                </span>
                                            @else
                                                <span class="review-link ml-20">
                                                    <a href="#">(No Reviews Available)</a>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="shop-product__price">
                                            <span id="discounted_price" class="discounted-price">${{ $user_product_attr->discounted_price }}</span>
                                        </div>
                                        <!--=======  End of shop product price  =======-->
                                        <!--=======  shop product short description  =======-->
                                        <div class="shop-product__short-desc mb-20 product__details__text">
                                            <ul>
                                                <li><b>Ship From:</b> <span>Toovem-U.S.</span></li>
                                                <li><b>In stock:</b> <span>Ships in 24 hours. <samp>Free pickup
                                                            today</samp></span></li>
                                                <li><b>Shipping time:</b> <span>7-10 business days</span></li>
                                                @if ($product->is_return == 1)
                                                    <li><a href="" style="color: #dd2222;text-decoration:underline;"><strong>Delivery
                                                                &amp; Return</strong></a></li>
                                                @endif
                                                @if($product->vendor_id!=NULL)
                                                    <li><a href="{{url('visit-store',['id'=>Crypt::encryptString($product->vendor_id)])}}" style="color: #dd2222;text-decoration:underline;">
                                                        <strong>Visit Our Store</strong></a></li>
                                                @endif
                                                <!-- <li class="sharew">
                                        <b>Share to get $3</b>
                                        <div class="share">
                                           <a href="#"><img src="{{ asset('assets/img/fb.png') }}"></a>
                                           <a href="#"><img src="{{ asset('assets/img/ins.png') }}"></a>
                                           <a href="#"><img src="{{ asset('assets/img/linked.png') }}"></a>
                                           <a href="#"><img src="{{ asset('assets/img/tw.png') }}"></a>
                                           <a href="#"><img src="{{ asset('assets/img/pin.png') }}"></a>
                                        </div>
                                     </li> -->
                                            </ul>
                                        </div>
                                        {{-- <div class="shop-product__block shop-product__block--color mb-20">
                                            <div class="shop-product__block__title">Color: </div>
                                            <div class="shop-product__block__value">
                                                <div class="shop-product-color-list">
                                                    <ul class="single-filter-widget--list single-filter-widget--list--color">
                                                    <li class="mb-0 pt-0 pb-0 mr-10"><a class="active" href="#"><span
                                                        class="color-picker black"></span></a></li>
                                                    <li class="mb-0 pt-0 pb-0 mr-10"><a href="#"><span class="color-picker blue"></span></a></li>
                                                    <li class="mb-0 pt-0 pb-0 mr-10"><a href="#"><span class="color-picker brown"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> --}}
                                        @if($user_product_attr!=NULL)
                                            @php
                                                $product_attr_value = Helper::getProductAttributeValue($user_product_attr->id);

                                                $attr_name = $product_attr_value->pluck('attribute_name')->all();
                                            @endphp
                                            <div class="shop-product__block shop-product__block--color mb-20 w-100">
                                                <table class="w-100 @if($user_product_attr->attribute_id==NULL || count($product_attributes)<=1) d-none @endif">
                                                    <thead>
                                                        <tr>
                                                            <th>&nbsp;</th>
                                                            @if($user_product_attr->attribute_id!=NULL && count($attr_name)>0)
                                                                @foreach ($attr_name as $name)
                                                                    <th>{{ucwords($name)}}</th>
                                                                @endforeach
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(count($product_attributes)>0)
                                                            @foreach ($product_attributes as $product_attr)
                                                                @php
                                                                    $product_attr_value = Helper::getProductAttributeValue($product_attr->id);

                                                                    $attr_value = $product_attr_value->pluck('attribute_value')->all();
                                                                @endphp
                                                                <tr class="">
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input product_variant" type="radio" name="product_variant" value="{{Crypt::encryptString($product_attr->id)}}" @if($user_product_attr->id == $product_attr->id) checked @endif>
                                                                            <label class="form-check-label" for="flexRadioDefault1"></label>
                                                                      </div>
                                                                    </td>
                                                                    @if(count($attr_value)>0)
                                                                        @foreach ($attr_value as $value)
                                                                            <td>{{ucwords($value)}}</td>
                                                                        @endforeach
                                                                    @endif
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="{{ 1 + count($attr_value)}}">
                                                                        {{-- @if ($errors->has('product_variant'))
                                                                            <div class="error text-danger">
                                                                                {{ $errors->first('product_variant') }}
                                                                            </div>
                                                                        @endif --}}
                                                                        <p style="margin-bottom: 2px;" class="text-danger error-container error-product_variant" id="error-product_variant"></p>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                        <!--=======  End of shop product color block  =======-->
                                        <!--=======  shop product quantity block  =======-->
                                        <div class="shop-product__block shop-product__block--quantity mb-40">
                                            <div class="shop-product__block__title">Quantity: </div>
                                            <div class="shop-product__block__value">
                                                <div class="pro-qty d-inline-block mx-0 ">
                                                    <input type="text" value="1" name="quantity">
                                                </div>
                                                {{-- @if ($errors->has('quantity'))
                                                    <div class="error text-danger">
                                                        {{ $errors->first('quantity') }}
                                                    </div>
                                                @endif --}}
                                                <p style="margin-bottom: 2px;" class="text-danger error-container error-quantity" id="error-quantity"></p>
                                            </div>
                                        </div>
                                        <!--=======  End of shop product quantity block  =======-->
                                        <!--=======  shop product buttons  =======-->
                                        <div class="shop-product__buttons mb-40">
                                            <button type="submit" class="lezada-button lezada-button--medium" id="submit">add
                                                to cart</button>
                                            <a class="lezada-compare-button ml-20 compareproduct" rel="{{$product->id}}" href="#" data-tippy="Compare"
                                                data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                data-tippy-delay="50" data-tippy-placement="left" data-tippy-arrow="true"
                                                data-tippy-theme="sharpborder"><i class="ion-ios-shuffle"></i></a>
                                        </div>
                                        <!--=======  End of other info table  =======-->
                                    </div>
                                </form>
                                <!--=======  End of shop product description  =======-->
                            </div>
                        </div>
                        <div class="row">
                            @if (Session::has('message'))
                                <div class="col-12 pb-3">
                                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                        {{ Session::get('message') }}</p>
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <!--=======  shop product description tab  =======-->
                                <div class="shop-product__description-tab pt-50">
                                    <!--=======  tab navigation  =======-->
                                    <div class="tab-product-navigation tab-product-navigation--product-desc">
                                        <div class="nav nav-tabs justify-content-center" id="nav-tab2" role="tablist">
                                            <a class="nav-item nav-link active" id="product-tab-1" data-toggle="tab"
                                                href="#product-series-1" role="tab" aria-selected="true">Overview</a>
                                            <a class="nav-item nav-link" id="product-tab-2" data-toggle="tab"
                                                href="#product-series-2" role="tab" aria-selected="false">Specifications</a>
                                            <a class="nav-item nav-link" id="product-tab-3" data-toggle="tab"
                                                href="#product-series-3" role="tab" aria-selected="true">Guides &
                                                Documents</a>
                                            {{-- <a class="nav-item nav-link" id="product-tab-4" data-toggle="tab"
                                                href="#product-series-4" role="tab" aria-selected="false">Questions &
                                                Answers</a> --}}
                                            <a class="nav-item nav-link" id="product-tab-5" data-toggle="tab"
                                                href="#product-series-5" role="tab" aria-selected="false">Reviews ({{count($ratings)}})</a>
                                            <!-- <a class="nav-item nav-link" id="product-tab-6" data-toggle="tab" href="#product-series-6"
                                     role="tab" aria-selected="false">Wholesale Inquiry</a> -->
                                            <a class="nav-item nav-link" id="product-tab-7" data-toggle="tab"
                                                href="#product-series-7" role="tab" aria-selected="false">Discussions</a>
                                        </div>
                                    </div>
                                    <!--=======  End of tab navigation  =======-->
                                    <!--=======  tab content  =======-->
                                    <div class="tab-content product__details__tab" id="nav-tabContent2">
                                        <div class="tab-pane fade show active" id="product-series-1" role="tabpanel"
                                            aria-labelledby="product-tab-1">
                                            <!--=======  shop product long description  =======-->
                                            <!-- <div class="shop-product__long-desc mb-30">
                                                <div class="product__details__tab__desc">
                                                    <h6>Features:</h6>
                                                    <li>Energy Star Certified Dehumidifier-quickly and effectively removes moisture with less energy than conventional dehumidifiers without racking up your energy bill, saving you money. This will be the best crawl space/basement dehumidifier you will ever use. Remove 55 pints per day at AHAM condition，120 Pint at saturation, up to 1,300 sq. ft, fit for any basement, crawl space, storage areas, garage, any large room, or commercial use.</li>
                                                    <li>Automatic Defrost-a quick and efficient defrosting process, truly makes the dehumidifier able to work at a low temperature (36 degrees Fahrenheit), if frost is detected on the coils, an automatic defrost cycle runs to avoid frost build-up and issues associated with that build up. Makes the unit work continuously and efficiently without periodic stopping during the defrosting process, not only saving the energy but also making the unit last longer.</li>
                                                    <li>INTERNAL CORROSION PROTECTION-an advanced technology to minimize corrosion and freon leakage, as you know in dehumidification applications, there always get oxide, hydroxide, or sulfide, normal coils get corrosion and freon leakage quickly, this innovative feature extends the life of the coils by providing protection against, maintaining the coil’s heat transferability.</li>
                                                    <li>DESIGNED FOR THE MODERN HOME-for your full satisfaction, we designed this professional dehumidifier with the modern consumer in mind, all special features make it the best for crawlspace, basement, and commercial applications, auto defrosting system, optional Remote control system, MERV-8 filter, Low-temperature operation, C-ETL, and Energy Star listed.</li>
                                                    <li>5 Years Warranty-energy efficient &amp; safety tested our sentinel HD55 dehumidifier is energy star certified and is fully compliant with the electrical safety ETL. Every AlorAir dehumidifier comes with a 5-year warranty with a local professional customer support team ready to assist at any time. If you have any questions, please feel free to contact us, you deserve the best after-sales service.</li>
                                                    <div class="imgspro_x">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-6">
                                                            <img src="{{ asset('assets/img/productImg1.png') }}">
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <img src="{{ asset('assets/img/productImg2.png') }}">
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <p>The best dehumidifiers help reduce excess moisture, protect your home. Excessive moisture in the home can result in unpleasant odors, damage to home fixtures, and save the homeowner money and time. Choosing an ENERGY STAR dehumidifier can deliver savings on energy bills without sacrificing performance, features, and comfort while protecting the environment by reducing greenhouse gas emissions. (Note: The Energy Star Certificated was verified by Underwriters Laboratories on 2020-1-1).</p>
                                                </div>

                                            </div> -->
                                            {!! $product->description !!}
                                            <!--=======  End of shop product long description  =======-->
                                        </div>
                                        <div class="tab-pane fade" id="product-series-2" role="tabpanel"
                                            aria-labelledby="product-tab-2">
                                            <div class="shop-product__additional-info">
                                                <div class="product__details__tab__desc">
                                                    <h6>Specifications</h6>
                                                    <!-- <div class="row padding" style="margin:0px -15px;">
                                           <div class="col-lg-3 col-sm-3">
                                              <div class="imflop">
                                                 <img src="{{ asset('assets/img/productImg3.jpg') }}">
                                              </div>
                                              <p>Note: The Energy Star Certificated was verified by Underwriters Laboratories on 2020-1-1</p>
                                           </div>
                                           <div class="col-lg-6 col-sm-6">
                                              <div class="midle_points">
                                                 <h6>What makes us great?</h6>
                                                 <i>Updated Compact Design - That most dehumidifiers are clunky eyesores is news to nobody.</i>
                                                 <p>The maximum moisture extraction, of up to 120 pints per day (55 PPD AHAM), Energy Star Efficiency, at the lowest running cost.</p>
                                                 <p>Sentinel HD55 is much smaller and more compact than the conventional basement size dehumidifiers on the market. Measuring at only 19.2" (W) x 12.2" (D) x 13.3" (H), it allows for more flexibility with transportation, placement, and storage.</p>
                                                 <p>Ideal for crawl spaces, basements, warehouses, offices, factories, shops, apartments, storage areas, restaurants, bars, and museums. Commercial Grade Dehumidifier</p>
                                                 <ul class="list-style">
                                                    <li>Air Flow: 130 CFM, 230 CMH</li>
                                                    <li>Power: 115V, 60Hz; Supper COP: 2.4 L/kWh</li>
                                                    <li>Sound Pressure Level: &lt;52 dB(A)</li>
                                                    <li>Draining: Heavy-Duty Condensate Pump</li>
                                                    <li>Capacity: 120 PPD at Saturation, 55 PPD at AHAM.</li>
                                                    <li>Size for: Up to 1,300 Sq.Ft.</li>
                                                    <li>Functioning Temperature Range: 33.8~104 ℉</li>
                                                    <li>Functioning Humidity Range: 35~90%</li>
                                                 </ul>
                                              </div>
                                           </div>
                                           <div class="col-lg-3 col-sm-3">
                                              <div class="imflop">
                                                 <img src="{{ asset('assets/img/productImg4.jpg') }}">
                                              </div>
                                              <ul class="list-style">
                                                 <li>AUTO OPERATION: Turns ON and OFF Automatically.</li>
                                                 <li>AUTO DEFROST: Prevents Coils from Freezing.</li>
                                                 <li>MEMORY RESTART: Lose Power? Picks Up Where It Left Off.</li>
                                              </ul>
                                           </div>
                                        </div>
                                        <div class="row" style="margin:0px -15px;">
                                           <div class="col-lg-4 col-sm-3">
                                              <div class="fetares">
                                                 <img src="{{ asset('assets/img/productImg8.jpg') }}" class="mw-100p s-center mb-sm">
                                                 <h4 class="mb-xs f-sxx">Dehumidifier brings you health</h4>
                                                 <p> Dehumidifiers remove moisture from the air, reduce
                                                    humidity levels, they are particularly useful in parts of
                                                    the house where humidity collects like damp basements.
                                                 </p>
                                              </div>
                                           </div>
                                           <div class="col-lg-4 col-sm-3">
                                              <div class="fetares">
                                                 <img src="{{ asset('assets/img/productImg9.jpg') }}" class="mw-100p s-center mb-sm">
                                                 <h4 class="mb-xs f-sxx">Dehumidifier brings you comfort</h4>
                                                 <p>You need to use a dehumidifier if the Crawl Space &amp; Basement feels damp or stuffy. The dry environment gives you a more comfortable experience.brings you comfort</p>
                                              </div>
                                           </div>
                                           <div class="col-lg-4 col-sm-3">
                                              <div class="fetares">
                                                 <img src="{{ asset('assets/img/productImg10.jpg') }}" class="mw-100p s-center mb-sm">
                                                 <h4 class="mb-xs f-sxx">Dehumidifier brings you preservation</h4>
                                                 <p>Absorb excess water from the air through the dehumidifier to prevent the wallpaper from falling, protect home electronic equipment and music equipment. </p>
                                              </div>
                                           </div>
                                           <div class="col-lg-4 col-sm-3">
                                              <div class="fetares">
                                                 <img src="{{ asset('assets/img/productImg6.jpg') }}" class="mw-100p s-center mb-sm">
                                                 <h4 class="mb-xs f-sxx">Easy Filter Access</h4>
                                                 <p>The high-dense &gt;MERV-8 filter protects internal components from damage due to dust and other particles ensure efficient operation and long-term use. Please replace the filter once per 2-3 months. </p>
                                              </div>
                                           </div>
                                           <div class="col-lg-4 col-sm-3">
                                              <div class="fetares">
                                                 <img src="{{ asset('assets/img/productImg5.jpg') }}" class="mw-100p s-center mb-sm">
                                                 <h4 class="mb-xs f-sxx">Rare Earth Alloy Tube Evaporator</h4>
                                                 <p>To avoid Freon leakage, a fatal flaw for a dehumidifier, AlorAir has introduced Rare Earth Alloy Tube Evaporator. </p>
                                              </div>
                                           </div>
                                        </div> -->
                                                    {!! $product->specification !!}
                                                </div>

                                            </div>

                                            <!--=======  End of shop product additional information  =======-->
                                        </div>
                                        <div class="tab-pane fade show" id="product-series-3" role="tabpanel"
                                            aria-labelledby="product-tab-3">
                                            @if (count($product_documents) > 0)
                                                <div class="product__details__tab__desc">
                                                    <h6>Guides &amp; Documents</h6>
                                                    <div class="row " style="margin:0px -15px 50px;">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <!-- <img src="{{ asset('assets/img/productImg11.jpg') }}" style="width:100%;"> -->
                                                            <div class="notdopwns">
                                                                <!-- <h4>Product guides and documents</h4> -->
                                                                <!-- <div>
                                                    <a class="c-blue1 mb-xs f-xs bbold" href="xx.pdf" rel="nofollow" target="_blank">Specification Sheet (PDF)</a>
                                                 </div>
                                                 <hr>
                                                 <div>
                                                    <a href="xx.pdf" rel="nofollow" class="c-blue1 mb-xs f-xs bbold" target="_blank">User Manual (PDF)</a>
                                                 </div> -->
                                                                @if (count($product_document_d) > 0)
                                                                    <h4 class="mt-2">Documents</h4>
                                                                    <div class="row">
                                                                        @foreach ($product_document_d as $item)
                                                                            <div class="col-3">
                                                                                <a href="{{ $item['filePath'] }}"
                                                                                    title="{{ $item['file_name'] }}"
                                                                                    target="_blank"><img
                                                                                        src="{{ $item['fileIcon'] }}"
                                                                                        width="100" height="100"
                                                                                        alt="{{ $item['file_name'] }}"></a>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                                @if (count($product_document_v) > 0)
                                                                    <h4 class="mt-2">Video</h4>
                                                                    <div class="row">
                                                                        @foreach ($product_document_v as $item)
                                                                            <div class="col-3">
                                                                                <a href="{{ $item['filePath'] }}"
                                                                                    title="{{ $item['file_name'] }}"
                                                                                    target="_blank"><img
                                                                                        src="{{ $item['fileIcon'] }}"
                                                                                        width="100" height="100"
                                                                                        alt="{{ $item['file_name'] }}"></a>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-lg-12 col-sm-12">
                                              <div class="table-content newlyconts">
                                                 <h3>Product information</h3>
                                                 <p>Style:<strong>Dehumidifier</strong></p>
                                                 <table class="mw-51 p-table border-t border-grey ml-s mb-s">
                                                    <tbody>
                                                       <tr>
                                                          <th>Product Dimensions</th>
                                                          <td>11.81 x 17.72 x 11.81 inches</td>
                                                       </tr>
                                                       <tr>
                                                          <th>Item Weight</th>
                                                          <td>57.2 pounds</td>
                                                       </tr>
                                                       <tr>
                                                          <th>Manufacturer</th>
                                                          <td>AlorAir</td>
                                                       </tr>
                                                       <tr>
                                                          <th>ASIN</th>
                                                          <td>B01LWA8J37</td>
                                                       </tr>
                                                       <tr>
                                                          <th>Item model number</th>
                                                          <td>Sentinel HD55</td>
                                                       </tr>
                                                       <tr>
                                                          <th>Customer Reviews</th>
                                                          <td class="flex col">
                                                             <div class="flex f-xxs mb-xxs">
                                                                <div class="mr-xs">
                                                                   <span class="fa fa-star mr-xxxs c-yellow f-xs"></span>
                                                                   <span class="fa fa-star mr-xxxs c-yellow f-xs"></span>
                                                                   <span class="fa fa-star mr-xxxs c-yellow f-xs"></span>
                                                                   <span class="fa fa-star mr-xxxs c-yellow f-xs"></span>
                                                                   <span class="fa fa-star mr-xxxs c-yellow f-xs"></span>
                                                                </div>
                                                                <span class="c-blue1">492 Ratings </span>
                                                             </div>
                                                             <span>4.5 out of 5 stars</span>
                                                          </td>
                                                       </tr>
                                                       <tr>
                                                          <th>Is Discontinued By Manufacturer</th>
                                                          <td>No</td>
                                                       </tr>
                                                       <tr>
                                                          <th>Volume</th>
                                                          <td>120 Pints</td>
                                                       </tr>
                                                       <tr>
                                                          <th>Warranty Description</th>
                                                          <td>
                                                             5 years on compressor, evaporator, condenser (doesn't
                                                             include labor &amp; refrigerant); 3 years on
                                                             compressor, evaporator, condenser, (includes labor
                                                             &amp; refrigerant); 1 year on parts &amp; labor;
                                                          </td>
                                                       </tr>
                                                       <tr>
                                                          <th>Batteries Required?</th>
                                                          <td>No</td>
                                                       </tr>
                                                       <tr>
                                                          <th>Included Components</th>
                                                          <td>Sentinel HD55</td>
                                                       </tr>
                                                    </tbody>
                                                 </table>
                                              </div>
                                           </div> -->
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        {{-- <div class="tab-pane fade show" id="product-series-4" role="tabpanel"
                                            aria-labelledby="product-tab-4">
                                            <div class="product__details__tab__desc">
                                                <h6>Customer Q&amp;As</h6>
                                                <div class="search_option">
                                                    <div class="searchs">
                                                        <input type="text" class="searchTerm"
                                                            placeholder="What are you looking for?">
                                                        <button type="submit" class="searchButton">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                    <div class="flex findansw align-center mb-sm">
                                                        <span class="mr-s f-sxx">Can't find your answer?</span>
                                                        <button class=" ask-question" data-toggle="modal"
                                                            data-target="#ask">Ask a new question</button>
                                                        <span class="mr-s f-sxx">or</span>
                                                        <a href="#" class="border border-grey">
                                                            Customer Service
                                                        </a>
                                                        <div id="ask" class="modal question-modal fade modal-wrapper show">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <a href="#" class="closedelop"
                                                                            data-dismiss="modal" aria-label="Close"><i
                                                                                class="fa fa-times"
                                                                                aria-hidden="true"></i></a>
                                                                        <div class="modal-heading sb mb-m">
                                                                            <h3 class="bbold">Ask a Question</h3>
                                                                        </div>
                                                                        <div class="mb-ml">
                                                                            <p class="mb-xs">
                                                                                1.You can contact the
                                                                                <a href="#" class="c-blue">customer
                                                                                    service</a>. for
                                                                                any question regarding the product.
                                                                            </p>
                                                                            <p class="mb-xs">
                                                                                2.Ask the question in English to get answer
                                                                                faster.
                                                                            </p>
                                                                            <p>3.Keep your question short and to the point.
                                                                            </p>
                                                                        </div>
                                                                        <div class="questionsform">
                                                                            <form class="mb-sm" id="question-f">
                                                                                <label for="question"
                                                                                    class="mb-s flex sb"><span><span
                                                                                            class="c-orange">*</span>
                                                                                        Questions:</span><span
                                                                                        class="c-grey1"><span
                                                                                            class="q-length">0</span>/200</span></label>
                                                                                <textarea name="question" id="question" class="border border-grey
                                                            "
                                                                                    placeholder="Enter your question"
                                                                                    maxlength="200"
                                                                                    required=""></textarea>
                                                                                <div class="flex align-center mb-s">
                                                                                    <input type="checkbox"
                                                                                        id="seller-respond" name="respond"
                                                                                        value="respond"
                                                                                        class="mr-xs">
                                                                                    <label for="seller-respond">I want the
                                                                                        seller to respond.</label>
                                                                                </div>
                                                                                <br>
                                                                                <p class="c-grey1 green">
                                                                                    Once the first answer replied we'll
                                                                                    email you.
                                                                                </p>
                                                                                <button class="btn-primary submitans">
                                                                                    Submit
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal question-success-modal">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <a href="#" class="closedelop"
                                                                            data-dismiss="modal" aria-label="Close"><i
                                                                                class="fa fa-times"
                                                                                aria-hidden="true"></i></a>
                                                                        <p class="mr-s">
                                                                            Your question was successfully posted!
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p>Tips:For questions about your order, place of delivery, product
                                                        discount, taxation, delivery time, warranty, shipping, payment,
                                                        exchange rate, and other questions unrelated to the product, please
                                                        contact customer service.</p>
                                                    <div class="questonitem flex mb-sx">
                                                        <div class="flex votelefts col align-center mr-ms mt-sm">
                                                            <button class="mb-xxxs upvote">
                                                                <span class="c-orange"><i class="fa fa-sort-asc"
                                                                        aria-hidden="true"></i></span>
                                                            </button>
                                                            <span class="mb-xxxs vote-count">1</span>
                                                            <span class="mb-xxxs">votes</span>
                                                            <button class="downvote">
                                                                <span class="c-grey1"><i class="fa fa-sort-desc"
                                                                        aria-hidden="true"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="votequesion">
                                                            <div class="flex mb-xs mt-sm">
                                                                <span class="mr-s bbold">Q:</span><span
                                                                    class="c-orange1">any payment pkan on this
                                                                    itrm?</span>
                                                            </div>
                                                            <div class="flex">
                                                                <span class="bbold mr-s">A:</span>
                                                                <div>
                                                                    <p class="mb-xs">
                                                                        Yes, you can use the Amazon 12 payment plan like I
                                                                        dd. It is a cumbersome system, as the remaining
                                                                        balance on your financed amount appears as due every
                                                                        month on your Amazon credit bill, added to any new
                                                                        charges you may have made. However, if you just
                                                                        check for your new charges on the statement, pay
                                                                        that amount plus...
                                                                    </p>
                                                                    <div class="flex align-center">
                                                                        <span class="c-grey1 mr-xs">By MI1800es on
                                                                            December 18, 2019</span>
                                                                        <button
                                                                            class="pv-xxxs ph-xxs border border-black f-xxs">
                                                                            Helpful<span>(1)</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="questonitem flex mb-sx">
                                                        <div class="flex votelefts col align-center mr-ms mt-sm">
                                                            <button class="mb-xxxs upvote">
                                                                <span class="c-orange"><i class="fa fa-sort-asc"
                                                                        aria-hidden="true"></i></span>
                                                            </button>
                                                            <span class="mb-xxxs vote-count">1</span>
                                                            <span class="mb-xxxs">votes</span>
                                                            <button class="downvote">
                                                                <span class="c-grey1"><i class="fa fa-sort-desc"
                                                                        aria-hidden="true"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="votequesion">
                                                            <div class="flex mb-xs mt-sm">
                                                                <span class="mr-s bbold">Q:</span><span
                                                                    class="c-orange1">any payment pkan on this
                                                                    itrm?</span>
                                                            </div>
                                                            <div class="flex">
                                                                <span class="bbold mr-s">A:</span>
                                                                <div>
                                                                    <p class="mb-xs">
                                                                        Yes, you can use the Amazon 12 payment plan like I
                                                                        dd. It is a cumbersome system, as the remaining
                                                                        balance on your financed amount appears as due every
                                                                        month on your Amazon credit bill, added to any new
                                                                        charges you may have made. However, if you just
                                                                        check for your new charges on the statement, pay
                                                                        that amount plus...
                                                                    </p>
                                                                    <div class="flex align-center">
                                                                        <span class="c-grey1 mr-xs">By MI1800es on
                                                                            December 18, 2019</span>
                                                                        <button
                                                                            class="pv-xxxs ph-xxs border border-black f-xxs">
                                                                            Helpful<span>(1)</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="tab-pane fade" id="product-series-5" role="tabpanel"
                                            aria-labelledby="product-tab-5">
                                            <!--=======  shop product reviews  =======-->
                                            <div class="product__details__tab__desc">
                                                @if (count($ratings) <= 0)
                                                    <h6 class="text-center pb-3">No Reviews Available</h6>
                                                @else
                                                    @foreach ($ratings as $rating)
                                                        <div class="shop-product__review ">
                                                            <!--=======  single review  =======-->
                                                            <div class="single-review">
                                                                <div class="single-review__image">
                                                                    <img src="{{ asset('assets/images/user/user2.jpg') }}"
                                                                        class="img-fluid" alt="">
                                                                </div>
                                                                <div class="single-review__content">
                                                                    <!--=======  rating  =======-->
                                                                    <div class="shop-product__rating">
                                                                        <span class="product-rating">
                                                                            <i class="active ion-android-star"></i>
                                                                            <i class="active ion-android-star"></i>
                                                                            <i class="active ion-android-star"></i>
                                                                            <i class="active ion-android-star"></i>
                                                                            <i class="ion-android-star-outline"></i>
                                                                        </span>
                                                                    </div>
                                                                    <!--=======  End of rating  =======-->
                                                                    <!--=======  username and date  =======-->
                                                                    <p class="username">{{ $rating->name }} <span
                                                                            class="date">/
                                                                            {{ date('M d, Y', strtotime($rating->updated_at)) }}</span>
                                                                    </p>
                                                                    <!--=======  End of username and date  =======-->
                                                                    <!--=======  message  =======-->
                                                                    <p class="message">
                                                                        {{ $rating->review }}
                                                                    </p>
                                                                    <!--=======  End of message  =======-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                @auth('customer')
                                                    <h3 class="review-title mb-20">Add a review</h3>
                                                    <p class="text-center">Your email address will not be published.
                                                        Required fields are marked *
                                                    </p>
                                                    <!--=======  review form  =======-->
                                                    <div class="lezada-form lezada-form--review">
                                                        <form method="post" action="{{ route('customer.submitreview') }}">
                                                            {!! @csrf_field() !!}
                                                            <div class="row">
                                                                <div class="col-lg-6 mb-20">
                                                                    <input type="hidden" name="product_id"
                                                                        value="{{ $product->id }}">
                                                                    <input type="text" name="name"
                                                                        value="{{ Auth::guard('customer')->user()->display_name }}"
                                                                        placeholder="Name *" required>
                                                                </div>
                                                                <div class="col-lg-6 mb-20">
                                                                    <input type="email" name="email"
                                                                        value="{{ Auth::guard('customer')->user()->email }}"
                                                                        placeholder="Email *" required>
                                                                </div>
                                                                <div class="col-lg-12 mb-20">
                                                                    <span class="rating-title mr-30">YOUR RATING</span>

                                                                    <br>
                                                                    <div class="rating-component">

                                                                        <div class="stars-box">
                                                                            <i class="star fa fa-star selected" title="1 star"
                                                                                data-message="Poor" data-value="1"></i>
                                                                            <i class="star fa fa-star" title="2 stars"
                                                                                data-message="Too Bad" data-value="2"></i>
                                                                            <i class="star fa fa-star" title="3 stars"
                                                                                data-message="Average Quality"
                                                                                data-value="3"></i>
                                                                            <i class="star fa fa-star" title="4 stars"
                                                                                data-message="Nice" data-value="4"></i>
                                                                            <i class="star fa fa-star" title="5 stars"
                                                                                data-message="Very Good Qality"
                                                                                data-value="5"></i>
                                                                        </div>
                                                                        <div class="status-msg"></div>
                                                                        <div class="starrate">
                                                                            <label>
                                                                                <input class="ratevalue" type="hidden"
                                                                                    name="rate_value" value="" />
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-lg-12 mb-20">
                                                                    <textarea name="review" cols="30" rows="10" placeholder="Your review *"></textarea>
                                                                </div>
                                                                <div class="col-lg-12 text-center">
                                                                    <button type="submit"
                                                                        class="lezada-button lezada-button--medium">submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                @else
                                                    <a href="{{route('customer.login')}}"><h4 style="color: #ed6010" class="review-title mb-20">Login or Signup to Review</h4></a>
                                                @endauth


                                                <!--=======  End of shop product reviews  =======-->
                                            </div>
                                        </div>
                                            <div class="tab-pane fade show" id="product-series-6" role="tabpanel"
                                                aria-labelledby="product-tab-6">
                                                <div class="product_tab">
                                                    <h6>WHOLESALE INQUIRY</h6>
                                                    <div class="feedback-area">
                                                        <div class="feedback">
                                                            <form action="#">
                                                                <div class="feedback-input">
                                                                    <p class="feedback-form-author">
                                                                        <label for="author">*Title:<span
                                                                                class="required">*</span>
                                                                        </label>
                                                                    </p>
                                                                    <div class="d-flex align-items-center">
                                                                        <button>Product Name</button>
                                                                        <input style="width:256px;" type="file" name="">
                                                                        <span class="editdlet">
                                                                            <a href=""><i class="fa fa-pencil-square-o"
                                                                                    aria-hidden="true"></i></a>
                                                                            <a href=""><i class="fa fa-trash-o"
                                                                                    aria-hidden="true"></i></a>
                                                                        </span>
                                                                    </div>
                                                                    <p></p>
                                                                    <p class="feedback-form-author">
                                                                        <label for="author">*Your Target Price:<span
                                                                                class="required">*</span>
                                                                        </label>
                                                                        <input id="author" name="author" value="" size="30"
                                                                            aria-required="true" type="text">
                                                                    </p>
                                                                    <p class="feedback-form-author">
                                                                        <label for="author">*Order Quantity:<span
                                                                                class="required">*</span>
                                                                        </label>
                                                                        <input id="author" name="author" value="" size="30"
                                                                            aria-required="true" type="text">
                                                                    </p>
                                                                    <p class="feedback-form-author">
                                                                        <label for="author">*Your Name:<span
                                                                                class="required">*</span>
                                                                        </label>
                                                                        <input id="author" name="author" value="" size="30"
                                                                            aria-required="true" type="text">
                                                                    </p>
                                                                    <p class="feedback-form-author">
                                                                        <label for="email">*Email Address<span
                                                                                class="required">*</span>
                                                                        </label>
                                                                        <input id="email" name="email" value="" size="30"
                                                                            aria-required="true" type="text">
                                                                        <span class="required"><sub>*</sub> Required
                                                                            fields</span>
                                                                    </p>
                                                                    <p class="feedback-form-author">
                                                                        <label for="email">*Telephone Number:<span
                                                                                class="required">*</span>
                                                                        </label>
                                                                        <input id="email" name="email" value="" size="30"
                                                                            aria-required="true" type="text">
                                                                    </p>
                                                                    <p class="feedback-form-author">
                                                                        <label for="email">*Detailed Inquiry
                                                                            Information:<span
                                                                                class="required">*</span>
                                                                        </label>
                                                                        <textarea class="form-control"
                                                                            placeholder="
                                                   Please let us know as much as possible about your inquiry so that we can assist you with your specific needs.We are always happy to help wherever possible."> </textarea>
                                                                    </p>
                                                                    <p class="feedback-form-author">
                                                                        <a href="#" class="subelip">Submit</a>
                                                                    </p>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="bg-grey mw-73 m-auto flex wrap border-t border-l border-r border-grey2 p-spec">
                                                        <div>Power: 115V/60Hz</div>
                                                        <div>Current: 4.1A</div>
                                                        <div>COP: 2.4 L/Kwh</div>
                                                        <div>Size For: Up to 1,300 sq.ft</div>
                                                        <div>Filter: MERV-8 Filter</div>
                                                        <div>Airflow: 130 CFM, 230 CMH</div>
                                                        <div>Sound Pressure Level: &lt;52 dBA</div>
                                                        <div>Feet: Adjustable Feet</div>
                                                        <div>Refrigerant: R410A</div>
                                                        <div>Draining: Gravity Draining</div>
                                                        <div>Defrosting Control System: Automatic Defrosting</div>
                                                        <div>Functioning Temperature Range: 33.8-105℉</div>
                                                        <div>Functioning Humidity Range: 35~90%</div>
                                                        <div>Capacity: 55 Pints</div>
                                                        <div>Weight: 57 Ibs</div>
                                                        <div>Dim (L X W X H): 19.2 x 12.2 x 13.3 in</div>
                                                        <div>Loading quantity: 40 ”HQ: 792 Sets</div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show" id="product-series-7" role="tabpanel"
                                                aria-labelledby="product-tab-7">
                                                <div class="product__details__tab__desc">
                                                    <h6>DISCUSSIONS</h6>
                                                    <div class="discusion">
                                                        <button type="button"
                                                            class="btn-primary postbtn radius-s btn post_btn">
                                                            Post A New Topic
                                                        </button>
                                                        <p>Please note that Trightfilters Forums are a community for all
                                                            communicating and getting help each other. There will be some
                                                            enthusiastic friends participate in your discussions. Of course
                                                            Trightfilters customer service (with trightfilters customer
                                                            service icon) response is guaranteed ,which is the same way you
                                                            contact us at http://www.Trightfilters .com/contacts</p>
                                                        <a href="{{ route('customer.community') }}">open this forum in full
                                                            page</a>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="post_mdl">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <div class="row w-100">
                                                                    <div class="col-11">
                                                                        <h4 class="modal-title">Post a New Topic </h4>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <button type="button" class="close btn-disable"
                                                                            style="top: 12px;!important; color: red;"
                                                                            data-dismiss="modal"><small>×</small></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <form method="post"
                                                                action="{{ route('customer.discussion.addTopic') }}"
                                                                id="post_frm">
                                                                @csrf
                                                                <input type="hidden" name="product_id"
                                                                    value="{{ Crypt::encryptString($product->id) }}">
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="label_name">Title : <span
                                                                                        class="text-danger">*</span></label>
                                                                                <input type="text" name="title"
                                                                                    class="form-control"
                                                                                    placeholder="Enter Title" />
                                                                                <p style="margin-bottom: 2px;"
                                                                                    class="text-danger error-container error-title"
                                                                                    id="error-title"></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="label_name">Body : <span
                                                                                        class="text-danger">*</span></label>
                                                                                <textarea name="body" class="body"></textarea>
                                                                                <p style="margin-bottom: 2px;"
                                                                                    class="text-danger error-container error-body"
                                                                                    id="error-body"></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            @php
                                                                                $tags = Helper::get_tags();
                                                                            @endphp
                                                                            <div class="form-group">
                                                                                <label for="label_name">Tags : </label><br>
                                                                                <!-- <input type="text" name="tag" class="form-control tag" data-role="tagsinput"/> -->
                                                                                <select name="tag[]"
                                                                                    class="form-control tag" multiple
                                                                                    data-actions-box="true"
                                                                                    data-live-search="true"
                                                                                    data-live-search-normalise="true"
                                                                                    data-live-search-placeholder="Select Tag"
                                                                                    data-selected-text="count>1">
                                                                                    @if (count($tags) > 0)
                                                                                        @foreach ($tags as $tag)
                                                                                            <option
                                                                                                value="{{ $tag->id }}">
                                                                                                {{ $tag->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                                <p style="margin-bottom: 2px;"
                                                                                    class="text-danger error-container error-tag"
                                                                                    id="error-tag"></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-info btn-disable submit">Submit
                                                                    </button>
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-disable"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--=======  End of tab content  =======-->
                                    </div>
                                    <!--=======  End of shop product description tab  =======-->
                                </div>
                            </div>
                        </div>
                        <!--=======  End of shop product content  =======-->
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('.post_btn').click(function() {
                    $("#post_frm")[0].reset();
                    $('.form-control').removeClass('border-danger');
                    $('.error-container').html('');
                    $('.btn-disable').attr('disabled', false);
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('customer.discussion.addTopic') }}",
                        data: {},
                        success: function(data) {
                            if (data.success == false) {
                                window.location.reload();
                            } else if (data.success == true) {
                                $('#post_mdl').modal({
                                    backdrop: 'static',
                                    keyboard: false
                                });
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {

                        }
                    });
                });
                $('.body').summernote({

                    height: 300,

                    fontNames: ['Lato', 'Arial', 'Courier New', 'Helvetica', 'Nunito'],
                    fontNamesIgnoreCheck: ['Lato', 'Arial', 'Courier New', 'Helvetica', 'Nunito'],

                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']],
                    ],
                });

                $(document).on('submit', 'form#post_frm', function(event) {
                    event.preventDefault();
                    //clearing the error msg
                    $('p.error-container').html("");

                    var form = $(this);
                    var data = new FormData($(this)[0]);
                    var url = form.attr("action");
                    var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
                    $('.btn-disable').attr('disabled', true);
                    if ($('.submit').html() !== loadingText) {
                        $('.submit').html(loadingText);
                    }
                    $.ajax({
                        type: form.attr('method'),
                        url: url,
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            window.setTimeout(function() {
                                $('.btn-disable').attr('disabled', false);
                                $('.submit').html('Submit');
                            }, 2000);
                            if (response.success == true) {
                                // redirect to google after 5 seconds
                                window.setTimeout(function() {
                                    window.location.reload();
                                }, 2000);

                            }
                            //show the form validates error
                            if (response.success == false) {
                                for (control in response.errors) {
                                    var error_text = control.replace('.', "_");
                                    $('.error-' + error_text).html(response.errors[control]);
                                    // $('#error-'+error_text).html(response.errors[error_text][0]);
                                    // console.log('#error-'+error_text);
                                }
                                // console.log(response.errors);
                            }
                        },
                        error: function(response) {
                            // alert("Error: " + errorThrown);
                            // console.log(response);
                        }
                    });
                    event.stopImmediatePropagation();
                    return false;
                });

                $('.tag').selectpicker();

                $(document).on('change','.product_variant',function(event){
                    var _this = $(this);
                    var id = _this.val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('customer.product-variant-price') }}",
                        data: {"_token": "{{ csrf_token() }}",'id':id},
                        success: function(data) {
                            if(data.success)
                            {
                                $('.discounted-price').html('$'+data.price);
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {

                        }
                    });
                });

                $(document).on('submit', 'form#cart_frm', function(event) {
                    event.preventDefault();
                    //clearing the error msg
                    $('p.error-container').html("");
                    var _this = $(this);
                    var product_id = $('#product_id').val();

                    var form = $(this);
                    var data = new FormData($(this)[0]);
                    var url = form.attr("action");
                    var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
                    $('#submit').attr('disabled', true);
                    if ($('#submit').html() !== loadingText) {
                        $('#submit').html(loadingText);
                    }
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('customer.check-vendor-product') }}",
                        data: {'_token':'{{csrf_token()}}','product_id':product_id},
                        success: function(res) {
                            if(res.success==false)
                            {
                                window.location.href="{{route('customer.login')}}";
                            }
                            else if(res.success)
                            {
                                if(res.vendor_cnt > 1)
                                {
                                    swal({
                                        // icon: "warning",
                                        type: "warning",
                                        title: "Are you sure want to add this product to cart ?",
                                        text: "To add the others vendors product you need to remove the existing vendors product from cart.",
                                        dangerMode: true,
                                        showCancelButton: true,
                                        confirmButtonColor: "#92318B",
                                        confirmButtonText: "YES",
                                        cancelButtonText: "CANCEL",
                                        closeOnConfirm: false,
                                        closeOnCancel: false
                                        },
                                        function(e){
                                        if(e==true)
                                        {
                                            cartFormAjax(form,data,url,loadingText);
                                            swal.close();
                                        }
                                        else
                                        {
                                            swal.close();
                                            window.setTimeout(function() {
                                                $('#submit').attr('disabled', false);
                                                $('#submit').html('Add to Cart');
                                            }, 2000);
                                        }
                                    });
                                }
                                else
                                {
                                    cartFormAjax(form,data,url,loadingText);
                                }
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {

                        }
                    });

                    event.stopImmediatePropagation();
                    return false;
                });
            });

            function cartFormAjax(form,data,url,loadingText)
            {
                $.ajax({
                    type: form.attr('method'),
                    url: url,
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        window.setTimeout(function() {
                            $('#submit').attr('disabled', false);
                            $('#submit').html('Add to Cart');
                        }, 2000);
                        if (response.success == true) {
                            // redirect to google after 5 seconds
                            window.setTimeout(function() {
                                window.location.href="{{route('customer.cart.index')}}";
                            }, 2000);

                        }
                        //show the form validates error
                        if (response.success == false) {
                            for (control in response.errors) {
                                var error_text = control.replace('.', "_");
                                $('.error-' + error_text).html(response.errors[control]);
                                // $('#error-'+error_text).html(response.errors[error_text][0]);
                                // console.log('#error-'+error_text);
                            }
                            // console.log(response.errors);
                        }
                    },
                    error: function(response) {
                        // alert("Error: " + errorThrown);
                        // console.log(response);
                    }
                });
            }
        </script>

        <script type="text/javascript">
            $(".rating-component .stars-box .star").on("click", function() {
                var onStar = parseInt($(this).data("value"), 10);
                var stars = $(this).parent().children("i.star");
                var ratingMessage = $(this).data("message");

                var msg = "";
                if (onStar > 1) {
                    msg = onStar;
                } else {
                    msg = onStar;
                }
                $('.rating-component .starrate .ratevalue').val(msg);

                $(".button-box .done").show();

                if (onStar === 5) {
                    $(".button-box .done").removeAttr("disabled");
                } else {
                    $(".button-box .done").attr("disabled", "true");
                }

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass("selected");
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass("selected");
                }

                $(".status-msg .rating_msg").val(ratingMessage);
                $(".status-msg").html(ratingMessage);
                $("[data-tag-set]").hide();
                $("[data-tag-set=" + onStar + "]").show();
            });
        </script>


        @include('layouts.front.footer')
