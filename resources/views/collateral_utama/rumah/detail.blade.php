@extends('layout.layout')
@section('title')
Collateral Utama - Rumah / Tanah
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('collateral_rumah') }}">Collateral Utama - Rumah / Tanah</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner ID</label></div>
            <div class="col-sm-8">: {{ $rumah->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        @if ($rumah->DEBITUR_ID != NULL)
            @if ($rumah->jenisDeb == 'PERORANGAN')
                <div class="row pb-3">
                    <div class="col-sm-4"><label>Debitur Perorangan ID</label></div>
                    <div class="col-sm-8">: {{ $rumah->debitur->NAMA_DEBITUR }}</div>
                </div>
            @endif
        @endif
        @if ($rumah->DEBITUR_BADAN_USAHA_ID != NULL)
            @if ($rumah->jenisDeb == 'BADAN_USAHA')
                <div class="row pb-3">
                    <div class="col-sm-4"><label>Debitur Badan Usaha ID</label></div>
                    <div class="col-sm-8">: {{ $rumah->debitur_badan_usaha->NAMA_PERUSAHAAN }}</div>
                </div>
            @endif
        @endif
        <div class="row pb-3">
            <div class="col-sm-4"><label>Coll ID</label></div>
            <div class="col-sm-8">: {{ str_pad($rumah->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Rumah / Tanah</label></div>
            <div class="col-sm-8">: Rp{{ number_format($rumah->Nilai_Rumah_Tanah) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No SHM / No HGB</label></div>
            <div class="col-sm-8">: {{ $rumah->No_Shm_No_Hgb }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Luas</label></div>
            <div class="col-sm-8">: {{ $rumah->Luas }} M<sup>2</sup></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Atas_Nama</label></div>
            <div class="col-sm-8">: {{ $rumah->Atas_Nama }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat</label></div>
            <div class="col-sm-8">: {{ $rumah->Alamat }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Appraisal</label></div>
            <div class="col-sm-8">: Rp{{ number_format($rumah->Nilai_Appraisal) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $rumah->Status }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('collateral_rumah/'.$rumah->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('collateral_rumah') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
