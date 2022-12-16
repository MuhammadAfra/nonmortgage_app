@extends('layout.layout')
@section('title')
Master Skema Pembiayaan
@endsection

@section('subtitle')
Home
@endsection

@section('page')
    <a href="{{ url('master_skema_pembiayaan') }}">Master Skema Pembiayaan</a>
@endsection
@section('content')
<div class="d-flex pb-3">
    <a href="{{ url('master_skema_pembiayaan/create') }}" class="btn btn-success my-2">Create New</a>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Skema Pembiayaan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Action</th>
                    <th>Skema Pembiayaan</th>
                    {{-- <th>Id Jenis Pembiayaan</th> --}}
                    <th>Jenis Pembiayaan</th>
                    {{-- <th>Id Product</th> --}}
                    <th>Jenis Product</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skemaPembiayaan as $item)                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('master_skema_pembiayaan/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('master_skema_pembiayaan/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                            <div>
                                <form action="{{ url('master_skema_pembiayaan',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                        <td>{{ $item->skema_pembiayaan }}</td>
                        {{-- <td>{{ $item->jenis->id }}</td> --}}
                        <td>{{ $item->jenis->jenis_pembiayaan }}</td>
                        {{-- <td>{{ $item->jenis->jenis_product->id }}</td> --}}
                        <td>{{ $item->jenis->jenis_product->Product }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
