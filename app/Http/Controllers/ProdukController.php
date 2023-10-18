<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::latest()->get();

        return view('admin.index', [
            'title' => 'List of Products',
            'data' => $data
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create', [
            'title' => 'Create New Product' // Tambahkan title di sini
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk'      => 'required',
            'harga_produk'     => 'required|numeric',
            'stok_produk'      => 'required|integer', // Validasi untuk kolom stok_produk
            'detail_produk'    => 'required',
            'foto_produk'      => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);

        $file_name = time() . '.' . $request->file('foto_produk')->getClientOriginalExtension();

        $request->file('foto_produk')->move(public_path('images'), $file_name);

        $produk = new Produk;

        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->stok_produk = $request->stok_produk; // Simpan stok_produk
        $produk->detail_produk = $request->detail_produk;
        $produk->foto_produk = $file_name;

        $produk->save();

        return redirect()->route('admin.index')->with('success', 'Produk Added successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('admin.show', [
            'title' => 'View Product', // Tambahkan judul di sini
            'produk' => $produk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('admin.edit', [
            'title' => 'Edit Product', // Tambahkan title di sini
            'produk' => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk'      => 'required',
            'harga_produk'     => 'required|numeric',
            'stok_produk'      => 'required|numeric',
            'detail_produk'    => 'required',
            'foto_produk'      => $request->hasFile('foto_produk')
            ? 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
            : '',
        ]);

        $foto_produk = $produk->foto_produk;

        if ($request->hasFile('foto_produk')) {
            $file_name = time() . '.' . $request->file('foto_produk')->getClientOriginalExtension();
            $request->file('foto_produk')->move(public_path('images'), $file_name);
            $foto_produk = $file_name;
        }

        $produk->update([
            'nama_produk'   => $request->nama_produk,
            'harga_produk'  => $request->harga_produk,
            'stok_produk'   => $request->stok_produk,
            'detail_produk' => $request->detail_produk,
            'foto_produk'   => $foto_produk,
        ]);

        return redirect()->route('admin.index')->with('success', 'Produk Data has been updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('admin.index')->with('success', 'Produk Data deleted successfully');
    }
}
