<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('storage/public/images/favicon.png') }}" rel="icon">
    <link href="{{ asset('storage/public/images/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/css/boxicons.min.css') }}" rel="stylesheet">

    <!-- CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container-fluid">

        <div class="logo float-left">
            <h1 class="text-light"><a href="index.html"><span>{{ config('app.name', 'Laravel') }}</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <button type="button" class="nav-toggle"><i class="bx bx-menu"></i></button>
        <nav class="nav-menu">
            <ul>
            <li class="active"><a href="#header">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#why-us">Why Us</a></li>
            <li class="drop-down"><a href="">Drop Down</a>
                <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="drop-down"><a href="#">Drop Down 2</a>
                    <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                    </ul>
                </li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
                <li><a href="#">Drop Down 5</a></li>
                </ul>
            </li>
            <li><a href="#contact">Contact Us</a></li>
            </ul>
        </nav><!-- .nav-menu -->

        </div>
    </header><!-- End #header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
        <h1>Welcome to {{ config('app.name', 'Laravel') }}</h1>
        <h2>Please, fill out the for below to be notified for the latest updates!</h2>

        <form action="forms/notify.php" method="post" role="form" class="php-email-form">
            <div class="row no-gutters">
            <div class="col-md-6 form-group pr-md-1">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group pl-md-1">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
            </div>
            </div>

            <div class="mb-1">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your notification request was sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Notify me!</button></div>
        </form>
        </div>
    </section><!-- #hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
        <div class="container">

            <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('storage/images/about-img.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
                <h1>About us</h1>
                <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
                </p>
                <ul>
                <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bx bx-check-double"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                </ul>
                <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                culpa qui officia deserunt mollit anim id est laborum
                </p>
            </div>
            </div>

        </div>
        </section><!-- End About Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us section-bg">
        <div class="container">

            <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="card">
                <img src="{{ asset('storage/images/why-us-1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-icon">
                    <i class="bx bx-book-reader"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><a href="">Our Mission</a></h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="card">
                <img src="{{ asset('storage/images/why-us-2.jpg') }}" class="card-img-top" alt="...">
                <div class="card-icon">
                    <i class="bx bx-calendar-edit"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><a href="">Our Plan</a></h5>
                    <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="card">
                <img src="{{ asset('storage/images/why-us-2.jpg') }}" class="card-img-top" alt="...">
                <div class="card-icon">
                    <i class="bx bx-landscape"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><a href="">Our Vision</a></h5>
                    <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet. </p>
                </div>
                </div>
            </div>
            </div>

        </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Frequenty Asked Questions Section ======= -->
        <section class="faq">
        <div class="container">

            <div class="section-title">
            <h2>Frequenty Asked Questions</h2>
            </div>

            <ul class="faq-list">

            <li>
                <a data-toggle="collapse" class="collapsed" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq1" class="collapse" data-parent=".faq-list">
                <p>
                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq2" class="collapse" data-parent=".faq-list">
                <p>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq3" class="collapse" data-parent=".faq-list">
                <p>
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq4" class="collapse" data-parent=".faq-list">
                <p>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq5" class="collapse" data-parent=".faq-list">
                <p>
                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                </p>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq6" class="collapse" data-parent=".faq-list">
                <p>
                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                </p>
                </div>
            </li>

            </ul>

        </div>
        </section><!-- End Frequenty Asked Questions Section -->

        <!-- ======= Contact Us Section ======= -->
        <section id="contact" class="contact section-bg">
        <div class="container">

            <div class="section-title">
            <h2>Contact Us</h2>
            </div>

            <div class="row justify-content-center">

            <div class="col-lg-3 col-md-5 mb-5 mb-md-0">
                <div class="info">
                <div class="address">
                    <i class="bx bx-map"></i>
                    <p>A108 Adam Street<br>New York, NY 535022</p>
                </div>

                <div class="email">
                    <i class="bx bx-envelope"></i>
                    <p>info@example.com</p>
                </div>

                <div class="phone">
                    <i class="bx bx-phone-call"></i>
                    <p>+1 5589 55488 55s</p>
                </div>
                </div>

                <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>

            </div>

            <div class="col-lg-5 col-md-7">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validate"></div>
                </div>
                <div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>

            </div>

        </div>
        </section><!-- End Contact Us Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>{{ config('app.name', 'Laravel') }}</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End #footer -->

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/js/jquery.easing.min.js') }}" defer></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}" defer></script>

</body>

</html>