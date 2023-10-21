<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
        $users = User::all();
        return view('user/index', ['users' => $users]);
    }

    function create(Request $request)
    {

        $request['email'] = $request->email_tambah;
        $request['username'] = $request->username_tambah;
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
        ]);

        User::create([
            'name' => $request->input('fullname_tambah'),
            'unit' => $request->input('company_tambah'),
            'role' => $request->input('role_tambah'),
            'email' => $request->input('email_tambah'),
            'username' => $request->input('username_tambah'),
            'password' => Hash::make($request->input('password_tambah')),

        ]);

        return redirect()->route('akun.index')->with('success', 'Akun berhasil dibuat!');
    }

    function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'unit' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($id);
        if (!$user) {
            return redirect()->route('akun.index')->with('error', 'Pengguna tidak ditemukan.');
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->unit = $request->input('unit');
        $user->role = $request->input('role');
        if($request->password != null)
        {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();
        return redirect()->route('akun.index')->with('success', 'Akun berhasil Diubah!');
    }

    function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('akun.index')->with('success', 'Pengguna berhasil dihapus');
    }
}