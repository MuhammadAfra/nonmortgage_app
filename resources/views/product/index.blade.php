@extends('layout.layout')

@section('title')
Product
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('product') }}">Product</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
    <a href="{{ url('/index_product') }}">Product</a>
    @endsection
@endif

@section('content')

@if (auth()->user()->level == "Admin")                            
<div class="d-flex pb-3">
    <a href="{{ url('product/create') }}" class="btn btn-success my-2 mx-2">Create New</a>
    <button type="button" class="btn btn-primary btn-md my-2" style="height: 38px" type="button" data-toggle="modal"
    data-target="#impormodal">Import Data</button>
</div>
@endif

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
                    @if (auth()->user()->level == "Admin")        
                    <th>Action</th>
                    @endif
                    <th>Partner</th>
                    <th>Debitur</th>
                    <th>Jenis Product</th>
                    <th>Nilai Pembiayaan/Pokok Maximum </th>
                    <th>Suku Bunga Flat(%)</th>
                    <th>Suku Bunga Effective(%)</th>
                    <th>Jangka Waktu Maximum (Bulan)</th>
                    <th>Pola Pembayaran</th>
                    <th>Biaya Administrasi </th>
                    <th>Biaya Asuransi </th>
                    <th>Biaya Provisi </th>
                    <th>Biaya Lain Lain     </th>
                    {{-- <th>File</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($dataproduct as $item)             
                <tr >
                    <td class="text-center">{{ $loop->iteration }}</td>
                    @if (auth()->user()->level == "Admin")                            
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
                    @endif
                    </td>
                    <td>{{ $item->partner->NAMA_PERUSAHAAN }}</td>
                    <td>{{ $item->debitur->NAMA_DEBITUR }}</td>
                    <td>{{ $item->m_product->id_master_product }} - {{ $item->m_product->nama_product }}</td>
                    <td>Rp{{ number_format($item->NILAI_PEMBIAYAAN_POKOK_MAXIMUM) }}</td>
                    <td>{{ $item->SUKU_BUNGA_FLAT }}</td>
                    <td>{{ $item->SUKU_BUNGA_EFFECTIVE }}</td>
                    <td>{{ $item->Jangka_Waktu_Maximum }}</td>
                    <td>{{ $item->pola_pembayaran->Pola_Pembayaran }}</td>
                    <td>Rp{{ number_format($item->BIAYA_ADMINISTRASI) }}</td>
                    <td>Rp{{ number_format($item->BIAYA_ASSURANSI) }}</td>
                    <td>Rp{{ number_format($item->BIAYA_PROVISI) }}</td>
                    <td>Rp{{ number_format($item->BIAYA_LAIN_LAIN) }}</td>
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
                <h5 class="modal-title" id="impormodalLabel">Import Data From Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/product_import') }}" method="POST" enctype="multipart/form-data">
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