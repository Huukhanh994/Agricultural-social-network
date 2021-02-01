<div class="crumina-module crumina-heading with-title-decoration">
    <h5 class="heading-title">Comments ({{$post->comments_count}})</h5>
</div>
<!-- Comments -->
<ul class="comments-list style-3">
    @foreach($comments as $key => $comment)
    <br>
    <li class="{{$key}}comment-item">
        <input type="hidden" id="user_name" name="user_name" value="{{$comment->user->name}}">
        <div class="post__author author vcard inline-items">
            <img src="{{asset('storage/users-avatar/'.$comment->user['avatar'])}}" alt="author">
    
            <div class="author-date">
                <a class="h6 post__author-name fn"
                    href="{{route('site.profile.show',$comment->user->id)}}">{{$comment->user->name}}</a>
                <div class="post__date">
                    <time class="published" datetime="2004-07-24T18:18">
                        {{$comment->created_at->diffForHumans()}}
                    </time>
                </div>
            </div>
    
            <a href="#" class="more"><svg class="olymp-three-dots-icon">
                    <use xlink:href="http://127.0.0.1:8000/site/svg-icons/sprites/icons.svg#olymp-three-dots-icon">
                    </use>
                </svg></a>
    
        </div>
    
        <p>{{$comment->comment_content}}</p>

        <a href="#" class="reply" data-toggle="modal" data-target="#edit-my-poll-popup">Reply</a>
    </li>
    @endforeach
</ul>
<!-- Edit My Poll Popup -->

<div class="modal fade" id="edit-my-poll-popup" tabindex="-1" role="dialog" aria-labelledby="edit-my-poll-popup"
    aria-hidden="true">
    <div class="modal-dialog window-popup edit-my-poll-popup" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use>
                </svg>
            </a>
            <div class="modal-body">
                <div class="edit-my-poll-content">
                    <form class="resume-form" method="post" action="{{ route('site.comments.store') }}">
                        @csrf
                        <h3>Add comment</h3>
                        <div class="row">
                            <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Your Name</label>
                                    @if (Auth::check())
                                        <input class="form-control" placeholder="" value="{{Auth::user()->name}}" type="text">
                                    @endif
                                </div>
                            </div>
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="comment_content" placeholder="Your Comment"></textarea>
                                    <input type=hidden name=post_id value="{{ $post->post_id }}" />
                                    @if (Auth::check())
                                        <input type=hidden name=user_id value="{{ Auth::user()->id }}" />
                                    @endif
                                </div>
                                <button class="btn btn-primary btn-lg full-width">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>