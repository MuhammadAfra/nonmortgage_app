@extends('layout.layout')
@section('title')
Collateral Tambahan - Mobil
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('collateral_mobil_tambahan') }}">Collateral Tambahan - Mobil</a>
@endsection

@section('content')_Tambahan
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner ID</label></div>
            <div class="col-sm-8">: {{ $rumah->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Debitur ID</label></div>
            <div class="col-sm-8">: {{ $rumah->debitur->NAMA_DEBITUR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Coll ID</label></div>
            <div class="col-sm-8">: {{ str_pad($rumah->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Kendaraan Bermobil</label></div>
            <div class="col-sm-8">: Rp{{ number_format($mobil->Nilai_Mobil_Vehicle_Tambahan) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Merk</label></div>
            <div class="col-sm-8">: {{ $mobil->Merk_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Type</label></div>
            <div class="col-sm-8">: {{ $mobil->Type_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Model</label></div>
            <div class="col-sm-8">: {{ $mobil->Model_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Peruntukan</label></div>
            <div class="col-sm-8">: {{ $mobil->Peruntukan_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Di BPKB</label></div>
            <div class="col-sm-8">: {{ $mobil->Nama_Di_Bpkb_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat Di BPKB</label></div>
            <div class="col-sm-8">: {{ $mobil->Alamat_Di_Bpkb_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Frame</label></div>
            <div class="col-sm-8">: {{ $mobil->No_Frame_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Engine</label></div>
            <div class="col-sm-8">: {{ $mobil->No_Engine_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Polisi</label></div>
            <div class="col-sm-8">: {{ $mobil->No_Polisi_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Colour</label></div>
            <div class="col-sm-8">: {{ $mobil->Colour_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tahun</label></div>
            <div class="col-sm-8">: {{ $mobil->Tahun_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Silinder</label></div>
            <div class="col-sm-8">: {{ $mobil->Silinder_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $mobil->Status_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('collateral_mobil_tambahan/'.$mobil->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('collateral_mobil_tambahan') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
