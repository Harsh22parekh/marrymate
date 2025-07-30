<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>marry-mate </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="wed-master/site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('wed-master/assets/img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('wed-master/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wed-master/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wed-master/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('wed-master/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('wed-master/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wed-master/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('wed-master/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wed-master/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('wed-master/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('wed-master/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('wed-master/assets/css/style.css') }}">   

</head>
<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                 <img src="{{ asset('wed-master/assets/img/logo/logo.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                       <!-- Logo -->
                <div class="col-xl-2 col-lg-2">
                    <div class="logo">
                        <a href="/">
                            <img src="{{ asset('mm_logo1.png') }}" alt="MarryMate Logo" style="height: 80px; width: auto;">
                        </a>
                    </div>
                </div>

                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>                              
                                    <ul id="navigation">                                                          
                                        <li><a href="/"> home</a></li>
                                        <li><a href="/about">About</a></li>
                                        <style>
                                    .dropdown-menu {
                                        padding: 1 !important;
                                    }

                                    .dropdown-item {
                                        padding: 10px 10px !important;
                                        margin: 1 !important;
                                    }
                                </style>
                                        
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Services
                                    </a>
                                   <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                                    <a class="dropdown-item" href="/services/catering">Catering</a>
                                    <a class="dropdown-item" href="/services/photography">Photography</a>
                                    <a class="dropdown-item" href="/services/transportation">Transportation</a>
                                </div>
                                </li>


                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="packagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Packages
                                    </a>
                                   <div class="dropdown-menu" aria-labelledby="packagesDropdown">
                                        <a class="dropdown-item" href="/packages/venue">Venue</a>
                                        <a class="dropdown-item" href="/packages/music">Music</a>
                                        <a class="dropdown-item" href="/packages/makeup-styling">Makeup & Styling</a>
                                        <a class="dropdown-item" href="/packages/wedding-dress">Wedding Dress</a>
                                        <a class="dropdown-item" href="/packages/invitation-card">Invitation Card</a>
                                    </div>
                                </li>

                                        <li><a href="/blog">Blog</a>
                                            {{-- <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                                <li><a href="elements.html">Element</a></li>
                                            </ul> --}}
                                        </li>
                                        <li><a href="/contact">Contact Us</a></li>

                                        <li>
                                            <a href="/cart">
                                                Cart 
                                                <span class="badge badge-pill badge-danger">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                                            </a>
                                        </li>

                                   @if(auth()->check())
    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit" style="
            display: inline-block;
            padding: 10px 28px;
            margin-left: 20px;
            background: linear-gradient(135deg, #ff5f8d, #ff8ab5);
            color: white;
            border-radius: 50px;
            font-weight: bold;
            font-size: 15px;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(255, 95, 141, 0.4);
            transition: all 0.3s ease;
            border: none;
        "
        onmouseover="this.style.boxShadow='0 6px 18px rgba(255, 95, 141, 0.5)'"
        onmouseout="this.style.boxShadow='0 4px 15px rgba(255, 95, 141, 0.4)'"
        >Logout</button>
    </form>
@else
    <a href="/login" style="
        display: inline-block;
        padding: 10px 28px;
        margin-left: 20px;
        background: linear-gradient(135deg, #ff5f8d, #ff8ab5);
        color: white;
        border-radius: 50px;
        font-weight: bold;
        font-size: 15px;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(255, 95, 141, 0.4);
        transition: all 0.3s ease;
    "
    onmouseover="this.style.boxShadow='0 6px 18px rgba(255, 95, 141, 0.5)'"
    onmouseout="this.style.boxShadow='0 4px 15px rgba(255, 95, 141, 0.4)'"
    >Login</a>
@endif



                                    </ul>
                                </nav>
                            </div>
                        </div> 
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>