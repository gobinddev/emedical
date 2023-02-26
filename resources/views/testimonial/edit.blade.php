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
                        {!! Form::open(array('route'=>[$route.$current_menu.'.update', $encrypt_id], 'method'=>'PUT', 'id'=>$current_menu.'-form', 'enctype'=>'multipart/form-data', 'role'=>'form', 'onSubmit' => 'return checkPassword(this)')) !!}
                            {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> EDIT Testimonial </h3> 
                                        <div class="data-create">
                                            <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label for="url"> Author <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="author" type="text" placeholder="Enter Author" name="author" value="{{ $records->author }}">
                                                            @if($errors->has('author'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('author')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="url"> Message <span style="color: red">*</span> </label>
                                                            <textarea class="form-control" name="message">{{ $records->message }}</textarea>
                                                            @if($errors->has('message'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('message')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uploader">
                                                <div class="row">
                                                      <div class="col-md-6 form-group mb-4">
                                                                <label for="url"> Upload Image </label>
                                                                <input class="form-control" id="image" type="file" name="image" value="{{ old('image') }}">
                                                                @if($errors->has('image'))
                                                                    <div class="error text-danger">
                                                                        {{$errors->first('image')}}
                                                                    </div>
                                                                @endif
                                                        </div>
                                                        @if($records->image!=NULL)
                                                            <div class="col-md-6 form-group">
                                                                <table>
                                                                    <tbody id="tbody">
                                                                        <tr>
                                                                            <img width="200" height="100" src="{{URL::asset('uploads/testimonial/')}}{{'/'.$records-> image}}" alt="logo" />
                                                                        <td>
                                                                            
                                                                        </td>
                                                                    
                                                                    </tr>      
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        @endif
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    
   

    
</body>

</html>