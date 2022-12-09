@extends('layout.layout')

@section('title')
Debitur
@endsection

@section('subtitle')
Home
@endsection

@section('page')
    <a href="{{ url('debitur') }}">Debitur</a>
@endsection

@section('content')
<div class="d-flex pb-3">
    <a href="{{ url('debitur/create') }}" class="btn btn-success my-2">Create New</a>
    <a href="{{ url('/upload_debitur') }}" class="btn btn-secondary my-2 ml-2">Upload File</a>
</div>
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
                    <th>Action</th>
                    <th>Nama Debitur</th>
                    <th>Tanggal Lahir</th>
                    <th>No KTP</th>
                    <th>No NPWP</th>
                    <th>Alamat</th>
                    <th>Provinsi</th>
                    <th>Kabupaten / Kota</th>
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
                    <td>{{ $item->NAMA_DEBITUR }}</td>
                    <td>{{ $item->TANGGAL_LAHIR }}</td>
                    <td>{{ $item->NO_KTP }}</td>
                    <td>{{ $item->NO_NPWP }}</td>
                    <td>{{ $item->ALAMAT_CUSTOMER }}</td>
                    <td>{{ $item->PROVINSI }}</td>
                    <td>{{ $item->KABUPATEN_KOTA }}</td>
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
@endsection