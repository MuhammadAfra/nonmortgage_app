@extends('layout.layout')
@section('title')
Collateral Utama - Rumah/Tanah
@endsection

@section('subtitle')
Edit
@endsection

@section('page')
<a href="{{ url('collateral_rumah') }}">Collateral Utama - Rumah/Tanah</a>
@endsection

@section('content')
<form action="{{ url('collateral_rumah', $rumah->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row pb-3" >
        <div class="col-sm-4"><label>Partner ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PARTNER_ID" id="PARTNER_ID" class="form-control py-0 collCounterPart" style="width: 300px; height: 30px;">
                <option value="{{ $rumah->PARTNER_ID }}">{{ $rumah->partner->NAMA_PERUSAHAAN }}</option>
                @foreach ($partner as $item)
                <option value="{{ $item->id }}">{{ $item->NAMA_PERUSAHAAN }} </option>
                @endforeach
            </select>
            @error('PARTNER_ID')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Debitur ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="DEBITUR_ID" id="DEBITUR_ID" class="form-control py-0 collCounterDebit" style="width: 300px; height: 30px;">
                <option value="{{ $rumah->DEBITUR_ID }}">{{ $rumah->debitur->NAMA_DEBITUR }}</option>
                @foreach ($debitur as $item)
                <option value="{{ $item->id }}">{{ $item->NAMA_DEBITUR }} </option>
                @endforeach
            </select>
            @error('DEBITUR_ID')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Coll ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="COLL_COUNTER" class="form-control" readonly id="counter" style="width: 300px; height: 30px;" >
            @error('COLL_COUNTER')
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
            <input type="text" class="form-control number-separator" value="{{ number_format($rumah->Nilai_Rumah_Tanah) }}"  name="Nilai_Rumah_Tanah">
            </div>
            @error('Nilai_Rumah_Tanah')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>No SHM / No HGB<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Shm_No_Hgb" value="{{ $rumah->No_Shm_No_Hgb }}" class="form-control" style="width: 300px; height: 30px;">
            @error('No_Shm_No_Hgb')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Luas<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 30px;">
            <input type="number" class="form-control" value="{{ $rumah->Luas }}" placeholder="Luas" name="Luas">
                <div class="input-group-append">
                    <span class="input-group-text">M<sup>2</sup></span>
                </div>
            </div>
            @error('Luas')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Atas Nama<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Atas_Nama" value="{{ $rumah->Atas_Nama }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Atas_Nama')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <textarea name="Alamat" class="form-control" rows="10" value="{{ $rumah->Alamat }}" style="width: 300px;">{{ $rumah->Alamat }}</textarea>
            @error('Alamat')
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
            <input type="text" class="form-control number-separator" value="{{ number_format($rumah->Nilai_Appraisal) }}" placeholder="Nilai Appraisal" name="Nilai_Appraisal">
            </div>
            @error('Nilai_Appraisal')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>


  <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="Status" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $rumah->Status }}">{{ $rumah->Status }}</option>
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
            <a href="{{ url('collateral_rumah') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection
