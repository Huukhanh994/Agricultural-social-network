<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login Page</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('site/img/logo.png')}}">  
    <!-- Main Font -->
    <script src="{{asset('site/js/libs/webfontloader.min.js')}}"></script>

    <script>
        WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
    </script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('site/Bootstrap/dist/css/bootstrap-reboot.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site/Bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site/Bootstrap/dist/css/bootstrap-grid.css')}}">

    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('site/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site/css/fonts.min.css')}}">



</head>

<body class="landing-page">
    <!-- Preloader -->
    
    <div id="hellopreloader">
        <div class="preloader">
            <svg width="45" height="45" stroke="#fff">
                <g fill="none" fill-rule="evenodd" stroke-width="2" transform="translate(1 1)">
                    <circle cx="22" cy="22" r="6" stroke="none">
                        <animate attributeName="r" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite"
                            values="6;22" />
                        <animate attributeName="stroke-opacity" begin="1.5s" calcMode="linear" dur="3s"
                            repeatCount="indefinite" values="1;0" />
                        <animate attributeName="stroke-width" begin="1.5s" calcMode="linear" dur="3s"
                            repeatCount="indefinite" values="2;0" />
                    </circle>
                    <circle cx="22" cy="22" r="6" stroke="none">
                        <animate attributeName="r" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite"
                            values="6;22" />
                        <animate attributeName="stroke-opacity" begin="3s" calcMode="linear" dur="3s"
                            repeatCount="indefinite" values="1;0" />
                        <animate attributeName="stroke-width" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite"
                            values="2;0" />
                    </circle>
                    <circle cx="22" cy="22" r="8">
                        <animate attributeName="r" begin="0s" calcMode="linear" dur="1.5s" repeatCount="indefinite"
                            values="6;1;2;3;4;5;6" />
                    </circle>
                </g>
            </svg>
    
            <div class="text">Loading ...</div>
        </div>
    </div>
    
    <!-- ... end Preloader -->
    <div class="content-bg-wrap"></div>
    <!-- Header Standard Landing  -->
    
    <div class="header--standard header--standard-landing" id="header--standard">
        <div class="container">
            <div class="header--standard-wrap">
    
                <a href="{{url('/')}}" class="logo">
                    <div class="img-wrap">
                        <img src="{{asset('site/img/logo.png')}}" alt="Olympus">
                        <img src="{{asset('site/img/logo-colored-small.png')}}" alt="Olympus" class="logo-colored">
                    </div>
                    <div class="title-block">
                        <h6 class="logo-title">agricultural</h6>
                        <div class="sub-title">SOCIAL NETWORK</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    <!-- ... end Header Standard Landing  -->
    <div class="header-spacer--standard"></div>
    <div class="container">
        <div class="row display-flex">
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="landing-content">
                    <h1>Welcome to the Agricultural Social Network</h1>
                    <p>We are the best and biggest social network for the farmer active of the Viet Nam.
                        Share you
                        thoughts, write blog posts, show your favourite music via Stopify, earn badges and much more!
                    </p>
                    <a href="{{ route('register') }}" class="btn btn-md btn-border c-white">Register Now!</a>
                </div>
            </div>
        
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        
                <!-- Login-Registration Form  -->
        
                <div class="registration-login-form">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                <svg class="olymp-login-icon">
                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-login-icon')}}"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                        <hr>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i>
                                                    Facebook</a>
                                            </div>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}" style="color:black;">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                        <a class="btn btn-link" href="{{ route('register') }}" style="color:black;">
                                            {{ __('Register') }}
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- ... end Window Popup Main Search -->
    
    <!-- JS Scripts -->
    <script src="{{asset('site/js/jQuery/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('site/js/libs/jquery.appear.js')}}"></script>
    <script src="{{asset('site/js/libs/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('site/js/libs/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('site/js/libs/jquery.matchHeight.js')}}"></script>
    <script src="{{asset('site/js/libs/svgxuse.js')}}"></script>
    <script src="{{asset('site/js/libs/imagesloaded.pkgd.js')}}"></script>
    <script src="{{asset('site/js/libs/Headroom.js')}}"></script>
    <script src="{{asset('site/js/libs/velocity.js')}}"></script>
    <script src="{{asset('site/js/libs/ScrollMagic.js')}}"></script>
    <script src="{{asset('site/js/libs/jquery.waypoints.js')}}"></script>
    <script src="{{asset('site/js/libs/jquery.countTo.js')}}"></script>
    <script src="{{asset('site/js/libs/popper.min.js')}}"></script>
    <script src="{{asset('site/js/libs/material.min.js')}}"></script>
    <script src="{{asset('site/js/libs/bootstrap-select.js')}}"></script>
    <script src="{{asset('site/js/libs/smooth-scroll.js')}}"></script>
    <script src="{{asset('site/js/libs/selectize.js')}}"></script>
    <script src="{{asset('site/js/libs/swiper.jquery.js')}}"></script>
    <script src="{{asset('site/js/libs/moment.js')}}"></script>
    <script src="{{asset('site/js/libs/daterangepicker.js')}}"></script>
    <script src="{{asset('site/js/libs/fullcalendar.js')}}"></script>
    <script src="{{asset('site/js/libs/isotope.pkgd.js')}}"></script>
    <script src="{{asset('site/js/libs/ajax-pagination.js')}}"></script>
    <script src="{{asset('site/js/libs/Chart.js')}}"></script>
    <script src="{{asset('site/js/libs/chartjs-plugin-deferred.js')}}"></script>
    <script src="{{asset('site/js/libs/circle-progress.js')}}"></script>
    <script src="{{asset('site/js/libs/loader.js')}}"></script>
    <script src="{{asset('site/js/libs/run-chart.js')}}"></script>
    <script src="{{asset('site/js/libs/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('site/js/libs/jquery.gifplayer.js')}}"></script>
    <script src="{{asset('site/js/libs/mediaelement-and-player.js')}}"></script>
    <script src="{{asset('site/js/libs/mediaelement-playlist-plugin.min.js')}}"></script>
    <script src="{{asset('site/js/libs/ion.rangeSlider.js')}}"></script>
    <script src="{{asset('site/js/libs/leaflet.js')}}"></script>
    <script src="{{asset('site/js/libs/MarkerClusterGroup.js')}}"></script>
    
    <script src="{{asset('site/js/main.js')}}"></script>
    <script src="{{asset('site/js/libs-init/libs-init.js')}}"></script>
    <script defer src="{{asset('site/fonts/fontawesome-all.js')}}"></script>
    
    <script src="{{asset('site/Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
</body>
</html>

