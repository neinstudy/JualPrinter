<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home', function () {
//     return view('user.index', [
//         "title" => "Home"
//     ]);
// })->middleware('auth');



//home

// Login
Route::get('/', [AuthController::class, 'login'])->name('auth.login');
Route::post('/', [AuthController::class, 'authenticate'])->name('auth.authenticate');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');



// Routes admin
Route::resource('produk', ProdukController::class);
Route::get('/create', [ProdukController::class, 'create'])->name('admin.create')->middleware('auth');
Route::get('/admin', [ProdukController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/orderpending', [ProdukController::class, 'orderPending'])->name('admin.orderpending');
Route::get('/orderconfirmed', [ProdukController::class, 'orderConfirmed'])->name('admin.orderconfirmed');
Route::post('/admin/confirm-order/{order}', [ProdukController::class, 'confirmOrder'])->name('admin.confirmOrder');
Route::delete('/produk/remove/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');

// Routes user
// Route::get('/user', [AuthController::class, 'indexUser'])->name('user.index')->middleware('auth');
Route::get('/user', [ProdukController::class, 'userindex'])->name('user.index')->middleware('auth');
// Route::get('/usershow', [ProdukController::class, 'usershow'])->name('user.show')->middleware('auth');
Route::get('/produk/usershow/{produk}', [ProdukController::class, 'usershow'])->name('produk.usershow');
Route::get('/order', [ProdukController::class, 'order'])->name('user.order')->middleware('auth');
Route::any('/produk/makeorder/{produk}', [ProdukController::class, 'makeorder'])->name('produk.makeorder');
Route::post('/add-to-wishlist/{produk}', [ProdukController::class, 'addToWishlist'])->name('user.addToWishlist');
Route::get('/wishlist', [ProdukController::class, 'Wishlist'])->name('user.wishlist');
Route::delete('/wishlist/remove/{wishlist}', [ProdukController::class, 'removeFromWishlist'])->name('user.removeFromWishlist');






// Middleware
// Buat middleware 'role' sesuai dengan kebutuhan Anda untuk melindungi rute berdasarkan peran pengguna.

// Controller
// Buat controller 'OperatorController' dan 'SiswaController' sesuai dengan kebutuhan Anda.

