@extends('user.userLayouts.userHeader')

@section('body')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Detail Produk</b></div>
            <div class="col col-md-6">
                <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm float-end">Lihat Semua</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><b>Nama Produk</b></label>
            <div class="col-sm-10">
                {{ $produk->nama_produk }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><b>Harga Produk</b></label>
            <div class="col-sm-10">
                {{ $produk->harga_produk }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"><b>Stok Produk</b></label>
            <div class="col-sm-10">
                {{ $produk->stok_produk }}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-sm-2 col-form-label"><b>Detail Produk</b></label>
            <div class="col-sm-10">
                {{ $produk->detail_produk }}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-sm-2 col-form-label"><b>Foto Produk</b></label>
            <div class="col-sm-10">
                <img src="{{ asset('images/' . $produk->foto_produk) }}" width="200" class="img-thumbnail" />
            </div>
        </div>
    </div>
</div>
@endsection
