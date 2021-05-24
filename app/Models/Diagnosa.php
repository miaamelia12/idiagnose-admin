<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    use HasFactory;
    protected $table = "diagnosa";
    protected $fillable = ['nama_diagnosa'];

    public function anak()
    {
        return $this->belongsToMany(Anak::class, 'diagnosa_anak', 'anak_id', 'diagnosa_id');
    }
}
