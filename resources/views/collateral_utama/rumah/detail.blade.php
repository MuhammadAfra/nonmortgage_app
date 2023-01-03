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
            <div class="col-sm-4"><label>Partner Perusahaan</label></div>
            <div class="col-sm-8">: {{ $rumah->product->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Debitur</label></div>
            <div class="col-sm-8">: {{ $rumah->product->debitur->NAMA_DEBITUR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Counter Rumah / Tanah</label></div>
            <div class="col-sm-8">: {{ $rumah->Counter_Rumah_Tanah }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Rumah / Tanah</label></div>
            <div class="col-sm-8">: {{ $rumah->Nilai_Rumah_Tanah }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No SHM / No HGB</label></div>
            <div class="col-sm-8">: {{ $rumah->No_Shm_No_Hgb }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Luas</label></div>
            <div class="col-sm-8">: {{ $rumah->Luas }}</div>
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
            <div class="col-sm-8">: {{ $rumah->Nilai_Appraisal }}</div>
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
