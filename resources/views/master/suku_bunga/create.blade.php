@extends('layout.layout')
@section('title')
    Master Suku Bunga
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
    <a href="{{ url('master_suku_bunga') }}">Master Suku Bunga</a>
@endsection

@section('content')
    <form action="{{ url('master_suku_bunga') }}" method="POST">
        @csrf
        <div class="row pb-3">
            <div class="col-sm-4"><label>Suku Bunga <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="Suku_Bunga" class="form-control" style="width: 300px; height: 30px;">
                @error('Suku_Bunga')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Konvensional / Syariah <span class="text-danger">*</span></label></div>
            <div class="col-sm-4 row pl-3">
                @foreach ($jp as $item)    
                    <div class="d-flex">
                        <input type="radio" value="{{ $item->id }}" style="width: 15px" name="konven_syariah_id" class="form-control">
                        <p class="my-auto mx-2" style="font-weight: 600">{{ $item->Product }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        @error('konven_syariah_id')
        <div class="row pb-3 mt-n4">
            <div class="col-sm-4"><label></span></label></div>
            <div class="col-sm-4 row pl-3">
                <p class="text-danger">{{ $message }}</p>
            </div>
        </div>
        @enderror

        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Suku Bunga <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="Nilai_Suku_Bunga" class="form-control number-separator" style="width: 300px; height: 30px;">
                @error('Nilai_Suku_Bunga')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('master_suku_bunga') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection

