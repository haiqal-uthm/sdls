<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'staff_id' => 'required|unique:users',
            'rfid_id' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'position' => 'required',
            'password' => Hash::make('default123'),
        ]);

        User::create([
            'name' => $request->name,
            'staff_id' => $request->staff_id,
            'rfid_id' => $request->rfid_id,
            'email' => $request->email,
            'position' => $request->position,
            'password' => Hash::make('default123'),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'staff_id' => 'required|unique:users,staff_id,' . $user->id,
            'rfid_id' => 'required|unique:users,rfid_id,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'position' => 'required',
        ]);

        $user->update($request->only('name', 'staff_id', 'rfid_id', 'email', 'position'));

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
