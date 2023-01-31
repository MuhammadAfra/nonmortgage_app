@extends('layout.layout')
@section('title')
Collateral Utama - Corporate Guarantee
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('collateral_corporate') }}">Collateral Utama - Corporate Guarantee</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner ID</label></div>
            <div class="col-sm-8">: {{ $corporate->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Debitur ID</label></div>
            <div class="col-sm-8">: {{ $corporate->debitur->NAMA_DEBITUR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Coll ID</label></div>
            <div class="col-sm-8">: {{ str_pad($corporate->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Counter Corporate Guarantee</label></div>
            <div class="col-sm-8">: {{ $corporate->Counter_Corporate_Guarantee }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Corporate Guarantee</label></div>
            <div class="col-sm-8">: Rp{{ number_format($corporate->Nilai_Corporate_Guarantee) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama PT Penerima Corporate Guarantee</label></div>
            <div class="col-sm-8">: {{ $corporate->Nama_Pt_Penerima_Corporate_Guarantee }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama PT Pemberi Corporate Guarantee</label></div>
            <div class="col-sm-8">: {{ $corporate->Nama_Pt_Pemberi_Corporate_Guarantee }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Telp PT Pemberi Corporate Guarantee</label></div>
            <div class="col-sm-8">: {{ $corporate->No_Telp_Pt_Pemberi_Corporate_Guarantee }}</div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $corporate->Status }}</div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('collateral_corporate/'.$corporate->id.'/edit') }}" class="btn btn-warning text-white"
                    type="submit">Edit</a>
                <a href="{{ url('collateral_corporate') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection