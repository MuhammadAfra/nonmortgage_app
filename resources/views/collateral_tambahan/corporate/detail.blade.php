@extends('layout.layout')
@section('title')
Collateral Tambahan - Corporate Guarantee
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('collateral_corporate_tambahan') }}">Collateral Tambahan - Corporate Guarantee</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner Perusahaan</label></div>
            <div class="col-sm-8">: {{ $corporatetbh->product->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Debitur</label></div>
            <div class="col-sm-8">: {{ $corporatetbh->product->debitur->NAMA_DEBITUR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Counter Corporate Guarantee</label></div>
            <div class="col-sm-8">: {{ $corporate->Counter_Corporate_Guarantee_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Corporate Guarantee</label></div>
            <div class="col-sm-8">: {{ $corporate->Nilai_Corporate_Guarantee_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama PT Penerima Corporate Guarantee</label></div>
            <div class="col-sm-8">: {{ $corporate->Nama_Pt_Penerima_Corporate_Guarantee_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama PT Pemberi Corporate Guarantee</label></div>
            <div class="col-sm-8">: {{ $corporate->Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Telp PT Pemberi Corporate Guarantee</label></div>
            <div class="col-sm-8">: {{ $corporate->No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan }}</div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $corporate->Status_Tambahan }}</div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('collateral_corporate_tambahan/'.$corporate->id.'/edit') }}" class="btn btn-warning text-white"
                    type="submit">Edit</a>
                <a href="{{ url('collateral_corporate_tambahan') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection