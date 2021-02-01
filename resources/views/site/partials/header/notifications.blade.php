<div class="control-icon more has-items">
    <svg class="olymp-thunder-icon">
        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-thunder-icon')}}"></use>
    </svg>

    <div class="label-avatar bg-primary">8</div>

    <div class="more-dropdown more-with-triangle triangle-top-center">
        <div class="ui-block-title ui-block-title-small">
            <h6 class="title">Notifications</h6>
            <a href="#">Mark all as read</a>
            <a href="#">Settings</a>
        </div>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="notification-list">
                @if (Auth::check())
                    @if (isset($notification_friends))
                    @foreach ($notification_friends as $item)
                    <li>
                        <div class="author-thumb">
                            <img src="{{asset('/storage/users-avatar/'.$item->receiver_user->avatar)}}" alt="author"
                                style="width: 36px; height:36px">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">{{$item->receiver_user->name}}</a> has become a friend with you
                            </div>
                            @if ($item->created_at == null)
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4
                                    hours</time></span>
                            @else
                            <span class="notification-date"><time class="entry-date updated"
                                    datetime="2004-07-24T18:18">{{$item->created_at->diffForHumans()}}</time></span>
                            @endif
                        </div>
                    </li>
                    @endforeach
                    @endif
                    @if (isset($notification_exp_likes))
                    @forelse ($notification_exp_likes as $row)
                    <li>
                        <div class="author-thumb">
                            <img src="{{asset('site/img/avatar62-sm.jpg')}}" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">{{$row->name}}</a> liked
                                on your experience farm <a href="#" class="notification-link">profile status</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">
                                    {{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}
                                </time></span>
                        </div>
                        <span class="notification-icon">
                            <svg class="olymp-comments-post-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-comments-post-icon')}}">
                                </use>
                            </svg>
                        </span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                            </svg>
                            <svg class="olymp-little-delete">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use>
                            </svg>
                        </div>
                    </li>
                    @empty
                    
                    @endforelse
                    @endif
                @endif
            </ul>
        </div>

        <a href="#" class="view-all bg-primary">View All Notifications</a>
    </div>
</div>