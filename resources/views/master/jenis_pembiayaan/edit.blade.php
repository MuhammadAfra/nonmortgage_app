@extends('layout.layout')
@section('title')
    Master Jenis Pembiayaan
@endsection

@section('subtitle')
    Edit
@endsection

@section('page')
    <a href="{{ url('master_jenis_pembiayaan') }}">Master Jenis Pembiayaan</a>
@endsection

@section('content')
    <form action="{{ url('master_jenis_pembiayaan', $jenisPembiayaan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Pembiayaan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="jenis_pembiayaan" value="{{ $jenisPembiayaan->jenis_pembiayaan }}" class="form-control" style="width: 300px; height: 30px;">
                @error('jenis_pembiayaan')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kovensional / Syariah <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <select name="id_product" class="form-control py-0" style="width: 300px; height: 30px;">
                    <option value="{{ $jenisPembiayaan->id_product }}">{{ $jenisPembiayaan->jenis_product->Product }}</option>
                    @foreach ($jenisProduct as $item)
                        <option value="{{ $item->id }}">{{ $item->Product }}</option>
                    @endforeach
                </select>
                @error('Nilai_Pola_Pembayaran')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-warning text-white" type="submit">Edit</button>
                <a href="{{ url('master_jenis_pembiayaan') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection