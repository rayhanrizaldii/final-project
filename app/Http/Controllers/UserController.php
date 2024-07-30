<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('role-permission.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('role-permission.user.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {

        // dd($request);

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed'],
            'status' => ['required', 'boolean'],
            'nomor_rekening' => ['required', 'string'],
            'roles' => ['required'],
            'unit_id' => ['required', 'integer', 'unique:users,unit_id']
        ]);


        $user = User::create([
            'uuid' => (string) Str::uuid(),
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'nomor_rekening' => $request->nomor_rekening,
            'unit_id' => $request->unit_id,
        ]);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('status', 'User created successfully with roles');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('role-permission.user.edit', ['user' => $user, 'roles' => $roles]);
    }
}
