@include('layouts.sidebar')

<!-- =============== Left side End ================-->

<div class="main-content-wrap sidenav-open d-flex flex-column">
<!-- ============ Body content start ============= -->
<div class="main-content">
<div class="row">
    <div class="col-12">
        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
    </div>
</div>
@php
    $route = 'admin.';
@endphp
<div class="row">
<div class="card text-left">
<div class="card-body">
<div class="row">
<div class="col-md-10">
<h4 class="card-title mb-3"> Orders </h4>
<p> {{$count}} Orders</p>
</div>
<div class="col-md-2">
<div class="btn-group">

</div>
</div>
</div>
<ul class="nav nav-tabs" id="myIconTab" role="tablist">
<li class="nav-item"><a class="nav-link active show" id="home-icon-tab" data-toggle="tab" href="#homeIcon" role="tab" aria-controls="homeIcon" aria-selected="true"><i class="nav-icon i-Pen-2 mr-1"></i> Orders </a></li>
</ul>
                        <div class="tab-content" id="myIconTabContent">
                            <div class="tab-pane fade active show" id="homeIcon" role="tabpanel" aria-labelledby="home-icon-tab">
                               <div class="table-responsive tableFixHead" style="height: 420px;">
                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th scope="col"> Sr. No. </th>
                                                <th scope="col"> Order No </th>
                                                <th scope="col"> Date & Time </th>
                                                <th scope="col"> Payment Method </th>
                                                <th scope="col"> Payment Status </th>
                                                <th scope="col"> Total </th>
                                                <th scope="col"> Status </th>
                                                @if(true)
                                                <th scope="col"> Action </th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
    </div>
    <div class="flex-grow-1"></div>

    <div class="modal" id="order_mdl">
        <div class="modal-dialog modal-lg">
           <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                 <div class="row w-100">
                    <div class="col-11">
                      <h4 class="modal-title">Order Status </h4>
                    </div>
                    <div class="col-1">
                      <button type="button" class="close btn-disable" style="top: 12px;!important; color: red;" data-dismiss="modal"><small>×</small></button>
                    </div>
                 </div>
              </div>
              <!-- Modal body -->
              <form method="post" action="{{route('admin.order.status')}}" id="order_frm">
              @csrf
                <input type="hidden" name="id" class="id">
                 <div class="modal-body">
                   <div class="row">
                       <div class="col-6">
                           <div class="form-group">
                             <strong>Order No:</strong> <span class="order_no"></span>
                           </div>
                       </div>
                   </div>
                   <div class="row">
                     <div class="col-8">
                        <div class="form-group">
                            <label for="label_name">Status : <span class="text-danger">*</span></label>
                            <select class="form-control status" name="status">
                                <option value="">--Select--</option>
                                <option value="1">Processing</option>
                                <option value="2">Confirm</option>
                                <option value="3">Complete</option>
                                <option value="4">On Hold</option>
                                <option value="5">Cancel</option>
                            </select>
                            <p style="margin-bottom: 2px;" class="text-danger error-container error-status" id="error-status"></p>
                        </div>
                     </div>
                 </div>
                 <!-- Modal footer -->
                 <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-disable submit">Submit </button>
                    <button type="button" class="btn btn-danger btn-disable" data-dismiss="modal">Close</button>
                 </div>
              </form>
           </div>
        </div>
      </div>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
    <script src="{{ asset('js/sidebar.large.script.min.js') }}"></script>
    <script src="{{ asset('js/echarts.min.js') }}"></script>
    <script src="{{ asset('js/echart.options.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.v1.script.min.js') }}"></script>
    <!-- ============ bootstrap-datetimepicker ============= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
    <!-- ============ jquery-dataTables ============= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <!-- ============ jquery-confirm ============= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.1/jquery-confirm.min.js"></script>
    <script type="text/javascript">
        $(function () {
            <?php if (true): ?>
                var table = $('.data-table').DataTable({

                    processing: true,

                    serverSide: true,

                    ajax: "{{route($route.'order.index')}}",

                    columns: [

                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},

                        {data: 'order_no', name: 'order_no'},

                        {data: 'ordered_at', name: 'ordered_at'},

                        {data: 'payment_method', name: 'payment_method'},

                        {data: 'is_paid', name: 'is_paid'},

                        {data: 'total_price', name: 'total_price'},

                        {data: 'vendor', name: 'vendor'},

                        {data: 'status', name: 'status'},

                        {data: 'action', name: 'action'},

                    ]

                });
            <?php else: ?>
                var table = $('.data-table').DataTable({

                    processing: true,

                    serverSide: true,

                    ajax: "{{route($route.'order.index')}}",

                    columns: [

                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},

                        {data: 'order_no', name: 'order_no'},

                        {data: 'ordered_at', name: 'ordered_at'},

                        {data: 'payment_method', name: 'payment_method'},

                        {data: 'is_paid', name: 'is_paid'},

                        {data: 'total_price', name: 'total_price'},

                        {data: 'vendor', name: 'vendor'},

                        {data: 'status', name: 'status'},

                    ]

                });
            <?php endif ?>
          });

    $(document).ready(function(){
        $(document).on('click','.order_status',function(){
            var id=$(this).attr('data-id');
            $('.form-control').removeClass('is-invalid');
            $('.error-container').html('');
            $('.btn-disable').attr('disabled',false);
            $('#order_mdl').modal({
                backdrop: 'static',
                keyboard: false
            });
            $.ajax({
                type: 'GET',
                url: "{{ route('admin.order.status') }}",
                data: {'id':id},
                success: function (data) {
                    $("#order_frm")[0].reset();
                    if(data !='null')
                    {
                        var status = data.data.status.toString();
                        //check if primary data
                        $('.id').val(id);
                        $('.order_no').text(data.data.order_no);
                        $(".status").val(status).change();
                        //$(`.status option[value='${status}']`).prop('selected', true);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    // alert("Error: " + errorThrown);
                }
            });
        });

        $(document).on('submit', 'form#order_frm', function (event) {
            event.preventDefault();
            //clearing the error msg
            $('p.error-container').html("");

            var form = $(this);
            var data = new FormData($(this)[0]);
            var url = form.attr("action");
            var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
            $('.btn-disable').attr('disabled',true);
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
                        $('.btn-disable').attr('disabled',false);
                        $('.submit').html('Save Changes');
                    },2000);
                    if(response.success==true) {
                        // redirect to google after 5 seconds
                        window.setTimeout(function() {
                            window.location.reload();
                        }, 2000);

                    }
                    //show the form validates error
                    if(response.success==false ) {
                        for (control in response.errors) {
                        var error_text = control.replace('.',"_");
                        $('.error-'+error_text).html(response.errors[control]);
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
