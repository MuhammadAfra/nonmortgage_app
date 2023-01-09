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
            <div class="col-sm-4"><label>Partner ID <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <select name="PARTNER_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                    <option>-----</option>
                    @foreach ($partner as $item)
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->NAMA_PERUSAHAAN }}</option>
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
                    <option>-----</option>
                    @foreach ($deb as $item)
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->NAMA_DEBITUR }}</option>
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
                    <option>-----</option>
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
            <div class="col-sm-4"><label>Nilai Pembiayaan /<br> Pokok Maximum <span class="text-danger">*</span></div>
            <div class="col-sm-8">
                <input type="text" name="NILAI_PEMBIAYAAN_POKOK_MAXIMUM" placeholder="Nilai Pembiayaan Pokok Maximum" class="form-control number-separator" style="width: 300px; height: 30px;">
                @error('NILAI_PEMBIAYAAN_POKOK_MAXIMUM')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Suku Bunga Flat (%)<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="number" name="SUKU_BUNGA_FLAT" placeholder="Suku Bunga Flat" class="form-control" style="width: 300px; height: 30px;">
                @error('SUKU_BUNGA_FLAT')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Suku Bunga Effective (%)<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="number" name="SUKU_BUNGA_EFFECTIVE" placeholder="Suku Bunga Effective" class="form-control" style="width: 300px; height: 30px;">
                @error('SUKU_BUNGA_EFFECTIVE')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jangka Waktu <br> Maksimum (Bulan) <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="number" name="Jangka_Waktu_Maximum" placeholder="Jangka Waktu Maksimum" class="form-control" style="width: 300px; height: 30px;">
                @error('Jangka_Waktu_Maximum')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Pola Pembayaran <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <select name="POLA_PEMBAYARAN_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                    <option>-----</option>
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
            <div class="col-sm-4"><label>Biaya Asuransi (Rp)</label></div>
            <div class="col-sm-8"><input type="text" placeholder="Biaya Asuransi" name="BIAYA_ASSURANSI" class="form-control number-separator" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Provisi (Rp)</label></div>
            <div class="col-sm-8"><input type="text" placeholder="Biaya Provinsi" name="BIAYA_PROVISI" class="form-control number-separator" style="width: 300px; height: 30px;"></div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Lain Lain (Rp)</label></div>
            <div class="col-sm-8"><input type="text" placeholder="Biaya Lain Lain" name="BIAYA_LAIN_LAIN" class="form-control number-separator" style="width: 300px; height: 30px;"></div>
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
