@include('layouts.sidebar');    


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
                        {!! Form::open(array('route'=>[$route.$current_menu.'.update', $encrypt_id], 'method'=>'PUT', 'id'=>$current_menu.'-form', 'enctype'=>'multipart/form-data', 'role'=>'form', 'onSubmit' => 'return checkPassword(this)')) !!}
                            {!! csrf_field() !!}
                            <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> Edit Tag </h3> 
                                        <div class="data-create">
                                            <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-4 form-group mb-4">
                                                            <label for="url"> Name <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="name" type="text" placeholder="Enter Tag Name" name="name" value="{{ $records->name }}">
                                                            @if($errors->has('name'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('name')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uploader">
                                                <div class="row">
                                                    @if($records->file_name!=NULL)
                                                        <img width="100" height="100" src="{{URL::asset('images/tag_master/')}}{{'/'.$records->file_name}}" alt="tag" />
                                                    @endif
                                                    <input type="hidden" name="image_name" value="{{$records->file_name}}">
                                                    <div class="col">
                                                        <label>Upload Image</label>
                                                        <br>
                                                        <input type="file" name="image">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 form-group mb-3 text-right">
                                                        <button type="submit" class="btn btn-success"> Update </button>
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
    <!-- ============ jquery-summernote ============= -->
    <!-- <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>

   
</body>

</html>