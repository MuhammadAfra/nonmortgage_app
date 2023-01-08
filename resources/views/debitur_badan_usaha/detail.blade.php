@extends('layout.layout')
@section('title')
Debitur Badan Usaha
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('debitur_badan_usaha') }}">Debitur Badan Usaha</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Perusahaan</label></div>
            <div class="col-sm-8">: {{ $deb->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat</label></div>
            <div class="col-sm-8">: {{ $deb->ALAMAT_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status Badan Hukum</label></div>
            <div class="col-sm-8">: {{ $deb->STATUS_BADAN_HUKUM }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Akta Pendirian <br> 
            @if ($deb->AKTE_PENDIRIAN != NULL)
            <a href="{{ url('/dw_deb_akte_pendirian', $deb->AKTE_PENDIRIAN) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->AKTE_PENDIRIAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Company Profile <br> 
            @if ($deb->COMPANY_PROFILE != NULL)
            <a href="{{ url('/dw_deb_company', $deb->COMPANY_PROFILE) }}">Download File</a>
            @endif
        </label></div>
            <div class="col-sm-8">: {{ $deb->COMPANY_PROFILE }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Detail Product Profile</label></div>
            <div class="col-sm-8">: {{ $deb->detil_product->id_master_product }} - {{ $deb->detil_product->nama_product }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Akta Perubahan Anggaran Dasar <br> 
            @if ($deb->AKTE_PERUBAHAN_ANGGARAN_DASAR != NULL)
            <a href="{{ url('/dw_deb_akte_ad', $deb->AKTE_PERUBAHAN_ANGGARAN_DASAR) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->AKTE_PERUBAHAN_ANGGARAN_DASAR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>SIUP <br> 
            @if ($deb->SIUP != NULL)
            <a href="{{ url('/dw_deb_siup', $deb->SIUP) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->SIUP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>TDP <br> 
            @if ($deb->TDP != NULL)
            <a href="{{ url('/dw_deb_tdp', $deb->TDP) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->TDP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>NPWP <br> 
            @if ($deb->NPWP != NULL)
            <a href="{{ url('/dw_deb_npwp', $deb->NPWP) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->NPWP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Direktur Utama</label></div>
            <div class="col-sm-8">: {{ $deb->Nama_Direktur_Utama }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nomor Identitas Direktur Utama</label></div>
            <div class="col-sm-8">: {{ $deb->No_Identitas_Direktur_Utama }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Direktur 1</label></div>
            <div class="col-sm-8">: {{ $deb->Nama_Direktur1 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nomor Identitas Direktur 1</label></div>
            <div class="col-sm-8">: {{ $deb->No_Identitas_Direktur1 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Direktur 2</label></div>
            <div class="col-sm-8">: {{ $deb->Nama_Direktur_2 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nomor Identitas Direktur 2</label></div>
            <div class="col-sm-8">: {{ $deb->No_Identitas_Direktur2 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Modal Pendirian <br> 
            @if ($deb->MODAL_PENDIRIAN != NULL)
            <a href="{{ url('/dw_deb_mdl_diri', $deb->MODAL_PENDIRIAN) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->MODAL_PENDIRIAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Modal Perubahan Terakhir <br> 
            @if ($deb->MODAL_PERUBAHAN_TERAKHIR != NULL)
            <a href="{{ url('/dw_deb_mdl_akhir', $deb->MODAL_PERUBAHAN_TERAKHIR) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->MODAL_PERUBAHAN_TERAKHIR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Audited Financial Statement <br> 
            @if ($deb->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS != NULL)
            <a href="{{ url('/dw_deb_audited', $deb->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>In House Financial Statement <br> 
            @if ($deb->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR != NULL)
            <a href="{{ url('/dw_deb_in_house', $deb->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Bank Statement <br> 
            @if ($deb->BANK_STATEMENT_LAST_3_MONTHS != NULL)
            <a href="{{ url('/dw_deb_bank', $deb->BANK_STATEMENT_LAST_3_MONTHS) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->BANK_STATEMENT_LAST_3_MONTHS }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Financial Projection <br> 
            @if ($deb->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS != NULL)
            <a href="{{ url('/dw_deb_finance_projection', $deb->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Draft Template <br> 
            @if ($deb->DRAFT_TEMPLATE_AGREEMENT_END_USER != NULL)
            <a href="{{ url('/dw_deb_draft', $deb->DRAFT_TEMPLATE_AGREEMENT_END_USER) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->DRAFT_TEMPLATE_AGREEMENT_END_USER }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Risk Acceptance Criteria <br> 
            @if ($deb->CONTOH_RISK_ACCEPTANCE_CRITERIA != NULL)
            <a href="{{ url('/dw_deb_risk_acc', $deb->CONTOH_RISK_ACCEPTANCE_CRITERIA) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->CONTOH_RISK_ACCEPTANCE_CRITERIA }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>NDA Document <br> 
            @if ($deb->NDA_DOCUMENT != NULL)
                <a href="{{ url('/dw_deb_nda', $deb->NDA_DOCUMENT) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $deb->NDA_DOCUMENT }}</div>
        </div>        
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Asuransi</label></div>
            <div class="col-sm-8">: {{ $deb->asuransi->Jenis_Asuransi }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Perusahaan Asuransi</label></div>
            <div class="col-sm-8">: {{ $deb->Perusahaan_Asuransi }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Persen Asuransi</label></div>
            <div class="col-sm-8">: {{ $deb->Persen_Asuransi }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Asuransi</label></div>
            <div class="col-sm-8">: {{ $deb->Nilai_Asuransi }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Sertifikat Tanah</label></div>
            <div class="col-sm-8">: {{ $deb->Jaminan_Sertifikat_Tanah }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Sertifikat Tanah</label></div>
            <div class="col-sm-8">: {{ $deb->Nilai_Sertifikat_Tanah }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Kendaraan Mobil</label></div>
            <div class="col-sm-8">: {{ $deb->Jaminan_Kendaraan_Bermotor_Mobil }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Kendaraan Mobil</label></div>
            <div class="col-sm-8">: {{ $deb->Nilai_Kendaraan_Bermotor_Mobil }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Kendaraan Motor</label></div>
            <div class="col-sm-8">: {{ $deb->Jaminan_Kendaraan_Bermotor_Motor }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Kendaraan Motor</label></div>
            <div class="col-sm-8">: {{ $deb->Nilai_Kendaraan_Bermotor_Motor }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Personal Guarantee</label></div>
            <div class="col-sm-8">: {{ $deb->Jaminan_Personel_Guarantee }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Personal Guarantee</label></div>
            <div class="col-sm-8">: {{ $deb->Nilai_Personel_Guarantee }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Invoice</label></div>
            <div class="col-sm-8">: {{ $deb->Jaminan_Invoice }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Invoice</label></div>
            <div class="col-sm-8">: {{ $deb->Nilai_Invoice }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Inventori</label></div>
            <div class="col-sm-8">: {{ $deb->Jaminan_Inventory }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Inventori</label></div>
            <div class="col-sm-8">: {{ $deb->Nilai_Inventory }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jaminan Lainnya</label></div>
            <div class="col-sm-8">: {{ $deb->Jaminan_Lainnya }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>DP</label></div>
            <div class="col-sm-8">: {{ $deb->APAKAH_ADA_DP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jumlah DP</label></div>
            <div class="col-sm-8">: {{ $deb->DOWN_PAYMENT_CUSTOMER }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('debitur_badan_usaha/'.$deb->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('debitur_badan_usaha') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
