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
            $route = 'admin.';
        @endphp

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">

                <div class="row">
                    <div class="card text-left">
                        <div class="card-body">
                            <form action="{{route($route.$current_menu.'.store')}}" method="POST" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> Create Attribute </h3>
                                        <div class="data-create">
                                            <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label for="url"> Type <span style="color: red">*</span> </label>
                                                            <select class="form-control" id="type" name="type">
                                                                <option value="">--Select--</option>
                                                                @if (count($attribute_types)>0)
                                                                    @foreach ($attribute_types as $item)
                                                                        <option value="{{$item->id}}">{{ucwords($item->name)}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            @if($errors->has('type'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('type')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label for="url"> Name <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="name" type="text" placeholder="Enter Attribute Name" name="name" value="{{ old('name') }}">
                                                            @if($errors->has('name'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('name')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label for="url"> List Order </label>
                                                            <input class="form-control" id="list_order" type="number" placeholder="Enter List Order" name="list_order" value="0" min="0">
                                                            @if($errors->has('list_order'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('list_order')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-12 form-group mb-4">
                                                            <label for="url"> Categories <span style="color: red">*</span> </label>
                                                            <select class="form-control" id="category" name="category">
                                                                <option value="">--Select--</option>
                                                                @if (count($productCategory)>0)
                                                                    @foreach ($productCategory as $item)
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            @if($errors->has('category'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('category')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uploader mt-3">
                                                <div class="row">
                                                    <div class="col-md-12 form-group mb-3 text-right">
                                                        <button type="submit" class="btn btn-success"> Submit </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
				    </div>
                </div>

            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>

        </div>
    </div><!-- ============ Search UI Start ============= -->
 <style type="text/css">
     input.form-control,select.form-control {
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>



</body>

</html>
