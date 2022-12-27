@extends('layout.layout')

@section('title')
Product
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('product') }}">Product</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
    <a href="{{ url('/index_product') }}">Product</a>
    @endsection
@endif

@section('content')

@if (auth()->user()->level == "Admin")                            
<div class="d-flex pb-3">
    <a href="{{ url('product/create') }}" class="btn btn-success my-2">Create New</a>
    <a href="{{ url('/upload_product') }}" class="btn btn-secondary my-2 ml-2">Upload File</a>
</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Product</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-responsive">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    @if (auth()->user()->level == "Admin")        
                    <th>Action</th>
                    @endif
                    {{-- <th>Partner ID</th> --}}
                    <th>Partner</th>
                    {{-- <th>Debitur ID</th> --}}
                    <th>Debitur</th>
                    <th>Jenis Product</th>
                    <th>Nilai Pembiayaan Pokok Maximum</th>
                    <th>Suku Bunga</th>
                    <th>Jangka Waktu Maximum</th>
                    <th>Pola Pembayaran</th>
                    <th>Biaya Administrasi</th>
                    <th>Biaya Asuransi</th>
                    <th>Biaya Provinsi</th>
                    <th>Biaya Lain Lain</th>
                    {{-- <th>File</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($dataproduct as $item)             
                <tr >
                    <td class="text-center">{{ $loop->iteration }}</td>
                    @if (auth()->user()->level == "Admin")                            
                    <td class="d-flex" style="justify-content: center">
                        <div><a href="{{ url('product/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                        <div><a href="{{ url('product/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                        <div>
                            <form action="{{ url('product',$item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    @endif
                    </td>
                    {{-- <td>{{ $item->partner->id }}</td> --}}
                    <td>{{ $item->partner->NAMA_PERUSAHAAN }}</td>
                    {{-- <td>{{ $item->debitur->id }}</td> --}}
                    <td>{{ $item->debitur->NAMA_DEBITUR }}</td>
                    <td>{{ $item->jenis_product->Product }}</td>
                    <td>{{ $item->NILAI_PEMBIAYAAN_POKOK_MAXIMUM }}</td>
                    <td>{{ $item->suku_bunga->Suku_Bunga }} {{ $item->suku_bunga->jp->Product }}</td>
                    <td>{{ $item->Jangka_Waktu_Maximum }}</td>
                    <td>{{ $item->pola_pembayaran->Pola_Pembayaran }}</td>
                    <td>{{ $item->BIAYA_ADMINISTRASI }}</td>
                    <td>{{ $item->BIAYA_ASSURANSI }}</td>
                    <td>{{ $item->BIAYA_PROVISI }}</td>
                    <td>{{ $item->BIAYA_LAIN_LAIN }}</td>
                    {{-- <td>{{ $item->upload }}</td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection