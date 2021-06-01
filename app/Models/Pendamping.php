<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendamping extends Model
{
    use HasFactory;
    protected $table = "pendamping";
    protected $fillable = ['nama_pendamping', 'jabatan', 'profil'];

    public function daftar_konsultasi()
    {
        return $this->belongsToMany(DaftarKonsultasi::class, 'pendamping_konsultasi', 'pendamping_id', 'konsultasi_id')->withTimestamps();
    }
}
