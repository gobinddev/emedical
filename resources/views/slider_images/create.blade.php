@include('layouts.sidebar');    


        <!-- =============== Left side End ================-->
        
        @php
            $route = 'admin.';
        @endphp
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">              
 
                <div class="row">
                    <div class="card text-left">
                        <div class="card-body">
                            <form action="{{route($route.$current_menu.'.store')}}" method="POST" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> Create Slider Images </h3> 
                                        <!-- @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif -->
                                        <div class="data-create">
                                            <div class="container">
                                                    <div class="row">
                                                        <div class="col-6 form-group mb-12">
                                                            <label for="url"> Heading  </label>
                                                            <input class="form-control" id="heading" type="text" placeholder="Enter Heading" name="heading" value="{{ old('heading') }}">
                                                            @if($errors->has('heading'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('heading')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-6 form-group mb-12">
                                                            <label for="url"> URL </label>
                                                            <input class="form-control" id="url" type="text" placeholder="Enter URL" name="url" value="{{ old('url') }}">
                                                            @if($errors->has('url'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('url')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-12 form-group mb-12">
                                                            <label for="url"> Description </label>
                                                            <input class="form-control" id="description" type="text" placeholder="Enter description" name="description" value="{{ old('description') }}">
                                                            @if($errors->has('description'))
                                                                <div class="error text-danger">
                                                                    {{$errors->first('description')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uploader">
                                                <div class="row">
                                                    <div class="col-md-6 form-group mb-12">
                                                        <label for="image"> Upload Image <span style="color: red">*</span> </label>
                                                        <input class="form-control" id="image" type="file" name="slider_image">
                                                        @if($errors->has('slider_image'))
                                                            <div class="error text-danger">
                                                                {{$errors->first('slider_image')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-12 text-right">
                                                        <button type="submit" class="btn btn-success"> Submit </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
        // Restricts input for the given textbox to the given inputFilter function.
        function setInputFilter(textbox, inputFilter) {
          ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
            textbox.addEventListener(event, function() {
              if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
              } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
              } else {
                this.value = "";
              }
            });
          });
        }
        $(document).ready(function () {

            // Denotes total number of rows
            var rowIdx = 0;

            // jQuery button click event to add a row
            $('#addBtn').on('click', function () {

            // Adding a row inside the tbody.
            $('#tbody').append(`<tr id="R${++rowIdx}">
                <td>
                    <label for="image"> Upload Image <span style="color: red">*</span> </label>
                    <input class="form-control" id="image" type="file" name="image[]" required="">
                </td>
                <td><button type="button" class="btn btn-danger remove"> - </button></td>
                  </tr>`);
            });

            // jQuery button click event to remove a row.
            $('#tbody').on('click', '.remove', function () {

            // Getting all the rows next to the row
            // containing the clicked button
            var child = $(this).closest('tr').nextAll();

            // Iterating across all the rows 
            // obtained to change the index
            child.each(function () {

              // Getting <tr> id.
              var id = $(this).attr('id');

              // Gets the row number from <tr> id.
              var dig = parseInt(id.substring(1));

              // Modifying row id.
              $(this).attr('id', `R${dig - 1}`);
            });

            // Removing the current row.
            $(this).closest('tr').remove();

            // Decreasing total number of rows by 1.
            rowIdx--;
            });
        });
    </script>
</body>

</html>
