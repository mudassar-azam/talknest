<!DOCTYPE html>
<html>

<!-- Mirrored from html.themexriver.com/intime/intime/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Apr 2023 05:20:04 GMT -->

<head>
    <meta charset="utf-8">
    <title>TalkNest</title>
    <!-- Stylesheets -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Text:wght@400;700&amp;display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="{{asset('assets/css/abdulnafa.css')}}" rel="stylesheet">
</head>

<body>

    <div class="page-wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Header Lower -->
            <div class="header-lower">

                <div class="auto-container">
                    <div class="inner-container">

                        <div class="nav-outer d-flex justify-content-between align-items-center flex-wrap">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="{{url('/')}}" title=""><img src="{{asset('assets/images/logo.png')}}" alt=""
                                        title=""></a>
                            </div>

                            <!-- Main Menu -->
                            <nav class="main-menu show navbar-expand-md">
                                <div class="navbar-header">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="dropdown"><a href="{{url('/')}}">Home</a>

                                        </li>
                                        <li class="dropdown"><a href="{{url('/stock')}}">Stock Sources</a>

                                        </li>
                                        <li><a href="{{Route('dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="dropdown"><a href="#">Profile</a>

                                        </li>
                                        <li><a href="{{url('about')}}">About Us</a></li>
                                    </ul>
                                </div>

                            </nav>
                            <!-- Main Menu End-->

                            <div class="outer-box d-flex align-items-center">

                                <!-- Search Box -->
                                <div class="search-box-outer">
                                    <div class="search-box-btn"><span class="flaticon-search"></span></div>
                                </div>

                                <!-- Cart Box -->
                                <div class="cart-box">
                                    <a class="cart fa-solid fa-cart-plus fa-fw" href="contact.html"></a>
                                </div>
                                @if(Auth::check())
                                <div class="cart-box">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                    <button type="submit" class="btn btn-primary">Logout</button>
                                    </form>
                                </div>
                                @else
                                <div class="cart-box">
                                    <a href="{{url('/signin')}}">Sign in</a>
                                </div>

                                <div class="cart-box">
                                    <a class="btn btn-primary" href="{{url('/signup')}}">Sign up</a>
                                </div>
                                @endif

                                <!-- Button Box -->
                                {{-- <div class="button-box">
								<a class="btn-style-one theme-btn btn-item" href="#">
									<div class="btn-wrap">
										<span class="text-one">Make an appionment <i class="fa-solid fa-arrow-right fa-fw"></i></span>
										<span class="text-two">Make an appionment <i class="fa-solid fa-arrow-right fa-fw"></i></span>
									</div>
								</a>
							</div> --}}

                            </div>

                            <!-- Mobile Navigation Toggler -->
                            <div class="mobile-nav-toggler"><span class="icon fa-solid fa-bars fa-fw"></span></div>

                        </div>

                    </div>

                </div>
            </div>
            <!-- End Header Lower -->

            <!-- Sticky Header  -->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{url('/')}}" title=""><img src="{{asset('assets/images/logo.png')}}" alt=""
                                    title=""></a>
                        </div>

                        <!-- Right Col -->
                        <div class="right-box d-flex align-items-center flex-wrap">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                            <!-- Main Menu End-->

                            <div class="outer-box d-flex align-items-center">

                                <!-- Mobile Navigation Toggler -->
                                <div class="mobile-nav-toggler"><span class="icon fa-solid fa-bars fa-fw"></span></div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!-- End Sticky Menu -->

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><span class="icon fas fa-window-close fa-fw"></span></div>
                <nav class="menu-box">
                    <div class="nav-logo"><a href="index.html"><img src="{{asset('assets/images/logo.png')}}" alt=""
                                title=""></a></div>
                    <!-- Search -->
                    <div class="search-box">
                        <form method="post" action="https://html.themexriver.com/intime/intime/contact.html">
                            <div class="form-group">
                                <input type="search" name="search-field" value="" placeholder="SEARCH HERE"
                                    required>
                                <button type="submit"><span class="icon flaticon-001-loupe"></span></button>
                            </div>
                        </form>
                    </div>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
                </nav>
            </div>
            <!-- End Mobile Menu -->

        </header>
        <!-- End Main Header -->
