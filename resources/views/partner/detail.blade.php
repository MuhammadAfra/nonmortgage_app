@extends('layout.layout')
@section('title')
Product
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('partner') }}">Product</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Perusahaan</label></div>
            <div class="col-sm-8">: {{ $partner->NAMA_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat</label></div>
            <div class="col-sm-8">: {{ $partner->ALAMAT_PERUSAHAAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status Badan Hukum</label></div>
            <div class="col-sm-8">: {{ $partner->STATUS_BADAN_HUKUM }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Akte Pendirian <br> <a href="{{ url('/dw_akte_pendirian', $partner->AKTE_PENDIRIAN) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->AKTE_PENDIRIAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Company Profile <br> <a href="{{ url('/dw_company', $partner->COMPANY_PROFILE) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->COMPANY_PROFILE }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Detail Product Profile</label></div>
            <div class="col-sm-8">: {{ $partner->master_product->id_master_product }} - {{ $partner->master_product->nama_product }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Akte Perubahan Anggaran Dasar <br> <a href="{{ url('/dw_akte_ad', $partner->AKTE_PERUBAHAN_ANGGARAN_DASAR) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->AKTE_PERUBAHAN_ANGGARAN_DASAR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>SIUP <br> <a href="{{ url('/dw_siup', $partner->SIUP) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->SIUP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>TDP <br> <a href="{{ url('/dw_tdp', $partner->TDP) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->TDP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>NPWP <br> <a href="{{ url('/dw_npwp', $partner->NPWP) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->NPWP }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Direktur Utama</label></div>
            <div class="col-sm-8">: {{ $partner->Nama_Direktur_Utama }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nomor Direktur Utama</label></div>
            <div class="col-sm-8">: {{ $partner->No_Identitas_Direktur_Utama }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Direktur 1</label></div>
            <div class="col-sm-8">: {{ $partner->Nama_Direktur1 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nomor Direktur 1</label></div>
            <div class="col-sm-8">: {{ $partner->No_Identitas_Direktur1 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Direktur 2</label></div>
            <div class="col-sm-8">: {{ $partner->Nama_Direktur_2 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nomor Direktur 2</label></div>
            <div class="col-sm-8">: {{ $partner->No_Identitas_Direktur2 }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Modal Pendirian <br> <a href="{{ url('/dw_mdl_diri', $partner->MODAL_PENDIRIAN) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->MODAL_PENDIRIAN }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Modal Perubahan Terakhir <br> <a href="{{ url('/dw_mdl_akhir', $partner->MODAL_PERUBAHAN_TERAKHIR) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->MODAL_PERUBAHAN_TERAKHIR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Audited Financial Statement <br> <a href="{{ url('/dw_audited', $partner->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>In House Financial Statement <br> <a href="{{ url('/dw_in_house', $partner->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Bank Statement <br> <a href="{{ url('/dw_bank', $partner->BANK_STATEMENT_LAST_3_MONTHS) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->BANK_STATEMENT_LAST_3_MONTHS }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Financial Projection <br> <a href="{{ url('/dw_finance_projection', $partner->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Draft Template <br> <a href="{{ url('/dw_draft', $partner->DRAFT_TEMPLATE_AGREEMENT_END_USER) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->DRAFT_TEMPLATE_AGREEMENT_END_USER }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Risk Acceptance Criteria <br> <a href="{{ url('/dw_risk_acc', $partner->CONTOH_RISK_ACCEPTANCE_CRITERIA) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->CONTOH_RISK_ACCEPTANCE_CRITERIA }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>NDA Document <br> <a href="{{ url('/dw_nda', $partner->NDA_DOCUMENT) }}">Download File</a></label></div>
            <div class="col-sm-8">: {{ $partner->NDA_DOCUMENT }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Status</label></div>
            <div class="col-sm-8">: {{ $partner->Status }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('partner/'.$partner->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('partner') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
