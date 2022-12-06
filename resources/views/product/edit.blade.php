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
            <div class="col-sm-4"><label>ID</label></div>
            <div class="col-sm-8"><input type="number" name="id" value="{{ $dataproduct->id }}" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Partner ID</label></div>
            <div class="col-sm-8"><input type="number" name="PARTNER_ID" value="{{ $dataproduct->PARTNER_ID }}" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Debitur ID</label></div>
            <div class="col-sm-8"><input type="number" name="DEBITUR_ID" value="{{ $dataproduct->DEBITUR_ID }}" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Konven / Syariah</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="Konvensional" {{ ($dataproduct->KONVEN_SYARIAH == "Konvensional")? "checked" : "" }} style="width: 15px" name="KONVEN_SYARIAH" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Konvensional</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="Syariah" {{ ($dataproduct->KONVEN_SYARIAH == "Syariah")? "checked" : "" }} style="width: 15px" name="KONVEN_SYARIAH" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Syariah</p>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Debitur <span class="text-danger">*</span></div>
            <div class="col-sm-8"><input type="text" name="NAMA_DEBITUR" value="{{ $dataproduct->NAMA_DEBITUR }}" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Pembiayaan <br> Pokok Maximum <span class="text-danger">*</span></div>
            <div class="col-sm-8"><input type="number" name="NILAI_PEMBIAYAAN_POKOK_MAXIMUM" value="{{ $dataproduct->NILAI_PEMBIAYAAN_POKOK_MAXIMUM }}" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        {{-- <div class="row pb-3">
            <div class="col-sm-4"><label>Partner ID</label></div>
            <div class="col-sm-8">
                <select name="#" class="form-control" id="#">
                    <option value="Bunga Effective">Bunga Effective</option>
                    <option value="Bunga Flat">Bunga Flat</option>
                </select>    
            </div>
        </div> --}}
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jangka Waktu <br> Maksimum</label></div>
            <div class="col-sm-8"><input type="number" name="Jangka_Waktu_Maximum" value="{{ $dataproduct->Jangka_Waktu_Maximum }}" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        {{-- <div class="row pb-3">
            <div class="col-sm-4"><label>Pola Pembayaran</label></div>
            <div class="col-sm-8">
                <select name="#" class="form-control" id="#">
                    <option value="Installment">Installment</option>
                    <option value="Ballon Payment">Ballon Payment</option>
                </select>    
            </div>
        </div> --}}
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Administrasi</label></div>
            <div class="col-sm-8"><input type="number" name="BIAYA_ADMINISTRASI" value="{{ $dataproduct->BIAYA_ADMINISTRASI }}" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Asuransi</label></div>
            <div class="col-sm-8"><input type="number" name="BIAYA_ASSURANSI" class="form-control" value="{{ $dataproduct->BIAYA_ASSURANSI }}" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Provinsi</label></div>
            <div class="col-sm-8"><input type="number" name="BIAYA_PROVISI" value="{{ $dataproduct->BIAYA_PROVISI }}" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Biaya Lain Lain</label></div>
            <div class="col-sm-8"><input type="number" name="BIAYA_LAIN_LAIN" value="{{ $dataproduct->BIAYA_LAIN_LAIN }}" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-primary" type="submit">Edit</button>
                <a href="{{ url('product') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection