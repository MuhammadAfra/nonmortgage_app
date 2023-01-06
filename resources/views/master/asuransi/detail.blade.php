@extends('layout.layout')
@section('title')
    Master Asuransi
@endsection

@section('subtitle')
    Details
@endsection

@section('page')
    <a href="{{ url('master_asuransi') }}">Master Asuransi</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Jenis Asuransi</label></div>
            <div class="col-sm-8">: {{ $asuransi->Jenis_Asuransi }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('master_asuransi/'.$asuransi->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('master_asuransi') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection