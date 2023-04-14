@extends('layouts.front.main')
@section('content')

<!-- Main Slider -->
<section class="slider-one">
    <div class="single-item-carousel owl-carousel owl-theme">
        <!-- Slide -->
        @php
        $sections = DB::table('onesections')->get();
        @endphp
        @foreach ($sections as $section)
        <div class="slide">

            <div class="slider-one_pattern-layer" style="background-image:url({{asset('image')}}/{{$section->image}})">
            </div>
            <div class="auto-container slidercolumn">

                <!-- Content Column -->



                <div class="slider-one-content d-flex justify-content-end">
                    <div class="slider-one_inner">
                        <h1 class="slider-one_heading">{{$section->heading}}</h1>
                        <div class="slider-one_text">{{$section->description}}</div>
                        <!-- Button Box -->
                        <div class="slider-one_button-box d-flex align-items-center flex-wrap">

                            <!-- About One Detail -->

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
<!-- End Main Slider -->

<!-- Feature One -->
<section class="feature-one">
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
                            <div class="card-body p-0"><img src="assets/images/giphy.gif" alt=""
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
                            <div class="card-body p-0"><img src="assets/images/home/stock5.jpg" alt=""
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
                            <div class="card-body p-0"><img src="assets/images/home/threestock.jpg" alt=""
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
                            <div class="card-body p-0"><img src="assets/images/home/fourstock.jpg" alt=""
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
<!-- End Feature One -->

<!-- Turn talk into action and steadily grow your portfolio along with our community. -->



<div class="container-fluid turntalk">


    <div class="container">
        <div class="row">
            <h1>Turn talk into action and steadily grow your portfolio along with our community.</h1>
        </div>
        <div class="row py-5">
            <div class="col-md-5">
                <div class="turntalkleft">

                    <div class="turntalkrow">
                        <div class="turnlefthead">
                          <h3>Risk/Reward Analysis</h3>  
                        </div>
                        <div class="turnleftcontent active">
                            Stay on top of the changing dynamics, positive and negative, of your companies within our
                            community and helpful/powerful tool.
                        </div>
                    </div>
      <div class="turntalkrow">
                        <div class="turnlefthead">
                       <h3>Growth Outlook</h3> 
                        </div>
                        <div class="turnleftcontent">
                            Stay on top of the changing dynamics, positive and negative, of your companies within our
                            community and helpful/powerful tool.
                        </div>
                    </div>

                    <div class="turntalkrow">
                        <div class="turnlefthead">
                        <h3>Valuation</h3>
                        </div>
                        <div class="turnleftcontent">
                            Stay on top of the changing dynamics, positive and negative, of your companies within our
                            community and helpful/powerful tool.
                        </div>
                    </div>



                </div>


            </div>
            <div class="col-md-7 d-flex justify-content-center">
                <img src="{{asset('assets/images/home/turnitanimated.gif')}}" alt="">
            </div>
        </div>


    </div>

</div>





<!-- Find Companies and Moves Suitable for  Your Investment Profile  -->


<div class="container-fluid findcompanies">
    <div class="container">

    <div class="row text-center findcompanieshead">
        <p>Find Companies and Moves Suitable for</p>
        <h2> Your Investment Profile</h2>
    </div>

    <div class="row py-5 findcomponiestwoparts">
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h2>About TalkNest</h2>
            <p>Living in the information age means that our lives and net worth are constantly impacted by the flow of global news, financial data, and social media. This information, regardless of whether it’s true or accurate, is transmitted blazingly fast across a mind-blowing array of technology platforms. The ability to recognize the impact of this information and intelligently act on it presents a significant challenge for investors. We believe that those who face this challenge with powerful tools and conviction will perform better in this digital age than those who don’t.</p>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
        <img src="{{asset('assets/images/home/findcomponies.gif')}}" alt="">
        </div>
    </div>




    <div class="row py-5 findcomponiestwoparts">
        <div class="col-md-6 d-flex flex-column justify-content-center myboximage">
        <img src="{{asset('assets/images/home/greenborderi.png')}}"  alt="">
          
           
        </div>
        <div class="col-md-6 d-flex justify-content-center">
        <p>Living in the information age means that our lives and net worth are constantly impacted by the flow of global news, financial data, and social media. This information, regardless of whether it’s true or accurate, is transmitted blazingly fast across a mind-blowing array of technology platforms. The ability to recognize the impact of this information and intelligently act on it presents a significant challenge for investors. We believe that those who face this challenge with powerful tools and conviction will perform better in this digital age than those who don’t.</p>
        </div>
    </div>
    </div>
    
</div>










<!-- About One -->
<section class="about-one">
    <div class="auto-container">
        <div class="about-one-inner_container" style="background-image:url(assets/images/background/pattern-1.png)">
            <div class="row clearfix">

                <!-- Content Column -->
                <div class="about-one_content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="about-one_content-inner">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <div class="sec-title_title">About us</div>
                            <h2 class="sec-title_heading">We help to get Solutions!</h2>
                        </div>
                        <div class="about-one_colored-text">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod temporincididunt.</div>
                        <div class="about-one_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempo rincididunt ut labore et dolore magna aliqua. Quis suspendisse
                            onsectetur adipiscing.</div>

                        <div class="row clearfix">

                            <!-- Counter Boxed -->
                            <div class="counter-boxed col-lg-6 col-md-6 col-sm-12">
                                <div class="d-flex align-items-center">
                                    <div class="graph-outer">
                                        <input type="text" class="dial" data-fgColor="#a6d054" data-bgColor="#ffffff"
                                            data-width="110" data-height="110" data-linecap="normal" value="50"
                                            data-thickness="0.10">
                                        <div class="inner-text count-box"><span class="count-text" data-stop="50"
                                                data-speed="3500"></span>%</div>
                                    </div>
                                    <div class="sub-title">Business <br> strategy growth</div>
                                </div>
                            </div>

                            <!-- Counter Boxed -->
                            <div class="counter-boxed col-lg-6 col-md-6 col-sm-12">
                                <div class="d-flex align-items-center">
                                    <div class="graph-outer">
                                        <input type="text" class="dial" data-fgColor="#a6d054" data-bgColor="#ffffff"
                                            data-width="110" data-height="110" data-linecap="normal" value="75"
                                            data-thickness="0.10">
                                        <div class="inner-text count-box"><span class="count-text" data-stop="75"
                                                data-speed="3500"></span>%</div>
                                    </div>
                                    <div class="sub-title">Finance <br> valuable ideas</div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Image Column -->
                <div class="about-one_image-column col-lg-5 col-md-12 col-sm-12">
                    <div class="about-one_image-inner">
                        <div class="about-one_counter-box" data-parallax='{"y" : 80}'>
                            <div class="about-one_counter"><span class="odometer" data-count="10"></span><sup>+</sup>
                            </div>
                            <div class="about-one_experiance">Years of <br> experiences</div>
                        </div>
                        <div class="about-one_image">
                            <img src="assets/images/resource/about.jpg" alt="" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End About One -->

<!-- Process One -->
<section class="process-one">
    <div class="auto-container">
        <div class="process-one_inner-conatiner">
            <div class="four-item-carousel owl-carousel owl-theme">

                <!-- Process Column -->
                <div class="process-one_block">
                    <div class="process-one_block-inner">
                        <div class="process-one_image">
                            <img src="assets/images/resource/process-1.png" alt="" />
                        </div>
                        <div class="process-one_year">2010</div>
                        <h5 class="process-one_heading">Started business</h5>
                        <div class="process-one_text">A People Ops leader who is committed to the growth and
                            development of leaders.</div>
                    </div>
                </div>

                <!-- Process Column -->
                <div class="process-one_block">
                    <div class="process-one_block-inner">
                        <div class="process-one_image">
                            <img src="assets/images/resource/process-2.png" alt="" />
                        </div>
                        <div class="process-one_year style-two">2012</div>
                        <h5 class="process-one_heading">Survival during wartime</h5>
                        <div class="process-one_text">A People Ops leader who is committed to the growth and
                            development of leaders.</div>
                    </div>
                </div>

                <!-- Process Column -->
                <div class="process-one_block">
                    <div class="process-one_block-inner">
                        <div class="process-one_image">
                            <img src="assets/images/resource/process-3.png" alt="" />
                        </div>
                        <div class="process-one_year style-three">2016</div>
                        <h5 class="process-one_heading">Crisis and opportunity</h5>
                        <div class="process-one_text">A People Ops leader who is committed to the growth and
                            development of leaders.</div>
                    </div>
                </div>

                <!-- Process Column -->
                <div class="process-one_block">
                    <div class="process-one_block-inner">
                        <div class="process-one_image">
                            <img src="assets/images/resource/process-4.png" alt="" />
                        </div>
                        <div class="process-one_year style-four">2017</div>
                        <h5 class="process-one_heading">Get Award</h5>
                        <div class="process-one_text">A People Ops leader who is committed to the growth and
                            development of leaders.</div>
                    </div>
                </div>

                <!-- Process Column -->
                <div class="process-one_block">
                    <div class="process-one_block-inner">
                        <div class="process-one_image">
                            <img src="assets/images/resource/process-1.png" alt="" />
                        </div>
                        <div class="process-one_year">2010</div>
                        <h5 class="process-one_heading">Started business</h5>
                        <div class="process-one_text">A People Ops leader who is committed to the growth and
                            development of leaders.</div>
                    </div>
                </div>

                <!-- Process Column -->
                <div class="process-one_block">
                    <div class="process-one_block-inner">
                        <div class="process-one_image">
                            <img src="assets/images/resource/process-2.png" alt="" />
                        </div>
                        <div class="process-one_year style-two">2012</div>
                        <h5 class="process-one_heading">Survival during wartime</h5>
                        <div class="process-one_text">A People Ops leader who is committed to the growth and
                            development of leaders.</div>
                    </div>
                </div>

                <!-- Process Column -->
                <div class="process-one_block">
                    <div class="process-one_block-inner">
                        <div class="process-one_image">
                            <img src="assets/images/resource/process-3.png" alt="" />
                        </div>
                        <div class="process-one_year style-three">2016</div>
                        <h5 class="process-one_heading">Crisis and opportunity</h5>
                        <div class="process-one_text">A People Ops leader who is committed to the growth and
                            development of leaders.</div>
                    </div>
                </div>

                <!-- Process Column -->
                <div class="process-one_block">
                    <div class="process-one_block-inner">
                        <div class="process-one_image">
                            <img src="assets/images/resource/process-4.png" alt="" />
                        </div>
                        <div class="process-one_year style-four">2017</div>
                        <h5 class="process-one_heading">Get Award</h5>
                        <div class="process-one_text">A People Ops leader who is committed to the growth and
                            development of leaders.</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End Process One -->

<!-- Services One -->
<section class="services-one" style="background-image:url(assets/images/background/pattern-2.png)">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <div class="sec-title_title">Featured Services</div>
            <h2 class="sec-title_heading">We help to get Solutions!</h2>
            <div class="sec-title_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do <br>
                eiusmod temporincididunt.</div>
        </div>
        <div class="row clearfix">

            <!-- Service Block One -->
            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
                <div class="service-block_one-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="service-block_one-icon flaticon-website"></div>
                    <h5 class="service-block_one-heading">Strategy & Planning</h5>
                    <div class="service-block_one-text">Collaborate Consulting exists to find the place where
                        being seeming disparate interests meet.</div>
                    <div class="service-block_one-overlay"
                        style="background-image:url(assets/images/resource/service.jpg)">
                        <div class="service-block_one-overlay-inner">
                            <div class="upper-box">
                                <div class="service-block_one-icon-two flaticon-website"></div>
                                <h5 class="service-block_one-heading-two"><a href="service-detail.html">Program
                                        management</a></h5>
                            </div>
                            <div class="service-block_one-text-two">Collaborate Consulting exists to find the
                                place where to being seemingly disparate interests meet.</div>
                            <!-- Button Box -->
                            <div class="service-block_one-button">
                                <a class="btn-style-two theme-btn btn-item" href="#">
                                    <div class="btn-wrap">
                                        <span class="text-one">Read more <i
                                                class="fa-solid fa-arrow-right fa-fw"></i></span>
                                        <span class="text-two">Read more <i
                                                class="fa-solid fa-arrow-right fa-fw"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Block One -->
            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
                <div class="service-block_one-inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="service-block_one-icon flaticon-market"></div>
                    <h5 class="service-block_one-heading">Program management</h5>
                    <div class="service-block_one-text">Collaborate Consulting exists to find the place where
                        being seeming disparate interests meet.</div>
                    <div class="service-block_one-overlay"
                        style="background-image:url(assets/images/resource/service.jpg)">
                        <div class="service-block_one-overlay-inner">
                            <div class="upper-box">
                                <div class="service-block_one-icon-two flaticon-market"></div>
                                <h5 class="service-block_one-heading-two"><a href="service-detail.html">Program
                                        management</a></h5>
                            </div>
                            <div class="service-block_one-text-two">Collaborate Consulting exists to find the
                                place where to being seemingly disparate interests meet.</div>
                            <!-- Button Box -->
                            <div class="service-block_one-button">
                                <a class="btn-style-two theme-btn btn-item" href="#">
                                    <div class="btn-wrap">
                                        <span class="text-one">Read more <i
                                                class="fa-solid fa-arrow-right fa-fw"></i></span>
                                        <span class="text-two">Read more <i
                                                class="fa-solid fa-arrow-right fa-fw"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Block One -->
            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
                <div class="service-block_one-inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="service-block_one-icon flaticon-bank-building-silhouette"></div>
                    <h5 class="service-block_one-heading">Tax & Loan Management</h5>
                    <div class="service-block_one-text">Collaborate Consulting exists to find the place where
                        being seeming disparate interests meet.</div>
                    <div class="service-block_one-overlay"
                        style="background-image:url(assets/images/resource/service.jpg)">
                        <div class="service-block_one-overlay-inner">
                            <div class="upper-box">
                                <div class="service-block_one-icon-two flaticon-bank-building-silhouette">
                                </div>
                                <h5 class="service-block_one-heading-two"><a href="service-detail.html">Tax &
                                        Loan Management</a></h5>
                            </div>
                            <div class="service-block_one-text-two">Collaborate Consulting exists to find the
                                place where to being seemingly disparate interests meet.</div>
                            <!-- Button Box -->
                            <div class="service-block_one-button">
                                <a class="btn-style-two theme-btn btn-item" href="#">
                                    <div class="btn-wrap">
                                        <span class="text-one">Read more <i
                                                class="fa-solid fa-arrow-right fa-fw"></i></span>
                                        <span class="text-two">Read more <i
                                                class="fa-solid fa-arrow-right fa-fw"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Block One -->
            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
                <div class="service-block_one-inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="service-block_one-icon flaticon-charity"></div>
                    <h5 class="service-block_one-heading">Investment Policy</h5>
                    <div class="service-block_one-text">Collaborate Consulting exists to find the place where
                        being seeming disparate interests meet.</div>
                    <div class="service-block_one-overlay"
                        style="background-image:url(assets/images/resource/service.jpg)">
                        <div class="service-block_one-overlay-inner">
                            <div class="upper-box">
                                <div class="service-block_one-icon-two flaticon-charity"></div>
                                <h5 class="service-block_one-heading-two"><a href="service-detail.html">Investment
                                        Policy</a></h5>
                            </div>
                            <div class="service-block_one-text-two">Collaborate Consulting exists to find the
                                place where to being seemingly disparate interests meet.</div>
                            <!-- Button Box -->
                            <div class="service-block_one-button">
                                <a class="btn-style-two theme-btn btn-item" href="#">
                                    <div class="btn-wrap">
                                        <span class="text-one">Read more <i
                                                class="fa-solid fa-arrow-right fa-fw"></i></span>
                                        <span class="text-two">Read more <i
                                                class="fa-solid fa-arrow-right fa-fw"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Block One -->
            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
                <div class="service-block_one-inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="service-block_one-icon flaticon-business-intelligence"></div>
                    <h5 class="service-block_one-heading">Financial Advices</h5>
                    <div class="service-block_one-text">Collaborate Consulting exists to find the place where
                        being seeming disparate interests meet.</div>
                    <div class="service-block_one-overlay"
                        style="background-image:url(assets/images/resource/service.jpg)">
                        <div class="service-block_one-overlay-inner">
                            <div class="upper-box">
                                <div class="service-block_one-icon-two flaticon-business-intelligence"></div>
                                <h5 class="service-block_one-heading-two"><a href="service-detail.html">Financial
                                        Advices</a></h5>
                            </div>
                            <div class="service-block_one-text-two">Collaborate Consulting exists to find the
                                place where to being seemingly disparate interests meet.</div>
                            <!-- Button Box -->
                            <div class="service-block_one-button">
                                <a class="btn-style-two theme-btn btn-item" href="#">
                                    <div class="btn-wrap">
                                        <span class="text-one">Read more <i
                                                class="fa-solid fa-arrow-right fa-fw"></i></span>
                                        <span class="text-two">Read more <i
                                                class="fa-solid fa-arrow-right fa-fw"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Block One -->
            <div class="service-block_one col-lg-4 col-md-6 col-sm-12">
                <div class="service-block_one-inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="service-block_one-icon flaticon-shuttle"></div>
                    <h5 class="service-block_one-heading">Business Growth Plan</h5>
                    <div class="service-block_one-text">Collaborate Consulting exists to find the place where
                        being seeming disparate interests meet.</div>
                    <div class="service-block_one-overlay"
                        style="background-image:url(assets/images/resource/service.jpg)">
                        <div class="service-block_one-overlay-inner">
                            <div class="upper-box">
                                <div class="service-block_one-icon-two flaticon-shuttle"></div>
                                <h5 class="service-block_one-heading-two"><a href="service-detail.html">Business Growth
                                        Plan</a></h5>
                            </div>
                            <div class="service-block_one-text-two">Collaborate Consulting exists to find the
                                place where to being seemingly disparate interests meet.</div>
                            <!-- Button Box -->
                            <div class="service-block_one-button">
                                <a class="btn-style-two theme-btn btn-item" href="#">
                                    <div class="btn-wrap">
                                        <span class="text-one">Read more <i
                                                class="fa-solid fa-arrow-right fa-fw"></i></span>
                                        <span class="text-two">Read more <i
                                                class="fa-solid fa-arrow-right fa-fw"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="load-button text-center">
            <span class="load">load more <i class="icon fas fa-sync-alt fa-fw"></i></span>
        </div>

    </div>
</section>
<!-- End Services One -->

<!-- Progress One -->
<section class="progress-one" style="background-image:url(assets/images/background/pattern-3.png)">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- Progress One -->
            <div class="progress-one_content-column col-lg-6 col-md-12 col-sm-12">
                <div class="progress-one_content-inner">
                    <!-- Sec Title -->
                    <div class="sec-title">
                        <div class="sec-title_title">Annual Progression</div>
                        <h2 class="sec-title_heading">Our Business Growth is Really Incredible!</h2>
                        <div class="sec-title_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempo rincididunt ut labore et dolore magna aliqua. Quis suspendisse
                            onsectetur adipiscing.</div>
                    </div>

                    <!-- Skills -->
                    <div class="default-skills">

                        <!-- Skill Item -->
                        <div class="default-skill-item">
                            <div class="default-skill-bar">
                                <div class="default-bar-inner">
                                    <div class="default-bar progress-line" data-width="70">
                                        <div class="default-skill-percentage"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="default-count-box count-box"><span class="count-text" data-speed="2000"
                                    data-stop="70">0</span>%</div>
                            <div class="default-skill-title">Business growth <span>(2018)</span></div>
                        </div>

                        <!-- Skill Item -->
                        <div class="default-skill-item">
                            <div class="default-skill-bar">
                                <div class="default-bar-inner">
                                    <div class="default-bar progress-line" data-width="80">
                                        <div class="default-skill-percentage"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="default-count-box count-box"><span class="count-text" data-speed="2000"
                                    data-stop="80">0</span>%</div>
                            <div class="default-skill-title">Investment growth <span>(2019)</span></div>
                        </div>

                        <!-- Skill Item -->
                        <div class="default-skill-item">
                            <div class="default-skill-bar">
                                <div class="default-bar-inner">
                                    <div class="default-bar progress-line" data-width="90">
                                        <div class="default-skill-percentage"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="default-count-box count-box"><span class="count-text" data-speed="2000"
                                    data-stop="90">0</span>%</div>
                            <div class="default-skill-title">Finnancial growth <span>(2020)</span></div>
                        </div>

                    </div>

                    <div class="row clearfix">

                        <!-- Progress Info -->
                        <div class="progress-info col-lg-6 col-md-6 col-sm-12">
                            <div class="progress-info_inner">
                                <div class="progress-info_title">
                                    <span class="progress-info_icon flaticon-shield"></span>
                                    <h6>Risk Free</h6>
                                </div>
                                <div class="progress-info_text">We offer risk free business for tension free
                                    life.</div>
                            </div>
                        </div>

                        <!-- Progress Info -->
                        <div class="progress-info col-lg-6 col-md-6 col-sm-12">
                            <div class="progress-info_inner">
                                <div class="progress-info_title">
                                    <span class="progress-info_icon flaticon-profit"></span>
                                    <h6>Business Growth</h6>
                                </div>
                                <div class="progress-info_text">We ensure the business growth without
                                    conditions.</div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Image Column -->
            <div class="progress-one_image-column col-lg-6 col-md-12 col-sm-12">
                <div class="progress-one_image wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <img src="assets/images/resource/progress.png" alt="" />
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Progress One -->

<!-- Project One -->
<section class="project-one">
    <div class="auto-container">


        <!-- Project One Block -->
        @php
        $posts = DB::table('categories')->get();
        @endphp
        <div class="row clearfix">
            <div class="container py-5">
                <div class="row pb-5 mb-4 justify-content-center">
                    @foreach ($posts as $post)
                    <div class="col-lg-2 col-md-4 mb-4 mb-lg-0 py-3">
                        <div class="card shadow-sm border-0 rounded">
                            <div class="card-body p-0">
                                <img src="{{ asset('catimage') }}/{{ $post->image }}" alt="" class="w-100 card-img-top">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>



    </div>
</section>
<!-- End Project One -->

@endsection