@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li class="list-group-item border-0">
                                <span>Nomor Invoice :</span>
                                {{$sale->invoice}}
                            </li>
                            <li class="list-group-item border-0">
                                <span>Tanggal Pembelian :</span>
                                {{$sale->created_at}}
                            </li>
                            <li class="list-group-item border-0">
                                <span>Subtotal :</span>
                                Rp. {{number_format($sale->subtotal)}}
                            </li>
                            <li class="list-group-item border-0">
                                <span>Total :</span>
                                {{number_format($sale->subtotal)}}
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group-item border-0">
                            <li class="list-group-item border-0">
                                <span>Address :</span>
                                {{$sale->address}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection