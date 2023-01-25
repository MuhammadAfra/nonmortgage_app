@extends('layout.layout')

@section('title')
Debitur Badan Usaha
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('debitur_badan_usaha') }}">Debitur Badan Usaha</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
    <a href="{{ url('/index_debitur_badan_usaha') }}">Debitur Badan Usaha</a>
    @endsection
@endif

@section('content')

@if (auth()->user()->level == "Admin")
<div class="d-flex pb-3">
    <a href="{{ url('debitur_badan_usaha/create') }}" class="btn btn-success my-2 mx-2">Create New</a>
    {{-- <button type="button" class="btn btn-primary btn-md my-2" style="height: 38px" type="button" data-toggle="modal"
    data-target="#impormodal">Impor Data</button> --}}
</div>
@endif
{{-- notifikasi sukses --}}
@if ($sukses = Session::get('sukses'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $sukses }}</strong>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Debitur Badan Usaha</h3>
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
                    <th>Nama Partner ID</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat Perusahaan</th>
                    <th>Status Bahan Hukum</th>
                    <th>Akta Pendirian</th>
                    <th>Company Profile</th>
                    <th>Akta Lain Lain</th>
                    <th>Detail Company Profile</th>
                    <th>Akta Perubahan Anggaran Dasar</th>
                    <th>SIUP</th>
                    <th>TDP</th>
                    <th>NPWP</th>
                    <th>Nama Direktur Utama</th>
                    <th>Nomor Identitas Direktur Utama</th>
                    <th>Nama Direktur 1</th>
                    <th>Nomor Identitas Direktur 1</th>
                    <th>Nama Direktur 2</th>
                    <th>Nomor Identitas Direktur 2</th>
                    <th>Modal Pendirian</th>
                    <th>Modal Perubahan Terakhir</th>
                    <th>Audited Financial Statement Last 2 Years</th>
                    <th>In House Financial Statement Current Year</th>
                    <th>Bank Statement Last 3 Years</th>
                    <th>Financial Projection For Next 3-5 Years</th>
                    <th>Draft Template Agree End User</th>
                    <th>Contoh Risk Acceptance Criteria</th>
                    <th>NDA Document</th>
                    <th>Jenis Asuransi</th>
                    <th>Perusahaan Asuransi</th>
                    <th>Persen Asuransi</th>
                    <th>Nilai Asuransi</th>
                    <th>Jaminan Sertifikat Tanah</th>
                    <th>Nilai Sertifikat Tanah</th>
                    <th>Jaminan Kendaraan Mobil</th>
                    <th>Nilai Kendaraan Mobil</th>
                    <th>Jaminan Kendaraan Motor</th>
                    <th>Nilai Kendaraan Motor</th>
                    <th>Jaminan Personal Guarantee</th>
                    <th>Nilai Personal Guarantee</th>
                    <th>Jaminan Invoice</th>
                    <th>Nilai Invoice</th>
                    <th>Jaminan Inventory</th>
                    <th>Nilai Inventory</th>
                    <th>Jaminan Lainnya</th>
                    <th>Nilai Jaminan Lainnya</th>
                    <th>Pengajuan Lain Lain</th>
                    <th>Down Payment</th>
                    <th>Jumlah Down Payment</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deb as $item)             
                <tr >
                    <td class="text-center">{{ $loop->iteration }}</td>
                    @if (auth()->user()->level == "Admin")
                    <td class="d-flex" style="justify-content: center">
                        <div><a href="{{ url('debitur_badan_usaha/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                        <div><a href="{{ url('debitur_badan_usaha/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                        <div>
                            <button type="button" data-toggle="modal" data-target="#exampleModalCenter{{ $item->id }}" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                    @include('debitur_badan_usaha.delete')
                    @endif
                    <td>{{ $item->partner->NAMA_PERUSAHAAN }}</td>
                    <td>{{ $item->NAMA_PERUSAHAAN }}</td>
                    <td>{{ $item->ALAMAT_PERUSAHAAN }}</td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
                    <td>{{ $item->STATUS_BADAN_HUKUM }}</td>
                    <td>{{ $item->AKTE_PENDIRIAN }}</td>
                    <td>{{ $item->COMPANY_PROFILE }}</td>
                    <td>
                        @if ($item->AKTE_LAIN_LAIN != NULL)
                            @foreach (json_decode($item->AKTE_LAIN_LAIN) as $file)
                                {{ $file }}
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $item->detil_product->nama_product }}</td>
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
                    <td>{{ $item->AUDITED_FINANCIAL_STATEMENT_LAST_2_YEARS }}</td>
                    <td>{{ $item->IN_HOUSE_FINANCIAL_STATEMENT_CURRENT_YEAR }}</td>
                    <td>
                        @if ($item->BANK_STATEMENT_LAST_3_MONTHS != NULL)
                            @foreach (json_decode($item->BANK_STATEMENT_LAST_3_MONTHS) as $file_bank)
                                {{ $file_bank }}
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $item->FINANCIAL_PROJECTION_FOR_NEXT_3_5_YEARS }}</td>
                    <td>{{ $item->DRAFT_TEMPLATE_AGREEMENT_END_USER }}</td>
                    <td>{{ $item->CONTOH_RISK_ACCEPTANCE_CRITERIA }}</td>
                    <td>{{ $item->NDA_DOCUMENT }}</td>
                    <td>{{ $item->asuransi->Jenis_Asuransi }}</td>
                    <td>{{ $item->Perusahaan_Asuransi }}</td>
                    <td>{{ $item->Persen_Asuransi }}%</td>
                    @if ($item->Nilai_Asuransi != null )
                        <td>Rp{{ number_format($item->Nilai_Asuransi) }}</td>
                    @else
                        <td><center>-</center></td>
                    @endif
                    <td>{{ $item->Jaminan_Sertifikat_Tanah }}</td>
                    @if ($item->Nilai_Sertifikat_Tanah != null)
                    <td>Rp{{ number_format($item->Nilai_Sertifikat_Tanah) }}</td>
                    @else
                        <td><center>-</center></td>
                    @endif
                    <td>{{ $item->Jaminan_Kendaraan_Bermotor_Mobil }}</td>
                    @if ($item->Nilai_Kendaraan_Bermotor_Mobil != null)
                    <td>Rp{{ number_format($item->Nilai_Kendaraan_Bermotor_Mobil) }}</td>
                    @else
                        <td><center>-</center></td>
                    @endif
                    <td>{{ $item->Jaminan_Kendaraan_Bermotor_Motor }}</td>
                    @if ($item->Nilai_Kendaraan_Bermotor_Motor != null)
                    <td>Rp{{ number_format($item->Nilai_Kendaraan_Bermotor_Motor) }}</td>
                    @else
                        <td><center>-</center></td>
                    @endif
                    <td>{{ $item->Jaminan_Personel_Guarantee }}</td>
                    @if ($item->Nilai_Personel_Guarantee != null)
                    <td>Rp{{ number_format($item->Nilai_Personel_Guarantee) }}</td>
                    @else
                        <td><center>-</center></td>
                    @endif
                    <td>{{ $item->Jaminan_Invoice }}</td>
                    @if ($item->Nilai_Invoice != null)
                    <td>Rp{{ number_format($item->Nilai_Invoice) }}</td>
                    @else
                        <td><center>-</center></td>
                    @endif
                    <td>{{ $item->Jaminan_Inventory }}</td>
                    @if ($item->Nilai_Inventory != null)
                    <td>Rp{{ number_format($item->Nilai_Inventory) }}</td>
                    @else
                        <td><center>-</center></td>
                    @endif
                    <td>{{ $item->Jaminan_Lainnya  }}</td>
                    @if ($item->Nilai_Jaminan_Lainnya != null)
                    <td>Rp{{ number_format($item->Nilai_Jaminan_Lainnya) }}</td>
                    @else
                        <td><center>-</center></td>
                    @endif
                    <td>
                        @if ($item->PENGAJUAN_LAIN_LAIN != NULL)
                        @foreach (json_decode($item->PENGAJUAN_LAIN_LAIN) as $file)
                            {{ $file }}
                        @endforeach
                        @endif
                    </td>
                    <td>{{ $item->APAKAH_ADA_DP }}</td>
                    @if ($item->DOWN_PAYMENT_CUSTOMER != null)
                    <td>Rp{{ number_format($item->DOWN_PAYMENT_CUSTOMER) }}</td>
                    @else
                        <td><center>-</center></td>
                    @endif
                    <td>{{ $item->Status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- Modal -->
<div class="modal fade" id="impormodal" tabindex="-1" aria-labelledby="impormodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="impormodalLabel">Impor Data From Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/debitur_badan_usaha_import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row pb-3">
                        <div class="col-sm-4"><label>Upload File <span class="text-danger">*</span></label></div>
                        <div class="col-sm-8">
                            <div class="custom-file" style="width: 300px; height: 30px; cursor: pointer;">
                                <input type="file" class="custom-file-input" name="file">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection