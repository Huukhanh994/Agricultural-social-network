@extends('admin.app')
@section('title')
    {{$pageTitle}}
@endsection
@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    {{-- asset('/assets/images/users/5.jpg') --}}
                    <center class="m-t-30"> 
                        @if (isset($group->group_avatar))
                            <img src="<?php echo asset('storage/group_avatar/'.$group->group_avatar) ?>" class="img-circle" width="150" />
                        @else
                            <img src="{{ asset('/assets/images/big/img2.jpg') }}" class="img-circle" width="150" />
                        @endif
                        <h4 class="card-title m-t-10">{{$group->group_name}}</h4>
                        <h6 class="card-subtitle">{{$group->category['category_name']}}</h6>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i>
                                    <font class="font-medium">{{$group->users_count}} members</font>
                                </a></div>
                        </div>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body">
                    <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Timeline</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card-body">
                            <div class="profiletimeline">
                                @forelse ($group->posts as $post)
                                    <div class="sl-item">
                                        <div class="sl-left"> 
                                            @if ($post->users['avatar'])
                                                <img src="{{ asset('storage/users-avatar/'.$post->users['avatar']) }}" alt="user" class="img-circle" style="height:40px;width:40px"/>
                                            @endif
                                        </div>
                                        <div class="sl-right">
                                            <div><a href="javascript:void(0)" class="link">{{$post->users['name']}}</a> 
                                                <span class="sl-date">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-6 m-b-20">
                                                        @foreach ($post->images as $image)
                                                            <img src="<?php echo asset('storage/posts/'.$image->post_image_path) ?>" class="img-responsive radius" />
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="like-comm"> 
                                                    <a href="javascript:void(0)" class="link m-r-10">{{$post->comments_count}} comment</a> 
                                                    <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @empty
                                    <h4>Not found post in this group.</h4>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <!--second tab-->
                    <div class="tab-pane" id="settings" role="tabpanel">
                        <div class="card-body">
                            <form class="form-horizontal form-material" method="POST" action="{{route('admin.groups.update',$group->group_id)}}">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-12">Group Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="group_name" value="{{$group->group_name}}"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Group Code</label>
                                    <div class="col-md-12">
                                        <input type="text" name="group_code" value="{{$group->group_code}}"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Group Description</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line" name="group_description">{{$group->group_description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                        <input type="checkbox" class="custom-control-input" id="checkbox0" name="group_is_private" value="1" {{$group->group_is_private == 1 ? 'checked' : ''}}>
                                        <label class="custom-control-label" for="checkbox0">Private group !</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Select Category</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line" name="category_id">
                                            @foreach ($categories as $category)
                                                @if ($category->category_id == $group->category_id)
                                                    <option value="{{$group->category['category_id']}}">{{$group->category['category_name']}}</option>
                                                @else
                                                    <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Update Group</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection