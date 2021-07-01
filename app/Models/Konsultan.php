<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultan extends Model
{
    use HasFactory;
    protected $table = "konsultan";
    protected $fillable = ['nama_konsultan', 'spesialis', 'rumah_sakit'];

    public function jadwal_konsultasi()
    {
        return $this->hasMany(JadwalKonsultasi::class, 'konsultan_id');
    }
}
