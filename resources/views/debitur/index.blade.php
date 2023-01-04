@extends('layout.layout')

@section('title')
Debitur
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('debitur') }}">Debitur</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
    <a href="{{ url('/index_debitur') }}">Debitur</a>
    @endsection
@endif

@section('content')

@if (auth()->user()->level == "Admin")
<div class="d-flex pb-3">
    <a href="{{ url('debitur/create') }}" class="btn btn-success my-2 mx-2">Create New</a>
    <button type="button" class="btn btn-primary btn-md my-2" style="height: 38px" type="button" data-toggle="modal"
    data-target="#impormodal">Impor Data</button>
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
        <h3 class="card-title">List Debitur</h3>
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
                    <th>Nama Debitur</th>
                    <th>Tanggal Lahir</th>
                    <th>No KTP</th>
                    <th>No NPWP</th>
                    <th>Alamat</th>
                    <th>Provinsi</th>
                    <th>Kabupaten / Kota</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Kode Pos</th>
                    <th>Nama Perusahaan</th>
                    <th>Bidang Usaha</th>
                    <th>Sub Bidang Usaha</th>
                    <th>Lama Usaha</th>
                    <th>Jabatan</th>
                    <th>Tanggungan</th>
                    <th>Income per Bulan</th>
                    <th>Spouse Income per Bulan</th>
                    <th>Bulan Ke 1</th>
                    <th>Bulan Ke 2</th>
                    <th>Bulan Ke 3</th>
                    <th>DP</th>
                    <th>Jumlah DP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($debitur as $item)             
                <tr >
                    <td class="text-center">{{ $loop->iteration }}</td>
                    @if (auth()->user()->level == "Admin")
                    <td class="d-flex" style="justify-content: center">
                        <div><a href="{{ url('debitur/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                        <div><a href="{{ url('debitur/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                        <div>
                            <form action="{{ url('debitur',$item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                    @endif
                    <td>{{ $item->NAMA_DEBITUR }}</td>
                    <td>{{ $item->TANGGAL_LAHIR }}</td>
                    <td>{{ $item->NO_KTP }}</td>
                    <td>{{ $item->NO_NPWP }}</td>
                    <td>{{ $item->ALAMAT_CUSTOMER }}</td>
                    <td>{{ $item->PROVINSI }}</td>
                    <td>{{ $item->KABUPATEN_KOTA }}</td>
                    <td>{{ $item->KECAMATAN }}</td>
                    <td>{{ $item->KELURAHAN }}</td>
                    <td>{{ $item->KODE_POS }}</td>
                    <td>{{ $item->NAMA_PERUSAHAAN }}</td>
                    <td>{{ $item->BIDANG_USAHA }}</td>
                    <td>{{ $item->SUB_BIDANG_USAHA }}</td>
                    <td>{{ $item->LAMA_USAHA }}</td>
                    <td>{{ $item->JABATAN }}</td>
                    <td>{{ $item->TANGGUNGAN }}</td>
                    <td>{{ $item->INCOME_BULAN }}</td>
                    <td>{{ $item->SUPOUSE_INCOME_BULAN }}</td>
                    <td>{{ $item->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_1 }}</td>
                    <td>{{ $item->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_2 }}</td>
                    <td>{{ $item->REKENING_KORAN_3_BULAN_TERAKHIR_BULAN_3 }}</td>
                    <td>{{ $item->APAKAH_ADA_DP }}</td>
                    <td>{{ $item->DOWN_PAYMENT_CUSTOMER }}</td>
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
                <form action="{{ url('/debitur_import') }}" method="POST" enctype="multipart/form-data">
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