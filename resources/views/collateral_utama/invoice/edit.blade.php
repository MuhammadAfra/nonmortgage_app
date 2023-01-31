@extends('layout.layout')
@section('title')
Collateral Utama - Invoice
@endsection

@section('subtitle')
Edit
@endsection

@section('page')
<a href="{{ url('collateral_invoice') }}">Collateral Utama - Invoice</a>
@endsection

@section('content')
<form action="{{ url('collateral_invoice', $invoice->id) }}" method="POST">
    @csrf
    @method('PUT')
            <div class="col-sm-4"><label>Partner ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PARTNER_ID" id="PARTNER_ID" class="form-control py-0 collCounterPart" style="width: 300px; height: 30px;">
                <option value="{{ $invoice->PARTNER_ID }}">{{ $invoice->partner->NAMA_PERUSAHAAN }}</option>
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
                <option value="{{ $invoice->DEBITUR_ID }}">{{ $invoice->debitur->NAMA_DEBITUR }}</option>
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
        <div class="col-sm-4"><label>Nilai Invoice<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" value="{{ number_format($invoice->Nilai_Invoice) }}" name="Nilai_Invoice">
            </div>
            @error('Nilai_Invoice')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jenis Invoice<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Jenis_Invoice" value="{{ $invoice->Jenis_Invoice }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Jenis_Invoice')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Atas Nama Invoice<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Atas_Nama_Invoice" value="{{ $invoice->Atas_Nama_Invoice }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Atas_Nama_Invoice')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Nama Invoice<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Alamat_Nama_Invoice" value="{{ $invoice->Alamat_Nama_Invoice }}"
                class="form-control" style="width: 300px; height: 30px;">
            @error('Alamat_Nama_Invoice')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Fiducia<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Fiducia" value="{{ $invoice->No_Fiducia }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('No_Fiducia')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Fiducia<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" value="{{ number_format($invoice->Nilai_Fiducia) }}" name="Nilai_Fiducia">
            </div>
            @error('Nilai_Fiducia')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggal Fiducia<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="date" name="Tgl_Fiducia" value="{{ $invoice->Tgl_Fiducia }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Tgl_Fiducia')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggal Jatuh Tempo<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="date" name="Tgl_Jatuh_Tempo" value="{{ $invoice->Tgl_Jatuh_Tempo }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Tgl_Jatuh_Tempo')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="Status" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $invoice->Status }}">{{ $invoice->Status }}</option>
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
            <a href="{{ url('collateral_invoice') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection