@include('layouts.sidebar')





        <!-- =============== Left side End ================-->




        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">

             <div class="row">
             <div class="col-lg-10">
             <h3 class="mr-2"> Analytics Overview  </h3>
              </div>

               <div class="col-lg-2">
            <!--<div class="btn-group" style="float: right;">-->
            <!--            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
            <!--                Last 30 days-->
            <!--            </button>-->

            <!--        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px,27px, 0px);">-->
            <!--            <a class="dropdown-item" href="#">Today Only</a>-->
            <!--            <a class="dropdown-item" href="#">This Week</a>-->
            <!--            <a class="dropdown-item" href="#">This Month</a>-->
            <!--            <a class="dropdown-item" href="#">This Year</a>-->
            <!--        </div>-->
            <!--        </div>-->
              </div> 
              </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-1 o-hidden mb-4">
                            <div class="card-body text-center">
                                <i class="fa fa-user"></i>
                                <div class="content">
                                 <p class="text-primary text-24 line-height-1 mb-2"> {{ $customer_count }} </p>
                                    <p class="text-muted mt-2 mb-0">Total Customers</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-2 o-hidden mb-4">
                            <div class="card-body text-center">
                                <i class="fa fa-th-list"></i>
                                <div class="content">
                                    <p class="text-primary text-24 line-height-1 mb-2"> {{ $product_category_count }} </p>
                                     <p class="text-muted mt-2 mb-0">Product Categories</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-3 o-hidden mb-4">
                            <div class="card-body text-center">
                                <i class="fa fa-gift"></i>
                                <div class="content">
                                    <p class="text-primary text-24 line-height-1 mb-2"> {{ $product_count }} </p>
                                     <p class="text-muted mt-2 mb-0">Total Products</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                  <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-1 o-hidden mb-4">
                            <div class="card-body text-center">
                                <i class="fa fa-user"></i>
                                <div class="content">
                                 <p class="text-primary text-24 line-height-1 mb-2"> {{ $visitors }} </p>
                                    <p class="text-muted mt-2 mb-0">Total Visitors</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-2 o-hidden mb-4">
                            <div class="card-body text-center">
                                <i class="fa fa-th-list"></i>
                                <div class="content">
                                    <p class="text-primary text-24 line-height-1 mb-2"> {{ $sold_product }} </p>
                                     <p class="text-muted mt-2 mb-0">Product Sold</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-3 o-hidden mb-4">
                            <div class="card-body text-center">
                                <i class="fa fa-gift"></i>
                                <div class="content">
                                    <p class="text-primary text-24 line-height-1 mb-2"> {{ $stockcount }} </p>
                                     <p class="text-muted mt-2 mb-0">Low Stock</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                  <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-2 o-hidden mb-4">
                             
                        <div class="card-body text-center">
                            <div class="card-body">
                                <div class="card-title">Sales by Countries</div>
                               <div id="piechart" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                  </div>
                 
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-1 o-hidden mb-4">
                            <div class="card-body text-center">
                                <i class="fa fa-user"></i>
                                <div class="content">
                                 <p class="text-primary text-24 line-height-1 mb-2"> {{$totalorder}} </p>
                                    <p class="text-muted mt-2 mb-0">Total Order</p>

                                </div>
                            </div>
                        </div>
                    </div>
                 
                 
                    <!--<div class="col-lg-4 col-md-6 col-sm-6">-->
                    <!--    <div class="card card-icon-bg card-icon-bg-3 o-hidden mb-4">-->
                    <!--        <div class="card-body text-center">-->
                    <!--            <i class="fa fa-gift"></i>-->
                    <!--            <div class="content">-->
                    <!--                <p class="text-primary text-24 line-height-1 mb-2"> {{ $stockcount }} </p>-->
                    <!--                 <p class="text-muted mt-2 mb-0">Low Stock</p>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                 

             <!--<div class="row">-->
             <!--<div class="col-lg-10">-->
             <!--   <div class="btn-group">-->
             <!--     <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <h4> Most <span class="rm">Recent Media <span> </h4>-->
             <!--   </button>-->
             <!--      <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 27px, 0px);"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another Action</a><a class="dropdown-item" href="#">Something Else Here</a></div>-->
             <!--   </div>-->
             <!-- </div>-->

             <!-- <div class="col-lg-2">-->
             <!--       <div class="btn-group" style="float: right;">-->
             <!--        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  Show <span class="alm"> all media </span>-->
             <!--        </button>-->
             <!--          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 27px, 0px);"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another Action</a><a class="dropdown-item" href="#">Something Else Here</a></div>-->
             <!--        </div>-->
             <!-- </div>-->
             <!-- </div>-->

                <div class="row">

                    <!--<div class="col-lg-4 col-sm-12">-->
                    <!--    <div class="card mb-4">-->
                    <!--        <div class="card-body">-->
                    <!--            <div class="card-title">Sales by Countries</div>-->
                    <!--           <div id="piechart" style="height: 300px;"></div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--echartPie-->
                    <!--<div class="col-lg-8 col-md-12">-->
                    <!--    <div class="card mb-4">-->
                    <!--        <div class="card-body">-->
                    <!--            <div class="card-title">This Year Sales</div>-->
                    <!--            <div id="echartBar" style="height: 300px;"></div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                </div>

            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>

        </div>
    </div><!-- ============ Search UI Start ============= -->

    <!-- ============ Search UI End ============= -->
    {{-- <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/script.min.js') }}"></script>
    <script src="{{ asset('js/sidebar.large.script.min.js') }}"></script>
    <script src="{{ asset('js/echarts.min.js') }}"></script>
    <script src="{{ asset('js/echart.options.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.v1.script.min.js') }}"></script>
</body>

</html>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
 
        function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
            ['Country Name', 'User Count'],
 
                @php
                foreach($pieChart as $d) {
                    echo "['".$d->name."', ".$d->count."],";
                }
                @endphp
        ]);

 
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
 
          chart.draw(data);
        }
</script>