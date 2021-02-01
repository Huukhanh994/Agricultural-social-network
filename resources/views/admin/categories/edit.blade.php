@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
    </div>
</div>
@include('admin.partials.flash')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="tile">
            <h3 class="tile-title">{{ $subTitle }}</h3>
            <form action="{{ route('admin.categories.update') }}" method="POST" role="form"
                enctype="multipart/form-data">
                @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label" for="category_name">Name <span class="m-l-5 text-danger"> *</span></label>
                        <input class="form-control @error('category_name') is-invalid @enderror" type="text" name="category_name"
                            id="category_name" value="{{ old('name', $targetCategory->category_name) }}" />
                        <input type="hidden" name="category_id" value="{{ $targetCategory->category_id }}">
                        @error('category_name') {{ $message }} @enderror
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update
                        Category</button>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-secondary" href="{{ route('admin.categories.index') }}"><i
                            class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection