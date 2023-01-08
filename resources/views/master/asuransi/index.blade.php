@extends('layout.layout')
@section('title')
Master Asuransi
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('master_asuransi') }}">Master Asuransi</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
    <a href="{{ url('/master_asuransi') }}">Master Asuransi</a>
    @endsection
@endif

@section('content')
@if (auth()->user()->level == "Admin")    
<div class="d-flex pb-3">
    <a href="{{ url('master_asuransi/create') }}" class="btn btn-success my-2">Create New</a>
</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Asuransi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center" style="width: 100px;">No</th>
                    @if (auth()->user()->level == "Admin")
                    <th class="text-center"style="width: 200px;">Action</th>
                    @endif
                    <th class="text-center">Jenis Asuransi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jenisAsuransi as $item)                    
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        @if (auth()->user()->level == "Admin")
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('master_asuransi/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('master_asuransi/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                            <div>
                                <form action="{{ url('master_asuransi',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                        @endif
                        <td>{{ $item->Jenis_Asuransi }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
