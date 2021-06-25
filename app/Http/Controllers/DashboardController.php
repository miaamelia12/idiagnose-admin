<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\DaftarKonsultasi;
use App\Models\Diagnosa;
use App\Models\HasilPrediksi;
use App\Models\Pendamping;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $anak = Anak::get();
        $diagnosa = Diagnosa::get();
        $konsultasi = DaftarKonsultasi::get();
        $pendamping = Pendamping::get();
        $datas = HasilPrediksi::orderBy('created_at', 'asc')->get();

        return view('home', compact('datas', 'anak', 'diagnosa', 'konsultasi', 'pendamping'));
    }
}
