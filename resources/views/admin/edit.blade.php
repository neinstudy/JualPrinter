@extends('admin.adminLayouts.adminHeader')
@section('body')
<div class="card">
    <div class="card-header">Edit Produk</div>
    <div class="card-body">
        <form method="post" action="{{ route('produk.update', $produk->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_produk" class="form-control" value="{{ $produk->nama_produk }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Harga Produk</label>
                <div class="col-sm-10">
                    <input type="text" name="harga_produk" class="form-control" value="{{ $produk->harga_produk }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Stok Produk</label>
                <div class="col-sm-10">
                    <input type="text" name="stok_produk" class="form-control" value="{{ $produk->stok_produk }}" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-form-label">Detail Produk</label>
                <div class="col-sm-10">
                    <textarea name="detail_produk" class="form-control">{{ $produk->detail_produk }}</textarea>
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-form-label">Foto Produk</label>
                <div class="col-sm-10">
                    <input type="file" name="foto_produk" />
                    <br />
                    <img src="{{ asset('images/' . $produk->foto_produk) }}" width="100" class="img-thumbnail" />
                    <input type="hidden" name="hidden_foto_produk" value="{{ $produk->foto_produk }}" />
                </div>
            </div>
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $produk->id }}" />
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>
        </form>
    </div>
</div>
@endsection
