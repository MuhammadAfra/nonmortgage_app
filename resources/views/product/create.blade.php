@extends('layout.layout')
@section('title')
Product
@endsection

@section('subtitle')
Add
@endsection

@section('page')
<a href="{{ url('product') }}">Product</a>
@endsection

@section('content')
<form action="{{ url('product') }}" method="POST">
    @csrf
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Partner ID <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PARTNER_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option></option>
                @foreach ($partner as $item)
                <option value="{{ $item->id }}">{{ $item->NAMA_PERUSAHAAN }}</option>
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
            <select name="DEBITUR_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option></option>
                @foreach ($deb as $item)
                <option value="{{ $item->id }}">{{ $item->NAMA_DEBITUR }}</option>
                @endforeach
            </select>
            @error('DEBITUR_ID')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Product <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="M_PRODUCT_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option></option>
                @foreach ($prod as $item)
                <option value="{{ $item->id }}">{{ $item->nama_product }}</option>
                @endforeach
            </select>
            @error('M_PRODUCT_ID')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>  

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Pembiayaan /<br> Pokok Maksimum<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Pembiayaan/Pokok Maksimum" name="NILAI_PEMBIAYAAN_POKOK_MAXIMUM">
            </div>
            @error('NILAI_PEMBIAYAAN_POKOK_MAXIMUM')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Suku Bunga Flat<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
            <input type="text" class="form-control number-separator" placeholder="Suku Bunga Flat" name="SUKU_BUNGA_FLAT">
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
            </div>
            @error('SUKU_BUNGA_FLAT')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Suku Bunga Effective<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
            <input type="text" class="form-control number-separator" placeholder="Suku Bunga Effective" name="SUKU_BUNGA_EFFECTIVE">
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
            </div>
            @error('SUKU_BUNGA_EFFECTIVE')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jangka Waktu <br> Maksimum<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
            <input type="number" class="form-control" placeholder="Jangka Waktu Maksimum" name="Jangka_Waktu_Maximum">
                <div class="input-group-append">
                    <span class="input-group-text">Bulan</span>
                </div>
            </div>
            @error('Jangka_Waktu_Maximum')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Pola Pembayaran <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="POLA_PEMBAYARAN_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option></option>
                @foreach ($pola as $item)
                <option value="{{ $item->id }}">{{ $item->Pola_Pembayaran }}</option>
                @endforeach
            </select>
            @error('POLA_PEMBAYARAN_ID')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Biaya Administrasi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Biaya Administrasi" name="BIAYA_ADMINISTRASI">
            </div>
            @error('BIAYA_ADMINISTRASI')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Biaya Asuransi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Biaya Asuransi" name="BIAYA_ASSURANSI">
            </div>
            @error('BIAYA_ASSURANSI')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Biaya Provisi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Biaya Provisi" name="BIAYA_PROVISI">
            </div>
            @error('BIAYA_PROVISI')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Biaya Lain-Lain<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Biaya Lain-Lain" name="BIAYA_LAIN_LAIN">
            </div>
            @error('BIAYA_LAIN_LAIN')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <button class="btn btn-primary" type="submit">Add</button>
            <a href="{{ url('product') }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</form>
@endsection
