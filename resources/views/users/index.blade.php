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
        <table id="user" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center" style="width: 25px">No</th>
                    <th class="text-center" style="width: 100px">Action</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Level / Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataUser as $item)                    
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('users/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('users/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                            <div><a class="btn btn-danger btn-sm text-whitedelete" data-toggle="modal" data-target="#modal-delete" data-id="{{ $item->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<!-- Modal -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin akan menghapus? 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form action="{{ url('users',$item->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger text-white">Ya</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            $('#id-destroy').val(id);
        });
</script>
@endsection
