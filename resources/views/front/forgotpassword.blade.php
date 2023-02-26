@include('layouts.front.header')


        <main>
            <div class="slider-area over-hidden">
                <div class="single-slider page-height3 d-flex align-items-center" data-background="images/bg/product.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 d-flex align-items-center justify-content-center">
                                <div class="page-title mt-10 text-center">
                                    <h2 class="text-capitalize font600 mb-10">Reset Password</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
            <div class="login-register-area mb-45">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- login Area Strat-->
                            <section class="login-area pt-50 pb-55">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="basic-login">
                                                <h3 class="text-center mb-60">Reset Password</h3>
                                          @if($message = Session::get('message'))
                                           <div class="alert alert-danger">
                                           <p>{{$message}}</p>
                                           </div>
                                            @endif
                                                <form action="{{Url('reset-password')}}" method="post">
                                                    @csrf
                                                    <label for="email">Enter Email Address <span>*</span></label>
                                                    <input name="email" type="text" placeholder="Enter Email address" />
                                                      @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                                                     <label for="email">Enter New Password<span>*</span></label>
                                                    <input name="password" type="password" placeholder="Enter New Password" />
                                                    @error('password')<p class="text-danger">{{ $message }}</p>@enderror
                                                     <label for="email">Enter Confirm Password<span>*</span></label>
                                                    <input name="cpassword" type="password" placeholder="Enter Confirm Password" />
                                                   @error('cpassword')<p class="text-danger">{{ $message }}</p>@enderror
                                                    <button class="bt-btn theme-btn-2 w-100">Password Reset</button>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- login Area End-->
                        </div>
                    </div>
                </div>
            </div>

        </main>
        
@include('layouts.front.footer')

