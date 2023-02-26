@include('layouts.sidebar')
	
	<style type="text/css">
     
     .note-popover{
        display: none!important;     }   
    </style>
        <!-- =============== Left side End ================-->
		

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">				
 
                <div class="row">
                    <div class="card text-left">
                        <form action="{{url('admin/policy_update')}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title mb-3">Privacy Policy </h3> 
                                        
                                          <textarea class="summernote" name="policy">{!!$data->policy!!}</textarea>

                                       
                                        <div class="uploader">
                                           
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
    <!-- ============ bootstrap-datetimepicker ============= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js "></script>

    <script type="text/javascript">
        $(function() {
          $('#datetimepicker1').datetimepicker();
        });

        $(document).ready(function() {
          $('.summernote').summernote({

                height:400,
            
                fontNames: ['Lato','Arial','Courier New','Helvetica','Nunito'],
                fontNamesIgnoreCheck: ['Lato','Arial','Courier New','Helvetica','Nunito'],

                 toolbar: [
                     ['style', ['style']],
                     ['font', ['bold', 'underline', 'clear']],
                     ['fontname', ['fontname']],
                     ['fontsize', ['fontsize']],
                     ['color', ['color']],
                     ['para', ['ul', 'ol', 'paragraph']],
                     ['table', ['table']],
                     ['insert', ['link', 'picture', 'video']],
                     ['view', ['fullscreen', 'codeview', 'help']],
                  ],
            });
         });
    </script>
</body>

</html>