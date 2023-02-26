@include('layouts.front.header')


<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">{{ __('Forgot Password') }}</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">{{ __('Forgot Password') }}</li>
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
				<div class="col-lg-12 mb-md-50 mb-sm-50">
					<div class="lezada-form login-form">
						<form method="post" action="{{ route('customer.password.email') }}">
                            @csrf
							<div class="row">
                                <!--=======  login title  =======-->

									<div class="section-title section-title--login text-center mb-50">
										<h2 class="mb-20">{{ __('Forgot Password') }}</h2>
									</div>

									<!--=======  End of login title  =======-->
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
								<div class="col-lg-12 text-center mb-30">
									<button type="submit" class="lezada-button lezada-button--medium"> {{ __('Send Password Reset Link') }}</button>
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