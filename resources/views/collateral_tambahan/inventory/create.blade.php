@extends('layout.layout')
@section('title')
Collateral Tambahan - Inventory
@endsection

@section('subtitle')
Add
@endsection

@section('page')
<a href="{{ url('collateral_inven_tambahan') }}">Collateral Tambahan - Inventory</a>
@endsection

@section('content')
<form action="{{ url('collateral_inven_tambahan') }}" method="POST">
    @csrf
    {{-- <div class="row pb-3">
        <div class="col-sm-4"><label>Collateral ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="number" name="id" class="form-control" style="width: 300px; height: 30px;">
            @error('id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div> --}}
    <div class="row pb-3">
        <div class="col-sm-4"><label>Debitur & Partner <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PRODUCT_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option>-----</option>
                @foreach ($prod as $item)
                <option value="{{ $item->id }}">{{ $item->debitur->NAMA_DEBITUR }} -
                    {{ $item->partner->NAMA_PERUSAHAAN }}</option>
                @endforeach
            </select>
            @error('PRODUCT_ID')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Counter Inventory<span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <input type="number" name="Counter_Inventory_Tambahan" class="form-control" style="width: 300px; height: 30px;">
            @error('Counter_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Inv<span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <input type="number" name="Nilai_Inv_Tambahan" class="form-control" style="width: 300px; height: 30px;">
            @error('Nilai_Inv_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Inventory_Tambahan" class="form-control" style="width: 300px; height: 30px;">
            @error('Nama_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Besar Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Besar_Inventory_Tambahan" class="form-control" style="width: 300px; height: 30px;">
            @error('Besar_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="number" name="Nilai_Inventory_Tambahan" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Nilai_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <textarea name="Alamat_Inventory_Tambahan" class="form-control" rows="10"  style="width: 300px;"></textarea>
            @error('Alamat_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Atas Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Atas_Nama_Inventory_Tambahan" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Atas_Nama_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Atas Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <textarea name="Alamat_Atas_Nama_Inventory_Tambahan" class="form-control" rows="10"  style="width: 300px;"></textarea>
            @error('Alamat_Atas_Nama_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Status_Tambahan" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Status_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <button class="btn btn-primary" type="submit">Add</button>
            <a href="{{ url('collateral_inven_tambahan') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection
