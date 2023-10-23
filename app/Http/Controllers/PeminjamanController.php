<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\PeminjamanMobil;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    function index()
    {
        $peminjamanDiproses = PeminjamanMobil::where('status', 'diproses')->get();
        return view('mobil/peminjaman', ['riwayat'=> $peminjamanDiproses]);
    }
    
    function riwayat()
    {
        $peminjaman = PeminjamanMobil::all();
        return view('mobil/riwayat', ['riwayat'=> $peminjaman]);
    }

    function diterima(Request $request)
    {
        $peminjaman = PeminjamanMobil::find($request->id);
        $peminjaman->status =  "diterima";
        $peminjaman->save();   
        return redirect()->route('peminjaman.index')->with("success","berhasil diterima");
    }

    function ditolak(Request $request)
    {
        $peminjaman = PeminjamanMobil::find($request->id);
        $peminjaman->status =  "ditolak";
        $peminjaman->save(); 
        $mobil = Mobil::find($peminjaman->mobil_id);
        $mobil->status_mobil = "0";
        $mobil->save();  
        return redirect()->route('peminjaman.index')->with("success","berhasil ditolak");
    }

    function create(Request $request)
    {
        $gambar = $request->surat_ldp;
        $nama_gambar = $gambar->hashName() . '-' . $request->id_mobil . '-' . auth()->user()->id . '-' . now()->format('Y-m-d');
        $gambar->move(public_path() . '/surat_ldp', $nama_gambar);
        PeminjamanMobil::create([
            'user_id' => auth()->user()->id,
            'mobil_id' => $request->id_mobil,
            'awal_peminjaman' => now()->format('Y-m-d'),
            'akhir_peminjaman' => $request->durasi_peminjaman,
            'perihal' => $request->perihal,
            'surat_LDP' => $nama_gambar
        ]);

        $mobil = Mobil::find($request->id_mobil);
        if (!$mobil) {
            return redirect()->route('mobil.index')->with('error', 'Mobil tidak ditemukan.');
        }

        $mobil->status_mobil = "1";
        $mobil->save();
        
        return redirect()->route('dashboard')->with('success', 'Peminjaman Berhasil Dilakukan!');
    }
}
