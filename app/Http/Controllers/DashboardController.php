<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    function index()
    {
        $user = Auth::user();
        if($user->role == "admin")
        {
            return view('dashboard/admin');
        }
    }
}
