<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <style>
        .navbar{
            background-color: #052a6a;
            
        }
        ul{
        display: block;
        color: red;
        padding: 8px 16px;
        text-decoration: none;
        font-size: 20px;
        }
        
        

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Perfect
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('models.get') }}">{{ __('Models') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('albums.get') }}">{{ __('Photos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('videos.get') }}">{{ __('Videos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about.page') }}">{{ __('About') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('all.news') }}">{{ __('News') }}</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">{{ __('Profile') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.wallet') }}">{{ __('Wallet') }}</a>
                        </li>
                        @endauth
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('modalform') }}">{{ __('Form') }}</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
        
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-0">
            @yield('content')
        </main>
    </div>
</body>

<footer id="dk-footer" class="dk-footer">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="dk-footer-box-info">
                    <a href="index.html" class="footer-logo">
                        <img src="images/footer_logo.png" alt="footer_logo" class="img-fluid">
                    </a>
                    <p class="footer-info-text">
                       Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.
                    </p>
                    <div class="footer-social-link">
                        <h3>Follow us</h3>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Social link -->
                </div>
                <!-- End Footer info -->
                <div class=" footer-awarad">
                    
                </div>
            </div>
            <!-- End Col -->
            <div class="col-md-12 col-lg-8">
                <div class="row">
                    
                    <!-- End Col -->
                    <div class="col-md-6 pt-5">
                        <div class="contact-us contact-us-last">
                            <div class="contact-icon">
                                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                            </div>
                            
                            <!-- End contact Icon -->

                            <div class="contact-info">
                                <h3>980000000</h3>
                                <p>Give us a call</p>
                            </div>

                            
                            <!-- End Contact Info -->
                        </div>
                        <!-- End Contact Us -->
                    </div>
                    <!-- End Col -->
                </div>
                <div class="contact-icon">
                    <i class="fa fa-map" aria-hidden="true"></i>
                </div>
                <div class="contact-info mx-4 mt-3">
                    <h3>Maitidevi</h3>
                    <p>Kathmandu Nepal</p>
                </div>
                <!-- End Contact Row -->
                
                <!-- End Row -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Widget Row -->
    </div>
    <!-- End Contact Container -->


    <div class="copyright">
        <div class="container">
            <div class="row justify-content-end">
                
                    <span>Copyright © 2020, All Right Reserved </span>
                <!-- End Col -->
                <!-- End col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Copyright Container -->
    </div>
    <!-- End Copyright -->
    <!-- Back to top -->
    <!-- End Back to top -->
</footer>

</html>
