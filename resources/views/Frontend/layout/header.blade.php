<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>3 Maids Cleaning</title>
    <meta name="author" content="Klano">
    <meta name="description" content="3 maids cleaning">
    <meta name="keywords" content="3 maids cleaning">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
<!-- Favicons -->

<link rel="apple-touch-icon" sizes="180x180" href="{{  URL::to('frontend/assets/img/favicons/apple-icon-180x180.png') }}">

<link rel="manifest" href="{{  URL::to('frontend/assets/img/favicons/manifest.json') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{  URL::to('frontend/assets/img/favicons/ms-icon-144x144.png') }}">
<meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
 <!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ URL::to('frontend/assets/css/bootstrap.min.css') }}">
<!-- Fontawesome Icon -->
<link rel="stylesheet" href="{{  URL::to('frontend/assets/css/fontawesome.min.css') }}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{  URL::to('frontend/assets/css/magnific-popup.min.css') }}">
<!-- Swiper Js -->
<link rel="stylesheet" href="{{  URL::to('frontend/assets/css/swiper-bundle.min.css') }}">
<!-- datetimepicker -->
<link rel="stylesheet" href="{{  URL::to('frontend/assets/css/jquery.datetimepicker.min.css') }}">
<!-- Theme Custom CSS -->
<link rel="stylesheet" href="{{  URL::to('frontend/assets/css/style.css') }}">
<link rel="stylesheet" href="{{  URL::to('frontend/assets/css/custom.css') }}">

</head>

<body>


 
    
    <!--==============================
    Mobile Menu
  ============================== -->
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="{{ url('/') }}"><img src="{{ URL::to('frontend/assets/img/logo.png')}}" ></a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li class="menu-item-has-children">
                        <a href="{{ url('/') }}">Home</a>
                        {{-- <ul class="sub-menu">
                            <li><a href="home-house-cleaner.html">House Cleaner</a></li>
                            <li><a href="home-cleaning-service.html">Cleaning Service</a></li>
                        </ul> --}}
                    </li>
                    <li><a href="{{ url('/about-us') }}">About Us</a></li>
                    <li class="menu-item-has-children">
                        <a href="#">Service</a>
                        <ul class="sub-menu">
                            <li><a href="{{ url('/kitchen-cleaning-service') }}">Kitchen Cleaning</a></li>
                            <li><a href="{{ url('/bedroom-cleaning-service') }}">Bedroom Cleaning</a></li>
                        </ul>
                    </li>
            >
            <li>
                <a href="{{ url('/book') }}">Book Now</a>
            </li>
                    <li>
                        <a href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
	Header Area
==============================-->
    <header class="th-header header-layout1">
        <div class="header-top topbarpink">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-links">
                            <ul>
                                <li class="d-none d-sm-inline-block"><i class="fas fa-phone"></i><b>Phone:</b><a href="tel:16028779077">+1 602-877-9077</a></li>
                                <li class="d-none d-sm-inline-block"><i class="fas fa-envelope"></i><b>Email:</b><a href="mailto:klanohelp@gmail.com">3mariasmaster@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-links">
                            <ul>
                         
                                <li>
                                    <div class="social-links">
                                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                                        <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                        <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="{{ url('/') }}"><img src="{{ URL::to('frontend/assets/img/logo.png')}}"></a>
                            </div>
                        </div>
                        <div class="col-auto d-none d-lg-inline-block">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li >
                                        <a href="{{ url('/') }}">Home</a>
                                    
                                    </li>
                                    <li><a href="{{ url('/about-us') }}">About Us</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Service</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ url('/kitchen-cleaning-service') }}">Kitchen Cleaning</a></li>
                                            <li><a href="{{ url('/bedroom-cleaning-service') }}">Bedroom Cleaning</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ url('/book') }}">Book Now</a>
                                    </li>
                               
                                    <li>
                                        <a href="{{ url('/contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                  
                    </div>
                </div>
            </div>
        </div>
    </header>