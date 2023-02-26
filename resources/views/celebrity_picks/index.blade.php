@include('layouts.sidebar');    
        
        <!-- =============== Left side End ================-->
        
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">              
                
                <div class="row">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}"> {{ Session::get('message') }} </p>
                    @endif
                </div>
                <div class="row">
                <div class="card text-left">
  
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                            <h3 class="card-title mb-3"> Celebrity Picks </h3>
                            <p> {{$count}} Celebrity Picks </p>           
                        </div>
                          <div class="col-md-2">             
                            <div class="btn-group">
                            @if(true)
                                <a href="{{url('/celebrity_descripion')}}" class="btn btn-danger" type="button" aria-haspopup="true" aria-expanded="false"> Celebrity Description</a>
                            @endif
                            </div>
                        </div>

                        <div class="col-md-2">             
                            <div class="btn-group">
                            @if(true)
                                <a href="{{url($current_menu.'/create')}}" class="btn btn-danger" type="button" aria-haspopup="true" aria-expanded="false"> Create Celebrity Picks </a>
                            @endif
                            </div>
                        </div>
                        </div>
                        
                     
                                <form style="display:none;">
                                    <div class="row">
                                        <div class="col-md-3 form-group mb-3">
                                            <label for="firstName1"> start date </label>
                                            <input class="form-control" id="firstName1" type="date" placeholder="Enter your first name">
                                        </div>
                                        <div class="col-md-3 form-group mb-3">
                                            <label for="lastName1"> end date </label>
                                            <input class="form-control" id="lastName1" type="date" placeholder="Enter your last name">
                                        </div>
 
                                        <div class="col-md-3 form-group mb-3">
                                            <label for="picker1">Select user </label>
                                            <select class="form-control">
                                                <option>Option 1</option>
                                                <option>Option 1</option>
                                                <option>Option 1</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-primary" style="width: 100%;padding: 7px;margin: 18px 0px;"> Filter </button>
                                        </div>
                                    </div>
                                </form>


                                <form style="display:none;">
                                    <div class="row">
                                        <div class="col-md-3 form-group mb-3">
                                            <label for="firstName1"> User Name </label>
                                            <input class="form-control" type="text" placeholder="Enter your first name">
                                        </div>
 
                                        <div class="col-md-3 form-group mb-3">
                                            <label for="picker1">Select user </label>
                                            <select class="form-control">
                                                <option>Option 1</option>
                                                <option>Option 1</option>
                                                <option>Option 1</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <button class="btn btn-primary" style="width: 100%;padding: 7px;margin: 18px 0px;"> search </button>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <button class="btn btn-primary" style="width: 100%;padding: 7px;margin: 18px 0px;"> Clear </button>
                                        </div>
                                    </div>
                                </form>
                                
                                
                            </div>
 
 
 
 
                              <div class="card-body" style="position:relative">
                                <ul class="nav nav-tabs" id="myIconTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active show" id="home-icon-tab" data-toggle="tab" href="#homeIcon" role="tab" aria-controls="homeIcon" aria-selected="true"><i class="nav-icon i-Pen-2 mr-1"></i> All Celebrity Picks </a></li>
                                    <!-- <li class="nav-item"><a class="nav-link" id="profile-icon-tab" data-toggle="tab" href="#profileIcon" role="tab" aria-controls="profileIcon" aria-selected="false"><i class="nav-icon i-Pen-2 mr-1"></i> My Contacts </a></li>
                                    <li class="nav-item"><a class="nav-link" id="contact-icon-tab" data-toggle="tab" href="#contactIcon" role="tab" aria-controls="contactIcon" aria-selected="false"><i class="nav-icon i-Pen-2 mr-1"></i> Unsigned Contact</a></li>
                                    
                                    <li class="nav-item"><a class="nav-link" id="contact-icon-tab" data-toggle="tab" href="#contactIcon" role="tab" aria-controls="contactIcon" aria-selected="false">  + Add View </a></li>
                                    <li class="nav-item"><a class="nav-link" id="contact-icon-tab" data-toggle="tab" href="#contactIcon" role="tab" aria-controls="contactIcon" aria-selected="false">  View All</a></li>    -->                                
                                    
                                </ul>
                                <!-- <h3 class="card-title mb-3"> QC Table </h3> -->

                                <!-- <label style="float: right; margin-bottom:20px;">
                                <input type="search" class="form-control form-control-sm" placeholder="Filter" aria-controls="zero_configuration_table" style="border: none;background: none;border-bottom: 2px solid #dee0e4;border-radius: inherit;font-size: 14px;"></label> -->
                                
                                <!-- <a class="addition" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add Column <i class="fa fa-plus"></i> </a>
                                <div class="dropdown-menu">
                                    
                                    <a class="dropdown-item" id="vendor1" >Add Vendor</a>
                                    <a class="dropdown-item" id="client1">Add Client Name</a>
                                    <a class="dropdown-item" id="whatsapp1">Add Whatsapp</a>
                                </div>
                                 -->
                                <div class="tab-content" id="myIconTabContent">
                                    <div class="tab-pane fade active show" id="homeIcon" role="tabpanel" aria-labelledby="home-icon-tab">
                                        <div class="table-responsive table-head-fix" style="height: 420px;">
                                            <table class="table table-striped table-bordered qcs_table data-table" data-resizable-columns-id="demo-table">
                                                <thead>
                                                    <!-- <tr>
                                                        <th data-resizable-column-id="1" colspan="5"> </th>
                                                        <th data-resizable-column-id="2" colspan="5"> Candidate </th>
                                                        <th data-resizable-column-id="3" colspan="5"> QC </th>
                                                        <th data-resizable-column-id="4" class="vendor-col" colspan="">Vendor</th>
                                                        <th data-resizable-column-id="5" class="client-col" colspan="">Clients</th>
                                                        <th data-resizable-column-id="6" class="wh-col" colspan="">Whatsapp</th>
                                                    </tr>
                                                    
                                                    <tr class="second">
                                                        <th>#</th>
                                                        <th> Job Name </th>
                                                        <th> Total <br> Varification</th>
                                                        <th> calls </th>
                                                        <th> SMS </th>
                                                        <th> Email </th>
                                                        <th> Link <br> Clicked </th>
                                                        <th> Link did <br> not Clicked </th>
                                                        <th> Submited  </th>
                                                        <th> Link Clicked  <br> not Submited  </th>
                                                        <th> Done  </th>
                                                        <th> Pending </th>
                                                        <th class="red">  Red  </th>
                                                        <th class="green">  Green  </th>
                                                        <th class="amber"> Hold </th>
                                                        <th class="vendor-col">Vendors</th>
                                                        <th class="client-col">Client Name</th>
                                                        <th class="wh-col">Connect to Whatsapp</th>
                                                    </tr> -->
                                                    <tr>
                                                        <th scope="col"> Sr. No. </th>
                                                        <th scope="col"> Image </th>
                                                      
                                                        <th scope="col"> Created At </th>
                                                        <th scope="col"> Status </th>
                                                        @if(true)
                                                        <th scope="col"> Action </th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- <tr>
                                                        <td> 1</td>
                                                        <td>Tiger Nixon</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                         <td>2</td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td>2</td>
                                                        <td class="red">2</td>
                                                        <td class="green">0</td>
                                                        <td class="amber">0</td>
                                                        <td class="vendor-col">John</td>
                                                        <td class="client-col">Jai Mathur</td>
                                                        <td class="wh-col">
                                                            <a href="#">
                                                                <img src="{{ asset('images/whatsapp.png') }}">
                                                            </a>
                                                        </td>                                       
                                                    </tr>
         

                                                    <tr>
                                                        <td> 2 </td>
                                                        <td>Tiger Nixon</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td><a href="#" data-toggle="modal" data-target="#single-person">1</a></td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td>2</td>
                                                        <td class="red">2</td>
                                                        <td class="green">0</td>
                                                        <td class="amber">0</td>
                                                        <td class="vendor-col">Juliet</td>
                                                        <td class="client-col">Vishal</td>
                                                        <td class="wh-col">
                                                            <a href="#">
                                                                <img src="{{ asset('images/whatsapp.png') }}">
                                                            </a>
                                                        </td>                                               
                                                    </tr>

                                                    <tr>
                                                        <td> 3</td>
                                                        <td>Tiger Nixon</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td><a href="#" data-toggle="modal" data-target="#single-person">1</a></td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td>2</td>
                                                        <td class="red">2</td>
                                                        <td class="green">0</td>
                                                        <td class="amber">0</td>
                                                        <td class="vendor-col">Macgraw</td>
                                                        <td class="client-col">Priyanka</td>
                                                        <td class="wh-col">
                                                            <a href="#">
                                                                <img src="{{ asset('images/whatsapp.png') }}">
                                                            </a>
                                                        </td>                                               
                                                    </tr>

                                                    <tr>
                                                        <td> 3</td>
                                                        <td>Tiger Nixon</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td>2</td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td>2</td>
                                                        <td class="red">2</td>
                                                        <td class="green">0</td>
                                                        <td class="amber">0</td>
                                                        <td class="vendor-col">Raman</td>
                                                        <td class="client-col">Shurya</td>
                                                        <td class="wh-col">
                                                            <a href="#">
                                                                <img src="{{ asset('images/whatsapp.png') }}">
                                                            </a>
                                                        </td>                                               
                                                    </tr> -->

                                                    
                                                    
                                                </tbody>
                                            </table>
                                                                                
                                        </div>
                                    </div>
                                </div>
                                
                                
<!-- <div class="row mt-3">
    <div class="col-sm-12 col-md-5"><div class="dataTables_info" id="zero_configuration_table_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="zero_configuration_table_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="zero_configuration_table_previous"><a href="#" aria-controls="zero_configuration_table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="zero_configuration_table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_configuration_table" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_configuration_table" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_configuration_table" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_configuration_table" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_configuration_table" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="zero_configuration_table_next"><a href="#" aria-controls="zero_configuration_table" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div>                               
                            </div> -->
                      
 
 
 
 
 
 
 
 
 
                </div>
                </div>
                
            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>
            
            
            
<div class="modal fade" id="single-person" tabindex="-1" role="dialog" aria-labelledby="single-person" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="single-person">Job Name : Demo version 2.0.1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding:25px;">

      <div class="table-custom table-responsive">
        
      <table id="customes" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Job Name</th>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Address</th>
                <th>Date</th>
                <th>Call sent</th>
                <th>SMS sent</th>
                <th>Email sent</th>
                <th>SMS link clicked</th>
                <th>Form Filled</th>
                <th>QC Status</th>
                <th>Report</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Demo version 1.0.7</td>
                <td>1</td>
                <td>John Doe</td>
                <td>8899889900</td>
                <td>singh@gmail.com</td>
                <td>New Ahok Nagar , near metro 15 station</td>
                <td>21/12/2020</td>
                <td>yes</td>
                <td>yes(0) delivered</td>
                <td>yes</td>
                <td>yes</td>
                <td>yes</td>
                <td><span class="pending">Pending</span></td>
                <td><a href="#" class="qc1">Link</a></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Demo version 1.0.7</td>
                <td>1</td>
                <td>John Doe</td>
                <td>8899889900</td>
                <td>singh@gmail.com</td>
                <td>New Ahok Nagar , near metro 15 station</td>
                <td>21/12/2020</td>
                <td>yes</td>
                <td>yes(0) delivered</td>
                <td>yes</td>
                <td>yes</td>
                <td>yes</td>
                <td><span class="progressing">In progress</span></td>
                <td><a href="#" class="qc1">Link</a></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Demo version 1.0.7</td>
                <td>1</td>
                <td>John Doe</td>
                <td>8899889900</td>
                <td>singh@gmail.com</td>
                <td>New Ahok Nagar , near metro 15 station</td>
                <td>21/12/2020</td>
                <td>yes</td>
                <td>yes(0) delivered</td>
                <td>yes</td>
                <td>yes</td>
                <td>yes</td>
                <td>Done <a href="confirmation.php" class="qc1">QC</a></td>
                <td><a href="#" class="qc1">Link</a></td>
            </tr>
        </tbody>
    </table>
        </div>

      </div>
      
    </div>
  </div>
</div>
            
            
<!--            
            <div class="app-footer">
                <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">
                     
                     <p><strong> 2020 &copy; Admin ! All rights reserved</strong></p>
                     
                    <span class="flex-grow-1"></span>
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="m-0"> design by techsaga </p>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- fotter end -->
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
    <script src="{{ asset('resized/jquery.resizableColumns.js') }}"></script>
    <!-- ============ jquery-dataTables ============= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <!-- ============ jquery-confirm ============= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.1/jquery-confirm.min.js"></script>

    <script type="text/javascript">
    $(function () {
        <?php if (true): ?>
            var table = $('.data-table').DataTable({

                processing: true,

                serverSide: true,

                ajax: "{{route('celebrity_picks.index')}}",

                columns: [

                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},

                    {data: 'name', name: 'name'},

                    {data: 'created_at', name: 'created_at'},

                    {data: 'status', name: 'status'},

                    {data: 'action', name: 'action'},

                ]

            });
        <?php else: ?>
            var table = $('.data-table').DataTable({

                processing: true,

                serverSide: true,

                ajax: "{{route('celebrity_picks.index')}}",

                columns: [

                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},

                    {data: 'name', name: 'name'},

                    {data: 'is_banner', name: 'is_banner'},

                    {data: 'created_at', name: 'created_at'},

                    {data: 'status', name: 'status'},

                ]

            });
        <?php endif ?>
      });
    function myFunction(table_name, id, name) {
        $.confirm({
            title: 'Alert!',
            content: 'Are you sure you want to change the banner to '+name+'?',
            buttons: {
                confirm: function () {
                    takeBannerChangeAction(table_name, id, name);
                    $.alert({
                        title: 'Alert!',
                        content: 'Done!',
                        buttons: {
                            ok: function () {
                            }
                        }
                    });
                },
                cancel: function () {
                    $.alert('Canceled!');
                    setTimeout("window.parent.location = ''", 50);
                }
            }
        });
    }
    function takeBannerChangeAction(table_name, id, name) {
        if (table_name != '' && id != '' && name != '') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '{{route('takeBannerChangeAction')}}',
                dataType: 'json',
                data: {'table_name': table_name, 'id': id, 'name': name},
                success: function (data) {
                },
                complete: function () {
                },
                error: function () {
                }
            });
        }
    }
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
</body>

</html>
