@extends('admin.adminlayouts.adminheader')
@section('body')

<body class="text-center">
    <main>
        <h1 style="text-align: left;">Daftar Pesanan</h1>
        <h3 style="text-align: left;">1 Produk</h3><br>

        <div class="card" style="width: 18rem; margin-right: 25px;">
            <img src="img/Printer1.jpg" class="card-img-top" alt="printer 1" height="300">
            <div class="card-body">
              <h5 class="card-title">Printer Canon MegaTank</h5>
              <p class="card-text">The Canon MegaTank refillable printer is my new go-to reliable printer for running my business. It holds 30x the amount of ink vs a standard inkjet printer.</p>
            </div>
            <ul class="list-group list-group-flush" style="text-align: left;">
              <li class="list-group-item">Pemesan   : David</li>
              <li class="list-group-item">Telp      : 081245328176</li>
              <li class="list-group-item">Alamat    : Jl. Dakota V</li>
              <li class="list-group-item">Status    : Pending</li>
            </ul>
            <div class="card-body">
                <p style="text-align: left; color: #1bb13b; font-weight: bold;">Total Harga : Rp. 2,000,000</p>
                <button type="button" class="btn btn-outline-primary" style="width: 100%">Konfirmasi</button>
            </div>
          </div>

    </main>
</body>

@endsection
