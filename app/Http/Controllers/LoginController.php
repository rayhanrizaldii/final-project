<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_process(Request $request)
{
    $request->validate([
        'login' => 'required',
        'password' => 'required|min:8',
    ]);

    $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'nama';

    $credentials = [
        $loginType => $request->login,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials)) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login')->with('error', 'Invalid Email/Username or Password');
    }
}


    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logout Successfully');
    }
}
