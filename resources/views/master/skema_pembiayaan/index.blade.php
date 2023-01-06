@extends('layout.layout')
@section('title')
Master Skema Pembiayaan
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('master_skema_pembiayaan') }}">Master Skema Pembiayaan</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
    <a href="{{ url('/skema_pembiayaan') }}">Master Skema Pembiayaan</a>
    @endsection
@endif

@section('content')
@if (auth()->user()->level == "Admin")    
<div class="d-flex pb-3">
    <a href="{{ url('master_skema_pembiayaan/create') }}" class="btn btn-success my-2">Create New</a>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Skema Pembiayaan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center" style="width: 100px;">No</th>
                    @if (auth()->user()->level == "Admin")
                    <th class="text-center" style="width: 200px;">Action</th>
                    @endif
                    <th class="text-center">Skema Pembiayaan</th>
                    {{-- <th>Id Jenis Pembiayaan</th> --}}
                    <th class="text-center">Jenis Pembiayaan</th>
                    {{-- <th>Id Product</th> --}}
                    <th class="text-center">Jenis Product</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skemaPembiayaan as $item)                    
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        @if (auth()->user()->level == "Admin")
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('master_skema_pembiayaan/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('master_skema_pembiayaan/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                            <div>
                                <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                            </div>
                            </div>
                        </td>
                        @endif
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
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5>Apakah Anda Yakin Ingin Hapus Data?</h5>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ url('master_skema_pembiayaan',$item->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger text-white">Delete</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
