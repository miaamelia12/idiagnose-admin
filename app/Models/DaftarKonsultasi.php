<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarKonsultasi extends Model
{
    use HasFactory;
    protected $table = "daftar_konsultasi";
    protected $fillable = ['tgl_konsultasi', 'problema', 'analisis_ahli'];

    public function anak()
    {
        return $this->belongsToMany(Anak::class, 'konsultasi_anak', 'anak_id', 'konsultasi_id')->withTimestamps();
    }

    public function konsultan()
    {
        return $this->belongsToMany(Konsultan::class, 'dokter_konsultan', 'konsultan_id', 'konsultasi_id')->withTimestamps();
    }

    public function pendamping()
    {
        return $this->belongsToMany(Pendamping::class, 'pendamping_konsultasi', 'pendamping_id', 'konsultasi_id')->withTimestamps();
    }
}
