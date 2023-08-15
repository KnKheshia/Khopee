@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <ol class="breadcrumb">
            <a href="{{route('master.index')}}" class="breadcrumb-item active" aria-current="page" >Master Barang</a>
            <li class="breadcrumb-item active" aria-current="page">List Cart</li>
        </ol>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="" method="post">
                        @csrf
                        @forelse($carts as $cart)
                            <tr>
                                <td>{{$cart['name']}}</td>
                                <td>
                                    <h5>Rp.{{number_format($cart['price'])}}</h5>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="qty[]" id="{{$cart['stuff_id']}}" maxlength="12" value="{{$cart['qty']}}" title="Quantity;" class="form-control">
                                        <input type="hidden" name="stuff_id[]" value="{{$cart['stuff_id']}}" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <h5>Rp.{{number_format($cart['price'] * $cart['qty'])}}</h5>
                                </td>
                            </tr>
                            @empty
                             <tr>
                                <td colspan="4">
                                    Ups!! Please add your purchase here
                                </td>
                             </tr>                           
                        @endforelse
                        <div class="pt-3 mb-3">
                            <div class="d-flex">
                                <a href="" class="btn btn-info ml-3 mr-3">Add Purchase</a>
                                <a href="{{route('store.process.sale')}}" class="btn btn-primary">Process Purchase</a>
                            </div>
                        </div>
                    </form>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection