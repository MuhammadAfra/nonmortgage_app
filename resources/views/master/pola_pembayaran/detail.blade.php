@extends('layout.layout')
@section('title')
    Master Pola Pembayaran
@endsection

@section('subtitle')
    Details
@endsection

@section('page')
    <a href="{{ url('master_pola_pembayaran') }}">Master Pola Pembayaran</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Pola Pembayaran</label></div>
            <div class="col-sm-8">: {{ $polaPembayaran->Pola_Pembayaran }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nilai Pola Pembayaran</label></div>
            <div class="col-sm-8">: Rp{{ number_format($polaPembayaran->Nilai_Pola_Pembayaran) }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('master_pola_pembayaran/'.$polaPembayaran->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('master_pola_pembayaran') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection