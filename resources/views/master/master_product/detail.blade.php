@extends('layout.layout')
@section('title')
    Master Product
@endsection

@section('subtitle')
    Details
@endsection

@section('page')
    <a href="{{ url('master_product') }}">Master Product</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Product</label></div>
            <div class="col-sm-8">: {{ $product->product }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('master_product/'.$product->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('master_product') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection