@extends('layout.layout')
@section('title')
Debitur Badan Usaha
@endsection

@section('subtitle')
Edit
@endsection

@section('page')
<a href="{{ url('debitur_badan_usaha') }}">Debitur Badan Usaha</a>
@endsection

@section('content')
<form action="{{ url('debitur_badan_usaha', $deb->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Perusahaan Partner</label></div>
        <div class="col-sm-8">
            <select name="PARTNER_ID" class="form-control py-0" style="width: 300px; height: 30px;">
                <option value="{{ $deb->PARTNER_ID }}">{{ $deb->partner->NAMA_PERUSAHAAN }}</option>
                @foreach ($partner as $item)
                    <option value="{{ $item->id }}"> {{ $item->NAMA_PERUSAHAAN }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Perusahaan</label></div>
        <div class="col-sm-8">
            <input type="text" name="NAMA_PERUSAHAAN" value="{{ $deb->NAMA_PERUSAHAAN }}" class="form-control"  style="width: 300px; height: 30px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Perusahaan</label></div>
        <div class="col-sm-8">
            <textarea name="ALAMAT_PERUSAHAAN" style="width: 300px; height: 100px;" class="form-control" cols="40"
                rows="10">{{ $deb->ALAMAT_PERUSAHAAN }}</textarea>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status Badan Hukum</label></div>
        <div class="col-sm-4 row pl-3">
            <div class="d-flex">
                <input type="radio" value="PT" {{ ($deb->STATUS_BADAN_HUKUM == 'PT')? "checked" : "" }} style="width: 15px" name="STATUS_BADAN_HUKUM" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">PT</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="CV" {{ ($deb->STATUS_BADAN_HUKUM == 'CV')? "checked" : "" }} style="width: 15px" name="STATUS_BADAN_HUKUM" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">CV</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="Firma" {{ ($deb->STATUS_BADAN_HUKUM == 'Firma')? "checked" : "" }} style="width: 15px" name="STATUS_BADAN_HUKUM" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Firma</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="Lainnya" {{ ($deb->STATUS_BADAN_HUKUM == 'Lainnya')? "checked" : "" }} style="width: 15px" name="STATUS_BADAN_HUKUM" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Lainnya</p>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Akta Pendirian  <span class="text-danger">*</span></div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="AKTE_PENDIRIAN">
                <label class="custom-file-label">{{ $deb->AKTE_PENDIRIAN }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Company Profile</label></div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="COMPANY_PROFILE">
                <label class="custom-file-label">{{ $deb->COMPANY_PROFILE }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Akta Lain-Lain</label></div>   
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="AKTE_LAIN_LAIN[]" multiple>
                <label class="custom-file-label">
                    @if ($deb->AKTE_LAIN_LAIN != NULL)
                        @foreach (json_decode($deb->AKTE_LAIN_LAIN) as $item)
                            {{ $item }},
                        @endforeach
                    @endif
                </label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Detail Product <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select class="form-control" name="DETIL_PRODUCT_PROFILE"  style="width: 300px; height: 30px;">
                <option value="{{ $deb->DETIL_PRODUCT_PROFILE }}">{{ $deb->detil_product->id_master_product }} - {{ $deb->detil_product->nama_product }}</option>
                @foreach ($m_prod as $item)
                <option value="{{ $item->id }}">{{ $item->id_master_product }} - {{ $item->nama_product }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Akta Perubahan Anggaran Dasar</label></div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="AKTE_PERUBAHAN_ANGGARAN_DASAR">
                <label class="custom-file-label">{{ $deb->AKTE_PERUBAHAN_ANGGARAN_DASAR }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>SIUP / NIB</label></div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="SIUP">
                <label class="custom-file-label">{{ $deb->SIUP }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>TDP</label></div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
        <input type="file" class="custom-file-input"  name="TDP">
                <label class="custom-file-label">{{ $deb->TDP }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>NPWP</label></div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="NPWP">
                <label class="custom-file-label">{{ $deb->NPWP }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur Utama</label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur_Utama" value="{{ $deb->Nama_Direktur_Utama }}" class="form-control"  style="width: 300px; height: 30px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur Utama</label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Identitas_Direktur_Utama" value="{{ $deb->No_Identitas_Direktur_Utama }}" class="form-control"
                 style="width: 300px; height: 30px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur 1</label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur1" class="form-control" value="{{ $deb->Nama_Direktur1 }}"  style="width: 300px; height: 30px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur 1</label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Identitas_Direktur1" value="{{ $deb->No_Identitas_Direktur1 }}" class="form-control"  style="width: 300px; height: 30px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur 2</label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur_2" value="{{ $deb->Nama_Direktur_2 }}" class="form-control"  style="width: 300px; height: 30px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur 2</label></div>
        <div class="col-sm-8">
            <input type="text" name="No_Identitas_Direktur2" value="{{ $deb->No_Identitas_Direktur2 }}" class="form-control"  style="width: 300px; height: 30px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Modal Pendirian</label></div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="MODAL_PENDIRIAN">
                <label class="custom-file-label">{{ $deb->MODAL_PENDIRIAN }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Modal Perubahan Terakhir</label></div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="MODAL_PERUBAHAN_TERAKHIR">
                <label class="custom-file-label">{{ $deb->MODAL_PERUBAHAN_TERAKHIR }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Audited Financial Statement Last 2 Years</label>
        </div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS">
                <label class="custom-file-label">{{ $deb->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>In House Financial Statement Current Year <span
                    class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR">
                <label class="custom-file-label">{{ $deb->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Bank Statement Last 3 Years</label></div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="BANK_STATEMENT_LAST_3_MONTHS[]" multiple>
                <label class="custom-file-label">
                    @if ($deb->BANK_STATEMENT_LAST_3_MONTHS != NULL)
                        @foreach (json_decode($deb->BANK_STATEMENT_LAST_3_MONTHS) as $item)
                            {{ $item }},
                        @endforeach
                    @endif
                </label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Financial Projection For Next 3-5 Years</label>
        </div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS">
                <label class="custom-file-label">{{ $deb->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Draft Template Agree End User</label></div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="DRAFT_TEMPLATE_AGREEMENT_END_USER">
                <label class="custom-file-label">{{ $deb->DRAFT_TEMPLATE_AGREEMENT_END_USER }}</label>
            </div>
            @error('DRAFT_TEMPLATE_AGREEMENT_END_USER')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Contoh Risk Acceptance Criteria</label></div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input" name="CONTOH_RISK_ACCEPTANCE_CRITERIA">
                <label class="custom-file-label">{{ $deb->CONTOH_RISK_ACCEPTANCE_CRITERIA }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>NDA Document</label></div>
        <div class="col-sm-8">
            <div class="custom-file"  style="width: 300px; height: 30px;">
                <input type="file" class="custom-file-input"  name="NDA_DOCUMENT">
                <label class="custom-file-label">{{ $deb->NDA_DOCUMENT }}</label>
            </div>
        </div>
    </div>

    <h5 class="pb-3">Asuransi</h5>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jenis Asuransi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div>
                <select class="form-control py-0" name="Jenis_Asuransi_Id"  style="width: 300px; height: 30px;">
                    <option value="{{ $deb->Jenis_Asuransi_Id }}">{{ $deb->asuransi->Jenis_Asuransi }}
                    </option>
                    @foreach ($asuransi as $item)
                        <option value="{{ $item->id }}">{{ $item->Jenis_Asuransi }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Perusahaan Asuransi</label></div>
        <div class="col-sm-8"><input value="{{ $deb->Perusahaan_Asuransi }}" type="text" 
                name="Perusahaan_Asuransi" class="form-control"  style="width: 300px; height: 30px;"></div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Persen Asuransi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div class="input-group"  style="width: 300px; height: 30px;">
                <input type="text" class="form-control" value="{{ $deb->Persen_Asuransi }}"
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
            @if ($deb->Nilai_Asuransi != null)
                <div class="input-group"  style="width: 300px; height: 30px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" class="form-control number-separator"
                        value="{{ number_format($deb->Nilai_Asuransi) }}" 
                        name="Nilai_Asuransi">
                </div>
            @else
                <div class="input-group"  style="width: 300px; height: 30px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" class="form-control number-separator"
                        value="{{ $deb->Nilai_Asuransi }}"  name="Nilai_Asuransi">
                </div>
            @endif
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
                <input type="radio" value="ADA" {{ $deb->Jaminan_Sertifikat_Tanah == 'ADA' ? 'checked' : '' }} onchange="checkTNH(this)"
                    style="width: 15px" name="Jaminan_Sertifikat_Tanah" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" {{ $deb->Jaminan_Sertifikat_Tanah == 'TIDAK' ? 'checked' : '' }} onchange="checkTNH(this)"
                    style="width: 15px" name="Jaminan_Sertifikat_Tanah" class="form-control number-separator">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Sertifikat Tanah</label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Sertifikat_Tanah != null)
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" {{ $deb->Jaminan_Sertifikat_Tanah == 'TIDAK' ? 'disabled' : '' }} id="tanah" class="form-control number-separator"
                        value="{{ number_format($deb->Nilai_Sertifikat_Tanah) }}" name="Nilai_Sertifikat_Tanah">
                </div>
            @else
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" {{ $deb->Jaminan_Sertifikat_Tanah == 'TIDAK' ? 'disabled' : '' }} id="tanah" class="form-control number-separator"
                        value="{{ $deb->Nilai_Sertifikat_Tanah }}" 
                        name="Nilai_Sertifikat_Tanah">
                </div>
            @endif

        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Kendaraan Mobil</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" {{ $deb->Jaminan_Kendaraan_Bermotor_Mobil == 'ADA' ? 'checked' : '' }} onchange="checkMBL(this)"
                    style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Mobil" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" {{ $deb->Jaminan_Kendaraan_Bermotor_Mobil == 'TIDAK' ? 'checked' : '' }} onchange="checkMBL(this)"
                    style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Mobil" class="form-control number-separator">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Kendaraan Mobil</label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Kendaraan_Bermotor_Mobil != null)
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" {{ $deb->Jaminan_Kendaraan_Bermotor_Mobil == 'TIDAK' ? 'disabled' : '' }} class="form-control number-separator"
                        value="{{ number_format($deb->Nilai_Kendaraan_Bermotor_Mobil) }}" id="mobil" name="Nilai_Kendaraan_Bermotor_Mobil">
                </div>
            @else
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" {{ $deb->Jaminan_Kendaraan_Bermotor_Mobil == 'TIDAK' ? 'disabled' : '' }} class="form-control number-separator"
                        value="{{ $deb->Nilai_Kendaraan_Bermotor_Mobil }}"  id="mobil"
                        name="Nilai_Kendaraan_Bermotor_Mobil">
                </div>
            @endif

        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Kendaraan Motor</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" {{ $deb->Jaminan_Kendaraan_Bermotor_Motor == 'ADA' ? 'checked' : '' }} onchange="checkMTR(this)"
                    style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Motor" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" {{ $deb->Jaminan_Kendaraan_Bermotor_Motor == 'TIDAK' ? 'checked' : '' }} onchange="checkMTR(this)"
                    style="width: 15px" name="Jaminan_Kendaraan_Bermotor_Motor" class="form-control number-separator">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Kendaraan Motor<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Kendaraan_Bermotor_Motor != null)
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" {{ $deb->Jaminan_Kendaraan_Bermotor_Motor == 'TIDAK' ? 'disabled' : '' }} id="motor" class="form-control number-separator"
                        value="{{ number_format($deb->Nilai_Kendaraan_Bermotor_Motor) }}" name="Nilai_Kendaraan_Bermotor_Motor">
                </div>
            @else
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" {{ $deb->Jaminan_Kendaraan_Bermotor_Motor == 'TIDAK' ? 'disabled' : '' }} id="motor" class="form-control number-separator"
                        value="{{ $deb->Nilai_Kendaraan_Bermotor_Motor }}" 
                        name="Nilai_Kendaraan_Bermotor_Motor">
                </div>
            @endif

        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Personal Guarantee</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" {{ $deb->Jaminan_Personel_Guarantee == 'ADA' ? 'checked' : '' }} onchange="checkPG(this)"
                    style="width: 15px" name="Jaminan_Personel_Guarantee" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" {{ $deb->Jaminan_Personel_Guarantee == 'TIDAK' ? 'checked' : '' }} onchange="checkPG(this)"
                    style="width: 15px" name="Jaminan_Personel_Guarantee" class="form-control number-separator">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Personal Guarantee</label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Personel_Guarantee != null)
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" {{ $deb->Jaminan_Personel_Guarantee == 'TIDAK' ? 'disabled' : '' }} class="form-control number-separator"
                        value="{{ number_format($deb->Nilai_Personel_Guarantee) }}" id="personal" name="Nilai_Personel_Guarantee">
                </div>
            @else
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" {{ $deb->Jaminan_Personel_Guarantee == 'TIDAK' ? 'disabled' : '' }} id="personal" class="form-control number-separator"
                        value="{{ $deb->Nilai_Personel_Guarantee }}" 
                        name="Nilai_Personel_Guarantee">
                </div>
            @endif

        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Invoice</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" {{ $deb->Jaminan_Invoice == 'ADA' ? 'checked' : '' }}
                    style="width: 15px" name="Jaminan_Invoice" class="form-control" onchange="checkIVC(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" {{ $deb->Jaminan_Invoice == 'TIDAK' ? 'checked' : '' }}
                    style="width: 15px" name="Jaminan_Invoice" class="form-control number-separator" onchange="checkIVC(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Invoice</label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Invoice != null)
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" {{ $deb->Jaminan_Invoice == 'TIDAK' ? 'disabled' : '' }} id="invoice" class="form-control number-separator"
                        value="{{ number_format($deb->Nilai_Invoice) }}" name="Nilai_Invoice">
                </div>
            @else
                <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                    <input type="text" {{ $deb->Jaminan_Invoice == 'TIDAK' ? 'disabled' : '' }} id="invoice" class="form-control number-separator"
                        value="{{ $deb->Nilai_Invoice }}" 
                        name="Nilai_Invoice">
                </div>
            @endif

        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Inventory</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" {{ $deb->Jaminan_Inventory == 'ADA' ? 'checked' : '' }}
                    style="width: 15px" name="Jaminan_Inventory" class="form-control" onchange="checkINVN(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" {{ $deb->Jaminan_Inventory == 'TIDAK' ? 'checked' : '' }}
                    style="width: 15px" name="Jaminan_Inventory" class="form-control" onchange="checkINVN(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Inventory</label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Inventory != null)
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" {{ $deb->Jaminan_Inventory == 'TIDAK' ? 'disabled' : '' }} id="inventory" class="form-control number-separator"
                    value="{{ number_format($deb->Nilai_Inventory) }}" name="Nilai_Inventory">
            </div>
        @else
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" {{ $deb->Jaminan_Inventory == 'TIDAK' ? 'disabled' : '' }} id="inventory" class="form-control number-separator"
                    value="{{ $deb->Nilai_Inventory }}" 
                    name="Nilai_Inventory">
            </div>
        @endif
            @error('Nilai_Inventory')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Lainnya</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" {{ $deb->Jaminan_Lainnya == 'ADA' ? 'checked' : '' }}
                    style="width: 15px" name="Jaminan_Lainnya" class="form-control" onchange="checkJL(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" {{ $deb->Jaminan_Lainnya == 'TIDAK' ? 'checked' : '' }}
                    style="width: 15px" name="Jaminan_Lainnya" class="form-control number-separator" onchange="checkJL(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak Ada</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Jaminan Lainnya</label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Jaminan_Lainnya != null)
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control number-separator"
                    value="{{ number_format($deb->Nilai_Jaminan_Lainnya) }}" id="nilai_jl" name="Nilai_Jaminan_Lainnya" {{ $deb->Jaminan_Lainnya == 'TIDAK' ? 'disabled' : '' }}>
            </div>
        @else
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control number-separator" {{ $deb->Jaminan_Lainnya == 'TIDAK' ? 'disabled' : '' }} id="nilai_jl"
                    name="Nilai_Jaminan_Lainnya">
            </div>
        @endif
            @error('Nilai_Jaminan_Lainnya')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Down Payment</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="ADA" {{ $deb->APAKAH_ADA_DP == 'ADA' ? 'checked' : '' }} style="width: 15px" name="APAKAH_ADA_DP" class="form-control" onchange="checkDP(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Ada</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="TIDAK" {{ $deb->APAKAH_ADA_DP == 'TIDAK' ? 'checked' : '' }} style="width: 15px" name="APAKAH_ADA_DP" class="form-control number-separator" onchange="checkDP(this)">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
            </div>
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Jumlah Down Payment</label></div>
        <div class="col-sm-8">
            @if ($deb->DOWN_PAYMENT_CUSTOMER != null)
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" value="{{ number_format($deb->DOWN_PAYMENT_CUSTOMER) }}" {{ $deb->APAKAH_ADA_DP == 'TIDAK' ? 'disabled' : '' }} class="form-control number-separator" id="dp"
                    name="DOWN_PAYMENT_CUSTOMER">
            </div>
            @else
            <div class="input-group" style="width: 300px; height: 38px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="text" value="{{ $deb->DOWN_PAYMENT_CUSTOMER }}" {{ $deb->APAKAH_ADA_DP == 'TIDAK' ? 'disabled' : '' }} class="form-control number-separator" id="dp"
                    name="DOWN_PAYMENT_CUSTOMER">
            </div>
            @endif
        </div>
    </div>

    <div class="row pb-3">
        <div class="col-sm-4"><label>Status</label></div>
        <div class="col-sm-8">
            <select name="Status" class="form-control py-0"  style="width: 300px; height: 30px;">
                <option value="{{ $deb->Status }}">{{ $deb->Status }}</option>
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
            <button class="btn btn-warning text-white" type="submit">Edit</button>
            <a href="{{ url('debitur_badan_usaha') }}" class="btn btn-default">Cancel</a>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
                Update As Draft
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
                        <button type="submit" class="btn btn-primary">Save Changes</button>
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
