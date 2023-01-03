@extends('layout.layout')
@section('title')
    Product
@endsection

@section('subtitle')
    Upload
@endsection

@section('page')
    <a href="{{ url('product') }}">Product</a>
@endsection

@section('content')
    <form action="{{ url('upload_save') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row pb-3">
            <div class="col-sm-4"><label>Upload File <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <div class="custom-file" style="width: 500px; height: 30px;">
                    <input type="file" class="custom-file-input" name="MODAL_PENDIRIAN" >
                    <label class="custom-file-label">Choose file</label>
                  </div>
                @error('MODAL_PENDIRIAN')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>        
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-primary" type="submit">Upload</button>
                <a href="{{ url('product') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection