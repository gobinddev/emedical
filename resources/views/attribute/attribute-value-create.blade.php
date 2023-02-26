@include('layouts.sidebar')


        <!-- =============== Left side End ================-->
		<style>
            .intl-tel-input.allow-dropdown.separate-dial-code{
                width: 100%;
                /* margin-bottom: 3%; */
                margin-top: 2%;
            }
        </style>

        @php
            $route = 'admin.';
        @endphp

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">

                <div class="row">
                    <div class="card text-left">
                        <div class="card-body">
                            <form action="{{route($route.$current_menu.'.store')}}" method="POST" enctype="multipart/form-data" id="attrfrm">
                            {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3"> Create Attribute Value </h3>
                                        <div class="data-create">
                                            <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6 form-group mb-4">
                                                            <label for="url"> Attribute Name <span style="color: red">*</span>  </label>
                                                            <select class="form-control" id="attribute_name" name="attribute_name">
                                                                <option value="">--Select--</option>
                                                                @if (count($attributes)>0)
                                                                    @foreach ($attributes as $item)
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-attribute_name"></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 py-2">
                                                            <h4><strong>Value</strong></h4>
                                                        </div>
                                                        <div class="col-md-8 form-group mb-6">
                                                            <table>
                                                                <tbody id="tbody">
                                                                    <tr>
                                                                        <td>
                                                                            <label for="image"> Name <span style="color: red">*</span> </label>
                                                                            <input class="form-control" id="name" type="text" name="name[]">
                                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-name_0">
                                                                        </td>
                                                                        <td><button type="button" class="btn btn-info mt-3" id="addDocBtn"> + </button></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-name"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uploader mt-3">
                                                <div class="row">
                                                    <div class="col-md-12 form-group mb-3 text-right">
                                                        <button type="submit" class="btn btn-success submit"> Submit </button>
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
 <style type="text/css">
     input.form-control,select.form-control {
    margin-top: 9px;
}
button.btn.btn-primary {
    margin-top: 9px;
}
 </style>
    <!-- ============ Search UI End ============= -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
    <script src="{{ asset('js/sidebar.large.script.min.js') }}"></script>
    <script src="{{ asset('js/echarts.min.js') }}"></script>
    <script src="{{ asset('js/echart.options.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.v1.script.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script>

        $(document).ready(function(){

            // Denotes total number of rows

            var rowdIdx = 0;

            $('#addDocBtn').on('click', function () {

                // Adding a row inside the tbody.
                    $('#tbody').append(`<tr id="R${++rowdIdx}">
                        <td>
                            <label for="document"> Name <span style="color: red">*</span> </label>
                            <input class="form-control" id="name" type="text" name="name[]">
                            <p style="margin-bottom:2px;" class="text-danger error_container" id="error-name_${rowdIdx}">
                        </td>
                        <td><button type="button" class="btn btn-danger remove mt-3"> - </button></td>
                        </tr>`);
            });

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
                $(this).find('.error_container').attr('id',`error-name_${dig - 1}`);
                });

                // Removing the current row.
                $(this).closest('tr').remove();

                // Decreasing total number of rows by 1.
                rowdIdx--;
            });

            $(document).on('submit', 'form#attrfrm', function (event) {
                event.preventDefault();
                //clearing the error msg
                $('p.error_container').html("");

                var form = $(this);
                var data = new FormData($(this)[0]);
                var url = form.attr("action");
                var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
                $('.submit').attr('disabled',true);
                if ($('.submit').html() !== loadingText) {
                    $('.submit').html(loadingText);
                }
                    $.ajax({
                        type: form.attr('method'),
                        url: url,
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            window.setTimeout(function(){
                                $('.submit').attr('disabled',false);
                                $('.submit').html('Submit');
                            },2000);
                            if(response.success==true) {
                                // redirect to google after 5 seconds
                                window.setTimeout(function() {
                                    window.location = "{{ url('/')}}"+"/admin/attribute/";
                                }, 2000);

                            }
                            //show the form validates error
                            if(response.success==false ) {
                                for (control in response.errors) {
                                var error_text = control.replace('.',"_");
                                $('#error-'+error_text).html(response.errors[control]);
                                // $('#error-'+error_text).html(response.errors[error_text][0]);
                                // console.log('#error-'+error_text);
                                }
                                // console.log(response.errors);
                            }
                        },
                        error: function (response) {
                            // alert("Error: " + errorThrown);
                            // console.log(response);
                        }
                    });
                    event.stopImmediatePropagation();
                    return false;
            });
        });
    </script>

</body>

</html>
