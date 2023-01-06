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
    <div class="row pb-3">
        <div class="col-sm-4"><label>Debitur & Partner <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PRODUCT_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $invoice->PRODUCT_ID }}">{{ $invoice->product->debitur->NAMA_DEBITUR }} -
                    {{ $invoice->product->partner->NAMA_PERUSAHAAN }}</option>
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
        <div class="col-sm-4"><label>Counter Invoice<span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <input type="number" name="Counter_Invoice" value="{{ $invoice->Counter_Invoice }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Counter_Invoice')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Invoice (Rp)<span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <input type="text" name="Nilai_Invoice" value="{{ number_format($invoice->Nilai_Invoice) }}" class="form-control number-separator"
                style="width: 300px; height: 30px;">
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
            <input type="text" name="Nilai_Fiducia" value="{{ number_format($invoice->Nilai_Fiducia) }}" class="form-control number-separator"
                style="width: 300px; height: 30px;">
            @error('Nilai_Fiducia')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggal Fiducia<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Tgl_Fiducia" value="{{ $invoice->Tgl_Fiducia }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Tgl_Fiducia')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggal Jatuh Tempo<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Tgl_Jatuh_Tempo" value="{{ $invoice->Tgl_Jatuh_Tempo }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Tgl_Jatuh_Tempo')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Status" value="{{ $invoice->Status }}" class="form-control"
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
            <a href="{{ url('collateral_invoice') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection