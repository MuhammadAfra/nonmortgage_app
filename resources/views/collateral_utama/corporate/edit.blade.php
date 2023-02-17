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
    <div class="col-sm-4"><label>Partner ID <span class="text-danger">*</span></label></div>
    <div class="col-sm-8">
        <select readonly name="PARTNER_ID" id="PARTNER_ID" class="form-control py-0 collCounterPart" style="width: 300px; height: 30px;">
            <option value="{{ $corporate->PARTNER_ID }}">{{ $corporate->partner->NAMA_PERUSAHAAN }}</option>
        </select>
        @error('PARTNER_ID')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row pb-3">
    <div class="col-sm-4"><label>Debitur <span class="text-danger">*</span></label></div>
    <div class="col-sm-4 d-flex">
        <div class="d-flex">
            <input type="radio" readonly value="PERORANGAN" style="width: 15px" name="debitur" {{ $corporate->jenisDeb == 'PERORANGAN' ? 'checked' : '' }} required class="form-control">
            <p class="my-auto mx-2" style="font-weight: 600">PERORANGAN</p>
        </div>
        <div class=" d-flex">
            <input type="radio" readonly value="BADAN_USAHA" style="width: 15px" name="debitur" {{ $corporate->jenisDeb == 'BADAN_USAHA' ? 'checked' : '' }} required class="form-control">
            <p class="my-auto mx-2" style="font-weight: 600">BADAN USAHA</p>
        </div>
        <button type="button" class="btn btn-sm btn-default" disabled onclick="jenisDeb()">Pilih</button>
    </div>
</div>
@if ($corporate->DEBITUR_ID != NULL)
    @if ($corporate->jenisDeb == 'PERORANGAN')
        <div style="display: block;" id="perorangan"">
            <div class="row pb-3" >
                <div class="col-sm-4"><label>Debitur Perorangan ID <span class="text-danger">*</span></label></div>
                <div class="col-sm-8">
                    <select name="DEBITUR_ID" readonly id="DEBITUR_ID" class="form-control py-0 collCounterDebit" style="width: 300px; height: 30px;">
                        <option value="{{ $corporate->DEBITUR_ID }}">{{ $corporate->debitur->NAMA_DEBITUR }}</option>
                    </select>
                    @error('DEBITUR_ID')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    @endif
@endif

@if ($corporate->DEBITUR_BADAN_USAHA_ID != NULL)
    @if ($corporate->jenisDeb == 'BADAN_USAHA')
        <div style="display: block;" id="usaha"">
            <div class="row pb-3" >
                <div class="col-sm-4"><label>Debitur Badan Usaha ID <span class="text-danger">*</span></label></div>
                <div class="col-sm-8">
                    <select readonly name="DEBITUR_BADAN_USAHA_ID" id="DEBITUR_BADAN_USAHA_ID" class="form-control py-0 collCounterDebus" style="width: 300px; height: 30px;">
                        <option value="{{ $corporate->DEBITUR_BADAN_USAHA_ID }}">{{ $corporate->debitur_badan_usaha->NAMA_PERUSAHAAN }}</option>
                    </select>
                    @error('DEBITUR_BADAN_USAHA_ID')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    @endif
@endif

<div class="row pb-3">
    <div class="col-sm-4"><label>Coll ID <span class="text-danger">*</span></label></div>
    <div class="col-sm-8">
        <input type="text" name="COLL_COUNTER" value="{{ str_pad($corporate->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}" class="form-control" readonly id="counter" style="width: 300px; height: 30px;" >
        @error('COLL_COUNTER')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Corporate Guarantee<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 30px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" value='{{ number_format($corporate->Nilai_Corporate_Guarantee) }}' placeholder="Nilai Inventory" name="Nilai_Corporate_Guarantee">
            </div>
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
            <select name="Status" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $corporate->Status }}">{{ $corporate->Status }}</option>
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
            <a href="{{ url('collateral_corporate') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection