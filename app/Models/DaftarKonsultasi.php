<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarKonsultasi extends Model
{
    use HasFactory;
    protected $table = "daftar_konsultasi";
    protected $fillable = ['tgl_konsultasi', 'problema', 'analisis_ahli', 'anak_id', 'konsultan_id'];

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
