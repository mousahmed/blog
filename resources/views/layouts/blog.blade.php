<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>
        @yield('title')
    </title>

    <!-- Styles -->
    <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('img/favicon.png')}}">
    @yield('styles')
</head>

<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="{{route('welcome')}}">
                <img class="logo-dark" src="{{asset('img/logo-dark.png')}}" alt="logo">
                <img class="logo-light" src="{{asset('img/logo-light.png')}}" alt="logo">
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <ul class="nav nav-navbar">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Admin</a>
                    </li>
                @endauth

                {{-- <li class="nav-item nav-mega">
                     <a class="nav-link" href="#">Blocks <span class="arrow"></span></a>
                     <nav class="nav px-lg-2 py-lg-4">
                         <div class="container-fluid">
                             <div class="row">

                                 <div class="col-lg">
                                     <nav class="nav flex-column">
                                         <a class="nav-link" href="../block/blog.html">Blog</a>
                                         <a class="nav-link" href="../block/career.html">Career</a>
                                         <a class="nav-link" href="../block/contact.html">Contact</a>
                                         <a class="nav-link" href="../block/content.html">Content</a>
                                         <a class="nav-link" href="../block/counter.html">Counter</a>
                                         <a class="nav-link" href="../block/cover.html">Cover</a>
                                         <a class="nav-link" href="../block/cta.html">Call to action</a>
                                         <a class="nav-link" href="../block/download.html">Download</a>
                                         <a class="nav-link" href="../block/explore.html">Explore</a>
                                         <a class="nav-link" href="../block/faq.html">FAQ</a>
                                     </nav>
                                 </div>

                                 <div class="col-lg">
                                     <nav class="nav flex-column">
                                         <a class="nav-link" href="../block/feature-text.html">Feature textual</a>
                                         <a class="nav-link" href="../block/feature.html">Feature</a>
                                         <a class="nav-link" href="../block/footer.html">Footer</a>
                                         <a class="nav-link" href="../block/gallery.html">Gallery</a>
                                         <a class="nav-link" href="../block/header.html">Header</a>
                                         <a class="nav-link" href="../block/map.html">Map</a>
                                         <a class="nav-link" href="../block/modal.html">Modal</a>
                                         <a class="nav-link" href="../block/offcanvas.html">Offcanvas</a>
                                         <a class="nav-link" href="../block/partner.html">Partner</a>
                                         <a class="nav-link" href="../block/popup.html">Popup</a>
                                     </nav>
                                 </div>

                                 <div class="col-lg">
                                     <nav class="nav flex-column">
                                         <a class="nav-link" href="../block/portfolio.html">Portfolio</a>
                                         <a class="nav-link" href="../block/pricing.html">Pricing</a>
                                         <a class="nav-link" href="../block/process.html">Process</a>
                                         <a class="nav-link" href="../block/service.html">Service</a>
                                         <a class="nav-link" href="../block/shop.html">Shop</a>
                                         <a class="nav-link" href="../block/signup.html">Signup</a>
                                         <a class="nav-link" href="../block/subscribe.html">Subscribe</a>
                                         <a class="nav-link" href="../block/team.html">Team</a>
                                         <a class="nav-link" href="../block/testimonial.html">Testimonial</a>
                                         <a class="nav-link" href="../block/video.html">Video</a>
                                     </nav>
                                 </div>

                             </div>
                         </div>
                     </nav>
                 </li>--}}


            </ul>
        </section>
        @guest
            <a class="btn btn-xs btn-round btn-success" href="{{route('login')}}">Login</a>
        @endguest

    </div>
</nav><!-- /.navbar -->


<!-- Header -->
@yield('header')



<!-- Main Content -->
@yield('content')


<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">

            <div class="col-6 col-lg-3">
                <a href="{{route('welcome')}}"><img src="{{asset('img/logo-dark.png')}}" alt="logo"></a>
            </div>

            {{-- <div class="col-6 col-lg-3 text-right order-lg-last">
                 <div class="social">
                     <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
                     <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
                     <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i
                                 class="fa fa-instagram"></i></a>
                     <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
                 </div>
             </div>--}}

            {{-- <div class="col-lg-6">
                 <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
                     <a class="nav-link" href="../uikit/index.html">Elements</a>

                 </div>
             </div>--}}

        </div>
    </div>
</footer><!-- /.footer -->


<!-- Scripts -->
<script src="{{asset('js/page.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
@yield('scripts')
</body>
</html>
