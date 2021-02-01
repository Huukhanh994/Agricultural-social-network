
<!-- Top Header-Profile -->
<div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="top-header">
                        <div class="top-header-thumb">
                            <img src="{{asset('site/img/top-header1.jpg')}}" alt="nature">
                        </div>
                        <div class="profile-section">
                            <div class="row">
                                <div class="col col-lg-5 col-md-5 col-sm-12 col-12">
                                    <ul class="profile-menu">
                                        <li>
                                            <a href="02-ProfilePage.html" class="active">Timeline</a>
                                        </li>
                                        <li>
                                            <a href="05-ProfilePage-About.html">About</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('site.friends.index') }}">Friends </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
                                    <ul class="profile-menu">
                                        <li>
                                            <a href="07-ProfilePage-Photos.html">Photos</a>
                                        </li>
                                        <li>
                                            <a href="09-ProfilePage-Videos.html">Videos</a>
                                        </li>
                                        <li>
                                            <div class="more">
                                                <svg class="olymp-three-dots-icon">
                                                    <use
                                                        xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}">
                                                    </use>
                                                </svg>
                                                <ul class="more-dropdown more-with-triangle">
                                                    <li>
                                                        <a href="#">Report Profile</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Block Profile</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
    
                            <div class="control-block-button">
                                <a href="35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue">
                                    <svg class="olymp-happy-face-icon">
                                        <use
                                            xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}">
                                        </use>
                                    </svg>
                                </a>
    
                                <a href="#" class="btn btn-control bg-purple">
                                    <svg class="olymp-chat---messages-icon">
                                        <use
                                            xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-chat---messages-icon')}}">
                                        </use>
                                    </svg>
                                </a>
    
                                <div class="btn btn-control bg-primary more">
                                    <svg class="olymp-settings-icon">
                                        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-settings-icon')}}">
                                        </use>
                                    </svg>
    
                                    <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#update-header-photo">Update
                                                Profile Photo</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#update-header-photo">Update
                                                Header Photo</a>
                                        </li>
                                        <li>
                                            <a href="{{route('site.accounts.index')}}">Account Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="top-header-author">
                            @if (isset(Auth::user()->avatar))
                                <img src="{{ asset('storage/users-avatar/'.Auth::user()->avatar) }}" alt="author" class="author-thumb">
                            @else
                                <a href="02-ProfilePage.html" class="author-thumb">
                                    <img src="{{asset('site/img/author-main1.jpg')}}" alt="author">
                                </a>
                            @endif
                            {{-- <div class="btn-group dropright">
                                <a href="#" class="author-thumb dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{asset('site/img/author-main1.jpg')}}" alt="author">
                                </a>
                                <div class="dropdown-menu">
                                    <!-- Dropdown menu links -->
                                    <a class="dropdown-item" href="#">View profile picture </a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bs-example-modal-lg"
                                        class="model_img img-responsive">Update profile picture</a>
                                </div>
                            </div> --}}
                            <div class="author-content">
                                <a href="02-ProfilePage.html" class="h4 author-name">
                                    @if (Auth::check())
                                    {{ Auth::user()->name }}
                                    @endif
                                </a>
                                <div class="country"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- ... end Top Header-Profile -->
