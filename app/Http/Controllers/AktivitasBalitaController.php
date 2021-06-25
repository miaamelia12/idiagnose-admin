<?php

namespace App\Http\Controllers;

use App\Models\JadwalAktivitas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AktivitasBalitaController extends Controller
{
    public function index(Request $request)
    {
        $datas = JadwalAktivitas::where('kategori_aktivitas', 'Balita')->orderBy('jam_mulai', 'asc')->get();

        return view('aktivitas-balita.index', compact('datas'));
    }

    public function show($id)
    {
        $datas = JadwalAktivitas::findOrFail($id);

        return view('aktivitas-balita.show', compact('datas'));
    }

    public function create()
    {
        return view('aktivitas-balita.create');
    }

    public function store(Request $request)
    {
        JadwalAktivitas::create([
            'kegiatan' => $request->get('kegiatan'),
            'jam_mulai' => Carbon::createFromFormat('h:i',  $request->get('jam_mulai')),
            'jam_selesai' => Carbon::createFromFormat('h:i',  $request->get('jam_selesai')),
            'keterangan' => $request->get('keterangan'),
            'kategori_aktivitas' => $request->get('kategori_aktivitas'),
        ]);

        return redirect()->route('aktivitas-balita.index');
    }

    public function edit($id)
    {
        $datas = JadwalAktivitas::findOrFail($id);

        return view('aktivitas-balita.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        JadwalAktivitas::find($id)->update([
            'kegiatan' => $request->get('kegiatan'),
            'jam_mulai' => Carbon::createFromFormat('h:i',  $request->get('jam_mulai')),
            'jam_selesai' => Carbon::createFromFormat('h:i',  $request->get('jam_selesai')),
            'keterangan' => $request->get('keterangan'),
            'kategori_aktivitas' => $request->get('kategori_aktivitas'),
        ]);

        return redirect()->route('aktivitas-balita.index');
    }

    public function hapus($id)
    {
        JadwalAktivitas::findOrFail($id)->delete();

        return redirect()->route('aktivitas-balita.index');
    }
}
