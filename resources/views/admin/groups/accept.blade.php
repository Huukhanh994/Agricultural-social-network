@extends('admin.app')

@section('title')
    {{$pageTitle}}
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">REQUEST OF USER IN THIS GROUP</h5>
                <div class="steamline m-t-40">
                    @if (isset($group))
                        @forelse ($group as $user)
                        <div class="sl-item">
                            <div class="sl-left">
                                @if ($user->avatar)
                                    <img class="img-circle" alt="user" src="{{asset('storage/users-avatar/'.$user->avatar)}}">
                                @endif
                            </div>
                            <div class="sl-right">
                                <div><a href="javascript:void(0)">{{$user->name}}</a> <span
                                        class="sl-date">{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</span>
                                </div>
                                <div class="desc">Approve meeting with tiger
                                    <br>
                                    <a href="javascript:void(0)" class="btn m-t-10 m-r-5 btn-rounded btn-outline-success" data-id="{{$user->group_user_id}}">Apporve</a> 
                                    <a href="javascript:void(0)" class="btn m-t-10 btn-rounded btn-outline-danger" data-id="{{$user->group_user_id}}">Refuse</a>
                                </div>
                            </div>
                        </div>
                        @empty
                            <h5>Not found request in group.</h5>
                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $(".btn-outline-success").click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var idGroup = $(this).attr("data-id");
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.groups.acceptAjax')}}",
                    data: {id: idGroup},
                    dataType: "JSON",
                    success: function (response) {
                        if (response.success) {
                            alert(response.success);
                            window.location.reload();
                        }
                    }
                });
            })
        });
    </script>
@endpush