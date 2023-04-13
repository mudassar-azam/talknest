@extends('layouts.front.main')
@section('content')


	<!-- Sidebar Page Container -->
    <div class="sidebar-page-container" style="background-image:url({{ asset('assets/images/background/pattern-40.png') }})">
    	<div class="auto-container">
        	<div class="row clearfix">

				<!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12" style="margin: 0 auto;">

                	<div class="blog-detail">
						<div class="inner-box">
							<div class="image">
								<img src="{{asset('blogimage')}}/{{$detail->feature_image}}" alt="" />
								<div class="post-date">{{ date('d', strtotime($detail->updated_at)) }} <span>{{ date('M Y', strtotime($detail->updated_at)) }}</span></div>
							</div>
							<div class="lower-content">
								<ul class="post-meta">
									<li>{{$detail->posted_by}}</li>
									<li>0 Comments</li>
								</ul>

								<h4>{{$detail->heading}}</h4>
								<p>{{$detail->detail}}</p>
								<div class="gallery-outer">
									<div class="row clearfix">
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="image">
												<img src="{{asset('assets/images/resource/news-34.jpg')}}" alt="" />
                                                <img src="{{asset('assets/images/resource/news-34.jpg')}}" alt="" />
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

						<!-- Comments Area -->
						<div class="comments-area">
							<div class="group-title">
								<h5>Comment (2)</h5>
							</div>
							<!-- Comment Box -->
							<div class="comment-box">
								<div class="comment">
									<div class="author-thumb"><img src="{{asset('assets/images/resource/author-17.jpg')}}" alt=""></div>
									<div class="comment-inner clearfix">
										<div class="comment-info clearfix"><strong>Riva Collins</strong><div class="comment-time"> November 19, 2019 at 11:00 am </div></div>
										<div class="text">It’s no secret that the digital industry is booming. From exciting startups to need ghor global and brands, companies are reaching out.</div>
										<a class="comment-reply" href="#">Reply <span class="fa fa-angle-right"></span></a>
									</div>
								</div>
							</div>

						</div>
						<!-- End Comments Area -->

						<!-- Comment Form -->
						<div class="comment-form">
							<div class="group-title">
								<h5>Post A Comment</h5>
							</div>
							<!-- Comment Form -->
							<form method="POST" action="{{route('addComment')}}">
                                @csrf
								<div class="group-text">Your email address will not be published *</div>
								<div class="row clearfix">
                                    <input type="hidden" value="{{$detail->id}}" name="blog_id">
									<div class="col-lg-4 col-md-4 col-sm-4 form-group">
										<input type="text" name="username" placeholder="Name*" required>
									</div>

									<div class="col-lg-4 col-md-4 col-sm-4 form-group">
										<input type="email" name="email" placeholder="Email*" required>
									</div>

									<div class="col-lg-4 col-md-4 col-sm-4 form-group">
										<input type="text" name="mobile" placeholder="Mobile*" required>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<textarea name="text" placeholder="Your Comment here..."></textarea>
									</div>

									<div class="col-lg-4 col-md-4 col-sm-12 form-group">
										<button class="btn-style-one theme-btn">
											<span class="btn-wrap">
												<span class="text-one">Post Comment</span>
												<span class="text-two">Post Comment</span>
											</span>
										</button>
									</div>

								</div>
							</form>

						</div>
						<!--End Comment Form -->

					</div>
				</div>

			</div>
		</div>
	</div>
@endsection
