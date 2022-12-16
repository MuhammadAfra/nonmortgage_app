@extends('layout.layout')
@section('title')
    Master Sektor Ekonomi
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
    <a href="{{ url('master_sektor_ekonomi') }}">Master Sektor Ekonomi</a>
@endsection

@section('content')
    <form action="{{ url('master_sektor_ekonomi') }}" method="POST">
        @csrf
        <div class="row pb-3">
            <div class="col-sm-4"><label>Sandi Turunan <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="Sandi_Turunan" class="form-control" style="width: 300px; height: 30px;">
                @error('Sandi_Turunan')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Label <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="Label" class="form-control" style="width: 300px; height: 30px;">
                @error('Label')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Sandi Utama <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="Sandi_Utama" class="form-control" style="width: 300px; height: 30px;">
                @error('Sandi_Utama')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Label Utama <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="Label_Utama" class="form-control" style="width: 300px; height: 30px;">
                @error('Label_Utama')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('master_sektor_ekonomi') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection