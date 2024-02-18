<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            $middlewareCheckRole = 'checkRole:' . $user->role_id;
            $this->middleware($middlewareCheckRole);

            switch ($user->role_id) {
                case 1:
                    Auth::login($user);
                    return redirect()->intended('/admin-dashboard' . $user->role);
                case 2:
                    Auth::login($user);
                    return redirect()->intended('/kepalabps-dashboard' . $user->role);
                case 3:
                    Auth::login($user);
                    return redirect()->intended('/kepalabu-dashboard' . $user->role);
                case 4:
                    Auth::login($user);
                    return redirect()->intended('/kf-dashboard' . $user->role);
                case 5:
                    Auth::login($user);
                    return redirect()->intended('/staff-dashboard' . $user->role);
                default:
                    return redirect('/login');
            }
        }

        return redirect()->back()->withInput($request->only('email', 'password'))
            ->withErrors(['login' => 'Email or password is incorrect!']);
    }
    public function forgotpassword()
    {
        return view('auth.forgot-password');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
