<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultan extends Model
{
    use HasFactory;
    protected $table = "konsultan";
    protected $fillable = ['nama', 'spesialis', 'rumah_sakit'];

    public function daftar_konsultasi()
    {
        return $this->belongsToMany(DaftarKonsultasi::class, 'dokter_konsultan', 'konsultan_id', 'konsultasi_id')->withTimestamps();
    }
}
