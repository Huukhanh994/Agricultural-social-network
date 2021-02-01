@extends('site.app')
@section('title')
{{$pageTitle}}
@endsection
@section('content')
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
                                        <a href="{{ route('site.friends.show',$user->id) }}">Friends</a>
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
                        @if (isset($user->avatar))
                        <img src="{{ asset('storage/users-avatar/'.$user->avatar) }}" alt="author"
                            class="author-thumb">
                        @else
                        <a href="#" class="author-thumb">
                            <img src="{{asset('site/img/author-main1.jpg')}}" alt="author">
                        </a>
                        @endif
                        <div class="author-content">
                            <a href="#" class="h4 author-name">
                                {{$user->name}}
                            </a>
                            <div class="country">
                                @if (isset($user->wards))
                                    {{$user->wards['ward_name']}}
                                @else

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block responsive-flex">
                <div class="ui-block-title">
                    <div class="h6 title">James’s Friends (86)</div>
                    <form class="w-search">
                        <div class="form-group with-button">
                            <input class="form-control" type="text" placeholder="Search Friends...">
                            <button>
                                <svg class="olymp-magnifying-glass-icon">
                                    <use
                                        xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon')}}">
                                    </use>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                        </svg></a>
                </div>
            </div>
            {{-- @include('site.friends.userList', ['users'=>$users]) --}}
        </div>
    </div>
</div>
<!-- Friends -->
<div class="container">
    <div class="row">
        @forelse ($friends as $friend)
        @if ($friend->id != Auth::user()->id)
        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="ui-block">
                <!-- Friend Item -->
                <div class="friend-item">
                    <div class="friend-header-thumb">
                        <img src="{{asset('site/img/friend1.jpg')}}" alt="friend">
                    </div>
                    <div class="friend-item-content">
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}">
                                </use>
                            </svg>
                            <ul class="more-dropdown">
                                <li>
                                    <a href="#">Report Profile</a>
                                </li>
                                <li>
                                    <a href="#" class="block-friend" data-id="{{$friend->id}}">Block Profile</a>
                                </li>
                                <li>
                                    <a href="#">Turn Off Notifications</a>
                                </li>
                            </ul>
                        </div>
                        <div class="friend-avatar">
                            <div class="author-thumb">
                                <img src="{{asset('site/img/avatar1.jpg')}}" alt="author">
                            </div>
                            <div class="author-content">
                                <a href="#" class="h5 author-name">{{$friend->name}}</a>
                                <div class="country"></div>
                            </div>
                        </div>
                        <div class="swiper-container" data-slide="fade">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="friend-count" data-swiper-parallax="-500">
                                        <a href="#" class="friend-count-item">
                                            <div class="h6"></div>
                                            <div class="title">Friends</div>
                                        </a>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6"><span
                                                    id="{{$friend->id}}count_followers">{{$friend->followers()->count()}}</span>
                                            </div>
                                            <div class="title">Followers</div>
                                        </a>
                                        <a href="#" class="friend-count-item">
                                            <div class="h6"><span
                                                    id="{{$friend->id}}count_following">{{$friend->following()->count()}}</span>
                                            </div>
                                            <div class="title">Following</div>
                                        </a>
                                        <button class="btn btn-primary btn-sm action-follow" data-id="{{ $friend->id }}"
                                            data-userName="{{$friend->name}}"><strong>
                                                Follow
                                            </strong></button>
                                        <button class="btn btn-primary btn-sm action-unFollow"
                                            data-id="{{ $friend->id }}" data-userName="{{$friend->name}}"><strong>
                                                UnFollow
                                            </strong></button>
                                    </div>
                                    <div class="control-block-button" data-swiper-parallax="-100">
                                        <a href="#" class="btn btn-control bg-blue">
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

                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <p class="friend-about" data-swiper-parallax="-500">
                                        Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time
                                        mother.
                                    </p>
                                    <div class="friend-since" data-swiper-parallax="-100">
                                        <span>Friends Since:</span>
                                        <div class="h6">December 2014</div>
                                    </div>
                                </div>
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                <!-- ... end Friend Item -->
            </div>
        </div>
        @endif
        @empty
            Not found friend.
        @endforelse
    </div>
</div>
@endsection
@section('custom_js')
<script type="text/javascript">
    $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.action-follow').click(function(){
                var userId = $(this).attr('data-id');
                var userName = $(this).attr('data-userName');
                $.ajax({
                    type: "POST",
                    url: "{{route('site.profile.follow')}}",
                    data: {userId: userId, userName: userName},
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response.count);
                        $("#"+userId+"count_following").text(response.count);
                    }
                });
            });

            $('.action-unFollow').click(function(){
                var userId = $(this).attr('data-id');
                var userName = $(this).attr('data-userName');
                $.ajax({
                    type: "POST",
                    url: "{{route('site.profile.unFollow')}}",
                    data: {userId: userId, userName: userName},
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response.count);
                        $("#"+userId+"count_following").text(response.count);
                    }
                });
            });
        });
</script>
@endsection