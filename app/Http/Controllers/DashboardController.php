<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\PeminjamanMobil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    function index()
    {
        $user = Auth::user();
       
        if ($user->role === 'admin') {
            $laporan = [
                'jumlah_pengguna' => User::count(),
                'jumlah_mobil_tersedia' => Mobil::where('status_mobil', '0')->count(),
                'jumlah_mobil_tidak_tersedia' => Mobil::where('status_mobil', '1')->count(),
                'jumlah_peminjaman' => PeminjamanMobil::where('status', 'diproses')->count(),
            ];

        
            return view('dashboard.index', ['laporan' => $laporan]);
        }
        else
        {
            $peminjaman = PeminjamanMobil::where('user_id', $user->id)->get();
            $mobils = Mobil::where('status_mobil', '0')->get();
            return view('dashboard/pengguna_index', ['mobils' => $mobils, 'riwayat' => $peminjaman]);
        }
    }
}
