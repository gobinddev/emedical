@include('layouts.front.header')

    

<style>

p.a {

  margin: 30px 0;

}



p.b {

  margin: 20px 0;

}

</style>

    <main>

           

            <div class="product-details-area pro-top-thamb pro-bottom-thamb pt-50">

                <div class="container">

                    <!-- product-details-tab-area start -->

                    <div class="product-details-content">

                        <div class="single-product-tab-content tab-content" id="myTabContent2">

                            <div class="row">

                                <p id="productaddmsg"></p>

                                <div class="col-xxl-7 col-xl-7  col-lg-6  col-md-11  col-sm-12 col-12">

                                    <div class="product-left-img-tab mt-20">

                                        

                                        <div class="d-flex align-items-start">

                                            <!-- tab-nav -->

                                            <div class="nav flex-column nav-pills me-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                               

                                            </div>



                                            <!-- tab-content -->
                                          
                                            <div class="tab-content" id="v-pills-tabContent">

                                                <div class="tab-pane  fade show active position-relative" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                                                    <div class="product-gallery-btn position-absolute z-index1 right0 mt-10 mr-10">

                                                        <a href="{{asset('uploads/products/image/'.$product[0]->image)}}" class="zoom-gallery dark-black-color bg-white d-inline-block m-2 " data-fancybox="images" ><i class="fas fa-compress"></i><img class="width100 d-none" src="{{asset('images/product/product-large-img1.jpg')}}" alt=""></a>                            

                                                    </div>

                                                    <div class="product-img border-gray2">

                                                        <img src="{{asset('uploads/products/image/'.$product[0]->image)}}" alt="product" />

                                                    </div>

                                                </div>

                                              

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-xxl-5 col-xl-5  col-lg-6  col-md-11  col-sm-12 col-12">

                                    <div class="product-view-info mt-30">

                                        <div class="product-left-img-info">

                                           @if(!empty($product))<p>SKU - {{$product[0]->brand_sku}}</p>@endif

                                       @if(!empty($product))
										   @if($product[0]->id == 39 ||  $product[0]->id == 38 ||  $product[0]->id == 151 ||  $product[0]->id == 40)
											   @else
										   <p>Brand - {{$product[0]->brand_name}}</p>
									   @endif
									   
									   @endif

                                            <h3 class="mb-20">@if(!empty($product)){{$product[0]->product_title}}@endif</h3>

                                            <span style="color:#3dbebd">In Stock</span><br>

                                          @if(Session::get('user_name')!='')

                                            <div class="price pb-18 pt-3">Price

                                                <span class="rc-price font700">@if(!empty($product))${{$product[0]->price}}@endif</span>

                                            </div>

                                           @endif

                                            <div class="p-info-text pr-55">

                                                <p class="gray-color2">@if(!empty($product)){{$product[0]->short_description}}@endif</p>

                                            </div>

                                            <div class="all-info d-sm-flex align-items-center mt-35">

                                                <div class="quick-add-to-cart d-sm-flex align-items-center mb-15 mr-10">

                                                    @if(Session::get('user_name')!='')

                                                    <div class="quantity-field position-relative d-inline-block mr-3">

                                                        <input type="number" name="quantity" id="quantity{{$product['0']->id}}" value="1" class="quantity form-control">

                                                    </div>

                                                    @endif

                                                </div>

                                                <div class="pro-list-btn d-inline-block mr-10 mb-15">

                                                    @if(Session::get('user_name')!='')

                                                    <button class="add_cart btn btn-success" data-productid="{{$product['0']->id}}" data-productname="{{$product['0']->product_title}}"  data-productprice="{{$product['0']->price}}">Add To Cart</button>

                                                   @else

                                                   <a href="{{Url('logincustomer')}}" class="web-btn h2-theme-border1 d-inline-block rounded-0 text-capitalize white h2-theme-bg position-relative over-hidden pl-35 pr-35 ptb-17">SIGN IN FOR PRICES</a>

                                                   @endif

                                                </div>

                                               

                                            </div>

                                            <ul class="review-cat d-sm-flex align-items-center pt-20 pb-15">

                                                <li class="mb-1 mb-2 mr-6 d-inline-block">

                                                    <span class="cat-title dark-black-color font600">Categories :</span>

                                                </li>

                                                <li class="mr-6 mb-2 d-inline-block position-relative">

                                                    <a class="gray-color2 font600">@if(!empty($product)){{$product[0]->category_name}}@endif</a>

                                                </li>

                                                

                                            </ul>

                                      

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12">

                                <div class="product-review-tab-area mt-60">

                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                        <li class="nav-item" role="presentation">

                                        <button class="nav-link active bg-transparent pl-0 title position-relative uppercase hvr2 font600" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Product Details</button>

                                        </li>
                                   
                                            @if($product[0]->documents)
                                         <li class="nav-item" role="presentation">

                                        <button class="nav-link bg-transparent pl-0 title position-relative uppercase hvr2 font600" id="pills-coah-tab" data-bs-toggle="pill" data-bs-target="#pills-coah" type="button" role="tab" aria-controls="pills-coah" aria-selected="true" style="text-transform:uppercase;">Coshh</button>

                                        </li>
                                        @endif
                                       
                                        

                                    </ul>

                                    <div class="tab-content mt-30" id="pills-tabContent">

                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                            <div class="describe-area">

                                                <div class="product-details-text pr-10 mb-50">

                                               @if(!empty($product)){!! $product[0]->description !!}@endif 

                                                </div> 

                                                <div class="p-review-area pb-90">

                                                    <div class="row">

                                                        <div class="col-xl-6  col-lg-6  col-md-6  col-sm-12 col-12 mb-20">

                                                            <img src="{{asset('images/banner/banner-img.jpg')}}" alt="">

                                                        </div>

                                                        <div class="col-xl-6  col-lg-6  col-md-6  col-sm-12 col-12 mb-20">

                                                            <img src="{{asset('images/banner/banner-img2.jpg')}}" alt="">

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                       
                                         <div class="tab-pane a fade show" id="pills-coah" role="tabpanel" aria-labelledby="pills-coah-tab">
                                         @if($product[0]->documents)
                                         
                                            <div class="describe-area">

                                                <div class="product-details-text pr-10 mb-50">

                                                

                                                   <a href="{{asset('uploads/products/document').'/'.$product[0]->documents}}" target="_new"><i class="fa fa-file-pdf" aria-hidden="true"></i> Download Pdf Here</a>

                                                   


                                                </div> 

                                             

                                            </div>
                                            @endif

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



        </main>

        

        

        

@include('layouts.front.footer')

  <script>

    $(document).ready(function(){

      var cart ='countcart';

        $.ajax({

                url : "{{Url('countcart')}}",

                method : "POST",

                data : {cart:cart, _token:'{{csrf_token()}}'},

                success: function(data){

                    $('#counttotal').html(data);

                },

            });

    });

 </script>

<script>

    $(document).ready(function(){

       $('.add_cart').click(function(){

            var product_id    = $(this).data("productid");

            var product_name  = $(this).data("productname");

            var product_price = $(this).data("productprice");

            var quantity = $('#quantity'+product_id).val();

            if(quantity !='' && quantity > 0)

            {

            $.ajax({

                url : "{{Url('addtocart')}}",

                method : "POST",

                data : {product_id: product_id, product_name: product_name, product_price: product_price, quantity: quantity, _token: '{{csrf_token()}}'},

                success: function(data){

                    $('#productaddmsg').addClass('text-success').text('Product Added Successfully');

                    setTimeout(function(){ $('#productaddmsg').hide();},3000);

                    $('#counttotal').html(data);

                }

            });

         }

        else

        {

            alert('please choose quantity');

        }

            

        });

 });

</script>



