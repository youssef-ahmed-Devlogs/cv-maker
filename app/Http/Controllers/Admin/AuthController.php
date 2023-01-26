<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }

        return back()->withErrors(['email' => 'Invalid Credentials']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.loginView');
    }
}
