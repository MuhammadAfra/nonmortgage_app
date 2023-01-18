@extends('layout.layout')
@section('title')
Collateral Tambahan - Inventory
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('collateral_inven_tambahan') }}">Collateral Tambahan - Inventory</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner Perusahaan</label></div>
            <div class="col-sm-8">: {{ $inventbh->product->partner->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Debitur</label></div>
            <div class="col-sm-8">: {{ $inventbh->product->debitur->NAMA_DEBITUR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Counter Inventory</label></div>
            <div class="col-sm-8">: {{ $inventbh->Counter_Inventory_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Inv</label></div>
            <div class="col-sm-8">: Rp{{ number_format($inventbh->Nilai_Inv_Tambahan) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Inventory</label></div>
            <div class="col-sm-8">: {{ $inventbh->Nama_Inventory_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Besar Inventory</label></div>
            <div class="col-sm-8">: {{ $inventbh->Besar_Inventory_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Inventory</label></div>
            <div class="col-sm-8">: Rp{{ number_format($inventbh->Nilai_Inventory_Tambahan) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat Inventory</label></div>
            <div class="col-sm-8">: {{ $inventbh->Alamat_Inventory_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Atas Nama Inventory</label></div>
            <div class="col-sm-8">: {{ $inventbh->Atas_Nama_Inventory_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat Atas Nama Inventory</label></div>
            <div class="col-sm-8">: {{ $inventbh->Alamat_Atas_Nama_Inventory_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $inventbh->Status_Tambahan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('collateral_inven_tambahan/'.$inventbh->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('collateral_inven_tambahan') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
