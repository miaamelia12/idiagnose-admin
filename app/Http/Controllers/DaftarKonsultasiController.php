<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\DaftarKonsultasi;
use App\Models\Konsultan;
use App\Models\Pendamping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarKonsultasiController extends Controller
{
    public function index()
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $waiting = DaftarKonsultasi::where('status', 'Menunggu')->orderBy('created_at', 'asc')->get();
        $finish = DaftarKonsultasi::where('status', 'Selesai')->orderBy('created_at', 'asc')->get();

        return view('daftar-konsultasi.index', compact('waiting', 'finish'));
    }

    public function show($id)
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = DB::table('daftar_konsultasi')
            ->leftJoin('anak', 'daftar_konsultasi.anak_id', '=', 'anak.id')
            ->leftJoin('konsultan', 'daftar_konsultasi.konsultan_id', '=', 'konsultan.id')
            ->where('daftar_konsultasi.id', $id)
            ->first();

        $pendamping = DB::table('pendamping_konsultasi')
            ->leftJoin('pendamping', 'pendamping.id', '=', 'pendamping_konsultasi.pendamping_id')
            ->where('konsultasi_id', $id)->get();

        return view('daftar-konsultasi.show', compact('datas', 'pendamping'));
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
        return view('daftar-konsultasi.create', compact('anak', 'konsultan', 'pendamping'));
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

        if ($waktu_konsultasi < $tahun_ini) {
            Alert::error('Oopss..', 'Tanggal Konsultasi Sudah Lalu!');
            return redirect()->to('daftar-konsultasi/create');
        } else {
            DaftarKonsultasi::create([
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

            return redirect()->route('daftar-konsultasi.index')->with('success', 'Jadwal Konsultasi Berhasil Ditambahkan!');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = DaftarKonsultasi::findOrFail($id);
        $anak = Anak::all();
        $konsultan = Konsultan::all();
        $pendamping = Pendamping::all();

        return view('daftar-konsultasi.edit', compact('datas', 'anak', 'konsultan', 'pendamping'));
    }

    public function update(Request $request, $id)
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

        if ($waktu_konsultasi < $tahun_ini) {
            Alert::error('Oopss..', 'Tanggal Konsultasi Sudah Lalu!');
            return redirect()->to('daftar-konsultasi');
        } else {
            DaftarKonsultasi::find($id)->update([
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

            return redirect()->route('daftar-konsultasi.index')->with('success', 'Jadwal Konsultasi Berhasil Diupdate!');
        }
    }

    public function hapus($id)
    {
        $konsultasi = DaftarKonsultasi::findOrFail($id);
        $konsultasi->delete();

        return response()->json(['status' => 'Data Berhasil Terhapus!']);
    }
}
