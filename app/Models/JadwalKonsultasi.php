<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKonsultasi extends Model
{
    use HasFactory;
    protected $table = "jadwal_konsultasi";
    protected $fillable = ['tgl_konsultasi', 'problema', 'analisis_ahli', 'status', 'anak_id', 'konsultan_id'];

    public function anak()
    {
        return $this->belongsTo(Anak::class, 'anak_id');
    }

    public function konsultan()
    {
        return $this->belongsTo(Konsultan::class, 'konsultan_id');
    }

    public function pendamping()
    {
        return $this->belongsToMany(Pendamping::class, 'pendamping_konsultasi', 'pendamping_id', 'konsultasi_id')->withTimestamps();
    }
}
