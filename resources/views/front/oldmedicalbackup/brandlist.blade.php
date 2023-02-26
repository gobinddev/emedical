@include('layouts.front.header')
@php
use App\Helpers\Helper;
$b_url = asset('assets/images/inners1.png');
@endphp
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70" style="background-image: url({{$b_url}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">Brand</h1>

                    <!--=======  breadcrumb list  =======-->

                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">Brand</li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->

                </div>
            </div>
        </div>
    </div>
<section class="brandlist">
    <div class="container">
        <div class="customers-partner-list">
<!-- <div class="partner-item">
    <div class="partner-image">
        <img src="assets/img/clientlogo1.png" alt="image">
    </div>
</div>

<div class="partner-item">
      <div class="partner-image">
        <img src="assets/img/clientlogo2.png" alt="image">
    </div>
</div>

    <div class="partner-item">
    <div class="partner-image">
        <img src="assets/img/clientlogo3.png" alt="image">
    </div>
</div>

    <div class="partner-item">
    <div class="partner-image">
        <img src="assets/img/clientlogo4.png" alt="image">
    </div>
</div>


    <div class="partner-item">
    <div class="partner-image">
        <img src="assets/img/clientlogo5.png" alt="image">
    </div>
</div>


    <div class="partner-item">
    <div class="partner-image">
        <img src="assets/img/clientlogo6.png" alt="image">
    </div>
</div>


    <div class="partner-item">
    <div class="partner-image">
        <img src="assets/img/clientlogo7.png" alt="image">
    </div>
    </div>

<div class="partner-item">
      <div class="partner-image">
        <img src="assets/img/clientlogo2.png" alt="image">
    </div>
</div>

    <div class="partner-item">
    <div class="partner-image">
        <img src="assets/img/clientlogo3.png" alt="image">
    </div>
</div>

    <div class="partner-item">
    <div class="partner-image">
        <img src="assets/img/clientlogo4.png" alt="image">
    </div>
</div>


    <div class="partner-item">
    <div class="partner-image">
        <img src="assets/img/clientlogo5.png" alt="image">
    </div>
</div>


    <div class="partner-item">
    <div class="partner-image">
        <img src="assets/img/clientlogo6.png" alt="image">
    </div>
</div>


    <div class="partner-item">
    <div class="partner-image">
        <img src="assets/img/clientlogo7.png" alt="image">
    </div>
    </div>

<div class="partner-item">
    <div class="partner-image">
        <img src="assets/img/clientlogo6.png" alt="image">
    </div>
</div>


    <div class="partner-item">
    <div class="partner-image">
        <img src="assets/img/clientlogo7.png" alt="image">
    </div>
    </div> -->
    @if(count($brands)>0)
        @foreach($brands as $brand)
            <div class="partner-item">
                <div class="partner-image">
                    <a href="{{url('brand-promotion',['id'=>Crypt::encryptString($brand->id)])}}"><img src="{{asset('uploads/brands/'.$brand->logo)}}" alt="image"></a>
                </div>
            </div>
        @endforeach
    @endif

</div>

<!-- <div class="allbarand">
    <button class="btn viewsl">View All Brand</button>
</div> -->
        </div>

</section>

@include('layouts.front.footer')
