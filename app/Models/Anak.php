<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;
    protected $table = "anak";
    protected $fillable = ['nama', 'usia', 'tgl_lahir', 'tgl_masuk_ysi', 'jk', 'IQ', 'kesehatan', 'pendidikan'];


    public function getNamaAnakAtrribute($nama)
    {
        return ucfirst(strtolower($nama));
    }

    public function diagnosa()
    {
        return $this->belongsToMany(Diagnosa::class, 'diagnosa_anak', 'anak_id', 'diagnosa_id')->withTimestamps();
    }

    public function daftar_konsultan()
    {
        return $this->belongsToMany(DaftarKonsultasi::class, 'konsultasi_anak', 'anak_id', 'konsultasi_id')->withTimestamps();
    }
