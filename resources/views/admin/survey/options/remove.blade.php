@extends('admin.app')
@section('title')
Polls- Remove options
@endsection

@section('style')
<style>
    .errors-list {
        list-style-type: none;
    }
</style>
@endsection
@section('content')
<div class="container">
    <ol class="breadcrumb m-b-10">
        <li class="breadcrumb-item"><a href="{{route('admin.polls.home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.polls.index')}}">Polls</a></li>
        <li class="breadcrumb-item active">Rmove Options</li>
    </ol>
    <div class="well col-md-8 col-md-offset-2">
        @if($errors->any())
        <ul class="alert alert-danger errors-list">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="POST" action=" {{ route('admin.polls.options.remove', $poll->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <!-- Question Input -->
            <div class="form-group">
                <label>{{ $poll->question }}</label>
                <div class="radio">
                    @foreach($poll->options as $option)
                    <label>
                        <input type="checkbox" name="options[]" value={{ $option->id }}> {{ $option->name }}
                    </label>
                    <br />
                    @endforeach
                </div>
            </div>
            <!-- Create Form Submit -->
            <div class="form-group">
                <input name="Delete" type="submit" value="Delete" class="btn btn-danger form-control">
            </div>
        </form>
    </div>
</div>
@endsection