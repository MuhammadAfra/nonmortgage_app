@extends('layout.layout')
@section('title')
Collateral Utama - Corporate Guarantee
@endsection

@section('subtitle')
Edit
@endsection

@section('page')
<a href="{{ url('collateral_corporate') }}">Collateral Utama - Corporate Guarantee</a>
@endsection

@section('content')
<form action="{{ url('collateral_corporate', $corporate->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row pb-3">
        <div class="col-sm-4"><label>Debitur & Partner <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PRODUCT_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $corporate->PRODUCT_ID }}">{{ $corporate->product->debitur->NAMA_DEBITUR }} -
                    {{ $corporate->product->partner->NAMA_PERUSAHAAN }}</option>
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
            <input type="number" name="Counter_Corporate_Guarantee" value='{{$corporate->Counter_Corporate_Guarantee}}'
                class="form-control" style="width: 300px; height: 30px;">
            @error('Counter_Corporate_Guarantee')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Corporate Guarantee (Rp)<span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <input type="text" name="Nilai_Corporate_Guarantee" value='{{ number_format($corporate->Nilai_Corporate_Guarantee) }}'
                class="form-control number-separator" style="width: 300px; height: 30px;">
            @error('Nilai_Corporate_Guarantee')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama PT Penerima Corporate Guarantee<span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Pt_Penerima_Corporate_Guarantee"
                value='{{$corporate->Nama_Pt_Penerima_Corporate_Guarantee}}' class="form-control"
                style="width: 300px; height: 30px;">
            @error('Nama_Pt_Penerima_Corporate_Guarantee')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama PT Pemberi Corporate Guarantee<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Pt_Pemberi_Corporate_Guarantee"
                value='{{$corporate->Nama_Pt_Pemberi_Corporate_Guarantee}}' class="form-control"
                style="width: 300px; height: 30px;">
            @error('Nama_Pt_Pemberi_Corporate_Guarantee')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Telp PT Pemberi Corporate Guarantee <span class="text-danger">*</span></label>
        </div>
        <div class="col-sm-8">
            <input type='number' name="No_Telp_Pt_Pemberi_Corporate_Guarantee"
                value='{{$corporate->No_Telp_Pt_Pemberi_Corporate_Guarantee}}' style="width: 300px; height: 30px;"
                class="form-control" cols="30" rows="10" />
            @error('No_Telp_Pt_Pemberi_Corporate_Guarantee')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Status" value='{{$corporate->Status}}' class="form-control"
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
            <a href="{{ url('collateral_corporate') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection