<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('layout/FrontEnd/Css/minimo.css')}}">
</head>
<body>
<header class="container">
    <nav class="navbar navbar-expand-md bg-white navbar-light">
        <a class="navbar-brand" href="#"><img src="{{asset('layout/FrontEnd/images/minimo12.jpg')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">LIFESTYLE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">PHOTODIARY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">MUSIC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">TRAVEL</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main class="py-4">
    @yield('content')
</main>
<footer>
    <div class="container">
        <div class="footer-1">
            <div class="item-footer-1">
                <div class="row justify-content-between">
                    <div class="row">
                        <div class="item-row">Terms and conditions</div>
                        <div class="item-row-1">Privacy</div>
                    </div>
                    <div class="row">
                        <div class="item-row-2">Follow</div>
                        <div class="test">
                            <span class="item-row-fb"><img src="{{asset('layout/FrontEnd/images/fb.png')}}"
                                                           alt=""></span>
                            <span class="item-row-twitter"><img src="{{asset('layout/FrontEnd/images/twitter.png')}}"
                                                                alt=""></span>
                            <span class="item-row-insta"><img src="{{asset('layout/FrontEnd/images/insta.png')}}"
                                                              alt=""></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
