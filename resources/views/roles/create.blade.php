@include('layouts.sidebar')
  
  
        <!-- =============== Left side End ================-->
        @php
            $route = 'admin.';
        @endphp

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">        
 
                <div class="row">
                    <div class="card text-left">
                        <form action="{{route($route.'roles.store')}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> Create Role </h3> 
                                        <div class="data-create">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <label>Role<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="text" placeholder="Enter Role" name="name" value="{{old('name')}}">
                                                         @if ($errors->has('name'))
                                                            <div class="error text-danger">
                                                        {{ $errors->first('name') }}
                                                            </div>
                                                            @endif
                                                    </div>
                                                    
                                                    <div class="col">
                                                        <label>Role - Display Name<span style="color: red">*</span></label>
                                                        <br>
                                                        <input type="text" placeholder="Enter Role - Display Name" name="display_name" value="{{old('display_name')}}">
                                                    @if ($errors->has('display_name'))
                                                            <div class="error text-danger">
                                                    {{ $errors->first('display_name') }}
                                                            </div>
                                                            @endif
                                                    </div>
                                                    
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="uploader">
                                            <label>Status</label>
                                            <select name="status">
                                              <option value="" selected="">Select Status</option>
                                              <option value="0">Inactive</option>
                                              <option value="1">Active</option>
                                            </select>
                                            <br>
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
</body>

</html>