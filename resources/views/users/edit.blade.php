@extends('layout.layout')
@section('title')
    User Management
@endsection

@section('subtitle')
    Edit
@endsection

@section('page')
    <a href="{{ url('users') }}">User Management</a>
@endsection

@section('content')
    <form action="{{ route('users.update', $users) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row pb-3">
            <div class="col-sm-4"><label>Name</label></div>
            <div class="col-sm-8">
                <input type="text" name="name" value="{{ old('name', $users->name) }}" class="form-control" style="width: 300px; height: 30px;">
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Email</label></div>
            <div class="col-sm-8">
                <input type="email" name="email" value="{{ old('email', $users->email) }}" class="form-control" style="width: 300px; height: 30px;">
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Level / Role</label></div>
            <div class="col-sm-4 row pl-3">
                <div class="d-flex">
                    <input type="radio" {{ ($users->level == "Admin")? "checked" : "" }} value="Admin" style="width: 15px" name="level" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">Admin</p>
                </div>
                <div class=" d-flex">
                    <input type="radio" {{ ($users->level == "User")? "checked" : "" }} value="User" style="width: 15px" name="level" class="form-control">
                    <p class="my-auto mx-2" style="font-weight: 600">User</p>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Current Password <span class="text-danger">*</span></div>
            <div class="col-sm-8">
                <input type="password" placeholder="Input Current Password" name="current_password" class="form-control" style="width: 300px; height: 30px;">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <hr>
        <p class="text-danger">Change Password</p>
        <div class="row pb-3">
            <div class="col-sm-4"><label>New Password</div>
            <div class="col-sm-8">
                <input type="password" placeholder="Input New Password" name="password" class="form-control" style="width: 300px; height: 30px;">
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Confirm Password</div>
            <div class="col-sm-8">
                <input type="password" placeholder="Confirm New Password" name="password_confirmation" class="form-control" style="width: 300px; height: 30px;">
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <button class="btn btn-warning text-white" type="submit">Edit</button>
                <a href="{{ url('users') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection