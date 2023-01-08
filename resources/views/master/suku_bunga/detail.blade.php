@extends('layout.layout')
@section('title')
    Master Suku Bunga
@endsection

@section('subtitle')
    Details
@endsection

@section('page')
    <a href="{{ url('master_suku_bunga') }}">Master Suku Bunga</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Suku Bunga</label></div>
            <div class="col-sm-8">: {{ $sukuBunga->Suku_Bunga }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Konvensional / Syariah</label></div>
            <div class="col-sm-8">: {{ $sukuBunga->jp->Product }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Suku Bunga</label></div>
            <div class="col-sm-8">: {{ number_format($sukuBunga->Nilai_Suku_Bunga) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('master_suku_bunga/'.$sukuBunga->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('master_suku_bunga') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection