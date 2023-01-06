@extends('layout.layout')
@section('title')
    Master Asuransi
@endsection

@section('subtitle')
    Edit
@endsection

@section('page')
    <a href="{{ url('master_asuransi') }}">Master Asuransi</a>
@endsection

@section('content')
    <form action="{{ url('master_asuransi', $asuransi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Asuransi <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="jenis_asuransi" value="{{ $asuransi->Jenis_Asuransi }}" class="form-control" style="width: 300px; height: 30px;">
                @error('jenis_asuransi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-warning text-white" type="submit">Edit</button>
                <a href="{{ url('master_asuransi') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection