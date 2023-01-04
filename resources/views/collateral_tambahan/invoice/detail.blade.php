@extends('layout.layout')
@section('title')
Collateral Utama - Invoice
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('collateral_invoice') }}">Collateral Utama - Invoice</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner Perusahaan</label></div>
            <div class="col-sm-8">: {{ $invoice->product->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Debitur</label></div>
            <div class="col-sm-8">: {{ $invoice->product->debitur->NAMA_DEBITUR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Counter invoice</label></div>
            <div class="col-sm-8">: {{ $invoice->Counter_Invoice }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Invoice</label></div>
            <div class="col-sm-8">: {{ $invoice->Nilai_Invoice}}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Invoice</label></div>
            <div class="col-sm-8">: {{ $invoice->Jenis_Invoice }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Atas Nama Invoice</label></div>
            <div class="col-sm-8">: {{ $invoice->Atas_Nama_Invoice }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat Nama Invoice</label></div>
            <div class="col-sm-8">: {{ $invoice->Alamat_Nama_Invoice }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Fiducia</label></div>
            <div class="col-sm-8">: {{ $invoice->No_Fiducia }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Fiducia</label></div>
            <div class="col-sm-8">: {{ $invoice->Nilai_Fiducia }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggal Fiducia</label></div>
            <div class="col-sm-8">: {{ $invoice->Tgl_Fiducia}}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggal Jatuh Tempo</label></div>
            <div class="col-sm-8">: {{ $invoice->Tgl_Jatuh_Tempo }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $invoice->Status }}</div>
        </div>


        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('collateral_invoice/'.$invoice->id.'/edit') }}" class="btn btn-warning text-white"
                    type="submit">Edit</a>
                <a href="{{ url('collateral_invoice') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection