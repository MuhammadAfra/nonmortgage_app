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
                    <option></option>
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
                    <option></option>
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
            <div class="col-sm-4"><label>Konven / Syariah <span class="text-danger">*</span></label></div>
            <div class="col-sm-4 row pl-3">
                @foreach ($jp as $item)    
                <div class="d-flex">
                    <input type="radio" value="{{ $item->id }}" style="width: 15px" name="KONVEN_SYARIAH_ID" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">{{ $item->Product }}</p>
                </div>
                @endforeach
                @error('KONVEN_SYARIAH_ID')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Pembiayaan <br> Pokok Maximum <span class="text-danger">*</span></div>
            <div class="col-sm-8">
                <input type="number" name="NILAI_PEMBIAYAAN_POKOK_MAXIMUM" class="form-control" style="width: 300px; height: 30px;">
                @error('NILAI_PEMBIAYAAN_POKOK_MAXIMUM')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Suku Bunga <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <select name="SUKU_BUNGA_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                    <option></option>
                    @foreach ($bunga as $item)
                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->Suku_Bunga }}</option>
                    @endforeach
                </select>
                @error('SUKU_BUNGA_ID')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jangka Waktu <br> Maksimum <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="number" name="Jangka_Waktu_Maximum" class="form-control" style="width: 300px; height: 30px;">
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
            <div class="col-sm-8"><input type="number" name="BIAYA_ADMINISTRASI" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Asuransi</label></div>
            <div class="col-sm-8"><input type="number" name="BIAYA_ASSURANSI" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Provinsi</label></div>
            <div class="col-sm-8"><input type="number" name="BIAYA_PROVISI" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Lain Lain</label></div>
            <div class="col-sm-8"><input type="number" name="BIAYA_LAIN_LAIN" class="form-control" style="width: 300px; height: 30px;"></div>
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