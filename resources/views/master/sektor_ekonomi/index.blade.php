@extends('layout.layout')
@section('title')
Master Sektor Ekonomi
@endsection

@section('subtitle')
Home
@endsection

@if (auth()->user()->level == "Admin")
    @section('page')
        <a href="{{ url('master_sektor_ekonomi') }}">Master Sektor Ekonomi</a>
    @endsection
@elseif(auth()->user()->level == "User")
    @section('page')
    <a href="{{ url('/sektor_ekonomi') }}">Master Sektor Ekonomi</a>
    @endsection
@endif

@section('content')

@if (auth()->user()->level == "Admin")    
<div class="d-flex pb-3">
    <a href="{{ url('master_sektor_ekonomi/create') }}" class="btn btn-success my-2">Create New</a>
</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Sektor Ekonomi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center" style="width: 25px;">No</th>
                    @if (auth()->user()->level == "Admin")
                    <th class="text-center" style="width: 100px;">Action</th>
                    @endif
                    <th class="text-center">Sandi Turunan</th>
                    <th class="text-center">Label Turunan</th>
                    <th class="text-center">Sandi Utama</th>
                    <th class="text-center">Label Utama</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sektorEkonomi as $item)                    
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        @if (auth()->user()->level == "Admin")
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('master_sektor_ekonomi/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('master_sektor_ekonomi/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                            <div>
<<<<<<< HEAD
                                <button type="button" data-toggle="modal" data-target="#exampleModalCenter{{ $item->id }}" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
=======
                            <form action="{{ url('master_sektor_ekonomi',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                                </form> 
>>>>>>> 96416405cf1375d7fac3e5dc354645089172b370
                            </div>
                        </td>
                        @include('master.sektor_ekonomi.delete')
                        @endif
                        <td>{{ $item->Sandi_Turunan }}</td>
                        <td>{{ $item->Label }}</td>
                        <td>{{ $item->Sandi_Utama }}</td>
                        <td>{{ $item->Label_Utama }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>
<<<<<<< HEAD
=======


>>>>>>> 96416405cf1375d7fac3e5dc354645089172b370
@endsection
