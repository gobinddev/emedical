@include('layouts.front.header')
@php
   use App\Helpers\Helper;
@endphp

<img src="{{asset('assets/img/comunity.png')}}" style="width:100%;">

<section class="comunitypage">
	<div class="container">

<div class="mcontainer">
<div class="row lg:flex  lg:space-x-12">
<div class="col-lg-8 lg:w-3/4">
<div class="card divide-y divide-gray-100 px-4">
    @php
        $url = asset('assets/img/no-image-icon.png');
        $product_t = Helper::get_product_thumbnail_image($topic->product_id);
        if($product_t!=NULL)
        {
            $url = asset('uploads/products/image/'.$product_t->file_name);
        }
    @endphp
<div class="imageser">
  <img src="{{$url}}" style="width:100%;max-height:400px;">
</div>
<div class="sldeope">
  <!-- <h3> <a href="#" class="blogtile">HD55 is running continuously: panel says 58%, device is measuring 45%?</a></h3>
  <p>I installed an HD55 (Energy Star) dehumidifier in my basement 5 days ago and it has been running continuously since then. The panel initially showed a humidity percentage of ~60% and has since dropped to 58%. However, two separate humidity measure devices say the basement is at 45% or 50%. Is the sensor in my unit broken and/or in need of calibration?</p>

<h3>The standard Lorem Ipsum passage, used since</h3>
<br>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
<p>No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure</p> -->
<h3> <a href="#" class="blogtile">{{$topic->title}}</a></h3>
<p>{!! $topic->body !!}</p>
</div>

<div class="blog-details mb-all-40">

                            <div class="comments-area ptb-90">
                               <h3 class="sidebar-header">comments({{count(Helper::get_all_topic_comments($topic->id))}})</h3>
                                <!-- Single Comment Start -->
                                <!-- <div class="author mtb-40">

                                    <div class="single-comment">
                                        <div class="comment-img">
                                            <img src="{{asset('assets/img/avatar.png')}}" alt="blog-comment">
                                        </div>
                                        <div class="comment-desc">
                                            <h6><a href="#">Stuart Smith </a></h6>
                                            <p>But I must explain to you how all this mistaken idea of denouncing sure and ising pain borand I will give you a complete account</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-comment">
                                    <div class="comment-img">
                                        <img src="{{asset('assets/img/avatar.png')}}" alt="comment-img">
                                    </div>
                                    <div class="comment-desc">
                                        <div class="comment-upper d-flex justify-content-between align-items-center">
                                            <div class="comment-title">
                                                <h6><a href="#">robert skue</a></h6>
                                                <span>08 Jan 2020</span>
                                            </div>
                                            <div class="comment-reply">
                                                <a href="#">reply</a>
                                            </div>
                                        </div>
                                        <p>But I must explain to you how all this mistaken idea of denouncing pleasure and ising pain borand I will give you a complete account of the system</p>
                                    </div>
                                </div>

                                <div class="single-comment reply-comment">
                                    <div class="comment-img">
                                        <img src="{{asset('assets/img/avatar.png')}}" alt="comment-img">
                                    </div>
                                    <div class="comment-desc">
                                        <div class="comment-upper d-flex justify-content-between align-items-center">
                                            <div class="comment-title">
                                                <h6><a href="#">rio Santos</a></h6>
                                                <span>08 Jan 2020</span>
                                            </div>
                                            <div class="comment-reply">
                                                <a href="#">reply</a>
                                            </div>
                                        </div>
                                        <p>But I must explain to you how all this mistaken idea this of denounng pleasure and ising pain idea borand I will give you a complete</p>
                                    </div>
                                </div>

                                <div class="single-comment">
                                    <div class="comment-img">
                                        <img src="{{asset('assets/img/avatar.png')}}" alt="comment-img">
                                    </div>
                                    <div class="comment-desc">
                                        <div class="comment-upper d-flex justify-content-between align-items-center">
                                            <div class="comment-title">
                                                <h6><a href="#">steven Santos</a></h6>
                                                <span>08 Jan 2020</span>
                                            </div>
                                            <div class="comment-reply">
                                                <a href="#">reply</a>
                                            </div>
                                        </div>
                                        <p>But I must explain to you how all this mistaken idea of denouncing pleasure and ising pain borand I will give you a complete account of the system</p>
                                    </div>
                                </div> -->
                                <!-- Single Comment End -->
                                @if(count($main_comments)>0)
                                    @foreach($main_comments as $p_comment)
                                        @php
                                            $replies = Helper::get_comment_replies($p_comment->id);
                                        @endphp
                                        <div class="single-comment">
                                            <div class="comment-img">
                                                <img src="{{asset('assets/img/avatar.png')}}" alt="comment-img">
                                            </div>
                                            <div class="comment-desc w-100">
                                                <div class="comment-upper d-flex justify-content-between align-items-center">
                                                    <div class="comment-title">
                                                        <h6><a href="#">{{$p_comment->display_name}}</a></h6>
                                                        <span>{{date('d M Y h:i A',strtotime($p_comment->created_at))}}</span>
                                                    </div>
                                                    @auth('customer')
                                                        <div class="comment-reply reply_btn" data-id="{{Crypt::encryptString($p_comment->id)}}">
                                                            <a href="javascript:;">reply</a>
                                                        </div>
                                                    @endif
                                                </div>
                                                <p>{{$p_comment->comment}}</p>
                                            </div>
                                        </div>
                                        @if(count($replies)>0)
                                            @foreach($replies as $reply)
                                                <div class="single-comment reply-comment">
                                                    <div class="comment-img">
                                                        <img src="{{asset('assets/img/avatar.png')}}" alt="comment-img">
                                                    </div>
                                                    <div class="comment-desc w-100">
                                                        <div class="comment-upper d-flex justify-content-between align-items-center">
                                                            <div class="comment-title">
                                                                <h6><a href="#">{{$reply->display_name}}</a></h6>
                                                                <span>{{date('d M Y h:i A',strtotime($reply->created_at))}}</span>
                                                            </div>
                                                            <!-- <div class="comment-reply">
                                                                <a href="#">reply</a>
                                                            </div> -->
                                                        </div>
                                                        <p>{{$reply->comment}}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </div>

                            <div class="blog-detail-contact">
                                <h3 class="mb-25 sidebar-header contact-header">Leave a Comment</h3>
                                <div class="submit-review">
                                    @auth('customer')
                                        <form method="post" action="{{route('customer.community.postComment')}}" class="row" style="margin: 0px -15px;">
                                            @csrf
                                            <input type="hidden" name="topic_id" value="{{Crypt::encryptString($topic->id)}}">
                                            <!-- <div class="form-group col-sm-6">
                                                <input class="form-control" placeholder="Name" type="text">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <input class="form-control" placeholder="Email" type="email">
                                            </div> -->
                                            <div class="form-group col-sm-12">
                                                <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                                @if($errors->has('message'))
                                                    <div class="error text-danger">
                                                        {{$errors->first('message')}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="submit" class="login-conment">Send Now</button>
                                            </div>
                                        </form>
                                    @else
                                        <div class="form-group col-sm-12">
                                            <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="{{route('customer.login')}}" class="login-conment">Send Now</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- Blog Deatils Contact End -->
                        </div>

</div>
</div>
<div class="col-lg-4 lg:w-1/4 w-full flex-shrink-0">
<div class="form_relate">
@if(count($featured_questions)>0)
<h2 class="text-lg font-semibold mb-3">Featured Questions</h2>
<ul class="blogli">
    @foreach($featured_questions as $item)
  <!-- <li><a href="" class="">HD55 is running continuously: panel says 58%, separate device is measuring 45%?</a></li>
  <li><a href="" class="">Puddle beneath HDi65 dehumidifier</a></li>
   <li><a href="" class="">Question on Definition of Fields in your App</a></li>
  <li><a href="" class="">Can this dehumidifier operate at low temperatures?</a></li>
   <li><a href="" class="">Sentinel HDi 65 Wifi</a></li> -->
   <li><a href="#" class="">{{$item->title}}</a></li>
   @endforeach
</ul>
@endif
<br>

@if(count($tags)>0)
<h4 class="text-lg font-semibold mb-3"> Tags </h4>

<div class="flex tagli flex-wrap gap-2">
<!-- <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> IOS App</a>
<a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> Puddle</a>
<a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> HD55</a>
<a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> Dehumidifier</a>
<a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> Technolgy</a>
<a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> Sentinel</a>  -->
@foreach($tags as $tag)
    <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> {{ucwords($tag->name)}}</a>
@endforeach
</div>
@endif

</div>
</div>
</div>
</div>


	</div>
</section>
<div class="modal fade" id="post_reply_mdl">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <div class="row w-100">
                <div class="col-11">
                <h4 class="modal-title">Leave a Reply </h4>
                </div>
                <div class="col-1">
                <button type="button" class="close btn-disable" style="top: 12px;!important; color: red;" data-dismiss="modal"><small>×</small></button>
                </div>
            </div>
        </div>
        <!-- Modal body -->
        <form method="post" action="{{route('customer.community.postReply')}}" id="post_reply_frm">
        @csrf
            <input type="hidden" name="comment_id" id="comment_id">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="label_name">Message : <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="message"></textarea>
                            <p style="margin-bottom: 2px;" class="text-danger error-container error-message" id="error-message"></p>
                        </div>
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

<script>
    $(document).ready(function(){
      $('.reply_btn').click(function(){
            var _this = $(this);
            var comment_id = _this.attr('data-id');
            $('#comment_id').val(comment_id);
            $("#post_reply_frm")[0].reset();
            $('.form-control').removeClass('border-danger');
            $('.error-container').html('');
            $('.btn-disable').attr('disabled',false);
            $('#post_reply_mdl').modal({
                backdrop: 'static',
                keyboard: false
            });

      });
      $(document).on('submit', 'form#post_reply_frm', function (event) {
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
    });
</script>
@include('layouts.front.footer')
