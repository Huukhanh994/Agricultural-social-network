<div class="control-icon more has-items">
    <svg class="olymp-happy-face-icon">
        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use>
    </svg>
    <div class="label-avatar bg-blue">6</div>

    <div class="more-dropdown more-with-triangle triangle-top-center">
        <div class="ui-block-title ui-block-title-small">
            <h6 class="title">FRIEND REQUESTS</h6>
            <a href="#">Find Friends</a>
            <a href="#">Settings</a>
        </div>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="notification-list friend-requests">
                @yield('friends-content')
            </ul>
        </div>

        <a href="#" class="view-all bg-blue">Check all your Events</a>
    </div>
</div>