<div class="author-page author vcard inline-items more">
    <div class="author-thumb">
        @if (isset(Auth::user()->avatar))
            <img alt="author" src="{{asset('storage/users-avatar/'.Auth::user()->avatar)}}" class="avatar"
                style="width: 36px; height:36px">
        @else
            <img src="{{asset('site/img/avatar55-sm.jpg')}}" alt="author">
        @endif
        <span class="icon-status online"></span>
        <div class="more-dropdown more-with-triangle">
            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Your Account</h6>
                </div>

                <ul class="account-settings">
                    <li>
                        <a href="{{route('site.profile.index')}}">

                            <svg class="olymp-menu-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use>
                            </svg>

                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('site.saves.index') }}">
                            <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="SAVED">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-check-icon')}}"></use>
                            </svg>
                            <span>Saved</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('site.account.orders')}}">
                            <svg class="olymp-calendar-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="ORDER HISTORY">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-calendar-icon')}}"></use>
                            </svg>
                    
                            <span>Orders history</span>
                        </a>
                    </li>
                    @can('experience-farm-list')
                    <li>
                        <a href="{{route('site.experience_farms.index')}}">
                            <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="EXPERIECEN FARM">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-star-icon')}}"></use>
                            </svg>
                            <span>Experience Farm</span>
                        </a>
                    </li>
                    @endcan
                    <li>
                        <a href="{{ route('site.logout') }}">
                            <svg class="olymp-logout-icon" data-toggle="tooltip" data-placement="right" data-original-title="LOGOUT">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-logout-icon')}}"></use>
                            </svg>
                    
                            <span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <a href="{{route('site.profile.index')}}" class="author-name fn">
        <div class="author-title">
            @if (Auth::check())
                {{ Auth::user()->name }}
            @else
                Guest
            @endif
            <svg class="olymp-dropdown-arrow-icon">
                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use>
            </svg>
        </div>
    </a>
</div>