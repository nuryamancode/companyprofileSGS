<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("auth.v-login");
    }

    function login()
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = request()->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            if ($user->role == 'Admin') {
                return redirect()->route('admin.dashboard.index');
            } else {
                return redirect()->back()->withErrors(['username' => 'Anda bukan Admin']);
            }
        } else {
            if (!User::where('username', $credentials['username'])->exists()) {
                return redirect()->back()->withErrors(['username' => 'Username tidak ditemukan']);
            } else {
                return redirect()->back()->withErrors(['password' => 'Password tidak sesuai']);
            }
        }


    }

    function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }
}
