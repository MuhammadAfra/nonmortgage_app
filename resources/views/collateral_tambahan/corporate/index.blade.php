@extends('layout.layout')
@section('content')
@section('title')
Collateral Tambahan - Corporate Guarantee
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
@section('page')
<a href="{{ url('collateral_corporate') }}">Collateral Tambahan - Corporate Guarantee</a>
@endsection
@elseif(auth()->user()->level == "User")
@section('page')
<a href="#">Collateral Tambahan - Corporate Guarantee</a>
@endsection
@endif

@section('content')

@if (auth()->user()->level == "Admin")
<div class="d-flex pb-3">
    <a href="{{ url('collateral_corporate_tambahan/create') }}" class="btn btn-success my-2">Create New</a>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Collaterals Corporate Guarantee</h3>
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
                    <th>Partner Perusahaan</th>
                    <th>Nama Debitur</th>
                    <th>Counter Corporate Guarantee</th>
                    <th>Nilai Corporate Guarantee</th>
                    <th>Nama PT Penerima Corporate Guarante</th>
                    <th>Nama PT Pemberi Corporate Guarante</th>
                    <th>No Telp PT Pemberi Corporate Guarante</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($corporatetbh as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    @if (auth()->user()->level == "Admin")
                    <td class="d-flex" style="justify-content: center">
                        <div><a href="{{ url('collateral_corporate_tambahan/'.$item->id.'/edit') }}"
                                class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                        <div><a href="{{ url('collateral_corporate_tambahan/'.$item->id) }}"
                                class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                        <div>
                            <form action="{{ url('collateral_corporate_tambahan',$item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm text-white"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                    @endif
                    <td>{{ $item->product->partner->NAMA_PERUSAHAAN }}</td>
                    <td>{{ $item->product->debitur->NAMA_DEBITUR }}</td>
                    <td>{{ $item->Counter_Corporate_Guarantee_Tambahan }}</td>
                    <td>{{ $item->Nilai_Corporate_Guarantee_Tambahan }}</td>
                    <td>{{ $item->Nama_Pt_Penerima_Corporate_Guarantee_Tambahan }}</td>
                    <td>{{ $item->Nama_Pt_Pemberi_Corporate_Guarantee_Tambahan }}</td>
                    <td>{{ $item->No_Telp_Pt_Pemberi_Corporate_Guarantee_Tambahan }}</td>
                    <td>{{ $item->Status_Tambahan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection