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
            <div class="col-sm-4"><label>Partner ID</label></div>
            <div class="col-sm-8">: {{ $corporatetbh->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        @if ($corporatetbh->DEBITUR_ID != NULL)
            @if ($corporatetbh->jenisDeb == 'PERORANGAN')
                <div class="row pb-3">
                    <div class="col-sm-4"><label>Debitur Perorangan ID</label></div>
                    <div class="col-sm-8">: {{ $corporatetbh->debitur->NAMA_DEBITUR }}</div>
                </div>
            @endif
        @endif
        @if ($corporatetbh->DEBITUR_BADAN_USAHA_ID != NULL)
            @if ($corporatetbh->jenisDeb == 'BADAN_USAHA')
                <div class="row pb-3">
                    <div class="col-sm-4"><label>Debitur Badan Usaha ID</label></div>
                    <div class="col-sm-8">: {{ $corporatetbh->debitur_badan_usaha->NAMA_PERUSAHAAN }}</div>
                </div>
            @endif
        @endif
        <div class="row pb-3">
            <div class="col-sm-4"><label>Coll ID</label></div>
            <div class="col-sm-8">: {{ str_pad($corporatetbh->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Corporate Guarantee</label></div>
            <div class="col-sm-8">: Rp{{ number_format($corporatetbh->Nilai_Corporate_Guarantee_Tambahan) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama PT Penerima Corporate Guarantee</label></div>
            <div class="col-sm-8">: {{ $corporatetbh->Nama_Pt_Penerima_Corporate_Guarantee_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama PT Pemberi Corporate Guarantee</label></div>
            <div class="col-sm-8">: {{ $corporatetbh->Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Telp PT Pemberi Corporate Guarantee</label></div>
            <div class="col-sm-8">: {{ $corporatetbh->No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan }}</div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $corporatetbh->Status_Tambahan }}</div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('collateral_corporate_tambahan/'.$corporatetbh->id.'/edit') }}" class="btn btn-warning text-white"
                    type="submit">Edit</a>
                <a href="{{ url('collateral_corporate_tambahan') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection