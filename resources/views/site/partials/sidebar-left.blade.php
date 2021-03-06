<div class="fixed-sidebar">
    <div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

        <a href="{{route('site.pages.home')}}" class="logo">
            <div class="img-wrap">
                <img src="{{asset('site/img/logo.png')}}" alt="Olympus">
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="left-menu">
                @if (Auth::check())
                    <li>
                        <a href="#" class="js-sidebar-open">
                            <svg class="olymp-menu-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="OPEN MENU">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('site.pages.home')}}">
                            <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="NEWSFEED">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-newsfeed-icon')}}"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('site.groups.index')}}">
                            <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="FRIEND GROUPS">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-happy-faces-icon')}}"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('site.products.index')}}">
                            <svg class="olymp-headphones-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="PRODUCTS">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-headphones-icon')}}"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('site.experience_farms.list')}}">
                            <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="EXPERIENCE FARM">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-manage-widgets-icon')}}"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('site.posts.create-summernote')}}">
                            <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="CREATE ARTICLE">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-status-icon')}}"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('site.events.index')}}">
                            <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="EVENTS">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-calendar-icon') }}"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('site.posts.maps')}}">
                            <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="POSTS MAP">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-add-a-place-icon') }}"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('site.pages.index')}}">
                            <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="PAGES">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-photos-icon') }}"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('site.weathers.index')}}">
                            <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="WEATHERS">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-weather-icon') }}"></use>
                            </svg>
                        </a>
                    </li>
                @else
                <li>
                    <a href="{{route('site.products.index')}}">
                        <svg class="olymp-headphones-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="PRODUCTS">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-headphones-icon')}}"></use>
                        </svg>
                    </a>
                </li>
                @endif
                @can('role-list')
                    <li>
                        <a href="{{url('/roles')}}">
                            <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="ROLE & PERMISSION">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-badge-icon')}}"></use>
                            </svg>
                        </a>
                    </li>
                @endcan
                @can('user-list')
                    <li>
                        <a href="{{url('/users')}}">
                            <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="Users">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-happy-sticker-icon') }}"></use>
                            </svg>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>

    <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
        <a href="{{route('site.pages.home')}}" class="logo">
            <div class="img-wrap">
                <img src="{{asset('site/img/logo.png')}}" alt="Olympus">
            </div>
            <div class="title-block">
                <h6 class="logo-title">olympus</h6>
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-close-icon left-menu-icon">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Collapse Menu</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('site.pages.home')}}">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="NEWSFEED">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-newsfeed-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Newsfeed</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('site.groups.index')}}">
                        <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="FRIEND GROUPS">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-happy-faces-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Friend Groups</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('site.products.index')}}">
                        <svg class="olymp-headphones-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="PRODUCTS">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-headphones-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Music & Playlists</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-weather-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="WEATHER APP">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-weather-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Weather App</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-calendar-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="CALENDAR AND EVENTS">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-calendar-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Calendar and Events</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-cupcake-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="Friends Birthdays">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-cupcake-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Friends Birthdays</span>
                    </a>
                </li>
            </ul>

            <div class="profile-completion">

                <div class="skills-item">
                    <div class="skills-item-info">
                        <span class="skills-item-title">Profile Completion</span>
                        <span class="skills-item-count"><span class="count-animate" data-speed="1000"
                                data-refresh-interval="50" data-to="76" data-from="0"></span><span
                                class="units">76%</span></span>
                    </div>
                    <div class="skills-item-meter">
                        <span class="skills-item-meter-active bg-primary" style="width: 76%"></span>
                    </div>
                </div>

                <span>Complete <a href="#">your profile</a> so people can know more about you!</span>

            </div>
        </div>
    </div>
</div>

<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar fixed-sidebar-responsive">

    <div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
        <a href="#" class="logo js-sidebar-open">
            <img src="{{asset('site/img/logo.png')}}" alt="Olympus">
        </a>

    </div>

    <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
        <a href="#" class="logo">
            <div class="img-wrap">
                <img src="{{asset('site/img/logo.png')}}" alt="Olympus">
            </div>
            <div class="title-block">
                <h6 class="logo-title">olympus</h6>
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">

            <div class="control-block">
                <div class="author-page author vcard inline-items">
                    <div class="author-thumb">
                        <img alt="author" src="{{asset('site/img/author-page.jpg')}}" class="avatar">
                        <span class="icon-status online"></span>
                    </div>
                    <a href="{{route('site.profile.index')}}" class="author-name fn">
                        <div class="author-title">
                            @if (Auth::check())
                                {{Auth::user()->name}}
                            @endif<svg class="olymp-dropdown-arrow-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>

            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">MAIN SECTIONS</h6>
            </div>

            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-close-icon left-menu-icon">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Collapse Menu</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('site.pages.home')}}">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="NEWSFEED">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-newsfeed-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Newsfeed</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="FAV PAGE">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-star-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Fav Pages Feed</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-happy-faces-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="FRIEND GROUPS">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-happy-faces-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Friend Groups</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-headphones-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="PRODUCTS">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-headphones-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Music & Playlists</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-weather-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="WEATHER APP">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-weather-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Weather App</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-calendar-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="CALENDAR AND EVENTS">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-calendar-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Calendar and Events</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-badge-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="Community Badges">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-badge-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Community Badges</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-cupcake-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="Friends Birthdays">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-cupcake-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Friends Birthdays</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-stats-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="Account Stats">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-stats-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Account Stats</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-manage-widgets-icon left-menu-icon" data-toggle="tooltip"
                            data-placement="right" data-original-title="Manage Widgets">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-manage-widgets-icon')}}"></use>
                        </svg>
                        <span class="left-menu-title">Manage Widgets</span>
                    </a>
                </li>
            </ul>

            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">YOUR ACCOUNT</h6>
            </div>

            <ul class="account-settings">
                <li>
                    <a href="#">

                        <svg class="olymp-menu-icon">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use>
                        </svg>

                        <span>Profile Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('site.account.orders')}}">
                        <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                            data-original-title="FAV PAGE">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-star-icon')}}"></use>
                        </svg>
                
                        <span>Orders history</span>
                    </a>
                </li>
                @can('experience-farm-list')
                    <li>
                        <a href="{{route('site.experience_farms.index')}}">
                            <svg class="olymp-star-icon left-menu-icon" data-toggle="tooltip" data-placement="right"
                                data-original-title="FAV PAGE">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-star-icon')}}"></use>
                            </svg>
                    
                            <span>Experience Farms</span>
                        </a>
                    </li>
                @endcan
                <li>
                    <a href="#">
                        <svg class="olymp-logout-icon">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-logout-icon')}}"></use>
                        </svg>

                        <span>Log Out</span>
                    </a>
                </li>
            </ul>

            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">About Olympus</h6>
            </div>

            <ul class="about-olympus">
                <li>
                    <a href="#">
                        <span>Terms and Conditions</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>FAQs</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>Careers</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>Contact</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>