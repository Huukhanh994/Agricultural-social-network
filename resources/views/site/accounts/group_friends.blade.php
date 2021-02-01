@extends('site.app')

@section('title')
    {{$pageTitle}}
@endsection

@section('content')
    @include('site.partials.profile.profile_header')
    <!-- Main Content Groups -->
    
    <div class="container">
        <div class="row">
            <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
    
                <!-- Friend Item -->
    
                <div class="friend-item friend-groups create-group" data-mh="friend-groups-item">
    
                    <a href="#" class="  full-block" data-toggle="modal" data-target="#create-friend-group-1"></a>
                    <div class="content">
    
                        <a href="#" class="  btn btn-control bg-blue" data-toggle="modal"
                            data-target="#create-friend-group-1">
                            <svg class="olymp-plus-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-plus-icon')}}"></use>
                            </svg>
                        </a>
    
                        <div class="author-content">
                            <a href="#" class="h5 author-name">My Family</a>
                            <div class="country">6 Friends in the Group</div>
                        </div>
    
                    </div>
    
                </div>
    
                <!-- ... end Friend Item -->
            </div>
    
            <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="ui-block" data-mh="friend-groups-item">
    
                    <!-- Friend Item -->
    
                    <div class="friend-item friend-groups">
    
                        <div class="friend-item-content">
    
                            <div class="more">
                                <svg class="olymp-three-dots-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                                </svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="#">Report Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Block Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Turn Off Notifications</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="friend-avatar">
                                <div class="author-thumb">
                                <img src="{{asset('site/img/logo.png')}}" alt="Olympus">
                                </div>
                                <div class="author-content">
                                    <a href="#" class="h5 author-name">My Family</a>
                                    <div class="country">6 Friends in the Group</div>
                                </div>
                            </div>
    
                            <ul class="friends-harmonic">
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic5.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic10.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic7.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic8.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic2.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/avatar30-sm.jpg')}}" alt="author">
                                    </a>
                                </li>
                            </ul>
    
    
                            <div class="control-block-button">
                                <a href="#" class="  btn btn-control bg-blue" data-toggle="modal"
                                    data-target="#create-friend-group-add-friends">
                                    <svg class="olymp-happy-faces-icon">
                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-happy-faces-icon')}}"></use>
                                    </svg>
                                </a>
    
                                <a href="#" class="btn btn-control btn-grey-lighter">
                                    <svg class="olymp-settings-icon">
                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-settings-icon')}}"></use>
                                    </svg>
                                </a>
    
                            </div>
                        </div>
                    </div>
    
                    <!-- ... end Friend Item -->
                </div>
            </div>
            <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="ui-block" data-mh="friend-groups-item">
    
                    <!-- Friend Item -->
    
                    <div class="friend-item friend-groups">
    
                        <div class="friend-item-content">
    
                            <div class="more">
                                <svg class="olymp-three-dots-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                                </svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="#">Report Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Block Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Turn Off Notifications</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="friend-avatar">
                                <div class="author-thumb">
                                <img src="{{asset('site/img/friend-group1.png')}}" alt="photo">
                                </div>
                                <div class="author-content">
                                    <a href="#" class="h5 author-name">Daydreams Coworkers</a>
                                    <div class="country">24 Friends in the Group</div>
                                </div>
                            </div>
    
                            <ul class="friends-harmonic">
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic1.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic2.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic3.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic4.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic5.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic6.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic7.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic8.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic9.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="all-users bg-blue">+15</a>
                                </li>
                            </ul>
    
                            <div class="control-block-button">
                                <a href="#" class="  btn btn-control bg-blue" data-toggle="modal"
                                    data-target="#create-friend-group-add-friends">
                                    <svg class="olymp-happy-faces-icon">
                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-happy-faces-icon')}}"></use>
                                    </svg>
                                </a>
    
                                <a href="#" class="btn btn-control btn-grey-lighter">
                                    <svg class="olymp-settings-icon">
                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-settings-icon')}}"></use>
                                    </svg>
                                </a>
                            </div>
    
                        </div>
                    </div>
    
                    <!-- ... end Friend Item -->
                </div>
            </div>
            <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="ui-block" data-mh="friend-groups-item">
    
                    <!-- Friend Item -->
    
                    <div class="friend-item friend-groups">
    
                        <div class="friend-item-content">
    
                            <div class="more">
                                <svg class="olymp-three-dots-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                                </svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="#">Report Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Block Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Turn Off Notifications</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="friend-avatar">
                                <div class="author-thumb">
                                    <img src="{{asset('site/img/friend-group2.jpg')}}" alt="photo">
                                </div>
                                <div class="author-content">
                                    <a href="#" class="h5 author-name">Close Friends</a>
                                    <div class="country">4 Friends in the Group</div>
                                </div>
                            </div>
    
                            <ul class="friends-harmonic">
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic5.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic10.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic7.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('site/img/friend-harmonic8.jpg')}}" alt="friend">
                                    </a>
                                </li>
                                <li>
                            </ul>
    
    
                            <div class="control-block-button">
                                <a href="#" class="  btn btn-control bg-blue" data-toggle="modal"
                                    data-target="#create-friend-group-add-friends">
                                    <svg class="olymp-happy-faces-icon">
                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-happy-faces-icon')}}"></use>
                                    </svg>
                                </a>
    
                                <a href="#" class="btn btn-control btn-grey-lighter">
                                    <svg class="olymp-settings-icon">
                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-settings-icon')}}"></use>
                                    </svg>
                                </a>
    
                            </div>
    
    
                        </div>
                    </div>
    
                    <!-- ... end Friend Item -->
                </div>
            </div>
        </div>
    </div>
@endsection