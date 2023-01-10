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
    @method('PUT')<div class="row pb-3">
        <div class="col-sm-4"><label>Nama Perusahaan</label></div>
        <div class="col-sm-8">
            <input type="text" name="NAMA_PERUSAHAAN" value="{{ $deb->NAMA_PERUSAHAAN }}" class="form-control" style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Alamat Perusahaan</label></div>
        <div class="col-sm-8">
            <textarea name="ALAMAT_PERUSAHAAN" style="width: 500px; height: 100px;" class="form-control" cols="30"
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
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="AKTE_PENDIRIAN">
                <label class="custom-file-label">{{ $deb->AKTE_PENDIRIAN }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Company Profile</label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="COMPANY_PROFILE">
                <label class="custom-file-label">{{ $deb->COMPANY_PROFILE }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Akta Lain Lain</label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="AKTE_LAIN_LAIN">
                <label class="custom-file-label">{{ $deb->AKTE_LAIN_LAIN }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Detail Product <span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <select class="form-control" name="DETIL_PRODUCT_PROFILE" style="width: 500px; height: 40px;">
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
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="AKTE_PERUBAHAN_ANGGARAN_DASAR">
                <label class="custom-file-label">{{ $deb->AKTE_PERUBAHAN_ANGGARAN_DASAR }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>SIUP</label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="SIUP">
                <label class="custom-file-label">{{ $deb->SIUP }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>TDP</label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
        <input type="file" class="custom-file-input"  name="TDP">
                <label class="custom-file-label">{{ $deb->TDP }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>NPWP</label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="NPWP">
                <label class="custom-file-label">{{ $deb->NPWP }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur Utama</label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur_Utama" value="{{ $deb->Nama_Direktur_Utama }}" class="form-control" style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur Utama</label></div>
        <div class="col-sm-8">
            <input type="number" name="No_Identitas_Direktur_Utama" value="{{ $deb->No_Identitas_Direktur_Utama }}" class="form-control"
                style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur 1</label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur1" class="form-control" value="{{ $deb->Nama_Direktur1 }}" style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur 1</label></div>
        <div class="col-sm-8">
            <input type="number" name="No_Identitas_Direktur1" value="{{ $deb->No_Identitas_Direktur1 }}" class="form-control" style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nama Direktur 2</label></div>
        <div class="col-sm-8">
            <input type="text" name="Nama_Direktur_2" value="{{ $deb->Nama_Direktur_2 }}" class="form-control" style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nomor Identitas Direktur 2</label></div>
        <div class="col-sm-8">
            <input type="number" name="No_Identitas_Direktur2" value="{{ $deb->No_Identitas_Direktur2 }}" class="form-control" style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Modal Pendirian</label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="MODAL_PENDIRIAN">
                <label class="custom-file-label">{{ $deb->MODAL_PENDIRIAN }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Modal Perubahan Terakhir</label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="MODAL_PERUBAHAN_TERAKHIR">
                <label class="custom-file-label">{{ $deb->MODAL_PERUBAHAN_TERAKHIR }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Audited Financial Statement Last 2 Years</label>
        </div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS">
                <label class="custom-file-label">{{ $deb->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>In House Financial Statement Current Year <span
                    class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR">
                <label class="custom-file-label">{{ $deb->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Bank Statement Last 3 Years</label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="BANK_STATEMENT_LAST_3_MONTHS">
                <label class="custom-file-label">{{ $deb->BANK_STATEMENT_LAST_3_MONTHS }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Financial Projection For Next 3-5 Years</label>
        </div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS">
                <label class="custom-file-label">{{ $deb->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Draft Template Agree End User</label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
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
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input" name="CONTOH_RISK_ACCEPTANCE_CRITERIA">
                <label class="custom-file-label">{{ $deb->CONTOH_RISK_ACCEPTANCE_CRITERIA }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>NDA Document</label></div>
        <div class="col-sm-8">
            <div class="custom-file" style="width: 500px; height: 40px; cursor: pointer;">
                <input type="file" class="custom-file-input"  name="NDA_DOCUMENT">
                <label class="custom-file-label">{{ $deb->NDA_DOCUMENT }}</label>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jenis Asuransi<span class="text-danger">*</span></label></div>
        <div class="col-sm-8">
            <div style="width: 300px; height: 38px;">
                <select class="form-control py-0" name="Jenis_Asuransi_Id" style="width: 500px; height: 40px;">
                    <option value="{{ $deb->Jenis_Asuransi_Id }}">{{ $deb->asuransi->Jenis_Asuransi }}</option>
                    @foreach ($asuransi as $item)
                    <option value="{{ $item->id }}">{{ $item->Jenis_Asuransi }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Perusahaan Asuransi</label></div>
        <div class="col-sm-8"><input value="{{ $deb->Perusahaan_Asuransi }}" type="text" name="Perusahaan_Asuransi"
                class="form-control" style="width: 500px; height: 40px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Persen Asuransi</label></div>
        <div class="col-sm-8"><input value="{{ $deb->Persen_Asuransi }}" type="number" name="Persen_Asuransi"
                class="form-control" style="width: 500px; height: 40px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Asuransi</label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Asuransi != NULL)
            <input value="{{ number_format($deb->Nilai_Asuransi) }}" type="text" name="Nilai_Asuransi"
                class="form-control number-separator" style="width: 500px; height: 40px;">
            @else
            <input value="{{ $deb->Nilai_Asuransi }}" type="text" name="Nilai_Asuransi"
                class="form-control number-separator" style="width: 500px; height: 40px;">
            @endif
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Sertifikat Tanah</label></div>
        <div class="col-sm-8"><input value="{{ $deb->Jaminan_Sertifikat_Tanah }}" type="text"
                name="Jaminan_Sertifikat_Tanah" class="form-control" style="width: 500px; height: 40px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Sertifikat Tanah</label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Sertifikat_Tanah)
            <input value="{{ number_format($deb->Nilai_Sertifikat_Tanah) }}" type="text"
                name="Nilai_Sertifikat_Tanah" class="form-control number-separator" style="width: 500px; height: 40px;">
            @else
            <input value="{{ $deb->Nilai_Sertifikat_Tanah }}" type="text" name="Nilai_Sertifikat_Tanah"
                class="form-control number-separator" style="width: 500px; height: 40px;">
            @endif
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Kendaraan Mobil</label></div>
        <div class="col-sm-8"><input value="{{ $deb->Jaminan_Kendaraan_Bermotor_Mobil }}" type="text"
                name="Jaminan_Kendaraan_Bermotor_Mobil" class="form-control" style="width: 500px; height: 40px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Kendaraan Mobil</label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Kendaraan_Bermotor_Mobil != NULL)
            <input value="{{ number_format($deb->Nilai_Kendaraan_Bermotor_Mobil) }}" type="text"
                name="Nilai_Kendaraan_Bermotor_Mobil" class="form-control number-separator"
                style="width: 500px; height: 40px;">
            @else
            <input value="{{ $deb->Nilai_Kendaraan_Bermotor_Mobil }}" type="text"
                name="Nilai_Kendaraan_Bermotor_Mobil" class="form-control number-separator"
                style="width: 500px; height: 40px;">
            @endif
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Kendaraan Motor</label></div>
        <div class="col-sm-8"><input value="{{ $deb->Jaminan_Kendaraan_Bermotor_Motor }}" type="text"
                name="Jaminan_Kendaraan_Bermotor_Motor" class="form-control" style="width: 500px; height: 40px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Kendaraan Motor</label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Kendaraan_Bermotor_Motor)
            <input value="{{ number_format($deb->Nilai_Kendaraan_Bermotor_Motor) }}" type="text"
                name="Nilai_Kendaraan_Bermotor_Motor" class="form-control number-separator"
                style="width: 500px; height: 40px;">
            @else
            <input value="{{ $deb->Nilai_Kendaraan_Bermotor_Motor }}" type="text"
                name="Nilai_Kendaraan_Bermotor_Motor" class="form-control number-separator"
                style="width: 500px; height: 40px;">
            @endif
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Personal Guarantee</label></div>
        <div class="col-sm-8"><input value="{{ $deb->Jaminan_Personel_Guarantee }}" type="text"
                name="Jaminan_Personel_Guarantee" class="form-control" style="width: 500px; height: 40px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Personal Guarantee</label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Personel_Guarantee)
            <input value="{{ number_format($deb->Nilai_Personel_Guarantee) }}" type="text"
                name="Nilai_Personel_Guarantee" class="form-control number-separator"
                style="width: 500px; height: 40px;">
            @else
            <input value="{{ $deb->Nilai_Personel_Guarantee }}" type="text" name="Nilai_Personel_Guarantee"
                class="form-control number-separator" style="width: 500px; height: 40px;">
            @endif
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Invoice</label></div>
        <div class="col-sm-8"><input value="{{ $deb->Jaminan_Invoice }}" type="text" name="Jaminan_Invoice"
                class="form-control" style="width: 500px; height: 40px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Invoice</label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Invoice != NULL)
            <input value="{{ number_format($deb->Nilai_Invoice) }}" type="text" name="Nilai_Invoice"
                class="form-control number-separator" style="width: 500px; height: 40px;">
            @else
            <input value="{{ $deb->Nilai_Invoice }}" type="text" name="Nilai_Invoice"
                class="form-control number-separator" style="width: 500px; height: 40px;">
            @endif
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Inventori</label></div>
        <div class="col-sm-8"><input value="{{ $deb->Jaminan_Inventory }}" type="text" name="Jaminan_Inventory"
                class="form-control" style="width: 500px; height: 40px;"></div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Nilai Inventori</label></div>
        <div class="col-sm-8">
            @if ($deb->Nilai_Inventory != NULL)
            <input value="{{ number_format($deb->Nilai_Inventory) }}" type="text" name="Nilai_Inventory"
                class="form-control number-separator" style="width: 500px; height: 40px;">
            @else
            <input value="{{ $deb->Nilai_Inventory }}" type="text" name="Nilai_Inventory"
                class="form-control number-separator" style="width: 500px; height: 40px;">
            @endif
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Jaminan Lainnya</label></div>
        <div class="col-sm-8"><input value="{{ $deb->Jaminan_Lainnya }}" type="text" name="Jaminan_Lainnya"
                class="form-control" style="width: 500px; height: 40px;">
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Apakah Ada DP?</label></div>
        <div class="col-sm-4 d-flex">
            <div class="d-flex">
                <input type="radio" value="YA" {{ ($deb->APAKAH_ADA_DP == "YA")? "checked" : "" }}
                    style="width: 15px" name="APAKAH_ADA_DP" class="form-control">
                <p class="my-auto mx-2" style="font-weight: 600">YA</p>
            </div>
            <div class=" d-flex">
                <input type="radio" value="NO" {{ ($deb->APAKAH_ADA_DP == "NO")? "checked" : "" }}
                    style="width: 15px" name="APAKAH_ADA_DP" class="form-control number-separator">
                <p class="my-auto mx-2" style="font-weight: 600">Tidak</p>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Down Payment</label></div>
        <div class="col-sm-8">
            @if ($deb->DOWN_PAYMENT_CUSTOMER != NULL)
            <input type="text" value="{{ number_format($deb->DOWN_PAYMENT_CUSTOMER) }}" name="DOWN_PAYMENT_CUSTOMER"
                class="form-control number-separator" style="width: 500px; height: 40px;">
            @else
            <input type="text" value="{{ $deb->DOWN_PAYMENT_CUSTOMER }}" name="DOWN_PAYMENT_CUSTOMER"
                class="form-control number-separator" style="width: 500px; height: 40px;">
            @endif
        </div>
    </div>
    <div class="row pb-3">
        <div class="col-sm-4"><label>Status</label></div>
        <div class="col-sm-8">
            <select name="Status" class="form-control py-0" style="width: 500px; height: 40px;">
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
@endsection
