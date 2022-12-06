@extends('layout.layout')
@section('title')
Product
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('product') }}">Product</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner ID</label></div>
            <div class="col-sm-8">: {{ $dataproduct->PARTNER_ID }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Debitur ID</label></div>
            <div class="col-sm-8">: {{ $dataproduct->DEBITUR_ID }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Konven / Syariah</label></div>
            <div class="col-sm-8">: {{ $dataproduct->KONVEN_SYARIAH }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Debitur</label></div>
            <div class="col-sm-8">: {{ $dataproduct->NAMA_DEBITUR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Pembiayaan Pokok Maximum</label></div>
            <div class="col-sm-8">: {{ $dataproduct->NILAI_PEMBIAYAAN_POKOK_MAXIMUM }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jangka Waktu Maksimum</label></div>
            <div class="col-sm-8">: {{ $dataproduct->Jangka_Waktu_Maximum }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Administrasi</label></div>
            <div class="col-sm-8">: {{ $dataproduct->BIAYA_ADMINISTRASI }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Asuransi</label></div>
            <div class="col-sm-8">: {{ $dataproduct->BIAYA_ASSURANSI }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Provinsi</label></div>
            <div class="col-sm-8">: {{ $dataproduct->BIAYA_PROVISI }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Lain Lain</label></div>
            <div class="col-sm-8">: {{ $dataproduct->BIAYA_LAIN_LAIN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('product/'.$dataproduct->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('product') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
