@extends('site.app')

@section('title')
{{$pageTitle}}
@endsection
@section('content')
@include('admin.partials.flash')
<!-- Top Header-Profile -->
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
<!-- ... end Top Header-Profile -->
<!-- ... end Top Header-Profile -->
<div class="container">
    <div class="row">
        <!-- Main Content -->
        <div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div id="newsfeed-items-grid">
                <div class="ui-block">
                    <!-- Post -->
                    @forelse ($user->posts as $post)
                        <article class="hentry post">
                            <div class="post__author author vcard inline-items">
                                <img src="{{ asset('storage/users-avatar/'.$user->avatar) }}" alt="author">
                        
                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">{{$user->name}}</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2017-03-24T18:18">
                                            {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                        </time>
                                    </div>
                                </div>
                                @if (Auth::user()->id == $user->id)
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon">
                                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}">
                                            </use>
                                        </svg>
                                        <ul class="more-dropdown">
                                            <li>
                                                <a href="#">Edit Post</a>
                                            </li>
                                            <li>
                                                <a href="#">Delete Post</a>
                                            </li>
                                            <li>
                                                <a href="#">Turn Off Notifications</a>
                                            </li>
                                            <li>
                                                <a href="#">Select as Featured</a>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    
                                @endif
                            </div>
                            <p>{!!$post->post_content!!}
                            </p>
                            <div class="post-additional-info inline-items">
                                <a href="#" class="post-add-icon inline-items">
                                    <svg class="olymp-heart-icon">
                                        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-heart-icon')}}"></use>
                                    </svg>
                                    <span>8</span>
                                </a>
                                <div class="names-people-likes">
                                    <a href="#">Jenny</a>, <a href="#">Robert</a> and
                                    <br>6 more liked this
                                </div>
                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon')}}">
                                            </use>
                                        </svg>
                                        <span>17</span>
                                    </a>
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-share-icon">
                                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-share-icon')}}"></use>
                                        </svg>
                                        <span>24</span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        
                    @endforelse
                    <!-- .. end Post -->
                </div>
            </div>
        </div>
        <!-- ... end Main Content -->
        <!-- Left Sidebar -->
        <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Profile Intro</h6>
                </div>
                <div class="ui-block-content">
                    <!-- W-Personal-Info -->
                    <ul class="widget w-personal-info item-block">
                        <li>
                            <span class="title">About Me:</span>
                            <span class="text">Hi, I’m James, I’m 36 and I work as a Digital Designer for the
                                “Daydreams” Agency in Pier 56.</span>
                        </li>
                        <li>
                            <span class="title">Favourite TV Shows:</span>
                            <span class="text">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,
                                American Guy.</span>
                        </li>
                        <li>
                            <span class="title">Favourite Music Bands / Artists:</span>
                            <span class="text">Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a
                                Revenge.</span>
                        </li>
                    </ul>

                    <!-- .. end W-Personal-Info -->
                    <!-- W-Socials -->

                    <div class="widget w-socials">
                        <h6 class="title">Other Social Networks:</h6>
                        <a href="#" class="social-item bg-facebook">
                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            Facebook
                        </a>
                        <a href="#" class="social-item bg-twitter">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                            Twitter
                        </a>
                        <a href="#" class="social-item bg-dribbble">
                            <i class="fab fa-dribbble" aria-hidden="true"></i>
                            Dribbble
                        </a>
                    </div>
                    <!-- ... end W-Socials -->
                </div>
            </div>
        </div>
        <!-- ... end Left Sidebar -->
        <!-- Right Sidebar -->
        <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Last Photos</h6>
                </div>
                <div class="ui-block-content">
                    <!-- W-Latest-Photo -->
                    <ul class="widget w-last-photo js-zoom-gallery">
                        <li>
                            <a href="{{asset('site/img/last-photo10-large.jpg')}}">
                                <img src="{{asset('site/img/last-photo10-large.jpg')}}" alt="photo">
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('site/img/last-phot11-large.jpg')}}">
                                <img src="{{asset('site/img/last-phot11-large.jpg')}}" alt="photo">
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('site/img/last-phot12-large.jpg')}}">
                                <img src="{{asset('site/img/last-phot12-large.jpg')}}" alt="photo">
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('site/img/last-phot13-large.jpg')}}">
                                <img src="{{asset('site/img/last-phot13-large.jpg')}}" alt="photo">
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('site/img/last-phot14-large.jpg')}}">
                                <img src="{{asset('site/img/last-phot14-large.jpg')}}" alt="photo">
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('site/img/last-phot15-large.jpg')}}">
                                <img src="{{asset('site/img/last-phot15-large.jpg')}}" alt="photo">
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('site/img/last-phot16-large.jpg')}}">
                                <img src="{{asset('site/img/last-phot16-large.jpg')}}" alt="photo">
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('site/img/last-phot17-large.jpg')}}">
                                <img src="{{asset('site/img/last-phot17-large.jpg')}}" alt="photo">
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('site/img/last-phot18-large.jpg')}}">
                                <img src="{{asset('site/img/last-phot18-large.jpg')}}" alt="photo">
                            </a>
                        </li>
                    </ul>
                    <!-- .. end W-Latest-Photo -->
                </div>
            </div>
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Friends (86)</h6>
                </div>
                <div class="ui-block-content">
                    <!-- W-Faved-Page -->
                    <ul class="widget w-faved-page js-zoom-gallery">
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar38-sm.jpg')}}" alt="author">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar24-sm.jpg')}}" alt="user">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar36-sm.jpg')}}" alt="author">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar35-sm.jpg')}}" alt="user">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar34-sm.jpg')}}" alt="author">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar33-sm.jpg')}}" alt="author">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar32-sm.jpg')}}" alt="user">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar31-sm.jpg')}}" alt="author">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar30-sm.jpg')}}" alt="author">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar29-sm.jpg')}}" alt="user">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar28-sm.jpg')}}" alt="user">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar27-sm.jpg')}}" alt="user">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar26-sm.jpg')}}" alt="user">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="{{asset('site/img/avatar25-sm.jpg')}}" alt="user">
                            </a>
                        </li>
                        <li class="all-users">
                            <a href="#">+74</a>
                        </li>
                    </ul>
                    <!-- .. end W-Faved-Page -->
                </div>
            </div>
        </div>
        <!-- ... end Right Sidebar -->
    </div>
</div>
@endsection