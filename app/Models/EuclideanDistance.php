<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EuclideanDistance extends Model
{
    use HasFactory;
    protected $table = "euclidean_distance";
    protected $fillable = ['distance', 'training_id'];

    public function data_training()
    {
        return $this->belongsTo(DataTraining::class);
    }
}
