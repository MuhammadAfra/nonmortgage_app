@extends('layout.layout')
@section('title')
Collateral Tambahan - Motor
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('collateral_motor_tambahan') }}">Collateral Tambahan - Motor</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner Perusahaan</label></div>
            <div class="col-sm-8">: {{ $motor->product->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Debitur</label></div>
            <div class="col-sm-8">: {{ $motor->product->debitur->NAMA_DEBITUR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Counter Motor</label></div>
            <div class="col-sm-8">: {{ $motor->Counter_Motor_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Kendaraan Bermotor</label></div>
            <div class="col-sm-8">: {{ $motor->Nilai_Motor_Vehicle_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Merk</label></div>
            <div class="col-sm-8">: {{ $motor->Merk_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Type</label></div>
            <div class="col-sm-8">: {{ $motor->Type_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Model</label></div>
            <div class="col-sm-8">: {{ $motor->Model_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Motor</label></div>
            <div class="col-sm-8">: {{ $motor->Jenis_Motor_Sport_Listrik_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Di BPKB</label></div>
            <div class="col-sm-8">: {{ $motor->Nama_Di_Bpkb_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Frame</label></div>
            <div class="col-sm-8">: {{ $motor->No_Frame_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Engine</label></div>
            <div class="col-sm-8">: {{ $motor->No_Engine_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No Polisi</label></div>
            <div class="col-sm-8">: {{ $motor->No_Polisi_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Colour</label></div>
            <div class="col-sm-8">: {{ $motor->Colour_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tahun</label></div>
            <div class="col-sm-8">: {{ $motor->Tahun_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Silinder</label></div>
            <div class="col-sm-8">: {{ $motor->Silinder_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $motor->Status_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('collateral_motor_tambahan/'.$motor->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('collateral_motor_tambahan') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
