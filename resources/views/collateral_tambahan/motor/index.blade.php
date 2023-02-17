@extends('layout.layout')
@section('content')
@section('title')
Collateral Tambahan - Kendaraan Motor
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('collateral_motor_tambahan') }}">Collateral Tambahan - Kendaraan Motor</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
    <a href="#">Collateral Tambahan - Kendaraan Motor</a>
    @endsection
@endif

@section('content')

@if (auth()->user()->level == "Admin")
<div class="d-flex pb-3">
    <a href="{{ url('collateral_motor_tambahan/create') }}" class="btn btn-success my-2">Create New</a>
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
                    <th>Partner ID</th>
                    <th>Debitur ID</th>
                    <th>Coll ID</th>
                    <th>Nilai Kendaraan Motor</th>
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
                        <div><a href="{{ url('collateral_motor_tambahan/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                        <div><a href="{{ url('collateral_motor_tambahan/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                        <div>
                        <button type="button" data-toggle="modal" data-target="#exampleModalCenter{{ $item->id }}" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                    @include('collateral_utama.motor.delete')
                    @endif
                    <td>{{ $item->partner->NAMA_PERUSAHAAN }}</td>
                    <td>
                        @if ($item->DEBITUR_ID != NULL)
                        {{ $item->debitur->NAMA_DEBITUR }}
                        @elseif($item->DEBITUR_BADAN_USAHA_ID != NULL)
                        {{ $item->debitur_badan_usaha->NAMA_PERUSAHAAN }}
                        @endif
                    </td>
                    <td>{{ str_pad($item->COLL_COUNTER, 3, 0, STR_PAD_LEFT) }}</td>
                    <td>Rp{{ number_format($item->Nilai_Motor_Vehicle_Tambahan) }}</td>
                    <td>{{ $item->Merk_Tambahan }}</td>
                    <td>{{ $item->Type_Tambahan }}</td>
                    <td>{{ $item->Model_Tambahan }}</td>
                    <td>{{ $item->Jenis_Motor_Sport_Listrik_Tambahan }}</td>
                    <td>{{ $item->Nama_Di_Bpkb_Tambahan }}</td>
                    <td>{{ $item->No_Frame_Tambahan }}</td>
                    <td>{{ $item->No_Engine_Tambahan }}</td>
                    <td>{{ $item->No_Polisi_Tambahan }}</td>
                    <td>{{ $item->Colour_Tambahan }}</td>
                    <td>{{ $item->Tahun_Tambahan }}</td>
                    <td>{{ $item->Silinder_Tambahan }}</td>
                    <td>{{ $item->Status_Tambahan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div
@endsection