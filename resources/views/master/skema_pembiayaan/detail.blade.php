@extends('layout.layout')
@section('title')
    Master Skema Pembiayaan
@endsection

@section('subtitle')
    Details
@endsection

@section('page')
    <a href="{{ url('master_skema_pembiayaan') }}">Master Skema Pembiayaan</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Skema Pembiayaan</label></div>
            <div class="col-sm-8">: {{ $skemaPembiayaan->skema_pembiayaan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Pembiayaan</label></div>
            <div class="col-sm-8">: {{ $skemaPembiayaan->jenis->jenis_pembiayaan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Konvensional / Syariah</label></div>
            <div class="col-sm-8">: {{ $skemaPembiayaan->jenis->jenis_product->Product }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('master_skema_pembiayaan/'.$skemaPembiayaan->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('master_skema_pembiayaan') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection