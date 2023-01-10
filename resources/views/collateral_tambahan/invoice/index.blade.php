@extends('layout.layout')
@section('content')
@section('title')
Collateral Tambahan - Invoice
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
@section('page')
<a href="{{ url('collateral_invoice_tambahan') }}">Collateral Tambahan - Invoice</a>
@endsection
@elseif(auth()->user()->level == "User")
@section('page')
<a href="#">Collateral Tambahan - Invoice</a>
@endsection
@endif

@section('content')

@if (auth()->user()->level == "Admin")
<div class="d-flex pb-3">
    <a href="{{ url('collateral_invoice_tambahan/create') }}" class="btn btn-success my-2">Create New</a>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Collaterals Invoice</h3>
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
                    <th>Partner Perusahaan</th>
                    <th>Nama Debitur</th>
                    <th>Counter Invoice</th>
                    <th>Nilai Invoice</th>
                    <th>Jenis Invoice</th>
                    <th>Atas Nama Invoice</th>
                    <th>Alamat Nama Invoice</th>
                    <th>No Fiducia</th>
                    <th>Nilai Fiducia</th>
                    <th>Tanggal Fiducia</th>
                    <th>Tanggal Jatuh Tempo</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoicetbh as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    @if (auth()->user()->level == "Admin")
                    <td class="d-flex" style="justify-content: center">
                        <div><a href="{{ url('collateral_invoice_tambahan/'.$item->id.'/edit') }}"
                                class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                        <div><a href="{{ url('collateral_invoice_tambahan/'.$item->id) }}"
                                class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                        <div>
                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter{{ $item->id }}" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                    @include('collateral_tambahan.invoice.delete')
                    @endif
                    <td>{{ $item->product->partner->NAMA_PERUSAHAAN }}</td>
                    <td>{{ $item->product->debitur->NAMA_DEBITUR }}</td>
                    <td>{{ $item->Counter_Invoice_Tambahan}}</td>
                    <td>{{ number_format($item->Nilai_Invoice_Tambahan)}}</td>
                    <td>{{ $item->Jenis_Invoice_Tambahan}}</td>
                    <td>{{ $item->Atas_Nama_Invoice_Tambahan}}</td>
                    <td>{{ $item->Alamat_Nama_Invoice_Tambahan}}</td>
                    <td>{{ $item->No_Fiducia_Tambahan}}</td>
                    <td>{{ number_format($item->Nilai_Fiducia_Tambahan)}}</td>
                    <td>{{ $item->Tgl_Fiducia_Tambahan}}</td>
                    <td>{{ $item->Tgl_Jatuh_Tempo_Tambahan}}</td>
                    <td>{{ $item->Status_Tambahan}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection