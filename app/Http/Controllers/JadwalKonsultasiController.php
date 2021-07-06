<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\JadwalKonsultasi;
use App\Models\Konsultan;
use App\Models\Pendamping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class JadwalKonsultasiController extends Controller
{
    public function index()
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $waiting = JadwalKonsultasi::where('status', 'Menunggu')->orderBy('created_at', 'asc')->get();

        return view('jadwal-konsultasi.index', compact('waiting'));
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

        return view('jadwal-konsultasi.show', compact('datas', 'pendamping'));
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
            ->where('jadwal_konsultasi.status', 'menunggu')
            ->get();

        $pdf = \PDF::loadView(
            'jadwal-konsultasi.pdf-konsultasi',
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
            'jadwal-konsultasi.pdf-id',
            [
                'all_data' => $all_data
            ]
        );
        return $pdf->stream();
    }

    public function create()
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $anak = Anak::all();
        $konsultan = Konsultan::all();
        $pendamping = Pendamping::all();
        return view('jadwal-konsultasi.create', compact('anak', 'konsultan', 'pendamping'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'anak_id' => 'required',
            'tgl_konsultasi' => 'required|date',
            'problema' => 'required|string|max:255',
            'konsultan_id' => 'required',
            'pendamping' => 'required',
        ]);

        $tgl_konsultasi = $request->get('tgl_konsultasi');
        $waktu_konsultasi = date('d M Y',  strtotime($tgl_konsultasi));
        $tahun_ini = date('d M Y');

        // if ($waktu_konsultasi < $tahun_ini) {
        //     Alert::error('Oopss..', 'Tanggal Konsultasi Sudah Lalu!');
        //     return redirect()->to('jadwal-konsultasi/create');
        // } else {
        JadwalKonsultasi::create([
            'anak_id' => $request->get('anak_id'),
            'tgl_konsultasi' => Carbon::createFromFormat('d M Y',  $tgl_konsultasi),
            'problema' => $request->get('problema'),
            'konsultan_id' => $request->get('konsultan_id'),
            'analisis_ahli' => $request->get('analisis_ahli'),
            'status' => $request->get('status'),
        ]);

        $id_konsultasi = DB::getPdo()->lastInsertId();

        $get_pendamping = $request->get('pendamping');
        for ($i = 0; $i < count($get_pendamping); $i++) {
            $simpan_pendamping = [
                'konsultasi_id' => $id_konsultasi,
                'pendamping_id' => $get_pendamping[$i],
            ];
            DB::table('pendamping_konsultasi')->insert($simpan_pendamping);
        }

        return redirect()->route('jadwal-konsultasi.index')->with('success', 'Jadwal Konsultasi Berhasil Ditambahkan!');
        // }
    }

    public function edit($id)
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = JadwalKonsultasi::findOrFail($id);
        $anak = Anak::all();
        $konsultan = Konsultan::all();
        if (count($datas->pendamping) == 0) {
            $get = DB::table('pendamping_konsultasi')->where('konsultasi_id', $datas->id)->get();
            $pendamping = [];
            for ($i = 0; $i < count($get); $i++) {
                $get_pendamping = DB::table('pendamping')->where('id', $get[$i]->pendamping_id)->first();
                array_push($pendamping, $get_pendamping);
            }

            $datas->pendamping = $pendamping;
        }
        $pendamping = Pendamping::all();

        return view('jadwal-konsultasi.edit', compact('datas', 'anak', 'konsultan', 'pendamping'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'anak_id' => 'required',
            'tgl_konsultasi' => 'required|date',
            'problema' => 'required|string|max:255',
            'konsultan_id' => 'required',
        ]);

        $tgl_konsultasi = $request->get('tgl_konsultasi');
        $waktu_konsultasi = date('d M Y',  strtotime($tgl_konsultasi));
        $tahun_ini = date('d M Y');

        // if ($waktu_konsultasi < $tahun_ini) {
        //     Alert::error('Oopss..', 'Tanggal Konsultasi Sudah Lalu!');
        //     return redirect()->to('jadwal-konsultasi');
        // } else {
        JadwalKonsultasi::find($id)->update([
            'anak_id' => $request->get('anak_id'),
            'tgl_konsultasi' => Carbon::createFromFormat('d M Y',  $request->get('tgl_konsultasi')),
            'problema' => $request->get('problema'),
            'konsultan_id' => $request->get('konsultan_id'),
            'analisis_ahli' => $request->get('analisis_ahli'),
            'status' => $request->get('status'),
        ]);

        $get_pendamping = $request->get('pendamping');
        DB::table('pendamping_konsultasi')->where('konsultasi_id', $id)->truncate();
        for ($i = 0; $i < count($get_pendamping); $i++) {
            $simpan_pendamping = [
                'konsultasi_id' => $id,
                'pendamping_id' => $get_pendamping[$i],
            ];
            DB::table('pendamping_konsultasi')->insert($simpan_pendamping);
        }

        return redirect()->route('jadwal-konsultasi.index')->with('success', 'Jadwal Konsultasi Berhasil Diupdate!');
        // }
    }

    public function hapus($id)
    {
        $konsultasi = JadwalKonsultasi::findOrFail($id);
        $konsultasi->delete();

        return response()->json(['status' => 'Data Berhasil Terhapus!']);
    }
}
