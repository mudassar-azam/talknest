@extends('layouts.front.main')
@section('content')


	<!-- Sec Title -->
	<div class="sec-title">
				<div class="d-flex justify-content-center align-items-center flex-wrap stocksourceshead">
					<div class="left-box">
						<h2 class="sec-title_heading ">STOCK SOURCES</h2>
					</div>
				</div>
			</div>
	<!-- Team Three -->
	<section class="news-seven" style="background-image:url(assets/images/background/pattern-5.png)">
		<div class="auto-container">
		


             @php
                 $posts = DB::table('categories')->get();
             @endphp
			<div class="row clearfix">
                <div class="container py-5">
                  <div class="row pb-5 mb-4">
                    @foreach ($posts as $post)
                      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 py-3">
                        <div class="card stockresourcecard">
                            <a href="{{ route('frontblog', ['id' => $post->id]) }}" style="color: black;">
                            <div class="card-body p-0">
                              <img src="{{ asset('catimage') }}/{{ $post->image }}" alt="" class="w-100 card-img-top">
                              <div class="p-4">
                                <h5 class="mb-0">{{ $post->name }}</h5>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>


			</div>

			<!-- Pagination Outer -->
			{{-- <div class="pagination-outer text-center">
				<ul class="pagination">
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#"><span class="fa-solid fa-chevron-right fa-fw"></span></a></li>
				</ul>
			</div> --}}

		</div>
	</section>
@endsection
