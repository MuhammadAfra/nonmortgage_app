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
            <div class="col-sm-4"><label>Partner Perusahaan</label></div>
            <div class="col-sm-8">: {{ $rumahtbh->product->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Debitur</label></div>
            <div class="col-sm-8">: {{ $rumahtbh->product->debitur->NAMA_DEBITUR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Counter Rumah / Tanah</label></div>
            <div class="col-sm-8">: {{ $rumahtbh->Counter_Rumah_Tanah_Tambahan }}</div>
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
