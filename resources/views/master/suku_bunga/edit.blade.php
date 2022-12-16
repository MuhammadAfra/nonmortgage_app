@extends('layout.layout')
@section('title')
    Master Suku Bunga
@endsection

@section('subtitle')
    Edit
@endsection

@section('page')
    <a href="{{ url('master_suku_bunga') }}">Master Suku Bunga</a>
@endsection

@section('content')
    <form action="{{ url('master_suku_bunga', $sukuBunga->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row pb-3">
            <div class="col-sm-4"><label>Suku Bunga <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="Suku_Bunga" value="{{ $sukuBunga->Suku_Bunga }}" class="form-control" style="width: 300px; height: 30px;">
                @error('Suku_Bunga')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Suku Bunga <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="number" name="Nilai_Suku_Bunga" value="{{ $sukuBunga->Nilai_Suku_Bunga }}" class="form-control" style="width: 300px; height: 30px;">
                @error('Nilai_Suku_Bunga')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-primary text-white" type="submit">Edit</button>
                <a href="{{ url('master_suku_bunga') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection