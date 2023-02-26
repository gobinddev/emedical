@include('layouts.sidebar')


        <!-- =============== Left side End ================-->
		<style>
            .intl-tel-input.allow-dropdown.separate-dial-code{
                width: 100%;
                /* margin-bottom: 3%; */
                margin-top: 2%;
            }
        </style>
        @php
            use App\Helpers\Helper;
            $route = 'admin.';
        @endphp
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">

                <div class="row">
                    <div class="card text-left">
                        <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> Order Details </h3>
                                        <div class="data-create">
                                            <div class="container">
                                                <div class="row">
                                                    @php
                                                        $customer = Helper::get_customer_address($order->delivery_address_id);
                                                        $city_data = Helper::get_city_data($customer->city_id);
                                                        $state_data = Helper::get_state_data($customer->state_id);
                                                    @endphp
                                                    <div class="col-12">
                                                        <h4><strong>Delivery To</strong></h4>
                                                        <p class="text-muted">{{$customer->name}}</p>
                                                        <p class="text-muted">{{$customer->address_line_1}} {{$customer->address_line_2!=NULL ? ', '.$customer->address_line_2 : ''}}</p>
                                                        <p class="text-muted">{{$city_data->name}}, {{$state_data->name}} {{$customer->pincode}}</p>
                                                        <p class="text-muted">Mobile : {{$customer->phone}}</p>
                                                    </div>
                                                    <div class="col-12 py-2">
                                                        <div class="row">
                                                            <div class="col-12 pb-2"><h4><strong>Order</strong></h4></div>
                                                            <div class="col-6">
                                                                <p class="text-muted">{{date('M d, Y h:i A',strtotime($order->ordered_at))}}</p>
                                                            </div>
                                                            <div class="col-6 text-right">
                                                                <p class="text-muted">#{{$order->order_no}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 py-2">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Product Name</th>
                                                                <th scope="col">Quantity</th>
                                                                <th scope="col">Price</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if(count($order_items)>0)
                                                                    @foreach($order_items as $key => $item)
                                                                        @php
                                                                            $product = Helper::get_product_data($item->product_id);
                                                                            $product_attribute = Helper::productAttributeData($item->product_attribute_id);
                                                                            $product_attribute_value = Helper::getProductAttributeValue($product_attribute->id);
                                                                        @endphp
                                                                        <tr>
                                                                            <th scope="row">{{$key+1}}</th>
                                                                            <td>
                                                                                {{\Str::limit($product->product_title,100,'...')}},<br>
                                                                                @if($product_attribute->attribute_id!=NULL && count($product_attribute_value)>0)
                                                                                    <span>
                                                                                        @foreach ($product_attribute_value as $pa_value)
                                                                                            {{ucwords($pa_value->attribute_name).' : '.$pa_value->attribute_value.', '}}
                                                                                        @endforeach
                                                                                    </span>
                                                                                @endif
                                                                            </td>
                                                                            <td>{{$item->quantity}}</td>
                                                                            <td>$ {{$item->price}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-12 text-right">
                                                        <p class="text-dark"> Subtotal: $ {{$order->sub_total}}</p>
                                                        <p class="text-dark">Shipping Charge: $ {{$order->shipping_charge}}</p>
                                                        <p class="text-dark">Total: $ {{$order->total_price}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
				    </div>
                </div>

            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>

        </div>
    </div><!-- ============ Search UI Start ============= -->
 <style type="text/css">
     input.form-control {
    margin-top: 9px;
}
button.btn.btn-primary {
    margin-top: 9px;
}
 </style>
    <!-- ============ Search UI End ============= -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
    <script src="{{ asset('js/sidebar.large.script.min.js') }}"></script>
    <script src="{{ asset('js/echarts.min.js') }}"></script>
    <script src="{{ asset('js/echart.options.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.v1.script.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <script type="text/javascript" src="{{env('GOOGLE_MAP_SRC')}}"></script>

</body>

</html>
