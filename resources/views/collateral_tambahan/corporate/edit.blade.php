@extends('layout.layout')
@section('title')
Collateral Tambahan - Corporate Guarantee
@endsection

@section('subtitle')
Edit
@endsection

@section('page')
<a href="{{ url('collateral_corporate_tambahan') }}">Collateral Tambahan - Corporate Guarantee</a>
@endsection

@section('content')
<form action="{{ url('collateral_corporate_tambahan', $corporatetbh->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row pb-3">
        <div class="col-sm-4"><label>Debitur & Partner <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PRODUCT_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $corporatetbh->PRODUCT_ID }}">{{ $corporatetbh->product->debitur->NAMA_DEBITUR }} -
                    {{ $corporatetbh->product->partner->NAMA_PERUSAHAAN }}</option>
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
        <div class="col-sm-4"><label>Counter Corporate Guarantee<span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <input type="number" name="Counter_Corporate_Guarantee_Tambahan" value='{{$corporatetbh->Counter_Corporate_Guarantee_Tambahan}}'
                class="form-control" style="width: 300px; height: 30px;">
            @error('Counter_Corporate_Guarantee_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Corporate Guarantee<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" value='{{number_format($corporatetbh->Nilai_Corporate_Guarantee_Tambahan)}}' placeholder="Nilai Corporate Guarantee" name="Nilai_Corporate_Guarantee_Tambahan">
            </div>
            @error('Nilai_Corporate_Guarantee_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama PT Penerima Corporate Guarantee<span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Pt_Penerima_Corporate_Guarantee_Tambahan"
                value='{{$corporatetbh->Nama_Pt_Penerima_Corporate_Guarantee_Tambahan}}' class="form-control"
                style="width: 300px; height: 30px;">
            @error('Nama_Pt_Penerima_Corporate_Guarantee_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama PT Pemberi Corporate Guarantee<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan"
                value='{{$corporatetbh->Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan}}' class="form-control"
                style="width: 300px; height: 30px;">
            @error('Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Telp PT Pemberi Corporate Guarantee <span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <input type='number' name="No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan"
                value='{{$corporatetbh->No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan}}' style="width: 300px; height: 30px;"
                class="form-control" cols="30" rows="10" />
            @error('No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="Status_Tambahan" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $corporatetbh->Status_Tambahan }}">{{ $corporatetbh->Status_Tambahan }}</option>
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
            <a href="{{ url('collateral_corporate_tambahan') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection