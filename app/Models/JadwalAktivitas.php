<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAktivitas extends Model
{
    use HasFactory;
    protected $table = "jadwal_aktivitas";
    protected $fillable = ['jam_mulai', 'jam_selesai', 'kegiatan', 'keterangan', 'kategori_aktivitas'];
}
