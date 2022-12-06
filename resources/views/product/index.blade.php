@extends('layout.layout')

@section('title')
Product
@endsection

@section('subtitle')
Home
@endsection

@section('page')
    <a href="{{ url('product') }}">Product</a>
@endsection

@section('content')
<div class="d-flex pb-3">
    <a href="{{ url('product/create') }}" class="btn btn-success my-2">Create New</a>
    <a href="{{ url('/upload_product') }}" class="btn btn-secondary my-2 ml-2">Upload File</a>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Product</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-responsive">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Action</th>
                    <th>Partner ID</th>
                    <th>Debitur ID</th>
                    <th>Nama Debitur</th>
                    <th>Konven / Syariah</th>
                    <th>Nilai Pembiayaan Pokok Maximum</th>
                    <th>Suku Bunga</th>
                    <th>Jangka Waktu Maximum</th>
                    <th>Pola Pembayaran</th>
                    <th>Biaya Administrasi</th>
                    <th>Biaya Asuransi</th>
                    <th>Biaya Provinsi</th>
                    <th>Biaya Lain Lain</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataproduct as $item)             
                <tr >
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="d-flex" style="justify-content: center">
                        <div><a href="{{ url('product/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                        <div><a href="{{ url('product/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                        <div>
                            <form action="{{ url('product',$item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                    <td>{{ $item->PARTNER_ID }}</td>
                    <td>{{ $item->DEBITUR_ID }}</td>
                    <td>{{ $item->NAMA_DEBITUR }}</td>
                    <td>{{ $item->KONVEN_SYARIAH }}</td>
                    <td>{{ $item->NILAI_PEMBIAYAAN_POKOK_MAXIMUM }}</td>
                    <td>suku bunga no fields</td>
                    <td>{{ $item->Jangka_Waktu_Maximum }}</td>
                    <td>pola pembayaran no fields</td>
                    <td>{{ $item->BIAYA_ADMINISTRASI }}</td>
                    <td>{{ $item->BIAYA_ASSURANSI }}</td>
                    <td>{{ $item->BIAYA_PROVINSI }}</td>
                    <td>{{ $item->BIAYA_LAIN_LAIN }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection