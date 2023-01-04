@extends('layout.layout')
@section('title')
    Debitur
@endsection

@section('subtitle')
    Edit
@endsection

@section('page')
    <a href="{{ url('debitur') }}">Debitur</a>
@endsection

@section('content')
    <form action="{{ url('debitur', $debitur->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Debitur <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->NAMA_DEBITUR }}" name="NAMA_DEBITUR" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggal Lahir <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="date" value="{{ $debitur->TANGGAL_LAHIR }}" name="TANGGAL_LAHIR" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No KTP</label> <span class="text-danger">*</span></div>
            <div class="col-sm-8"><input type="number" value="{{ $debitur->NO_KTP }}" name="NO_KTP" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No NPWP</label> <span class="text-danger">*</span></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->NO_NPWP }}" name="NO_NPWP" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat <span class="text-danger">*</span></div>
            <div class="col-sm-8"><textarea name="ALAMAT_CUSTOMER" style="width: 300px; height: 100px;" class="form-control" cols="30" rows="10">{{ $debitur->ALAMAT_CUSTOMER }}</textarea></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Provinsi<span class="text-danger">*</span></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->PROVINSI }}" name="PROVINSI" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kabupaten / Kota <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->KABUPATEN_KOTA }}" name="KABUPATEN_KOTA" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kecamatan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="rext" value="{{ $debitur->KECAMATAN }}" name="KECAMATAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kelurahan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="rext" value="{{ $debitur->KELURAHAN }}" name="KELURAHAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kode Pos <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="number" value="{{ $debitur->KODE_POS }}" name="KODE_POS" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Perusahaan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->NAMA_PERUSAHAAN }}" name="NAMA_PERUSAHAAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Bidang Usaha <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->BIDANG_USAHA }}" name="BIDANG_USAHA" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Sub Bidang Usaha <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->SUB_BIDANG_USAHA }}" name="SUB_BIDANG_USAHA" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Lama Usaha <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->LAMA_USAHA }}" name="LAMA_USAHA" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jabatan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->JABATAN }}" name="JABATAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>tanggungan<span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->TANGGUNGAN }}" name="TANGGUNGAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Income <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="number" value="{{ $debitur->INCOME_BULAN }}" name="INCOME_BULAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Spouse Income Bulan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" value="{{ $debitur->SUPOUSE_INCOME_BULAN }}" name="SUPOUSE_INCOME_BULAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <h5 class="pb-3">Rekening Koran 3 Bulan Terakhir</h5>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan 1 <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="number" value="{{ $debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1 }}" name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan 2 <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="number" value="{{ $debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2 }}" name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan 3 <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="number" value="{{ $debitur->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3 }}" name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Apakah Ada DP?</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="YA" {{ ($debitur->APAKAH_ADA_DP == "YA")? "checked" : "" }} style="width: 15px" name="APAKAH_ADA_DP" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">YA</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="NO" {{ ($debitur->APAKAH_ADA_DP == "NO")? "checked" : "" }} style="width: 15px" name="APAKAH_ADA_DP" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Down Payment</label></div>
            <div class="col-sm-8"><input type="number" value="{{ $debitur->DOWN_PAYMENT_CUSTOMER }}" name="DOWN_PAYMENT_CUSTOMER" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-warning text-white" type="submit">Edit</button>
                <a href="{{ url('debitur') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection