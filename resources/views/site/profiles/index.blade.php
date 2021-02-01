@extends('site.app')

@section('title')
    {{$pageTitle}}
@endsection
@section('content')
    @include('admin.partials.flash')
    <!-- Top Header-Profile -->
    @include('site.partials.profile.profile_header')
    <!-- ... end Top Header-Profile -->
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                <div id="newsfeed-items-grid">
                    <div class="ui-block">
                        <!-- Post -->
                        @if (isset($posts))
                            @foreach ($posts as $post)
                                <article class="hentry post">
                                
                                    <div class="post__author author vcard inline-items">
                                        <img src="{{asset('/storage/users-avatar/'.Auth::user()->avatar)}}" alt="author">
                                
                                        <div class="author-date">
                                            <a class="h6 post__author-name fn" href="#">{{Auth::user()->name}}</a>
                                            <div class="post__date">
                                                <time class="published" datetime="2017-03-24T18:18">
                                                    {{$post->created_at->diffForHumans()}}
                                                </time>
                                            </div>
                                        </div>
                                        <div class="more">
                                            <svg class="olymp-three-dots-icon">
                                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
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
                                    </div>
                                    <div class="control-block-button post-control-button">
                                        <a href="#" class="btn btn-control featured-post">
                                            <svg class="olymp-trophy-icon">
                                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-trophy-icon')}}"></use>
                                            </svg>
                                        </a>
                                
                                        <a href="#" class="btn btn-control">
                                            <svg class="olymp-like-post-icon">
                                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-like-post-icon')}}"></use>
                                            </svg>
                                        </a>
                                
                                        <a href="#" class="btn btn-control">
                                            <svg class="olymp-comments-post-icon">
                                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-comments-post-icon')}}"></use>
                                            </svg>
                                        </a>
                                
                                        <a href="#" class="btn btn-control">
                                            <svg class="olymp-share-icon">
                                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-share-icon')}}"></use>
                                            </svg>
                                        </a>
                                
                                    </div>
                                
                                </article>
                            @endforeach
                        @endif

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
                            @if (isset($posts))
                                @forelse ($posts as $post)
                                    @if (count($post->images) > 0)
                                        @foreach ($post->images as $image)
                                            <li>
                                                <a href="{{asset('images/posts/'.$image->post_image_path)}}">
                                                    <img src="{{asset('images/posts/'.$image->post_image_path)}}" alt="photo">
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                @empty
                                    
                                @endforelse
                            @endif
                        </ul>
                        <!-- .. end W-Latest-Photo -->
                    </div>
                </div>
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Friends (
                            @if (isset($sumFriend))
                                {{$sumFriend}}
                            @else
                                0
                            @endif
                            )</h6>
                    </div>
                    <div class="ui-block-content">
                        <!-- W-Faved-Page -->
                        <ul class="widget w-faved-page js-zoom-gallery">
                            @forelse ($friends as $friend)
                                @if ($friend->id != Auth::user()->id)
                                    <li>
                                        <a href="{{asset('storage/users-avatar/'.$friend->avatar)}}">
                                            <img src="{{asset('storage/users-avatar/'.$friend->avatar)}}" alt="author">
                                        </a>
                                    </li>
                                @endif
                            @empty
                                <p>Not found friend.</p>
                            @endforelse
                        </ul>
                        <!-- .. end W-Faved-Page -->
                    </div>
                </div>
            </div>
            <!-- ... end Right Sidebar -->
        </div>
    </div>
@endsection