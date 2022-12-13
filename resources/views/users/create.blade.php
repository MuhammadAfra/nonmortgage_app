@extends('layout.layout')
@section('title')
    Product
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
    <a href="{{ url('users') }}">Product</a>
@endsection

@section('content')
    <form action="{{ url('users') }}" method="POST">
        @csrf
        <div class="row pb-3">
            <div class="col-sm-4"><label>Name <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="text" name="name" class="form-control" style="width: 300px; height: 30px;">
                @error('DEBITUR_ID')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Email <span class="text-danger">*</span></label></div>
            <div class="col-sm-8">
                <input type="email" name="email" class="form-control" style="width: 300px; height: 30px;">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Level / Role <span class="text-danger">*</span></label></div>
            <div class="col-sm-4 row pl-3">
                <div class="d-flex">
                    <input type="radio" value="Admin" style="width: 15px" name="level" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Admin</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" value="User" style="width: 15px" name="level" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">User</p>
                </div>
                @error('level')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Password <span class="text-danger">*</span></div>
            <div class="col-sm-8">
                <input type="password" name="password" class="form-control" style="width: 300px; height: 30px;">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('users') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection