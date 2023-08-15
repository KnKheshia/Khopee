@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{route('store.payment')}}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col md-6">
                            <h3>Customer Information</h3>
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="name" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat Lengkap</label>
                                <input type="text" name="address" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col md-6">
                            <h2>Detail Informasi Belanjaan</h2>
                            <ul class="list-group">
                                <li class="list-group-item border-0">
                                    <span>Product</span>
                                </li>
                                @foreach($carts as $cart)
                                    <div>
                                        <span>{{$cart['name']}}</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>{{$cart['qty']}}</span>
                                    </div>
                                @endforeach
                            </ul>
                            <ul class="list-group">
                                <li class="list-group-item border-0">
                                    <div class="d-flex justify-content-between">
                                        <span>Subtotal</span>
                                        <span>Rp.{{number_format($subtotal)}}</span>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 bg-info text-white">
                                    <div class="d-flex justify-content-between">
                                        <span>Total</span>
                                        <span>Rp.{{number_format($subtotal)}}</span>
                                    </div>
                                </li>
                            </ul>
                            <button type="submit" class="btn btn-outline-primary mt-2">
                                Pay Your Order
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection