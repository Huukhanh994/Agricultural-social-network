@push('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
@endpush
@if (isset($posts))
    @foreach ($posts as $post)
        <div class="ui-block">
            <article class="hentry post video">
                <div class="post__author author vcard inline-items">
                    <img src="{{asset('storage/users-avatar/'.$post->users['avatar'])}}" alt="author">
                    <div class="author-date">
                        <a class="h6 post__author-name fn" href="#">{{$post->users['name']}}</a>
                        <div class="post__date">
                            <time class="published" datetime="2004-07-24T18:18">
                                {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                            </time>
                        </div>
                    </div>
                    @if (Auth::check())
                        @if ($post->users['id'] === Auth::user()->id)
                        <div class="more"><svg class="olymp-three-dots-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                            </svg>
                            <ul class="more-dropdown">
                                <li>
                                    <a href="{{route('site.posts.edit',$post->post_id)}}">Edit Post</a>
                                </li>
                                <li>
                                    <a href="{{route('site.posts.delete',$post->post_id)}}">Delete Post</a>
                                </li>
                            </ul>
                        </div>
                        @else
                        
                        @endif
                    @endif
                </div>
                <h5><a href="{{route('site.posts.show_slug',$post->post_slug)}}">{{$post->post_title}}</a></h5>
                <p>{!!$post->post_content!!}</p>
                @if (isset($post->images))
                <div class="post-video">
                    @foreach ($post->images as $image)
                    <div class="video-thumb">
                        <img src="{{asset('images/posts/'.$image->post_image_path)}}" alt="photo" style="width:566px; height:366px">
                    </div>
                    @endforeach
                    <div class="video-content">
                        <a href="{{route('site.posts.show_slug',$post->post_slug)}}"
                            class="h4 title">{{$post->post_title}}</a>
                        <p>Lorem ipsum dolor sit amet, consectetur ipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua...
                        </p>
                    </div>
                </div>
                {{-- @include('site.posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->post_id]) --}}
                @include('site.posts.showComments',['comments' => $post->comments,'post_id' => $post->post_id])
                @endif
                <div class="post-additional-info inline-items">
                    <a href="#" class="post-add-icon inline-items" data-id="{{$post->post_id}}">
                        <svg class="olymp-heart-icon">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-heart-icon')}}"></use>
                        </svg>
                        {{-- <span id="countLike{{$post->post_id}}">{{ $post->likers()->count() }}</span> --}}
                    </a>
                    <a href="#" class="like" data-id="{{$post->post_id}}">
                        <img src="{{asset('site/img/icon-chat27.png')}}" alt="icon">
                    </a>
                    <span class="count_like{{$post->post_id}}">
                        {{$post->post_like}}
                    </span>
                    <a href="#" class="dislike" data-id="{{$post->post_id}}">
                        <img src="{{asset('site/img/icon-chat29.png')}}" alt="icon">
                    </a>
                    <span class="count_dislike{{$post->post_id}}">
                        {{$post->post_dislike}}
                    </span>
                    {{-- <a href="#" class="like" data-id="{{$post->post_id}}">
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
                    </a> --}}
                    <div class="names-people-likes">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous"
                            src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=1044383589264310&autoLogAppEvents=1"
                            nonce="Js8qMaRf"></script>
                        <div class="fb-share-button"
                            data-href="http://127.0.0.1:8000/posts/{{$post->post_slug}}/post" data-layout="button_count" data-size="small">
                            <a target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
                                class="fb-xfbml-parse-ignore">Share</a>
                        </div>
                    </div>
                </div>
                <div class="control-block-button post-control-button">
                    <a href="{{route('site.orders.index',$post->post_id)}}" class="btn btn-control">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                    @if (Auth::check())
                        @if (count($saves) > 0)
                            @foreach ($saves as $save)
                                @if ($save->post_id == $post->post_id)
                                    <a href="#" class="btn btn-control" style="background: #37bd37;">
                                        <svg class="olymp-comments-post-icon">
                                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-check-icon')}}"></use>
                                        </svg>
                                    </a>
                                @else
                                    <a href="#" class="btn btn-control {{$post->post_id}}" onclick="savePost(this,event);" data-postId="{{$post->post_id}}">
                                        <svg class="olymp-comments-post-icon">
                                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-star-icon')}}"></use>
                                        </svg>
                                    </a>
                                @endif
                            @endforeach
                        @else
                        <a href="#" class="btn btn-control {{$post->post_id}}" onclick="savePost(this,event);" data-postId="{{$post->post_id}}">
                            <svg class="olymp-comments-post-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-star-icon')}}"></use>
                            </svg>
                        </a>
                        @endif
                    @endif
                </div>
            </article>
        </div>
    @endforeach
@endif
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

            // $(".save-post").click(function(e) {
            //     e.preventDefault();
            //     var postId = $(this).attr("data-postId");
            //     $.ajax({
            //         type: "POST",
            //         url: "{{route('site.saves.store')}}",
            //         data: {postId:postId},
            //         dataType: "JSON",
            //         success: function (response) {
            //             if(response.message){
            //                 toastr.success(response.message, 'Event');
            //             }
            //         }
            //     });
            // })
        });
        function savePost(obj,event){
            event.preventDefault();
            var postId = $(obj).attr("data-postId");
            var id = $(obj).attr('class').substr(16);
            $.ajax({
                type: "POST",
                url: "{{route('site.saves.store')}}",
                data: {postId:postId},
                dataType: "JSON",
                success: function (response) {
                    if(response.message){
                        window.location.reload();
                        toastr.success(response.message, 'Event');
                    }
                }
            });
        }
    </script>
@endpush