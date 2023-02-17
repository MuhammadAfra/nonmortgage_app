@extends('layout.layout')
@section('title')
Partner
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('partner') }}">Partner</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
    <a href="{{ url('/index_partner') }}">Partner</a>
    @endsection
@endif
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Perusahaan</label></div>
            <div class="col-sm-8">: {{ $partner->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat Perusahaan</label></div>
            <div class="col-sm-8">: {{ $partner->ALAMAT_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status Badan Hukum</label></div>
            <div class="col-sm-8">: {{ $partner->STATUS_BADAN_HUKUM }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Akta Pendirian <br> 
            @if ($partner->AKTE_PENDIRIAN != NULL)
            <a href="{{ url('/dw_akte_pendirian', $partner->AKTE_PENDIRIAN) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->AKTE_PENDIRIAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Company Profile <br> 
            @if ($partner->COMPANY_PROFILE != NULL)
            <a href="{{ url('/dw_company', $partner->COMPANY_PROFILE) }}">Download File</a>
            @endif
        </label></div>
            <div class="col-sm-8">: {{ $partner->COMPANY_PROFILE }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Akta Lain-Lain <br> 
        </label></div>
            <div class="col-sm-8">: 
                @if ($partner->AKTE_LAIN_LAIN != NULL)
                    @foreach (json_decode($partner->AKTE_LAIN_LAIN) as $item)
                        {{ $item }} | <a href="{{ url('/dw_all', $item) }}">Download File</a> <br>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Detail Nama Product</label></div>
            <div class="col-sm-8">: 
                @if ($partner->DETIL_PRODUCT_PROFILE != NULL)
                    {{ $partner->master_product->nama_product }}
                @endif
            </div>
        </div>
        @if ($partner->DETIL_PRODUCT_PROFILE != NULL)
            @if ($partner->master_product->nama_product == "Invoice Financing")
            <div class="row pb-3">
                <div class="col-sm-4"><label>Nama Borrower</label></div>
                <div class="col-sm-8">: 
                    {{ $partner->NAMA_BORROWER }}
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-sm-4"><label>Tanggal Jatuh Tempo</label></div>
                <div class="col-sm-8">: 
                    {{ $partner->TGL_JATUH_TEMPO }}
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-sm-4"><label>Nila Invoice Financing</label></div>
                <div class="col-sm-8">: 
                    Rp{{ number_format($partner->NILAI_INVOICE_FINANCING) }}
                </div>
            </div>
            @endif
        @endif
        <div class="row pb-3">
            <div class="col-sm-4"><label>Akta Perubahan Anggaran Dasar <br> 
            @if ($partner->AKTE_PERUBAHAN_ANGGARAN_DASAR != NULL)
            <a href="{{ url('/dw_akte_ad', $partner->AKTE_PERUBAHAN_ANGGARAN_DASAR) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->AKTE_PERUBAHAN_ANGGARAN_DASAR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>SIUP / NIB<br> 
            @if ($partner->SIUP != NULL)
            <a href="{{ url('/dw_siup', $partner->SIUP) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->SIUP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggal Masa Berlaku SIUP</label></div>
            <div class="col-sm-8">: {{ $partner->TGL_BERLAKU_SIUP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>TDP <br> 
            @if ($partner->TDP != NULL)
            <a href="{{ url('/dw_tdp', $partner->TDP) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->TDP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tanggal Masa Berlaku SIUP</label></div>
            <div class="col-sm-8">: {{ $partner->TGL_BERLAKU_SIUP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>NPWP <br> 
            @if ($partner->NPWP != NULL)
            <a href="{{ url('/dw_npwp', $partner->NPWP) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->NPWP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Direktur Utama</label></div>
            <div class="col-sm-8">: {{ $partner->Nama_Direktur_Utama }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nomor Identitas Direktur Utama</label></div>
            <div class="col-sm-8">: {{ $partner->No_Identitas_Direktur_Utama }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Direktur 1</label></div>
            <div class="col-sm-8">: {{ $partner->Nama_Direktur1 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nomor Identitas Direktur 1</label></div>
            <div class="col-sm-8">: {{ $partner->No_Identitas_Direktur1 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Direktur 2</label></div>
            <div class="col-sm-8">: {{ $partner->Nama_Direktur_2 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nomor Identitas Direktur 2</label></div>
            <div class="col-sm-8">: {{ $partner->No_Identitas_Direktur2 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Modal Pendirian <br> 
            @if ($partner->MODAL_PENDIRIAN != NULL)
            <a href="{{ url('/dw_mdl_diri', $partner->MODAL_PENDIRIAN) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->MODAL_PENDIRIAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Modal Perubahan Terakhir <br> 
            @if ($partner->MODAL_PERUBAHAN_TERAKHIR != NULL)
            <a href="{{ url('/dw_mdl_akhir', $partner->MODAL_PERUBAHAN_TERAKHIR) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->MODAL_PERUBAHAN_TERAKHIR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Audited Financial Statement Last 2 Years <br> 
            @if ($partner->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS != NULL)
            <a href="{{ url('/dw_audited', $partner->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Last Year</label></div>
            <div class="col-sm-8">: {{ $partner->LAST_YEAR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>In House Financial Statement Current Year <br> 
            @if ($partner->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR != NULL)
            <a href="{{ url('/dw_in_house', $partner->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Bank Statement Last 3 Years <br> 
        </label></div>
            <div class="col-sm-8">: 
                @if ($partner->BANK_STATEMENT_LAST_3_MONTHS != NULL)
                    @foreach (json_decode($partner->BANK_STATEMENT_LAST_3_MONTHS) as $item)
                        {{ $item }} | <a href="{{ url('/dw_bank', $item) }}">Download File</a> <br>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Financial Projection For Next 3-5 Years <br> 
            @if ($partner->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS != NULL)
            <a href="{{ url('/dw_finance_projection', $partner->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Draft Template Agreement End User<br> 
            @if ($partner->DRAFT_TEMPLATE_AGREEMENT_END_USER != NULL)
            <a href="{{ url('/dw_draft', $partner->DRAFT_TEMPLATE_AGREEMENT_END_USER) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->DRAFT_TEMPLATE_AGREEMENT_END_USER }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Contoh Risk Acceptance Criteria <br> 
            @if ($partner->CONTOH_RISK_ACCEPTANCE_CRITERIA != NULL)
            <a href="{{ url('/dw_risk_acc', $partner->CONTOH_RISK_ACCEPTANCE_CRITERIA) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->CONTOH_RISK_ACCEPTANCE_CRITERIA }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>NDA Document <br> 
            @if ($partner->NDA_DOCUMENT != NULL)
                <a href="{{ url('/dw_nda', $partner->NDA_DOCUMENT) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->NDA_DOCUMENT }}</div>
        </div>    
        <div class="row pb-3">
            <div class="col-sm-4"><label>Pengganti Asuransi</label></div>
            <div class="col-sm-8">: {{ $partner->PENGGANTI_ASURANSI }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>File Pengganti Asuransi <br> 
            @if ($partner->FILE_PENGGANTI_ASURANSI != NULL)
                <a href="{{ url('/dw_asuransi', $partner->FILE_PENGGANTI_ASURANSI) }}">Download File</a>
            @endif
            </label></div>
            <div class="col-sm-8">: {{ $partner->FILE_PENGGANTI_ASURANSI }}</div>
        </div>    
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $partner->Status }}</div>
        </div>
        @if (auth()->user()->level == "Admin")
            <div class="row pb-3">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <a href="{{ url('partner/'.$partner->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                    <a href="{{ url('partner') }}" class="btn btn-default">Cancel</a>
                </div>
            </div>
        @elseif(auth()->user()->level == "User")
            <div class="row pb-3">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <a href="{{ url('index_partner') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
