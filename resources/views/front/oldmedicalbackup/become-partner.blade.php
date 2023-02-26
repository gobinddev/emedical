@include('layouts.front.header')
<style>
    .nice-select{
        width: 100%;
    }
    .nice-select .list {
    width: 100%;
    height: 150px;
    overflow-y: scroll;
}
</style>
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Become Partner</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">Become Partner</li>
					</ul>

					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>

	<div class="login-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70">
		<div class="container">
            @if(Session::has('message'))
                <div class="row">
                    <div class="col-12">
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    </div>
                </div>
            @endif
			<div class="row">
				<div class="col-lg-12">
					<div class="lezada-form login-form--register" style="padding: 0px 50px;">
						<form method="post" action="{{ route('become-partner.register') }}">
							@csrf
							<div class="row">
								<div class="col-lg-12">
									<!--=======  login title  =======-->

									<div class="section-title section-title--login text-center mb-50">
										<h2 class="mb-20">Register</h2>
										<p>If you don’t have an account, register now!</p>
									</div>

									<!--=======  End of login title  =======-->

								</div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-6 mb-30">
                                            <label for="regEmail">Organisation / Business Name <span class="required">*</span> </label>
                                            <input type="text" id="regEmail" name="business_name" value="{{ old('business_name') }}">
                                            @if($errors->has('business_name'))
                                                <div class="error text-danger">
                                                    {{$errors->first('business_name')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 py-3">
                                            <h3><strong>Address</strong></h3>
                                        </div>
                                        <div class="col-lg-12 mb-30">
                                            <label for="title"> Street Address <span style="color: red">*</span> </label>
                                            <input id="address_line_1" type="text" placeholder="Enter Address Line 1" name="address_line_1" value="{{ old('address_line_1') }}">
                                            @if($errors->has('address_line_1'))
                                                <div class="error text-danger">
                                                    {{$errors->first('address_line_1')}}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-12 mb-30">
                                            <label for="title"> Address Line 2 </label>
                                            <input id="address_line_2" type="text" placeholder="Enter Address Line 2" name="address_line_2" value="{{ old('address_line_2') }}" >
                                            @if($errors->has('address_line_2'))
                                                <div class="error text-danger">
                                                    {{$errors->first('address_line_2')}}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-30">
                                            <label for="title"> Country <span style="color: red">*</span></label><br>
                                            <select class="country" id="country" name="country">
                                                <option value="">--Select--</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}" @if($country->id=='101') selected @endif>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('country'))
                                                <div class="error text-danger">
                                                    {{$errors->first('country')}}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-30">
                                            <label for="title"> State <span style="color: red">*</span></label><br>
                                            <select class="state" name="state" id="state">
                                                <option value="">--Select--</option>
                                                @foreach($states as $state)
                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('state'))
                                                <div class="error text-danger">
                                                    {{$errors->first('state')}}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-30">
                                            <label for="title" class="pb-2"> City <span style="color: red">*</span></label><br>
                                            <select class="city" id="city" name="city">
                                                <option value="">--Select--</option>
                                            </select>
                                            @if($errors->has('city'))
                                                <div class="error text-danger">
                                                    {{$errors->first('city')}}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-30">
                                            <label for="title"> Pincode <span style="color: red">*</span></label>
                                            <input id="pincode" type="text" placeholder="Enter Pincode" name="pincode" value="{{ old('pincode') }}">
                                            @if($errors->has('pincode'))
                                                <div class="error text-danger">
                                                    {{$errors->first('pincode')}}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-12 col-12 mb-4">
                                            <label>Location <small>(Search & Select the Place)</small><span class="text-danger">*</span></label>
                                            <input type="text" name="location" id="location_add" placeholder="Location">
                                            <input type="hidden" id="geo_city_add" name="geo_city" />
                                            <input type="hidden" id="geo_addr_add" name="geo_addr" />
                                            <input type="hidden" id="geo_lat_add" name="geo_lat" />
                                            <input type="hidden" id="geo_long_add" name="geo_long" />
                                            @if($errors->has('location'))
                                                <div class="error text-danger">
                                                    {{$errors->first('location')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 py-3">
                                            <h3><strong>Contact Info</strong></h3>
                                        </div>
                                        <div class="col-lg-6 mb-30">
                                            <label for="regEmail">First Name <span class="required">*</span> </label>
                                            <input type="text" id="regEmail" name="first_name" value="{{ old('first_name') }}">
                                            @if($errors->has('first_name'))
                                                <div class="error text-danger">
                                                    {{$errors->first('first_name')}}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-30">
                                            <label for="regEmail">Last Name </label>
                                            <input type="text" id="regEmail" name="last_name" value="{{ old('last_name') }}">
                                            @if($errors->has('last_name'))
                                                <div class="error text-danger">
                                                    {{$errors->first('last_name')}}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-12 mb-30">
                                            <label for="regEmail">Phone Number <span class="required">*</span> </label>
                                            <input type="text" id="regEmail" name="phone_number" value="{{ old('phone_number') }}">
                                            @if($errors->has('phone_number'))
                                                <div class="error text-danger">
                                                    {{$errors->first('phone_number')}}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-12 mb-30">
                                            <label for="regEmail">Email Address <span class="required">*</span> </label>
                                            <input type="email" id="regEmail" name="email_id" value="{{ old('email_id') }}">
                                            @if($errors->has('email_id'))
                                                <div class="error text-danger">
                                                    {{$errors->first('email_id')}}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-12 mb-50">
                                            <label for="regPassword">Password <span class="required">*</span> </label>
                                            <input type="password" id="regPassword" name="pass">
                                            @if($errors->has('pass'))
                                                <div class="error text-danger">
                                                    {{$errors->first('pass')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
								<div class="col-lg-12 text-center">
									<button type="submit" class="lezada-button lezada-button--medium">register</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of login content  ======-->
    <script>
       $(document).ready(function(){

            $("#country").niceSelect();
			$("#state").niceSelect();
			$("#city").niceSelect();

            //on change country
			 $(document).on('change','#country',function(e){
                 e.preventDefault();
				var id = $(this).val();
				$.ajax({
						type:"post",
						url:"{{route('customer.getstate')}}",
						data:{'country_id':id,"_token": "{{ csrf_token() }}"},
						success:function(data)
						{
							$("#state").empty();
							$("#state").html('<option>--Select--</option>');

							$("#city").empty();
							$("#city").html('<option value="">--Select--</option>');
							$.each(data,function(key,value){
							$("#state").append('<option value="'+value.id+'">'+value.name+'</option>');
							});

							$("#state").niceSelect('update');
							$("#city").niceSelect('update');
						}
					});
                    e.stopImmediatePropagation();
			 });

			// on change state
			$(document).on('change','#state',function(e){
                e.preventDefault();
				var id = $(this).val();
				$.ajax({
						type:"post",
						url:"{{route('customer.getcity')}}",
						data:{'state_id':id,"_token": "{{ csrf_token() }}"},
						success:function(data)
						{
							$("#city").empty();
							$("#city").html('<option value="">--Select--</option>');
							$.each(data,function(key,value){
								$("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
							});

							$("#city").niceSelect('update');

						}

					});
                    e.stopImmediatePropagation();
			});

        });
    </script>

@include('layouts.front.footer')
