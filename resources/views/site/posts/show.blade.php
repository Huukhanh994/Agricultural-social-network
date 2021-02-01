@extends('site.app')
@push('css')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
    <link href="{{ asset('css/site/preview.css') }}" rel="stylesheet">
@endpush
@section('title')
    Show post
@endsection
@section('content')
<div class="container negative-margin-top150">
    <div class="col col-xl-8 m-auto col-lg-12 col-md-12 col-sm-12 col-12" style="position: relative;
    left: 20%;">
        <div class="ui-block">
            <!-- Single Post -->
            <article class="hentry blog-post single-post single-post-v1">
                <div class="control-block-button post-control-button">
                    <a href="#" class="btn btn-control has-i bg-facebook">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="btn btn-control has-i bg-twitter">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                    </a>
                </div>
                <a href="#" class="post-category bg-primary">OLYMPUS NEWS</a>
                <h1 class="post-title">{{$post->post_title}}</h1>

                <div class="author-date">
                    <div class="author-thumb">
                        <img alt="author" src="{{asset('/storage/users-avatar/'.$post->users->avatar)}}" class="avatar" style="width: 36px; height: 36px;">
                    </div>
                    by
                    <a class="h6 post__author-name fn" href="#">{{$post->users->name}}</a>
                    <div class="post__date">
                        <time class="published" datetime="2017-03-24T18:18">
                            - {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                        </time>
                    </div>
                </div>
                <div class="post-content-wrap">
                    <div class="post-content">
                        <h5>{!!$post->post_content!!}
                        </h5>
                    </div>
                    @if (isset($post->images))
                    <div class="post-video">
                        @foreach ($post->images as $image)
                        <div class="video-thumb">
                            <img src="{{ asset('images/posts/'.$image->post_image_path) }}" alt="photo">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </article>
            <!-- ... end Single Post -->
            <!-- Comments -->
            <div class="comments-list">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous"
                    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=1044383589264310&autoLogAppEvents=1"
                    nonce="ADKaIGhX"></script>
                <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                    data-numposts="5" data-width="550" data-colorscheme="light"></div>
            </div>
            <ul class="comments-list">
                @if (isset($comments))
                    @foreach ($comments as $comment)
                    <li class="comment-item">
                        <div class="post__author author vcard inline-items">
                            <img src="{{asset('/storage/users-avatar/'.$comment->avatar)}}" alt="author">
                    
                            <div class="author-date">
                                <a class="h6 post__author-name fn" href="02-ProfilePage.html">{{$comment->name}}</a>
                                <div class="post__date">
                                    <time class="published" datetime="2004-07-24T18:18">
                                        {{$comment->created_at->diffForHumans()}}
                                    </time>
                                </div>
                            </div>
                    
                            <a href="#" class="more"><svg class="olymp-three-dots-icon">
                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                                </svg></a>
                        </div>
                    
                        <p>{{$comment->comment_content}}</p>
                    </li>
                    @endforeach
                @else
                    <p>Not found comment of this post.</p>
                @endif
            </ul>
            <!-- ... end Comments -->
            <!-- Comment Form  -->

            <form class="comment-form inline-items" method="POST" action="{{route('site.comments.store')}}">
                @csrf
                <div class="post__author author vcard inline-items">
                <img src="{{asset('/storage/users-avatar/'.Auth::user()->avatar)}}" alt="author">

                    <div class="form-group with-icon-right ">
                        <textarea class="form-control" name="comment_content" placeholder=""></textarea>
                        <div class="add-options-message">
                            <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                                <svg class="olymp-camera-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <input type=hidden name=post_id value="{{ $post->post_id }}" />
                <input type=hidden name=user_id value="{{ Auth::user()->id }}" />
                <button class="btn btn-lg-2 btn-primary">Post Comment</button>

                <button class="btn btn-lg-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>
            </form>
            <!-- ... end Comment Form  -->
        </div>
        <div class="ui-block">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ route('site.posts.ratings') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="container-fliud">
                                <div class="wrapper row">
                                    <div class="details col-md-6">
                                        <div class="rating">
                                            <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5"
                                                data-step="1" value="{{ $post->userAverageRating }}" data-size="xs">
                                            <input type="hidden" name="id" required="" value="{{ $post->post_id }}">
                                            <span class="review-no">422 reviews</span>
                                            <br />
                                            <button class="btn btn-success">Submit Review</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script type="text/javascript">
                $("#input-id").rating();
            </script>
        </div>
    </div>
</div>
@endsection