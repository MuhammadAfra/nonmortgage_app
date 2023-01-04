@extends('layout.layout')

@section('title')
Partner
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('partner') }}">Partner</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
    <a href="{{ url('/index_partner') }}">Partner</a>
    @endsection
@endif

@section('content')

@if (auth()->user()->level == "Admin")
<div class="d-flex pb-3">
    <a href="{{ url('partner/create') }}" class="btn btn-success my-2 mx-2">Create New</a>
    <button type="button" class="btn btn-primary btn-md my-2" style="height: 38px" type="button" data-toggle="modal"
    data-target="#impormodal">Impor Data</button>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Partner</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-responsive">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    @if (auth()->user()->level == "Admin")
                    <th>Action</th>
                    @endif
                    <th>Nama Perusahaan</th>
                    <th>Alamat Perusahaan</th>
                    <th>Status Bahan Hukum</th>
                    <th>Akte Pendirian</th>
                    <th>Company Profile</th>
                    <th>Detail Company Profile</th>
                    <th>Akte Perubahan Anggaran Dasar</th>
                    <th>SIUP</th>
                    <th>TDP</th>
                    <th>NPWP</th>
                    <th>Nama Direktur Utama</th>
                    <th>Nomor HP Identitas Direktur Utama</th>
                    <th>Nama Direktur 1</th>
                    <th>Nomor HP Identitas Direktur 1</th>
                    <th>Nama Direktur 2</th>
                    <th>Nomor HP Identitas Direktur 2</th>
                    <th>Modal Pendirian</th>
                    <th>Modal Perubahan Terakhir</th>
                    <th>Audited Financial Statement Current Year</th>
                    <th>Audited Financial Statement Last 2 Years</th>
                    <th>In House Financial Statement Current Year</th>
                    <th>Bank Statement Last 3 Years</th>
                    <th>Financial Projection For Next 3-5 Years</th>
                    <th>Draft Template Agree End User</th>
                    <th>Contoh Risk Acceptance Criteria</th>
                    <th>NDA Document</th>
                    <th>Jenis Asuransi</th>
                    <th>Nama Perusahaan Asuransi</th>
                    <th>Persen Asuransi</th>
                    <th>Nilai Asuransi Rupiah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partner as $item)             
                <tr >
                    <td class="text-center">{{ $loop->iteration }}</td>
                    @if (auth()->user()->level == "Admin")
                    <td class="d-flex" style="justify-content: center">
                        <div><a href="{{ url('partner/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                        <div><a href="{{ url('partner/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                        <div>
                            <form action="{{ url('partner',$item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                    @endif
                    <td>{{ $item->NAMA_PERUSAHAAN }}</td>
                    <td>{{ $item->ALAMAT_PERUSAHAAN }}</td>
                    <td>{{ $item->STATUS_BADAN_HUKUM }}</td>
                    <td>{{ $item->AKTE_PENDIRIAN }}</td>
                    <td>{{ $item->COMPANY_PROFILE }}</td>
                    <td>{{ $item->master_product->nama_product }}</td>
                    <td>{{ $item->AKTE_PERUBAHAN_ANGGARAN_DASAR }}</td>
                    <td>{{ $item->SIUP }}</td>
                    <td>{{ $item->TDP }}</td>
                    <td>{{ $item->NPWP }}</td>
                    <td>{{ $item->Nama_Direktur_Utama }}</td>
                    <td>{{ $item->No_Identitas_Direktur_Utama }}</td>
                    <td>{{ $item->Nama_Direktur1 }}</td>
                    <td>{{ $item->No_Identitas_Direktur1 }}</td>
                    <td>{{ $item->Nama_Direktur_2 }}</td>
                    <td>{{ $item->No_Identitas_Direktur2 }}</td>
                    <td>{{ $item->MODAL_PENDIRIAN }}</td>
                    <td>{{ $item->MODAL_PERUBAHAN_TERAKHIR }}</td>
                    <td>no fields</td>
                    <td>{{ $item->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS }}</td>
                    <td>{{ $item->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR }}</td>
                    <td>{{ $item->BANK_STATEMENT_LAST_3_MONTHS }}</td>
                    <td>{{ $item->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS }}</td>
                    <td>{{ $item->DRAFT_TEMPLATE_AGREEMENT_END_USER }}</td>
                    <td>{{ $item->CONTOH_RISK_ACCEPTANCE_CRITERIA }}</td>
                    <td>{{ $item->NDA_DOCUMENT }}</td>
                    <td>{{ $item->Jenis_Assuransi }}</td>
                    <td>{{ $item->Nama_Perusahaan_Assuransi }}</td>
                    <td>{{ $item->Persen_Assuransi }}</td>
                    <td>{{ $item->Nilai_Assuransi_Rupiah }}</td>
                    <td>{{ $item->Status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection