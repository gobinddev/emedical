@include('layouts.sidebar')
  
  
        <!-- =============== Left side End ================-->
        @php
            $route = 'admin.'
        @endphp

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">        
 
                <div class="row">
                    <div class="card text-left">
                        {!! Form::open(array('route'=>[$route.$current_menu.'.update_permissions', $encrypt_id], 'method'=>'PUT', 'id'=>$current_menu.'-form', 'enctype'=>'multipart/form-data', 'role'=>'form')) !!}
                            {!! csrf_field() !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> Assign Permissions </h3> 
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="data-create">
                                            <div class="container">
                                                <div class="table-responsive tableFixHead" style="height: 420px;">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col"> Sr. No. </th>
                                                                <th scope="col"> Module </th>
                                                                <th scope="col"> Assign Permission </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($final_out as $key=>$value)
                                                                <tr>
                                                                    <th colspan="3" style="text-align: center;">#{{$key + 1}} {{$value['name']}} <input type="checkbox" {{ Arr::exists($role_module_mapping_array, $value['id']) ? 'checked' : '' }} class="checkbox{{$value['id']}}" name="module_id[]" value="{{$value['id']}}"></th>
                                                                </tr>
                                                                <?php $x = 1; ?> 
                                                                @foreach($value['sub_modules'] as $newKey=>$newValue)
                                                                <tr>
                                                                    <td>
                                                                        #{{$key + 1}}.{{$x}}
                                                                    </td>
                                                                    <td>
                                                                        {{$newValue}}
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" {{ Arr::exists($role_module_mapping_array, $newKey) ? 'checked' : '' }} class="checkbox{{$value['id']}}" name="sub_module_id[]" value="{{$newKey}}">
                                                                    </td>
                                                                <?php $x++; ?>
                                                                @endforeach
                                                            @endforeach                 
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <br>
                                                <div>
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
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
        function checkAll(id){
            $(".checkbox"+id).prop('checked', true);
        }
    </script>
</body>

</html>