@extends('layout.layout')
@section('title')
    Master Jenis Product
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
    <a href="{{ url('master_jenis_product') }}">Master Jenis Product</a>
@endsection

@section('content')
    <form action="{{ url('master_jenis_product') }}" method="POST">
        @csrf
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Product <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="Product" class="form-control" style="width: 300px; height: 30px;">
                @error('Product')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('master_jenis_product') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection