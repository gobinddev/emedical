@include('layouts.sidebar')

<!-- =============== Left side End ================-->

<div class="main-content-wrap sidenav-open d-flex flex-column">
<!-- ============ Body content start ============= -->
<div class="main-content">		
<div class="row">
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
</div>		
<div class="row">
<div class="card text-left">
<div class="card-body">
<div class="row">
<div class="col-md-10">
<h4 class="card-title mb-3"> Catalogue List </h4> 
<p> {{$count}} Catalogue List </p>			
</div>
<div class="col-md-2">			   
<div class="btn-group">	
@if(Arr::exists($modules, 'Catalogue-list-create'))   
<a href="{{url($current_menu.'/catalogue_create/'.$id)}}" class="btn btn-danger" type="button" aria-haspopup="true" aria-expanded="false">Create Catalogue List</a>
@endif
</div>
</div>
</div>
<ul class="nav nav-tabs" id="myIconTab" role="tablist">
<li class="nav-item"><a class="nav-link active show" id="home-icon-tab" data-toggle="tab" href="#homeIcon" role="tab" aria-controls="homeIcon" aria-selected="true"><i class="nav-icon i-Pen-2 mr-1"></i> All Catalogue List </a></li>								
</ul>
                        <div class="tab-content" id="myIconTabContent">
                            <div class="tab-pane fade active show" id="homeIcon" role="tabpanel" aria-labelledby="home-icon-tab">
                               <div class="table-responsive tableFixHead" style="height: 420px;">
                                    <table class="table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th scope="col"> Sr. No. </th>
                                                <th scope="col"> Catelogue Link </th>
                                                <th scope="col"> Created At </th>
                                                <th scope="col"> Catelogue Status </th>
                                                 @if(Arr::exists($modules, 'catalogue-changeStatus') || Arr::exists($modules, 'catalogue-edit') || Arr::exists($modules, 'catalogue-delete'))
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
    <div class="flex-grow-1"></div>

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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.9/jquery.datetimepicker.full.min.js" integrity="sha512-hDFt+089A+EmzZS6n/urree+gmentY36d9flHQ5ChfiRjEJJKFSsl1HqyEOS5qz7jjbMZ0JU4u/x1qe211534g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ============ jquery-confirm ============= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.1/jquery-confirm.min.js"></script>
 <script type="text/javascript">
    $(function () {
        <?php if (Arr::exists($modules, 'catalogue-changeStatus') || Arr::exists($modules, 'catalogue-edit') || Arr::exists($modules, 'catalogue-delete')): ?>
            var table = $('.data-table').DataTable({

                processing: true,

                serverSide: true,

                ajax: "{{  url('/products/show_catalogue',[$id])  }}",

                columns: [

                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},

                    {data: 'catalogue_link', name: 'catalogue_link'},

                    {data: 'created_at', name: 'created_at'},

                    {data: 'status', name: 'status'},

                    {data: 'action', name: 'action'},

                ]

            });
        <?php else: ?>
            var table = $('.data-table').DataTable({

                processing: true,

                serverSide: true,

                ajax: "{{ url('products/show_catalogue',[$id])  }}",

                columns: [

                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},

                    {data: 'catalogue_link', name: 'catalogue_link'},
                    
                    {data: 'created_at', name: 'created_at'},

                    {data: 'status', name: 'status'},

                ]

            });
        <?php endif ?>
      });
    function confirmChangeStatusAction(table_name, id, status) {
        if (status == 0) {
            newStatus = 'active';
        }
        else {
            newStatus = 'inactive';
        }
        $.confirm({
            title: 'Alert!',
            content: 'Are you sure you want to change the status to '+newStatus+'?',
            buttons: {
                confirm: function () {
                    takeChangeStatusAction(table_name, id, status);
                    $.alert({
                        title: 'Alert!',
                        content: 'Done!',
                        buttons: {
                            ok: function () {
                                setTimeout("window.parent.location = ''", 50);
                            }
                        }
                    });
                },
                cancel: function () {
                    $.alert('Canceled!');
                }
            }
        });
    }
    function confirmDeleteAction(table_name, id) {
        $.confirm({
            title: 'Alert!',
            content: 'Are you sure you want to delete this?',
            buttons: {
                confirm: function () {
                    takeDeleteAction(table_name, id);
                    $.alert({
                        title: 'Alert!',
                        content: 'Done!',
                        buttons: {
                            ok: function () {
                                setTimeout("window.parent.location = ''", 50);
                            }
                        }
                    });
                },
                cancel: function () {
                    $.alert('Canceled!');
                }
            }
        });
    }
    function takeChangeStatusAction(table_name, id, status) {
        if (table_name != '' && id != '') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '{{route('takeChangeStatusAction')}}',
                dataType: 'json',
                data: {'table_name': table_name, 'id': id, 'status': status},
                success: function (data) {
                },
                complete: function () {
                },
                error: function () {
                }
            });
        }
    }
    function takeDeleteAction(table_name, id) {
        if (table_name != '' && id != '') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '{{route('takeDeleteAction')}}',
                dataType: 'json',
                data: {'table_name': table_name, 'id': id},
                success: function (data) {
                },
                complete: function () {
                },
                error: function () {
                }
            });
        }
    }
    $(document).ready(function(){
        // Javascript for Vendor
        $(document).on("click", "#vendor1",function(){
            $(".vendor-col").css("display", "table-cell");
            $(this).html("Hide Vendor");
            $(this).removeAttr("id","vendor1")
            $(this).attr("id","vendor2");
        });
        $(document).on("click", "#vendor2",function(){
            $(".vendor-col").css("display", "none");
            $(this).html("Add Vendor");
            $(this).removeAttr("id","vendor2")
            $(this).attr("id","vendor1");
        });
        // Javascript end for vendor

        // Javascript for Client
        $(document).on("click", "#client1",function(){
            $(".client-col").css("display", "table-cell");
            $(this).html("Hide Client Name");
            $(this).removeAttr("id","client1")
            $(this).attr("id","client2");
        });
        $(document).on("click", "#client2",function(){
            $(".client-col").css("display", "none");
            $(this).html("Add Client Name");
            $(this).removeAttr("id","client2")
            $(this).attr("id","client1");
        });
        // Javascript End for Clients

        // Javascript for Whatsapp
        $(document).on("click", "#whatsapp1",function(){
            $(".wh-col").css("display", "table-cell");
            $(this).html("Hide Whatsapp");
            $(this).removeAttr("id","whatsapp1")
            $(this).attr("id","whatsapp2");
        });
        $(document).on("click", "#whatsapp2",function(){
            $(".wh-col").css("display", "none");
            $(this).html("Add Whatsapp");
            $(this).removeAttr("id","whatsapp2")
            $(this).attr("id","whatsapp1");
        });
        // Javascript end for Whatsapp

        // javascript for resizable columns
        $(".qcs_table").resizableColumns({
             store: window.store
        });

        
        $('#customes').DataTable();


    });

    // function myFunction() {
    //     var x = document.getElementByClass("vendor-col");
    //     if (x.style.display = "none") {
    //         x.style.display = "block";
    //     } else if (
    //         x.style.display = "block") {
    //         x.style.display = "none";    
    //         }
    //     }
    </script>
    <style type="text/css">
        a.btn.btn-info {
    margin-top: 7px;
}
button.btn.btn-danger {
    margin-top: 7px;
}
    </style>
</body>
</html>