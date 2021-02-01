<div class="control-icon more has-items">
    <svg class="olymp-chat---messages-icon">
        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-chat---messages-icon')}}"></use>
    </svg>
    <div class="label-avatar bg-purple">2</div>

    <div class="more-dropdown more-with-triangle triangle-top-center">
        <div class="ui-block-title ui-block-title-small">
            <h6 class="title">Chat / Messages</h6>
            <a href="#">Mark all as read</a>
            <a href="#">Settings</a>
        </div>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="notification-list chat-message">
                @if (Auth::check())
                    @if (isset($messages))
                    @foreach ($messages as $message)
                        <li class="message-unread">
                            <div class="author-thumb">
                                @if (isset($message->sender_user->avatar))
                                <img src="{{ asset('/storage/users-avatar/'.$message->sender_user->avatar) }}" alt="author"
                                    style="width: 36px;height:36px">
                                @else
                                <img src="{{ asset('/storage/users-avatar/'.$message->receiver_user->avatar) }}" alt="author"
                                    style="width: 36px;height:36px">
                                @endif
                            </div>
                            <div class="notification-event">
                                @if (isset($message->sender_user))
                                <a href="/chatify" class="h6 notification-friend">{{$message->sender_user->name}}</a>
                                @else
                                <a href="/chatify" class="h6 notification-friend">{{$message->receiver_user->name}}</a>
                                @endif
                                <span class="chat-message-item">{{$message->body}}...</span>
                                <span class="notification-date"><time class="entry-date updated"
                                        datetime="2004-07-24T18:18">{{$message->created_at->diffForHumans()}}</time></span>
                            </div>
                            <span class="notification-icon">
                                <svg class="olymp-chat---messages-icon">
                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-chat---messages-icon')}}">
                                    </use>
                                </svg>
                            </span>
                            <div class="more">
                                <svg class="olymp-three-dots-icon">
                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                                </svg>
                            </div>
                        </li>
                    @endforeach
                    @endif
                @endif
            </ul>
        </div>

        <a href="/chatify" class="view-all bg-purple">View All Messages</a>
    </div>
</div>