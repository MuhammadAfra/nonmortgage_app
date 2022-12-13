@extends('layout.layout')
@section('title')
Master Suku Bunga
@endsection

@section('subtitle')
Home
@endsection

@section('page')
    <a href="{{ url('master_suku_bunga') }}">Master Suku Bunga</a>
@endsection
@section('content')

@if (auth()->user()->level == "Admin")                            
<div class="d-flex pb-3">
    <a href="{{ url('master_suku_bunga/create') }}" class="btn btn-success my-2">Create New</a>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Suku Bunga</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    @if (auth()->user()->level == "Admin")        
                    <th>Action</th>
                    @endif
                    <th>Suku Bunga</th>
                    <th>Nilai Suku Bunga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sukuBunga as $item)                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if (auth()->user()->level == "Admin")    
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('master_suku_bunga/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('master_suku_bunga/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                            <div>
                                <form action="{{ url('master_suku_bunga',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                        @endif
                        <td>{{ $item->Suku_Bunga }}</td>
                        <td>{{ $item->Nilai_Suku_Bunga }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
