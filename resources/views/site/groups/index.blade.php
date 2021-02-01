@extends('site.app')
@section('title')
    {{$pageTitle}}
@endsection
@section('custom_css')
<!-- Footable CSS -->
<link href="{{asset('/assets/node_modules/footable/css/footable.bootstrap.min.css')}}" rel="stylesheet">
<!-- page css -->
<link href="{{asset('dist/css/pages/footable-page.css')}}" rel="stylesheet">
<link href="{{asset('dist/css/pages/other-pages.css')}}" rel="stylesheet">
{{-- date --}}
<link
    href="{{asset('/assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
    rel="stylesheet">
<link href="{{asset('/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
@endsection
@section('content')
    @include('site.partials.profile.profile_header')
    <div class="container">
        <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-contact"
            style="color: white; background-color: #0069c2">Add New Group</button>
        <!-- Add Contact Popup Model -->
        <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Add New Group</h4>
                    </div>
                    <div class="modal-body">
                        <from class="form-horizontal form-material">
                            <form action="{{route('site.groups.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="col-md-12 m-b-20">
                                        <div class="form-group has-success">
                                            <label class="control-label">Select category</label>
                                            <select class="form-control custom-select" name="category_id">
                                                @foreach ($categories as $item)
                                                <option value="{{$item->category_id}}">
                                                    {{$item->category_name}}</option>
                                                @endforeach
                                            </select></div>
                                    </div>
                                    <div class="col-md-12 m-b-20">
                                        <label class="control-label">Group code</label>
                                        <input type="text" class="form-control" name="group_code" placeholder="">
                                    </div>
                                    <div class="col-md-12 m-b-20">
                                        <label class="control-label">Group name</label>
                                        <input type="text" class="form-control" name="group_name" placeholder="">
                                    </div>
                                    <div class="col-md-12 m-b-20">
                                        <div class="form-group">
                                            <h5>File Input Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="group_avatar" class="form-control" required> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 m-b-20">
                                        <div class="form-group">
                                            <label>Group description</label>
                                            <textarea class="form-control" rows="5" name="group_description"></textarea>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                        <input type="checkbox" class="custom-control-input" name="private" id="published"
                                            value="1">
                                        <label class="custom-control-label" for="published">Private group?</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info waves-effect"
                                        style="color: white; background-color:#06b6c8">Save</button>
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"
                                        style="color: white; background-color:#9f9f9f">Cancel</button>
                                </div>
                            </form>
                        </from>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="row">
            @foreach ($groups as $key => $group)
            <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="{{$key}}ui-block" data-mh="friend-groups-item">
                        <!-- Friend Item -->
                        <div class="friend-item friend-groups">
                    
                            <div class="friend-item-content">
                                <div class="friend-avatar">
                                    <div class="author-thumb">
                                        @if ($group->group_avatar)
                                            <img src="<?php echo asset('storage/group_avatar/'.$group->group_avatar) ?>" style="width: 1000px;
                                            height: 115px;" alt="Olympus">
                                        @else
                                            <img src="{{asset('site/img/friend-harmonic5.jpg')}}" alt="Olympus">
                                        @endif
                                    </div>
                                    <div class="author-content">
                                        <a href="{{ route('site.groups.show',$group->group_id) }}" class="h5 author-name">{{$group->group_name}}</a>
                                        <div class="country">{{$group->users_count}} members</div>
                                    </div>
                                </div>
                                <ul class="friends-harmonic">
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('site/img/friend-harmonic5.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                </ul>
                                <div class="control-block-button">
                                    <input type="hidden" name="group_id" value="{{$group->group_id}}">
                                    <a href="#" class="btn btn-control bg-blue acceptRequestgGroup" data-groupId="{{$group->group_id}}">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    
                        <!-- ... end Friend Item -->
                    </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('custom_js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $('.acceptRequestgGroup').click(function (e) {
            var group_id = $(this).attr("data-groupId");
            e.preventDefault();
                var class_key = $(this).parent().parent().parent().parent().attr("class").substr(0, 1);
                $.ajax({
                    type: 'POST',
                    url: "/groups/ajaxSendRequestGroup",
                    data: { group_id: group_id},
                    success: function (data) {
                        if (data.success) {
                        $('.' + class_key + 'ui-block').hide();
                        toastr.success(data.success);
                    }
                }
            });
        })
    </script>
@endsection