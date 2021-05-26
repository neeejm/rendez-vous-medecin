<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
<!-- Mirrored from medifab.dreamguystech.com/blue/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 May 2021 18:52:24 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
		
		<!-- FontAwesome Css -->
        <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/images/favicon.png') }}">
		
		<!-- Main Css -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/slide.css') }}" rel="stylesheet">
        <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-select.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.css">
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
											<a href="/#about" class="nav-link" id="about-btn">About Us</a>
										</li>
										<li class="nav-item">
											<a href="/#services" class="nav-link" id="services-btn">Services</a>
										</li>
										<li class="nav-item">
											<a href="/#contact" class="nav-link" id="contact-btn">Contact Us</a>
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
            <button class="btn btn-outline-primary" id="up-btn"><i class="fas fa-caret-up"></i></button>
        </header>
		<!-- Header /-->
		
        <!-- Mobile Header -->
        <header class="mobile-header">
            <div class="panel-control-left">
				<a class="toggle-menu" href="#side_menu"><i class="fab fa-buffer"></i></a>
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
        @if(\Session::has('msg'))
            <div class="alert alert-primary" role="alert">
                {{ \Session::get('msg') }}
            </div>
        @endisset

        @yield('content')
 		<!-- Content /-->
		 
        <!-- Footer -->
        <footer class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="footer-widget">
                                 <h4 class="footer-title">Organisation</h4>
                                <div class="about-clinic">
                                    <p><strong>Info:</strong>
                                        <div>
                                            <img alt="Logo" src="{{ asset('storage/images/lg-logo.png') }}" width="120" height="100">
                                        </div>
                                        <br> Tdwiza,
                                        <br>Marrakech, Maroc, 50150</p>
                                    <p class="m-b-0"><strong>email:</strong>:
										<a>testing.pfa@gmail.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="footer-widget">
                                <h4 class="footer-title">Sitemap</h4>
                                <ul class="footer-menu">
                                    <li>
										<a href="/#about" id="fabout-btn">About Us</a>
                                    </li>
                                    <li>
										<a href="/#services" id="fservices-btn">Services</a>
                                    </li>
                                    <li>
										<a href="/#contact" id="fcontact-btn">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="footer-widget">
                                <h4 class="footer-title">Sur les réseaux:</h4>
                                <div class="appointment-btn">
                                    <p>Vous pouvez nous trouvez sur les réseaux sociaux suivants:</p>
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
                                    <p>&#xA9; 2021 <a href="#">{{ config('app.name', 'Laravel') }}</a>. All rights reserved.</p>
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
        <script src="{{ asset('js/calendar.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap-select.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js"></script>
				
    </body>


<!-- Mirrored from medifab.dreamguystech.com/blue/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 May 2021 18:52:37 GMT -->
</html>