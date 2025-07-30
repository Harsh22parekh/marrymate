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
                                 <img src="{{ asset('mm_logo1.png') }}" alt="MarryMate Logo" style="height: 80px; width: auto;">
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
    <!-- Header End -->
</header>
<main>
    <!--? Slider Area Start-->
<div class="slider-area">
    <div class="slider-active">
        <div class="single-slider slider-height hero-overly d-flex align-items-center"style="background-image: url('{{ asset('wed-master/assets/img/hero/homeHero_1.jpg') }}'); background-size: cover; background-position: center; height: 700px;">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-8 col-lg-6 col-md-8">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInLeft" data-delay=".5s">Plan Your Dream Wedding</h1>
                            <p data-animation="fadeInLeft" data-delay=".9s">With <strong>MarryMate</strong>, make every moment special.</p>
                            <a href="/packages/venue" class="btn btn-custom mt-3">Explore Packages</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End-->

    <!--? Our Story Start -->
    {{-- <div class="Our-story-area story-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-70">
                        <h2>Our Love Story​</h2>
                        <img src="{{ asset('wed-master/assets/img/gallery/tittle_img.png') }}" alt="">
                        <p>Quisque nec facilisis sem. In at commodo velit. Aliquam tempor volutpat laoreet. Quisque non tellus eleifend arcu gravida aliquam. Vivamus quis consequat nisl, nec luctus libero. Nam sodales sem
                            egestas sem blandit volutpat. </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="story-caption background-img mb-40" style="background-image: url(wed-master/assets/img/gallery/story2.jpg);">
                        <div class="story-details">
                            <h4>The Proposal</h4>
                            <p>Proin at sapien ipsum. Aenean placerat, quam ac tempor congue, orci est luctus ex, ut vestibulum ipsum nisl eu nisi.</p>
                            <p>Proin at sapien ipsum. Aenean placerat, quam ac tempor.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="story-img">
                        <img  class="story2" src=" {{ asset('wed-master/assets/img/gallery/story1.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Our Story End -->
    <!--? Services Start -->
    {{-- <section class="pricing-card-area section-padding30 section-bg" data-background=" {{ asset('wed-master/assets/img/gallery/section_bg1.png') }}">
        <div class="container">
                <!-- Section Tittle -->
                <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-70">
                        <h2>Wedding Info</h2>
                       <img src="{{ asset('wed-master/assets/img/gallery/tittle_img.png') }}" alt="">
                        <p>Quisque nec facilisis sem. In at commodo velit. Aliquam tempor volutpat laoreet. Quisque non tellus eleifend arcu gravida aliquam. Vivamus quis consequat nisl</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-end">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-card text-center mb-30">
                        <div class="card-top">
                            <span class="flaticon-chart"></span>
                            <h4>The Ceremony</h4>
                        </div>
                        <div class="card-bottom">
                            <ul>
                                <li><i class="fas fa-calendar-alt"></i>April 20, 2016</li>
                                <li><i class="far fa-clock"></i>5:30 PM</li>
                                <li><i class="fas fa-map-marker-alt"></i>The Mayflower Hotel</li>
                                <li>1127 Connecticut Avenue,NY</li>
                                <li><i class="far fa-map"></i> Check out the map</li>
                            </ul>
                        </div>
                        <div class="card-buttons mt-30">
                            <a href="#" class="btn card-btn1">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-card active text-center mb-30">
                        <div class="card-top">
                            <span class="flaticon-project"></span>
                            <h4>The Reception</h4>
                        </div>
                        <div class="card-bottom">
                            <ul>
                                <li><i class="fas fa-calendar-alt"></i>April 20, 2016</li>
                                <li><i class="far fa-clock"></i>5:30 PM</li>
                                <li><i class="fas fa-map-marker-alt"></i>The Mayflower Hotel</li>
                                <li>1127 Connecticut Avenue,NY</li>
                                <li><i class="far fa-map"></i> Check out the map</li>
                            </ul>
                        </div>
                        <div class="card-buttons mt-30">
                            <a href="#" class="btn card-btn1">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-card text-center mb-30">
                        <div class="card-top">
                            <span class="flaticon-award"></span>
                            <h4>The Party</h4>
                        </div>
                        <div class="card-bottom">
                            <ul>
                                <li><i class="fas fa-calendar-alt"></i>April 20, 2016</li>
                                <li><i class="far fa-clock"></i>5:30 PM</li>
                                <li><i class="fas fa-map-marker-alt"></i>The Mayflower Hotel</li>
                                <li>1127 Connecticut Avenue,NY</li>
                                <li><i class="far fa-map"></i> Check out the map</li>
                            </ul>
                        </div>
                        <div class="card-buttons mt-30">
                            <a href="#" class="btn card-btn1">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Services Card End -->
    <!--? Count Down Start -->
    {{-- <div class="count-down-area">
        <div class="container"> 
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="count-down-wrapper" data-background=" {{ asset('wed-master/assets/img/gallery/section_bg2.png') }}">
                        <div class="row justify-content-between">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <!-- Counter Up -->
                                <div class="single-counter text-center">
                                    <span class="counter">23</span>
                                    <p>days</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6">
                                <!-- Counter Up -->
                                <div class="single-counter active text-center">
                                    <span class="counter">15</span>
                                    <p>hours</p>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6">
                                <!-- Counter Up -->
                                <div class="single-counter text-center">
                                    <span class="counter">46</span>
                                    <p>mins</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <!-- Counter Up -->
                                <div class="single-counter text-center">
                                    <span class="counter">20</span>
                                    <p>secs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Count Down End -->
    <!--? Gallery Area Start -->
    {{-- <div class="gallery-area section-padding4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url('{{ asset('wed-master/assets/img/gallery/gallery1.png') }}');">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3>image 01</h3>
                            <a href="{{ asset('wed-master/assets/img/gallery/gallery1.png') }}" class="menorie-icon"> <i class="ti-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url('{{ asset('wed-master/assets/img/gallery/gallery2.png') }}');">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3>image 02</h3>
                            <a href="{{ asset('wed-master/assets/img/gallery/gallery1.png') }}" class="menorie-icon"> <i class="ti-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url('{{ asset('wed-master/assets/img/gallery/gallery3.png') }}');">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3>image 03</h3>
                            <a href="{{ asset('wed-master/assets/img/gallery/gallery1.png') }}" class="menorie-icon"> <i class="ti-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img" style="background-image: url('{{ asset('wed-master/assets/img/gallery/gallery4.png') }}');">
                    </div>
                    <div class="thumb-content-box">
                        <div class="thumb-content">
                            <h3>image 04</h3>
                            <a href="{{ asset('wed-master/assets/img/gallery/gallery1.png') }}" class="menorie-icon"> <i class="ti-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <!-- Gallery Area End -->
    <!--? Gift Start -->
    {{-- <section class="gift-area gift-padding fix" data-background="{{ asset('wed-master/assets/img/gallery/section_bg3.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="gift-caption text-center">
                        <h2>The Best Gift From You</h2>
                        <p>Will be your presentation in our wedding</p>
                        <a href="#" class="btn btn-whit">resarve your Seat</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gift End -->
    <!--? Contact form Start -->
    <div class="contact-form section-padding30 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="form-wrapper">
                        <form id="contact-form" action="#" method="POST">
                            <!-- section tittle -->
                            <div class="row ">
                                <div class="col-lg-12">
                                    <div class="section-tittle tittle-form text-center mb-30">
                                        <h2>Are you attending?</h2>
                                       <img src="{{ asset('wed-master/assets/img/gallery/tittle_img2.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-box mb-30">
                                        <input type="text" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box subject-icon mb-30">
                                        <input type="Email" name="subject" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-30">
                                    <div class="select-itms">
                                        <select name="select" id="select2">
                                            <option value="">1 Guest</option>
                                            <option value="">2 Guest</option>
                                            <option value="">3 Guest</option>
                                            <option value="">4 Guest</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box message-icon mb-30">
                                        <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                    </div>
                                <div class="submit-info">
                                    <button class="btn" type="submit">Confirm now</button>
                                </div>
                                </div>
                            </div>
                        </form>
                        <!-- Shape inner Flower -->
                        <div class="shape-inner-flower">
                            <img src="{{ asset('wed-master/assets/img/gallery/shape2.png') }}" class="shpe2" alt="">
                        </div>
                        <!-- Shape outer Flower -->
                        <div class="shape-outer-flower">
                            <<img src="{{ asset('wed-master/assets/img/flower/from-top.png') }}" class="outer-top" alt="">
                            <img src="{{ asset('wed-master/assets/img/flower/from-bottom.png') }}" class="outer-bottom" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Contact form End -->
    {{-- <section class="brand-area section-padding-b">
        <div class="container">
                <!-- Section Tittle -->
                <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center mb-80">
                        <h2>Registry Gift</h2>
                        
                    <img src="{{ asset('wed-master/assets/img/gallery/tittle_img.png') }}" alt="">
                        <p>Quisque nec facilisis sem. In at commodo velit. Aliquam tempor volutpat laoreet. Quisque non tellus eleifend arcu gravida aliquam. Vivamus quis consequat nisl</p>
                    </div>
                </div>
            </div>
            <div class="brand-active brand-border">
                <div class="single-brand">
                    <img src="{{ asset('wed-master/assets/img/service/brand1.jpg') }}" alt="">
                </div>
                <div class="single-brand">
                    <img src="{{ asset('wed-master/assets/img/service/brand2.jpg') }}" alt="">
                </div>
                <div class="single-brand">
                    <img src="{{ asset('wed-master/assets/img/service/brand3.jpg') }}" alt="">
                </div>
                <div class="single-brand">
                    <img src="{{ asset('wed-master/assets/img/service/brand4.jpg') }}" alt="">
                </div>
                <div class="single-brand">
                    <img src="{{ asset('wed-master/assets/img/service/brand5.jpg') }}" alt="">
                </div>
                <div class="single-brand">
                    <img src="{{ asset('wed-master/assets/img/service/brand3.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery-2 img Start-->
    <div class="gallery-area2 fix">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="gallery-active owl-carousel">
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('wed-master/assets/img/gallery/gallery01.png') }}" alt=""></a>
                        </div>
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('wed-master/assets/img/gallery/gallery02.png') }}" alt=""></a>
                        </div>
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('wed-master/assets/img/gallery/gallery03.png') }}" alt=""></a>
                        </div>
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('wed-master/assets/img/gallery/gallery04.png') }}" alt=""></a>
                        </div>
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('wed-master/assets/img/gallery/gallery05.png') }}" alt=""></a>
                        </div>
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('wed-master/assets/img/gallery/gallery06.png') }}" alt=""></a>
                        </div>
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('wed-master/assets/img/gallery/gallery07.png') }}" alt=""></a>
                        </div>
                        <div class="gallery-img">
                            <a href="#"><img src="{{ asset('wed-master/assets/img/gallery/gallery08.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Gallery-2 img End-->
    <!--? Start map Area-->
    {{-- <section class="contact-sections">
        <div class="d-area">
            <div id="map" style="height: 235px; position: relative; overflow: hidden;"></div> --}}
            {{-- <script>
                function initMap() {
                    var uluru = {
                        lat: -25.363,
                        lng: 131.044
                    };
                    var grayStyles = [{
                            featureType: "all",
                            stylers: [{
                                    saturation: -90
                                },
                                {
                                    lightness: 50
                                }
                            ]
                        },
                        {
                            elementType: 'labels.text.fill',
                            stylers: [{
                                color: '#ccdee9'
                            }]
                        }
                    ];
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: -31.197,
                            lng: 150.744
                        },
                        zoom: 9,
                        styles: grayStyles,
                        scrollwheel: false
                    });
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&amp;callback=initMap">
            </script> --}}
        </div>
    </section>
    <!--? End map Area -->
</main>
<footer>
    <!-- Footer Start -->
    <div class="footer-main" data-background="{{ asset('wed-master/assets/img/gallery/section_bg4.png') }}">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Logo & About -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-logo mb-20">
                                <a href="{{ url('/') }}"><img src="{{ asset('mm_logo4.png') }}" style="height:100px; "alt="MarryMate Logo"></a>
                            </div>
                            <p style="color: white;">MarryMate is your one-stop wedding planning partner, offering curated venues, photography, catering, and more to make your special day perfect.</p>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="{{ url('services/catering') }}">Services</a></li>
                                    <li><a href="{{ url('packages/venue') }}">Packages</a></li>
                                    <li><a href="{{ url('about') }}">About</a></li>
                                    <li><a href="{{ url('blog') }}">Blog</a></li>
                                    <li><a href="{{ url('contact') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Wedding Info -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Wedding Tips</h4>
                                <ul>
                                  <li><a href="{{ url('blog') }}">Why Hire a Wedding Planner?</a></li>
                                    <li><a href="{{ url('blog') }}">Choosing the Perfect Venue</a></li>
                                    <li><a href="{{ url('blog') }}">Managing Your Guest List</a></li>
                                    <li><a href="{{ url('blog') }}">Styling Tips for the Couple</a></li>
                                    <li><a href="{{ url('blog') }}">Wedding Budget Planning</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Contact Us</h4>
                                <ul>
                                    <li><a href="mailto:info@marrymate.com">info@marrymate.com</a></li>
                                    <li>Phone: +91 98765 43210</li>
                                    <li>Address: 123 Wedding Street, Ahmedabad, Gujarat</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12">
                            <div class="footer-copy-right text-center">
                                <p>
                                    &copy; <script>document.write(new Date().getFullYear());</script> MarryMate. All Rights Reserved.
                                   </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer End -->
</footer>


    <script src="{{ asset('wed-master/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/gijgo.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/animated.headline.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/contact.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/mail-script.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/plugins.js') }}"></script>
<script src="{{ asset('wed-master/assets/js/main.js') }}"></script>
    
</body>
</html>