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
            <div class="col-sm-4"><label>Partner Perusahaan</label></div>
            <div class="col-sm-8">: {{ $inven->product->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Debitur</label></div>
            <div class="col-sm-8">: {{ $inven->product->debitur->NAMA_DEBITUR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Counter Inventory</label></div>
            <div class="col-sm-8">: {{ $inven->Counter_Inventory }}</div>
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
            <div class="col-sm-4"><label>Nilai Inventory (Rp)</label></div>
            <div class="col-sm-8">: {{ number_format($inven->Nilai_Inventory) }}</div>
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
