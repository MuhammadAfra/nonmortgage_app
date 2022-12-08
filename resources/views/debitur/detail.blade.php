@extends('layout.layout')
@section('title')
Debitur
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('debitur') }}">Debitur</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggal Lahir</label></div>
            <div class="col-sm-8">: {{ $debitur->TANGGAL_LAHIR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No KTP</label></div>
            <div class="col-sm-8">: {{ $debitur->NO_KTP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat</label></div>
            <div class="col-sm-8">: {{ $debitur->ALAMAT_CUSTOMER }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Provinsi</label></div>
            <div class="col-sm-8">: {{ $debitur->PROVINSI }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kabupaten / Kota</label></div>
            <div class="col-sm-8">: {{ $debitur->KABUPATEN_KOTA }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kelurahan</label></div>
            <div class="col-sm-8">: {{ $debitur->KELURAHAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kode Pos</label></div>
            <div class="col-sm-8">: {{ $debitur->KODE_POS }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Perusahaan</label></div>
            <div class="col-sm-8">: {{ $debitur->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Bidang Usaha</label></div>
            <div class="col-sm-8">: {{ $debitur->BIDANG_USAHA }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Sub Bidang Usaha</label></div>
            <div class="col-sm-8">: {{ $debitur->SUB_BIDANG_USAHA }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Lama Usaha</label></div>
            <div class="col-sm-8">: {{ $debitur->LAMA_USAHA }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jabatan</label></div>
            <div class="col-sm-8">: {{ $debitur->JABATAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggungan</label></div>
            <div class="col-sm-8">: {{ $debitur->TANGGUNGAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Sub Bidang Usaha</label></div>
            <div class="col-sm-8">: {{ $debitur->SUB_BIDANG_USAHA }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Income per Bulan</label></div>
            <div class="col-sm-8">: {{ $debitur->INCOME_BULAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Spouse Income per Bulan</label></div>
            <div class="col-sm-8">: {{ $debitur->SUPOUSE_INCOME_BULAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan Ke 1</label></div>
            <div class="col-sm-8">: {{ $debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan Ke 2</label></div>
            <div class="col-sm-8">: {{ $debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan Ke 3</label></div>
            <div class="col-sm-8">: {{ $debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>DP</label></div>
            <div class="col-sm-8">: {{ $debitur->APAKAH_ADA_DP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jumlah DP</label></div>
            <div class="col-sm-8">: {{ $debitur->DOWN_PAYMENT_CUSTOMER }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('debitur/'.$debitur->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('debitur') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
