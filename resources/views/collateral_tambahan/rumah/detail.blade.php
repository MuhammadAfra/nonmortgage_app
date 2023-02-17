@extends('layout.layout')
@section('title')
Collateral Tambahan - Rumah / Tanah
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('collateral_rumah_tambahan') }}">Collateral Tambahan - Rumah / Tanah</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner ID</label></div>
            <div class="col-sm-8">: {{ $rumahtbh->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        @if ($rumahtbh->DEBITUR_ID != NULL)
            @if ($rumahtbh->jenisDeb == 'PERORANGAN')
                <div class="row pb-3">
                    <div class="col-sm-4"><label>Debitur Perorangan ID</label></div>
                    <div class="col-sm-8">: {{ $rumahtbh->debitur->NAMA_DEBITUR }}</div>
                </div>
            @endif
        @endif
        @if ($rumahtbh->DEBITUR_BADAN_USAHA_ID != NULL)
            @if ($rumahtbh->jenisDeb == 'BADAN_USAHA')
                <div class="row pb-3">
                    <div class="col-sm-4"><label>Debitur Badan Usaha ID</label></div>
                    <div class="col-sm-8">: {{ $rumahtbh->debitur_badan_usaha->NAMA_PERUSAHAAN }}</div>
                </div>
            @endif
        @endif
        <div class="row pb-3">
            <div class="col-sm-4"><label>Coll ID</label></div>
            <div class="col-sm-8">: {{ str_pad($rumahtbh->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Rumah / Tanah</label></div>
            <div class="col-sm-8">: Rp{{ number_format($rumahtbh->Nilai_Rumah_Tanah_Tambahan) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No SHM / No HGB</label></div>
            <div class="col-sm-8">: {{ $rumahtbh->No_Shm_No_Hgb_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Luas</label></div>
            <div class="col-sm-8">: {{ $rumahtbh->Luas_Tambahan }} M<sup>2</sup></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Atas_Nama</label></div>
            <div class="col-sm-8">: {{ $rumahtbh->Atas_Nama_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat</label></div>
            <div class="col-sm-8">: {{ $rumahtbh->Alamat_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Appraisal</label></div>
            <div class="col-sm-8">: Rp{{ number_format($rumahtbh->Nilai_Appraisal_Tambahan) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $rumahtbh->Status_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('collateral_rumah_tambahan/'.$rumahtbh->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('collateral_rumah_tambahan') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
