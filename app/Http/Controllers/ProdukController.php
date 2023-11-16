<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Order;
use App\Models\Wishlist;
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

    public function userindex()
    {

        $data = Produk::latest()->get();

        return view('user.index', [
            'title' => 'List of Products',
            'data' => $data
        ]);
    }

    public function addToWishlist(Request $request, Produk $produk)
    {

        // Anda dapat menambahkan validasi sesuai kebutuhan di sini
        $wishlist = new Wishlist();
        $wishlist->id_user = auth()->user()->id;
        $wishlist->id_produk = $produk->id;
        $wishlist->save();

        return redirect()->back()->with('success', 'Produk telah ditambahkan ke wishlist.');
    }

    public function wishlist(Produk $produk)
    {
        $user = auth()->user();
        $wishlist = Wishlist::where('id_user', $user->id)->with('produk')->get();

        return view('user.wishlist', [
            'wishlist' => $wishlist,
            "title" => "Wishlist",
            'produk' => $produk
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

    public function usershow(Produk $produk)
    {
        return view('user.show', [
            'title' => 'View Product',
            'produk' => $produk
        ]);
    }

    public function order(Produk $produk)
    {
        $user = auth()->user();

        if (!$user) {
            // Handle case when user is not authenticated
            return redirect()->route('login');
        }

        $order = Order::where('id_user', $user->id)->with('produk')->get();

        return view('user.order', [
            'title' => 'Order Product',
            'order' => $order,
            'produk' => $produk
        ]);
    }


    public function makeorder(Request $request, Produk $produk)
    {
        if ($request->isMethod('post')) {
            // Handle form submission and store order
            $request->validate([
                'nama_pemesan' => 'required',
                'no_telpon' => 'required',
                'kode_pos' => 'required',
                'count' => 'required|integer',
                'alamat_pemesan' => 'required',
            ]);

            // Get the price of the product
            $harga_produk = $produk->harga_produk;

            // Calculate the total
            $total = $harga_produk * $request->count;

            // Save the order to the "orders" table
            $order = new Order;
            $order->id_user = auth()->user()->id;
            $order->id_produk = $produk->id;
            $order->nama_pemesan = $request->nama_pemesan;
            $order->no_telpon = $request->no_telpon;
            $order->kode_pos = $request->kode_pos;
            $order->count = $request->count;
            $order->alamat_pemesan = $request->alamat_pemesan;
            $order->status = 'Belum dikonfirmasi';
            $order->total = $total; // Assign the calculated total

            $order->save();

            return redirect()->route('user.index')->with('success', 'Pesanan telah berhasil disimpan.');
        }

        // Show the form for making an order
        return view('user.makeorder', [
            'title' => 'Order Product',
            'produk' => $produk
        ]);
    }

    public function orderPending(Produk $produk)
    {
        $pendingOrders = Order::where('status', 'Belum dikonfirmasi')->with('produk')->get();

        return view('admin.orderpending', [
            'title' => 'Order Pending',
            'pendingOrders' => $pendingOrders,
            'produk' => $produk
        ]);
    }

    public function confirmOrder(Order $order)
    {
        // Ubah status menjadi "Sudah dikonfirmasi"
        $order->update(['status' => 'Sudah dikonfirmasi']);

        return redirect()->route('admin.orderpending')->with('success', 'Pesanan berhasil dikonfirmasi.');
    }

    public function orderConfirmed(Produk $produk)
    {
        $confirmedOrders = Order::where('status', 'Sudah dikonfirmasi')->with('produk')->get();

        return view('admin.orderconfirmed', [
            'title' => 'Order Confirmed',
            'confirmedOrders' => $confirmedOrders,
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
        DB::table('wishlists')->where('id_produk', $produk->id)->delete();

        $produk->delete();

        // Redirect ke halaman index produk atau ke halaman lain yang sesuai
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }

    public function removeFromWishlist(Wishlist $wishlist)
    {
        // Pastikan user saat ini adalah pemilik Wishlist item
        if (auth()->user()->id === $wishlist->id_user) {
            $wishlist->delete();
            return redirect()->back()->with('success', 'Item telah dihapus dari Wishlist.');
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus item dari Wishlist.');
        }
    }
}
