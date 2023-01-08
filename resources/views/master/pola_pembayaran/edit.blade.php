@extends('layout.layout')
@section('title')
    Master Pola Pembayaran
@endsection

@section('subtitle')
    Edit
@endsection

@section('page')
    <a href="{{ url('master_pola_pembayaran') }}">Master Pola Pembayaran</a>
@endsection

@section('content')
    <form action="{{ url('master_pola_pembayaran', $polaPembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row pb-3">
            <div class="col-sm-4"><label>Pola Pembayaran <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" value="{{ $polaPembayaran->Pola_Pembayaran }}" name="Pola_Pembayaran" class="form-control" style="width: 300px; height: 30px;">
                @error('Pola_Pembayaran')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Pola Pembayaran <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" value="{{ number_format($polaPembayaran->Nilai_Pola_Pembayaran) }}" name="Nilai_Pola_Pembayaran" class="form-control number-separator" style="width: 300px; height: 30px;">
                @error('Nilai_Pola_Pembayaran')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-warning text-white" type="submit">Edit</button>
                <a href="{{ url('master_pola_pembayaran') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection