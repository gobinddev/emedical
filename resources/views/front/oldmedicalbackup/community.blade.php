@include('layouts.front.header')
@php
    use App\Helpers\Helper;
@endphp
<img src="{{ asset('assets/img/comunity.png') }}" style="width:100%;">

<section class="comunitypage">
    <div class="container">

        <div class="mcontainer">
            <div class="row lg:flex  lg:space-x-12">
                <div class="col-lg-8 lg:w-3/4">
                    <div class="flex justify-between items-center relative md:mb-4 mb-3">
                        <div class="flex-1">
                            <h2 class="text-2xl font-semibold"> Explore our Questions </h2>
                            <nav class="responsive-nav md:m-0 -mx-4 style-2" role="tablist">
                                <ul>
                                    <li><a href="#most_interest" class="active lg:px-2" data-toggle="tab">Most Interesting</a>
                                    </li>
                                    <li><a href="#featured" class="lg:px-2" data-toggle="tab"> Featured </a></li>
                                    <li><a href="#past_week" class="lg:px-2" data-toggle="tab"> Past Week </a></li>
                                    <li><a href="#past_month" class="lg:px-2" data-toggle="tab"> Past Month</a></li>
                                    {{-- <li><a href="#" class="lg:px-2"> Coming </a></li> --}}
                                </ul>
                            </nav>
                        </div>

                    </div>
                    <div class="tab-content" id="myaccountContent">
                        <div class="tab-pane fade show active" id="most_interest" role="tabpanel">
                            <div class="card divide-y divide-gray-100 px-4">

                                @forelse($topics as $topic)
                                    @php
                                        $topic_like = null;

                                        if (Auth::guard('customer')->check()) {
                                            $topic_like = Helper::get_topic_like_status($topic->id, Auth::guard('customer')->user()->id);
                                        }

                                        $topic_tag = Helper::get_topic_tag($topic->id);

                                        $tag_count = 0;

                                        if ($topic_tag != null) {
                                            $tag_arr = [];

                                            $tag_arr = explode(',', $topic_tag->tag_id);

                                            $tag_count = count($tag_arr);
                                        }
                                    @endphp
                                    <div class="lg:flex lg:space-x-6 itembrop py-4 ">
                                        @php
                                            $url = asset('assets/img/no-image-icon.png');
                                            $product_t = Helper::get_product_thumbnail_image($topic->product_id);
                                            if ($product_t != null) {
                                                $url = asset('uploads/products/image/' . $product_t->file_name);
                                            }
                                        @endphp
                                        <a
                                            href="{{ route('customer.community-detail', ['id' => Crypt::encryptString($topic->id)]) }}">
                                            <div class="lg:w-60 relative leftblogs">
                                                <img src="{{ $url }}" alt="" class="w-full">
                                            </div>
                                        </a>
                                        <div class="flex-1 lg:pt-0 marleop">
                                            <a href="{{ route('customer.community-detail', ['id' => Crypt::encryptString($topic->id)]) }}"
                                                class="blogtile">{{ $topic->title }}</a>
                                            <p class="line-clamp-2 pt-3">{!! $topic->body !!}</p>
                                            <div class="flex sedopw items-center">
                                                <div class="flex items-center cursor-pointer">
                                                                    @auth('customer')
                                                                        <span class="like_btn"
                                                                            data-id="{{ Crypt::encryptString($topic->id) }}">
                                                                            @if ($topic_like != null && $topic_like->status == 1)
                                                                                <i class="fa fa-thumbs-up mr-2"></i>
                                                                            @else
                                                                                <i class="fa fa-thumbs-o-up mr-2"></i>
                                                                            @endif
                                                                        </span>
                                                                    @else
                                                                        <i class="fa fa-thumbs-o-up mr-2"></i>
                                                                    @endif
                                                    <span class="like_count">{{ count(Helper::get_topic_likes($topic->id)) }}</span>
                                                </div>
                                                <div class="flex items-center mx-4">
                                                    <i class="fa fa-comments-o mr-2"></i>{{ count(Helper::get_all_topic_comments($topic->id)) }}
                                                </div>
                                                <div class="flex items-center">
                                                    <i class="fa fa-bookmark-o mr-2"></i>{{ $tag_count }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="lg:flex lg:space-x-6 itembrop py-4 ">
                                        No Topics Available
                                    </div>
                                @endforelse


                                {{-- <div class="lg:flex lg:space-x-6 itembrop py-4 ">
                                    <a href="blog-read.html">
                                        <div class="lg:w-60 relative leftblogs">
                                            <img src="{{asset('assets/img/reg1.png')}}" alt="" class="w-full">
                                        </div>
                                    </a>
                                    <div class="flex-1 lg:pt-0 marleop">
                                        <a href="" class="blogtile">HD55 is running continuously: panel says 58%, separate device is measuring 45%?</a>
                                        <p class="line-clamp-2 pt-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat </p>
                                        <div class="flex sedopw items-center">
                                                <div class="flex items-center">
                                                <i class="fa fa-thumbs-o-up mr-2"></i>12</div>
                                                <div class="flex items-center mx-4">
                                                    <i class="fa fa-comments-o mr-2"></i>12</div>
                                                <div class="flex items-center">
                                                    <i class="fa fa-bookmark-o mr-2"></i>12</div>
                                            </div>
                                    </div>
                                </div>

                                <div class="lg:flex lg:space-x-6 itembrop py-4 ">
                                    <a href="blog-read.html">
                                        <div class="lg:w-60 relative leftblogs">
                                            <img src="{{asset('assets/img/reg2.png')}}" alt="" class="w-full">
                                        </div>
                                    </a>
                                    <div class="flex-1 lg:pt-0 marleop">
                                <a href="" class="blogtile">Puddle beneath HDi65 dehumidifier</a>
                                        <p class="line-clamp-2 pt-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat </p>
                                    <div class="flex sedopw items-center">
                                            <div class="flex items-center">
                                            <i class="fa fa-thumbs-o-up mr-2"></i>12</div>
                                            <div class="flex items-center mx-4">
                                                <i class="fa fa-comments-o mr-2"></i>12</div>
                                            <div class="flex items-center">
                                                <i class="fa fa-bookmark-o mr-2"></i>12</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="lg:flex lg:space-x-6 itembrop py-4 ">
                                    <a href="blog-read.html">
                                        <div class="lg:w-60 relative leftblogs">
                                            <img src="{{asset('assets/img/reg3.png')}}" alt="" class="w-full">
                                        </div>
                                    </a>
                                    <div class="flex-1 lg:pt-0 marleop">
                                <a href="" class="blogtile">Question on Definition of Fields in your App (IOS)</a>
                                        <p class="line-clamp-2 pt-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat </p>
                                    <div class="flex sedopw items-center">
                                            <div class="flex items-center">
                                            <i class="fa fa-thumbs-o-up mr-2"></i>12</div>
                                            <div class="flex items-center mx-4">
                                                <i class="fa fa-comments-o mr-2"></i>12</div>
                                            <div class="flex items-center">
                                                <i class="fa fa-bookmark-o mr-2"></i>12</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:flex lg:space-x-6 itembrop py-4 ">
                                    <a href="blog-read.html">
                                        <div class="lg:w-60 relative leftblogs">
                                            <img src="{{asset('assets/img/reg4.png')}}" alt="" class="w-full">
                                        </div>
                                    </a>
                                    <div class="flex-1 lg:pt-0 marleop">
                                <a href="" class="blogtile">Can this dehumidifier operate at low temperatures?</a>
                                        <p class="line-clamp-2 pt-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat </p>
                                    <div class="flex sedopw items-center">
                                            <div class="flex items-center">
                                            <i class="fa fa-thumbs-o-up mr-2"></i>12</div>
                                            <div class="flex items-center mx-4">
                                                <i class="fa fa-comments-o mr-2"></i>12</div>
                                            <div class="flex items-center">
                                                <i class="fa fa-bookmark-o mr-2"></i>12</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:flex lg:space-x-6 itembrop py-4 ">
                                    <a href="blog-read.html">
                                        <div class="lg:w-60 relative leftblogs">
                                            <img src="{{asset('assets/img/reg5.png')}}" alt="" class="w-full">
                                        </div>
                                    </a>
                                    <div class="flex-1 lg:pt-0 marleop">
                                <a href="" class="blogtile">HD55 runs occasionally even tho air is dry.</a>
                                        <p class="line-clamp-2 pt-3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat </p>
                                    <div class="flex sedopw items-center">
                                            <div class="flex items-center">
                                            <i class="fa fa-thumbs-o-up mr-2"></i>12</div>
                                            <div class="flex items-center mx-4">
                                                <i class="fa fa-comments-o mr-2"></i>12</div>
                                            <div class="flex items-center">
                                                <i class="fa fa-bookmark-o mr-2"></i>12</div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row column align-center">
                                    {{-- <ul class="pagination pagination-circular">
                                    <li class="disabled">«</li>
                                    <li class="current">1</li>
                                    <li><a href="#" aria-label="Page 2">2</a></li>
                                    <li><a href="#" aria-label="Page 3">3</a></li>
                                    <li><a href="#" aria-label="Page 4">4</a></li>
                                    <li><a href="#" aria-label="Page 5">5</a></li>
                                    <li><a href="#" aria-label="Next page">»</a></li>
                                    </ul> --}}
                                    <div class="col-12">
                                        <div class="paging_simple_numbers">
                                            {!! $topics->render() !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="featured" role="tabpanel">
                            <div class="card divide-y divide-gray-100 px-4">

                                @forelse($featured_topics as $topic)
                                    @php
                                        $topic_like = null;

                                        if (Auth::guard('customer')->check()) {
                                            $topic_like = Helper::get_topic_like_status($topic->id, Auth::guard('customer')->user()->id);
                                        }

                                        $topic_tag = Helper::get_topic_tag($topic->id);

                                        $tag_count = 0;

                                        if ($topic_tag != null) {
                                            $tag_arr = [];

                                            $tag_arr = explode(',', $topic_tag->tag_id);

                                            $tag_count = count($tag_arr);
                                        }
                                    @endphp
                                    <div class="lg:flex lg:space-x-6 itembrop py-4 ">
                                        @php
                                            $url = asset('assets/img/no-image-icon.png');
                                            $product_t = Helper::get_product_thumbnail_image($topic->product_id);
                                            if ($product_t != null) {
                                                $url = asset('uploads/products/image/' . $product_t->file_name);
                                            }
                                        @endphp
                                        <a
                                            href="{{ route('customer.community-detail', ['id' => Crypt::encryptString($topic->id)]) }}">
                                            <div class="lg:w-60 relative leftblogs">
                                                <img src="{{ $url }}" alt="" class="w-full">
                                            </div>
                                        </a>
                                        <div class="flex-1 lg:pt-0 marleop">
                                            <a href="{{ route('customer.community-detail', ['id' => Crypt::encryptString($topic->id)]) }}"
                                                class="blogtile">{{ $topic->title }}</a>
                                            <p class="line-clamp-2 pt-3">{!! $topic->body !!}</p>
                                            <div class="flex sedopw items-center">
                                                <div class="flex items-center cursor-pointer">
                                                                    @auth('customer')
                                                                        <span class="like_btn"
                                                                            data-id="{{ Crypt::encryptString($topic->id) }}">
                                                                            @if ($topic_like != null && $topic_like->status == 1)
                                                                                <i class="fa fa-thumbs-up mr-2"></i>
                                                                            @else
                                                                                <i class="fa fa-thumbs-o-up mr-2"></i>
                                                                            @endif
                                                                        </span>
                                                                    @else
                                                                        <i class="fa fa-thumbs-o-up mr-2"></i>
                                                                    @endif
                                                    <span class="like_count">{{ count(Helper::get_topic_likes($topic->id)) }}</span>
                                                </div>
                                                <div class="flex items-center mx-4">
                                                    <i class="fa fa-comments-o mr-2"></i>{{ count(Helper::get_all_topic_comments($topic->id)) }}
                                                </div>
                                                <div class="flex items-center">
                                                    <i class="fa fa-bookmark-o mr-2"></i>{{ $tag_count }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="lg:flex lg:space-x-6 itembrop py-4 ">
                                        No Topics Available
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane" id="past_week" role="tabpanel">
                            <div class="card divide-y divide-gray-100 px-4">

                                @forelse($past_weeks as $topic)
                                    @php
                                        $topic_like = null;

                                        if (Auth::guard('customer')->check()) {
                                            $topic_like = Helper::get_topic_like_status($topic->id, Auth::guard('customer')->user()->id);
                                        }

                                        $topic_tag = Helper::get_topic_tag($topic->id);

                                        $tag_count = 0;

                                        if ($topic_tag != null) {
                                            $tag_arr = [];

                                            $tag_arr = explode(',', $topic_tag->tag_id);

                                            $tag_count = count($tag_arr);
                                        }
                                    @endphp
                                    <div class="lg:flex lg:space-x-6 itembrop py-4 ">
                                        @php
                                            $url = asset('assets/img/no-image-icon.png');
                                            $product_t = Helper::get_product_thumbnail_image($topic->product_id);
                                            if ($product_t != null) {
                                                $url = asset('uploads/products/image/' . $product_t->file_name);
                                            }
                                        @endphp
                                        <a
                                            href="{{ route('customer.community-detail', ['id' => Crypt::encryptString($topic->id)]) }}">
                                            <div class="lg:w-60 relative leftblogs">
                                                <img src="{{ $url }}" alt="" class="w-full">
                                            </div>
                                        </a>
                                        <div class="flex-1 lg:pt-0 marleop">
                                            <a href="{{ route('customer.community-detail', ['id' => Crypt::encryptString($topic->id)]) }}"
                                                class="blogtile">{{ $topic->title }}</a>
                                            <p class="line-clamp-2 pt-3">{!! $topic->body !!}</p>
                                            <div class="flex sedopw items-center">
                                                <div class="flex items-center cursor-pointer">
                                                    @auth('customer')
                                                        <span class="like_btn"
                                                            data-id="{{ Crypt::encryptString($topic->id) }}">
                                                            @if ($topic_like != null && $topic_like->status == 1)
                                                                <i class="fa fa-thumbs-up mr-2"></i>
                                                            @else
                                                                <i class="fa fa-thumbs-o-up mr-2"></i>
                                                            @endif
                                                        </span>
                                                    @else
                                                        <i class="fa fa-thumbs-o-up mr-2"></i>
                                                    @endif
                                                    <span class="like_count">{{ count(Helper::get_topic_likes($topic->id)) }}</span>
                                                </div>
                                                <div class="flex items-center mx-4">
                                                    <i class="fa fa-comments-o mr-2"></i>{{ count(Helper::get_all_topic_comments($topic->id)) }}
                                                </div>
                                                <div class="flex items-center">
                                                    <i class="fa fa-bookmark-o mr-2"></i>{{ $tag_count }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="lg:flex lg:space-x-6 itembrop py-4 ">
                                        No Topics Available
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane" id="past_month" role="tabpanel">
                            <div class="card divide-y divide-gray-100 px-4">

                                @forelse($past_months as $topic)
                                    @php
                                        $topic_like = null;

                                        if (Auth::guard('customer')->check()) {
                                            $topic_like = Helper::get_topic_like_status($topic->id, Auth::guard('customer')->user()->id);
                                        }

                                        $topic_tag = Helper::get_topic_tag($topic->id);

                                        $tag_count = 0;

                                        if ($topic_tag != null) {
                                            $tag_arr = [];

                                            $tag_arr = explode(',', $topic_tag->tag_id);

                                            $tag_count = count($tag_arr);
                                        }
                                    @endphp
                                    <div class="lg:flex lg:space-x-6 itembrop py-4 ">
                                        @php
                                            $url = asset('assets/img/no-image-icon.png');
                                            $product_t = Helper::get_product_thumbnail_image($topic->product_id);
                                            if ($product_t != null) {
                                                $url = asset('uploads/products/image/' . $product_t->file_name);
                                            }
                                        @endphp
                                        <a
                                            href="{{ route('customer.community-detail', ['id' => Crypt::encryptString($topic->id)]) }}">
                                            <div class="lg:w-60 relative leftblogs">
                                                <img src="{{ $url }}" alt="" class="w-full">
                                            </div>
                                        </a>
                                        <div class="flex-1 lg:pt-0 marleop">
                                            <a href="{{ route('customer.community-detail', ['id' => Crypt::encryptString($topic->id)]) }}"
                                                class="blogtile">{{ $topic->title }}</a>
                                            <p class="line-clamp-2 pt-3">{!! $topic->body !!}</p>
                                            <div class="flex sedopw items-center">
                                                <div class="flex items-center cursor-pointer">
                                                    @auth('customer')
                                                        <span class="like_btn"
                                                            data-id="{{ Crypt::encryptString($topic->id) }}">
                                                            @if ($topic_like != null && $topic_like->status == 1)
                                                                <i class="fa fa-thumbs-up mr-2"></i>
                                                            @else
                                                                <i class="fa fa-thumbs-o-up mr-2"></i>
                                                            @endif
                                                        </span>
                                                    @else
                                                        <i class="fa fa-thumbs-o-up mr-2"></i>
                                                    @endif
                                                    <span class="like_count">{{ count(Helper::get_topic_likes($topic->id)) }}</span>
                                                </div>
                                                <div class="flex items-center mx-4">
                                                    <i class="fa fa-comments-o mr-2"></i>{{ count(Helper::get_all_topic_comments($topic->id)) }}
                                                </div>
                                                <div class="flex items-center">
                                                    <i class="fa fa-bookmark-o mr-2"></i>{{ $tag_count }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="lg:flex lg:space-x-6 itembrop py-4 ">
                                        No Topics Available
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4 lg:w-1/4 w-full flex-shrink-0">
                    <div class="form_relate">
                        @if (count($featured_questions) > 0)
                            <h2 class="text-lg font-semibold mb-3">Featured Questions</h2>
                            <ul class="blogli">
                                @foreach ($featured_questions as $item)
                                    <!-- <li><a href="" class="">HD55 is running continuously: panel says 58%, separate device is measuring 45%?</a></li>
                                <li><a href="" class="">Puddle beneath HDi65 dehumidifier</a></li>
                                <li><a href="" class="">Question on Definition of Fields in your App</a></li>
                                <li><a href="" class="">Can this dehumidifier operate at low temperatures?</a></li>
                                <li><a href="" class="">Sentinel HDi 65 Wifi</a></li> -->
                                    <li><a href="{{ route('customer.community-detail', ['id' => Crypt::encryptString($item->id)]) }}" class="">{{ $item->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                        <br>

                        @if (count($tags) > 0)
                            <h4 class="text-lg font-semibold mb-3"> Tags </h4>

                            <div class="flex tagli flex-wrap gap-2">
                                <!-- <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> IOS App</a>
                            <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> Puddle</a>
                            <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> HD55</a>
                            <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> Dehumidifier</a>
                            <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> Technolgy</a>
                            <a href="#" class="bg-gray-100 py-1.5 px-4 rounded-full"> Sentinel</a>  -->
                                @foreach ($tags as $tag)
                                    <a href="{{url('/community/?tag_id='.Crypt::encryptString($tag->id))}}" class="bg-gray-100 py-1.5 px-4 rounded-full"> {{ ucwords($tag->name) }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

<script>
    $(document).ready(function() {
        $(document).on('click','.responsive-nav ul li',function(){
            var _this = $(this);
            _this.parent().parent().find('li a').removeClass('active');
            _this.find('a').addClass('active');

        });
        $(document).on('click', '.like_btn', function(e) {
            var _this = $(this);
            var id = _this.attr('data-id');
            $.ajax({
                type: 'POST',
                url: "{{ route('customer.community.like') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': id
                },
                success: function(data) {
                    if (data.success == true) {
                        if (data.status == 0) {
                            _this.html('<i class="fa fa-thumbs-o-up mr-2"></i>');
                        } else if (data.status == 1) {
                            _this.html('<i class="fa fa-thumbs-up mr-2"></i>');
                        }

                        _this.parent().find('.like_count').html(data.count);
                    }
                },
                error: function(xhr, textStatus, errorThrown) {

                }
            });
            e.stopImmediatePropagation();
        });
    });
</script>
@include('layouts.front.footer')
