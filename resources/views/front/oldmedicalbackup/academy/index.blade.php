@include('layouts.front.header')

<div class="main-banner">
                            <div class="d-table">
                                <div class="d-table-cell">
                                    <div class="container">
                                        @if(count($academies)>0)
                                            @foreach ($academies->take(1) as $item)
                                                <div class="main-banner-content">
                                                    <h1>{{$item->title}}</h1>
                                                    <p>{{$item->short_description}}</p>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="featured-services-area">
                                <div class="container">
                                    <div class="row">
                                        @if(count($academies)>0)
                                            {{-- <div class="col-lg-4 col-md-4 col-sm-4 pdn">
                                                <div class="single-featured-services-box">
                                                <img src="{{asset('assets/img/acadmy1.png')}}" style="width:100%;">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 pdn">
                                                <div class="single-featured-services-box">
                                                <img src="{{asset('assets/img/acadmy2.png')}}" style="width:100%;">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 pdn">
                                                <div class="single-featured-services-box">
                                                    <img src="{{asset('assets/img/acadmy3.png')}}" style="width:100%;">
                                                </div>
                                            </div> --}}
                                            @foreach ($academies->take(3) as $item)
                                                @php
                                                    $url = asset('assets/img/no-image-icon.png');
                                                    if($item->thumbnail!=NULL)
                                                    {
                                                        $url = asset('uploads/academy/'.$item->thumbnail);
                                                    }
                                                @endphp
                                                <div class="col-lg-4 col-md-4 col-sm-4 pdn">
                                                    <a href="{{route('customer.academy-detail',['id'=>Crypt::encryptString($item->id)])}}">
                                                        <div class="single-featured-services-box">
                                                            <img src="{{$url}}" style="width:100%;">
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="about-area ptb-110">
                            <div class="container">
                                <div class="row align-items-center">
                                    @if(count($academies)>0)
                                        @foreach ($academies->take(1) as $item)
                                            <div class="col-lg-6 col-md-12">
                                                <div class="about-image">
                                                    @php
                                                        $url = asset('assets/img/no-image-icon.png');
                                                        if($item->thumbnail!=NULL)
                                                        {
                                                            $url = asset('uploads/academy/'.$item->thumbnail);
                                                        }
                                                    @endphp
                                                    {{-- <img src="{{asset('assets/img/about-1.jpg')}}" alt="image">
                                                    <img src="{{asset('assets/img/about-2.jpg')}}" alt="image"> --}}
                                                    <img src="{{$url}}" alt="image">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="about-content">
                                                    <h2>{{$item->title}}</h2>
                                                    <p>{{$item->short_description}}</p>
                                                    <a href="{{route('customer.academy-detail',['id'=>Crypt::encryptString($item->id)])}}" class="btn btn-primary discover">Discover More</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="shape-img1">
                                <img src="{{asset('assets/img/shape-1.png')}}" alt="image">
                            </div>
                            <div class="shape-img2">
                                <img src="{{asset('assets/img/down.svg')}}" alt="image">
                            </div>
                            <div class="shape-img3">
                                <img src="{{asset('assets/img/shape-3.png')}}" alt="image">
                            </div>
                            <div class="shape-img4">
                                <img src="{{asset('assets/img/down.svg')}}" alt="image">
                            </div>
                            <div class="shape-img5">
                                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMiIgaGVpZ2h0PSIyMiIgdmlld0JveD0iMCAwIDIyIDIyIj4NCiAgPGRlZnM+DQogICAgPHN0eWxlPg0KICAgICAgLmNscy0xIHsNCiAgICAgICAgZm9udC1zaXplOiAyNXB4Ow0KICAgICAgICBmaWxsOiAjMjdlYWM4Ow0KICAgICAgICB0ZXh0LWFuY2hvcjogbWlkZGxlOw0KICAgICAgICBmb250LWZhbWlseTogUm9ib3RvOw0KICAgICAgfQ0KICAgIDwvc3R5bGU+DQogIDwvZGVmcz4NCiAgPHRleHQgaWQ9Il8iIGRhdGEtbmFtZT0iKyIgY2xhc3M9ImNscy0xIiB0cmFuc2Zvcm09Im1hdHJpeCgxLjQzNywgMS40MzQsIC0xLjQzNywgMS40MzQsIC0wLjgzMiwgMjMuMDY2KSI+PHRzcGFuIHg9IjAiPis8L3RzcGFuPjwvdGV4dD4NCjwvc3ZnPg0K" alt="image">
                            </div>
                            <div class="shape-img6">
                                <img src="{{asset('assets/img/shape-6.png')}}" alt="image">
                            </div>
                            <div class="dot-shape1">
                                <img src="{{asset('assets/img/dot.png')}}" alt="image">
                            </div>
                            <div class="dot-shape2">
                                <img src="{{asset('assets/img/dot-3.png')}}" alt="image">
                            </div>
                        </div>
                        <div class="services-area bg-f2f6f9 ptb-110">
                            <div class="container">
                                <div class="section-title">
                                    <h3 style="font-weight: 600;">We Offer Professional Solutions</h3>
                                    <br>
                                    <p>Lorem ipsum dolor sit amet</p>
                                </div>
                                <div class="row">
                                    {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="single-services-box">
                                            <div class="icon">
                                                <i class="fa fa-database"></i>
                                            </div>
                                            <h3>
                                                <a href="">Data Analysts</a>
                                            </h3>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="single-services-box">
                                            <div class="icon">
                                                <i class="fa fa-podcast"></i>
                                            </div>
                                            <h3>
                                                <a href="">Automatic Optimization</a>
                                            </h3>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="single-services-box">
                                            <div class="icon">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                            <h3>
                                                <a href="">Security &Surveillance</a>
                                            </h3>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="single-services-box">
                                            <div class="icon">
                                                <i class="fa fa-medkit"></i>
                                            </div>
                                            <h3>
                                                <a href="">Healthcare &Manufacturing</a>
                                            </h3>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="single-services-box">
                                            <div class="icon">
                                                <i class="fa fa-futbol-o"></i>
                                            </div>
                                            <h3>
                                                <a href="">Software Engineers</a>
                                            </h3>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="single-services-box">
                                            <div class="icon">
                                                <i class="fa fa-tachometer"></i>
                                            </div>
                                            <h3>
                                                <a href="">IT Professionals</a>
                                            </h3>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                        </div>
                                    </div> --}}
                                    @if(count($academies)>0)
                                        @foreach ($academies->take(6) as $item)
                                            <div class="col-lg-4 col-md-6 col-sm-6">
                                                <div class="single-services-box">
                                                    <div class="icon">
                                                        @php
                                                            $url = asset('assets/img/no-image-icon.png');
                                                            if($item->thumbnail!=NULL)
                                                            {
                                                                $url = asset('uploads/academy/'.$item->thumbnail);
                                                            }
                                                        @endphp
                                                        {{-- <i class="fa fa-tachometer"></i> --}}
                                                        <img src="{{$url}}" alt="image">
                                                    </div>
                                                    <h3>
                                                        <a href="{{route('customer.academy-detail',['id'=>Crypt::encryptString($item->id)])}}">{{$item->title}}</a>
                                                    </h3>
                                                    <p>{{$item->short_description}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="shape-img2">
                                <img src="{{asset('assets/img/down.svg')}}" alt="image">
                            </div>
                            <div class="shape-img3">
                                <img src="{{asset('assets/img/shape-3.png')}}" alt="image">
                            </div>
                            <div class="shape-img4">
                                <img src="{{asset('assets/img/down.svg')}}" alt="image">
                            </div>
                            <div class="shape-img5">
                                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMiIgaGVpZ2h0PSIyMiIgdmlld0JveD0iMCAwIDIyIDIyIj4NCiAgPGRlZnM+DQogICAgPHN0eWxlPg0KICAgICAgLmNscy0xIHsNCiAgICAgICAgZm9udC1zaXplOiAyNXB4Ow0KICAgICAgICBmaWxsOiAjMjdlYWM4Ow0KICAgICAgICB0ZXh0LWFuY2hvcjogbWlkZGxlOw0KICAgICAgICBmb250LWZhbWlseTogUm9ib3RvOw0KICAgICAgfQ0KICAgIDwvc3R5bGU+DQogIDwvZGVmcz4NCiAgPHRleHQgaWQ9Il8iIGRhdGEtbmFtZT0iKyIgY2xhc3M9ImNscy0xIiB0cmFuc2Zvcm09Im1hdHJpeCgxLjQzNywgMS40MzQsIC0xLjQzNywgMS40MzQsIC0wLjgzMiwgMjMuMDY2KSI+PHRzcGFuIHg9IjAiPis8L3RzcGFuPjwvdGV4dD4NCjwvc3ZnPg0K" alt="image">
                            </div>
                            <div class="shape-img7">
                                <img src="{{asset('assets/img/shape-3.png')}}" alt="image">
                            </div>
                            <div class="dot-shape1">
                                <img src="{{asset('assets/img/dot.png')}}" alt="image">
                            </div>
                            <div class="dot-shape2">
                                <img src="{{asset('assets/img/dot-3.png')}}" alt="image">
                            </div>
                            <div class="dot-shape4">
                                <img src="{{asset('assets/img/dot-4.png')}}" alt="image">
                            </div>
                            <div class="dot-shape5">
                                <img src="{{asset('assets/img/dot-5.png')}}" alt="image">
                            </div>
                            <div class="dot-shape6">
                                <img src="{{asset('assets/img/dot-6.png')}}" alt="image">
                            </div>
                        </div>

                   <div>
                            <!---->
                            <div class="webinar-area">
                                <div class="row m-0">
                                    @if(count($academies)>0)
                                        @foreach ($academies->take(1) as $item)
                                            <div class="col-lg-6 p-0">
                                                <div class="webinar-content">
                                                    <h2>Check out our Latest Webinar</h2>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage.</p>
                                                    <a href="{{route('customer.academy-detail',['id'=>Crypt::encryptString($item->id)])}}" class="btn btn-primary discover">Watch More</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 p-0">
                                                @php
                                                    $url = asset('assets/img/no-image-icon.png');
                                                    if($item->thumbnail!=NULL)
                                                    {
                                                        $url = asset('uploads/academy/'.$item->thumbnail);
                                                    }
                                                @endphp
                                                <div class="webinar-video-image" style="background-image:url({{$url}})">
                                                    <img src="{{$url}}" alt="image">
                                                    @if($item->video!=NULL)
                                                        <div class="video-btn popup-youtube" style="cursor:pointer">
                                                            <i class="fa fa-play"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>


@include('layouts.front.footer')
