@extends('layouts.app')

@section('content')
    <div>
        <div class="container pt-3">
            <div class="card">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Master Barang</li>
            </ol>
                <div class="card-body">
                    <div class="mb-3 pt-3">
                        <a href="{{route('master.create')}}" class="btn btn-outline-success">Add New Product</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Names</th>
                                <th>Quantitys</th>
                                <th>Prices</th>
                                <th>Status</th>
                                <th>Orders</th>
                                <th>Actions</thead>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stuffs as $staff)
                                <tr>
                                    <td>{{$staff->name}}</td>
                                    <td>{{$staff->quantity}}</td>
                                    <td>{{$staff->price}}</td>
                                    @if($staff->quantity != 0)
                                        <td class=" badge badge-info">Ready Stock</td>
                                        @else
                                        <td class=" badge badge-danger">Stock Habis</td>
                                    @endif
                                    <td>
                                        <form action="{{route('store.add-to-cart')}}" method="post">
                                            @csrf 
                                            <div class="form-group">
                                                <input type="number" name="qty" id="" maxlength="12" title="Quantity:" class="form-control" >
                                                <input type="hidden" name="stuff_id" id="" value="{{$staff->id}}" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-info btn-sm">Add To Cart</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('master.delete',$staff->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-warning btn-sm">Delete</button>
                                            <a href="{{route('master.edit', $staff->id)}}" class="btn btn-outline-danger btn-sm">Edit</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection