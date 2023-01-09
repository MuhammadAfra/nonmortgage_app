@extends('layout.layout')
@section('title')
    Master Jenis Pembiayaan
@endsection

@section('subtitle')
    Details
@endsection

@section('page')
    <a href="{{ url('master_jenis_pembiayaan') }}">Master Jenis Pembiayaan</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Pembiayaan</label></div>
            <div class="col-sm-8">: {{ $jenisPembiayaan->jenis_pembiayaan }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Konvensional / Syariah</label></div>
            <div class="col-sm-8">: {{ $jenisPembiayaan->jenis_product->Product }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('master_jenis_pembiayaan/'.$jenisPembiayaan->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('master_jenis_pembiayaan') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection