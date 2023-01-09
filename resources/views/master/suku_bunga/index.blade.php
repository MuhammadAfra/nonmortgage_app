@extends('layout.layout')
@section('title')
Master Suku Bunga
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('master_suku_bunga') }}">Master Suku Bunga</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
        <a href="{{ url('/suku_bunga') }}">Master Suku Bunga</a>
    @endsection
@endif

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
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center" style="width: 25px;">No</th>
                    @if (auth()->user()->level == "Admin")        
                    <th class="text-center" style="width: 100px;">Action</th>
                    @endif
                    <th class="text-center">Suku Bunga</th>
                    <th class="text-center">Nilai Suku Bunga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sukuBunga as $item)                    
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        @if (auth()->user()->level == "Admin")    
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('master_suku_bunga/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('master_suku_bunga/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                            <div>
                                <button type="button" data-toggle="modal" data-target="#exampleModalCenter{{ $item->id }}" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                        @include('master.suku_bunga.delete')
                        @endif
                        <td>{{ $item->Suku_Bunga }} {{ $item->jp->Product }}</td>
                        <td>{{ number_format($item->Nilai_Suku_Bunga) }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
</div>
@endsection
