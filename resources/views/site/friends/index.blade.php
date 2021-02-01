@extends('site.app')
@section('title')
    {{$pageTitle}}
@endsection
@push('css')
    <style>
        .block-success{
            background: gray;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
@endpush
@section('content')
@include('site.partials.profile.profile_header')
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
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon')}}"></use>
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
                    <div class="{{$friend->id}}ui-block">
                        <!-- Friend Item -->
                        <div class="friend-item">
                            <div class="friend-header-thumb">
                                <img src="{{asset('site/img/friend1.jpg')}}" alt="friend">
                            </div>
                            <div class="friend-item-content">
                                <div class="more">
                                    <svg class="olymp-three-dots-icon">
                                        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                                    </svg>
                                    <ul class="more-dropdown">
                                        <li>
                                            <a href="#" class="unBlock-friend" onclick="unBlockUser(this,event);" data-id="{{$friend->id}}"
                                                data-userName="{{$friend->name}}">UnBlock Profile</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block-friend" onclick="blockUser(this,event);" data-id="{{$friend->id}}" data-userName="{{$friend->name}}">Block Profile</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="friend-avatar">
                                    <div class="author-thumb">
                                        <img src="{{asset('storage/users-avatar/'.$friend->avatar)}}" alt="author" style="width: 92px; height: 92px;">
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
                                                    <div class="h6">{{$count_friend[0]->count_friend}}</div>
                                                    <div class="title">Friends</div>
                                                </a>
                                                <a href="#" class="friend-count-item">
                                                    <div class="h6"><span id="{{$friend->id}}count_followers">{{$friend->followers()->count()}}</span></div>
                                                    <div class="title">Followers</div>
                                                </a>
                                                <a href="#" class="friend-count-item">
                                                    <div class="h6"><span id="{{$friend->id}}count_following">{{$friend->following()->count()}}</span></div>
                                                    <div class="title">Following</div>
                                                </a>
                                                <button class="btn btn-primary btn-sm action-follow"
                                                    data-id="{{ $friend->id }}" data-userName="{{$friend->name}}"><strong>
                                                    Follow
                                                    </strong></button>
                                                <button class="btn btn-primary btn-sm action-unFollow" data-id="{{ $friend->id }}"
                                                    data-userName="{{$friend->name}}"><strong>
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

        // block
        function blockUser(obj, event){
            event.preventDefault();
            var id = $(obj).attr('data-id');
            var name = $(obj).attr("data-userName");
            $.ajax({
                type: "POST",
                url: "{{ route('site.friends.block') }}",
                data: {id:id, name:name},
                dataType: "JSON",
                success: function (response) {
                    toastr.warning("Block this user successfully!", 'Event');
                    var idUiBlock = $(obj).parent().parent().parent().parent().parent().parent().attr('class').substr(0,1);
                    $('.'+idUiBlock+'ui-block').addClass("block-success");
                }
            });
        }

        // unBlock
        function unBlockUser(obj, event){
            event.preventDefault();
            var id = $(obj).attr('data-id');
            var name = $(obj).attr("data-userName");
            $.ajax({
                type: "POST",
                url: "{{ route('site.friends.unBlock') }}",
                data: {id:id, name:name},
                dataType: "JSON",
                success: function (response) {
                    // displayMessage("Unlock this user successfully");
                    toastr.success("Unlock this user successfully", 'Event');
                    var idUiBlock = $(obj).parent().parent().parent().parent().parent().parent().attr('class').substr(0,1);
                    $('.'+idUiBlock+'ui-block').removeClass('block-success');
                }
            });
        }

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
</script>
@endsection