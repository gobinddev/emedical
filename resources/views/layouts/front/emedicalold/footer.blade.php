

@php
    $map_url = asset('assets/img/maps.png');
@endphp
 {{-- <section  class="clt v1 grow mapsection" style="background-image:url({{$map_url}})">

    <div id="addgrow" class="addgrow">


            <div class="box animation">
                <div class="c1 line"></div>
                <div class="main">
                    <strong>FIND THE NEAREST DEALER YOU’II WANT TO ATTEND. </strong>
                </div>
            </div>
            <div class="btn-con">
                 <div class="formsmap">
                                <form action="">
                 <input type="text" placeholder="ENTER THE PINCODE" name="">

                <a href="" class="btn v1">SEARCH THE DEALER</a>
            </form>
                </div>
                <div class="c2-box"><div class="c2 line"></div></div>
            </div>

    </div>
</section> --}}



<footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <!-- Contact Info-->

          <section class="widget widget-light-skin">
           <div class="footer__about footer__widget">
                     <h3 class="widget-title">Contact Us</h3>
                           <ul>
                              <li><span><img src="{{asset('assets/img/IMG_8323.jpg')}}"></span>Service@toovem.com</li>
                              <li><span><img src="{{asset('assets/img/IMG_8321.jpg')}}"></span> www.toovem.com</li>
                              <li><span><img src="{{asset('assets/img/IMG_8322.jpg')}}"></span> (888) 888 - 8888</li>
                              <li><span><img src="{{asset('assets/img/IMG_8320.jpg')}}"></span>(Monday-Friday: 08:00AM - 5:00PM) UTC</li>
                           </ul>
                        </div>
          <div class="footer-social-links">
            <a href="https://www.facebook.com"><span><i class="fa fa-facebook-f"></i></span></a>
            <a href="https://www.twitter.com"><span><i class="fa fa-twitter"></i></span></a>
             <a href="https://www.youtube.com"><span><i class="fa fa-youtube"></i></span></a>
             <a href="https://www.linkedin.com"><span><i class="fa fa-linkedin"></i></span></a>
           </div>
          </section>
        </div>
        <div class="col-lg-2 col-sm-6">
          <!-- Customer Info-->
          <div class="widget widget-links widget-light-skin">
            <h3 class="widget-title">Company Info</h3>
           <ul>
                              <li><a href="{{url('/')}}">Home</a></li>
                              <li><a href="{{url('/about_us')}}">About Us</a></li>
                              <li><a href="#">Careers</a></li>
                              <li><a href="{{route('customer.brand-list')}}">Brand List</a></li>
                              <li><a href="#">Affiliates</a></li>
                              <li><a href="{{url('/become-partner')}}">Become Partner</a></li>
                              <li><a href="{{route('vendor.login')}}">Vendor Login</a></li>

                           </ul>
          </div>
        </div>
        <div class="col-lg-2 col-sm-6">
          <!-- Customer Info-->
          <div class="widget widget-links widget-light-skin">
            <h3 class="widget-title">Sources</h3>
           <ul>
                              <li><a href="#">Live Online</a></li>
                              <li><a href="#">Toovem Academy</a></li>
                              <li><a href="{{url('/video-center')}}">Video Center</a></li>
                              <li><a href="#">Documentary Library</a></li>
                                   <li><a href="#">Trade Show</a></li>
                                <li><a href="{{route('customer.blog')}}">Blog</a></li>
                           </ul>
          </div>
        </div>
        <div class="col-lg-2">

            <div class="widget widget-links widget-light-skin">
            <h3 class="widget-title">Support</h3>
          <ul class="text-left">
                              <li><a href="{{url('/contactus')}}">Contact Us</a></li>
                              <li><a href="{{url('/privacy_policy')}}">Privacy Policy</a></li>
                              <li><a href="{{url('/return_policy')}}">Return Policy</a></li>
                              <li><a href="{{url('/shipping_policy')}}">Shipping Policy</a></li>
                            <li><a href="{{url('/term_conditions')}}">Terms &amp; Conditions</a></li>
                           </ul>

          </div>
          </div>
          <div class="col-lg-3 col-sm-6">
          <!-- Customer Info-->
          <div class="widget widget-links widget-light-skin">
            <h3 class="widget-title">Deals</h3>
          <ul>
                              <li><a href="#">New User Only</a></li>
                              <li><a href="#">Deal of the Day</a></li>
                              <li><a href="#">Clearance</a></li>
                              <li><a href="#">Commercial Packs</a></li>
                           </ul>
                           <div class="pt-3"><img class="d-block gateway_image" src="{{asset('assets/img/payments.png')}}" style="width:100%;"></div>
          </div>
        </div>
      </div>
       </div>
      <!-- Copyright-->
<div class="footer__copyright">
            <div class="footer__copyright__text">
               <p>
                  Copyright @2022 Toovem. All Rights Reserved, Designed and Developed by <a href="https://www.netkingtechnologies.com/" target="_blank">Top Website Development Company India </a>
               </p>
            </div>
         </div>


  </footer>


<div class="chats">
  <a href=""><img src="{{asset('assets/img/chat.png')}}"></a>
</div>
  <!-- JS
  ============================================ -->
  <!-- jQuery JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="{{asset('assets/js/vendor/jquery.min.js')}}"></script>

  <!-- Popper JS -->
  <script src="{{asset('assets/js/popper.min.js')}}"></script>

  <!-- Bootstrap JS -->
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

  <!-- Plugins JS -->
  <script src="{{asset('assets/js/plugins.js')}}"></script>

  <!-- Main JS -->
  <script src="{{asset('assets/js/main.js')}}"></script>
   <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

  <!-- Revolution Slider JS -->
  <script src="{{asset('assets/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
  <script src="{{asset('assets/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
  <script src="{{asset('assets/revolution/revolution-active.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
  <script type="text/javascript"
    src="{{asset('assets/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
  <script type="text/javascript" src="{{env('GOOGLE_MAP_SRC')}}"></script>
  <script src="{{asset('assets/js/typeahead.bundle.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap-tagsinput.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> --}}

<script type="text/javascript">


$(document).ready(function(){

    $('#search-product').keyup(function(){
        var _this = $(this);
       var query = _this.val();
       var category = $('.s-category option:selected').val();
       if(query != '')
       {
        var _token = "{{ csrf_token() }}";
        $.ajax({
         url:"{{ route('customer.autocomplete') }}",
         method:"POST",
         data:{ _token:_token,title:query, category:category},
         success:function(data){
          $('#searchList').fadeIn();
          $('#searchList').html(data.form);
          $('#search_frm').attr('action',data.url);
         }
        });
       }
       else
       {
         $('#searchList').html('');
         $('#searchList').fadeOut();
         $('#search_frm').attr('action','');
       }
    });

//    $(document).on('click', '#searchList ul li', function(){
//        var _this=$(this);
//        var id=_this.attr('data-id');
//        $('#search-product').val($(this).text());
//        $('#searchList').fadeOut();

//        $('.p_id').val(id);
//    });

});

   $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var objectSelect = $("#growtop");
        var objectPosition = objectSelect.offset().top;
        if (scroll > objectPosition) {
            $(".addgrow").addClass("grow");
        } else {
            $(".addgrow").removeClass("grow");
        }
    });

  $('.hero__categories__all').click(function(){
    $(this).next('ul').toggle();
  });

 $(".join_slider").owlCarousel({
        loop: true,
        margin: 30,
        items: 3,
        dots: true,
        nav: true,
        navText: ["<span class='fa fa-long-arrow-left'><span/>", "<span class='fa fa-long-arrow-right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {

            0: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 3,
            }
        }
 });

    $(document).ready(function(){
        $(document).on('click','.add_wishlist',function(){
            var _this = $(this);
            var id = _this.attr('data-id');
            $.ajax({
                type:'POST',
                url: "{{route('customer.wishlist.add')}}",
                data: {"_token": "{{ csrf_token() }}",'id':id},
                success: function (response) {
                    if(response.success == true)
                    {
                        _this.addClass('disabled-link');
                        _this.html('<i class="ion-android-favorite"></i>');
                        $('.wish_cnt').html(response.count);
                    }
                    else
                    {

                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    // alert("Error: " + errorThrown);
                }
            });
        });

        //on change country
        $(document).on('change','.country',function(){
            var id = $(this).val();
            $.ajax({
                    type:"post",
                    url:"{{route('customer.getstate')}}",
                    data:{'country_id':id,"_token": "{{ csrf_token() }}"},
                    success:function(data)
                    {
                        $(".state").empty();
                        $(".state").html('<option>--Select--</option>');

                        $(".city").empty();
                        $(".city").html('<option value="">--Select--</option>');
                        $.each(data,function(key,value){
                        $(".state").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
                });
        });

        // on change state
        $(document).on('change','.state',function(){
            var id = $(this).val();
            $.ajax({
                    type:"post",
                    url:"{{route('customer.getcity')}}",
                    data:{'state_id':id,"_token": "{{ csrf_token() }}"},
                    success:function(data)
                    {
                        $(".city").empty();
                        $(".city").html('<option value="">--Select--</option>');
                        $.each(data,function(key,value){
                            $(".city").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }

                });
        });

        $(document).on('submit', 'form#bill_add_frm', function (event) {
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
                            $('.submit').html('Submit');
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

        $(document).on('submit', 'form#bill_edit_frm', function (event) {
                    event.preventDefault();
                    //clearing the error msg
                    $('p.error-container').html("");

                    var form = $(this);
                    var data = new FormData($(this)[0]);
                    var url = form.attr("action");
                    var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
                    $('.btn-disable').attr('disabled',true);
                    if ($('.update').html() !== loadingText) {
                        $('.update').html(loadingText);
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
                                $('.update').html('Update');
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

        $(document).on('submit', 'form#accountfrm', function (event) {
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

        $(document).on('submit', 'form#changepassfrm', function (event) {
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
                            window.location = '{{url("/")}}';
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

//  var path = "{{route('customer.autocomplete')}}";
//     $('input.search').typeahead({
//         source:  function (search, process) {
//         return $.get(path, { search: search }, function (data) {
//         //alert(data);
//                 return process(data);
//             });
//         }
//     });



  function initialize() {
      var input = document.getElementById('location_add');

      var input1 = document.getElementById('location_edit');

      var autocomplete = new google.maps.places.Autocomplete(input);

      var autocomplete1 = new google.maps.places.Autocomplete(input1);

         google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            // console.log(place);
            document.getElementById('geo_city_add').value = place.name;
            document.getElementById('geo_addr_add').value = place.formatted_address;
            document.getElementById('geo_lat_add').value = place.geometry.location.lat();
            document.getElementById('geo_long_add').value = place.geometry.location.lng();
         });

         google.maps.event.addListener(autocomplete1, 'place_changed', function () {
            var place = autocomplete1.getPlace();
            // console.log(place);
            document.getElementById('geo_city_edit').value = place.name;
            document.getElementById('geo_addr_edit').value = place.formatted_address;
            document.getElementById('geo_lat_edit').value = place.geometry.location.lat();
            document.getElementById('geo_long_edit').value = place.geometry.location.lng();
         });
      }
      google.maps.event.addDomListener(window, 'load', initialize);

      $(document).on('click', '.compareproduct', function(){
            var product_id = $(this).attr('rel');
            $.ajax({
                method: 'post',
                url: "{{route('addtocompare')}}",
                data:{'product_id':product_id,"_token": "{{ csrf_token() }}"},
                success: function(res){
                    if(res.success==false)
                    {
                        swal({
                            title: "You Can Include Atmost 2 Products to Compare !!",
                            text: '',
                            type: 'warning',
                            buttons: true,
                            dangerMode: true,
                            confirmButtonColor:'#92318B'
                        });
                    }
                    else if(res.success)
                    {
                        $('.compare_cnt').html(res.count);
                    }
                }
            });
      });

      $(document).on('click', '.remove-compare', function (event) {
        var id = $(this).attr('rel');

        swal({
            // icon: "warning",
            type: "warning",
            title: "Are you sure want to remove this product to compare ?",
            text: "",
            dangerMode: true,
            showCancelButton: true,
            confirmButtonColor: "#92318B",
            confirmButtonText: "YES",
            cancelButtonText: "CANCEL",
            closeOnConfirm: false,
            closeOnCancel: false
            },
            function(e){
               if(e==true)
               {
                $.ajax({
                           type:'POST',
                           url: "{{route('removeCompare')}}",
                           data: {"_token" : "{{ csrf_token() }}",'product_id':id},
                           success: function (res) {
                            if(res.success==true)
                            {
                                window.location.reload();
                            }
                            swal.close();
                           },
                           error: function (xhr, textStatus, errorThrown) {
                              // alert("Error: " + errorThrown);
                           }
                        });
               }
               else
               {
                    swal.close();
               }
            }
        );

      });

</script>

</body>
</html>
