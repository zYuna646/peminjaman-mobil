<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanMobil extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'mobil_id',
        'status',
        'awal_peminjaman',
        'akhir_peminjaman',
        'perihal',
        'surat_LDP',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}
