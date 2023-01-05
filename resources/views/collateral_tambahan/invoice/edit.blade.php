@extends('layout.layout')
@section('title')
Collateral Tambahan - Invoice
@endsection

@section('subtitle')
Edit
@endsection

@section('page')
<a href="{{ url('collateral_invoice_tambahan') }}">Collateral Tambahan - Invoice</a>
@endsection

@section('content')
<form action="{{ url('collateral_invoice_tambahan', $invoicetbh->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row pb-3">
        <div class="col-sm-4"><label>Debitur & Partner <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PRODUCT_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $invoicetbh->PRODUCT_ID }}">{{ $invoicetbh->product->debitur->NAMA_DEBITUR }} -
                    {{ $invoicetbh->product->partner->NAMA_PERUSAHAAN }}</option>
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
            <input type="number" name="Counter_Invoice_Tambahan" value="{{ $invoicetbh->Counter_Invoice_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Counter_Invoice_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Invoice<span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <input type="number" name="Nilai_Invoice_Tambahan" value="{{ $invoicetbh->Nilai_Invoice_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Nilai_Invoice_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jenis Invoice<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Jenis_Invoice_Tambahan" value="{{ $invoicetbh->Jenis_Invoice_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Jenis_Invoice_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Atas Nama Invoice<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Atas_Nama_Invoice_Tambahan" value="{{ $invoicetbh->Atas_Nama_Invoice_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Atas_Nama_Invoice_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Nama Invoice<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Alamat_Nama_Invoice_Tambahan" value="{{ $invoicetbh->Alamat_Nama_Invoice_Tambahan }}"
                class="form-control" style="width: 300px; height: 30px;">
            @error('Alamat_Nama_Invoice_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No Fiducia<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Fiducia_Tambahan" value="{{ $invoicetbh->No_Fiducia_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('No_Fiducia_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Fiducia<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Nilai_Fiducia_Tambahan" value="{{ $invoicetbh->Nilai_Fiducia_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Nilai_Fiducia_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggal Fiducia<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Tgl_Fiducia_Tambahan" value="{{ $invoicetbh->Tgl_Fiducia_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Tgl_Fiducia_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggal Jatuh Tempo<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Tgl_Jatuh_Tempo_Tambahan" value="{{ $invoicetbh->Tgl_Jatuh_Tempo_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Tgl_Jatuh_Tempo_Tambahan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <input type="text" name="Status_Tambahan" value="{{ $invoicetbh->Status_Tambahan }}" class="form-control"
                style="width: 300px; height: 30px;">
            @error('Status_Tambahan')
           <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <button class="btn btn-warning text-white" type="submit">Edit</button>
            <a href="{{ url('collateral_invoice_tambahan') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection