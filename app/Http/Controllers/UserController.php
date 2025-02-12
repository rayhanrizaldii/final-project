<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Unit;
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
        // $units = Unit::get();
        return view(
            'role-permission.user.create',
            [
                'roles' => $roles,
                // 'unit' => $units
            ]
        );
    }

    public function store(Request $request)
    {

        // dd($request);

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed'],
            'status' => ['required', 'boolean'],
            'roles' => ['required'],
            // 'unit_id' => ['required', 'max:255'],
        ]);


        $user = User::create([
            'uuid' => (string) Str::uuid(),
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            // 'unit_id' => $request->unit_id,
        ]);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('status', 'User created successfully with roles');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        // $units = Unit::get();
        return view(
            'role-permission.user.edit',
            [
                'user' => $user,
                'roles' => $roles,
                'userRoles' => $userRoles,
                // 'unit' => $units
            ]
        );
    }

    public function update(Request $request, User $user)
    {


        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'max:20'],
            'status' => ['required', 'boolean'],
            'roles' => ['required'],
            // 'unit_id' => ['required'],
        ]);

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'status' => $request->status,
            // 'unit_id' => $request->unit_id,
            'updated_at' => now(),
        ];

        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('status', 'User updated successfully with roles');
    }

    public function destroy($uuid)
    {
        User::where('uuid', $uuid)->firstOrFail()->delete();
        return redirect('/users')->with('status', 'User deleted successfully');
    }
}
