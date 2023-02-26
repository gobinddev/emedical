@include('layouts.front.header')


        <main>
            <div class="slider-area over-hidden">
                <div class="single-slider page-height3 d-flex align-items-center" data-background="images/bg/product.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 d-flex align-items-center justify-content-center">
                                <div class="page-title mt-10 text-center">
                                    <h2 class="text-capitalize font600 mb-10">Contact us</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center bg-transparent">
                                        <li class="breadcrumb-item"><a class="primary-color" href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active text-capitalize" aria-current="page">Contact us</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="map-area mt-50">
                <div class="container">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.739437128524!2d-112.03815768505712!3d40.6576737793378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87528d869d1ee20d%3A0x335b2f731059605a!2sUSANA%20Amphitheatre!5e0!3m2!1sen!2sbd!4v1608483260130!5m2!1sen!2sbd"></iframe>
                    </div>
                </div>
            </div>
      
            <div class="contact-area">
                <div class="container">
                    <div class="row pb-100">
                        <div class="col-xl-6  col-lg-6  col-md-12  col-sm- col-">
                            <div class="contact-form-left mt-60">
                                <div class="section-title text-left">
                                    <h4 class="c-title mb-35 font600 title d-inline-block position-relative">Our Main Office</h4>
                                    <p class="pt-18 font15 text-uppercase mt-25"><b>JK&S LTD</b> <br>
                                            71-75 SHELTON STREET<br>
                                            COVENT GARDEN<br>
                                            LONDON<br>
                                            WC2H 9JQ<br>
                                            UNITED KINGDOM<br><br>
                                            <b>Company Number: 10122440 </b></p>
                                    <!--<ul class="hot-line d-flex align-items-center mt-25 pb-25">-->
                                    <!--    <li>-->
                                    <!--        <span class="h2-theme-color d-block mr-15"><i class="fal fa-headset"></i></span>-->
                                    <!--    </li>-->
                                    <!--    <li>-->
                                    <!--        <p class="mb-1">Hotline Free 24/24:</p>-->
                                    <!--        <a href="tell:+01500123994" class="light-black-color2 font600">-->
                                    <!--            +01 500 123 994-->
                                    <!--        </a>-->
                                    <!--    </li>-->
                                    <!--</ul>-->
                                </div>
                                <!--<div class="c-contact d-sm-flex">-->
                                <!--    <span class="primary-color pr-1">Address: </span>-->
                                <!--    </br><p>JK&S LTD <br>-->
                                <!--            71-75 SHELTON STREET-->
                                <!--            COVENT GARDEN-->
                                <!--            LONDON-->
                                <!--            WC2H 9JQ-->
                                <!--            UNITED KINGDOM.</p>-->
                                <!--</div>-->
                                <!--<div class="c-email d-sm-flex">-->
                                <!--    <span class="primary-color pr-1">Email: </span>-->
                                <!--    <p>Contact@homesstheme.com</p>-->
                                <!--</div>-->
                                <!--<div class="c-number d-sm-flex">-->
                                <!--    <span class="primary-color pr-1">Number Phone: </span>-->
                                <!--    <p>(800) 123 456 789, (800) 987 654 321</p>-->
                                <!--</div>-->
                                <!--<div class="c-fax d-sm-flex">-->
                                <!--    <span class="primary-color pr-1">Fax: </span>-->
                                <!--    <p>(+100) 123 456 7890 – (+100) 123 456 7891</p>-->
                                <!--</div>-->
                                <!--<div class="c-social-link d-sm-flex align-items-center mt-15">-->
                                <!--    <span class="primary-color d-inline-block pr-10">Social Share:</span>-->
                                <!--    <ul class="social-link d-flex  align-items-center">-->
                                <!--        <li>-->
                                <!--            <a href="#"><i class="fab fa-twitter"></i></a>-->
                                <!--        </li>-->
                                <!--        <li>-->
                                <!--            <a href="#"><i class="fab fa-facebook-f"></i></a>-->
                                <!--        </li>-->
                                <!--        <li>-->
                                <!--            <a href="#"><i class="fab fa-google-plus-g"></i></a>-->
                                <!--        </li>-->
                                <!--        <li>-->
                                <!--            <a href="#"><i class="fab fa-linkedin-in"></i></a>-->
                                <!--        </li>-->
                                <!--    </ul>-->
                                <!--</div>-->
                            </div>
                        </div>
                        <div class="col-xl-6  col-lg-6  col-md-12  col-sm-12 col-12">
                            <div class="contact-form-right mt-60">
                                <h4 class="c-title mb-35 font600 title d-inline-block position-relative">Drop Us A Message</h4>
                                 
                                      <p id="errormessage" class="text-danger"></p>
                                      <div style=" display: none" id="messagesuccess" class="alert alert-success" role="alert">
                                      Enquery has been sent our executive will contact you .
                                      </div>
                                    <div class="contact-form">
                                        <label>Name</label>
                                        <div class="name">
                                            <input type="text" class="form-control primary-bg2 mt-2 py-2" name="r-name" id="name">
                                        </div>
                                         <label class="mt-25">Phone</label>
                                        <div class="phone">
                                            <input type="text" class="form-control primary-bg2 mt-2  py-2" name="phone" id="phone">
                                        </div>
                                        <label class="mt-25">Email</label>
                                        <div class="email">
                                            <input type="email" class="form-control primary-bg2 mt-2  py-2" name="email" id="email">
                                        </div>
                                        <label class="mt-25">Suject</label>
                                        <div class="subject">
                                            <input type="text" class="form-control primary-bg2 mt-2  py-2" name="subject" id="subject">
                                        </div>
                                        <label class="mt-25">Your Message</label>
                                        <textarea name="message" class="form-control primary-bg2 mt-2 pt-30 pb-30" id="message"></textarea>
                                    </div>
                                    <button class="web-btn h2-theme-border1 d-inline-block text-capitalize white mt-40 rounded-0 h2-theme-color h2-theme-bg position-relative over-hidden pl-60 pr-60 ptb-17 btnsave">send message</button>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        
@include('layouts.front.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    
    $(document).ready(function(){
      
      $(".btnsave").click(function()
      {
        var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();
         var subject = $('#subject').val();
        var phone = $('#phone').val();
        if(name !='' && email !='' && phone !='' && subject !=''){
         $.ajax({
             type:'post',
             url:"{{Url('postcontact_us')}}",
             datatype:'json',
             data:{_token:'{{csrf_token()}}',name:name,email,email,message:message},
             success:function(response)
             {
                 $("#messagesuccess").show();
             },
             error:function(response)
             {
                 $("#errormessage").text('Ooh Sorry enquery failed');
             }
         });
            
        }
         else{
            
             $("#errormessage").text('please fill details in form all feilds required *');
         }
      });
    });
</script>