@extends('layout.layout')
@section('title')
    Master Product
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
    <a href="{{ url('master_product') }}">Master Product</a>
@endsection

@section('content')
    <form action="{{ url('master_product') }}" method="POST">
        @csrf
        <div class="row pb-3">
            <div class="col-sm-4"><label>Product <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="product" class="form-control" style="width: 300px; height: 30px;">
                @error('product')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('master_product') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection