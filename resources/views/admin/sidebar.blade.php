<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

     <!-- Boostrap -->
    
    <link href="{{asset('admin/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" /> --}}

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style1.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
       <a href="index.html" class="navbar-brand mx-4 mb-3">
    <h3 class="text-pink" style="color: #e91e63;margin-bottom:-20px;">❤️ Marry Mate</h3>
</a>


                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                       
                    </div>

                </div>
                <div class="navbar-nav w-100">
                <a href="{{ route('dashboard.page') }}" class="nav-item nav-link active">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                <a href="{{ route('admin.about') }}" class="nav-item nav-link">
                    <i class="fa fa-info-circle me-2"></i> About Us
                </a>

                <a href="{{ route('admin.blogs') }}" class="nav-item nav-link">
                    <i class="fa fa-blog me-2"></i>Our Blogs
                </a>

                <a href="{{ route('packages.index') }}" class="nav-item nav-link">
                    <i class="fas fa-box me-2"></i>Our Packages
                </a>

                <a href="{{ route('services.index') }}" class="nav-item nav-link">
                     <i class="fas fa-box me-2"></i>Manage Services
                    </a>
    
                
                      <!-- Appointments -->
            {{-- <div class="nav-item dropdown">
                <a href="#appointmentsMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-calendar-alt me-2"></i>Appointments</a>
                 <div class="dropdown-menu bg-transparent border-0" id="appointmentsMenu">
                    <a href="{{ url('/appview1') }}" class="nav-link ps-4">New Appointments</a>
                    <a href="{{ url('/upcomingappview1') }}" class="nav-link ps-4">Upcoming Appointments</a>
                    <a href="{{ url('/completedappview1') }}" class="nav-link ps-4">Completed Appointments</a>
                    <a href="{{ url('/cancleappview1') }}" class="nav-link ps-4">Cancellations & Reschedules</a>
                </div>   --}}

                <div class="nav-item dropdown">
                    <a href="#appointmentsMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-shopping-cart me-2"></i>Cart Bookings</a>
                        <div class="dropdown-menu bg-transparent border-0" id="appointmentsMenu">
                            <a href="{{ route('admin.orders') }}" class="nav-link ps-4">New Bookings</a>
                            <a href="{{ route('cart.done') }}" class="nav-link ps-4">Completed Bookings</a>
                            <a href="{{ route('cart.cancle') }}" class="nav-link ps-4">Cancellations & Reschedules</a>
                            
                        </div>

                    <!-- Staff Management -->
            {{-- <div class="nav-item dropdown">
                <a href="#staffMenu" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-user-tie me-1"></i> Staff Management </a>
                
            <div class="dropdown-menu bg-transparent border-0" id="staffMenu">
                
                <a href="{{ url('/addstaffshow1') }}" class="nav-link ps-4">Our Staff Members</a>
                <a href="{{ url('/staffavailability1') }}" class="nav-link ps-4">Staff Availability</a>
            </div> --}}

          
                    {{-- <a href="{{ url('/settings') }}" class="nav-item nav-link"><i class="fa fa-cog me-2"></i>Setting</a> --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-item nav-link btn btn-link" style="color: black; text-decoration: none;">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                </form>
                    
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div> -->
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
           <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                   
                    @if(Session::has('admin2_name'))
                    <div class="nav-item dropdown user-dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ asset('team-3.jpg') }}" class="rounded-pill" style="width: 30px; height: 30px; margin-right:10px;">
                            {{ Session::get('admin2_name') }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end user-menu">
                            <a href="#" class="dropdown-item"><i class="fas fa-user-circle"></i> My Profile</a>
                            <a href="{{ url('/settings') }}" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a>
                            <a href="{{ url('/logout1') }}" class="dropdown-item logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                        </div>
                    </div>
                @endif
                
                    
                    
                    
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Dashboard Content-->
            <!-- <div class="container mt-4">rd Contenet --> 
                <!-- Dashboard Cards -->
                <!-- <div class="row">  
                    <div class="col-md-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5>Total Customers</h5>
                                <h3>120</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5>Bookings Today</h5>
                                <h3>15</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <h5>Revenue</h5>
                                <h3>₹25,000</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <h5>Pending Services</h5>
                                <h3>7</h3>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Booking Table -->
                <!-- <div class="mt-4">
                    <h3>Recent Bookings</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#101</td>
                                <td>Rahul Sharma</td>
                                <td>Full Car Wash</td>
                                <td>2025-02-10</td>
                                <td><span class="badge bg-success">Completed</span></td>
                            </tr>
                            <tr>
                                <td>#102</td>
                                <td>Amit Singh</td>
                                <td>Interior Cleaning</td>
                                <td>2025-02-09</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>#103</td>
                                <td>Pooja Verma</td>
                                <td>Premium Wash</td>
                                <td>2025-02-08</td>
                                <td><span class="badge bg-danger">Cancelled</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> -->


           
