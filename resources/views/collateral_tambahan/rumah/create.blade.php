@extends('layout.layout')
@section('title')
Collateral Tambahan - Rumah / Tanah
@endsection

@section('subtitle')
Add
@endsection

@section('page')
<a href="{{ url('collateral_rumah_tambahan') }}">Collateral Tambahan - Rumah / Tanah</a>
@endsection

@section('content')
<form action="{{ url('collateral_rumah_tambahan') }}" method="POST">
    @csrf
    <div class="row pb-3">
        <div class="col-sm-4"><label>Debitur & Partner <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PRODUCT_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option></option>
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
        <div class="col-sm-4"><label>Counter Rumah Tanah<span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <input type="number" name="Counter_Rumah_Tanah_Tambahan" class="form-control" style="width: 300px; height: 30px;">
            @error('Counter_Rumah_Tanah_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Rumah Tanah<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Rumah Tanah" name="Nilai_Rumah_Tanah_Tambahan">
            </div>
            @error('Nilai_Rumah_Tanah_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>No SHM/No HGB<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="number" name="No_Shm_No_Hgb_Tambahan" class="form-control number-separator" placeholder="No SHM/No HGB" style="width: 300px; height: 30px;">
            @error('No_Shm_No_Hgb_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Luas<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 30px;">
            <input type="number" class="form-control" placeholder="Luas" name="Luas_Tambahan">
                <div class="input-group-append">
                    <span class="input-group-text">M2</span>
                </div>
            </div>
            @error('Luas_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Atas Nama<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Atas_Nama_Tambahan" placeholder="Atas Nama" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Atas_Nama_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <textarea name="Alamat_Tambahan" class="form-control" rows="5"  placeholder="Alamat" style="width: 300px;"></textarea>
            @error('Alamat_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Appraisal<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Appraisal" name="Nilai_Appraisal_Tambahan">
            </div>
            @error('Nilai_Appraisal_Tambahan')
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
            <a href="{{ url('collateral_rumah_tambahan') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection
