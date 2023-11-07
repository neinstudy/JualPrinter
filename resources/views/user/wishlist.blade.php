@extends('user.userlayouts.userheader')

@section('body')
    <h2 style="color: rgb(0, 0, 0); font-size: 25px; text-align: left; display: inline-block; margin-top: 10px;">
        <!-- Menambahkan margin-top -->
        Wishlist
    </h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($wishlist->count() > 0)
        <div class="row">
            @foreach ($wishlist as $row)
                <div class="card" style="width: 18rem; margin-right: 25px; margin-top: 25px;">
                    <td><img src="{{ asset('images/' . $row->produk->foto_produk) }}" height="300" /></td>
                    <div class="card-body">
                        <h5 class="card-title">{{ $row->produk->nama_produk }}</h5>
                        <p class="card-text">{{ $row->produk->detail_produk }}</p>
                    </div>
                    <ul class="list-group list-group-flush" style="text-align: left;">
                        <li class="list-group-item">Harga : {{ $row->produk->harga_produk }}</li>
                        <li class="list-group-item">Stok : {{ $row->produk->stok_produk }}</li>
                    </ul>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('produk.usershow', $row->produk->id) }}" class="btn btn-primary btn-sm btn-block">View</a>
                            </div>
                            <div class="col">
                                    <a href="{{ route('produk.usershow', $row->id) }}" class="btn btn-success btn-sm btn-block">Order</a>
                            </div>
                            <div class="col">
                                    <form method="POST" action="{{ route('user.removeFromWishlist', $row->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-block">Hapus</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @else
        <p>Keranjang Anda kosong.</p>
    @endif
@endsection
