@include('layouts.front.header')

	<div class="nothing-found-area bg-404">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="nothing-found-content">
						<h1>Oops!</h1>
						<h1 class="mb-50">Page not found!</h1>
						<p class="direction-page">PLEASE GO BACK TO <a href="{{url('/')}}">homepage</a> </p>
					</div>
				</div>
			</div>
		</div>
	</div>

@include('layouts.front.footer')