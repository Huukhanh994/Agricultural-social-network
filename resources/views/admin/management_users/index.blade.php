@extends('admin.app')

@section('title')
    {{$pageTitle}}
@endsection

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
    <!-- Footable CSS -->
    <link href="{{asset('/assets/node_modules/footable/css/footable.bootstrap.min.css')}}" rel="stylesheet">
    <!-- page css -->
    <link href="{{asset('dist/css/pages/footable-page.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/pages/other-pages.css')}}" rel="stylesheet">
@endsection
@include('admin.partials.flash')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        
                    </div>
                    {{-- Form import --}}
                    <form action="{{ route('admin.manager_users.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label>Default file upload</label>
                        <input type="file" name="file" class="form-control">
                        <button class="btn btn-primary">Import data</button>
                    </form>
                    {{-- End form import --}}
                    <h4 class="card-title">Data Export</h4>
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                    <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal"
                        data-target="#add-contact">Add New User</button>
                    <!-- Add Contact Popup Model -->
                    <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Add New User</h4>
                                </div>
                                <div class="modal-body">
                                    <from class="form-horizontal form-material">
                                        <form method="POST" action="{{route('admin.manager_users.store')}}" class="m-t-40" novalidate enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <h5>Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" required
                                                        data-validation-required-message="This field is required"> </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Email Field <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" required
                                                        data-validation-required-message="This field is required"> </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Status <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="status" id="select" required class="form-control">
                                                        <option value="">Select Your Status</option>
                                                        <option value="Maried">Maried</option>
                                                        <option value="Alone">Alone</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Enter Date <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="birth" class="form-control" placeholder="MM/DD/YYYY"> </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Gender <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="gender" id="select" required class="form-control">
                                                        <option value="">Select Your Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>File Input Avatar <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="user_avatar" class="form-control" required> </div>
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
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table table-bordered m-t-30 table-hover contact-list" data-paging="true"
                            data-paging-size="7">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Birth</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($users))
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>
                                                @if (isset($user->avatar))
                                                    <a href="javascript:void(0)"><img src="{{ asset('storage/users-avatar/'.$user->avatar) }}" alt="user"
                                                         width="40" class="img-circle" />
                                                        {{$user->name}}
                                                @else
                                                    @if ($user->gender == 'Male')
                                                        <a href="javascript:void(0)"><img src="{{asset('assets/images/users-avatar/5.jpg')}}" alt="user"
                                                            width="40" class="img-circle" />
                                                            {{$user->name}}
                                                    @elseif($user->gender == 'Female')
                                                        <a href="javascript:void(0)"><img src="{{asset('assets/images/users-avatar/4.jpg')}}" alt="user"
                                                            width="40" class="img-circle" />
                                                            {{$user->name}}
                                                    @else
                                                        <a href="javascript:void(0)"><img src="{{asset('assets/images/users-avatar/1.jpg')}}" alt="user"
                                                             width="40" class="img-circle" />
                                                            {{$user->name}}
                                                    @endif
                                                @endif
                                            </a>
                                            </td>
                                        <td>
                                            <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                                        </td>
                                        <td>
                                            <a href="tel:{{$user->tel}}">{{$user->tel}}</a>
                                        </td>
                                        <td>
                                            @if ($user->getRoleNames())
                                                <span class="label label-danger">{{$user->getRoleNames()}}</span>
                                            @else
                                                <span class="label label-success">Normal</span>
                                            @endif
                                        </td>
                                        <td>{{$user->birth}}</td>
                                        <td>{{$user->gender}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Second group">
                                                    <a href="{{ route('admin.manager_users.edit', $user->id) }}" class="btn btn-sm btn-primary"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a href="{{ route('admin.manager_users.delete', $user->id) }}" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
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
    <!-- Footable -->
    <script src="{{asset('/assets/node_modules/moment/moment.js')}}"></script>
    <script src="{{asset('/assets/node_modules/footable/js/footable.min.js')}}"></script>
    <!--FooTable init-->
    {{-- TODO: Tat de cho load trang KHONG bi cham --}}
    {{-- <script src="{{asset('dist/js/pages/footable-init.js')}}"></script>
    <script src="{{asset('dist/js/pages/validation.js')}}"></script> --}}
    {{-- <script>
        ! function(window, document, $) {
            "use strict";
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        }(window, document, jQuery);
    </script> --}}
@endsection