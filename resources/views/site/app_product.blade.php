
<!DOCTYPE html>
<html lang="en">
<head>

	<title> @yield('title-content') </title>
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('site/img/logo.png')}}">
	@include('site.partials.products.head')
	@stack('css')
</head>
<body class="body-bg-white">
<!-- Preloader -->

@include('site.partials.products.preloader')
<!-- Stunning header -->

@include('site.partials.products.stunning-header')
<!-- End Stunning header -->
@yield('content')

{{-- @include('site.partials.products.product-review') --}}

@include('site.partials.products.product-related')

@include('site.partials.products.human')

@include('site.modal.add-review')

<!-- ... end Popup Write Rewiev -->
@include('site.partials.products.back-to-top')


@include('site.partials.products.scripts.js')
@stack('scripts')
</body>
</html>