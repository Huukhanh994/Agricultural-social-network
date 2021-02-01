@if (Auth::check())
    @isset($polls)
    @foreach ($polls as $poll)
    <div class="ui-block">
        <article class="hentry post">
            <div class="post__author author vcard inline-items">
                @if (isset($poll->user['avatar']))
                    <img src="{{asset('storage/users-avatar/'.$poll->user['avatar'])}}" alt="author">
                @else
                    <img src="{{asset('site/img/avatar10-sm.jpg')}}" alt="author">
                @endif
    
                <div class="author-date">
                    <a class="h6 post__author-name fn" href="#">@if (isset($poll->user->name))
                        {{$poll->user->name}}
                        @else
                        Some one
                        @endif</a>
                    <div class="post__date">
                        <time class="published" datetime="2004-07-24T18:18">
                            {{ Carbon\Carbon::parse($poll->created_at)->diffForHumans() }}
                        </time>
                    </div>
                </div>
            </div>
            {{ PollWriter::draw(Inani\Larapoll\Poll::find($poll->id)) }}
        </article>
    </div>
    @endforeach
    @endisset
@endif