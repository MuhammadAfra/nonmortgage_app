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
            <div class="col-sm-4"><label>Partner ID</label></div>
            <div class="col-sm-8">: {{ $motor->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        @if ($motor->DEBITUR_ID != NULL)
            @if ($motor->jenisDeb == 'PERORANGAN')
                <div class="row pb-3">
                    <div class="col-sm-4"><label>Debitur Perorangan ID</label></div>
                    <div class="col-sm-8">: {{ $motor->debitur->NAMA_DEBITUR }}</div>
                </div>
            @endif
        @endif
        @if ($motor->DEBITUR_BADAN_USAHA_ID != NULL)
            @if ($motor->jenisDeb == 'BADAN_USAHA')
                <div class="row pb-3">
                    <div class="col-sm-4"><label>Debitur Badan Usaha ID</label></div>
                    <div class="col-sm-8">: {{ $motor->debitur_badan_usaha->NAMA_PERUSAHAAN }}</div>
                </div>
            @endif
        @endif
        <div class="row pb-3">
            <div class="col-sm-4"><label>Coll ID</label></div>
            <div class="col-sm-8">: {{ str_pad($motor->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Kendaraan Motor</label></div>
            <div class="col-sm-8">: Rp{{ number_format($motor->Nilai_Motor_Vehicle_Tambahan) }}</div>
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
