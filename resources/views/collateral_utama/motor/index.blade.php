@extends('layout.layout')
@section('content')
@section('title')
Collateral Utama - Kendaraan Bermotor
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('collateral_motor') }}">Collateral Utama - Kendaraan Bermotor</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
    <a href="#">Collateral Utama - Kendaraan Bermotor</a>
    @endsection
@endif

@section('content')

@if (auth()->user()->level == "Admin")
<div class="d-flex pb-3">
    <a href="{{ url('collateral_motor/create') }}" class="btn btn-success my-2">Create New</a>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Collaterals Motor</h3>
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
                    <th>Counter Motor</th>
                    <th>Nilai Kendaraan Bermotor</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Jenis Motor Sport/Listrik</th>
                    <th>Nama di BKPB</th>
                    <th>No Frame</th>
                    <th>No Engine</th>
                    <th>No Polisi</th>
                    <th>Colour</th>
                    <th>Tahun</th>
                    <th>Silinder</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($motor as $item)             
                <tr >
                    <td class="text-center">{{ $loop->iteration }}</td>
                    @if (auth()->user()->level == "Admin")
                    <td class="d-flex" style="justify-content: center">
                        <div><a href="{{ url('collateral_motor/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                        <div><a href="{{ url('collateral_motor/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                        <div>
                            <form action="{{ url('collateral_motor',$item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                    @endif
                    <td>{{ $item->product->partner->NAMA_PERUSAHAAN }}</td>
                    <td>{{ $item->product->debitur->NAMA_DEBITUR }}</td>
                    <td>{{ $item->Counter_Motor }}</td>
                    <td>{{ number_format($item->Nilai_Motor_Vehicle) }}</td>
                    <td>{{ $item->Merk }}</td>
                    <td>{{ $item->Type }}</td>
                    <td>{{ $item->Model }}</td>
                    <td>{{ $item->Jenis_Motor_Sport_Listrik }}</td>
                    <td>{{ $item->Nama_Di_Bpkb }}</td>
                    <td>{{ $item->No_Frame }}</td>
                    <td>{{ $item->No_Engine }}</td>
                    <td>{{ $item->No_Polisi }}</td>
                    <td>{{ $item->Colour }}</td>
                    <td>{{ $item->Tahun }}</td>
                    <td>{{ $item->Silinder }}</td>
                    <td>{{ $item->Status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection