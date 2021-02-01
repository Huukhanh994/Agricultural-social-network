@extends('admin.app')

@section('title')
    {{$pageTitle}}
@endsection
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
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
@include('admin.partials.flash')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Contact Emplyee list</h4>
                    <h6 class="card-subtitle"></h6>
                    <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal"
                        data-target="#add-contact">Add New Season</button>
                        <!-- Add Contact Popup Model -->
                        <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myModalLabel">Add New Season</h4>
                                    </div>
                                    <div class="modal-body">
                                        <from class="form-horizontal form-material">
                                            <form action="{{route('admin.seasonals.store')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" name="season_code" placeholder="Type code"> </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" name="season_name" placeholder="Season name"> </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" name="season_note" placeholder="Season note"> </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <div class="form-group">
                                                            <label for="schedule_time">Setting Time</label>
                                                            <input type="datetime-local text" class="form-control datetime" name="schedule_time" id="schedule_time">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <label for="year_id">Choose a year</label>
                                                        <select class="form-control custom-select" name="year_id">
                                                            @foreach ($years as $year)
                                                                <option value="{{$year->year_id}}">{{$year->year_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="text-xs-right">
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
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Note</th>
                                    <th>Days</th>
                                    <th>Year</th>
                                    <th>Weather</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seasonals as $seasonal)
                                    <tr>
                                        <td>{{$seasonal->season_id}}</td>
                                        <td>{{$seasonal->season_code}}</td>
                                        <td>{{$seasonal->season_name}}</td>
                                        <td>{{$seasonal->season_note}}</td>
                                        <td>{{$seasonal->days_count}}</td>
                                        <td>
                                            {{$seasonal->year->year_name}}
                                        </td>
                                        <td>
                                            @foreach ($seasonal->weathers as $item)
                                                <span class="badge badge-info">{{ $item->weather_name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.seasonals.show', $seasonal->season_id) }}" class="btn btn-sm btn-info"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.seasonals.edit', $seasonal->season_id) }}" class="btn btn-sm btn-primary"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.seasonals.delete', $seasonal->season_id) }}" id="btnDelete" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash"></i></a>
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
    <!-- This is data table -->
    <script src="{{asset('/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(function () {
                $('#myTable').DataTable();
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
                // responsive table
                $('#config-table').DataTable({
                    responsive: true
                });
                $('#example23').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
            });
    
    </script>
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