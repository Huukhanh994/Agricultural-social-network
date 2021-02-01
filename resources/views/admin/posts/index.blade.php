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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.partials.flash')
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Export</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal"
                    data-target="#add-contact">Add New Post</button>
                <!-- Add Contact Popup Model -->
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Add New Post</h4>
                            </div>
                            <div class="modal-body">
                                <from class="form-horizontal form-material">
                                    <form method="POST" action="{{route('admin.posts.store')}}" class="m-t-40"
                                        novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <h5>Title <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="post_title" class="form-control" required
                                                    data-validation-required-message="This field is required"> </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Content <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea type="text" name="post_content" class="form-control" required
                                                    data-validation-required-message="This field is required"></textarea> </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input class="form-control" name="post_price" type="number" value="42" id="example-number-input" data-validation-required-message="This field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Category <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select id="select" required class="form-control" name="category_id">
                                                    <option value="">Select Your Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" id="image-upload" name="image_upload[]" enctype="multipart/form-data" multiple>
                                        </div>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-info waves-effect" id="submit-all">Save</button>
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
                                <th>Title</th>
                                <th>Content</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Published</th>
                                <th>User ID</th>
                                <th>Category ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->post_id}}</td>
                                    <td>{{$post->post_title}}</td>
                                    <td>{!!$post->post_content!!}</td>
                                    <td>{{$post->post_price}}</td>
                                    <td>
                                        @switch($post->post_status)
                                            @case('pending')
                                            <span class="badge badge-info badge-pill">{{$post->post_status}}</span>
                                            @break
                                        
                                        @case('accepted')
                                            <span class="badge badge-success badge-pill">{{$post->post_status}}</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>{{$post->post_published}}</td>
                                    <td>{{$post->users['name']}} </td>
                                    @if (isset($post->categories))
                                        <td>{{$post->categories->category_name}}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.posts.show', $post->post_id) }}" class="btn btn-sm btn-primary"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{ route('admin.posts.accept', $post->post_id) }}" class="btn btn-sm btn-info"><i
                                                    class="fas fa-check"></i></a>
                                            <a href="{{ route('admin.posts.delete', $post->post_id) }}" class="btn btn-sm btn-danger"><i
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
<script type="text/javascript">
    Dropzone.options.dropzoneForm = {
    autoProcessQueue : false,
    acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",
    init:function(){
      var submitButton = document.querySelector("#submit-all");
      myDropzone = this;
      submitButton.addEventListener('click', function(){
        myDropzone.processQueue();
      });
      this.on("complete", function(){
        if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
        {
          var _this = this;
          _this.removeAllFiles();
        }
      });
    }
  };
</script>
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
{{-- <script src="{{asset('/assets/node_modules/footable/js/footable.min.js')}}"></script> --}}
<!--FooTable init-->
<script src="{{asset('dist/js/pages/footable-init.js')}}"></script>
<script src="{{asset('dist/js/pages/validation.js')}}"></script>
<script>
    ! function(window, document, $) {
            "use strict";
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        }(window, document, jQuery);
</script>
<script src="{{asset('/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
@endsection