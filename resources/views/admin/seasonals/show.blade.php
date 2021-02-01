@extends('admin.app')

@section('title')
{{$pageTitle}}
@endsection
@section('custom_css')
<link href="{{asset('/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Other Sample form</h4>
            </div>
            <div class="card-body">
                <form action="#">
                    <div class="form-body">
                    <h3 class="card-title">Season Info of {{$season->season_id}}</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Season code</label>
                                    <input type="text" id="" name="season_cote" class="form-control" value="{{$season->season_code}}"></div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Season Name</label>
                                    <input type="text" id="" name="season_name" class="form-control"
                                        value="{{$season->season_name}}"></div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label">Year</label>
                                    <select class="form-control custom-select" name="year_id">
                                        @foreach ($years as $year)
                                            @if ($year->year_id == $season->year_id)
                                                <option value="{{$season->year_name}}" selected>{{$season->year->year_name}}</option>
                                            @else
                                                <option value="{{$year->year_name}}">{{$year->year_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label class="control-label">Season Notes</label>
                                    <input type="text" id="" name="season_notes" class="form-control" value="{{$season->season_notes}}">
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Days</label>
                                    <input type="text" id="" name="" class="form-control"
                                        value="{{$season->days_count}}">
                                </div>
                            </div>
                            <!--/span-->
                            
                        </div>
                        <!--/row-->
                        <h3 class="box-title m-t-40">Weather</h3>
                        <hr>
                    </div>
                    <div class="form-actions">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
@endsection

@section('custom_js')
<script src="{{asset('/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
@endsection