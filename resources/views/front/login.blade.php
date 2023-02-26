@include('layouts.front.header')


        <main>
            <div class="slider-area over-hidden">
                <div class="single-slider page-height3 d-flex align-items-center" data-background="images/bg/product.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 d-flex align-items-center justify-content-center">
                                <div class="page-title mt-10 text-center">
                                    <h2 class="text-capitalize font600 mb-10">Login & Register</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center bg-transparent">
                                        <li class="breadcrumb-item"><a class="primary-color" href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active text-capitalize" aria-current="page">Login</li>
                                        </ol>
                                    </nav>
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
                                                <h3 class="text-center mb-60">Login</h3>
                                          @if($message = Session::get('message'))
                                           <div class="alert alert-success">
                                           <p>{{$message}}</p>
                                           </div>
                                            @endif
                                                <form action="{{Url('loginpost')}}" method="post">
                                                    @csrf
                                                    <label for="email">Email Address <span>**</span></label>
                                                    <input name="email" type="text" placeholder="Enter Email address" />
                                                    <label for="pass">Password <span>**</span></label>
                                                    <input name="password" type="password" placeholder="Enter password..." />
                                                    <div class="login-action mb-20 fix">
                                                        <span class="log-rem f-left">
                                                            <input id="remember" type="checkbox" />
                                                            <label for="remember">Remember me!</label>
                                                        </span>
                                                        <span class="forgot-login f-right">
                                                            <a href="{{Url('forgotpassword')}}">Lost your password ?</a>
                                                        </span>
                                                    </div>
                                                    <button class="bt-btn theme-btn-2 w-100">Login Now</button>
                                                    <div class="or-divide"><span>or</span></div>
                                                    <a href="{{Url('sign-up')}}" class="bt-btn bt-btn-black w-100" style="text-align:center">Register Now</a>
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

