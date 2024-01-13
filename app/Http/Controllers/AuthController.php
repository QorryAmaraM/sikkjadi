<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // LoginController.php
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Pengguna berhasil login
            return $this->redirectBasedOnRole(Auth::user()->role_id);
        }

        // Jika login gagal
        return redirect('/login')->with('error', 'Invalid credentials');
    }

    private function redirectBasedOnRole($role)
    {
        switch ($role) {
            case 1:
                return redirect('/dashboard1');
                break;
            case 2:
                return redirect('/dashboard2');
                break;
            case 3:
                return redirect('/dashboard3');
                break;
            case 4:
                return redirect('/dashboard4');
                break;
            case 5:
                return redirect('/dashboard5');
                break;
            default:
                return redirect('/login');
        }
    }
}
