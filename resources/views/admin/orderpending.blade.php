@extends('admin.adminlayouts.adminheader')
@section('body')

    <body>
        <main>
            <h1 style="text-align: left;">Daftar Pesanan</h1>
            <span class="badge bg-primary" style="font-size: 25px;">{{ $pendingOrders->count() }} Produk</span>
            <br><br>
            @if ($pendingOrders->count() > 0)
                <div class="row">
                    @foreach ($pendingOrders as $row)
                        <div class="card" style="width: 18rem; margin-right: 25px;">
                            <img src="{{ asset('images/' . $row->produk->foto_produk) }}" class="card-img-top" alt="printer 1"
                                height="300">
                            <div class="card-body" style="text-align: left;">
                                <h5 class="card-title">{{ $row->produk->nama_produk }}</h5>
                                <p class="card-text">{{ $row->produk->detail_produk }}</p>
                            </div>
                            <ul class="list-group list-group-flush" style="text-align: left;">
                                <li class="list-group-item">Pemesan : {{ $row->nama_pemesan }}</li>
                                <li class="list-group-item">Telp : {{ $row->no_telpon }}</li>
                                <li class="list-group-item">Alamat : {{ $row->alamat_pemesan }}</li>
                                <li class="list-group-item">Count : {{ $row->count }}</li>
                            </ul>
                            <div class="card-body">
                                <p style="text-align: left; color: #1bb13b; font-weight: bold;">Total Harga :
                                    {{ $row->total }}</p>
                                <form method="post" action="{{ route('admin.confirmOrder', ['order' => $row->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary"
                                        style="width: 100%">Konfirmasi</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Tidak ada pesanan saat ini.</p>
            @endif
        </main>
    </body>
@endsection
