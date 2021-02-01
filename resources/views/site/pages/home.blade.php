@extends('site.app')
@section('title')
    {{$pageTitle}}
@endsection
@section('custom_css')
    <style>
        #upload_link{
        text-decoration:none;
        }
        #upload{
        display:none
        }
        #paginate{
            margin: auto;
            width: 50%;
            position: relative;
            left: 52px;
        }
        /* Button used to open the contact form - fixed at the bottom of the page */
        .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
        }
        
        /* The popup form - hidden by default */
        .form-popup-product {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
        }
        
        /* Add styles to the form container */
        .form-container-product {
        max-width: 600px;
        padding: 10px;
        background-color: white;
        }
        
        /* Full-width input fields */
        .form-container-product input[type=text], .form-container-product input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
        }
        
        /* When the inputs get focus, do something */
        .form-container-product input[type=text]:focus, .form-container-product input[type=password]:focus {
        background-color: #ddd;
        outline: none;
        }
        
        /* Set a style for the submit/login button */
        .form-container-product .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;
        }
        
        /* Add a red background color to the cancel button */
        .form-container-product .cancel {
        background-color: red;
        }
        
        /* Add some hover effects to buttons */
        .form-container-product .btn:hover, .open-button:hover {
        opacity: 1;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
    {{-- <script src="{{asset('/frontend/js/ajax_script.js')}}"></script> --}}
    
@endsection
@section('custom_css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
@endsection
@section('friends-content')
    @if (Auth::check())
        @if (count($request_friends) != 0)
        @foreach ($request_friends as $item)
        <li>
            <div class="author">
                @if (isset($item->sender_user->avatar))
                <img src="{{asset('/storage/users-avatar/'.$item->sender_user->avatar)}}" alt="author"
                    style="width: 36px; height: 36px;">
                @else
                <img src="{{asset('site/img/avatar55-sm.jpg')}}" alt="author">
                @endif
            </div>
            <div class="notification-event">
                <a href="#" class="h6 notification-friend">{{$item->sender_user->name}}
                    {{$item->sender_user->last_name}}</a>
                <span class="chat-message-item">Mutual Friend: Sarah Hetfield</span>
            </div>
            <span class="notification-icon">
                <input type="hidden" name="relationship_id" value="{{$item->relationship_id}}">
                <a href="#" class="accept-request acceptFriend">
                    <input type="hidden" name="status_accept" value="1">
                    <i class="fas fa-plus"></i>
                </a>
        
                <a href="#" class="accept-request request-del denyFriend">
                    <input type="hidden" name="status_deny" value="2">
                    <i class="fas fa-minus"></i>
                </a>
        
            </span>
        
            <div class="more">
                <svg class="olymp-three-dots-icon">
                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                </svg>
            </div>
        </li>
        @endforeach
        @else
            <p>Not found request friend</p>
        @endif
    @endif
@endsection
@section('content')
    @include('site.partials.flash')
    <div class="container">
        <div class="row">
            <!-- Left Sidebar -->
            @include('site.partials.pages_home.index')
            <!-- Main Content -->
            <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

                @include('site.posts.create')
                <div id="newsfeed-items-grid">
                    @include('site.posts.newFeeds')

                    @include('site.polls.index')
                </div>
            <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
            <div id="paginate">
                {!! $posts->links() !!}
            </div>
            </main>
            <!-- ... end Main Content -->
            <!-- Right Sidebar -->
            <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
                @foreach ($users as $user)
                    @if ($user->birth == Carbon\Carbon::today()->toDateString())
                        <div class="ui-block">
                            <!-- W-Birthsday-Alert -->
                            <div class="widget w-birthday-alert">
                                <div class="icons-block">
                                    <svg class="olymp-cupcake-icon">
                                        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-cupcake-icon')}}"></use>
                                    </svg>
                                    <a href="#" class="more"><svg class="olymp-three-dots-icon">
                                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                                        </svg></a>
                                </div>
                        
                                <div class="content">
                                    <div class="author-thumb">
                                        @if (isset($user->avatar))
                                            <img src="{{asset('storage/users-avatar/'.$user->avatar)}}" alt="author">
                                        @else
                                            <img src="{{asset('site/img/avatar48-sm.jpg')}}" alt="author">
                                        @endif
                                    </div>
                                    <span>Today is</span>
                                    <a href="#" class="h4 title">{{$user->name}}’s Birthday!</a>
                                    <p>Leave her a message with your best wishes on her profile page!</p>
                                </div>
                            </div>
                            <!-- ... end W-Birthsday-Alert -->
                        </div>
                        @elseif($user->birth == Carbon\Carbon::tomorrow()->toDateString())
                            <div class="ui-block">
                                <!-- W-Birthsday-Alert -->
                                <div class="widget w-birthday-alert">
                                    <div class="icons-block">
                                        <svg class="olymp-cupcake-icon">
                                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-cupcake-icon')}}"></use>
                                        </svg>
                                        <a href="#" class="more"><svg class="olymp-three-dots-icon">
                                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                                            </svg></a>
                                    </div>
                            
                                    <div class="content">
                                        <div class="author-thumb">
                                            @if (isset($user->avatar))
                                                <img src="{{asset('storage/users-avatar/'.$user->avatar)}}" alt="author">
                                            @else
                                                <img src="{{asset('site/img/avatar48-sm.jpg')}}" alt="author">
                                            @endif
                                        </div>
                                        <span>Tomorrow is</span>
                                        <a href="#" class="h4 title">{{$user->name}}’s Birthday!</a>
                                        <p>Leave her a message with your best wishes on her profile page!</p>
                                    </div>
                                </div>
                                <!-- ... end W-Birthsday-Alert -->
                            </div>
                        @else

                        @endif
                @endforeach
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Friend Suggestions</h6>
                        <a href="#" class="more"><svg class="olymp-three-dots-icon">
                        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use>
                            </svg></a>
                    </div>
                    <!-- W-Action -->
                    <ul class="widget w-friend-pages-added notification-list friend-requests">
                        @if (Auth::check())
                            @foreach ($friends as $key => $item)
                            <li class="{{$key}}inline-items">
                                <div class="author-thumb">
                                    @if (isset($item->avatar))
                                    <img src="{{asset('/storage/users-avatar/'.$item->avatar)}}" alt="author" style="width: 36px; height: 36px;">
                                    @else
                                    <img src="{{asset('site/img/avatar55-sm.jpg')}}" alt="author">
                                    @endif
                                </div>
                                <div class="notification-event">
                                    <a href="{{ route('site.profile.show',$item->id) }}" class="h6 notification-friend">{{$item->name}}</a>
                                    <span class="chat-message-item">8 Friends in Common</span>
                                </div>
                                <span class="notification-icon">
                                    <a href="#" class="accept-request acceptRequestFriend">
                                        <input type="hidden" name="receiver_id_request" value="{{$item->id}}">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </span>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                    <!-- ... end W-Action -->
                </div>
            </aside>
        </div>
    </div>
@include('site.modal.create_poll')
@include('site.modal.add-location')
@endsection
@push('scripts')
    <script>
        $(function(){
            $("#upload_link").on('click', function(e){
                e.preventDefault();
                $("#upload:hidden").trigger('click');
            });
        });
        $('.acceptRequestFriend').click(function (e) {
            e.preventDefault();
            var class_key = $(this).parent().parent().attr("class").substr(0, 1);
            var receiver_id_request = $("input[name='receiver_id_request']").val();
            $.ajax({
                type: 'POST',
                url: "/relationship/ajaxSendRequestFriend",
                data: { receiver_id_request: receiver_id_request},
                success: function (data) {
                if (data.success_add_friend) {
                    $('.' + class_key + 'inline-items').hide();
                        alert('Send request friend successfully!');
                    }
                }
            });
        })
    </script>
    {{-- <script type="text/javascript">
        $(document).ready(function () {
            $('.dislike').click(function(e){
                e.preventDefault();
                var postId = $(this).data('id');
                var countLike = $('#countLike'+postId).html();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/ajaxRequestDisLike",
                    data: {post_dis_id:postId},
                    success: function (response) {
                        if(response.success_dis){
                            $('#countLike'+postId).html(parseInt(countLike)-1);
                        }else{
                            console.log("dont liked");
                        }
                    }
                });
            })
            $('.post-add-icon').click(function(e) {
                e.preventDefault();
                var postId = $(this).data('id');
                var countLike = $('#countLike'+postId).html();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/ajaxRequestLike",
                    data: {id:postId},
                    success: function (response) {
                        if(response.success){
                            $('#countLike'+postId).html(parseInt(countLike)+1);
                        }else{
                            console.log("dont liked");
                        }
                    }
                });
            })
        });
    </script> --}}
@endpush
