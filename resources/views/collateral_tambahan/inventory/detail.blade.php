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
