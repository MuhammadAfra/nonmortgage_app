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
            <div class="col-sm-4"><label>Nama Partner ID</label></div>
            <div class="col-sm-8">: {{ $dataproduct->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Debitur ID</label></div>
            <div class="col-sm-8">: {{ $dataproduct->debitur->NAMA_DEBITUR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Product</label></div>
            <div class="col-sm-8">: {{ $dataproduct->m_product->id }} - {{ $dataproduct->m_product->nama_product }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Pembiayaan Pokok Maksimum</label></div>
            <div class="col-sm-8">: Rp{{ number_format($dataproduct->NILAI_PEMBIAYAAN_POKOK_MAXIMUM) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Suku Bunga Flat</label></div>
            <div class="col-sm-8">: {{ $dataproduct->SUKU_BUNGA_FLAT }}%</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Suku Bunga Effective </label></div>
            <div class="col-sm-8">: {{ $dataproduct->SUKU_BUNGA_EFFECTIVE }}%</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jangka Waktu Maksimum </label></div>
            <div class="col-sm-8">: {{ $dataproduct->Jangka_Waktu_Maximum }} Bulan</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Pola Pembayaran</label></div>
            <div class="col-sm-8">: {{ $dataproduct->pola_pembayaran->Pola_Pembayaran }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Administrasi </label></div>
            <div class="col-sm-8">: Rp{{ number_format($dataproduct->BIAYA_ADMINISTRASI) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Asuransi </label></div>
            <div class="col-sm-8">: Rp{{ number_format($dataproduct->BIAYA_ASSURANSI) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Provisi </label></div>
            <div class="col-sm-8">: Rp{{ number_format($dataproduct->BIAYA_PROVISI) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Lain-Lain </label></div>
            <div class="col-sm-8">: Rp{{ number_format($dataproduct->BIAYA_LAIN_LAIN) }}</div>
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
