<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;
    protected $table = "anak";
    protected $fillable = ['nama', 'usia', 'tgl_lahir', 'tgl_masuk_ysi', 'jk', 'IQ', 'kesehatan', 'pendidikan', 'profil'];


    public function getNamaAnakAtrribute($nama)
    {
        return ucfirst($nama);
    }

    public function setNamaAttribute($nama)
    {
        $this->attributes['nama'] = strtolower($nama);
    }

    public function diagnosa()
    {
        return $this->belongsToMany(Diagnosa::class, 'diagnosa_anak', 'anak_id', 'diagnosa_id')->withTimestamps();
    }

    public function daftar_konsultasi()
    {
        return $this->hasMany(DaftarKonsultasi::class, 'anak_id');
    }
}
