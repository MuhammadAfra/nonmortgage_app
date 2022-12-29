@extends('layout.layout')
@section('title')
    Product
@endsection

@section('subtitle')
    Edit
@endsection

@section('page')
    <a href="{{ url('product') }}">Product</a>
@endsection

@section('content')
    <form action="{{ url('product', $dataproduct->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner ID</label></div>
            <div class="col-sm-8">
                <select name="PARTNER_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                    <option value="{{ $dataproduct->PARTNER_ID }}">{{ $dataproduct->partner->id }} - {{ $dataproduct->partner->NAMA_PERUSAHAAN }}</option>
                    @foreach ($partner as $item)
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->NAMA_PERUSAHAAN }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Debitur ID</label></div>
            <div class="col-sm-8">
                <select name="DEBITUR_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                    <option value="{{ $dataproduct->DEBITUR_ID }}">{{ $dataproduct->debitur->id }} - {{ $dataproduct->debitur->NAMA_DEBITUR }}</option>
                    @foreach ($deb as $item)
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->NAMA_DEBITUR }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Product</label></div>
            <div class="col-sm-4 d-flex">
                @foreach ($jp as $item)    
                <div class="d-flex">
                    <input type="radio" value="{{ $item->id }}" {{ ($dataproduct->KONVEN_SYARIAH_ID == $item->id)? "checked" : "" }} style="width: 15px" name="KONVEN_SYARIAH_ID" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">{{ $item->Product }}</p>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Pembiayaan <br> Pokok Maximum <span class="text-danger">*</span></div> 
            <div class="col-sm-8"><input type="text" name="NILAI_PEMBIAYAAN_POKOK_MAXIMUM" value="{{ number_format($dataproduct->NILAI_PEMBIAYAAN_POKOK_MAXIMUM) }}" class="form-control number-separator" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Suku Bunga Flat (%)</label></div>
            <div class="col-sm-8">
                <input type="number" name="Suku_Bunga_Flat" value="{{ $dataproduct->Suku_Bunga_Flat }}" class="form-control" style="width: 300px; height: 30px;">
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Suku Bunga Effective (%)</label></div>
            <div class="col-sm-8">
                <input type="number" name="Suku_Bunga_Effective" value="{{ $dataproduct->Suku_Bunga_Effective }}" class="form-control" style="width: 300px; height: 30px;">
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jangka Waktu <br> Maksimum (Bulan)</label></div>
            <div class="col-sm-8"><input type="number" name="Jangka_Waktu_Maximum" value="{{ $dataproduct->Jangka_Waktu_Maximum }}" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Pola Pembayaran</label></div>
            <div class="col-sm-8">
                <select name="POLA_PEMBAYARAN_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                    <option value="{{ $dataproduct->POLA_PEMBAYARAN_ID }}">{{ $dataproduct->pola_pembayaran->id }} - {{ $dataproduct->pola_pembayaran->Pola_Pembayaran }}</option>
                    @foreach ($pola as $item)
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->Pola_Pembayaran }}</option>
                    @endforeach
                </select>   
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Administrasi</label></div>
            <div class="col-sm-8"><input type="text" name="BIAYA_ADMINISTRASI" value="{{ number_format($dataproduct->BIAYA_ADMINISTRASI) }}" class="form-control number-separator" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Asuransi</label></div>
            <div class="col-sm-8"><input type="text" name="BIAYA_ASSURANSI" value="{{ number_format($dataproduct->BIAYA_ASSURANSI) }}" class="form-control number-separator" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Provinsi</label></div>
            <div class="col-sm-8"><input type="text" name="BIAYA_PROVISI" value="{{ number_format($dataproduct->BIAYA_PROVISI) }}" class="form-control number-separator" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Lain Lain</label></div>
            <div class="col-sm-8"><input type="text" name="BIAYA_LAIN_LAIN" value="{{ number_format($dataproduct->BIAYA_LAIN_LAIN) }}" class="form-control number-separator" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-warning text-white" type="submit">Edit</button>
                <a href="{{ url('product') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection