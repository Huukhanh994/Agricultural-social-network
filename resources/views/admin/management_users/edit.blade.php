@extends('admin.app')

@section('title')
    {{$pageTitle}}
@endsection
@section('custom_css')
    <link rel="stylesheet" href="{{asset('/assets/node_modules/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.manager_users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <h3 class="card-title">Person Info</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                                        </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label">Gender</label>
                                        @php
                                            $list_gender = ['MA' => 'Male' , 'FE' => 'Female'];
                                        @endphp
                                        <select class="form-control custom-select" name="gender">
                                            @foreach ($list_gender as $item)
                                                @if ($user->gender == $item)
                                                    <option value="{{$user->gender}}" selected>{{$user->gender}}</option>
                                                @else
                                                    <option value="{{$item}}">{{$item}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Date of Birth</label>
                                        <input type="date" name="birth" class="form-control" value="{{$user->birth}}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Status</label>
                                        @php
                                            $list_status = ['Maried' => 'Maried' , 'Alone' => 'Alone'];
                                        @endphp
                                        <select class="form-control custom-select" name="status" data-placeholder="Choose a Status" tabindex="1">
                                            @if (isset($user->status))
                                                @foreach ($list_status as $element)
                                                    @if ($element == $user->status)
                                                        <option value="{{$user->status}}" selected>{{$user->status}}</option>
                                                    @else
                                                        <option value="{{$element}}">{{$element}}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="email" name="email" id="lastName" class="form-control form-control-danger" value="{{$user->email}}">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <h3 class="box-title m-t-40">Address</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Ward</label>
                                        <select class="form-control custom-select" name="ward_id" data-placeholder="Choose a Ward" tabindex="1">
                                            @foreach ($wards as $ward)
                                                @if ($user->wards->ward_id == $ward->ward_id)
                                                    <option value="{{$user->wards->ward_id}}" selected>{{$user->wards->ward_name}}</option>
                                                @else
                                                    <option value="{{$ward->ward_id}}">{{$ward->ward_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>District</label>
                                        <input type="text" class="form-control" value="{{$user->wards->district->district_name}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" value="{{$user->wards->district->city->city_name}}" readonly>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">File User Avatar</h4>
                                            <label for="input-file-now-custom-1">You can add a default value</label>
                                            @if (isset($user->avatar))
                                                <input type="file" name="user_avatar" id="input-file-now-custom-1" class="dropify"
                                                    data-default-file="{{ asset('storage/users-avatar/'.$user->avatar) }}" />
                                            @else
                                                <input type="file" name="user_avatar" id="input-file-now-custom-1" class="dropify"
                                                    data-default-file="{{asset('/assets/node_modules/dropify/src/images/test-image-1.jpg')}}" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                            <button type="button" class="btn btn-inverse">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
@endsection

@section('custom_js')
    <!-- jQuery file upload -->
<script src="{{asset('/assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();
    
            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });
    
            // Used events
            var drEvent = $('#input-file-events').dropify();
    
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
    
            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });
    
            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });
    
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
@endsection