@extends('site.app')
@section('title')
    {{$pageTitle}}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="top-header top-header-favorit">
                    <div class="top-header-thumb">
                        <img loading="lazy" src="{{asset('site/img/top-header2.jpg')}}" alt="nature">
                        <div class="top-header-author">
                            <div class="author-thumb">
                                @if (isset($group->group_avatar))
                                <img loading="lazy" src="{{asset('storage/group_avatar/'.$group->group_avatar)}}" alt="author">
                                @else
                                <img loading="lazy" src="{{asset('site/img/avatar41-sm.jpg')}}" alt="author">
                                @endif
                            </div>
                            <div class="author-content">
                                <a href="#" class="h3 author-name">
                                    @if (isset($group))
                                        {{$group->group_name}}
                                    @else
                                        Lúa giống miền tây
                                    @endif
                                </a>
                                <div class="country">
                                    @if (isset($group))
                                        {{$group->group_code}}
                                    @else
                                        LGMT
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-section">
                        <div class="row">
                            <div class="col col-xl-8 m-auto col-lg-8 col-md-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="#" class="active">Timeline</a>
                                    </li>
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Photos</a>
                                    </li>
                                    <li>
                                        <a href="#">Videos</a>
                                    </li>
                                    <li>
                                        <a href="#">Statistics</a>
                                    </li>
                                    <li>
                                        <a href="#">Events</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="control-block-button">
                            <a href="#" class="btn btn-control bg-primary">
                                <svg class="olymp-star-icon">
                                    <use xlink:href="{{ asset('site/svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use>
                                </svg>
                            </a>

                            <a href="{{ route('site.groups.chat') }}" class="btn btn-control bg-purple">
                                <svg class="olymp-chat---messages-icon">
                                    <use xlink:href="{{ asset('site/svg-icons/sprites/icons.svg#olymp-chat---messages-icon') }}"></use>
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <!-- Main Content Post Versions -->
                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="ui-block">
                            @if (isset($group->posts))
                                <!-- Post -->
                                @forelse ($group->posts as $post)
                                    <article class="hentry post">
                                        <div class="post__author author vcard inline-items">
                                            <img loading="lazy" src="{{asset('storage/users-avatar/'.$post->users['avatar'])}}" alt="author">
                                                <div class="author-date">
                                                    <a class="h6 post__author-name fn" href="{{ route('site.profile.show',$post->users['id']) }}">{{$post->users['name']}}</a>
                                                    <div class="post__date">
                                                        <time class="published" datetime="2017-03-24T18:18">
                                                            {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                                        </time>
                                                    </div>
                                                </div>
                                            @if (Auth::user()->id == $post->users['id'])
                                                <div class="more">
                                                    <svg class="olymp-three-dots-icon">
                                                        <use xlink:href="{{ asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
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
                                            @endif
                                        </div>
                                        <p>{{$post->post_content}}
                                        </p>
                                        <div class="post-additional-info inline-items">
                                            <a href="#" class="like" data-id="{{$post->post_id}}">
                                                <i class="fas fa-thumbs-up"></i>
                                                (
                                                <span class="count_like{{$post->post_id}}">
                                                    {{$post->post_like}}
                                                </span>
                                                )
                                            </a>
                                            <a href="#" class="dislike" data-id="{{$post->post_id}}">
                                                <i class="fas fa-thumbs-down"></i>
                                                (
                                                <span class="count_dislike{{$post->post_id}}">
                                                    {{$post->post_dislike}}
                                                </span>
                                                )
                                            </a>
                                            <div class="comments-shared">
                                                <a href="#" class="post-add-icon inline-items">
                                                    <svg class="olymp-speech-balloon-icon">
                                                        <use xlink:href="{{ asset('site/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon') }}"></use>
                                                    </svg>
                                                    <span>17</span>
                                                </a>
                                    
                                                <a href="#" class="post-add-icon inline-items">
                                                    <svg class="olymp-share-icon">
                                                        <use xlink:href="{{ asset('site/svg-icons/sprites/icons.svg#olymp-share-icon') }}"></use>
                                                    </svg>
                                                    <span>24</span>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                @empty
                                    <h5>Post is empty!</h5>                        
                                @endforelse
                            @else
                                <h3>Not found post in this group!</h3>
                            @endif
                        </div>
                    </div>
                </div>
        </div>

        <div class="col col-xl-3 order-xl-1 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">About 
                        @if (isset($group))
                            {{$group->group_name}}
                        @else
                            Lúa giống miền tây
                        @endif
                    </h6>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon">
                            <use xlink:href="{{ asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
                        </svg></a>
                </div>
                <div class="ui-block-content">

                    <!-- W-Personal-Info -->

                    <ul class="widget w-personal-info item-block">
                        <li>
                            <span class="text">
                                @if (isset($group))
                                    {{$group->group_description}}
                                @else
                                    Mô tả nhóm lúa giống miền tây
                                @endif
                            </span>
                        </li>
                        <li>
                            <span class="title">Category:</span>
                            <span class="text">
                                @if (isset($group->category))
                                    {{$group->category->category_name}}
                                @else
                                    Nông nghiệp
                                @endif
                            </span>
                        </li>
                    </ul>

                    <!-- ... end W-Personal-Info -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            $('.like').click(function(e) {
                e.preventDefault();
                var postId = $(this).attr("data-id");
                $.ajax({
                    type: "POST",
                    url: "{{route('site.posts.like')}}",
                    data: {postId: postId},
                    dataType: "JSON",
                    success: function (response) {
                        $('.count_like'+postId).text(parseInt(response.post_like));
                    }
                });
            });

            $('.dislike').click(function(e) {
                e.preventDefault();
                e.preventDefault();
                var postId = $(this).attr("data-id");
                $.ajax({
                    type: "POST",
                    url: "{{route('site.posts.dislike')}}",
                    data: {postId: postId},
                    dataType: "JSON",
                    success: function (response) {
                        $('.count_dislike'+postId).text(parseInt(response.post_dislike));
                    }
                });
            })
        });
</script>
@endpush