@extends('layout.layout')
@section('title')
Debitur Badan Usaha
@endsection

@section('subtitle')
Add
@endsection

@section('page')
<a href="{{ url('debitur_badan_usaha') }}">Debitur Badan Usaha</a>
@endsection

@section('content')
<form action="{{ url('debitur_badan_usaha') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Partner ID<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select name="PARTNER_ID" class="form-control" style="width: 300px; height: 38px;" required>
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
        <div class="col-sm-4"><label>Nama Perusahaan </label></div>
        <div class="col-sm-8">
            <input type="text" name="NAMA_PERUSAHAAN" class="form-control" placeholder="Nama Perusahaan" style="width: 300px; height: 38px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Perusahaan </label></div>
        <div class="col-sm-8">
            <textarea name="ALAMAT_PERUSAHAAN" style="width: 300px; height: 100px;" placeholder="Alamat Perusahaan" class="form-control" cols="30"
                rows="10"></textarea>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status Badan Hukum </label></div>
        <div class="col-sm-4 row pl-3">
            <div class="d-flex">
                <input type="radio" value="PT" style="width: 15px" name="STATUS_BADAN_HUKUM" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">PT</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="CV" style="width: 15px" name="STATUS_BADAN_HUKUM" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">CV</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="Firma" style="width: 15px" name="STATUS_BADAN_HUKUM" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Firma</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="Lainnya" style="width: 15px" name="STATUS_BADAN_HUKUM" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Lainnya</p>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Akta Pendirian <span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="AKTE_PENDIRIAN">
                <label class="custom-file-label">Choose file</label>
            </div>
            @error('AKTE_PENDIRIAN')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Company Profile </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="COMPANY_PROFILE">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Akta Lain Lain </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="AKTE_LAIN_LAIN[]" multiple>
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Detail Nama Product <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <select class="form-control py-0" required name="DETIL_PRODUCT_PROFILE" required>
                    <option></option>
                    @foreach ($prod as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_product }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Akta Perubahan Anggaran Dasar </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="AKTE_PERUBAHAN_ANGGARAN_DASAR">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>SIUP / NIB </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="SIUP">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>TDP </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="TDP">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>NPWP </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="NPWP">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur Utama </label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur_Utama" class="form-control" placeholder="Nama Direktur Utama" style="width: 300px; height: 38px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur Utama </label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Identitas_Direktur_Utama" placeholder="Nomor Identitas Direktur Utama" class="form-control"
                style="width: 300px; height: 38px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur 1 </label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur1" class="form-control" placeholder="Nama Direktur 1" style="width: 300px; height: 38px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur 1 </label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Identitas_Direktur1" class="form-control" placeholder="Nomor Identitas Direktur 1" style="width: 300px; height: 38px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur 2 </label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur_2" class="form-control" placeholder="Nama Direktur 2" style="width: 300px; height: 38px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur 2 </label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Identitas_Direktur2" class="form-control" placeholder="Nomor Identitas Direktur 2" style="width: 300px; height: 38px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Modal Pendirian </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="MODAL_PENDIRIAN">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Modal Perubahan Terakhir </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="MODAL_PERUBAHAN_TERAKHIR">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Audited Financial Statement Last 2 Years </label>
        </div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>In House Financial Statement Current Year</label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Bank Statement Last 3 Years </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="BANK_STATEMENT_LAST_3_MONTHS[]" multiple>
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Financial Projection For Next 3-5 Years </label>
        </div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Draft Template Agreement End User </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="DRAFT_TEMPLATE_AGREEMENT_END_USER">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Contoh Risk Acceptance Criteria </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="CONTOH_RISK_ACCEPTANCE_CRITERIA">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>NDA Document </label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" name="NDA_DOCUMENT">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>

    <h5 class="pb-3">Asuransi</h5>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jenis Asuransi <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div style="width: 300px; height: 38px;">
                <select class="form-control py-0" name="Jenis_Asuransi_Id" required style="width: 300px; height: 38px;">
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
                style="width: 300px; height: 38px;"></div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Persen Asuransi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                <input type="text" class="form-control"
                    name="Persen_Asuransi">
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
                <input type="radio" value="ADA" style="width: 15px" onchange="checkTNH(this)" name="Jaminan_Sertifikat_Tanah"
                    class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" onchange="checkTNH(this)" name="Jaminan_Sertifikat_Tanah"
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
        <div class="col-sm-4"><label>Jaminan Kendaraan Mobil</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" onchange="checkMBL(this)" name="Jaminan_Kendaraan_Bermotor_Mobil"
                    class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" onchange="checkMBL(this)" name="Jaminan_Kendaraan_Bermotor_Mobil"
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
        <div class="col-sm-4"><label>Jaminan Kendaraan Motor</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Motor"
                    class="form-control" onchange="checkMTR(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Motor"
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
        <div class="col-sm-4"><label>Jaminan Personal Guarantee</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" name="Jaminan_Personel_Guarantee"
                    class="form-control" onchange="checkPG(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" name="Jaminan_Personel_Guarantee"
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
        <div class="col-sm-4"><label>Jaminan Invoice</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" name="Jaminan_Invoice" class="form-control" onchange="checkIVC(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" name="Jaminan_Invoice" class="form-control" onchange="checkIVC(this)">
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
        <div class="col-sm-4"><label>Jaminan Inventory</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" name="Jaminan_Inventory" class="form-control" onchange="checkINVN(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" name="Jaminan_Inventory" class="form-control" onchange="checkINVN(this)">
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
        <div class="col-sm-4"><label>Jaminan Lainnya</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" name="Jaminan_Lainnya" class="form-control" onchange="checkJL(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" name="Jaminan_Lainnya" class="form-control" onchange="checkJL(this)">
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
        <div class="col-sm-4"><label>Pengajuan Lain Lain <span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 300px; height: 38px;">
                <input type="file" class="custom-file-input" required multiple name="PENGAJUAN_LAIN_LAIN[]">
                <label class="custom-file-label">Choose file</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Down Payment</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" style="width: 15px" name="APAKAH_ADA_DP" class="form-control" onchange="checkDP(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ya</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" style="width: 15px" name="APAKAH_ADA_DP" class="form-control" onchange="checkDP(this)">
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
                <input type="text" class="form-control number-separator" id="dp" placeholder="Jumlah Down Payment"
                    name="DOWN_PAYMENT_CUSTOMER">
            </div>
            @error('DOWN_PAYMENT_CUSTOMER')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Status</label></div>
        <div class="col-sm-8">
            <select name="Status" class="form-control py-0" style="width: 300px; height: 38px;">
                <option></option>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                <option value="Reject">Reject</option>
                <option value="Draft">Draft</option>
            </select>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <button class="btn btn-primary" type="submit">Add</button>
            <a href="{{ url('debitur_badan_usaha') }}" class="btn btn-default">Cancel</a>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
                Save As Draft
            </button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body py-5">
                <center>
                        <h5>Data Akan Disimpan Sebagai <span style="font-style: italic">Draft</span></h5>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                </center>
            </div>
        </div>
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
