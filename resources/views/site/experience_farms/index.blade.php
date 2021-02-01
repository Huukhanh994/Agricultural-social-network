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
{{-- <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet"> --}}
<link href="{{asset('/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
@endsection

@section('content')
@include('site.partials.profile.profile_header')
<div class="col-12">
    @include('admin.partials.flash')
    <div class="card">
        <div class="card-body">
            <h6 class="card-subtitle"></h6>
            <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal"
                data-target="#add-contact" style="color: white; background-color: #0069c2">Add New Experience
                farm</button>
            <!-- Add Contact Popup Model -->
            <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Add New Experience farm</h4>
                        </div>
                        <div class="modal-body">
                            <from class="form-horizontal form-material">
                                <form action="{{route('site.experience_farms.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-md-12 m-b-20">
                                            <div class="form-group has-success">
                                                <label class="control-label">Crop plant animal</label>
                                                <select class="form-control custom-select" name="category_id">
                                                    @foreach ($categories as $item)
                                                    <option value="{{$item->category_id}}">
                                                        {{$item->category_name}}</option>
                                                    @endforeach
                                                </select></div>
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <label class="control-label">Experience farm name</label>
                                            <input type="text" class="form-control" name="experience_farm_name" placeholder="">
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <label class="control-label">Season</label>
                                            <select class="form-control custom-select" id="season_id" name="season_id">
                                                @foreach ($seasons as $item)
                                                <option value="{{$item->season_id}}">{{$item->season_name}}</option>
                                                @endforeach
                                            </select>
                                            <small class="form-control-feedback"> Season</small>
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <label class="control-label">Product</label>
                                            <select class="form-control custom-select" id="product_id" name="product_id">
                                                @foreach ($products as $product)
                                                    <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                                                @endforeach
                                            </select>
                                            <small class="form-control-feedback"> Product</small>
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <label for="time_farm">Time farm</label>
                                            <input id="experience_farm_time_farm" type="text" value="30"
                                                name="experience_farm_time_farm"
                                                data-bts-button-down-class="btn btn-secondary btn-outline"
                                                data-bts-button-up-class="btn btn-secondary btn-outline"></div>
                                        <div class="col-md-12 m-b-20">
                                            <label class="control-label">Water</label>
                                            <input type="text" class="form-control" name="experience_farm_water"
                                                placeholder=""> </div>
                                        <div class="col-md-12 m-b-20">
                                            <label class="control-label">Soil properties</label>
                                            <input type="text" class="form-control"
                                                name="experience_farm_soil_properties" placeholder="">
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <label class="m-t-20">Start time</label>
                                            <input type="text" class="form-control" placeholder="2017-06-04"
                                                name="experience_farm_start_to_do" id="mdate1">
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <label class="m-t-20">End time</label>
                                            <input type="text" class="form-control" placeholder="2017-06-04"
                                                name="experience_farm_end_to_do" id="mdate2">
                                        </div>
                                        <div class="col-md-12 m-b-20">
                                            <div class="form-group">
                                                <label>Notes</label>
                                                <textarea class="form-control" rows="5"
                                                    name="experience_farm_notes"></textarea>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                            <input type="checkbox" class="custom-control-input" name="published" id="published" value="1">
                                            <label class="custom-control-label" for="published">Published</label>
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
            <div class="table-responsive">
                <table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list"
                    data-paging="true" data-paging-size="7">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Time Farm</th>
                            <th>Season</th>
                            <th>Water</th>
                            <th>Soil properties</th>
                            <th>Start to do</th>
                            <th>End to do</th>
                            <th>Notes</th>
                            <th>Published</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($erf as $item)
                        <tr>
                            <td>{{$item->experience_farm_id}}</td>
                            <td><a href="javascript:void(0)">
                                @switch($item->category_id)
                                    @case(1)
                                        <img src="{{asset('/images/nongnghiep-logo.jpg')}}" alt="user" width="40" class="img-circle" />
                                        @break
                                    @case(2)
                                        <img src="{{asset('/images/lamnghiep-logo.jpg')}}" alt="user" width="40" class="img-circle" />
                                        @break
                                    @case(3)
                                        <img src="{{asset('/images/thuysan-logo.png')}}" alt="user" width="40" class="img-circle" />
                                        @break
                                    @case(4)
                                        <img src="{{asset('/images/food-logo.jpg')}}" alt="user" width="40" class="img-circle" />
                                        @break
                                    @case(5)
                                        <img src="{{asset('/images/thuoc-logo.png')}}" alt="user" width="40" class="img-circle" />
                                        @break
                                        <img src="/assets/images/users/4.jpg" alt="user" width="40" class="img-circle" />
                                    @default
                                @endswitch
                                    {{$item->categories->category_name}}</a></td>
                            <td>{{$item->experience_farm_time_farm}}</td>
                            <td>{{$item->season->season_name}}</td>
                            <td>{{$item->experience_farm_water}}</td>
                            <td>{{$item->experience_farm_soil_properties}}</td>
                            <td>{{$item->experience_farm_start_to_do}}</td>
                            <td>{{$item->experience_farm_end_to_do}}</td>
                            <td>{{$item->experience_farm_notes}}</td>
                            <td>
                                @switch($item->experience_farm_published)
                                @case(0)
                                <a href="#" class="post-category bg-primary">private</a>
                                @break
                                @case(1)
                                <a href="#" class="post-category bg-blue-light">published</a>
                                @break
                                @default
                                @endswitch
                            </td>
                            {{-- <td><div class="label label-table label-danger">{{$item->experience_farm_published}}</div></td> --}}
                            <td>
                                <a href="{{ route('site.experience_farms.edit', $item->experience_farm_id) }}"
                                    class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('site.experience_farms.delete', $item->experience_farm_id) }}"
                                    id="btnDelete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                <a href="{{ route('site.experience_farms.modify', $item->experience_farm_id) }}"
                                    class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>   
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<!-- Footable -->
{{-- <script src="{{asset('/assets/node_modules/moment/moment.js')}}"></script>
<script src="{{asset('/assets/node_modules/footable/js/footable.min.js')}}"></script>
<!--FooTable init-->
<script src="{{asset('dist/js/pages/footable-init.js')}}"></script> --}}
<!-- Plugin JavaScript -->
<script src="{{asset('/assets/node_modules/moment/moment.js')}}"></script>
<script
    src="{{asset('/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}">
</script>
<script>
    // MAterial Date picker    
        $('#mdate1').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
        $('#mdate2').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
        $('#date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' })
</script>
<script src="{{asset('/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}"
    type="text/javascript">
</script>
<script>
    $(function () {
                $("input[name='experience_farm_time_farm']").TouchSpin({
                    initval: 40
                });
            });
</script>

@endsection