<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPrediksi extends Model
{
    use HasFactory;
    protected $table = "hasil_prediksi";
    protected $fillable = ['nama_anak', 'usia', 'berat_badan', 'tinggi_badan', 'status'];
}
