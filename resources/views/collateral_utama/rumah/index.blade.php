@extends('layout.layout')
@section('content')
@section('title')
Collateral Utama - Rumah/Tanah
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('/collateral_rumah') }}">Collateral Utama - Rumah/Tanah</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
    <a href="#">Collateral Utama - Rumah/Tanah</a>
    @endsection
@endif

@section('content')

@if (auth()->user()->level == "Admin")
<div class="d-flex pb-3">
    <a href="{{ url('/collateral_rumah/create') }}" class="btn btn-success my-2">Create New</a>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Collateral Utama</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    @if (auth()->user()->level == "Admin")
                    <th>Action</th>
                    @endif
                    <th>Partner ID</th>
                    <th>Debitur ID</th>
                    <th>Coll ID</th>
                    <th>Nilai Rumah / Tanah</th>
                    <th>No SHM / No HGB</th>
                    <th>Luas</th>
                    <th>Atas Nama</th>
                    <th>Alamat</th>
                    <th>Nilai Appraisal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rumah as $item)             
                <tr >
                    <td class="text-center">{{ $loop->iteration }}</td>
                    @if (auth()->user()->level == "Admin")
                    <td class="d-flex" style="justify-content: center">
                        <div><a href="{{ url('collateral_rumah',$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                        <div><a href="{{ url('collateral_rumah',$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                        <div>
                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter{{ $item->id }}" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                    @include('collateral_utama.rumah.delete')
                    @endif
                    <td>{{ $item->partner->NAMA_PERUSAHAAN }}</td>
                    <td>
                        @if ($item->DEBITUR_ID != NULL)
                            {{ $item->debitur->NAMA_DEBITUR }}
                        @elseif($item->DEBITUR_BADAN_USAHA_ID != NULL)
                            {{ $item->debitur_badan_usaha->NAMA_PERUSAHAAN }}
                        @endif
                    </td>
                    <td>{{ str_pad($item->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}</td>
                    <td>Rp{{ number_format($item->Nilai_Rumah_Tanah) }}</td>
                    <td>{{ $item->No_Shm_No_Hgb }}</td>
                    <td>{{ $item->Luas }} M<sup>2</sup></td>
                    <td>{{ $item->Atas_Nama }}</td>
                    <td>{{ $item->Alamat }}</td>
                    <td>Rp{{ number_format($item->Nilai_Appraisal) }}</td>
                    <td>{{ $item->Status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection