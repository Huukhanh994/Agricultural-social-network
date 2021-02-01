@extends('admin.app')
@push('custom_css')
<link rel="stylesheet" type="text/css"
    href="{{asset('/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
<link href="{{asset('dist/css/pages/stylish-tooltip.css')}}" rel="stylesheet">
@endpush
@section('title')
    {{$pageTitle}}
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Export</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Start date</th>
                                <th>Status user</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                            <tr>
                                <td>{{$post->users['name']}}</td>
                                <td>{{$post->post_title}}</td>
                                <td>
                                    <a class="mytooltip" href="javascript:void(0)">
                                        {{ \Illuminate\Support\Str::limit($post->post_content, 20, $end='...') }}<span
                                            class="tooltip-content5"><span class="tooltip-text3"><span
                                                    class="tooltip-inner2">{{$post->post_content}}</a>
                                </td>
                                <td class="text-center">
                                    @switch($post->post_status)
                                        @case('pending')
                                            <div class="label label-table label-info">{{$post->post_status}}</div>
                                        @break
                                    @case('accepted')
                                            <div class="label label-table label-success">{{$post->post_status}}</div>
                                        @break
                                    @default
                                    @endswitch
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                </td>
                                <td class="text-center">
                                    @switch($post->status_user)
                                        @case('normal')
                                            <div class="label label-table label-info">{{$post->status_user}}</div>
                                        @break
                                    @case('blocked')
                                            <div class="label label-table label-danger">{{$post->status_user}}</div>
                                        @break
                                    @default
                                    @endswitch
                                </td>
                                <td>
                                    <input type="hidden" name="user_id" value="{{$post->users['id']}}">
                                    <input type="hidden" name="post_id" value="{{$post->post_id}}">
                                    @if ($post->status_user === "normal")
                                        <button type="button" class="btn btn-danger" data-id="{{$post->post_id}}" data-userId="{{$post->users['id']}}"><i class="fas fa-times"></i>
                                            Block</button>
                                    @else
                                        <button type="button" class="btn btn-success" data-id="{{$post->post_id}}" data-userId="{{$post->users['id']}}"><i class="fa fa-check"></i>
                                            UnBlock</button>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <h3>Not found user post article.</h3>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<!-- This is data table -->
<script src="{{asset('/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
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
<script type="text/javascript">
    $(document).ready(function () {
        // Block user
        $(".btn-danger").click(function() {
            if (confirm('Do you want to block this user?')) {
                var postId = $(this).attr("data-id");
                var userId = $(this).attr("data-userId");
                // var userId = $('input[name="user_id"]').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.posts.blockAjax')}}",
                    data: {postId :postId,userId: userId},
                    dataType: "JSON",
                    success: function (response) {
                        alert(response.status);
                        window.location.reload();
                    }
                });
            } else {
                return false;
            }
        });

        // Unblock user
        $(".btn-success").click(function() {
            if (confirm('Do you want to ublock this user?')) {
                var postId = $(this).attr("data-id");
                var userId = $(this).attr("data-userId");
                // var userId = $('input[name="user_id"]').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.posts.unblockAjax')}}",
                    data: {postId :postId,userId: userId},
                    dataType: "JSON",
                    success: function (response) {
                        alert(response.status);
                        window.location.reload();
                    }
                });
            } else {
                return false;
            }
        })
    });
</script>
@endpush