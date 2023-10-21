<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    function index()
    {
        $user = Auth::user();
       
        if($user->role == "admin")
        {
            return view('dashboard/index');
        }
        else
        {
            $mobils = Mobil::where('status_mobil', '0')->get();
            return view('dashboard/pengguna_index', ['mobils' => $mobils]);
        }
    }
}
