<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /** Menampilkan Halaman pendaftaran user. */
    public function register()
    {
        return view('auth.register');
    }

    /** menyimpan data user baru. */
    public function postregister(Request $request)
    {
        /**validasi type data */
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
        ->withSuccess('Anda telah berhasil mendaftar dan login!');
    }

    /** Menampilkan halaman login. */
    public function login()
    {
        return view('auth.login');
    }

    /** Otentikasi user. */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
       
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('Anda telah berhasil login!');
        }

        return back()->withErrors([
            'email' => 'Anda gagal login!',
        ])->onlyInput('email');
    } 

    /** Menampilkan halaman utama. */
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('auth.dashboard');
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Silakan login untuk mengakses halaman Utama.',
        ])->onlyInput('email');
    } 

    /** mengeluarkan pengguna dari aplikasi. */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('Anda telah berhasil logout!');;
    }    
}
