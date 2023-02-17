@extends('layout.layout')
@section('title')
Collateral Utama - Inventory
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('collateral_inven') }}">Collateral Utama - Inventory</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner ID</label></div>
            <div class="col-sm-8">: {{ $inven->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        @if ($inven->DEBITUR_ID != NULL)
            @if ($inven->jenisDeb == 'PERORANGAN')
                <div class="row pb-3">
                    <div class="col-sm-4"><label>Debitur Perorangan ID</label></div>
                    <div class="col-sm-8">: {{ $inven->debitur->NAMA_DEBITUR }}</div>
                </div>
            @endif
        @endif
        @if ($inven->DEBITUR_BADAN_USAHA_ID != NULL)
            @if ($inven->jenisDeb == 'BADAN_USAHA')
                <div class="row pb-3">
                    <div class="col-sm-4"><label>Debitur Badan Usaha ID</label></div>
                    <div class="col-sm-8">: {{ $inven->debitur_badan_usaha->NAMA_PERUSAHAAN }}</div>
                </div>
            @endif
        @endif
        <div class="row pb-3">
            <div class="col-sm-4"><label>Coll ID</label></div>
            <div class="col-sm-8">: {{ str_pad($inven->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Inventory</label></div>
            <div class="col-sm-8">: {{ $inven->Nama_Inventory }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Besar Inventory</label></div>
            <div class="col-sm-8">: {{ $inven->Besar_Inventory }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Inventory </label></div>
            <div class="col-sm-8">: Rp{{ number_format($inven->Nilai_Inventory) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat Inventory</label></div>
            <div class="col-sm-8">: {{ $inven->Alamat_Inventory }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Atas Nama Inventory</label></div>
            <div class="col-sm-8">: {{ $inven->Atas_Nama_Inventory }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat Atas Nama Inventory</label></div>
            <div class="col-sm-8">: {{ $inven->Alamat_Atas_Nama_Inventory }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $inven->Status }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('collateral_inven/'.$inven->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('collateral_inven') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
