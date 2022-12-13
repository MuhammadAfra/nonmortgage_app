@extends('layout.layout')
@section('title')
User Management
@endsection

@section('subtitle')
Home
@endsection

@section('page')
    <a href="{{ url('users') }}">User Management</a>
@endsection
@section('content')
<div class="d-flex pb-3">
    <a href="{{ url('users/create') }}" class="btn btn-success my-2">Create New</a>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Users</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="user" class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th style="width: 100px">Action</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Level / Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataUser as $item)                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('users/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('users/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                            <div>
                                <form action="{{ url('users',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->level }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
