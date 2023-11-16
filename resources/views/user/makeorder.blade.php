@extends('user.userlayouts.userheader')
@section('body')
    <h2
        style="color: rgb(0, 0, 0); font-size: 25px; margin-left: 10px; text-align: left; display: inline-block; margin-top: 10px; margin-bottom: 20px;">
        Memesan Printer
    </h2>
    <div class="container" style="background-color: #4497db; border-radius: 20px; padding: 20px; color: white;">
<form method="post" action="{{ route('produk.makeorder', $produk->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <img src="{{ asset('images/' . $produk->foto_produk) }}" width="150" class="img-thumbnail" />
                </div>
                <div class="form-group col-md-3">
                    <label for="nama_produk" class="col-form-label">Nama Produk:</label>
                    <p id="nama_produk">{{ $produk->nama_produk }}</p>
                </div>
                <div class="form-group col-md-3">
                    <label for="harga_produk" class="col-form-label">Harga Produk:</label>
                    <p id="harga_produk">{{ $produk->harga_produk }}</p>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nama_pemesan">Nama Lengkap:</label>
                    <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" placeholder="Masukkan nama pemesan" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="no_telpon">No Telepon:</label>
                    <input type="tel" class="form-control" id="no_telpon" name="no_telpon" placeholder="Masukkan no telepon" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="kode_pos">Kode Pos:</label>
                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Masukkan kode pos" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="count">Kuantitas</label>
                    <input type="number" class="form-control" placeholder="jumlah product" name="count" />
                </div>
            </div>
            <div class="form-group">
                <label for="alamat_pemesan">Alamat:</label>
                <textarea class="form-control" id="alamat_pemesan" name="alamat_pemesan" placeholder="Masukkan Alamat Pemesan"
                    rows="4" required></textarea>
            </div>


            <div class="row d-flex justify-content-center">
                <div class="col-md-4 text-center mb-3">
                    <input type="submit" class="btn btn-warning btn-block" value="Confirm Order" />
                </div>
                <div class="col-md-4 text-center mb-3">
                    <input type="reset" class="btn btn-secondary btn-block" value="Reset Form" />
                </div>
            </div>
        </form>

    </div>
@endsection
