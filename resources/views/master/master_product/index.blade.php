@extends('layout.layout')
@section('title')
Master Product
@endsection

@section('subtitle')
Home
@endsection

@section('page')
    <a href="{{ url('master_product') }}">Master Product</a>
@endsection
@section('content')
<div class="d-flex pb-3">
    <a href="{{ url('master_product/create') }}" class="btn btn-success my-2">Create New</a>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Product</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 100px;">No</th>
                    <th style="width: 200px;">Action</th>
                    <th>Product</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('master_product/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white mr-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('master_product/'.$item->id) }}" class="btn btn-info btn-sm text-white mr-1"><i class="fas fa-eye"></i></a></div>
                            <div>
                                <form action="{{ url('master_product',$item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                        <td>{{ $item->product }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
