
@extends('site.app')
@section('title')
    {{$pageTitle}}
@endsection
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('/assets/node_modules/summernote/dist/summernote-bs4.css')}}">
<link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('site.posts.storeSummernote') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label">Select a category</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $item)
                            <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Title</label>
                    <input class="form-control" type="text" placeholder="" name="post_title" value="" required>
                </div>
                <div class="form-group">
                    <textarea name="post_content" class="summernote"></textarea>
                </div>
                <button class="btn btn-primary">Submit</button>
                <button class="btn btn-default">Cancel</button>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
<!--Custom JavaScript -->
<script src="{{asset('/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('/assets/node_modules/popper/popper.min.js')}}"></script>
<script src="{{asset('/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src="{{asset('/assets/node_modules/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('/assets/node_modules/summernote/dist/summernote-bs4.min.js')}}"></script>
<script>
    $(function() {
            $('.summernote').summernote({
                height: 350, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });
    
            $('.inline-editor').summernote({
                airMode: true
            });
    
        });
    
        window.edit = function() {
                $(".click2edit").summernote()
            },
            window.save = function() {
                $(".click2edit").summernote('destroy');
            }
</script>
@endpush