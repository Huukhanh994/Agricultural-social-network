<div class="navbar-collapse">
    <!-- ============================================================== -->
    <!-- toggle and nav items -->
    <!-- ============================================================== -->
    @include('admin.partials.header.navbar-collapse.navbar-nav')
    <!-- ============================================================== -->
    <!-- User profile and search -->
    <!-- ============================================================== -->
    <ul class="navbar-nav my-lg-0">
        <!-- ============================================================== -->
        <!-- View client -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-dark" target="_blank" href="{{ route('site.pages.home') }}" aria-haspopup="true"
                aria-expanded="false"> <i class="fas fa-eye"></i>
                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            @include('admin.partials.header.navbar-collapse.notifications')
        </li>
        <!-- ============================================================== -->
        <!-- Comment -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            @include('admin.partials.header.navbar-collapse.notifications')
        </li>
        <!-- ============================================================== -->
        <!-- End Comment -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Messages -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i>
                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            @include('admin.partials.header.navbar-collapse.messages')
        </li>
        <!-- ============================================================== -->
        <!-- End Messages -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- mega menu -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle waves-effect waves-dark" href=""
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                    class="ti-layout-width-default"></i></a>
            @include('admin.partials.header.navbar-collapse.dropdown-mega')
        </li>
        <!-- ============================================================== -->
        <!-- End mega menu -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- User Profile -->
        <!-- ============================================================== -->
        @include('admin.partials.header.profile')
        <!-- ============================================================== -->
        <!-- End User Profile -->
        <!-- ============================================================== -->
        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light"
                href="javascript:void(0)"><i class="ti-settings"></i></a></li>
    </ul>
</div>