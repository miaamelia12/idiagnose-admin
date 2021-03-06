<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;
    protected $table = "anak";
    protected $fillable = ['nama', 'usia', 'berat_badan', 'tinggi_badan', 'tgl_lahir', 'tgl_masuk_ysi', 'jk', 'IQ', 'kesehatan', 'pendidikan'];

    public function getNamaAnakAtrribute($nama)
    {
        return ucfirst($nama);
    }

    public function setNamaAttribute($nama)
    {
        $this->attributes['nama'] = ucfirst($nama);
    }

    public function diagnosa()
    {
        return $this->belongsToMany(Diagnosa::class, 'diagnosa_anak', 'anak_id', 'diagnosa_id')->withTimestamps();
    }

    public function jadwal_konsultasi()
    {
        return $this->hasMany(JadwalKonsultasi::class, 'anak_id');
    }
}
