@include('layouts.sidebar')


        <!-- =============== Left side End ================-->

        @php
            use App\ProductCategory;
            $route = 'admin.';
        @endphp
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">

                <div class="row">
                    <div class="card text-left">
                        {!! Form::open(array('route'=>[$route.$current_menu.'.update', $encrypt_id], 'method'=>'PUT', 'id'=>$current_menu.'-form', 'enctype'=>'multipart/form-data', 'role'=>'form')) !!}
                              {!! csrf_field() !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> Edit Product Category </h3>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="data-create">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label>Product Category Name<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="text" class="form-control" placeholder="Enter Product Category Name" name="name" required="" value="{{$records[0]->name}}">
                                                    </div>

                                                </div>
                                                <br>
                                                 <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Parent Category</label>
                                                        <br>
                                                        <select class="form-control" name="parent_id">
                                                            <option value="0">Select Parent Product Category</option>
                                                            @foreach($productCategory AS $pcat)
                                                                @php
                                                                    $main_cat_name = 'Main Category';
                                                                    if ($pcat->parent_id != 0) {
                                                                        $category = ProductCategory::where('id',$pcat->parent_id)->first();

                                                                        $main_cat_name = $category->name;
                                                                    }
                                                                @endphp
                                                                <option @if($pcat->id==$records[0]->parent_id) selected @endif value="{{$pcat->id}}">{{$pcat->name}} ({{$main_cat_name}})</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 form-group mb-6">
                                                        <div class="form-group form-check pt-4">
                                                            <input type="checkbox" class="form-check-input" name="show_menu" id="show_menu" @if($records[0]->show_in_menu==1) checked @endif>
                                                            <label class="form-check-label" for="show_menu">Show In Menu</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                     <div class="col">
                                                        <label>Description<span style="color: red">*</span></label>
                                                        <br>
                                                        <textarea class="form-control" style="height: 200px;width: 400px" placeholder="Enter Description" name="description" rows="1">{{$records[0]->description}}</textarea>
                                                    </div>
                                                    <div class="col">
                                                        <label>Remarks</label>
                                                        <br>
                                                        <textarea class="form-control" style="height: 200px;width: 400px" placeholder="Enter Remarks If Any ..." name="remarks" rows="1">{{$records[0]->remarks}}</textarea>
                                                    </div>
                                                 </div>
                                                 <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <label>Status</label>
                                                        <br>
                                                        <select class="form-control" name="status">
                                                           <option value="" selected="">Select Status</option>
                                                           <option value="0" {{$records[0]->status == '0'  ? 'selected' : ''}}>Inactive</option>
                                                           <option value="1" {{$records[0]->status == '1'  ? 'selected' : ''}}>Active</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                    </div>
                                                    <div class="col">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="uploader">
                                            <div class="row">

                                                <img width="100" height="100" src="{{URL::asset('images/product_categories/')}}{{'/'.$records[0]->image}}" alt="product_category" />
                                                <input type="hidden" name="product_category" value="{{$records[0]->image}}">
                                                <div class="col">
                                                    <label>Upload Images</label>
                                                    <br>
                                                    <input type="file" name="image">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
		            </div>
                </div>

            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>

        </div>
    </div><!-- ============ Search UI Start ============= -->

    <!-- ============ Search UI End ============= -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
    <script src="{{ asset('js/sidebar.large.script.min.js') }}"></script>
    <script src="{{ asset('js/echarts.min.js') }}"></script>
    <script src="{{ asset('js/echart.options.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.v1.script.min.js') }}"></script>
</body>

</html>
