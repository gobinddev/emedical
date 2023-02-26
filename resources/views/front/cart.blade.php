@include('layouts.front.header')
  <main>
            <div class="slider-area over-hidden">
                <div class="single-slider page-height3 d-flex align-items-center" data-background="images/bg/product.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 d-flex align-items-center justify-content-center">
                                <div class="page-title mt-10 text-center">
                                    <h2 class="text-capitalize font600 mb-10">Shopping Cart</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center bg-transparent">
                                        <li class="breadcrumb-item"><a class="primary-color" href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active text-capitalize" aria-current="page">Shopping Cart</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <p id="cartmsg" style="text-align:center"></p>
        <div class="cart-area mt-50">
            <div class="container border-b-light-gray pb-100">
                <div class="cart-table text-center table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Product images</th>
                            <th scope="col">Product name </th>
                            <th scope="col">$ USD price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  $subtotal = 0; ?>
                            @foreach($data as $list)
                        <tr>
                            <td>
                                <a href="#" class="cart-img d-block">
                                    <img src="{{asset('uploads/products/image/'.$list->file_name)}}" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="#" class="p-name primary-color">
                                    {{$list->product_name}}
                                </a>
                            </td>
                            <td>
                                <div class="cart-price">${{$list->product_price}}</div></td>
                            <td>
                                <div class="all-info product-view-info text-center mt-35">
                                    <div class="quick-add-to-cart d-sm-flex align-items-centerm-auto  mb-15 mr-10">
                                        <div class="quantity-field position-relative d-inline-block m-auto">
                                            <input type="text" name="qty" value="{{$list->product_qty}}" class="quantity-input-arrow quantity-input text-center border-gray" disabled>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php $subtotal +=$list->total_price; ?>
                                <div class="cart-price">${{$list->total_price}}</div>
                            </td>
                            <td>
                                <a id="{{$list->id}}" class="romove_cart theme-color"><span class="btn btn-danger icon-clear"></span></a>
                            </td>
                        </tr>
                     
                        @endforeach
                        
                        </tbody>
                    </table>
                </div>
               
                <div class="row">
                    <div class="col-xl-6  col-lg-6  col-md-12  col-sm-12 col-12 offset-xl-6 offset-lg-6">
                        <div class="total-price-area mt-60">
                            <h2 class="font600">Cart totals</h2>
                            <ul class="pt-15 pb-25">
                                <li class="d-flex justify-content-between align-items-center border-gray1 mb-2 pl-25 pr-25 pt-15 pb-15">
                                    <span>Subtotal</span><span>$<?php echo $subtotal; ?></span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center border-gray1 pl-25 pr-25 pt-15 pb-15">
                                    <span>Total </span><span>$<?php echo $subtotal; ?></span>
                                </li>
                            </ul>
                            <a href="{{Url('checkout')}}" class="web-btn h2-theme-border1 d-inline-block text-uppercase white  rounded-0 h2-theme-color h2-theme-bg position-relative over-hidden pl-40 pr-40 ptb-17 mr-20">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </main>
@include('layouts.front.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).on('click','.romove_cart',function(){
         var row_id=$(this).attr("id"); 
            $.ajax({
                url : "{{Url('deletecart')}}",
                method : "POST",
                data : {row_id : row_id, _token: '{{csrf_token()}}'},
                success :function(data){
                    $('#cartmsg').addClass('text-success').text('Product Deleted SuccessFully');
                    setTimeout(function(){ $('#cartmsg').hide(); location.reload();},3000);
                    $('#counttotal').text(data);
                    
                }
            });
        });
       
</script>