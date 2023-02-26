@include('layouts.sidebar');    


        <!-- =============== Left side End ================-->
        

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">              
 
                <div class="row">
                    <div class="card text-left">
                        <div class="card-body">
                           {!! Form::open(array('route'=>[$current_menu.'.update', $encrypt_id], 'method'=>'PUT', 'id'=>$current_menu.'-form', 'enctype'=>'multipart/form-data', 'role'=>'form')) !!}
                            {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> Edit Celebrity Picks </h3> 
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
                                                    <div class="row">
                                                        <div class="col-md-12 form-group mb-12">
                                                            <table>
                                                                <tbody id="tbody">
                                                                    <tr>
                                                                <img width="100" height="100" src="{{URL::asset('images/celebrity_picks/')}}{{'/'.$records-> name}}" alt="celebrity_picks" />
                                                                    <td>
                                                                        <label for="image"> Upload Image <span style="color: red">*</span> </label>
                                                                        <input class="form-control" id="name" type="file" name="name" required="">
                                                                    </td>
                                                                   
                                                                  </tr>      
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uploader">
                                                <button type="submit" class="btn btn-success"> Submit </button>
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
