@include('layouts.sidebar')

@php
    use App\Helpers\Helper;
    $route = 'admin.';
@endphp
        <!-- =============== Left side End ================-->
		<style>
            .intl-tel-input.allow-dropdown.separate-dial-code{
                width: 100%;
                /* margin-bottom: 3%; */
                margin-top: 2%;
            }
            .image-area {
                position: relative;
                width: 150px;
                margin-left: 20px;
                /* margin-bottom: 15px; */
                border: 1px solid #ddd;
                text-align: center;
            }
            .image-area img {
                height: 100px !important;
                width: 100px !important;
                object-fit: contain;
            }
            .remove-image,.remove-doc {
                display: none;
                position: absolute;
                top: -10px;
                right: -10px;
                border-radius: 10em;
                padding: 3px 6px 3px;
                text-decoration: none;
                font: 700 21px/20px sans-serif;
                background: #555;
                border: 3px solid #fff;
                color: #FFF;
                box-shadow: 0 2px 6px rgb(0 0 0 / 50%), inset 0 2px 4px rgb(0 0 0 / 30%);
                text-shadow: 0 1px 2px rgb(0 0 0 / 50%);
                -webkit-transition: background 0.5s;
                transition: background 0.5s;
            }

            .remove-image:hover,.remove-doc:hover {
                background: #E54E4E;
                padding: 3px 7px 5px;
                top: -11px;
                right: -11px;
                color: #fff;
            }
        </style>

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">

                <div class="row">
                    <div class="card text-left">
                        <div class="card-body">
                            {!! Form::open(array('route'=>[$route.$current_menu.'.update', $encrypt_id], 'method'=>'PUT', 'id'=>$current_menu.'-form', 'enctype'=>'multipart/form-data', 'role'=>'form')) !!}
                            {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> Edit Product </h3>
                                        <div class="data-create">
                                            <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-4 form-group mb-4">
                                                            <label for="product-category-id"> Product Category <span style="color: red">*</span> </label>
                                                            @php
                                                                $category_id=NULL;
                                                                if($records->category_id!=NULL)
                                                                {
                                                                    $category_id = explode(',',$records->category_id);
                                                                }
                                                            @endphp
                                                            <select class="form-control product_category" id="product-category" name="product_category" data-actions-box="true" data-live-search="true" data-live-search-normalise="true" data-live-search-placeholder="Select Product Category" data-selected-text="count>1">
                                                              @if(!empty($product_categories))
                                                                  @foreach($product_categories as $key=>$value)
                                                                      <option @if($category_id!=NULL && in_array($key,$category_id)) selected @endif value="{{$key}}">{{$value}}</option>
                                                                  @endforeach
                                                              @endif
                                                            </select>
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-product_category">
                                                        </div>
                                                        <div class="col-md-4 form-group mb-4" id="product-category-div">
                                                            <label for="product-sub-category-id"> Product Sub Category  </label>
                                                            <select class="form-control product_category" id="product-sub-category" name="product_sub_category" >
                                                                <option value="">Select Sub Category</option>

                                                            </select>
                                                        </div>

                                                        <div class="col-md-4 form-group mb-4" id="product-category-div">
                                                            <label for="product-sub-sub-category-id"> Product Sub Sub Category </label>
                                                            <select class="form-control product_category" id="product-sub-sub-category" name="product_sub_sub_category" >
                                                                <option value="">Select Sub Sub Category</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            @php
                                                                $product_attributes = Helper::getProductAttribute($records->id);
                                                            @endphp
                                                            @if(count($product_attributes)>0)
                                                                <table>
                                                                    <thead class="text-center">
                                                                        @foreach ($product_attributes->take(1) as $p_attr)
                                                                            @if($p_attr->attribute_id!=NULL)
                                                                                @php
                                                                                    $attr_name = [];
                                                                                    $attr_name = explode(',',$p_attr->attribute_name);
                                                                                @endphp

                                                                                @foreach ($attr_name as $value)
                                                                                    <th>{{ucwords($value)}}</th>
                                                                                @endforeach
                                                                            @endif
                                                                        @endforeach
                                                                        <th>SKU</th>
                                                                        <th>Price <small>per qty</small></th>
                                                                        <th>Discounted Price <small>per qty</small></th>
                                                                        <th>Quantity</th>
                                                                    </thead>
                                                                    <tbody id="tbody-attr">
                                                                        @php
                                                                            $i=0;
                                                                        @endphp
                                                                        @foreach ($product_attributes as $k => $p_attr)
                                                                            <tr>
                                                                                @if($p_attr->attribute_id!=NULL)
                                                                                    @php
                                                                                        $product_attribute_values = Helper::getProductAttributeValue($p_attr->id);
                                                                                    @endphp
                                                                                    @foreach ($product_attribute_values as $p_value)
                                                                                        <td>
                                                                                            <input class="form-control" class="{{$p_value->attribute_name}}" type="text" name="{{$p_value->attribute_name}}[]" value="{{$p_value->attribute_value}}">
                                                                                            <p style="margin-bottom:2px;" class="text-danger error_container error-{{$p_value->attribute_name}}" id="error-{{$p_value->attribute_name}}_{{$i}}">
                                                                                        </td>
                                                                                    @endforeach
                                                                                @endif
                                                                                <td>
                                                                                    <input class="form-control" class="sku" type="text" name="sku[]" value="{{$p_attr->sku}}">
                                                                                    <p style="margin-bottom:2px;" class="text-danger error_container" id="error-sku_{{$i}}">
                                                                                </td>
                                                                                <td>
                                                                                    <input class="form-control" class="price" type="text" name="price[]" value="{{$p_attr->price}}">
                                                                                    <p style="margin-bottom:2px;" class="text-danger error_container" id="error-price_{{$i}}">
                                                                                </td>
                                                                                <td>
                                                                                    <input class="form-control" class="discounted_price" type="text" name="discounted_price[]" value="{{$p_attr->discounted_price}}">
                                                                                    <p style="margin-bottom:2px;" class="text-danger error_container" id="error-discounted_price_{{$i}}">
                                                                                </td>
                                                                                <td>
                                                                                    <input class="form-control" class="quantity" type="number" name="quantity[]" value="{{$p_attr->quantity}}" min="1">
                                                                                    <p style="margin-bottom:2px;" class="text-danger error_container" id="error-quantity_{{$i}}">
                                                                                </td>
                                                                                @if($p_attr->attribute_id!=NULL && $i==0)
                                                                                    <td><button type="button" class="btn btn-info" id="addAttrBtn" data-id="{{Crypt::encryptString($records->id)}}"> + </button></td>
                                                                                @endif
                                                                            </tr>
                                                                            @php
                                                                                $i++;
                                                                            @endphp
                                                                        @endforeach

                                                                        {{-- @foreach ($product_attributes->take(1) as $p_attr)
                                                                            @if($p_attr->attribute_id!=NULL)

                                                                            @endif
                                                                        @endforeach --}}
                                                                    </tbody>
                                                                </table>
                                                            @else
                                                                <table>
                                                                    <thead class="text-center">
                                                                        <th>SKU</th>
                                                                        <th>Price <small>per qty</small></th>
                                                                        <th>Discounted Price <small>per qty</small></th>
                                                                        <th>Quantity</th>
                                                                    </thead>
                                                                    <tbody id="tbody-attr">
                                                                        <td>
                                                                            <input class="form-control" class="sku" type="text" name="sku[]">
                                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-sku_0">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" class="price" type="text" name="price[]" value="0">
                                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-price_0">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" class="discounted_price" type="text" name="discounted_price[]" value="0">
                                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-discounted_price_0">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" class="quantity" type="number" name="quantity[]" value="1" min="1">
                                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-quantity_0">
                                                                        </td>
                                                                    </tbody>
                                                                </table>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 form-group mb-4">
                                                            <label for="product-brand-id"> Product Brand <span style="color: red">*</span> </label>
                                                            <select class="form-control" id="product-brand" name="product_brand">
                                                                <option>--Select--</option>
                                                              @if(!empty($product_brands))
                                                                  @foreach($product_brands as $key=>$value)
                                                                      <option @if($key==$records->brand_id) selected @endif value="{{$key}}">{{$value}}</option>
                                                                  @endforeach
                                                              @endif
                                                            </select>
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-product_brand">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 form-group mb-4">
                                                            <label for="url"> Product Title <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="title" type="text" placeholder="Enter Product Title" name="title" value="{{$records->product_title}}">
                                                            <!-- @if($errors->has('title'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('title')}}
                                                                </div>
                                                            @endif -->
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-title">
                                                        </div>
                                                        {{-- <div class="col-md-4 form-group mb-4">
                                                            <label for="url"> Price <small>per qty</small> <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="price" type="text" name="price" value="{{$records->price}}">
                                                            <!-- @if($errors->has('price'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('price')}}
                                                                </div>
                                                            @endif -->
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-price">
                                                        </div>
                                                        <div class="col-md-4 form-group mb-4">
                                                            <label for="url"> Discount Price <small>per qty</small> <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="discount_price" type="text" name="discount_price" value="{{$records->discounted_price}}">
                                                            <!-- @if($errors->has('discount_price'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('discount_price')}}
                                                                </div>
                                                            @endif -->
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-discount_price">
                                                        </div>
                                                        <div class="col-md-4 form-group mb-4">
                                                            <label for="url"> Quantity <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="quantity" type="number" name="quantity" value="{{$records->quantity}}" min="1">
                                                            <!-- @if($errors->has('quantity'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('quantity')}}
                                                                </div>
                                                            @endif -->
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-quantity">
                                                        </div> --}}
                                                        <div class="col-md-4 form-group mb-6">
                                                            <label for="url"> In Box </label>
                                                            <input class="form-control" id="in_box" type="text" name="in_box" value="{{$records->in_box}}">
                                                            <!-- @if($errors->has('in_box'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('in_box')}}
                                                                </div>
                                                            @endif -->
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-in_box">
                                                        </div>
                                                        <div class="col-md-4 form-group mb-6">
                                                            <div class="form-group form-check pt-4">
                                                                <input type="checkbox" class="form-check-input" name="is_popular" id="is_popular" @if($records->is_popular==1) checked @endif>
                                                                <label class="form-check-label" for="is_popular">Is Popular</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 form-group mb-6">
                                                            <div class="form-group form-check pt-1">
                                                                <input type="checkbox" class="form-check-input" name="is_return" id="is_return" @if($records->is_return==1) checked @endif>
                                                                <label class="form-check-label" for="is_return">Is Return</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 form-group mb-6">
                                                            <div class="form-group form-check pt-1">
                                                                <input type="checkbox" class="form-check-input" name="is_rent" id="is_rent" @if($records->is_rent==1) checked @endif>
                                                                <label class="form-check-label" for="is_rent">Is Rent</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row rent_row @if($records->is_rent==0) d-none @endif">
                                                        <div class="col-4 form-group mb-4">
                                                            <label for="url"> Rent Price <small>per week</small> <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="rent_price" type="text" name="rent_price" value="{{$records->rent_price}}">
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-rent_price">
                                                         </div>
                                                         <div class="col-4 form-group mb-4">
                                                            <label for="url"> Rent Deposit <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="rent_deposit" type="text" name="rent_deposit" value="{{$records->rent_deposit}}">
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-rent_deposit">
                                                         </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 py-2">
                                                            <h4><strong>Description</strong></h4>
                                                        </div>
                                                        <div class="col-md-12 form-group mb-4">
                                                            <label for="title"> Short Description <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="short_description" type="text" placeholder="Enter Short Description" name="short_description" value="{{$records->short_description}}">
                                                            <!-- @if($errors->has('short_description'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('short_description')}}
                                                                </div>
                                                            @endif -->
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-short_description">
                                                        </div>
                                                        <div class="col-md-12 form-group mb-4">
                                                            <label for="title"> Description <span style="color: red">*</span> </label>
                                                            <textarea class="form-control summernote" name="description">{!! $records->description !!}</textarea>
                                                            <!-- @if($errors->has('description'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('description')}}
                                                                </div>
                                                            @endif -->
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-description">
                                                        </div>
                                                        <div class="col-md-12 form-group mb-4">
                                                            <label for="title"> Specification </label>
                                                            <textarea class="form-control summernote" name="specification">{!! $records->specification !!}</textarea>
                                                            <!-- @if($errors->has('specification'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('specification')}}
                                                                </div>
                                                            @endif -->
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-specification">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        @php
                                                            $product_image = Helper::get_product_images($records->id);

                                                            $product_documentation = Helper::get_product_documentation($records->id);
                                                            $i=0;
                                                        @endphp
                                                        <div class="col-12 py-2">
                                                            <h4><strong>Product Images</strong></h4>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8 form-group mb-6">
                                                            <table>
                                                                <tbody id="tbody">
                                                                    @if(count($product_image)>0)
                                                                        @foreach($product_image as $key => $item)
                                                                        <tr>
                                                                            <td>
                                                                                <div class="image-area">
                                                                                    <img src="{{$item['filePath']}}" alt="Preview" title="{{$item['file_name']}}">
                                                                                    <a class="remove-image" data-id="{{$item['file_id']}}" href="javascript:;" style="display: inline;">×</a>
                                                                                    <input type="hidden" name="product_image[]" value="{{$item['file_id']}}">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <label for="{{'is-thumbnail'.$key}}"> Is Thumbnail? </label>
                                                                                <input class="form-control is-thumbnail" id="{{'is-thumbnail'.$key}}" type="radio" name="is_thumbnail" @if($item['fileThumbnail']==1) checked @endif value="{{$key}}">
                                                                            </td>
                                                                        </tr>
                                                                        @php
                                                                            $i++;
                                                                        @endphp
                                                                        @endforeach
                                                                    @endif
                                                                    <tr>
                                                                        <td>
                                                                            <label for="image"> Upload Image <span style="color: red">*</span> </label>
                                                                            <input class="form-control" id="image" type="file" name="image[]">
                                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-image_0">
                                                                        </td>
                                                                        <td>
                                                                            <label for="{{'is-thumbnail'.$i}}"> Is Thumbnail? </label>
                                                                            <input class="form-control is-thumbnail" id="{{'is-thumbnail'.$i}}" type="radio" name="is_thumbnail" value="{{$i}}">
                                                                        </td>
                                                                        <td><button type="button" class="btn btn-info mt-3" id="addBtn"> + </button></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-image"></p>
                                                            <div class="image-result"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 py-2">
                                                            <h4><strong>Product Documentation</strong></h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8 form-group mb-6">
                                                            <table>
                                                                <tbody id="tbodydoc">
                                                                    <tr>
                                                                        @if(count($product_documentation)>0)
                                                                            @foreach($product_documentation as $key => $item)
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="image-area">
                                                                                        <img src="{{$item['fileIcon']}}" alt="Preview" title="{{$item['file_name']}}">
                                                                                        <a class="remove-doc" data-id="{{$item['file_id']}}" href="javascript:;" style="display: inline;">×</a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        @endif
                                                                        <td>
                                                                            <label for="image"> Upload Document <span style="color: red">*</span> </label>
                                                                            <input class="form-control" id="document" type="file" name="document[]">
                                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-document_0">
                                                                        </td>
                                                                        <td><button type="button" class="btn btn-info mt-3" id="addDocBtn"> + </button></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-document"></p>
                                                            <div class="doc-result"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uploader">
                                                <div class="row">
                                                    <div class="col-md-12 form-group mb-3 text-right">
                                                        <button type="submit" class="btn btn-success submit"> Submit </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
				    </div>
                </div>

            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>

        </div>
    </div><!-- ============ Search UI Start ============= -->
 <style type="text/css">
     /* input.form-control {
    margin-top: 9px;
} */
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
   <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js "></script>
    <script>
        $(document).ready(function() {

            $(document).on('change','select#product-category',function(){
                var parent_id = $(this).val();
                $.ajax({
                        type: 'post',
                        url: "{{url($route.'products.getChildCategory')}}",
                        data: {"_token": "{{ csrf_token() }}", 'parent_id':parent_id},
                        dataType: 'json',
                        success: function (response) {
                            $("#product-sub-category").empty();
                            $("#product-sub-category").html('<option value="">Select Sub Category</option>');
                            $.each(response.data,function(key,value){
                                $('#product-sub-category').append('<option value="'+value.id+'">'+value.name+'</option>');
                            });
                        }
                    });
            });


            $(document).on('change','select#product-sub-category',function(){
                var parent_id = $(this).val();
                $.ajax({
                        type: 'post',
                        url: "{{Url($route.'products.getChildCategory')}}",
                        data: {"_token": "{{ csrf_token() }}", 'parent_id':parent_id},
                        dataType: 'json',
                        success: function (response) {
                            $("#product-sub-sub-category").empty();
                            $("#product-sub-sub-category").html('<option value="">Select Sub Sub Category</option>');
                            $.each(response.data,function(key,value){
                                $('#product-sub-sub-category').append('<option value="'+value.id+'">'+value.name+'</option>');
                            });
                        }
                    });
            });

            // Denotes total number of rows
            var rowIdx = 0;

            // Denotes total number of rows

            var rowdIdx = 0;

            var cur_image_row = 0;

            var imagerow = 0;

            if($('input[name="product_image[]"]').length > 0)
            {
                cur_image_row = $('input[name="product_image[]"]').length;

                imagerow = $('input[name="product_image[]"]').length;

                //console.log(cur_image_row);
            }

            // Denotes total number of rows

            var rowaIdx = 0;

            var cur_attr_row = 0;

            var attr_row = 0;

            if($('input[name="price[]"]').length > 0)
            {
                cur_attr_row = $('input[name="price[]"]').length;

                attr_row = $('input[name="price[]"]').length;

                //console.log(cur_attr_row);
            }

            $(document).on('click','#addAttrBtn',function(){
                var parent_id = $(this).attr('data-id');

                    $.ajax({
                        type: 'post',
                        url: "{{route($route.'products.checkProductAttribute')}}",
                        data: {"_token": "{{ csrf_token() }}", 'product_id':parent_id},
                        success: function (response) {
                            var arr = response.attr;

                            var attr_result = '';

                            ++rowaIdx;

                            if(arr.length > 0)
                            {
                                $.each(arr,function(i,v){
                                    attr_result+=`<td>
                                                        <input class="form-control" class="${v}" type="text" name="${v}[]">
                                                        <p style="margin-bottom:2px;" class="text-danger error_container error-${v}" id="error-${v}_${cur_attr_row}">
                                                    </td>`;
                                });
                            }

                            $('#tbody-attr').append(`<tr id="R${rowaIdx}">
                                                        ${attr_result}
                                                        <td>
                                                            <input class="form-control" class="sku" type="text" name="sku[]">
                                                            <p style="margin-bottom:2px;" class="text-danger error_container error-sku" id="error-sku_${cur_attr_row}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" class="price" type="text" name="price[]" value="0">
                                                            <p style="margin-bottom:2px;" class="text-danger error_containe error-price" id="error-price_${cur_attr_row}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" class="discounted_price" type="text" name="discounted_price[]" value="0">
                                                            <p style="margin-bottom:2px;" class="text-danger error_container error-discounted_price" id="error-discounted_price_${cur_attr_row}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" class="quantity" type="number" name="quantity[]" value="1" min="1">
                                                            <p style="margin-bottom:2px;" class="text-danger error_container error-quantity" id="error-quantity_${cur_attr_row}">
                                                        </td>
                                                        <td><button type="button" class="btn btn-danger removeAttrBtn" data-id=${parent_id}> - </button></td>
                                                    </tr>
                                                 `);
                        cur_attr_row++;

                        }
                    });

            });

            $(document).on('click','.removeAttrBtn',function(){
                    var child = $(this).closest('tr').nextAll();

                    var parent_id = $(this).attr('data-id');

                    var arr = [];

                    // if( $('.attr').length > 0)
                    // {
                    //     var i = 0;
                    //     $('.attr').each(function(index,v){
                    //         arr[i] = $(this).val();
                    //         i++;
                    //     });
                    // }
                    $.ajax({
                        type: 'post',
                        url: "{{route($route.'products.checkProductAttribute')}}",
                        data: {"_token": "{{ csrf_token() }}", 'product_id':parent_id},
                        success: function (response) {
                            arr = response.attr;
                            var row = attr_row;
                            child.each(function () {
                                    // Getting <tr> id.
                                    var id = $(this).attr('id');

                                    var _this = $(this);

                                    // Gets the row number from <tr> id.
                                    var dig = parseInt(id.substring(1));

                                       // Modifying row id.
                                    $(this).attr('id', `R${dig - 1}`);

                                    if(arr.length > 0)
                                    {
                                        $.each(arr,function(index,v){
                                            _this.find('.error-'+v).attr('id',`error-${v}_${row}`);
                                        });
                                    }



                                $(this).find('.error-sku').attr('id',`error-sku_${row}`);
                                $(this).find('.error-price').attr('id',`error-price_${row}`);
                                $(this).find('.error-discounted_price').attr('id',`error-discounted_price_${row}`);
                                $(this).find('.error-quantity').attr('id',`error-quantity_${row}`);

                                row++;


                            });

                        }
                    });

                            // child.each(function () {
                            //     // Getting <tr> id.
                            //     var id = $(this).attr('id');

                            //     var _this = $(this);

                            //     // Gets the row number from <tr> id.
                            //     var dig = parseInt(id.substring(1));

                            //     // Modifying row id.
                            //     $(this).attr('id', `R${dig - 1}`);

                            //     if(arr.length>0)
                            //     {
                            //         console.log('hi');
                            //         $.each(arr,function(i,v){
                            //             _this.find('.error-'+v).attr('id',`error-size_${dig - 1}`);
                            //         });
                            //     }

                            //     $(this).find('.error-sku').attr('id',`error-sku_${dig - 1}`);
                            //     $(this).find('.error-price').attr('id',`error-price_${dig - 1}`);
                            //     $(this).find('.error-discounted_price').attr('id',`error-discounted_price_${dig - 1}`);
                            //     $(this).find('.error-quantity').attr('id',`error-quantity_${dig - 1}`);
                            // });

                            // Removing the current row.
                            $(this).closest('tr').remove();

                            // Decreasing total number of rows by 1.
                            rowaIdx--;

                            cur_attr_row--;


            });

            //$('.product_category').selectpicker();

            $('.summernote').summernote({

                height:300,

                fontNames: ['Lato','Arial','Courier New','Helvetica','Nunito'],
                fontNamesIgnoreCheck: ['Lato','Arial','Courier New','Helvetica','Nunito'],

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

            $('#addBtn').on('click', function () {
                ++cur_image_row;
                 // Adding a row inside the tbody.
                 $('#tbody').append(`<tr id="R${++rowIdx}">
                    <td>
                        <label for="image"> Upload Image </label>
                        <input class="form-control" id="image" type="file" name="image[]">
                        <p style="margin-bottom:2px;" class="text-danger error_container" id="error-image_${rowIdx}">
                    </td>
                    <td>
                        <label for="is-thumbnail"> Is Thumbnail? </label>
                        <input class="form-control is-thumbnail" id="is-thumbnail" type="radio" name="is_thumbnail" value="${cur_image_row}">
                    </td>
                    <td><button type="button" class="btn btn-danger remove mt-3"> - </button></td>
                    </tr>`);

                    var i = 0;
                    $('.is-thumbnail').each(function(){
                        $(this).attr('id',`is-thumbnail${i}`);
                        $(this).val(i);
                        i++;
                    });

            });

            $('#tbody').on('click', '.remove', function () {

                // Getting all the rows next to the row
                // containing the clicked button
                var child = $(this).closest('tr').nextAll();

                // Iterating across all the rows
                // obtained to change the index
                child.each(function () {

                // Getting <tr> id.
                var id = $(this).attr('id');

                // Gets the row number from <tr> id.
                var dig = parseInt(id.substring(1));

                // Modifying row id.
                $(this).attr('id', `R${dig - 1}`);
                $(this).find('.error_container').attr('id',`error-image_${dig - 1}`);
                });

                // Removing the current row.
                $(this).closest('tr').remove();

                // Decreasing total number of rows by 1.
                rowIdx--;

                var i = 0;
                $('.is-thumbnail').each(function(){
                    $(this).attr('id',`is-thumbnail${i}`);
                    $(this).val(i);
                    i++;
                });
            });

            $(document).on('click','.remove-image',function(){
                var _this = $(this);

                if(confirm('Are You Want to remove image ?'))
                {
                    var id = _this.attr('data-id');

                    $('.image-result').append(`<input type="hidden" name="remove_img[]" value="${id}">`);

                    _this.closest('tr').remove();

                    var i = 0;
                    $('.is-thumbnail').each(function(){
                        $(this).attr('id',`is-thumbnail${i}`);
                        $(this).val(i);
                        i++;
                    });
                }
                return false;
            });

            $('#addDocBtn').on('click', function () {

                $('#tbodydoc').append(`<tr id="R${++rowdIdx}">
                <td>
                    <label for="document"> Upload Document </label>
                    <input class="form-control" id="document" type="file" name="document[]">
                    <p style="margin-bottom:2px;" class="text-danger error_container" id="error-document_${rowdIdx}">
                </td>
                <td><button type="button" class="btn btn-danger removeDoc mt-3"> - </button></td>
                </tr>`);
            });

            $('#tbodydoc').on('click', '.removeDoc', function () {

                // Getting all the rows next to the row
                // containing the clicked button
                var child = $(this).closest('tr').nextAll();

                // Iterating across all the rows
                // obtained to change the index
                child.each(function () {

                // Getting <tr> id.
                var id = $(this).attr('id');

                // Gets the row number from <tr> id.
                var dig = parseInt(id.substring(1));

                // Modifying row id.
                $(this).attr('id', `R${dig - 1}`);
                $(this).find('.error_container').attr('id',`error-document_${dig - 1}`);
                });

                // Removing the current row.
                $(this).closest('tr').remove();

                // Decreasing total number of rows by 1.
                rowdIdx--;
            });

            $(document).on('click','.remove-doc',function(){
                var _this = $(this);

                if(confirm('Are You Want to remove Document ?'))
                {
                    var id = _this.attr('data-id');

                    $('.doc-result').append(`<input type="hidden" name="remove_doc[]" value="${id}">`);

                    _this.closest('tr').remove();

                    var i = 0;
                    $('.is-thumbnail').each(function(){
                        $(this).attr('id',`is-thumbnail${i}`);
                        $(this).val(i);
                        i++;
                    });
                }
                return false;
            });

            $(document).on('submit', 'form#products-form', function (event) {
                event.preventDefault();
                //clearing the error msg
                $('p.error_container').html("");
                var form = $(this);
                var data = new FormData($(this)[0]);
                var url = form.attr("action");
                var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
                //$('.submit').attr('disabled',true);
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
                        success: function (response) {
                            window.setTimeout(function(){
                                $('.submit').attr('disabled',false);
                                $('.submit').html('Submit');
                            },2000);
                            if(response.success==true) {
                                // redirect to google after 5 seconds
                                window.setTimeout(function() {
                                    window.location = "{{ url('/')}}"+"/admin/products/";
                                }, 2000);

                            }
                            //show the form validates error
                            if(response.success==false ) {
                                for (control in response.errors) {
                                var error_text = control.replace('.',"_");
                                $('#error-'+error_text).html(response.errors[control]);
                                // $('#error-'+error_text).html(response.errors[error_text][0]);
                                // console.log('#error-'+error_text);
                                }
                                // console.log(response.errors);
                            }
                        },
                        error: function (response) {
                            // alert("Error: " + errorThrown);
                            console.log(response);
                        }
                    });
                    event.stopImmediatePropagation();
                    return false;
            });

            $(document).on('change','#is_rent',function(){
                var _this = $(this);

                if(_this.is(':checked'))
                {
                    $('.rent_row').removeClass('d-none');
                }
                else
                {
                    $('.rent_row').addClass('d-none');
                }
            });
         });


    </script>
</body>

</html>
