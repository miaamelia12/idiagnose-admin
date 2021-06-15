<?php

namespace App\Http\Controllers;

use App\Models\AktivitasAnak;
use Illuminate\Http\Request;

class AktivitasAnakController extends Controller
{
    public function index(Request $request)
    {
        $datas = AktivitasAnak::orderBy('jam_mulai', 'asc')->get();

        return view('aktivitas-anak.index', compact('datas'));
    }

    public function show($id)
    {
        $datas = AktivitasAnak::findOrFail($id);

        return view('aktivitas-anak.show', compact('datas'));
    }

    public function create()
    {
        return view('aktivitas-anak.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        AktivitasAnak::create($input);

        return redirect()->route('aktivitas-anak.index');
    }

    public function edit($id)
    {
        $datas = AktivitasAnak::findOrFail($id);

        return view('aktivitas-anak.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $aktivitas_anak = AktivitasAnak::findOrFail($id);
        $request->all();
        $aktivitas_anak->update($request->all());

        return redirect()->route('aktivitas-anak.index');
    }

    public function hapus($id)
    {
        AktivitasAnak::findOrFail($id)->delete();

        return redirect()->route('aktivitas-anak.index');
    }
}
