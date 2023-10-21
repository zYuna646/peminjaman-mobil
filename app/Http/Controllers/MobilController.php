<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    function index()
    {
        $mobil = Mobil::all();
        return view('mobil/index', ['mobils' => $mobil]);
    }

    function create(Request $request)
    {
        $gambar = $request->gambar_mobil_tambah;
        $nama_gambar = $gambar->hashName() . '-' . $request->plat_nomor;

        $gambar->move(public_path() . '/gambar_mobil', $nama_gambar);
        Mobil::create([
            'plat_nomor' => $request->input('plat_mobil_tambah'),
            'jenis_mobil' => $request->input('jenis_mobil_tambah'),
            'warna_mobil' => $request->input('warna_mobil_tambah'),
            'status_mobil' => $request->input('status_mobil_tambah'),
            'gambar_mobil' => $nama_gambar,
        ]);

        return redirect()->route('mobil.index')->with('success', 'Mobil berhasil ditambahkan!');

    }

    function update(Request $request, $id)
    {
        $request->validate([
            'plat_mobil' => 'required',
            'jenis_mobil' => 'required',
            'warna_mobil' => 'required',
            'status_mobil' => 'required',
        ]);

        $mobil = Mobil::find($id);
        if (!$mobil) {
            return redirect()->route('mobil.index')->with('error', 'Mobil tidak ditemukan.');
        }

        $mobil->plat_nomor = $request->input('plat_mobil');
        $mobil->jenis_mobil = $request->input('jenis_mobil');
        $mobil->warna_mobil = $request->input('warna_mobil');
        $mobil->status_mobil = $request->input('status_mobil');
        if ($request->gambar_mobil != null) {
            $gambar = $request->gambar_mobil;
            $nama_gambar = $gambar->hashName() . '-' . $request->plat_nomor;

            $gambar->move(public_path() . '/gambar_mobil', $nama_gambar);
            $mobil->gambar_mobil = $nama_gambar;
        }

        $mobil->save();
        return redirect()->route('mobil.index')->with('success', 'Mobil berhasil Diubah!');
    }

    function delete($id)
    {
        $mobil = Mobil::find($id);
        $mobil->delete();

        return redirect()->route('mobil.index')->with('success', 'Mobil berhasil dihapus');
    }
}