<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">Your group</h6>
        <a href="#" class="more"><svg class="olymp-three-dots-icon">
                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
            </svg></a>
    </div>

    <!-- W-Friend-Pages-Added -->

    <ul class="widget w-friend-pages-added notification-list friend-requests">
        @if (Auth::check())
            @foreach ($yourGroup as $group)
            <li class="inline-items">
                <div class="author-thumb">
                    @if (isset($group->group_avatar))
                        <img src="{{asset('storage/group_avatar/'.$group->group_avatar)}}" alt="author" style="width:30px; height:30px">
                    @else
                        <img src="{{asset('site/img/avatar41-sm.jpg')}}" alt="author">
                    @endif
                </div>
                <div class="notification-event">
                    <a href="{{ route('site.groups.show',$group->group_id) }}"
                        class="h6 notification-friend">{{$group->group_name}}</a>
                    <span class="chat-message-item">{{$group->category_name}}</span>
                </div>
                <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                    <a href="#">
                        <svg class="olymp-star-icon">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-star-icon')}}"></use>
                        </svg>
                    </a>
                </span>
            
            </li>
            @endforeach
        @endif
    </ul>
</div>