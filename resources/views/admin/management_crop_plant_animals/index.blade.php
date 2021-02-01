@extends('admin.app')

@section('title')
{{$pageTitle}}
@endsection

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
<link href="{{asset('/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @include('admin.partials.flash')
                <h4 class="card-title">Data Export</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal"
                    data-target="#add-contact">Add New Product</button>
                <!-- Add Contact Popup Model -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Add New Product</h4>
                            </div>
                            <div class="modal-body">
                                <from class="form-horizontal form-material">
                                    <form method="POST" action="{{route('admin.manager_crop_plant_animals.store')}}" class="m-t-40"
                                        novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <h5>Code <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="crop_plant_animal_code" class="form-control" required
                                                    data-validation-required-message="This field is required"> </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="crop_plant_animal_name" class="form-control" required
                                                    data-validation-required-message="This field is required"> </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Growth time <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="tch3" type="text" value="" name="crop_plant_animal_growth_time"
                                                    data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Color</h5>
                                            <div class="controls">
                                                <input type="text" name="crop_plant_animal_color" class="form-control"
                                                    data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Weight <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="tch3" type="text" value="" name="crop_plant_animal_weight" data-bts-button-down-class="btn btn-secondary btn-outline"
                                                    data-bts-button-up-class="btn btn-secondary btn-outline">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Height <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="tch3" type="text" value="" name="crop_plant_animal_height" data-bts-button-down-class="btn btn-secondary btn-outline"
                                                    data-bts-button-up-class="btn btn-secondary btn-outline">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Product type <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="product_id" id="select" required class="form-control">
                                                    @foreach ($product_type as $item)
                                                        <option value="{{$item->product_id}}">{{$item->product_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-info waves-effect">Save</button>
                                            <button type="button" class="btn btn-default waves-effect"
                                                data-dismiss="modal">Cancel</button>
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
                                <th>Growth time</th>
                                <th>Color</th>
                                <th>Weight</th>
                                <th>Height</th>
                                <th>Product Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$item->crop_plant_animal_id}}</td>
                                    <td>{{$item->crop_plant_animal_code}}</td>
                                    <td>{{$item->crop_plant_animal_name}}</td>
                                    <td>{{$item->crop_plant_animal_growth_time}}</td>
                                    <td>{{$item->crop_plant_animal_color}}</td>
                                    <td>{{$item->crop_plant_animal_weight}}</td>
                                    <td>{{$item->crop_plant_animal_height}}</td>
                                    <td>{{$item->product_id}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.manager_crop_plant_animals.edit', $item->crop_plant_animal_id) }}" class="btn btn-sm btn-primary"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.manager_crop_plant_animals.delete', $item->crop_plant_animal_id) }}" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash"></i></a>
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
<!-- Footable -->
<script src="{{asset('/assets/node_modules/moment/moment.js')}}"></script>
<script src="{{asset('/assets/node_modules/footable/js/footable.min.js')}}"></script>
<!--FooTable init-->
<script src="{{asset('dist/js/pages/footable-init.js')}}"></script>
<script src="{{asset('dist/js/pages/validation.js')}}"></script>
<script>
    ! function(window, document, $) {
            "use strict";
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        }(window, document, jQuery);
</script>
<script src="{{asset('/assets/node_modules/switchery/dist/switchery.min.js')}}"></script>
<script src="{{asset('/assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript">
</script>
<script>
    $(function () {
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='crop_plant_animal_growth_time']").TouchSpin();
            $("input[name='crop_plant_animal_weight']").TouchSpin();
            $("input[name='crop_plant_animal_height']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
        });
</script>
@endsection