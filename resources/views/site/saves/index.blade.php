@extends('site.app')
@section('title')
    {{$pageTitle}}
@endsection
@section('content')
@include('site.partials.profile.profile_header')
    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <table class="event-item-table">
                        <tbody>
                            @forelse ($saves as $save)
                                <tr class="event-item">
                                    <td class="upcoming">
                                        <div class="date-event">
                                            <svg class="olymp-small-calendar-icon">
                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-small-calendar-icon"></use>
                                            </svg>
                                            <span class="day">{{ $save->created_at->format('d') }}</span>
                                            <span class="month">{{ $save->created_at->format('m') }}</span>
                                        </div>
                                    </td>
                                    <td class="author">
                                        <div class="event-author inline-items">
                                            <div class="author-thumb">
                                                <img src="{{asset('storage/users-avatar/'.$save->user['avatar'])}}" alt="author" style="width: 36px;height:36px;">
                                            </div>
                                            <div class="author-date">
                                                <a href="#" class="author-name h6">{{$save->user['name']}}</a>
                                                <time class="published" datetime="2017-03-24T18:18">{{ Carbon\Carbon::parse($save->created_at)->diffForHumans() }}</time>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="location">
                                        <div class="place inline-items">
                                            <svg class="olymp-add-a-place-icon">
                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-add-a-place-icon"></use>
                                            </svg>
                                            <b>{{$save->post['post_title']}}</b>
                                        </div>
                                    </td>
                                    <td class="description">
                                        <p class="description">{!!$save->post['post_content']!!}</p>
                                    </td>
                                    <td class="add-event">
                                        <form action="{{ route('site.saves.destroy',$save->save_id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-breez btn-sm">Remove saved</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <p>Not found saved in collection.</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection