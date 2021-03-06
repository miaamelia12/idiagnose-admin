<?php

namespace App\Http\Controllers;

use App\Models\JadwalAktivitas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AktivitasBalitaController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = JadwalAktivitas::where('kategori_aktivitas', 'Balita')->orderBy('jam_mulai', 'asc')->get();

        return view('aktivitas-balita.index', compact('datas'));
    }

    public function show($id)
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = JadwalAktivitas::findOrFail($id);

        return view('aktivitas-balita.show', compact('datas'));
    }

    public function create()
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        return view('aktivitas-balita.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kegiatan' => 'required|string|max:255',
            'jam_mulai' => 'date_format:H:i',
        ]);

        $jam_mulai = $request->get('jam_mulai');
        $jam_selesai = $request->get('jam_selesai');

        JadwalAktivitas::create([
            'kegiatan' => $request->get('kegiatan'),
            'jam_mulai' => date('H:i',  strtotime($jam_mulai)),
            'jam_selesai' => date('H:i',  strtotime($jam_selesai)),
            'keterangan' => $request->get('keterangan'),
            'kategori_aktivitas' => $request->get('kategori_aktivitas'),
        ]);

        return redirect()->route('aktivitas-balita.index')->with('success', 'Aktivitas Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = JadwalAktivitas::findOrFail($id);

        return view('aktivitas-balita.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kegiatan' => 'required|string|max:255',
            'jam_mulai' => 'date_format:H:i',
        ]);

        $jam_mulai = $request->get('jam_mulai');
        $jam_selesai = $request->get('jam_selesai');

        JadwalAktivitas::find($id)->update([
            'kegiatan' => $request->get('kegiatan'),
            'jam_mulai' => date('H:i',  strtotime($jam_mulai)),
            'jam_selesai' => date('H:i',  strtotime($jam_selesai)),
            'keterangan' => $request->get('keterangan'),
            'kategori_aktivitas' => $request->get('kategori_aktivitas'),
        ]);

        return redirect()->route('aktivitas-balita.index')->with('success', 'Aktivitas Berhasil Diupdate!');
    }

    public function hapus($id)
    {
        $balita = JadwalAktivitas::findOrFail($id);
        $balita->delete();

        return response()->json(['status' => 'Data Berhasil Terhapus!']);
    }
}
