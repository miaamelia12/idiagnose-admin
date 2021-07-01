<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Diagnosa;
use App\Models\HasilPrediksi;
use App\Models\JadwalKonsultasi;
use App\Models\Pendamping;
use Illuminate\Support\Facades\DB;

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
        $konsultasi = JadwalKonsultasi::where('status', 'Menunggu')->get();
        $pendamping = Pendamping::get();
        $datas = HasilPrediksi::orderBy('created_at', 'asc')->get();

        return view('home', compact('datas', 'anak', 'diagnosa', 'konsultasi', 'pendamping'));
    }

    public function exportPDF()
    {
        $all_data = HasilPrediksi::all();

        $pdf = \PDF::loadView(
            'prediksi',
            [
                'all_data' => $all_data
            ]
        );
        return $pdf->stream();
    }
}
