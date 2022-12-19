@extends('layout.layout')
@section('title')
    Master Skema Pembiayaan
@endsection

@section('subtitle')
    Edit
@endsection

@section('page')
    <a href="{{ url('master_skema_pembiayaan') }}">Master Skema Pembiayaan</a>
@endsection

@section('content')
    <form action="{{ url('master_skema_pembiayaan') }}" method="POST">
        @csrf
        <div class="row pb-3">
            <div class="col-sm-4"><label>Skema Pembiayaan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="skema_pembiayaan" value="{{ $skemaPembiayaan->skema_pembiayaan }}" class="form-control" style="width: 300px; height: 30px;">
                @error('skema_pembiayaan')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Pembiayaan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <select name="id_jenis_pembiayaan" class="form-control py-0" style="width: 300px; height: 30px;"">
                    <option value="{{ $skemaPembiayaan->id_jenis_pembiayaan }}">{{ $skemaPembiayaan->jenis->jenis_pembiayaan }} - {{ $skemaPembiayaan->jenis->jenis_product->Product }}</option>
                    @foreach ($jp as $item)
                        <option value="{{ $item->id }}">{{ $item->jenis_pembiayaan }} - {{ $item->jenis_product->Product }}</option>
                    @endforeach
                </select>
                @error('id_jenis_pembiayaan')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-warning text-white" type="submit">Edit</button>
                <a href="{{ url('master_skema_pembiayaan') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection