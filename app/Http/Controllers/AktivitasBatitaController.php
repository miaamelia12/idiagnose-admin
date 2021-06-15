<?php

namespace App\Http\Controllers;

use App\Models\AktivitasBatita;
use Illuminate\Http\Request;

class AktivitasBatitaController extends Controller
{
    public function index()
    {
        $datas = AktivitasBatita::orderBy('jam_mulai', 'asc')->get();

        return view('aktivitas-batita.index', compact('datas'));
    }

    public function show($id)
    {
        $datas = AktivitasBatita::findOrFail($id);

        return view('aktivitas-batita.show', compact('datas'));
    }

    public function create()
    {
        return view('aktivitas-batita.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        AktivitasBatita::create($input);

        return redirect()->route('aktivitas-batita.index');
    }

    public function edit($id)
    {
        $datas = AktivitasBatita::findOrFail($id);

        return view('aktivitas-batita.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $aktivitas_batita = AktivitasBatita::findOrFail($id);
        $request->all();
        $aktivitas_batita->update($request->all());

        return redirect()->route('aktivitas-batita.index');
    }

    public function hapus($id)
    {
        AktivitasBatita::findOrFail($id)->delete();

        return redirect()->route('aktivitas-batita.index');
    }
}
