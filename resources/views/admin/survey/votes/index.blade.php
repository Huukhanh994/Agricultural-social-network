@extends('admin.app')

@section('content')
<div class="container">
    @foreach ($polls as $item)
        {{ PollWriter::draw(Inani\Larapoll\Poll::find($item->id)) }}
    @endforeach
</div>
@endsection