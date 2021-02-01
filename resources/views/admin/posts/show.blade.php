@extends('admin.app')
@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- Comment widgets -->
    <!-- ============================================================== -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Recent Articles</h5>
            </div>
            <!-- ============================================================== -->
            <!-- Comment widgets -->
            <!-- ============================================================== -->
            <div class="comment-widgets">
                <!-- Comment Row -->
                <div class="d-flex no-block comment-row">
                    <div class="p-2"><span class="round"><img src="{{asset('/assets/images/users/1.jpg')}}" alt="user"
                                width="50"></span></div>
                    <div class="comment-text w-100">
                    <h5 class="font-medium">{{$post->users->name}}</h5>
                        <p class="m-b-10 text-muted"><b>{{$post->post_title}}</b></p>
                        <p class="m-b-10 text-muted">{!!$post->post_content!!}</p>
                        <div class="comment-footer">
                        <span class="text-muted pull-right">{{date('F j, Y, g:i a', strtotime($post->created_at))}}</span>
                        @switch($post->post_status)
                            @case('pending')
                                <span class="badge badge-info badge-pill">{{$post->post_status}}</span>
                                @break
                        
                            @case('accepted')
                                <span class="badge badge-success badge-pill">{{$post->post_status}}</span>
                                @break
                        @endswitch
                            <span class="action-icons">
                                <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($post->images)
    <hr>
    <div class="row">
        @foreach($post->images as $image)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('images/posts/'.$image->post_image_path) }}" id="brandLogo" class="img-fluid" alt="img"/>
                    <a class="card-link float-right text-danger"
                        href="{{ route('admin.posts.images.delete', $image->post_image_id) }}">
                        <i class="fa fa-fw fa-lg fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection