
@extends('front.layouts.master')

@section('content')






<!-- Slider Start -->
<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block">
					<div class="divider mb-3"></div>
					<span class="text-uppercase text-sm letter-spacing ">Blood Donate Organiztion</span>
					<h1 class="mb-3 mt-3">Your most trusted Blood Donate Site</h1>
					
					
					<div class="btn-container ">
						<a href="{{route('register')}}" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">Sign Up <i class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-surgeon-alt"></i>
						</div>
						<span>24 Hours Service</span>
						<h4 class="mb-3">Need Blood</h4>
						
						<a href="{{route('login')}}" class="btn btn-main btn-round-full">Login to System</a>
					</div>
				

					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-support"></i>
						</div>
						<span>Emegency Cases</span>
						<h4 class="mb-3"><a href="tel:+8801710000000">+8801710000000</a></h4>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="cta-section ">
	<div class="container">
		<div class="cta position-relative">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-doctor"></i>
						<span class="h3 counter" data-count="{{$total_user_count}}">0</span>
						<p>Total Users</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-flag"></i>
						<span class="h3 counter" data-count="{{$donate_list_count}}">0</span>
						<p>Total Donate</p>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-badge"></i>
						<span class="h3 counter" data-count="{{$post_list_count}}">0</span>
						<p>Total Blood Request</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-globe"></i>
						<span class="h3 counter" data-count="{{$district_cover_count}}">0</span>
						<p>District Covered</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection


    

  