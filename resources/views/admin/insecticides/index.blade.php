@extends('admin.app')
@section('custom_css')
<link rel="stylesheet" type="text/css"
    href="{{asset('/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <h1>Processing....</h1>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <div class="card-body">
                        <form action="{{ route('admin.insecticides.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <br>
                            <button class="btn btn-success">Import Data</button>
                        </form>
                    </div>
                </div>
                <h4 class="card-title">Data Export</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Ingredient</th>
                                <th>Dosage</th>
                                <th>Indication</th>
                                <th>Age</th>
                                <th>Amount</th>
                                <th>Producer</th>
                                <th>Produce_date</th>
                                <th>Expiry_date</th>
                                <th>Price</th>
                                <th>Notes</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($insecticides as $item)
                               <tr>
                               <td>{{$item->insecticide_id}}</td>
                               <td>{{$item->insecticide_code}}</td>
                               <td>{{$item->insecticide_name}}</td>
                               <td>{{$item->insecticide_ingredient}}</td>
                               <td>{{$item->insecticide_dosage}}</td>
                               <td>{{$item->insecticide_indication}}</td>
                               <td>{{$item->insecticide_age}}</td>
                               <td>{{$item->insecticide_amount}}</td>
                               <td>{{$item->insecticide_producer}}</td>
                               <td>{{$item->insecticide_produce_date}}</td>
                               <td>{{$item->insecticide_expiry_date}}</td>
                               <td>{{$item->insecticide_price}}</td>
                               <td>{{$item->insecticide_notes}}</td>
                               <td>{{$item->category->category_name}}</td>
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
@endsection