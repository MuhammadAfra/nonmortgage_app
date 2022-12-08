@extends('layout.layout')
@section('title')
    Debitur
@endsection

@section('subtitle')
    Upload
@endsection

@section('page')
    <a href="{{ url('debitur') }}">Debitur</a>
@endsection

@section('content')
    <form action="{{ url('upload_save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row pb-3">
            <div class="col-sm-4"><label>Upload File <span class="text-danger">*</span></label></div>
            <div class="col-sm-8"><input type="file" class="form-control" style="width: 300px; height: 45px;"></div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-primary" type="submit">Upload</button>
                <a href="{{ url('debitur') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection