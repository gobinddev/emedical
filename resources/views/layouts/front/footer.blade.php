
            <footer> 
                <div class="footer-area footer3 footer-bg h3-primary-bg position-relative">
                    <div class="footer-top">
                        <div class="container">
                            <div class="row d-flex">
                                <div class="col-xxl-5 col-xl-5  col-lg-5  col-md-5  col-sm-12 col-12 d-sm-flex justify-content-lg-center footer-r-border">
                                    <ul class="footer-account pt-80 ">
                                        <li>
                                            <a href="{{Url('myaccount')}}" class="position-relative d-inline-block">My Account</a>
                                        </li>
                                        <!--<li>-->
                                        <!--    <a href="#" class="position-relative d-inline-block">Order Status</a>-->
                                        <!--</li>-->
                                        
                                        <li>
                                            <a href="#" class="position-relative d-inline-block">Returns & Exchanges</a>
                                        </li>
                                        <li>
                                            <a href="#" class="position-relative d-inline-block">International Shipments</a>
                                        </li>
                                        <li>
                                            <a href="{{Url('contact-us')}}" class="position-relative d-inline-block">Contact Us</a>
                                        </li>
                                    </ul>
                                    
                                </div>

                                <div class="col-xxl-4 col-xl-4  col-lg-4  col-md-4  col-sm-6 col-12 footer-r-border">
                                    <div class="footer-widget f-adress pb-90 pt-80 pr-100 pl-100">
                                        <img src="{{asset('images/logos.png')}}" alt="">
                                        <p class="pt-18 font13 text-uppercase mt-25" style="line-height:5px;">JK&S LTD </p>
                                            <p style="line-height:5px;">71-75 SHELTON STREET</p>
                                             <p style="line-height:5px;">COVENT GARDEN</p>
                                            <p style="line-height:5px;">LONDON, WC2H 9JQ</p>
                                             <p style="line-height:5px;">UNITED KINGDOM</p>
                                             <p style="line-height:5px;">Company Number: 10122440</p>
                                        <div class="f-adress-text mt-25">
                                            <!--<ul class="footer-address">-->
                                            <!--    <li>-->
                                            <!--        <a class="footer-phone text-white mb-0" href="tell:(+800)123456780900">-->
                                            <!--            (+800) 1234 56780 900</a>-->
                                            <!--    </li>-->
                                            <!--    <li class="footer-mail pt-10">-->
                                            <!--        <a href="#" class="text-white font14">services@COMPANY.COM</a>-->
                                            <!--    </li>-->
                                            <!--</ul>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-xl-3  col-lg-3  col-md-12  col-sm-6 col-12 d-flex justify-lg-content-center">
                                    <div class="footer-widget f-social pb-30 pt-80 footer-padding-left">
                                        <ul class="footer-social-link">
                                
                                        </ul>
                                    </div>
                                </div><!-- /col -->
                            </div><!-- /row -->
                        </div><!-- /container -->
                    </div>
                    <div class="footer-bottom">
                        <div class="container">
                            <div class="row align-items-center justify-content-center footer-t-border pt-25">
                                    <!-- ====== service-area-start ========================================= -->
                                <div class="col-xl-8  col-lg-8  col-md-12  col-sm-12 col-12">
                                    <div class="service-area text-center">
                                        <p class="mb-0 fs12"> Copyright © 2022  Emedical  Ltd.  All Rights Reserved.Designed and Developed by Top <a href="" class="fs12">Website Development Company India</a></p>
                                    </div>
                                </div><!-- /col -->
                                <div class="col-xl-4  col-lg-4  col-md-12  col-sm-12 pr-0 col-12 d-flex justify-content-lg-end">
                                    <div class="footer-widget f-payment pb-25">
                                        <div class="footer-payment">
                                            <img src="{{asset('images/footer/payment.png')}}" alt="">
                                        </div>
                                    </div>
                                </div><!-- /col -->
                            </div><!-- /row -->
                        </div><!-- /container -->
                    </div>
                    <div class="pattern position-absolute left0 bottom0 d-none d-xl-block" style="">
                        <img src="{{asset('images/bg/footer-ptrn.png')}}" alt="">
                    </div>
                    <div class="f-pattern position-absolute d-none d-xl-block">
                        <img src="{{asset('images/bg/Pattern1.png')}}" alt="">
                    </div>
                </div>
            </footer>

            <!-- back top -->
            <div class="scroll-up" id="scroll">
                <a href="#" class="h3-theme-bg white d-block text-center position-fixed">
                    <span class="icon-chevrons-up"></span>
                </a>
            </div>

        <!-- All js here -->
        <script src="{{asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
        <script src="{{asset('js/vendor/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery.inputarrow.js')}}"></script>
        <script src="{{asset('js/jquery.elevateZoom-3.0.8.min.js')}}"></script>
        <script src="{{asset('js/wow.min.js')}}"></script>
        <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
        <script src="{{asset('js/slick.min.js')}}"></script>
        <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
        <script src="{{asset('js/jquery.meanmenu.min.js')}}"></script>
        <script src="{{asset('js/plugins.js')}}"></script>
        <script src="{{asset('js/countdown.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
     </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#search").keyup(function(){
      var query = $("#search").val();
     
    $.ajax({
              url: "{{Url('search')}}",
              type: "post",
              data: {query:query, "_token": "{{ csrf_token() }}" },
              success: function(response)
              {}
          });
   });
});
</script>
 <script>
 
    $(document).ready(function(){
      var cart ='countcart';
        $.ajax({
                url : "{{Url('countcart')}}",
                method : "POST",
                data : {cart:cart, _token:'{{csrf_token()}}'},
                success: function(data){
                    $('#counttotal').html(data);
                },
            });

});
   
   
   
  
 </script>
