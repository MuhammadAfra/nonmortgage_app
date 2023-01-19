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
            <div class="col-sm-4"><label>Konvensional / Syariah</label></div>
            <div class="col-sm-4 d-flex">
                @foreach ($jp as $item)    
                <div class="d-flex">
                    <input type="radio" value="{{ $item->id }}" {{ ($sukuBunga->konven_syariah_id == $item->id)? "checked" : "" }} style="width: 15px" name="konven_syariah_id" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">{{ $item->Product }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Suku Bunga<span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
            <div class="input-group" style="width: 300px; height: 38px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp</span>
                    </div>
                <input type="text" class="form-control number-separator" value="{{ number_format($sukuBunga->Nilai_Suku_Bunga) }}" placeholder="Nilai Suku Bunga" name="Nilai_Suku_Bunga">
                </div>
                @error('Nilai_Suku_Bunga')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-warning text-white" type="submit">Edit</button>
                <a href="{{ url('master_suku_bunga') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection