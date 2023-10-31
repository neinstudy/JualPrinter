@extends('user.userlayouts.userheader')

@section('body')
<h2 style="color: rgb(0, 0, 0); font-size: 25px; text-align: left; display: inline-block; margin-top: 10px;"> <!-- Menambahkan margin-top -->
    Daftar Produk
</h2>

<a href="{{ route('admin.create')}}">
<button type="button" style="float: right; margin-top: 10px; margin-right: 15px;" class="btn btn-outline-danger">Add New Product</button>
</a>

@if($data->count() > 0)
<div class="row">
@foreach($data as $row)

<div class="card" style="width: 18rem; margin-right: 25px; margin-top: 25px;">
    <td><img src="{{ asset('images/' . $row->foto_produk) }}" height="300" /></td>
    <div class="card-body">
        <h5 class="card-title">{{ $row->nama_produk }}</h5>
        <p class="card-text">{{ $row->detail_produk }}</p>
    </div>
    <ul class="list-group list-group-flush" style="text-align: left;">
        <li class="list-group-item">Harga   : {{ $row->harga_produk }}</li>
        <li class="list-group-item">Stok    : {{ $row->stok_produk }}</li>
    </ul>
    <div class="card-body">
        <center>
        <form method="post" action="{{ route('produk.destroy', $row->id) }}">
            @csrf
            @method('DELETE')
            <a href="{{ route('user.show', $row->id) }}" class="btn btn-primary btn-sm" style="width: 30%">View</a>
            <a href="{{ route('produk.edit', $row->id) }}" class="btn btn-warning btn-sm" style="width: 30%">Edit</a>
        </form>
        </center>
    </div>
</div>
@endforeach
</div>
@else
<br>
<tr>
<td colspan="6" class="text-center">No Data Found</td> <!-- Sesuaikan dengan jumlah kolom yang ada (ditambahkan kolom Stock) -->
</tr>
@endif
@endsection
