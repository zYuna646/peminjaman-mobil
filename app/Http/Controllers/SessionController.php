<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    function index()
    {
        return view("auth/login");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Atau Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);
    
        $loginSession = [
            'email' => $request->input('email'),
            'password' => $request->input('password'), // Benarkan pengejaan "password"
        ];
    
        if (Auth::attempt($loginSession)) {
            return "sukses";
        } else {
            return "gagal";
        }
    }

    function logout()
    {

    }

    function forget()
    {

    }
}
