@extends('admin.app')
@section('title')
    {{$pageTitle}}
@endsection
@section('content')
<div class="row">
    @include('admin.partials.flash')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Contact Emplyee list</h4>
                <h6 class="card-subtitle"></h6>
                <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal"
                    data-target="#add-contact">Add New Group</button>
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
                                    <form action="{{route('admin.groups.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="col-md-12 m-b-20">
                                                <input type="text" class="form-control" name="group_code" placeholder="Type code"> </div>
                                            <div class="col-md-12 m-b-20">
                                                <input type="text" class="form-control" name="group_name" placeholder="Name"> </div>
                                            <div class="col-md-12 m-b-20">
                                                <input type="text" class="form-control" name="group_description" placeholder="Description"> </div>
                                            <div class="col-md-12 m-b-20">
                                                <input type="text" class="form-control" name="group_is_private" placeholder="Is private"> </div>
                                            <div class="col-md-12 m-b-20">
                                                <label class="control-label text-right col-md-3">Category</label>
                                                <select class="form-control" name="category_id">
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12 m-b-20">
                                                <div class="fileupload btn btn-danger btn-rounded waves-effect waves-light">
                                                    <span><i class="ion-upload m-r-5"></i>Upload Contact Image</span>
                                                    <input type="file" class="upload" name="group_avatar"> </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info waves-effect">Save</button>
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </from>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <div class="table-responsive">
                    <table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list"
                        data-paging="true" data-paging-size="7">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Members</th>
                                <th>Private</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                                <tr>
                                    <td>{{$group->group_id}}</td>
                                    <td>{{$group->group_code}}</td>
                                    <td>
                                        <a href="javascript:void(0)"><img src="{{asset('storage/group_avatar/'.$group->group_avatar)}}" alt="user" width="40" class="img-circle" />
                                            {{$group->group_name}}</a>
                                    </td>
                                    <td>{{$group->group_description}}</td>
                                    <td>{{$group->users_count}}</td>
                                    <td>
                                        @if ($group->group_is_private == 1)
                                            <span class="label label-danger">private</span>
                                        @elseif($group->group_is_private == 0)
                                            <span class="label label-info">public</span>
                                        @else
                                            <span class="label label-success">###</span>
                                        @endif
                                    </td>
                                    <td>{{$group->category->category_name}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.groups.accept', $group->group_id) }}" class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                                            <a href="{{ route('admin.groups.show', $group->group_id) }}" class="btn btn-sm btn-info"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{ route('admin.groups.delete', $group->group_id) }}"
                                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection