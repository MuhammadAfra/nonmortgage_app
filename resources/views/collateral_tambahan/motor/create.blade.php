@extends('layout.layout')
@section('title')
Collateral Tambahan - Kendaraan Motor
@endsection

@section('subtitle')
Add
@endsection

@section('page')
<a href="{{ url('collateral_motor_tambahan') }}">Collateral Tambahan - Kendaraan Motor</a>
@endsection

@section('content')
<form action="{{ url('collateral_motor_tambahan') }}" method="POST">
    @csrf
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
        <div class="col-sm-4"><label>Counter Motor<span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <input type="number" name="Counter_Motor_Tambahan" class="form-control" style="width: 300px; height: 30px;">
            @error('Counter_Motor')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Kendaraan Motor<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Kendaraan Motor" name="Nilai_Motor_Vehicle_Tambahan">
            </div>
            @error('Nilai_Motor_Vehicle_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Merk<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Merk_Tambahan" class="form-control" placeholder="Merk" style="width: 300px; height: 30px;">
            @error('Merk')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Type<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Type_Tambahan" class="form-control" placeholder="Type" style="width: 300px; height: 30px;">
            @error('Type')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Model<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Model_Tambahan" class="form-control" placeholder="Model" placeholder="Type" style="width: 300px; height: 30px;">
            @error('Model')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jenis Motor<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Jenis_Motor_Sport_Listrik_Tambahan" class="form-control" placeholder="Jenis Motor"
                style="width: 300px; height: 30px;">
            @error('Jenis_Motor_Sport_Listrik')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Di BPKB<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Di_Bpkb_Tambahan" class="form-control" placeholder="Nama Di BPKB" style="width: 300px; height: 30px;">
            @error('Nama_Di_Bpkb')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Frame<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Frame_Tambahan" class="form-control" placeholder="No Frame"
                style="width: 300px; height: 30px;">
            @error('No_Frame')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Engine<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Engine_Tambahan" class="form-control" placeholder="No Engine"
                style="width: 300px; height: 30px;">
            @error('No_Engine')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Polisi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Polisi_Tambahan" class="form-control" placeholder="No Polisi"
                style="width: 300px; height: 30px;">
            @error('No_Pol')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Colour<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Colour_Tambahan" class="form-control"  placeholder="Colour"
                style="width: 300px; height: 30px;">
            @error('Colour')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tahun<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="number" name="Tahun_Tambahan" class="form-control"  placeholder="Tahun"
                style="width: 300px; height: 30px;">
            @error('Tahun')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Silinder<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Silinder_Tambahan" class="form-control"  placeholder="Silinder"
                style="width: 300px; height: 30px;">
            @error('Silinder')
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
            <a href="{{ url('collateral_motor_tambahan') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection
