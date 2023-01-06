@extends('layout.layout')
@section('title')
Collateral Utama - Kendaraan Bermobil
@endsection

@section('subtitle')
Edit
@endsection

@section('page')
<a href="{{ url('collateral_mobil_tambahan') }}">Collateral Utama - Kendaraan Bermobil</a>
@endsection

@section('content')
<form action="{{ url('collateral_mobil_tambahan', $mobil->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row pb-3">
        <div class="col-sm-4"><label>Debitur & Partner <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PRODUCT_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $mobil->PRODUCT_ID }}">{{ $mobil->product->debitur->NAMA_DEBITUR }} - {{ $mobil->product->partner->NAMA_PERUSAHAAN }}</option>
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
        <div class="col-sm-4"><label>Counter Mobil<span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <input type="number" name="Counter_Mobil_Tambahan" value="{{ $mobil->Counter_Mobil_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Counter_Mobil')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Kendaraan Bermobil<span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <input type="number" name="Nilai_Mobil_Vehicle_Tambahan" value="{{ $mobil->Nilai_Mobil_Vehicle_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Nilai_Mobil_Vehicle')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Merk<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Merk_Tambahan" value="{{ $mobil->Merk_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Merk')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Type<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Type_Tambahan" value="{{ $mobil->Type_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Type')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Model<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Model_Tambahan" value="{{ $mobil->Model_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Model')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Peruntukan<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Peruntukan_Tambahan" value="{{ $mobil->Peruntukan_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Peruntukan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Di BPKB<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Di_Bpkb_Tambahan" value="{{ $mobil->Nama_Di_Bpkb_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Nama_Di_Bpkb')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Di BPKB<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Alamat_Di_Bpkb_Tambahan" value="{{ $mobil->Alamat_Di_Bpkb_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Alamat_Di_Bpkb')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Frame<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Frame_Tambahan" value="{{ $mobil->No_Frame_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('No_Frame')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Engine<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Engine_Tambahan" value="{{ $mobil->No_Engine_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('No_Engine')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Polisi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Polisi_Tambahan" value="{{ $mobil->No_Polisi_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('No_Pol')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Colour<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Colour_Tambahan" value="{{ $mobil->Colour_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Colour')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tahun<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="number" name="Tahun_Tambahan" value="{{ $mobil->Tahun_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Tahun')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Silinder<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Silinder_Tambahan" value="{{ $mobil->Silinder_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Silinder')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Status_Tambahan" value="{{ $mobil->Status_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Status')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <button class="btn btn-warning text-white" type="submit">Edit</button>
            <a href="{{ url('collateral_mobil_tambahan') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection
