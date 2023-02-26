@include('layouts.front.header')
<style>
    .current-menu-item .current-menu-item:hover {
  background-color: #666;
  color: white;
</style>
        <main>
            <div class="slider-area over-hidden">
                <div class="single-slider page-height3 d-flex align-items-center" data-background="{{asset('images/bg/product.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 d-flex align-items-center justify-content-center">
                                <div class="page-title mt-10 text-center">
                                    <h2 class="text-capitalize font600 mb-10">Products</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center bg-transparent">
                                        <li class="breadcrumb-item"><a class="primary-color" href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active text-capitalize" aria-current="page">Products</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-area shop-product mt-20 mb-100">
                <div class="container">
                    <div class="product-content single-product-tab-content">
                        </div>
                        <div class="product-wrapper mt-1">
                            <div class="row">
                                <div class="col-xl-3  col-lg-4  col-md-12  col-sm-12 col-12">
                                    <div class="shop-sidebar-area pt-50">
                                        <div class="row">
                                            <div class="col-xl-12  col-lg-12  col-md-6  col-sm-12 col-12">
                                                <div class="row">
                                                    <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12">
                                                        <div class="sidebar-widget mb-20">
                                                            <h6 class="mb-15 title font600 sidebar-title d-inline-block position-relative pb-1">Product Categories</h6>
                                                            <ul>@if(!empty($categoryname))
                                                                @for($i=0; $i< count($categoryname); $i++)
                                                                <li class="pb-15 d-block"><a href="{{Url('category/product/'.$categoryname[$i]->id)}}" id="cat{{$categoryname[$i]->id}}"  @if(Request::segment(3) == $categoryname[$i]->id) class="active"  @endif> {{$categoryname[$i]->name}}</a>
                                                                    <span class="accordion"></span>
                                                                    
                                                                </li>
                                                               @endfor
                                                               @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                                </div>

                                <div class="col-xl-9  col-lg-8  col-md-12  col-sm-12 col-12">

                                    <div class="row">
                                        <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12">
                                            <div class="shop-header pt-40 mb-20">
                                                <div class="row align-items-center position-relative s-top-nv">
                                                    <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 pb-15 position-static pl-xl-0">
                                                         <h4>@if(!empty($product[0]->category_name)) {{$product[0]->category_name}} @endif</h4>
                                                        <div class="shop-header-right d-flex align-items-center justify-content-center">
                                                            
                                                          <ul class="shop-right d-flex align-items-center">
                                                                <li>
                                                                    <div class="shop-h-title pr-20">
                                                                        <h6 class="primary-color2 mb-0 font13">@if(!empty($product)) Showing 1–{{ count($product) }} of {{ $product->total() }} results @endif</h6>
                                                                    </div>
                                                                </li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   

                        <div class="rightside">
                           <div class="row h3-purchased-product-active white-bg" id="result">
                            
                            
                             @if(!empty($product)) 

                                 @foreach($product as $list)
                                 
                            <div class="col-xl-3 col-lg-12  col-md-6  col-sm-6 col-12 plr-14">
                                <div class="single-product mb-10">
                                    <div class="single-product-img position-relative over-hidden">
                                        <!--<div class="single-product-label position-absolute theme-bg text-center  transition-3 z-index1">  -->
                                        <!--    <span class="white text-uppercase d-block font500">-20%</span>  -->
                                        <!--</div>-->
                                      <div class="most-purchased-item-img  position-relative text-center">
                                            <a class="position-relative" href="{{Url('product/'.$list->id)}}">
                                                <img src="{{asset('uploads/products/image/'.$list->image)}}" alt="product">
                                            </a>
                                            
                                       </div>
                                        <div class="single-product-info text-center transition-3">
                                            <div class="rating rating-shop d-flex justify-content-center">
                                                <ul class="d-flex mt-3">
                                                    <li>
                                                        <span ><i class="fas fa-star"></i></span>
                                                    </li>
                                                    <li>
                                                        <span ><i class="fas fa-star"></i></span>
                                                    </li>
                                                    <li>
                                                        <span ><i class="fas fa-star"></i></span>
                                                    </li>
                                                    <li>
                                                        <span ><i class="far fa-star"></i></span>
                                                    </li>
                                                    <li>
                                                        <span ><i class="far fa-star"></i></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h6 class="light-black-color2">
                                                <a href="{{Url('product/'.$list->id)}}">{{ $list->product_title}}</a>
                                            </h6>
                                        
                                            
                                            @if(Session::get('user_name') == '')
                                              <a href="{{Url('logincustomer')}}"class="disable signprice">SIGN IN FOR PRICES</a>
                                            @else
                                              <button class="signprice">$ {{ $list->price}}</button>
                                              <!--<ul class="single-product-price d-flex mt-2 transition-3 justify-content-center">-->
                                              <!--  <li>-->
                                              <!--   <span class="theme-color pr-2 d-inline-block">$ {{ $list->price}}</span>-->
                                              <!--  <span class="theme-color">-</span>-->
                                              <!--   <span class="theme-color d-inline-block font600">$ {{ $list->discounted_price}}</span>-->
                                              <!--   </li>-->
                                              <!-- </ul>-->
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endforeach 
                          @else
                           <div class="row">
                                        <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12">
                                            <div class="shop-header pt-40 mb-20">
                                                <div class="row align-items-center position-relative s-top-nv">
                                                    <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 pb-15 position-static pl-xl-0">
                                                        <div class="shop-header-right d-flex align-items-center justify-content-center">
                                                            
                                                            <ul class="shop-right d-flex align-items-center">
                                                                <li>
                                                                    <div class="shop-h-title pr-20">
                                                                        <h6 class="primary-color2 mb-0 font13">No Product Found</h6>
                                                                    </div>
                                                                </li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                           @endif
                         </div>
                    </div>

                           
                                    <div class="pagination-area mt-20 over-hidden position-relative">
                                        <div class="row">
                                            <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12">
                                                <nav class="pagination-page" aria-label="Page navigation example">
                                                    <ul class="pagination align-items-center justify-content-center">
                                                        <!--<li class="page-item">-->
                                                        <!--    <a class="page-link prev" href="#">-->
                                                        <!--        <i class="fas fa-angle-left"></i>-->
                                                        <!--        Prev-->
                                                        <!--    </a>-->
                                                        <!--</li>-->
                                                      @if(!empty($product))  {{ $product->links() }} @endif
                                                        <!--<li class="page-item">-->
                                                        <!--    <a class="page-link next" href="#">-->
                                                        <!--        Next <i class="fas fa-angle-right"></i>-->
                                                        <!--    </a>-->
                                                        <!--</li>-->
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </main>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.js" integrity="sha512-1cF8XUz5U3BlnRVqNFn+aPNwwSr/FPtrmKvM1g4dJJ9tg8kmqRUzqbSOvRRAMScDnTkOcOnnfwF3+jRA/nE2Ow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            function filterproduct(brandid)
                {
                    
                    // var services_requested = $('.svcs:checked').val();
                    var catid = "{{Request::segment(3)}}";
                    var selected = new Array();
                    selected.push(brandid);
                    var brand = selected.join(",");
                   
                  $.ajax({
                     url:"{{Url('ajaxfilter')}}",
                     type:"post",
                     dataType:"json",
                     data:{catid:catid, brand:brand, _token : '{{csrf_token()}}'},
                     success: function(response)
                       {
                          console.log(response) 
                         $("#result").html(response);
                       },
                       error: function()
                       {
                          
                          $("#result").html(response);
                          
                       },
                  });
                  
                  
                 }
        </script>
    
@include('layouts.front.footer')


