<?php

namespace App\Http\Controllers;

use App\Models\AktivitasBalita;
use Illuminate\Http\Request;

class AktivitasBalitaController extends Controller
{
    public function index(Request $request)
    {
        $datas = AktivitasBalita::orderBy('jam_mulai', 'asc')->get();

        return view('aktivitas-balita.index', compact('datas'));
    }

    public function show($id)
    {
        $datas = AktivitasBalita::findOrFail($id);

        return view('aktivitas-balita.show', compact('datas'));
    }

    public function create()
    {
        return view('aktivitas-balita.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        AktivitasBalita::create($input);

        return redirect()->route('aktivitas-balita.index');
    }

    public function edit($id)
    {
        $datas = AktivitasBalita::findOrFail($id);

        return view('aktivitas-balita.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $aktivitas_balita = AktivitasBalita::findOrFail($id);
        $request->all();
        $aktivitas_balita->update($request->all());

        return redirect()->route('aktivitas-balita.index');
    }

    public function hapus($id)
    {
        AktivitasBalita::findOrFail($id)->delete();

        return redirect()->route('aktivitas-balita.index');
    }
}
