<?php

namespace App\Http\Controllers;

use App\Models\JadwalKonsultasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatKonsultasiController extends Controller
{
    public function index()
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $finish = JadwalKonsultasi::where('status', 'Selesai')->orderBy('created_at', 'asc')->get();

        return view('riwayat-konsultasi.index', compact('finish'));
    }

    public function show($id)
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = DB::table('jadwal_konsultasi')
            ->leftJoin('anak', 'jadwal_konsultasi.anak_id', '=', 'anak.id')
            ->leftJoin('konsultan', 'jadwal_konsultasi.konsultan_id', '=', 'konsultan.id')
            ->where('jadwal_konsultasi.id', $id)
            ->first();

        $pendamping = DB::table('pendamping_konsultasi')
            ->leftJoin('pendamping', 'pendamping.id', '=', 'pendamping_konsultasi.pendamping_id')
            ->where('konsultasi_id', $id)->get();

        return view('riwayat-konsultasi.show', compact('datas', 'pendamping'));
    }

    public function exportPDF()
    {
        $all_data = DB::table('jadwal_konsultasi')
            ->join('anak', 'anak.id', '=', 'jadwal_konsultasi.anak_id')
            ->join('konsultan', 'konsultan.id', '=', 'jadwal_konsultasi.konsultan_id')
            ->select(
                'anak.nama',
                'konsultan.nama_konsultan',
                'konsultan.spesialis',
                'konsultan.rumah_sakit',
                'jadwal_konsultasi.problema',
                'jadwal_konsultasi.analisis_ahli',
                'jadwal_konsultasi.status',
                'jadwal_konsultasi.tgl_konsultasi'
            )
            ->where('jadwal_konsultasi.status', 'selesai')
            ->get();

        $pdf = \PDF::loadView(
            'riwayat-konsultasi.pdf-riwayat-konsultasi',
            [
                'all_data' => $all_data
            ]
        );
        return $pdf->stream();
    }

    public function exportPDFId($id)
    {
        $all_data = DB::table('jadwal_konsultasi')
            ->leftJoin('anak', 'anak.id', '=', 'jadwal_konsultasi.anak_id')
            ->join('konsultan', 'konsultan.id', '=', 'jadwal_konsultasi.konsultan_id')
            ->select(
                'anak.nama',
                'anak.usia',
                'anak.berat_badan',
                'anak.tinggi_badan',
                'anak.tgl_lahir',
                'konsultan.nama_konsultan',
                'konsultan.spesialis',
                'konsultan.rumah_sakit',
                'jadwal_konsultasi.problema',
                'jadwal_konsultasi.analisis_ahli',
                'jadwal_konsultasi.status',
                'jadwal_konsultasi.tgl_konsultasi'
            )
            ->where('jadwal_konsultasi.id', $id)
            ->first();
        $pendamping = DB::table('pendamping_konsultasi')
            ->join('pendamping', 'pendamping.id', '=', 'pendamping_konsultasi.pendamping_id')
            ->where('pendamping_konsultasi.konsultasi_id', $id)
            ->get();
        $simpan_pendamping = '';
        for ($i = 0; $i < count($pendamping); $i++) {
            $simpan_pendamping .= $pendamping[$i]->nama_pendamping . ', ';
        }
        $all_data->nama_pendamping = $simpan_pendamping;

        $pdf = \PDF::loadView(
            'riwayat-konsultasi.pdf-id',
            [
                'all_data' => $all_data
            ]
        );
        return $pdf->stream();
    }

    public function hapus($id)
    {
        $konsultasi = JadwalKonsultasi::findOrFail($id);
        $konsultasi->delete();

        return response()->json(['status' => 'Data Berhasil Terhapus!']);
    }
}
