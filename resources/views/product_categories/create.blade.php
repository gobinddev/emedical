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
                        <form action="{{route($route.$current_menu.'.store')}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> Create Product Category </h3>
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
                                                        <input type="text" class="form-control" placeholder="Enter Product Category Name" name="name" value="{{ old('product_code') }}" required="">
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <div class="col-12">
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
                                                                <option value="{{$pcat->id}}">{{$pcat->name}} ({{$main_cat_name}})</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 form-group mb-6">
                                                        <div class="form-group form-check pt-4">
                                                            <input type="checkbox" class="form-check-input" name="show_menu" id="show_menu">
                                                            <label class="form-check-label" for="show_menu">Show In Menu</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <div class="col">
                                                        <label>Description<span style="color: red">*</span></label>
                                                        <br>
                                                        <textarea class="form-control" style="height: 200px;width: 400px"placeholder="Enter Description" name="description" required="" rows="1"></textarea>
                                                    </div>
                                                    <div class="col">
                                                        <label>Remarks</label>
                                                        <br>
                                                        <textarea class="form-control" style="height: 200px;width: 400px "placeholder="Enter Remarks If Any ..." name="remarks" rows="1"></textarea>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="uploader">
                                            <div class="row">
                                                <div class="col">
                                                    <label>Upload Images<span style="color: red">*</span></label>
                                                    <br>
                                                    <input type="file" name="image" required="">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
</body>

</html>
