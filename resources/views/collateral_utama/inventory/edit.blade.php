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
        <div class="col-sm-4"><label>Partner ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PARTNER_ID" readonly id="PARTNER_ID" class="form-control py-0 collCounterPart" style="width: 300px; height: 30px;">
                <option value="{{ $inven->PARTNER_ID }}">{{ $inven->partner->NAMA_PERUSAHAAN }}</option>
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
                <input type="radio" readonly value="PERORANGAN" style="width: 15px" name="debitur" {{ $inven->jenisDeb == 'PERORANGAN' ? 'checked' : '' }} required class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">PERORANGAN</p>
            </div>
            <div class=" d-flex">
                <input type="radio" readonly value="BADAN_USAHA" style="width: 15px" name="debitur" {{ $inven->jenisDeb == 'BADAN_USAHA' ? 'checked' : '' }} required class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">BADAN USAHA</p>
            </div>
            <button type="button" class="btn btn-sm btn-default" disabled onclick="jenisDeb()">Pilih</button>
        </div>
    </div>
    @if ($inven->DEBITUR_ID != NULL)
        @if ($inven->jenisDeb == 'PERORANGAN')
            <div style="display: block;" id="perorangan"">
                <div class="row pb-3" >
                    <div class="col-sm-4"><label>Debitur Perorangan ID <span class="text-danger">*</span></label></div>
                    <div class="col-sm-8">
                        <select name="DEBITUR_ID" readonly id="DEBITUR_ID" class="form-control py-0 collCounterDebit" style="width: 300px; height: 30px;">
                            <option value="{{ $inven->DEBITUR_ID }}">{{ $inven->debitur->NAMA_DEBITUR }}</option>
                        </select>
                        @error('DEBITUR_ID')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        @endif
    @endif

    @if ($inven->DEBITUR_BADAN_USAHA_ID != NULL)
        @if ($inven->jenisDeb == 'BADAN_USAHA')
            <div style="display: block;" id="usaha"">
                <div class="row pb-3" >
                    <div class="col-sm-4"><label>Debitur Badan Usaha ID <span class="text-danger">*</span></label></div>
                    <div class="col-sm-8">
                        <select readonly name="DEBITUR_BADAN_USAHA_ID" id="DEBITUR_BADAN_USAHA_ID" class="form-control py-0 collCounterDebus" style="width: 300px; height: 30px;">
                            <option value="{{ $inven->DEBITUR_BADAN_USAHA_ID }}">{{ $inven->debitur_badan_usaha->NAMA_PERUSAHAAN }}</option>
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
            <input type="text" name="COLL_COUNTER" value="{{ str_pad($inven->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}" class="form-control" readonly id="counter" style="width: 300px; height: 30px;" >
            @error('COLL_COUNTER')
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
