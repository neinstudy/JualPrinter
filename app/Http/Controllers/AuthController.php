<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            "title" => "Login"
        ]);
    }

    public function indexUser()
    {
        return view('user.index', [
        "title" => "Home"
        ]);
    }

    public function register()
    {
        return view('auth.register', [
            "title" => "Register"
        ]);
    }

    public function orderPending()
    {
        return view('admin.orderpending', [
            "title" => "Order Pending"
        ]);
    }

    public function orderConfirmed()
    {
        return view('admin.orderconfirmed', [
            "title" => "Order Confirmed"
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm-password' => 'required|same:password'
        ]);
        $data = $request->except('confirm-password', 'password');
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect('/');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Periksa nilai 'role' pada pengguna
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role === 'user') {
                return redirect()->route('user.index');
            }

            // Default jika tidak ada nilai 'role' yang sesuai
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

}
