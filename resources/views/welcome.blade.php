<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<!-- Mirrored from medifab.dreamguystech.com/blue/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 May 2021 18:52:24 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/images/favicon.png') }}">
		
		<!-- Fontawesome CSS -->
        <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">

		<!-- Main Css -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/slide.css') }}" rel="stylesheet">
		
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
    </head>
    
    <body>
        <!-- Header -->
        <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                         <div class="col-md-2 float-left">
                            <div class="logo">
								<a href="{{ route('welcome') }}"><img alt="Logo" src="{{ asset('storage/images/logo.png') }}" width="56" height="50"></a>
                            </div>
                        </div>
                        <div class="col-md-10">
							<nav class="navbar navbar-expand-md p-0">
								<div class="navbar-collapse collapse" id="navbar">
									<ul class="nav navbar-nav main-nav float-right ml-auto">
										<li class="active nav-item">
											<a href="{{ route("home") }}" class="nav-link">Home</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="about-btn">About Us</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="services-btn">Services</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="contact-btn">Contact Us</a>
										</li>
                                        @guest
                                            @if (Route::has('apply'))
                                                <li class="nav-item">
                                                    <a class="btn btn-primary appoint-btn nav-link" href="{{ route('apply') }}">Postuler comme professionel de santé</a>
                                                </li>
                                            @endif
                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="btn btn-primary appoint-btn nav-link" href="{{ route('register') }}">Inscription</a>
                                                </li>
                                            @endif
                                            @if (Route::has('login'))
                                                <li class="nav-item">
                                                    <a class="btn btn-primary appoint-btn nav-link" href="{{ route('login') }}">Connexion</a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->username }}
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                                        {{ __('Profile') }}
                                                    </a>

                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        @endguest
									</ul>
								</div>
							</nav>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-primary" id="up-btn">up</button>
        </header>
		<!-- Header /-->
		
        <!-- Mobile Header -->
        <header class="mobile-header">
            <div class="panel-control-left">
				<a class="toggle-menu" href="#side_menu"><i class="fas fa-bars"></i></a>
            </div>
            <div class="page_title">
				<a href="{{ route('welcome') }}"><img src="{{ asset('storage/images/logo.png') }}" alt="Logo" class="img-fluid" width="60" height="60"></a>
            </div>
        </header>
		<!-- Mobile Header /-->
		
        <!-- Mobile Sidebar -->
        <div class="sidebar sidebar-menu" id="side_menu">
            <div class="sidebar-inner slimscroll">
				<a id="close_menu" href="#"><i class="fas fa-times"></i></a>
                <ul class="mobile-menu-wrapper" style="display: block;">
                    @auth
                        <li class="active">
                            <div class="mobile-menu-item clearfix"> 
                                <span style="font-size:22px;">
                                    {{ Auth::user()->username }}
                                </span> 
                            </div>
                        </li>
                    @endauth

                    <li class="active">
                        <div class="mobile-menu-item clearfix"> 
							<a href="{{ route("home") }}">Home</a>
                        </div>
                    </li>

                    @guest
                        @if (Route::has('apply'))
                            <li>
                                <div class="mobile-menu-item clearfix"> 
                                    <a href="{{ route('apply') }}">Postuler</a>
                                </div>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li>
                                <div class="mobile-menu-item clearfix">
                                    <a href="{{ route('register') }}">Inscription</a>
                                </div>
                            </li>
                        @endif
                        @if (Route::has('login'))
                            <li>
                                <div class="mobile-menu-item clearfix">
                                    <a href="{{ route('login') }}">Connexion</a>
                                </div>
                            </li>
                        @endif
                    @else
                        <li class="active">
                            <div class="mobile-menu-item clearfix"> 
                                <a href="{{ route("profile") }}">Profile</a>
                            </div>
                        </li>

                        <li class="active">
                            <div class="mobile-menu-item clearfix"> 
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
		<!-- Mobile Sidebar /-->
		
		 <!-- Content -->
        <div class="main-content">
            <section class="section home-banner row-middle">
                <div class="inner-bg"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-9">
                            <div class="banner-content">
                                <h1>{{ config('app.name', 'Laravel') }}</h1>
                                <p>Trouvez votre médecin et prenez une consultation physique chez un professionel de santé</p> 
								<a title="Consult" class="btn btn-primary btn-lg" href="{{ route('home') }}">Consulter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- about us section --}}
            <section id="about" class="section features">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header text-center">
                                <h3 class="header-title">About {{ config('app.name', 'Laravel') }}</h3>
                                <div class="line"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus
                                    nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices.
                                    Duis dictum eget dolor vel blandit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row feature-row">
                        <div class="col-md-4">
                            <div class="feature-box">
                                <div class="feature-img">
                                    <img width="60" height="60" alt="Book an Appointment" src="{{ asset('storage/images/icon-01.png') }}">
                                </div>
                                <h4>Prenez rendez-vous</h4>
                                <p>Prenez rendez vous en ligne, 24h/24 et 7j/7, pour une consultation physique.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box">
                                <div class="feature-img">
                                    <img width="60" height="60" alt="Consult with a Doctor" src="{{ asset('storage/images/icon-02.png') }}">
                                </div>
                                <h4>Consulter un professionel de santé</h4>
                                <p>Accédez aux disponibilités de dizaines de milliers de professionnels de santé.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box">
                                <div class="feature-img">
                                    <img width="60" height="60" alt="Make a family Doctor" src="{{ asset('storage/images/icon-03.png') }}">
                                </div>
                                <h4>Retrouvez votre rendez-vous</h4>
                                <p>Retrouvez votre historique de rendez-vous et vos documents médicaux.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- services section --}}
            <section id="services" class="section departments">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header text-center">
                                <h3 class="header-title">Services</h3>
                                <div class="line"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus
                                    nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices.
                                    Duis dictum eget dolor vel blandit.
								</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dept-box">
                                <div class="dept-img"> 
									<a href="department-details.html"><img width="67" height="80" alt="Dentists" src="{{ asset('storage/images/icon-04.png') }}"></a>
                                </div>
                                <h4>
									<a href="department-details.html">Dentists</a>
								</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor.
								</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dept-box">
                                <div class="dept-img"> 
									<a href="department-details.html"><img width="63" height="80" alt="Neurology" src="{{ asset('storage/images/icon-05.png') }}"></a>
                                </div>
                                <h4><a href="department-details.html">Neurology</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor.
								</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dept-box">
                                <div class="dept-img">
									<a href="department-details.html"><img width="92" height="80" alt="Opthalmology" src="{{ asset('storage/images/icon-06.png') }}"></a>
                                </div>
                                <h4><a href="department-details.html">Opthalmology</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor.
								</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dept-box">
                                <div class="dept-img"> 
									<a href="department-details.html"><img width="40" height="80" alt="Orthopedics" src="{{ asset('storage/images/icon-07.png') }}"></a>
                                </div>
                                <h4><a href="department-details.html">Orthopedics</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor.
								</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dept-box">
                                <div class="dept-img"> 
									<a href="department-details.html"><img width="76" height="80" alt="Cancer Department" src="{{ asset('storage/images/icon-08.png') }}"></a>
                                </div>
                                <h4><a href="department-details.html">Cancer Department</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor.
								</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dept-box">
                                <div class="dept-img"> 
									<a href="department-details.html"><img width="47" height="80" alt="ENT Department" src="{{ asset('storage/images/icon-09.png') }}"></a>
                                </div>
                                <h4><a href="department-details.html">ENT Department</a></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor.
								</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- contact section --}}
            <section id="contact" class="contact section-bg">
            <div class="container">

                <div class="section-title">
                <h2>Contact Us</h2>
                </div>

                <div class="row justify-content-center">

                    <div class="col-lg-5 col-md-7">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Send Message</button>
                                <br>
                                <br>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
            </section>
        </div>
 		<!-- Content /-->
		 
        <!-- Footer -->
        <footer class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                 <h4 class="footer-title">Location</h4>
                                <div class="about-clinic">
                                    <p><strong>Address:</strong>
                                        <br>1603 Old York Rd,
                                        <br>Houma, LA, 75429</p>
                                    <p class="m-b-0"><strong>Phone</strong>:
										<a href="tel:+8503867896">(850) 386-7896</a>
                                        <br> <strong>Fax</strong>: 
										<a href="tel:+8503867896">(850) 386-7896</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                <h4 class="footer-title">Sitemap</h4>
                                <ul class="footer-menu">
                                    <li>
										<a href="about-us.html">About Us</a>
                                    </li>
                                    <li>
										<a href="departments.html">Departments</a>
                                    </li>
                                    <li>
										<a href="services.html">Services</a>
                                    </li>
                                    <li>
										<a href="doctors.html">Doctors</a>
                                    </li>
                                    <li>
										<a href="contact-us.html">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                <h4 class="footer-title">Blog</h4>
                                <ul class="footer-menu">
                                    <li>
										<a href="blog.html">Right Sidebar</a>
                                    </li>
                                    <li>
										<a href="blog-left-sidebar.html">Left Sidebar</a>
                                    </li>
                                    <li>
										<a href="blog-full-width.html">Full Width</a>
                                    </li>
                                    <li>
										<a href="blog-grid.html">Blog Grid</a>
                                    </li>
                                    <li>
										<a href="blog-details.html">Blog Details</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="footer-widget">
                                <h4 class="footer-title">Appointment</h4>
                                <div class="appointment-btn">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                                    <ul class="social-icons clearfix">
                                        <li>
											<a href="#" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
											<a href="#" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
											<a href="#" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
											<a href="#" target="_blank" title="Google Plus"><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                        <li>
											<a href="#" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-12">
                                <div class="copy-text text-center">
                                    <p>&#xA9; 2019 <a href="#">{{ config('app.name', 'Laravel') }}</a>. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
		<!-- Footer /-->
		
		<!-- Sidebar Overlay -->
        <div class="sidebar-overlay" data-reff="#side_menu"></div>
		
		<!-- Custom JS -->		
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/theme.js') }}" defer></script>
        <script src="{{ asset('js/slide.js') }}" defer></script>
				
    </body>


<!-- Mirrored from medifab.dreamguystech.com/blue/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 May 2021 18:52:37 GMT -->
</html>