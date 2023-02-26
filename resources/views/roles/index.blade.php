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
@php
$route = 'admin.';
@endphp 				
<div class="row">
<div class="card text-left">
<div class="card-body">
<div class="row">
<div class="col-md-10">
<h4 class="card-title mb-3"> Roles </h4> 
<p> {{ $count }} Roles </p>			
</div>
<div class="col-md-2">			   
<div class="btn-group">
@if(Arr::exists($modules, 'Roles-create'))   
<a href="{{url('admin/'.$current_menu.'/create')}}" class="btn btn-danger" type="button" aria-haspopup="true" aria-expanded="false">Create Role</a>
@endif
</div>
</div>
</div>
<ul class="nav nav-tabs" id="myIconTab" role="tablist">
<li class="nav-item"><a class="nav-link active show" id="home-icon-tab" data-toggle="tab" href="#homeIcon" role="tab" aria-controls="homeIcon" aria-selected="true"><i class="nav-icon i-Pen-2 mr-1"></i> All Roles </a></li>
</ul>
<div class="tab-content" id="myIconTabContent">
<div class="tab-pane fade active show" id="homeIcon" role="tabpanel" aria-labelledby="home-icon-tab">
<div class="row" style="margin-bottom:15px">

<div class="col showlist">
<span>Show </span><button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #6a88c7!important;">   {{$perpage}}  </button><span> entries</span>
<div class="dropdown-menu"><a class="dropdown-item" href="?perpage=10">10</a><a class="dropdown-item" href="?perpage=25">25</a><a class="dropdown-item" href="?perpage=50">50</a><a class="dropdown-item" href="?perpage=100">100</a></div>
</div>
<div class="col-md-2">
<div id="myDropdown" class="dropdown-content">
    <input type="text" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id='role_search' placeholder="Search" style="padding: 5px;border-radius: 4px;background: #f6f8fc;">
    <div class="dropdown-menu" id="roles" style="display: none;">
    </div>
</div>      
</div>
</div>
                        <div class="tab-content" id="myIconTabContent">
                            <div class="tab-pane fade active show" id="homeIcon" role="tabpanel" aria-labelledby="home-icon-tab">
                               <div class="table-responsive tableFixHead" style="height: 420px;">
                                @include('roles.ajax')
                                </div>
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
    <!-- ============ jquery-confirm ============= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.1/jquery-confirm.min.js"></script>
    <!-- ============ jquery-ui ============= -->
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
    <script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){

      $( "#role_search" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            type: "POST",
            url:"{{route($route.'roles.getRoles')}}",
            dataType: "json",
            data: {
               _token: CSRF_TOKEN,
               search: request.term
            },
            success: function (data) {
                $('#roles').show();
                $.each(data, function (k, v){
                    $('#roles').append("<a class='dropdown-item' id='role"+v.value+"' href='javascript: void(0);' onclick='getUser("+v.value+");'>"+v.label+"</a>");
                });
            },
          });
        },
      });
    });
    function getUser(id){
        label = document.getElementById("role"+id).text;
        $('#role_search').val(label); // display the selected text
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: "{{route($route.'roles.index')}}",
            datatype: 'html',
            data: {'id': id},
            success: function (data) {
                $(".data-table").empty().html(data);
                $('#roles').empty().hide();
            },
            complete: function () {
            },
            error: function () {
            }
        });
       return false;
    }
    </script>
    <script type="text/javascript">
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
            if (table_name != '' && id != '' && status != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{route($route.'takeChangeStatusAction')}}",
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
                    url: "{{route($route.'takeDeleteAction')}}",
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
    </script>
    <style type="text/css">
        input#role_search {
    margin-left: -62px;
}
.col.showlist {
    margin-left: 17px;
}
    </style>
</body>
</html>