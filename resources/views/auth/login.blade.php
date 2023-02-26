@include('layouts.front.header')


<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Customer login</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">Customer login</li>
					</ul>

					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>

	<div class="login-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70">
		<div class="container">
		<div class="row">
			<div class="col-12">
				@if(Session::has('message'))
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
				@endif
			</div>
		</div>
			<div class="row">
				<div class="col-lg-6 mb-md-50 mb-sm-50">
					<div class="lezada-form login-form">
						<form method="post" action="{{ route('customer.dologin') }}">
                            @csrf
							<div class="row">
								<div class="col-lg-12">
									<!--=======  login title  =======-->

									<div class="section-title section-title--login text-center mb-50">
										<h2 class="mb-20">Login</h2>
										<p>Great to have you back!</p>
									</div>

									<!--=======  End of login title  =======-->
								</div>
								<div class="col-lg-12 mb-60">
									<input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                    <!-- @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror -->
									@if($errors->has('email'))
										<div class="error text-danger">
											{{$errors->first('email')}}
										</div>
									@endif
								</div>
								<div class="col-lg-12 mb-30">
									<input type="password" placeholder="Password" name="password" autocomplete="current-password">
                                    <!-- @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror -->
									@if($errors->has('password'))
										<div class="error text-danger">
											{{$errors->first('password')}}
										</div>
									@endif
								</div>
								<div class="col-lg-12 text-right mb-30">
									<!-- <input type="checkbox"> <span class="remember-text">Remember me</span> -->
									<a href="{{route('customer.password.request')}}" class="reset-pass-link">Forgot your password?</a>
								</div>
								<div class="col-lg-12 text-center mb-30">
									<button type="submit" class="lezada-button lezada-button--medium">login</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="lezada-form login-form--register">
						<form method="post" action="{{ route('customer.register') }}">
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


@include('layouts.front.footer')