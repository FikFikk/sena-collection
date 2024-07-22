<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check() && Auth::user()->role === 'Admin') {
            return redirect()->route('admin.index');
        }

        return view('pages.admin.auth.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'Admin') {
                return redirect()->intended(route('admin.index'));
            }

            $request->session()->flash('status', 'error');
            $request->session()->flash('message', 'Access denied');
            Auth::logout();
            return redirect()->route('login.view');
        }

        $request->session()->flash('status', 'error');
        $request->session()->flash('message', 'The provided credentials do not match our records.');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard.index');
    }
}
