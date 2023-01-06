@extends('layout.layout')
@section('title')
Collateral Utama - Inventory
@endsection

@section('subtitle')
Add
@endsection

@section('page')
<a href="{{ url('collateral_inven') }}">Collateral Utama - Inventory</a>
@endsection

@section('content')
<form action="{{ url('collateral_inven') }}" method="POST">
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
            <input type="number" name="Counter_Inventory" class="form-control" style="width: 300px; height: 30px;">
            @error('Counter_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Inv (Rp)<span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <input type="text" name="Nilai_Inv" class="form-control number-separator" style="width: 300px; height: 30px;">
            @error('Nilai_Inv')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Inventory" class="form-control" style="width: 300px; height: 30px;">
            @error('Nama_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Besar Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Besar_Inventory" class="form-control" style="width: 300px; height: 30px;">
            @error('Besar_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Inventory (Rp)<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nilai_Inventory" class="form-control number-separator"
                style="width: 300px; height: 30px;">
            @error('Nilai_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <textarea name="Alamat_Inventory" class="form-control" rows="10"  style="width: 300px;"></textarea>
            @error('Alamat_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Atas Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Atas_Nama_Inventory" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Atas_Nama_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Atas Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <textarea name="Alamat_Atas_Nama_Inventory" class="form-control" rows="10"  style="width: 300px;"></textarea>
            @error('Alamat_Atas_Nama_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Status" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Status')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <button class="btn btn-primary" type="submit">Add</button>
            <a href="{{ url('collateral_inven') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection
