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
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Invalid Email or Password');
        };
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logout Successfully');
    }
}
