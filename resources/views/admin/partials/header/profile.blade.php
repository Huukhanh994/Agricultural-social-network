<li class="nav-item dropdown u-pro">
    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/images/users/1.jpg')}}" alt="user"
            class="">
            @if (Auth::check())
                <span class="hidden-md-down">{{ Auth::user()->name }}<i class="fa fa-angle-down"></i></span>
            @else
                <span class="hidden-md-down">Mark <i class="fa fa-angle-down"></i></span>
            @endif
        </a>
    <div class="dropdown-menu dropdown-menu-right animated flipInY">
        <!-- text-->
        <a href="{{route('admin.profiles.index')}}" class="dropdown-item"><i class="ti-user"></i> My
            Profile</a>
        <!-- text-->
        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My
            Balance</a>
        <!-- text-->
        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
        <!-- text-->
        <div class="dropdown-divider"></div>
        <!-- text-->
        <a href="{{route('admin.accounts.index')}}" class="dropdown-item"><i class="ti-settings"></i> Account
            Setting</a>
        <!-- text-->
        <div class="dropdown-divider"></div>
        <!-- text-->
        <a href="{{ route('admin.logout') }}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
        <!-- text-->
    </div>
</li>