@include('layouts.sidebar')
	
	
        <!-- =============== Left side End ================-->
		

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">				
                @php
                    $route = 'admin.';
                @endphp
                <div class="row">
                    <div class="card text-left">
                        <form action="{{route($route.$current_menu.'.store')}}" method="POST" enctype="multipart/form-data" onSubmit = "return checkPassword(this)">
                        {!! csrf_field() !!}

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                         <?php if($type=='customer')
                                               {
                                         ?>

                                        <h3 class="card-title mb-3"> Create Customer </h3> 
                                         <?php
                                          }
                                          if($type=='executive')
                                          
                                          {
                                          
                                          ?>
                                           <h3 class="card-title mb-3"> Create Executive </h3>
                                          <?php
                                          
                                          }

                                          ?>

                                        <div class="data-create">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <label>Name<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="text" placeholder="Enter  Name" name="name" value="{{old('name')}}">
                                                   @if ($errors->has('name'))
                                                            <div class="error text-danger">
                                                    {{ $errors->first('name') }}
                                                            </div>
                                                            @endif
                                                    </div>
                                                   <!--  <div class="col">
                                                        <label>Middle Name<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="text" placeholder="Enter Middle Name" name="middle_name" required="">
                                                    </div> -->
                                                  <!--   <div class="col">
                                                        <label>Last Name<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="text" placeholder="Enter Last Name" name="last_name" required="">
                                                    </div> -->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <label>Email<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="email" placeholder="Enter Email" name="email" value="{{old('email')}}">
                                                   @if ($errors->has('email'))
                                                            <div class="error text-danger">
                                                    {{ $errors->first('email') }}
                                                            </div>
                                                            @endif
                                                    </div>
                                                    <div class="col">
                                                        <label>Password<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="password" placeholder="Enter Password" name="password" >
                                                          @if ($errors->has('password'))
                                                    <div class="error text-danger">
                                                    {{ $errors->first('password') }}
                                                    </div>
                                                    @endif
                                                    </div>
                                                  

                                                    <div class="col">
                                                        <label>Confirm Password<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="password" placeholder="Confirm Password" name="confirm_password" >
                                                    @if ($errors->has('password'))
                                                    <div class="error text-danger">
                                                    {{ $errors->first('password') }}
                                                    </div>
                                                    @endif

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <label>Phone Number<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="text" placeholder="Enter Phone Number" name="phone_number" value="{{old('phone_number')}}">
                                                    @if ($errors->has('phone_number'))
                                                            <div class="error text-danger">
                                                    {{ $errors->first('phone_number') }}
                                                            </div>
                                                            @endif
                                                    </div>
                                                    <div class="col">
                                                        <label>Role<span style="color: red">*</span></label>
                                                        <br>
                                                 <?php if($type=='customer')
                                                        {
                                                ?>
                                                 <input type="hidden" name="role" value="4">


                                                        <?php
                                                        }
                                                    if($type=='executive')
                                                        
                                                        {
                                                            ?>

                                                <input type="hidden" name="role" value="3">

                                                            <?php
                                                        }

                                                        ?>
                                                       
                                                        <select name="role" required="">
                                                          <option value="" selected="">Select Type</option>
                                                          @if(!empty($roles))
                                                              @foreach($roles as $key=>$value)
                                                           <option value="{{$key}}" {{($type == $value) ? 'selected' : ''}} >{{ucfirst($value)}}</option>
                                                              @endforeach
                                                          @endif
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="uploader"><span style="color: red">*</span>
                                            <input type="file" name="image" ><br>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
				            </div>
                </div>
				
            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>
			
        </div>
    </div><!-- ============ Search UI Start ============= -->
 
    <!-- ============ Search UI End ============= -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
    <script src="{{ asset('js/sidebar.large.script.min.js') }}"></script>
    <script src="{{ asset('js/echarts.min.js') }}"></script>
    <script src="{{ asset('js/echart.options.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.v1.script.min.js') }}"></script>
    <script type="text/javascript">
      function checkPassword(form) {
                password = form.password.value;
                confirm_password = form.confirm_password.value;
  
                if (password != confirm_password) {
                    alert ("\nPassword did not match: Please try again...")
                    return false;
                }
  
               
            }
    </script>
</body>

</html>