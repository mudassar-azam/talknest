@extends('layouts.front.main')
@section('content')
    <section class="news-seven" style="background-image:url({{ asset('assets/images/background/pattern-5.png') }})">
        <div class="auto-container">
            <!-- Sec Title -->

            <div class="sec-title">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="left-box">
                        <h2 class="sec-title_heading">Category: {{$post->name}}</h2>
                    </div>

                </div>
            </div>
            <div class="row clearfix">
                <!-- News Block -->
                @foreach ($posts as $post)
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="{{route ('blogdetail', ['id' => $post->id])}}"><img src="{{asset('blogimage')}}/{{$post->feature_image}}" alt="" /></a>
                        </div>
                        <div class="lower-content">
                            <ul class="post-meta">
                                <li>{{$post->posted_by}}</li>
                                <li>0 Comments</li>
                            </ul>
                            <div class="content">
                                <h4><a href="{{route ('blogdetail', ['id' => $post->id])}}">{{ strlen($post->heading) > 25 ? substr($post->heading, 0, 25) . '...' : $post->heading }}</a></h4>
                                <div class="text">{{ strlen($post->detail) > 80 ? substr($post->detail, 0, 80) . '...' : $post->detail }}</div>
                                <a href="{{route ('blogdetail', ['id' => $post->id])}}" class="read-more">Read More </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End Feature One -->

@endsection
