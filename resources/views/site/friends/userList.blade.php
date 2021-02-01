@if($users->count())
@foreach($users as $user)
<div class="col-2 profile-box border p-1 rounded text-center bg-light mr-4 mt-3">
    <img src="https://dummyimage.com/165x166/420542/edeef5&text=ItSolutionStuff.com" class="w-100 mb-1">
    <h5 class="m-0"><a href="{{ route('user.view', $user->id) }}"><strong>{{ $user->name }}</strong></a></h5>
    <p class="mb-2">
        <small>Following: <span class="badge badge-primary">{{ $user->followings()->get()->count() }}</span></small>
        <small>Followers: <span
                class="badge badge-primary tl-follower">{{ $user->followers()->get()->count() }}</span></small>
    </p>
    <button class="btn btn-info btn-sm action-follow" data-id="{{ $user->id }}"><strong>
            @if(auth()->user()->isFollowing($user))
                UnFollow
            @else
                Follow
            @endif
        </strong></button>
</div>
@endforeach
@endif

@section('custom_js')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.action-follow').click(function(){
            var user_id = $(this).data('id');
            var cObj = $(this);
            var c = $(this).parent("div").find(".tl-follower").text();
            console.log($(this).find("strong").text());
            $.ajax({
                    type:'POST',
                    url:'/ajaxRequestFollow',
                    data:{user_id:user_id},
                    success:function(data){
                        console.log(data.success);
                        if($(this).find("strong").text() == "UnFollow"){
                            cObj.find("strong").text("Follow");
                            cObj.parent("div").find(".tl-follower").text(parseInt(c)-1);
                        }else{
                            cObj.find("strong").text("UnFollow");
                            cObj.parent("div").find(".tl-follower").text(parseInt(c)+1);
                        }
                    }
                });
            });
        });
    </script>
@endsection