@extends('layout.layout')
@section('title')
User Management
@endsection

@section('subtitle')
Detail
@endsection

@section('page')
<a href="{{ url('users') }}">User Management</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Name</label></div>
            <div class="col-sm-8">: {{ $dataUser->name }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Email</label></div>
            <div class="col-sm-8">: {{ $dataUser->email }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Level / Role</label></div>
            <div class="col-sm-8">: {{ $dataUser->level }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('users/'.$dataUser->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('users') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
