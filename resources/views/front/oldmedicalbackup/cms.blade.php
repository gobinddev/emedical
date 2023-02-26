@include('layouts.front.header')


<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100" style="background-image: url(assets/images/inners.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">{{$cms->title}}</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="{{url('/')}}">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">{{$cms->title}}</li>
					</ul>

					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>


	<div class="about-page-content mb-100 mb-sm-45">
		<div class="container wide">

			<div class="row">


				<div class="col-xl-12 col-lg-12 col-md-12 mb-sm-50">

					<div class="about-page-text">
						{!! $cms->description !!}
					</div>

				</div>
			</div>
		</div>
	</div>

	<!--=====  End of about two page content  ======-->

@include('layouts.front.footer')
