@extends('layout.layout')
@section('title')
Collateral Tambahan - Rumah/Tanah
@endsection

@section('subtitle')
Edit
@endsection

@section('page')
<a href="{{ url('collateral_rumah') }}">Collateral Tambahan - Rumah/Tanah</a>
@endsection

@section('content')
<form action="{{ url('collateral_rumah_tambahan', $rumahtbh->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row pb-3">
        <div class="col-sm-4"><label>Debitur & Partner <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PRODUCT_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $rumahtbh->PRODUCT_ID }}">{{ $rumahtbh->product->debitur->NAMA_DEBITUR }} - {{ $rumahtbh->product->partner->NAMA_PERUSAHAAN }}</option>
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
            <input type="number" name="Counter_Rumah_Tanah_Tambahan" value="{{ $rumahtbh->Counter_Rumah_Tanah_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Counter_Rumah_Tanah_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Rumah / Tanah<span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <input type="number" name="Nilai_Rumah_Tanah_Tambahan" value="{{ $rumahtbh->Nilai_Rumah_Tanah_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Nilai_Rumah_Tanah_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No SHM / No HGB<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Shm_No_Hgb_Tambahan" value="{{ $rumahtbh->No_Shm_No_Hgb_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('No_Shm_No_Hgb_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Luas<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Luas_Tambahan" value="{{ $rumahtbh->Luas_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Luas_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Atas Nama<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Atas_Nama_Tambahan" value="{{ $rumahtbh->Atas_Nama_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Atas_Nama_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <textarea name="Alamat_Tambahan" class="form-control" rows="10" value="{{ $rumahtbh->Alamat_Tambahan }}" style="width: 300px;">{{ $rumahtbh->Alamat_Tambahan }}</textarea>
            @error('Alamat')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Appraisal<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nilai_Appraisal_Tambahan" value="{{ $rumahtbh->Nilai_Appraisal_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Nilai_Appraisal_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Status_Tambahan" value="{{ $rumahtbh->Status_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Status_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <button class="btn btn-warning text-white" type="submit">Edit</button>
            <a href="{{ url('collateral_rumah') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection
