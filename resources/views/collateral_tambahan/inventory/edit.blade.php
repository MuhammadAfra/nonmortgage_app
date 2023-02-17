@extends('layout.layout')
@section('title')
Collateral Tambahan - Inventory
@endsection

@section('subtitle')
Edit
@endsection

@section('page')
<a href="{{ url('collateral_inven_tambahan') }}">Collateral Tambahan - Inventory</a>
@endsection

@section('content')
<form action="{{ url('collateral_inven_tambahan', $inventbh->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row pb-3" >
        <div class="col-sm-4"><label>Partner ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select readonly name="PARTNER_ID" id="PARTNER_ID" class="form-control py-0 collCounterPart" style="width: 300px; height: 30px;">
                <option value="{{ $inventbh->PARTNER_ID }}">{{ $inventbh->partner->NAMA_PERUSAHAAN }}</option>
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
                <input type="radio" readonly value="PERORANGAN" style="width: 15px" name="debitur" {{ $inventbh->jenisDeb == 'PERORANGAN' ? 'checked' : '' }} required class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">PERORANGAN</p>
            </div>
            <div class=" d-flex">
                <input type="radio" readonly value="BADAN_USAHA" style="width: 15px" name="debitur" {{ $inventbh->jenisDeb == 'BADAN_USAHA' ? 'checked' : '' }} required class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">BADAN USAHA</p>
            </div>
            <button type="button" class="btn btn-sm btn-default" disabled onclick="jenisDeb()">Pilih</button>
        </div>
    </div>
    @if ($inventbh->DEBITUR_ID != NULL)
        @if ($inventbh->jenisDeb == 'PERORANGAN')
            <div style="display: block;" id="perorangan"">
                <div class="row pb-3" >
                    <div class="col-sm-4"><label>Debitur Perorangan ID <span class="text-danger">*</span></label></div>
                    <div class="col-sm-8">
                        <select name="DEBITUR_ID" readonly id="DEBITUR_ID" class="form-control py-0 collCounterDebit" style="width: 300px; height: 30px;">
                            <option value="{{ $inventbh->DEBITUR_ID }}">{{ $inventbh->debitur->NAMA_DEBITUR }}</option>
                        </select>
                        @error('DEBITUR_ID')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        @endif
    @endif

    @if ($inventbh->DEBITUR_BADAN_USAHA_ID != NULL)
        @if ($inventbh->jenisDeb == 'BADAN_USAHA')
            <div style="display: block;" id="usaha"">
                <div class="row pb-3" >
                    <div class="col-sm-4"><label>Debitur Badan Usaha ID <span class="text-danger">*</span></label></div>
                    <div class="col-sm-8">
                        <select readonly name="DEBITUR_BADAN_USAHA_ID" id="DEBITUR_BADAN_USAHA_ID" class="form-control py-0 collCounterDebus" style="width: 300px; height: 30px;">
                            <option value="{{ $inventbh->DEBITUR_BADAN_USAHA_ID }}">{{ $inventbh->debitur_badan_usaha->NAMA_PERUSAHAAN }}</option>
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
            <input type="text" name="COLL_COUNTER" value="{{ str_pad($inventbh->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}" class="form-control" readonly id="counter" style="width: 300px; height: 30px;" >
            @error('COLL_COUNTER')
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
            <input type="text" class="form-control number-separator" value="{{ number_format($inventbh->Nilai_Inv_Tambahan) }}" placeholder="Nilai Inv" name="Nilai_Inv_Tambahan">
            </div>
            @error('Nilai_Inv_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Inventory_Tambahan" value="{{ $inventbh->Nama_Inventory_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Nama_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Besar Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Besar_Inventory_Tambahan" value="{{ $inventbh->Besar_Inventory_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Besar_Inventory_Tambahan')
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
            <input type="text" class="form-control number-separator" value="{{ number_format($inventbh->Nilai_Inventory_Tambahan) }}" placeholder="Nilai Inventory" name="Nilai_Inventory_Tambahan">
            </div>
            @error('Nilai_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <textarea name="Alamat_Inventory_Tambahan" value="{{ $inventbh->Alamat_Inventory_Tambahan }}" class="form-control" rows="10"  style="width: 300px;">{{ $inventbh->Alamat_Inventory_Tambahan }}</textarea>
            @error('Alamat_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Atas Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Atas_Nama_Inventory_Tambahan" value="{{ $inventbh->Atas_Nama_Inventory_Tambahan }}" class="form-control" style="width: 300px; height: 30px;">
            @error('Atas_Nama_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Atas Nama Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <textarea name="Alamat_Atas_Nama_Inventory_Tambahan" value="{{ $inventbh->Alamat_Atas_Nama_Inventory_Tambahan }}" class="form-control" rows="10"  style="width: 300px;">{{ $inventbh->Alamat_Atas_Nama_Inventory_Tambahan }}</textarea>
            @error('Alamat_Atas_Nama_Inventory_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="Status_Tambahan" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $inventbh->Status_Tambahan }}">{{ $inventbh->Status_Tambahan }}</option>
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
            <a href="{{ url('collateral_inven_tambahan') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection
