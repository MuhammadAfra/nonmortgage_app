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
        <div class="col-sm-4"><label>Nilai Inv<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Inv" name="Nilai_Inv_Tambahan">
            </div>
            @error('Nilai_Inv_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Inventory_Tambahan" placeholder="Nama Inventory" class="form-control" style="width: 300px; height: 30px;">
            @error('Nama_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Besar Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Besar_Inventory_Tambahan" class="form-control" placeholder="Besar Inventory" style="width: 300px; height: 30px;">
            @error('Besar_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Inventory" name="Nilai_Inventory_Tambahan">
            </div>
            @error('Nilai_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <textarea name="Alamat_Inventory_Tambahan" class="form-control" placeholder="Alamat Inventory" rows="5"  style="width: 300px;"></textarea>
            @error('Alamat_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Atas Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Atas_Nama_Inventory_Tambahan" placeholder="Atas Nama Inventory" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Atas_Nama_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Atas Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <textarea name="Alamat_Atas_Nama_Inventory_Tambahan" placeholder="Alamat Atas Nama Inventory" class="form-control" rows="5"  style="width: 300px;"></textarea>
            @error('Alamat_Atas_Nama_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="Status_Tambahan" class="form-control py-0" style="width: 300px; height: 30px;">
                <option></option>
                <option value="Pending">Pending</option>
                <option value="To Be Obtained">To Be Obtained</option>
                <option value="Diterima">Diterima</option>
            </select>
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
