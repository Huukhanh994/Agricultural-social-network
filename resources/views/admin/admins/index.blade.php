@extends('site.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Admin Management</h2>
        </div>
        <div class="pull-right">
            <a href="{{route('admins.create')}}" class="btn btn-success">Create New Admin</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($data as $key => $admin)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $admin->name }}</td>
        <td>{{ $admin->email }}</td>
        <td>
            @if(!empty($admin->getRoleNames()))
            @foreach($admin->getRoleNames() as $v)
            <label class="badge badge-success">{{ $v }}</label>
            @endforeach
            @endif
        </td>
        <td>
            <a class="btn btn-info" href="{{ route('admins.show',$admin->admin_id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('admins.edit',$admin->admin_id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['admins.destroy', $admin->admin_id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</table>

{!! $data->render() !!}
@endsection