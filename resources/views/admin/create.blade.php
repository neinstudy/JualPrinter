@extends('admin.adminLayouts.adminHeader')
@section('body')
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h2 style="color: rgb(0, 0, 0); font-size: 25px; margin-left: 10px; text-align: left; display: inline-block; margin-top: 10px; margin-bottom: 20px;"> <!-- Menambahkan margin-top -->
            Tambah Produk
        </h2>

        <div class="container" style="background-color: #4497db; border-radius: 20px; padding: 20px; color: white;">
        <form method="post" action="{{ route('produk.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
            <div class="form-group col-md-6">
                <label  for="name">Nama Produk :</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" required>
            </div>
            <div class="form-group col-md-3">
                <label for="price">Harga :</label>
                <input type="number" class="form-control" id="harga_produk" name="harga_produk" placeholder="Harga Produk" required>
            </div>
            <div class="form-group col-md-3">
                <label for="price">Stok :</label>
                <input type="number" class="form-control" id="stok_produk" name="stok_produk" placeholder="Stok Produk" required>
            </div>
        </div>
        <div class="form-group">
                <label for="description">Deskripsi Produk :</label>
                <textarea class="form-control" rows="4" id="detail_produk" name="detail_produk" placeholder="Masukkan Deskripsi Produk" required></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Input Gambar Produk :</label>
              <input type="file" class="form-control-file" id="foto_produk" name="foto_produk">
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-3 text-center mb-3"> 
                <input type="submit" class="btn btn-warning btn-block" value="Confirm" />
            </div>
            <div class="col-md-3 text-center mb-3"> 
                <input type="reset" class="btn btn-secondary btn-block" value="Reset" />
                </div>
            </div>

            </div>
@endsection


