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
        <div class="col-sm-8"><input type="text" name="NAMA_DEBITUR" placeholder="Nama Debitur" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggal Lahir <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="date" name="TANGGAL_LAHIR" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No KTP</label> <span class="text-danger">*</span></div>
        <div class="col-sm-8"><input type="number" name="NO_KTP" placeholder="No KTP" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No NPWP</label> <span class="text-danger">*</span></div>
        <div class="col-sm-8"><input type="text" name="NO_NPWP" placeholder="No NPWP" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat <span class="text-danger">*</span></div>
        <div class="col-sm-8"><textarea name="ALAMAT_CUSTOMER" placeholder="Alamat" style="width: 300px; height: 100px;" class="form-control"
                cols="30" rows="10"></textarea></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Provinsi<span class="text-danger">*</span></div>
        <div class="col-sm-8"><input type="text" name="PROVINSI" placeholder="Provinsi" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Kabupaten / Kota <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="text" name="KABUPATEN_KOTA" placeholder="Kabupaten / Kota" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Kecamatan <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="text" name="KECAMATAN" placeholder="Kecamatan" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Kelurahan <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="text" name="KELURAHAN" placeholder="Kelurahan" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Kode Pos <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="number" name="KODE_POS" placeholder="Kode Pos" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Perusahaan <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="text" name="NAMA_PERUSAHAAN" placeholder="Nama Perusahaan" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Bidang Usaha <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="text" name="BIDANG_USAHA" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Sub Bidang Usaha <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="text" name="SUB_BIDANG_USAHA" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Lama Usaha<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
            <input type="number" class="form-control" placeholder="Lama Usaha" name="LAMA_USAHA">
                <div class="input-group-append">
                    <span class="input-group-text">Bulan</span>
                </div>
            </div>
            @error('LAMA_USAHA')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jabatan <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="text" name="JABATAN" placeholder="Jabatan" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggungan<span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="text" name="TANGGUNGAN" placeholder="Tanggungan" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Income Bulan<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Income Bulan" name="INCOME_BULAN">
            </div>
            @error('INCOME_BULAN')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Spouse Income Bulan<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Spouse Income Bulan" name="SUPOUSE_INCOME_BULAN">
            </div>
            @error('SUPOUSE_INCOME_BULAN')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <h5 class="pb-3">Rekening Koran 3 Bulan Terakhir</h5>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Rekening Bulan 1 <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Rekening Bulan 1" name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1">
            </div>
            @error('REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class="row pb-3">
        <div class="col-sm-4"><label>Rekening Bulan 2 <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Rekening Bulan 2" name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2">
            </div>
            @error('REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Rekening Bulan 3 <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Rekening Bulan 3" name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3">
            </div>
            @error('REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <h5 class="pb-3">Asuransi</h5>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jenis Asuransi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div style="width: 300px; height: 38px;">
                <select class="form-control py-0" name="Jenis_Asuransi_Id" style="width: 300px; height: 30px;">
                    <option></option>
                    @foreach ($asuransi as $item)
                    <option value="{{ $item->id }}">{{ $item->Jenis_Asuransi }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Perusahaan Asuransi</label></div>
        <div class="col-sm-8"><input type="text" name="Perusahaan_Asuransi" placeholder="Perusahaan Asuransi" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Persen Asuransi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
            <input type="number" class="form-control" placeholder="Persen Asuransi" name="Persen_Asuransi">
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
            </div>
            @error('Persen_Asuransi')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Asuransi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Asuransi" name="Nilai_Asuransi">
            </div>
            @error('Nilai_Asuransi')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <h5 class="pb-3">Jaminan</h5>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Sertifikat Tanah</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" name="Jaminan_Sertifikat_Tanah" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK ADA" style="width: 15px" name="Jaminan_Sertifikat_Tanah" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Sertifikat Tanah<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Sertifikat Tanah" name="Nilai_Sertifikat_Tanah">
            </div>
            @error('Nilai_Sertifikat_Tanah')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Kendaraan Mobil</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Mobil" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK ADA" style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Mobil" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Kendaraan Mobil<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Kendaraan Mobil" name="Nilai_Kendaraan_Bermotor_Mobil">
            </div>
            @error('Nilai_Kendaraan_Bermotor_Mobil')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Kendaraan Motor</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Motor" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK ADA" style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Motor" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Kendaraan Motor<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Kendaraan Motor" name="Nilai_Kendaraan_Bermotor_Motor">
            </div>
            @error('Nilai_Kendaraan_Bermotor_Motor')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Personal Guarantee</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" name="Jaminan_Personel_Guarantee" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK ADA" style="width: 15px" name="Jaminan_Personel_Guarantee" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Personal Guarantee<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Personal Guarantee" name="Nilai_Personel_Guarantee">
            </div>
            @error('Nilai_Personel_Guarantee')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Invoice</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" name="Jaminan_Invoice" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK ADA" style="width: 15px" name="Jaminan_Invoice" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Invoice<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Invoice" name="Nilai_Invoice">
            </div>
            @error('Nilai_Invoice')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Inventory</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" name="Jaminan_Inventory" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK ADA" style="width: 15px" name="Jaminan_Inventory" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Inventory<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Inventory" name="Nilai_Inventory">
            </div>
            @error('Nilai_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Lainnya</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" name="Jaminan_Lainnya" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK ADA" style="width: 15px" name="Jaminan_Lainnya" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Jaminan Lainnya<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Nilai Jaminan Lainnya" name="Nilai_Jaminan_Lainnya">
            </div>
            @error('Nilai_Jaminan_Lainnya')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Down Payment</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="YA" style="width: 15px" name="APAKAH_ADA_DP" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="NO" style="width: 15px" name="APAKAH_ADA_DP" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jumlah Down Payment<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
        <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
            <input type="text" class="form-control number-separator" placeholder="Jumlah Down Payment" name="DOWN_PAYMENT_CUSTOMER">
            </div>
            @error('DOWN_PAYMENT_CUSTOMER')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
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
