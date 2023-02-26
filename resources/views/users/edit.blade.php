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
                        {!! Form::open(array('route'=>[$route.$current_menu.'.update', $encrypt_id], 'method'=>'PUT', 'id'=>$current_menu.'-form', 'enctype'=>'multipart/form-data', 'role'=>'form', 'onSubmit' => 'return checkPassword(this)')) !!}
                              {!! csrf_field() !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> Edit </h3> 
                                        <div class="data-create">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <label>Name<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="text" placeholder="Enter Name" name="name" value="{{$records[0]->name}}">
                                                    </div>
                                                   <!--  <div class="col">
                                                        <label>Middle Name<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="text" placeholder="Enter Middle Name" name="middle_name" required="" value="{{$records[0]->middle_name}}">
                                                    </div> -->
                                                   <!--  <div class="col">
                                                        <label>Last Name<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="text" placeholder="Enter Last Name" name="last_name" required="" value="{{$records[0]->last_name}}">
                                                    </div> -->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <label>Email<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="email" placeholder="Enter Email" name="email" value="{{$records[0]->email}}">
                                                         @if ($errors->has('email'))
                                                            <div class="error text-danger">
                                                          {{ $errors->first('email') }}
                                                          </div>
                                                          @endif
                                                    </div>
                                                   <!--  <div class="col">
                                                        <label>Password<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="password" placeholder="Enter Password" name="password" required="">
                                                    </div>
                                                    <div class="col">
                                                        <label>Confirm Password<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="password" placeholder="Confirm Password" name="confirm_password" required="">
                                                    </div> -->
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <label>Phone Number<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="text" placeholder="Enter Phone Number" name="phone_number" value="{{$records[0]->phone_number}}">
                                                    </div>
                                                    <div class="col">
                                                        <label>Role<span style="color: red">*</span></label>
                                                        <br>
                                                        <select name="role" required="">
                                                          <option value="" selected="">Select Type</option>
                                                          @if(!empty($roles))
                                                              @foreach($roles as $key=>$value)
                                                                  <option {{($records[0]->role_id == $key) ? 'selected' : ''}} value="{{$key}}">{{$value}}</option>
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
                                      
                                       <!-- <input type="hidden" name="role" value="{{$records[0]->role_id}}"> -->

                                        <input type="hidden" name="password" value="{{$records[0]->password}}">


                                        <img width="100" height="100" src="{{URL::asset('images/profile/')}}{{'/'.$records[0]->image}}" alt="profile_image" />


                                        
                                        <div class="uploader">
                                            <input type="hidden" name="profile_image" value="{{$records[0]->image}}">
                                            <input type="file" name="image" >

                                             @if ($errors->has('image'))
                                             <div class="error text-danger">
                                             {{ $errors->first('image') }}
                                             </div>
                                             @endif<br>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
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