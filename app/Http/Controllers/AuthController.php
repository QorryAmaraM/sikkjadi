<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
        
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if ($user && password_verify($credentials['password'], $user->password)) {

            switch ($user->role_id) {
                        case 1:
                            Auth::login($user);
                            return redirect()->intended('/dashboard1' . $user->role);
                        case 2:
                            Auth::login($user);
                            return redirect()->intended('/dashboard2' . $user->role);
                        case 3:
                            Auth::login($user);
                            return redirect()->intended('/dashboard3' . $user->role);
                        case 4:
                            Auth::login($user);
                            return redirect()->intended('/dashboard4' . $user->role);
                        case 5:
                            Auth::login($user);
                            return redirect()->intended('/dashboard5' . $user->role);
                        default:
                            return redirect('/login');
                    }
            
        }

        return redirect()->back()->withErrors(['login' => 'Login failed.']);
    }
    
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
