@extends('layout.layout')
@section('content')
@section('title')
Collateral Utama - Corporate Guarantee
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
@section('page')
<a href="{{ url('collateral_corporate') }}">Collateral Utama - Corporate Guarantee</a>
@endsection
@elseif(auth()->user()->level == "User")
@section('page')
<a href="#">Collateral Utama - Corporate Guarantee</a>
@endsection
@endif

@section('content')

@if (auth()->user()->level == "Admin")
<div class="d-flex pb-3">
    <a href="{{ url('collateral_corporate/create') }}" class="btn btn-success my-2">Create New</a>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Collaterals Corporate Guarantee</h3>
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
                    <th>Partner ID</th>
                    <th>Debitur ID</th>
                    <th>Product ID</th>
                    <th>Nilai Corporate Guarantee</th>
                    <th>Nama PT Penerima Corporate Guarante</th>
                    <th>Nama PT Pemberi Corporate Guarante</th>
                    <th>No Telp PT Pemberi Corporate Guarante</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($corporate as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    @if (auth()->user()->level == "Admin")
                    <td class="d-flex" style="justify-content: center">
                        <div><a href="{{ url('collateral_corporate/'.$item->id.'/edit') }}"
                                class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                        <div><a href="{{ url('collateral_corporate/'.$item->id) }}"
                                class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                        <div>
                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter{{ $item->id }}" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                    @include('collateral_utama.corporate.delete')
                    @endif
                    <td>{{ $item->partner->NAMA_PERUSAHAAN }}</td>
                    <td>{{ $item->debitur->NAMA_DEBITUR }}</td>
                    <td>{{ $item->product->m_product->nama_product }}</td>
                    <td>Rp{{ number_format($item->Nilai_Corporate_Guarantee) }}</td>
                    <td>{{ $item->Nama_Pt_Penerima_Corporate_Guarantee }}</td>
                    <td>{{ $item->Nama_Pt_Pemberi_Corporate_Guarantee }}</td>
                    <td>{{ $item->No_Telp_Pt_Pemberi_Corporate_Guarantee }}</td>
                    <td>{{ $item->Status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection