<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
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
                    return redirect()->intended('/staf-dashboard' . $user->role);
                default:
                    return redirect('/login');
            }
        }

        return redirect()->back()->withErrors(['login' => 'Login failed.']);
    }

    // public function forgotpassword()
    // {
    //     return view('auth.forgot-password');
    // }

    public function showForgotPasswordForm()
    {
        return view('auth.passwords.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = Password::sendResetLink($request->only('email'));

        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', trans($response))
            : back()->withErrors(['email' => trans($response)]);
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.passwords.reset')->with(['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:3|confirmed',
            'token' => 'required|string',
        ]);

        $response = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        return $response == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', trans($response))
            : back()->withErrors(['email' => [trans($response)]]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
