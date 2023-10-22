<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="manifest" href="{{url('site.webmanifest')}}"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/progressbar_barfiller.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('assets/img/logo/loder.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent" id="top">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{route('index')}}" style="font-size: 3.0rem; font-weight:bold">{{config('app.name')}}</a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">                                                                                          
                                                <li class="active" ><a href="{{route('index')}}">Home</a></li>
                                                {{-- <li><a href="courses.html">Courses</a></li>
                                                <li><a href="about.html">About</a></li>
                                                <li><a href="#">Blog</a>
                                                    <ul class="submenu">
                                                        <li><a href="blog.html">Blog</a></li>
                                                        <li><a href="blog_details.html">Blog Details</a></li>
                                                        <li><a href="elements.html">Element</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact.html">Contact</a></li> --}}
                                                <!-- Button -->
                                                <li class="button-header margin-left "><a href="{{url('/#register')}}" class="btn">Register</a></li>
                                                @auth
                                                <li class="button-header"><a href="{{route('admin')}}" class="btn btn3">Admin</a></li>
                                                @else
                                                
                                                <li class="button-header"><a href="{{route('login')}}" class="btn btn3">Log in</a></li>
                                                @endauth
                                                
                                            </ul>
                                        </nav>
                                    </div>
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
        </div>
        
        <!-- Header End -->
    </header>
    <main>
        <x-flash-message></x-flash-message>
        @yield('content')
    </main>
    @include('partials._userFooter')
     <!-- Scroll Up -->
     <div id="back-top" >
       <a title="Go to Top" href="#top"> <i class="fas fa-level-up-alt"></i></a>
   </div>
   
   <!-- JS here -->
   <script src="{{asset('./assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
   <!-- Jquery, Popper, Bootstrap -->
   <script src="{{asset('./assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
   <script src="{{asset('./assets/js/popper.min.js')}}"></script>
   <script src="{{asset('./assets/js/bootstrap.min.js')}}"></script>
   <!-- Jquery Mobile Menu -->
   <script src="{{asset('./assets/js/jquery.slicknav.min.js')}}"></script>
   
   <!-- Jquery Slick , Owl-Carousel Plugins -->
   <script src="{{asset('./assets/js/owl.carousel.min.js')}}"></script>
   <script src="{{asset('./assets/js/slick.min.js')}}"></script>
   <!-- One Page, Animated-HeadLin -->
   <script src="{{asset('./assets/js/wow.min.js')}}"></script>
   <script src="{{asset('./assets/js/animated.headline.js')}}"></script>
   <script src="{{asset('./assets/js/jquery.magnific-popup.js')}}"></script>
   
   <!-- Date Picker -->
   <script src="{{asset('./assets/js/gijgo.min.js')}}"></script>
   <!-- Nice-select, sticky -->
   <script src="{{asset('./assets/js/jquery.nice-select.min.js')}}"></script>
   <script src="{{asset('./assets/js/jquery.sticky.js')}}"></script>
   <!-- Progress -->
   <script src="{{asset('./assets/js/jquery.barfiller.js')}}"></script>
   
   <!-- counter , waypoint,Hover Direction -->
   <script src="{{asset('./assets/js/jquery.counterup.min.js')}}"></script>
   <script src="{{asset('./assets/js/waypoints.min.js')}}"></script>
   <script src="{{asset('./assets/js/jquery.countdown.min.js')}}"></script>
   <script src="{{asset('./assets/js/hover-direction-snake.min.js')}}"></script>
   
   <!-- contact js -->
   <script src="{{asset('./assets/js/contact.js')}}"></script>
   <script src="{{asset('./assets/js/jquery.form.js')}}"></script>
   <script src="{{asset('./assets/js/jquery.validate.min.js')}}"></script>
   <script src="{{asset('./assets/js/mail-script.js')}}"></script>
   <script src="{{asset('./assets/js/jquery.ajaxchimp.min.js')}}"></script>
   
   <!-- Jquery Plugins, main Jquery -->	
   <script src="{{asset('./assets/js/plugins.js')}}"></script>
   <script src="{{asset('./assets/js/main.js')}}"></script>
   
   </body>
   </html>