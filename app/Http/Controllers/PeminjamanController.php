<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanMobil;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    function index()
    {
        $peminjamanDiproses = PeminjamanMobil::where('status', 'diproses')->get();
        return view('mobil/peminjaman', ['peminjaman'=> $peminjamanDiproses]);
    }
    
    function riwayat()
    {
        $peminjaman = PeminjamanMobil::all();
        return view('mobil/riwayat', ['peminjaman'=> $peminjaman]);
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
        return redirect()->route('mobil.peminjaman')->with('success', 'Peminjaman Berhasil Dilakukan!');
    }
}
