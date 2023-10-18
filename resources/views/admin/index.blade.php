@extends('admin.adminLayouts.adminHeader')

@section('body')
@if($data->count() > 0)
    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th> <!-- Kolom Stock ditambahkan -->
            <th>Detail</th>
            <th>Action</th>
        </tr>
        @foreach($data as $row)
            <tr>
                <td><img src="{{ asset('images/' . $row->foto_produk) }}" width="75" /></td>
                <td>{{ $row->nama_produk }}</td>
                <td>{{ $row->harga_produk }}</td>
                <td>{{ $row->stok_produk }}</td> <!-- Menampilkan stok_produk -->
                <td>{{ $row->detail_produk }}</td>
                <td>
                    <form method="post" action="{{ route('produk.destroy', $row->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('produk.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('produk.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@else
    <tr>
        <td colspan="6" class="text-center">No Data Found</td> <!-- Sesuaikan dengan jumlah kolom yang ada (ditambahkan kolom Stock) -->
    </tr>
@endif

@endsection
