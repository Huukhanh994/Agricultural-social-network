<!DOCTYPE html>
<html lang="en">

<head>
    @include('site.partials.head')
</head>

<body class="page-has-left-panels page-has-right-panels">
    <!-- Preloader -->
    @include('site.partials.preloader')
    <!-- ... end Preloader -->
    <!-- Fixed Sidebar Left -->
    @include('site.partials.sidebar-left')
    <!-- ... end Fixed Sidebar Left -->
    <!-- Fixed Sidebar Right -->
    @include('site.partials.sidebar-right')
    <!-- ... end Fixed Sidebar Right-Responsive -->
    <!-- Header-BP -->
    @include('site.partials.header-main')
    <!-- ... end Responsive Header-BP -->
    <div class="header-spacer"></div>
    <div id="app">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    @include('site.partials.upload.upload-header-photo')
    @include('site.partials.upload.upload-profile-photo')
    @include('site.partials.back-to-top')
    @include('site.partials.popup-chat')
    <!-- ... end Window-popup-CHAT for responsive min-width: 768px -->
    @include('site.partials.footer.js')
    <!-- Scripts -->
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
</body>

</html>