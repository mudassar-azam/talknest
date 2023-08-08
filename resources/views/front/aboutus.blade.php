@extends('layouts.front.main')
@section('content')
	<!-- Page Title -->
    <section class="page-title" style="background-image:url(assets/images/background/5.jpg)">
        <div class="auto-container">
			<h2>About Us</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="{{('/')}}">Home</a></li>
				<li>About Us</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- About One / Style Two -->
	<section class="about-one style-two" style="background-image:url(assets/images/background/pattern-1.png)">
		<div class="auto-container">
			<div class="about-one-inner_container">
				<div class="row clearfix">

					<!-- Content Column -->
					<div class="about-one_content-column col-lg-7 col-md-12 col-sm-12">
						<div class="about-one_content-inner">
							<!-- Sec Title -->
							<div class="sec-title">
								<div class="sec-title_title">Our Story</div>
								<h2 class="sec-title_heading">Our Story</h2>
							</div>
							<div class="about-one_text">Living in the information age means that our lives are constantly impacted by news, and data, that may or may not be true or accurate, transmitted blazingly fast across a mind-blowing array of technology platforms. Recognizing the impact of all the information is a significant challenge. We believe that those who face this challenge and actually do something about it will do better in this digital age than those who don’t. TalkNest is a powerful weapon in the battle for truth and actionable information. It’s a simple, no-BS space to share and discuss what’s happening in our world from the latest national, world, and local news to the swings of ever-moving global markets. Think of TalkNest as your very own platform on which you run a combination newsroom, talk show, and trading desk. Create public or private forums to dive deeply into the news and stocks of the moment and intelligently debate the issues, perspectives, and possibilities that matter most to you, your network, and your bottom line.</div>

						</div>
					</div>

					<!-- Image Column -->
					<div class="about-one_image-column col-lg-5 col-md-12 col-sm-12">
						<div class="about-one_image-inner">
							<div class="about-one_image">
								<img src="{{asset('assets/images/about.jpeg')}}" alt="" />
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- End About One -->



	<!-- Testimonial One -->
	<section class="testimonial-one">
		<div class="auto-container">
			<div class="row clearfix">

				<!-- Carousel Column -->

                <div class="testimonial-one_image-column col-lg-6 col-md-12 col-sm-12">
					<div class="testimonial-one_image-inner">
						<div class="testimonial-one_image">
							<img src="{{asset('assets/images/about2.jpg')}}" alt="" />
						</div>
					</div>
				</div>
				<!-- Image Column -->
                <div class="testimonial-one_carousel-column col-lg-6 col-md-12 col-sm-12">
					<div class="testimonial-one_carousel-inner">
						<div class="single-item-carousel owl-carousel owl-theme">



							<!-- Testimonial Block Three -->
							<div class="testimonial-block_one">
								<div class="testimonial-block_one-inner">
									<div class="testimonial-block_one-text">Debatable “facts.” Omnipresent Disinformation. News-driven market moves. Buy the Rumor, Sell the News.</div>

								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End Testimonial One -->

    	<!-- Team Two -->
	<section class="team-two" style="background-image:url(assets/images/background/pattern-38.jpg)">
		<div class="auto-container">

			<!-- Sec Title -->
			{{-- <div class="sec-title centered">
				<div class="sec-title_title">Team Member</div>
				<h2 class="sec-title_heading">Our Expert Team Member will <br> Help Your Business.</h2>
			</div> --}}


       <div class="row clearfix">

           <!-- News Block -->
		   <div class="container py-5">
                <div class="row pb-5 mb-4 homecards">

                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 py-3">
                        <!-- Card-->
                        <div class="card shadow-sm border-0 rounded">
                            <div class="card-body p-0"><img src="{{asset('assets/images/giphy.gif')}}" alt=""
                                    class="w-100 card-img-top">
                                <div class="p-4" style="height: 135px;">
                                    <h5 class="mb-0">Find compelling investments</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 py-3">
                        <!-- Card-->
                        <div class="card  shadow-sm border-0 rounded">
                            <div class="card-body p-0"><img src="{{asset('assets/images/home/stock5.jpg')}}" alt=""
                                    class="w-100 card-img-top">
                                <div class="p-4" style="height: 135px;">
                                    <h5 class="mb-0">Keep track of your investments</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 py-3">
                        <!-- Card-->
                        <div class="card shadow-sm border-0 rounded">
                            <div class="card-body p-0"><img src="{{asset('assets/images/home/threestock.jpg')}}" alt=""
                                    class="w-100 card-img-top">
                                <div class="p-4" style="height: 135px;">
                                    <h5 class="mb-0">Stay in the know and conversation of your favorite stocks</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 py-3">
                        <!-- Card-->
                        <div class="card shadow-sm border-0 rounded">
                            <div class="card-body p-0"><img src="{{asset('assets/images/home/fourstock.jpg')}}" alt=""
                                    class="w-100 card-img-top">
                                <div class="p-4" style="height: 135px;">
                                    <h5 class="mb-0">Remain updated on price-moving news</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           </div>
		</div>
	</section>
	<!-- End Team Two -->

	{{-- <section class="clients-two style-two">
		<div class="auto-container">
			<!-- Sponsors Carousel -->
			<ul class="sponsors-carousel owl-carousel owl-theme">
				<li class="slide-item"><figure class="client-two_image-box"><a href="#"><img src="assets/images/clients/1.png" alt=""></a></figure></li>
				<li class="slide-item"><figure class="client-two_image-box"><a href="#"><img src="assets/images/clients/2.png" alt=""></a></figure></li>
				<li class="slide-item"><figure class="client-two_image-box"><a href="#"><img src="assets/images/clients/3.png" alt=""></a></figure></li>
				<li class="slide-item"><figure class="client-two_image-box"><a href="#"><img src="assets/images/clients/4.png" alt=""></a></figure></li>
				<li class="slide-item"><figure class="client-two_image-box"><a href="#"><img src="assets/images/clients/5.png" alt=""></a></figure></li>
				<li class="slide-item"><figure class="client-two_image-box"><a href="#"><img src="assets/images/clients/1.png" alt=""></a></figure></li>
				<li class="slide-item"><figure class="client-two_image-box"><a href="#"><img src="assets/images/clients/2.png" alt=""></a></figure></li>
				<li class="slide-item"><figure class="client-two_image-box"><a href="#"><img src="assets/images/clients/3.png" alt=""></a></figure></li>
				<li class="slide-item"><figure class="client-two_image-box"><a href="#"><img src="assets/images/clients/4.png" alt=""></a></figure></li>
				<li class="slide-item"><figure class="client-two_image-box"><a href="#"><img src="assets/images/clients/5.png" alt=""></a></figure></li>
			</ul>
		</div>
	</section> --}}
@endsection
