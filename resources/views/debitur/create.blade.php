@extends('layout.layout')
@section('title')
    Debitur
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
    <a href="{{ url('debitur') }}">Debitur</a>
@endsection

@section('content')
    <form action="{{ url('debitur') }}" method="POST">
        @csrf
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Debitur <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" name="NAMA_DEBITUR" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggal Lahir <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="date" name="TANGGAL_LAHIR" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No KTP</label> <span class="text-danger">*</span></div>
            <div class="col-sm-8"><input type="number" name="NO_KTP" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No NPWP</label> <span class="text-danger">*</span></div>
            <div class="col-sm-8"><input type="text" name="NO_NPWP" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat <span class="text-danger">*</span></div>
            <div class="col-sm-8"><textarea name="ALAMAT_CUSTOMER" style="width: 300px; height: 100px;" class="form-control" cols="30" rows="10"></textarea></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Provinsi<span class="text-danger">*</span></div>
            <div class="col-sm-8"><input type="text" name="PROVINSI" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kabupaten / Kota <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" name="KABUPATEN_KOTA" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kelurahan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="rext" name="KELURAHAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kode Pos <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="number" name="KODE_POS" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Perusahaan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" name="NAMA_PERUSAHAAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Bidang Usaha <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" name="BIDANG_USAHA" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Sub Bidang Usaha <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" name="SUB_BIDANG_USAHA" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Lama Usaha <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" name="LAMA_USAHA" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jabatan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" name="JABATAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>tanggungan<span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" name="TANGGUNGAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Income <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="number" name="INCOME_BULAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Spouse Income Bulan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="text" name="SUPOUSE_INCOME_BULAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <h5 class="pb-3">Rekening Koran 3 Bulan Terakhir</h5>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan 1 <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="number" name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan 2 <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="number" name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Rekening Bulan 3 <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="number" name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Apakah Ada DP?</label></div>
            <div class="col-sm-4 d-flex">
                <div class="d-flex">
                    <input type="radio" value="Ya" style="width: 15px" name="APAKAH_ADA_DP" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="No" style="width: 15px" name="APAKAH_ADA_DP" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Down Payment</label></div>
            <div class="col-sm-8"><input type="number" name="DOWN_PAYMENT_CUSTOMER" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('debitur') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection