@include('layouts.front.header')
<style>
    .banner-section {
    background-image: url(assets/img/contact_img.png);
    background-size: cover;
    background-repeat: no-repeat;
    height: 590px;
    box-shadow: 0px 5px 10px #ddd;
}
.sec-one-left h4 {
    color: #683e88;
    font-size: 44px;
    font-weight: 600;
}
.sec-one-left h6 {
    font-size: 24px;
    color: #000000;
    font-weight: 600;
    line-height: 32px;
}
.sec-six-heading {
    padding: 50px 10px 0px 10px;
}
.sec-six-heading h4 {
    text-align: left;
    color: #683e88;
    font-size: 30px;
    font-weight: 600;
    margin-bottom: 35px;
}
.contact-ways {
    list-style-type: none;
    padding: 0px;
}
.contact-ways li {
    color: #683e88;
    margin: 40px 0px;
    font-weight: 600;
    display: flex;
    justify-content: start;
}
.contact-ways li .zmdi {
    color: #ff0000;
    font-size: 25px;
    margin-right: 10px;
}
form {
    width: 100%;
}
.contact-form {
    /* background: rgba(0, 46, 98, 0.55); */
    color: #585858;
    /* text-align: center; */
    padding: 50px 10px;
}
.contact-form h4 {
    text-align: left;
    color: #683e88;
    font-size: 30px;
    font-weight: 600;
    margin-bottom: 35px;
}
.contact-form label {
    text-align: left;
    font-weight: 600;
    margin-bottom: 5px !important;
}
.custom-input {
    margin: 0px 0px 10px 0px;
    padding: 5px;
    width: 100%;
    height: auto;
}
.verifiy-btn {
    background: #E10813;
    max-width: 200px;
    color: #fff;
    padding: 10px 15px;
    font-size: 12px;
    border-radius: 5px;
}
.contact-form textarea {
    width: 100%;
}
.btn-primary {
    color: #fff;
    background-color: #683e88;
    border-color: #000000;
}
.btn-primary:hover, .btn-primary:focus {
    background-color: #683e88;
    color: #000;
    border-color: #000;
}
/* button:hover {
    color: white;
    background: #000000;
    transition: all 0.3s ease-in-out;
}
button:focus {
    outline: 5px auto -webkit-focus-ring-color;
} */
@media  only screen and (min-width: 320px) and (max-width: 767px){
    .banner-section{
		background-image: url(assets/img/contact_img.png);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: 0% 100%;
		height:130px;
	}
}
</style>
<section class="banner-section pt-120">
	<div class="container">
		<div class="row ban-data">
			<div class="col-md-7">
				<div class="sec-one-left">
                    <h4 class="py-4">Get in Touch</h4>
                    <h6>We are always available for your help, for better experience you can connect with us</h6>
                </div>
			</div>	
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
        <div class="col-12 pt-4">
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
        </div>
			<!-- <div class="col-md-6">
				<div class="sec-six-heading">
                <h4>Contact us</h4>
                <ul class="contact-ways">
                	<li><i class="zmdi zmdi-pin"></i> <span> &nbsp;(Monday-Friday: 08:00AM - 5:00PM) UTC</span></li>
                	<li><i class="zmdi zmdi-phone"> </i> <span> (888) 888 - 8888</span></li>
                	<li><i class="zmdi zmdi-email"> </i> <span> Service@toovem.com</span></li>

                	<li><i class="zmdi zmdi-globe"> </i> <span> www.toovem.com</span></li>
                </ul>
            	</div>
			</div> -->
			<div class="col-md-12">

				<form method="post" action="{{url('/contactus'))}}" id="contact_form" class="contact-form">
					@csrf
                    <h4>Connect with us</h4>
					<div>
						<label>Name <span class="text-danger">*</span></label>
						<input type="text" name="name" class="custom-input error_control name">
                        @if($errors->has('name'))
                            <div class="error text-danger">
                                {{$errors->first('name')}}
                            </div>
                        @endif
						<!-- <p style="margin-bottom:2px;" class="text-danger error_container" id="error-name"></p> -->

						<label>Mobile <span class="text-danger">*</span></label>
						<input tel="text" name="mobile" class="custom-input error_control mobile">
                        @if($errors->has('mobile'))
                            <div class="error text-danger">
                                {{$errors->first('mobile')}}
                            </div>
                        @endif
						<!-- <p style="margin-bottom:2px;" class="text-danger error_container" id="error-mobile"></p> -->

						<label>Email <span class="text-danger">*</span></label>
						<input type="email" name="email" class="custom-input error_control email">
                        @if($errors->has('email'))
                            <div class="error text-danger">
                                {{$errors->first('email')}}
                            </div>
                        @endif
						<!-- <p style="margin-bottom:2px;" class="text-danger error_container" id="error-email"></p> -->

						<label>Subject <span class="text-danger">*</span></label>
						<input type="text" style="" name="subject" class="custom-input error_control subject">
                        @if($errors->has('subject'))
                            <div class="error text-danger">
                                {{$errors->first('subject')}}
                            </div>
                        @endif
						<!-- <p style="margin-bottom:2px;" class="text-danger error_container" id="error-subject"></p> -->

						<label>Message <span class="text-danger">*</span></label>
						<textarea name="message" class="message" rows="10" cols="10"></textarea>
                        @if($errors->has('message'))
                            <div class="error text-danger">
                                {{$errors->first('message')}}
                            </div>
                        @endif
						<!-- <p style="margin-bottom:2px;" class="text-danger error_container" id="error-message"></p> -->
                        <div class="text-center">
						    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </div>
					</div>
				</form>
			</div>
					
		</div>
	</div>
</section>
      
@include('layouts.front.footer')