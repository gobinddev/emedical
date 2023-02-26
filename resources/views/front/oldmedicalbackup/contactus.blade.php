@include('layouts.front.header')


<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Contact Us</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">contact us</li>
					</ul>

					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>


	<div class="section-title-container mb-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  section title  =======-->

					<div class="section-title section-title--one text-center">
						<p class="subtitle subtitle--deep">COME HAVE A LOOK</p>
						<h1>Contact detail</h1>
					</div>

					<!--=======  End of section title  =======-->
				</div>
			</div>
		</div>
	</div>

	

	<div class="icon-box-area mb-100 mb-md-30 mb-sm-30">
		<div class="container">
			<div class="row">
				<div class="col-md-4 mb-md-70 mb-sm-70">
					<!--=======  single icon box  =======-->

					<div class="single-icon-box">
						<div class="icon-box-icon">
							<i class="ion-location"></i>
						</div>
						<div class="icon-box-content">
							<h3 class="title">ADDRESS</h3>
							<p class="content">1800 Abbot Kinney Blvd. Unit D & E Venice</p>
						</div>
					</div>

					<!--=======  End of single icon box  =======-->
				</div>
				<div class="col-md-4 mb-md-70 mb-sm-70">
					<!--=======  single icon box  =======-->

					<div class="single-icon-box mb-10">
						<div class="icon-box-icon">
							<i class="ion-ios-telephone"></i>
						</div>
						<div class="icon-box-content">
							<h3 class="title">CONTACT</h3>
							<p class="content">Mobile: (+88) – 1990 – 6886 <span>Hotline: 1800 – 1102</span></p>
						</div>
					</div>

					
				</div>
				<div class="col-md-4 mb-md-70 mb-sm-70">
					<!--=======  single icon box  =======-->

				<div class="single-icon-box">
						<div class="icon-box-icon">
							<i class="ion-ios-email"></i>
						</div>
						<div class="icon-box-content">
							<p class="content"> Mail: contact@toovem.com </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="box-layout-map-area mb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  box layout map container  =======-->

					<div class="box-layout-map-container">
						<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2477.7500068901095!2d77.32117848344457!3d28.567730801385313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sworld%20map%20all%20country!5e0!3m2!1sen!2sin!4v1643707671645!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>

					<!--=======  End of box layout map container  =======-->
				</div>
			</div>
		</div>
	</div>



	<div class="section-title-container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  section title  =======-->

					<div class="section-title section-title--one text-center">
						<h1>Get in touch</h1>
					</div>

					<!--=======  End of section title  =======-->
				</div>
			</div>
		</div>
	</div>

	

	<div class="contact-form-area mb-60">
		<div class="container">
        
			<div class="row">
                <div class="col-12 pt-4">
                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                </div>
				<div class="col-lg-8 offset-lg-2">
					<div class="lezada-form contact-form">
						<form id="contact-form" action="{{url('/contactus')}}" method="post">
							@csrf
							<div class="row">
								<div class="col-md-6 mb-40">
									<input type="text" placeholder=" Name *" name="name" id="name">
                                    @if($errors->has('name'))
                                        <div class="error text-danger">
                                            {{$errors->first('name')}}
                                        </div>
                                    @endif
								</div>
								<div class="col-md-6 mb-40">
									<input type="email" placeholder="Email *" name="email" id="email">
                                    @if($errors->has('email'))
                                        <div class="error text-danger">
                                            {{$errors->first('email')}}
                                        </div>
                                    @endif
								</div>
                                <div class="col-lg-12 mb-40">
									<input type="text" placeholder="Mobile *" name="mobile" id="mobile">
                                    @if($errors->has('mobile'))
                                        <div class="error text-danger">
                                            {{$errors->first('mobile')}}
                                        </div>
                                    @endif
								</div>
								<div class="col-lg-12 mb-40">
									<input type="text" placeholder="Subject *" name="subject" id="subject">
                                    @if($errors->has('subject'))
                                        <div class="error text-danger">
                                            {{$errors->first('subject')}}
                                        </div>
                                    @endif
								</div>
								<div class="col-lg-12 mb-40">
									<textarea cols="30" rows="10" placeholder="Message *" name="message"
										id="message"></textarea>
                                        @if($errors->has('message'))
                                            <div class="error text-danger">
                                                {{$errors->first('message')}}
                                            </div>
                                        @endif
								</div>
								<div class="col-lg-12 text-center">
									<button type="submit" value="submit" id="submit"
										class="lezada-button lezada-button--medium">Submit</button>
								</div>
							</div>
						</form>
					</div>
					<p class="form-messege pt-10 pb-10 mt-10 mb-10"></p>
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of contact form area  ======-->


    @include('layouts.front.footer')