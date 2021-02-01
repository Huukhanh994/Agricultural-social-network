@extends('admin.app')

@include('admin.partials.flash')
@section('custom_css')
<link rel="stylesheet" type="text/css"
    href="{{asset('/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
<!-- Footable CSS -->
<link href="{{asset('/assets/node_modules/footable/css/footable.bootstrap.min.css')}}" rel="stylesheet">
<!-- page css -->
<link href="{{asset('dist/css/pages/footable-page.css')}}" rel="stylesheet">
<link href="{{asset('dist/css/pages/other-pages.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">

                </div>
                {{-- Form import --}}
                <form action="{{ route('admin.cities.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label>Default file upload</label>
                    <input type="file" name="file" class="form-control">
                    <button class="btn btn-primary">Import data</button>
                </form>
                {{-- End form import --}}
                <h4 class="card-title">Data Export</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <div class="table-responsive">
                    <table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list"
                        data-paging="true" data-paging-size="7">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($cities))
                            @foreach ($cities as $city)
                            <tr>
                                <td>{{$city->city_id}}</td>
                                <td>{{$city->city_code}}</td>
                                <td>{{$city->city_name}}</td>
                            </tr>
                            @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
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
                $('#demo-foo-addrow').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
            });
</script>
@endsection