<?php

namespace App\Http\Controllers;

use App\Models\HasilPrediksi;
use Illuminate\Http\Request;

class RiwayatPrediksiController extends Controller
{
    public function index()
    {
        $datas = HasilPrediksi::orderBy('created_at', 'asc')->get();

        return view('riwayat-prediksi.index', compact('datas'));
    }
}
