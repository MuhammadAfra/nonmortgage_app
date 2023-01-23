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
        <div class="col-sm-4"><label>Nama Perusahaan Partner<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div style="width: 300px; height: 38px;">
                <select class="form-control py-0" name="PARTNER_ID" style="width: 300px; height: 30px;" required>
                    <option></option>
                    @foreach ($partner as $item)
                    <option value="{{ $item->id }}">{{ $item->NAMA_PERUSAHAAN }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Debitur <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="text" name="NAMA_DEBITUR" placeholder="Nama Debitur" class="form-control"
                style="width: 300px; height: 30px;" required>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggal Lahir <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="date" required name="TANGGAL_LAHIR" class="form-control"
                style="width: 300px; height: 30px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No KTP</label> <span class="text-danger">*</span></div>
        <div class="col-sm-8"><input type="number" required name="NO_KTP" placeholder="No KTP" class="form-control"
                style="width: 300px; height: 30px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>No NPWP</label> <span class="text-danger">*</span></div>
        <div class="col-sm-8"><input type="text" required name="NO_NPWP" placeholder="No NPWP" class="form-control"
                style="width: 300px; height: 30px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat <span class="text-danger">*</span></div>
        <div class="col-sm-8"><textarea required name="ALAMAT_CUSTOMER" placeholder="Alamat" style="width: 300px; height: 100px;"
                class="form-control" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Kelurahan <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input required type="text" name="KELURAHAN" placeholder="Kelurahan" class="form-control"
                style="width: 300px; height: 30px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Kecamatan <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="text" name="KECAMATAN" placeholder="Kecamatan" class="form-control"
                style="width: 300px; height: 30px;" required>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Kode Pos <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="number" name="KODE_POS" placeholder="Kode Pos" class="form-control"
                style="width: 300px; height: 30px;" required>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Kabupaten / Kota <span class="text-danger">*</span></label></div>
        <div class="col-sm-8"><input type="text" name="KABUPATEN_KOTA" placeholder="Kabupaten / Kota"
                class="form-control" style="width: 300px; height: 30px;" required>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Provinsi<span class="text-danger">*</span></div>
        <div class="col-sm-8"><input type="text" name="PROVINSI" placeholder="Provinsi" class="form-control"
                style="width: 300px; height: 30px;" required>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Perusahaan </label></div>
        <div class="col-sm-8"><input type="text" name="NAMA_PERUSAHAAN" placeholder="Nama Perusahaan"
                class="form-control" style="width: 300px; height: 30px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Bidang Usaha & Sub Bidang Usaha</label></div>
        <div class="col-sm-8">
            <select name="BIDANG_USAHA" class="form-control py-0" style="width: 300px; height: 30px;">
                <option></option>
                @foreach ($sektor->sortBy('Label_Utama') as $item)
                <option value="{{ $item->id }}">{{ $item->Label_Utama }} - {{ $item->Label }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Lama Usaha<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <input type="number" class="form-control" placeholder="Lama Usaha" name="LAMA_USAHA" required>
                <div class="input-group-append">
                    <span class="input-group-text">Bulan</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jabatan </label></div>
        <div class="col-sm-8"><input type="text" name="JABATAN" placeholder="Jabatan" class="form-control"
                style="width: 300px; height: 30px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Tanggungan</label></div>
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
                <input type="text" class="form-control number-separator" placeholder="Income Bulan" name="INCOME_BULAN" required>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Spouse Income Bulan</label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control number-separator" placeholder="Spouse Income Bulan"
                    name="SUPOUSE_INCOME_BULAN">
            </div>
        </div>
    </div>

    <h5 class="pb-3">Rekening Koran 3 Bulan Terakhir</h5>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Rekening Bulan 1 </label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control number-separator" placeholder="Rekening Bulan 1"
                    name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1">
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Rekening Bulan 2 </label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control number-separator" placeholder="Rekening Bulan 2"
                    name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2">
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Rekening Bulan 3 </label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control number-separator" placeholder="Rekening Bulan 3"
                    name="REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3">
            </div>
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
        <div class="col-sm-8"><input type="text" name="Perusahaan_Asuransi" placeholder="Perusahaan Asuransi"
                class="form-control" style="width: 300px; height: 30px;" required></div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Persen Asuransi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <input type="text" class="form-control" required placeholder="Persen Asuransi" name="Persen_Asuransi">
                <div class="input-group-append">
                    <span class="input-group-text">%</span>
                </div>
            </div>
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
        <div class="col-sm-4"><label>Jaminan Sertifikat Tanah </label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" required onchange="checkTNH(this)" name="Jaminan_Sertifikat_Tanah"
                    class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" required onchange="checkTNH(this)" name="Jaminan_Sertifikat_Tanah"
                    class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Sertifikat Tanah</label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input id="tanah" type="text" class="form-control number-separator" placeholder="Nilai Sertifikat Tanah"
                    name="Nilai_Sertifikat_Tanah">
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Kendaraan Mobil </label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" required onchange="checkMBL(this)" name="Jaminan_Kendaraan_Bermotor_Mobil"
                    class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" required onchange="checkMBL(this)" name="Jaminan_Kendaraan_Bermotor_Mobil"
                    class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Kendaraan Mobil</label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input id="mobil" type="text" class="form-control number-separator" placeholder="Nilai Kendaraan Mobil"
                    name="Nilai_Kendaraan_Bermotor_Mobil">
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Kendaraan Motor </label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" required name="Jaminan_Kendaraan_Bermotor_Motor"
                    class="form-control" onchange="checkMTR(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" required name="Jaminan_Kendaraan_Bermotor_Motor"
                    class="form-control" onchange="checkMTR(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Kendaraan Motor</label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input id="motor" type="text" class="form-control number-separator" placeholder="Nilai Kendaraan Motor"
                    name="Nilai_Kendaraan_Bermotor_Motor">
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Personal Guarantee </label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" required name="Jaminan_Personel_Guarantee"
                    class="form-control" onchange="checkPG(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" required name="Jaminan_Personel_Guarantee"
                    class="form-control" onchange="checkPG(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Personal Guarantee</label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" id="personal" class="form-control number-separator" placeholder="Nilai Personal Guarantee"
                    name="Nilai_Personel_Guarantee">
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Invoice </label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" required name="Jaminan_Invoice" class="form-control" onchange="checkIVC(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" required name="Jaminan_Invoice" class="form-control" onchange="checkIVC(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Invoice</label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control number-separator" id="invoice" placeholder="Nilai Invoice"
                    name="Nilai_Invoice">
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Inventory </label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" required name="Jaminan_Inventory" class="form-control" onchange="checkINVN(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" required name="Jaminan_Inventory" class="form-control" onchange="checkINVN(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Inventory</label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" id="inventory" class="form-control number-separator" placeholder="Nilai Inventory"
                    name="Nilai_Inventory">
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Lainnya </label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" required name="Jaminan_Lainnya" class="form-control" onchange="checkJL(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" required name="Jaminan_Lainnya" class="form-control" onchange="checkJL(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Jaminan Lainnya</label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control number-separator" id="nilai_jl" placeholder="Nilai Jaminan Lainnya"
                    name="Nilai_Jaminan_Lainnya">
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Down Payment </label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" required name="APAKAH_ADA_DP" class="form-control" onchange="checkDP(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" required name="APAKAH_ADA_DP" class="form-control" onchange="checkDP(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jumlah Down Payment <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control number-separator" id="dp" placeholder="Jumlah Down Payment"
                    name="DOWN_PAYMENT_CUSTOMER">
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
<script type="text/javascript">
    function checkDP(obj) 
    {
        var dp = document.getElementById("dp");
        dp.disabled = obj.value == "TIDAK";
    }

    function checkJL(obj)
    {
        var nilai_jl = document.getElementById("nilai_jl");
        nilai_jl.disabled = obj.value == "TIDAK";
    }
    
    function checkINVN(obj)
    {
        var inventory = document.getElementById("inventory");
        inventory.disabled = obj.value == "TIDAK";
    }

    function checkIVC(obj)
    {
        var invoice = document.getElementById("invoice");
        invoice.disabled = obj.value == "TIDAK";
    }

    function checkPG(obj)
    {
        var personal = document.getElementById("personal");
        personal.disabled = obj.value == "TIDAK";
    }

    function checkMTR(obj)
    {
        var motor = document.getElementById("motor");
        motor.disabled = obj.value == "TIDAK";
    }

    function checkMBL(obj)
    {
        var mobil = document.getElementById("mobil");
        mobil.disabled = obj.value == "TIDAK";
    }

    function checkTNH(obj)
    {
        var tanah = document.getElementById("tanah");
        tanah.disabled = obj.value == "TIDAK";
    }

</script>
@endsection
