<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_mobil',
        'plat_nomor',
        'warna_mobil',
        'status_mobil',
        'gambar_mobil'
    ];
}
