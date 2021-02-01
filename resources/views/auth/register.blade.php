<!DOCTYPE html>
<html lang="en">

<head>

    <title>Register</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

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
                        <animate attributeName="stroke-width" begin="3s" calcMode="linear" dur="3s"
                            repeatCount="indefinite" values="2;0" />
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
                        <h6 class="logo-title">olympus</h6>
                        <div class="sub-title">SOCIAL NETWORK</div>
                    </div>
                </a>

                <a href="#" class="open-responsive-menu js-open-responsive-menu">
                    <svg class="olymp-menu-icon">
                        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use>
                    </svg>
                </a>

                <div class="nav nav-pills nav1 header-menu">
                    <div class="mCustomScrollbar">
                        <ul>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"
                                    href="#" role="button" aria-haspopup="false" aria-expanded="false"
                                    tabindex='1'>Profile</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Profile Page</a>
                                    <a class="dropdown-item" href="#">Newsfeed</a>
                                    <a class="dropdown-item" href="#">Post Versions</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-has-megamenu">
                                <a href="#" class="nav-link dropdown-toggle" data-hover="dropdown"
                                    data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false"
                                    tabindex='1'>Forums</a>
                                <div class="dropdown-menu megamenu">
                                    <div class="row">
                                        <div class="col col-sm-3">
                                            <h6 class="column-tittle">Main Links</h6>
                                            <a class="dropdown-item" href="#">Profile Page<span
                                                    class="tag-label bg-blue-light">new</span></a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                        </div>
                                        <div class="col col-sm-3">
                                            <h6 class="column-tittle">BuddyPress</h6>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page<span
                                                    class="tag-label bg-primary">HOT!</span></a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                        </div>
                                        <div class="col col-sm-3">
                                            <h6 class="column-tittle">Corporate</h6>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                        </div>
                                        <div class="col col-sm-3">
                                            <h6 class="column-tittle">Forums</h6>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                            <a class="dropdown-item" href="#">Profile Page</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Terms & Conditions</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Events</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Privacy Policy</a>
                            </li>
                            <li class="close-responsive-menu js-close-responsive-menu">
                                <svg class="olymp-close-icon">
                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-close-icon')}}">
                                    </use>
                                </svg>
                            </li>
                            <li class="nav-item js-expanded-menu">
                                <a href="#" class="nav-link">
                                    <svg class="olymp-menu-icon">
                                        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-menu-icon')}}">
                                        </use>
                                    </svg>
                                    <svg class="olymp-close-icon">
                                        <use
                                            xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-close-icon')}}">
                                        </use>
                                    </svg>
                                </a>
                            </li>
                            <li class="shoping-cart more">
                                <a href="#" class="nav-link">
                                    <svg class="olymp-shopping-bag-icon">
                                        <use
                                            xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-shopping-bag-icon')}}">
                                        </use>
                                    </svg>
                                    <span class="count-product">2</span>
                                </a>
                                <div class="more-dropdown shop-popup-cart">
                                    <ul>
                                        <li class="cart-product-item">
                                            <div class="product-thumb">
                                                <img src="{{asset('site/img/product1.png')}}" alt="product">
                                            </div>
                                            <div class="product-content">
                                                <h6 class="title">White Enamel Mug</h6>
                                                <ul class="rait-stars">
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary"
                                                            aria-hidden="true"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary"
                                                            aria-hidden="true"></i>
                                                    </li>

                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary"
                                                            aria-hidden="true"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary"
                                                            aria-hidden="true"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                    </li>
                                                </ul>
                                                <div class="counter">x2</div>
                                            </div>
                                            <div class="product-price">$20</div>
                                            <div class="more">
                                                <svg class="olymp-little-delete">
                                                    <use
                                                        xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-little-delete')}}">
                                                    </use>
                                                </svg>
                                            </div>
                                        </li>
                                        <li class="cart-product-item">
                                            <div class="product-thumb">
                                                <img src="{{asset('site/img/product2.png')}}" alt="product">
                                            </div>
                                            <div class="product-content">
                                                <h6 class="title">Olympus Orange Shirt</h6>
                                                <ul class="rait-stars">
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary"
                                                            aria-hidden="true"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary"
                                                            aria-hidden="true"></i>
                                                    </li>

                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary"
                                                            aria-hidden="true"></i>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star star-icon c-primary"
                                                            aria-hidden="true"></i>
                                                    </li>
                                                    <li>
                                                        <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                    </li>
                                                </ul>
                                                <div class="counter">x1</div>
                                            </div>
                                            <div class="product-price">$40</div>
                                            <div class="more">
                                                <svg class="olymp-little-delete">
                                                    <use
                                                        xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-little-delete')}}">
                                                    </use>
                                                </svg>
                                            </div>
                                        </li>
                                    </ul>

                                    <div class="cart-subtotal">Cart Subtotal:<span>$80</span></div>

                                    <div class="cart-btn-wrap">
                                        <a href="#" class="btn btn-primary btn-sm">Go to Your Cart</a>
                                        <a href="#" class="btn btn-purple btn-sm">Go to Checkout</a>
                                    </div>
                                </div>
                            </li>

                            <li class="menu-search-item">
                                <a href="#" class="nav-link" data-toggle="modal" data-target="#main-popup-search">
                                    <svg class="olymp-magnifying-glass-icon">
                                        <use
                                            xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon')}}">
                                        </use>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ... end Header Standard Landing  -->
    <div class="header-spacer--standard"></div>
    <div class="container">
        <div class="row display-flex">
            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="landing-content">
                    <h1>Welcome to the Biggest Social Network in the World</h1>
                    <p>We are the best and biggest social network with 5 billion active users all around the world.
                        Share you
                        thoughts, write blog posts, show your favourite music via Stopify, earn badges and much more!
                    </p>
                    <a href="#" class="btn btn-md btn-border c-white">Register Now!</a>
                </div>
            </div>

            <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">

                <!-- Login-Registration Form  -->

                <div v class="registration-login-form">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                <svg class="olymp-login-icon">
                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-login-icon')}}">
                                    </use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                        <a href="{{route('login')}}" class="btn btn-success">Login</a>
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