<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\DataTesting;
use App\Models\DataTraining;
use App\Models\EuclideanDistance;
use App\Models\HasilPrediksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataTestingController extends Controller
{
    public function index()
    {
        $anak = Anak::all();
        return view('prediksi-stunting.index', compact('anak'));
    }

    public function getDetails($id)
    {
        $data = Anak::find($id);

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data_training = DB::table('data_training')->get();

        $nama_anak = $request->get('nama_anak');

        DB::table('euclidean_distance')->delete();

        for ($i = 0; $i < count($data_training); $i++) {
            $id_training = $data_training[$i]->id;
            $usia_training = $data_training[$i]->usia;
            $bb_training = $data_training[$i]->berat_badan;
            $tb_training = $data_training[$i]->tinggi_badan;

            $usia_testing = $request->get('usia');
            $bb_testing = $request->get('berat_badan');
            $tb_testing = $request->get('tinggi_badan');

            $usia = $usia_training - $usia_testing;
            $bb = $bb_training - $bb_testing;
            $tb = $tb_training - $tb_testing;

            $pangkat_usia = pow($usia, 2);
            $pangkat_bb = pow($bb, 2);
            $pangkat_tb = pow($tb, 2);

            $jumlah = $pangkat_usia + $pangkat_bb + $pangkat_tb;

            $euclidean_distance = sqrt($jumlah);

            $hasil = round($euclidean_distance, 8);

            $data = [
                'distance' => $hasil,
                'training_id' => $id_training,
            ];
            $distance = EuclideanDistance::all();

            DB::table('euclidean_distance')->insert($data);
        }

        $rank_terkecil = EuclideanDistance::orderBy('distance', 'ASC')->take(5)->get();

        $get_status = [
            0 => 0,
            1 => 0,
            2 => 0,
        ];
        for ($i = 0; $i < count($rank_terkecil); $i++) {
            $training_id = $rank_terkecil[$i]->training_id;

            $nilai_status = DB::table('data_training')->where('id', $training_id)->first();
            if ($nilai_status->status == 'Normal') {
                $get_status[0] += 1;
            } elseif ($nilai_status->status == 'Pendek') {
                $get_status[1] += 1;
            } elseif ($nilai_status->status == 'Sangat Pendek') {
                $get_status[2] += 1;
            }
        }
        $max_status = max($get_status);
        $search = array_search($max_status, $get_status);

        if ($search == 0) {
            $hasil_status = 'Normal';
        } elseif ($search == 1) {
            $hasil_status = 'Pendek';
        } elseif ($search == 2) {
            $hasil_status = 'Sangat Pendek';
        }

        HasilPrediksi::create([
            'nama_anak' => $nama_anak,
            'usia' => $usia_testing,
            'berat_badan' => $bb_testing,
            'tinggi_badan' => $tb_testing,
            'status' => $hasil_status,
        ]);

        $get_hasil = (object)[
            'nama_anak' => $nama_anak,
            'usia' => $usia_testing,
            'berat_badan' => $bb_testing,
            'tinggi_badan' => $tb_testing,
            'status' => $hasil_status,
        ];

        return view('hasil-pemeriksaan.index', compact('get_hasil'));
    }
}
