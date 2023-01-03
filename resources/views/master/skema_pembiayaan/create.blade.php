@extends('layout.layout')
@section('title')
<<<<<<< HEAD
    Skema Pembiayaan
=======
    Master Skema Pembiayaan
>>>>>>> dev
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
<<<<<<< HEAD
    <a href="{{ url('master_skema_pembiayaan') }}">Skema Pembiayaan</a>
=======
    <a href="{{ url('master_skema_pembiayaan') }}">Master Skema Pembiayaan</a>
>>>>>>> dev
@endsection

@section('content')
    <form action="{{ url('master_skema_pembiayaan') }}" method="POST">
        @csrf
        <div class="row pb-3">
<<<<<<< HEAD
            <div class="col-sm-4"><label>Skema Pembiayaan</label></div>
            <div class="col-sm-8"><input type="number" name="SKEMA_PEMBIAYAAN" class="form-control" style="width: 300px; height: 30px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Konvensional/Syariah <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <select name="Konvensioanal_Syariah" class="form-control py-0" style="width: 300px; height: 30px;">
                    <option></option>
                    @foreach ($skemaPembiayaan1 as $item)
                        <option value="{{ $item->id_produk }}">{{ $item->Konvensional_Syariah }}</option> 
                    @endforeach
                </select>
                @error('ID_PRODUK')
=======
            <div class="col-sm-4"><label>Skema Pembiayaan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="skema_pembiayaan" class="form-control" style="width: 300px; height: 30px;">
                @error('skema_pembiayaan')
>>>>>>> dev
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Pembiayaan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
<<<<<<< HEAD
                <select name="jenis_pembiayaan" class="form-control py-0" style="width: 300px; height: 30px;">
                    <option></option>
                    @foreach ($skemaPembiayaan2 as $item)
                        <option value="{{ $item->id_jenis_pembiayaan }}">{{ $item->jenis_pembiayaan }}</option> 
                    @endforeach
                </select>
                @error('ID_PRODUK')
=======
                <select name="id_jenis_pembiayaan" class="form-control py-0" style="width: 300px; height: 30px;"">
                    <option></option>
                    @foreach ($jp as $item)
                        <option value="{{ $item->id }}">{{ $item->jenis_pembiayaan }} - {{ $item->jenis_product->Product }}</option>
                    @endforeach
                </select>
                @error('id_jenis_pembiayaan')
>>>>>>> dev
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('master_skema_pembiayaan') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection