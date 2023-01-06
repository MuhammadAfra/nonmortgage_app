@extends('layout.layout')
@section('title')
    Master Sektor Ekonomi
@endsection

@section('subtitle')
    Details
@endsection

@section('page')
    <a href="{{ url('master_sektor_ekonomi') }}">Master Sektor Ekonomi</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Sandi Turunan</label></div>
            <div class="col-sm-8">: {{ $sektorEkonomi->Sandi_Turunan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Label</label></div>
            <div class="col-sm-8">: {{ $sektorEkonomi->Label }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Sandi Utama</label></div>
            <div class="col-sm-8">: {{ $sektorEkonomi->Sandi_Utama }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Label Utama</label></div>
            <div class="col-sm-8">: {{ $sektorEkonomi->Label_Utama }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('master_sektor_ekonomi/'.$sektorEkonomi->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('master_sektor_ekonomi') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection