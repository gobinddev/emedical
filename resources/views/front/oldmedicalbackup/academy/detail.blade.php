@include('layouts.front.header')

<div class="main-banner">
                            <div class="d-table">
                                <div class="d-table-cell">
                                    <div class="container">
                                        <div class="main-banner-content">
                                            <h1>{{$academy->title}} </h1>
                                            <p>{{$academy->short_description}}</p>
                                        </div>
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




<div class="services-details-area ptb-110">
   <div class="container">
      {{-- <div class="services-details-overview">
         <div class="services-details-desc">
            <h3>Incredible Infrastructure</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer.</p>
            <p>Took a galley of type and scrambled it to make a type specimen book. survived not only five centuries, but also the leap into electronic remaining. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer when an unknown.</p>
         </div>
         <div class="services-details-image"><img src="{{asset('assets/img/services-details.jpg')}}" alt="image"></div>
      </div>
      <div class="services-details-overview">
         <div class="services-details-image"><img src="{{asset('assets/img/services-details-2.jpg')}}" alt="image"></div>
         <div class="services-details-desc">
            <h3>Information Retrieval</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer.</p>
            <p>Took a galley of type and scrambled it to make a type specimen book. survived not only five centuries, but also the leap into electronic remaining. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer when an unknown.</p>
         </div>
      </div> --}}
      {!! $academy->description !!}
   </div>
</div>


@include('layouts.front.footer')
