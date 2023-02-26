@include('layouts.sidebar');    


        <!-- =============== Left side End ================-->
        

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">              
 
                <div class="row">
                    <div class="card text-left">
                        <div class="card-body">
                            <form action="{{route($current_menu.'.store')}}" method="POST" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> Create Product </h3> 
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
                                                        <div class="col-md-4 form-group mb-4">
                                                            <label for="product-category-id"> Select Product Category <span style="color: red">*</span> </label>
                                                            <select class="form-control" id="product-category-id" name="product_category_id"  required="">
                                                              @if(!empty($product_categories))
                                                                  @foreach($product_categories as $key=>$value)
                                                                      <option value="{{$key}}">{{$value}}</option>
                                                                  @endforeach
                                                              @endif
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4 form-group mb-4">
                                                            <label for="product-code"> Product Code <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="product-code" type="text" placeholder="Enter Product Code" name="product_code" value="{{ old('product_code') }}" required="">
                                                        </div>
                                                        <div class="col-md-4 form-group mb-4">
                                                            <label for="product-name"> Product Name <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="product-name" type="text" placeholder="Enter Product Name" name="product_name" value="{{ old('product_name') }}" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 form-group mb-3">
                                                            <label for="colour"> PURITY (IN KT) <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="colour" type="text" placeholder="Enter Colour" name="colour" value="{{ old('colour') }}" >
                                                        </div>
                                                        <div class="col-md-3 form-group mb-3">
                                                            <label for="height"> NET WT.(GMS.) <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="height" type="text" placeholder="Enter Height" name="height" value="{{ old('height') }}" >
                                                        </div>
                                                        <div class="col-md-3 form-group mb-3">
                                                            <label for="width"> ST WT.(CTS.) <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="width" type="text" placeholder="Enter Width" name="width" value="{{ old('width') }}" >
                                                        </div>
                                                        <div class="col-md-3 form-group mb-3">
                                                            <label for="gross-weight"> Gross Weight <span style="color: red">*</span> </label>
                                                            <input class="form-control" id="gross-weight" type="text" placeholder="Enter Gross Weight" name="gross_weight" value="{{ old('gross_weight') }}" >
                                                        </div>
                                                         <div class="col-md-3 form-group mb-3">
                                                            <label for="gross-weight"> DIA WT <span style="color: red">*</span> </label>
                                                            <input class="form-control" type="text" placeholder="Enter DIA WT" name="dia_wt" value="{{ old('dia_wt') }}" >
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 form-group mb-12">
                                                            <label for="description"> Description <span style="color: red">*</span> </label>
                                                            <textarea class="form-control" id="description" placeholder="Enter Description" name="description" required="">{{ old('description') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uploader">
                                                <div class="row">
                                                    <div class="col-md-8 form-group mb-6">
                                                        <table>
                                                            <tbody id="tbody">
                                                                <tr>
                                                                <td>
                                                                    <label for="image"> Upload Image <span style="color: red">*</span> </label>
                                                                    <input class="form-control" id="image" type="file" name="image[]" required="">
                                                                </td>
                                                                <td>
                                                                    <label for="is-thumbnail1"> Is Thumbnail? </label>
                                                                    <input class="form-control" id="is-thumbnail1" type="radio" name="is_thumbnail" value="0">
                                                                </td>
                                                                <td><button type="button" class="btn btn-info" id="addBtn"> + </button></td>
                                                              </tr>      
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-4 form-group mb-6">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <label for="video"> Upload Video </label>
                                                                    <input class="form-control" id="video" type="file" name="video">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-1 form-group mb-1 ispopular">
                                                        <label for="is-thumbnail1"> Is Popular? </label>
                                                        <input class="form-control" id="is-popular" type="checkbox" name="is_popular" value="1">
                                                    </div>
                                                    <div class="col-md-2 form-group mb-2">
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
        // setInputFilter(document.getElementById("height"), function(value) {
        //   return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
        // });
        // setInputFilter(document.getElementById("width"), function(value) {
        //   return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
        // });
        // setInputFilter(document.getElementById("gross-weight"), function(value) {
        //   return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
        // });
      
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
                <td>
                    <label for="image-description"> Image Description <span style="color: red">*</span> </label>
                    <textarea class="form-control" id="image-description" placeholder="Enter Image Description" name="image_description[]" required="" rows="1"></textarea>
                </td>
                <td>
                    <label for="is-thumbnail${rowIdx}"> Is Thumbnail? </label>
                    <input class="form-control" id="is-thumbnail${rowIdx}" type="radio" name="is_thumbnail" value="${rowIdx}">
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
    <style type="text/css">
        input#image {
    padding: 3px;
}
input#video {
    padding: 3px;
}
input#is-thumbnail1 {
    width: 30%;
}
.form-control:focus {
    color: #665c70;
    background-color: #fff;
    border-color: #a679d2;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgb(255 255 255);
}
.col-md-1.form-group.mb-1.ispopular {
    margin-left: 14px;
}
    </style>
</body>

</html>
