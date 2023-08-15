@extends('layouts.app')

@section('content')
<div class="container pt-3">
    <div class="card">
        <ol class="breadcrumb">
            <a href="{{route('master.index')}}" class="breadcrumb-item active" aria-current="page" >Master Barang</a>
            <li class="breadcrumb-item active" aria-current="page">Tambah barang baru</li>
        </ol>
        <div class="card-body">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="alert alert-primary" role="alert">
                        Silahkan input data produk baru.
                    </div>
                    <form action="{{route('master.store')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama barang"  id="">
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" name="quantity" class="form-control" placeholder="Quantity"  id="">
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" name="price" class="form-control" placeholder="Harga"  id="">
                            </div>
                            <!-- <div class="form-group">
                                <label for="harga">Image</label>
                                <input type="file" name="image" class="form-control" >
                            </div> -->
                            <div class="pt-3 mb-3">
                                <button type="submit" class="btn btn-outline-primary">
                                    Simpan Data Baru
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection