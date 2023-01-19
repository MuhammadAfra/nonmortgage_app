@extends('layout.layout')
@section('title')
Collateral Utama - Inventory
@endsection

@section('subtitle')
Edit
@endsection

@section('page')
<a href="{{ url('collateral_inven') }}">Collateral Utama - Inventory</a>
@endsection

@section('content')
<form action="{{ url('collateral_inven', $inven->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row pb-3">
        <div class="col-sm-4"><label>Debitur & Partner <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PRODUCT_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $inven->PRODUCT_ID }}">{{ $inven->product->debitur->NAMA_DEBITUR }} - {{ $inven->product->partner->NAMA_PERUSAHAAN }}</option>
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
            <input type="number" name="Counter_Inventory" value="{{ $inven->Counter_Inventory }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Counter_Inventory')
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
            <input type="text" class="form-control number-separator" value="{{ number_format($inven->Nilai_Inv) }}" placeholder="Nilai Inv" name="Nilai_Inv">
            </div>
            @error('Nilai_Inv')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Inventory" value="{{ $inven->Nama_Inventory }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Nama_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Besar Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Besar_Inventory" value="{{ $inven->Besar_Inventory }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Besar_Inventory')
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
            <input type="text" class="form-control number-separator" value="{{ number_format($inven->Nilai_Inventory) }}" name="Nilai_Inventory">
            </div>
            @error('Nilai_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <textarea name="Alamat_Inventory" value="{{ $inven->Alamat_Inventory }}" class="form-control" rows="10"  style="width: 300px;">{{ $inven->Alamat_Inventory }}</textarea>
            @error('Alamat_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Atas Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Atas_Nama_Inventory" value="{{ $inven->Atas_Nama_Inventory }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Atas_Nama_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Atas Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <textarea name="Alamat_Atas_Nama_Inventory" value="{{ $inven->Alamat_Atas_Nama_Inventory }}" class="form-control" rows="10"  style="width: 300px;">{{ $inven->Alamat_Atas_Nama_Inventory }}</textarea>
            @error('Alamat_Atas_Nama_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="Status" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $inven->Status }}">{{ $inven->Status }}</option>
                <option value="Pending">Pending</option>
                <option value="To Be Obtained">To Be Obtained</option>
                <option value="Diterima">Diterima</option>
            </select>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <button class="btn btn-warning text-white" type="submit">Edit</button>
            <a href="{{ url('collateral_inven') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection
