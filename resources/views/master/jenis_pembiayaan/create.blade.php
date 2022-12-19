@extends('layout.layout')
@section('title')
    Master Jenis Pembiayaan
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
    <a href="{{ url('master_jenis_pembiayaan') }}">Master Jenis Pembiayaan</a>
@endsection

@section('content')
    <form action="{{ url('master_jenis_pembiayaan') }}" method="POST">
        @csrf
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Pembiayaan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="jenis_pembiayaan" class="form-control" style="width: 300px; height: 30px;">
                @error('jenis_pembiayaan')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kovensional / Syariah <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <select name="id_product" class="form-control py-0" style="width: 300px; height: 30px;"">
                    <option></option>
                    @foreach ($jenisProduct as $item)
                        <option value="{{ $item->id }}">Id : {{ $item->id }} - Jenis :{{ $item->Product }}</option>
                    @endforeach
                </select>
                @error('id_product')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('master_jenis_pembiayaan') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection