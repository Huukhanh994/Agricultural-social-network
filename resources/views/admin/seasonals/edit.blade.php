@extends('admin.app')

@section('title')
{{$pageTitle}}
@endsection
@section('custom_css')
<link href="{{asset('/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
<link
    href="{{asset('/assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
    rel="stylesheet">
<link href="{{asset('/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"
    type="text/css" />
<!-- Daterange picker plugins css -->
<link href="{{asset('/assets/node_modules/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
<link href="{{asset('/assets/node_modules/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Other Sample form</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.seasonals.update',$season->season_id)}}" method="POST">
                @csrf
                    <div class="form-body">
                        <h3 class="card-title">Season Info of {{$season->season_id}}</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Season code</label>
                                    <input type="text" id="" name="season_code" class="form-control"
                                        value="{{$season->season_code}}"></div>
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
                                                <option value="{{$season->year->year_id}}" selected>{{$season->year->year_name}}
                                                </option>
                                            @else
                                                <option value="{{$year->year_id}}">{{$year->year_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Season Notes</label>
                                    <input type="text" id="" name="season_note" class="form-control"
                                        value="{{$season->season_note}}">
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Days</label>
                                    <input type="text" id="" name="days_count" class="form-control"
                                        value="{{$season->days_count}}" readonly>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="schedule_time">Setting Time</label>
                                    <input type="text" class="form-control @error('schedule_time') is-valid @enderror datetime" name="schedule_time"
                                        id="schedule_time" datetime="{{ $schedule_time }}" value="{{ $schedule_time }}">
                                </div>
                            </div>

                        </div>
                        <!--/row-->
                        <h3 class="box-title m-t-40">Weather</h3>
                        <select multiple data-role="tagsinput" name="weather_name[]">
                           @foreach ($season->weathers as $item)
                                <option value="{{$item->weather_name}}">{{$item->weather_name}}</option>
                           @endforeach
                        </select>
                        <hr>
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
<script src="{{asset('/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('/assets/node_modules/moment/moment.js')}}"></script>
<script
    src="{{asset('/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}">
</script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Date range Plugin JavaScript -->
<script src="{{asset('/assets/node_modules/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script>
    // Date & Time
            $('.datetime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY h:mm A'
                }
            });
</script>
@endsection