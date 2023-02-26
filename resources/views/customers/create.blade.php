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
                                        <h3 class="card-title mb-3"> Create Customer </h3> 
                                        <div class="data-create">
                                            <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label for="keyword"> First Name <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="first_name" type="text" placeholder="Enter First Name" name="first_name" value="{{ old('first_name') }}">
                                                            @if($errors->has('first_name'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('first_name')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label for="keyword"> Last Name </label>
                                                            <input class="form-control" id="last_name" type="text" placeholder="Enter Last Name" name="last_name" value="{{ old('last_name') }}">
                                                            @if($errors->has('last_name'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('last_name')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <!-- <div class="col-md-2 form-group mb-4">
                                                            <label for="keyword"> Phone Code <span style="color: red">*</span></label>
                                                            <input class="form-control" id="phone_code" type="text" placeholder="Enter Phone Code" name="phone_code" value="{{ old('phone_code') }}">
                                                            @if($errors->has('phone_code'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('phone_code')}}
                                                                </div>
                                                            @endif
                                                        </div> -->
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label for="keyword"> Phone Number <span style="color: red">*</span></label><br>
                                                            <input type="hidden" id="code" name="phone_code" value="91">
                                                            <input type="hidden" id="iso" name="phone_iso" value="in">
                                                            <input class="form-control pt-2" id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}">
                                                            @if($errors->has('phone_number'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('phone_number')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label for="keyword"> Email ID <span style="color: red">*</span></label>
                                                            <input class="form-control" id="email_id" type="email" placeholder="Enter Email ID" name="email_id" value="{{ old('email_id') }}">
                                                            @if($errors->has('email_id'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('email_id')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label for="keyword"> Password <span style="color: red">*</span></label>
                                                            <input class="form-control" id="password" type="password" placeholder="Enter Password" name="password" value="{{ old('password') }}">
                                                            @if($errors->has('password'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('password')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label for="keyword"> Upload Image </label>
                                                            <input class="form-control" id="image" type="file" name="image">
                                                            @if($errors->has('image'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('image')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uploader">
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

    <script>
        $("#phone_number").intlTelInput({
					initialCountry: "in",
					separateDialCode: true,
					preferredCountries: ["in"],
					// onlyCountries: ["in"],
					geoIpLookup: function (callback) {
						$.get('https://ipinfo.io', function () {
						}, "jsonp").always(function (resp) {
							var countryCode = (resp && resp.country) ? resp.country : "";
							callback(countryCode);
						});
					},
					utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
				});

				/* ADD A MASK IN PHONE1 INPUT (when document ready and when changing flag) FOR A BETTER USER EXPERIENCE */

				var mask1 = $("#phone_number").attr('placeholder').replace(/[0-9]/g, 0);

				$(document).ready(function () {
					$('#phone_number').mask(mask1)
				});

				//
				$("#phone_number").on("countrychange", function (e, countryData) {
					$("#phone1").val('');
					var mask1 = $("#phone_number").attr('placeholder').replace(/[0-9]/g, 0);
					$('#phone_number').mask(mask1);
					$('#code').val($("#phone_number").intlTelInput("getSelectedCountryData").dialCode);
					$('#iso').val($("#phone_number").intlTelInput("getSelectedCountryData").iso2);
				});
    </script>
</body>

</html>