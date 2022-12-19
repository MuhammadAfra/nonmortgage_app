@extends('layout.layout')
@section('title')
Master Jenis Product
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('master_jenis_product') }}">Master Jenis Product</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
    <a href="{{ url('/jenis_product') }}">Master Jenis Product</a>
    @endsection
@endif

@section('content')
<div class="d-flex pb-3">
    <a href="{{ url('master_jenis_product/create') }}" class="btn btn-success my-2">Create New</a>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Jenis Product</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 100px;">No</th>
                    @if (auth()->user()->level ==  "Admin")
                    <th style="width: 200px;">Action</th>
                    @endif
                    <th>Jenis Product</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenisProduct as $item)                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if (auth()->user()->level == "Admin")
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('master_jenis_product/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('master_jenis_product/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                            <div>
                                <form action="{{ url('master_jenis_product',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                        @endif
                        <td>{{ $item->Product }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
