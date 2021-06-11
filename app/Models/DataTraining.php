<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTraining extends Model
{
    use HasFactory;
    protected $table = "data_training";
    protected $fillable = ['nama_anak', 'usia', 'berat_badan', 'tinggi_badan', 'status'];

    public function euclidean_distance()
    {
        return $this->hasOne(EuclideanDistance::class);
    }
}
