@extends('layout.layout')
@section('title')
Collateral Tambahan - Invoice
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('collateral_invoice_tambahan') }}">Collateral Tambahan - Invoice</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner ID</label></div>
            <div class="col-sm-8">: {{ $invoicetbh->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Debitur ID</label></div>
            <div class="col-sm-8">: {{ $invoicetbh->debitur->NAMA_DEBITUR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Coll ID</label></div>
            <div class="col-sm-8">: {{ str_pad($invoicetbh->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Invoice</label></div>
            <div class="col-sm-8">: Rp{{ number_format($invoicetbh->Nilai_Invoice_Tambahan) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Invoice</label></div>
            <div class="col-sm-8">: {{ $invoicetbh->Jenis_Invoice_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Atas Nama Invoice</label></div>
            <div class="col-sm-8">: {{ $invoicetbh->Atas_Nama_Invoice_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat Nama Invoice</label></div>
            <div class="col-sm-8">: {{ $invoicetbh->Alamat_Nama_Invoice_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Fiducia</label></div>
            <div class="col-sm-8">: {{ $invoicetbh->No_Fiducia_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Fiducia</label></div>
            <div class="col-sm-8">: Rp{{ number_format($invoicetbh->Nilai_Fiducia_Tambahan) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggal Fiducia</label></div>
            <div class="col-sm-8">: {{ $invoicetbh->Tgl_Fiducia_Tambahan}}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggal Jatuh Tempo</label></div>
            <div class="col-sm-8">: {{ $invoicetbh->Tgl_Jatuh_Tempo_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $invoicetbh->Status_Tambahan }}</div>
        </div>


        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('collateral_invoice_tambahan/'.$invoicetbh->id.'/edit') }}" class="btn btn-warning text-white"
                    type="submit">Edit</a>
                <a href="{{ url('collateral_invoice_tambahan') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection