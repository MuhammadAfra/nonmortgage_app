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
            <div class="col-sm-4"><label>Jenis Product <span class="text-danger">*</span></label></div>
            <div class="col-sm-4 row pl-3">
                <select name="MASTER_PRODUCT_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                    <option>-----</option>
                    @foreach ($master_product as $item)
                        <option value="{{ $item->id }}">{{ $item->id_master_product }} - {{ $item->nama_product }}</option>
                    @endforeach
                </select>
                @error('MASTER_PRODUCT_ID')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Pembiayaan / <br> Pokok Maximum <span class="text-danger">*</span></div>
            <div class="col-sm-8">
                <input type="text" name="NILAI_PEMBIAYAAN_POKOK_MAXIMUM" placeholder="Nilai Pembiayaan Pokok Maximum" class="form-control number-separator" style="width: 300px; height: 30px;">
                @error('NILAI_PEMBIAYAAN_POKOK_MAXIMUM')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Suku Bunga <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <select name="SUKU_BUNGA_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                    <option>-----</option>
                    @foreach ($bunga->where('konven_syariah_id', 1) as $item)
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->Suku_Bunga }} {{ $item->jp->Product }}</option>
                    @endforeach
                    @foreach ($bunga->where('konven_syariah_id', 2) as $item)
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->Suku_Bunga }} {{ $item->jp->Product }}</option>
                    @endforeach
                </select>
                @error('SUKU_BUNGA_ID')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jangka Waktu <br> Maksimum (Bulan) <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="Jangka_Waktu_Maximum" placeholder="Jangka Waktu Maksimum" class="form-control number-separator" style="width: 300px; height: 30px;">
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
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->Pola_Pembayaran }}</option>
                    @endforeach
                </select>  
                @error('POLA_PEMBAYARAN_ID')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Administrasi</label></div>
            <div class="col-sm-8"><input type="text" placeholder="Biaya Administrasi" name="BIAYA_ADMINISTRASI" class="form-control number-separator" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Asuransi</label></div>
            <div class="col-sm-8"><input type="text" placeholder="Biaya Asuransi" name="BIAYA_ASSURANSI" class="form-control number-separator" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Provisi</label></div>
            <div class="col-sm-8"><input type="text" placeholder="Biaya Provinsi" name="BIAYA_PROVISI" class="form-control number-separator" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Lain Lain</label></div>
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