<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::simplePaginate(3);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'role' => 'required',
        ], [
            'email.unique' => 'Email sudah ada, silakan gunakan email yang lain.',
        ]);

        $password = substr($request->email, 0, 3) . substr($request->name, 0, 3);
        $hashedPassword = Hash::make($password);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ], [
            'email.unique' => 'Email sudah ada, silakan gunakan email yang lain.',
        ]);

        $user = User::findOrFail($id);

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }

    public function home()
    {
        return view('home'); // Halaman home
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('logout', 'Anda telah logout');
    }
}
