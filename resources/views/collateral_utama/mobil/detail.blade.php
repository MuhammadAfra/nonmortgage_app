@extends('layout.layout')
@section('title')
Collateral Utama - Mobil
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('collateral_mobil') }}">Collateral Utama - Mobil</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner ID</label></div>
            <div class="col-sm-8">: {{ $mobil->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        @if ($mobil->DEBITUR_ID != NULL)
            @if ($mobil->jenisDeb == 'PERORANGAN')
                <div class="row pb-3">
                    <div class="col-sm-4"><label>Debitur Perorangan ID</label></div>
                    <div class="col-sm-8">: {{ $mobil->debitur->NAMA_DEBITUR }}</div>
                </div>
            @endif
        @endif
        @if ($mobil->DEBITUR_BADAN_USAHA_ID != NULL)
            @if ($mobil->jenisDeb == 'BADAN_USAHA')
                <div class="row pb-3">
                    <div class="col-sm-4"><label>Debitur Badan Usaha ID</label></div>
                    <div class="col-sm-8">: {{ $mobil->debitur_badan_usaha->NAMA_PERUSAHAAN }}</div>
                </div>
            @endif
        @endif
        <div class="row pb-3">
            <div class="col-sm-4"><label>Coll ID</label></div>
            <div class="col-sm-8">: {{ str_pad($mobil->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Kendaraan Mobil</label></div>
            <div class="col-sm-8">: Rp{{ number_format($mobil->Nilai_Mobil_Vehicle) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Merk</label></div>
            <div class="col-sm-8">: {{ $mobil->Merk }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Type</label></div>
            <div class="col-sm-8">: {{ $mobil->Type }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Model</label></div>
            <div class="col-sm-8">: {{ $mobil->Model }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Peruntukan</label></div>
            <div class="col-sm-8">: {{ $mobil->Peruntukan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Di BPKB</label></div>
            <div class="col-sm-8">: {{ $mobil->Nama_Di_Bpkb }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat Di BPKB</label></div>
            <div class="col-sm-8">: {{ $mobil->Alamat_Di_Bpkb }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Frame</label></div>
            <div class="col-sm-8">: {{ $mobil->No_Frame }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Engine</label></div>
            <div class="col-sm-8">: {{ $mobil->No_Engine }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Polisi</label></div>
            <div class="col-sm-8">: {{ $mobil->No_Polisi }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Colour</label></div>
            <div class="col-sm-8">: {{ $mobil->Colour }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tahun</label></div>
            <div class="col-sm-8">: {{ $mobil->Tahun }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Silinder</label></div>
            <div class="col-sm-8">: {{ $mobil->Silinder }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $mobil->Status }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('collateral_mobil/'.$mobil->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('collateral_mobil') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
