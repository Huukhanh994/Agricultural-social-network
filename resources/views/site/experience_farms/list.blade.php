@extends('site.app')
@section('title')
    {{$pageTitle}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                @foreach ($exs as $item)
                <div class="ui-block">
                    <!-- Post -->
                    <article class="hentry blog-post">
                        <div class="post-content">
                            @switch($item->categories['category_id'])
                                @case(1)
                                    <a href="#" class="post-category bg-primary">{{$item->categories['category_name']}}</a>
                                    @break
                                @case(2)
                                    <a href="#" class="post-category bg-blue-light">{{$item->categories['category_name']}}</a>
                                    @break
                                @case(3)
                                    <a href="#" class="post-category bg-purple">{{$item->categories['category_name']}}</a>
                                    @break
                                @default
                            @endswitch
                            <a href="#" class="h4 post-title">{{$item->categories['category_name']}}</a>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Product Name</strong>
                                            <br>
                                            <p class="text-muted">{{$item->product['product_name']}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Season</strong>
                                            <br>
                                            <p class="text-muted">{{$item->season['season_name']}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Category</strong>
                                            <br>
                                            <p class="text-muted">{{$item->categories['category_name']}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6"> <strong>Experience Name</strong>
                                            <br>
                                            <p class="text-muted">{{$item->experience_farm_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Water</strong>
                                            <br>
                                            <p class="text-muted">{{$item->experience_farm_water}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Soil</strong>
                                            <br>
                                            <p class="text-muted">{{$item->experience_farm_soil_properties}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Start to do</strong>
                                            <br>
                                            <p class="text-muted">{{\Carbon\Carbon::parse($item->experience_farm_start_to_do)->format('Y-m-d H:i:s')}}</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6"> <strong>End to do</strong>
                                            <br>
                                            <p class="text-muted">{{\Carbon\Carbon::parse($item->experience_farm_end_to_do)->format('Y-m-d H:i:s')}}</p>
                                        </div>
                                    </div>
                                </div>
                            <div class="author-date">
                                by
                                <a class="h6 post__author-name fn" href="#">{{$item->user['name']}}</a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                        {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                    </time>
                                </div>
                            </div>
                            <div class="post-additional-info inline-items">
                                <div class="friends-harmonic-wrap">
                                    <ul class="friends-harmonic">
                                        <li>
                                            <a href="#" class="like-action" data-id="{{$item->experience_farm_id}}">
                                                <img src="{{asset('site/img/icon-chat27.png')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="names-people-likes">
                                        <span class="count_like{{$item->experience_farm_id}}">
                                            @if (isset($item->experience_farm_likes[0]->like))
                                                {{$item->experience_farm_likes[0]->like}}
                                            @else
                                            0
                                            @endif</span>
                                    </div>
                                    <ul class="friends-harmonic">
                                        <li>
                                            <a href="#" class="dislike-action" data-id="{{$item->experience_farm_id}}">
                                                <img src="{{asset('site/img/icon-chat29.png')}}" alt="icon">
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="names-people-likes">
                                        <span class="count_dislike{{$item->experience_farm_id}}">
                                            @if (isset($item->experience_farm_likes[0]->dislike))
                                                {{$item->experience_farm_likes[0]->dislike}}
                                            @else
                                            0
                                            @endif</span>
                                    </div>
                                </div>

                                <div class="comments-shared">
                                    <a href="#" class="post-add-icon inline-items">
                                        <svg class="olymp-speech-balloon-icon">
                                            <use
                                                xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon')}}">
                                            </use>
                                        </svg>
                                        <span>0</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </article>
                    <!-- ... end Post -->
                </div>
                @endforeach
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
            $('.like-action').click(function(e) {
                e.preventDefault();
                var expId = $(this).attr("data-id");
                var countLike = $('.count_like'+expId).text();
                $.ajax({
                    type: "POST",
                    url: "{{route('site.experience_farms.like')}}",
                    data: {expId: expId,countLike:countLike},
                    dataType: "JSON",
                    success: function (response) {
                        $('.count_like'+expId).text(parseInt(response.exp_like));
                        console.log(response.exp_like);
                    }
                });
            });

            $('.dislike-action').click(function(e) {
                e.preventDefault();
                var expId = $(this).attr("data-id");
                var countDisLike = $('.count_dislike'+expId).text();
                $.ajax({
                    type: "POST",
                    url: "{{route('site.experience_farms.dislike')}}",
                    data: {expId: expId,countDisLike:countDisLike},
                    dataType: "JSON",
                    success: function (response) {
                    $('.count_dislike'+expId).text(parseInt(response.exp_dislike));
                        console.log(response.exp_dislike);
                    }
                });
            });
        });
    </script>
@endpush