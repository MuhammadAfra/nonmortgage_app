@extends('layout.layout')
@section('title')
    Skema Pembiayaan
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
    <a href="{{ url('master_skema_pembiayaan') }}">Skema Pembiayaan</a>
@endsection

@section('content')
    <form action="{{ url('master_skema_pembiayaan') }}" method="POST">
        @csrf
        <div class="row pb-3">
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
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Pembiayaan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <select name="jenis_pembiayaan" class="form-control py-0" style="width: 300px; height: 30px;">
                    <option></option>
                    @foreach ($skemaPembiayaan2 as $item)
                        <option value="{{ $item->id_jenis_pembiayaan }}">{{ $item->jenis_pembiayaan }}</option> 
                    @endforeach
                </select>
                @error('ID_PRODUK')
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