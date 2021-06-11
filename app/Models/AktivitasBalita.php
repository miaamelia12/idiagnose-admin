<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasBalita extends Model
{
    use HasFactory;
    protected $table = "aktivitas_balita";
    protected $fillable = ['jam_mulai', 'jam_selesai', 'kegiatan', 'keterangan'];
}
