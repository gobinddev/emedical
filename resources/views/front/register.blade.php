@include('layouts.front.header')


        <main>
            <div class="slider-area over-hidden">
                <div class="single-slider page-height3 d-flex align-items-center" data-background="{{asset('images/bg/product.jpg')}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 d-flex align-items-center justify-content-center">
                                <div class="page-title mt-10 text-center">
                                    <h2 class="text-capitalize font600 mb-10">Login & Register</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center bg-transparent">
                                        <li class="breadcrumb-item"><a class="primary-color" href="{{Url('/')}}">Home</a></li>
                                        <li class="breadcrumb-item active text-capitalize" aria-current="page">Register</li>
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
                            <section class="register-area pt-50 pb-55">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="basic-login">
                                                <h3 class="text-center mb-60">Register</h3>
                                                @if($message = Session::get('message'))
                                                 <div class="alert alert-success">
                                                  <p>{{$message}}</p>
                                                 </div>
                                               @endif
                                             
                                                <form action="{{Url('do-sign-up')}}" method="POST">
                                                    @csrf
                                                    <label for="fname">First Name</label>
                                                    <input id="fname" name="fname" type="text" placeholder="First Name..." />
                                                    <label for="fname">Last Name</label>
                                                    <input id="fname" name="lname" type="text" placeholder="Last Name..." />
                                                    <label for="name">Email Address <span>*</span></label>
                                                    <input id="name" name="email"type="text" placeholder="Enter register id address..." />
                                                     {!! $errors->first('email', '<div class="error-block text-danger">:message</div>') !!}
                                                    <label for="pass2">Password <span>*</span></label>
                                                    <input id="pass2" name="password"type="password" placeholder="Enter password..." />
                                                    {!! $errors->first('password', '<div class="error-block text-danger">:message</div>') !!}
                                                    <label for="pass2">Re-enter Password <span>*</span></label>
                                                    <input id="pass2" name="password_confirmation"type="password" placeholder="Re-enter password..." />
                                                    {!! $errors->first('password_confirmation', '<div class="error-block text-danger">:message</div>') !!}
                                                    <button class="bt-btn theme-btn-2 w-100">Register Now</button>
                                                   
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

