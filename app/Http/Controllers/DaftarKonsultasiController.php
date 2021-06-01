<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\DaftarKonsultasi;
use App\Models\Konsultan;
use App\Models\Pendamping;
use Illuminate\Http\Request;

class DaftarKonsultasiController extends Controller
{
    public function index()
    {
        $datas = DaftarKonsultasi::all();
        return view('konsultasi.index', compact('datas'));
    }

    public function show($id)
    {
        $datas = DaftarKonsultasi::findOrFail($id);
        return view('konsultasi.show', compact('datas'));
    }

    public function create()
    {
        $anak = Anak::all();
        $konsultan = Konsultan::all();
        $pendamping = Pendamping::all();
        return view('konsultasi.create', compact('anak', 'konsultan', 'pendamping'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $konsultasi = DaftarKonsultasi::create($input);
        $konsultasi->pendamping()->attach($request->input('pendamping'));

        return redirect()->route('konsultasi.index');
    }

    public function edit($id)
    {
        $datas = DaftarKonsultasi::findOrFail($id);
        $anak = Anak::all();
        $konsultan = Konsultan::all();
        $pendamping = Pendamping::all();

        return view('konsultasi.edit', compact('datas', 'anak', 'konsultan', 'pendamping'));
    }

    public function update(Request $request, $id)
    {
        $konsultasi = DaftarKonsultasi::findOrFail($id);
        $request->all();
        $konsultasi->update($request->all());
        $konsultasi->pendamping()->sync($request->input('pendamping'));

        return redirect()->route('konsultasi.index');
    }

    public function hapus($id)
    {
        DaftarKonsultasi::findOrFail($id)->delete();
        return redirect()->route('konsultasi.index');
    }
}
