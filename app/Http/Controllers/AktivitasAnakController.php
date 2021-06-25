<?php

namespace App\Http\Controllers;

use App\Models\JadwalAktivitas;
use Illuminate\Http\Request;

class AktivitasAnakController extends Controller
{
    public function index(Request $request)
    {
        $datas = JadwalAktivitas::where('kategori_aktivitas', 'Anak')->orderBy('jam_mulai', 'asc')->get();

        return view('aktivitas-anak.index', compact('datas'));
    }

    public function show($id)
    {
        $datas = JadwalAktivitas::findOrFail($id);

        return view('aktivitas-anak.show', compact('datas'));
    }

    public function create()
    {
        return view('aktivitas-anak.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        JadwalAktivitas::create($input);

        return redirect()->route('aktivitas-anak.index');
    }

    public function edit($id)
    {
        $datas = JadwalAktivitas::findOrFail($id);

        return view('aktivitas-anak.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $aktivitas_anak = JadwalAktivitas::findOrFail($id);
        $request->all();
        $aktivitas_anak->update($request->all());

        return redirect()->route('aktivitas-anak.index');
    }

    public function hapus($id)
    {
        JadwalAktivitas::findOrFail($id)->delete();

        return redirect()->route('aktivitas-anak.index');
    }
}
