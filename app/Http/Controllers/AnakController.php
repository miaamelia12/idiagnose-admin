<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Diagnosa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnakController extends Controller
{
    public function index(Request $request)
    {
        $datas = Anak::all();
        return view('anak.index', compact('datas'));
    }

    public function show($id)
    {
        $datas = Anak::findOrFail($id);
        return view('anak.show', compact('datas'));
    }

    public function create()
    {
        $diagnosa = Diagnosa::all();
        return view('anak.create', compact('diagnosa'));
    }

    public function store(Request $request)
    {
        $tgl_lahir = $request->get('tgl_lahir');
        $now = Carbon::now();
        $usia = Carbon::parse($tgl_lahir)->diffInMonths($now);

        $anak = Anak::create([
            'nama' => $request->get('nama'),
            'berat_badan' => $request->get('berat_badan'),
            'tinggi_badan' => $request->get('tinggi_badan'),
            'tgl_lahir' => Carbon::createFromFormat('d M Y',  $tgl_lahir),
            'usia' => $usia,
            'tgl_masuk_ysi' => Carbon::createFromFormat('d M Y',  $request->get('tgl_masuk_ysi')),
            'jk' => $request->get('jk'),
            'IQ' => $request->get('IQ'),
            'kesehatan' => $request->get('kesehatan'),
            'pendidikan' => $request->get('pendidikan'),
        ]);

        // $input = $request->all();

        // $anak = Anak::create($input);
        $anak->diagnosa()->attach($request->input('diagnosa'));

        return redirect()->route('anak.index')->with('success', 'Data Anak Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $datas = Anak::findOrFail($id);
        $diagnosa = Diagnosa::all();

        return view('anak.edit', compact('datas', 'diagnosa'));
    }

    public function update(Request $request, $id)
    {
        $tgl_lahir = $request->get('tgl_lahir');
        $now = Carbon::now();
        $usia = Carbon::parse($tgl_lahir)->diffInMonths($now);

        $anak = Anak::find($id)->update([
            'nama' => $request->get('nama'),
            'usia' => $usia,
            'berat_badan' => $request->get('berat_badan'),
            'tinggi_badan' => $request->get('tinggi_badan'),
            'tgl_lahir' => Carbon::createFromFormat('d M Y',  $tgl_lahir),
            'tgl_masuk_ysi' => Carbon::createFromFormat('d M Y',  $request->get('tgl_masuk_ysi')),
            'jk' => $request->get('jk'),
            'IQ' => $request->get('IQ'),
            'kesehatan' => $request->get('kesehatan'),
            'pendidikan' => $request->get('pendidikan'),
        ]);

        $anak = Anak::findOrFail($id);
        $request->all();
        // $anak->update($request->all());
        $anak->diagnosa()->sync($request->input('diagnosa'));

        return redirect()->route('anak.index');
    }

    public function hapus($id)
    {
        $anak = Anak::findOrFail($id);
        $anak->delete();

        return response()->json(['status' => 'Data Berhasil Terhapus!']);
    }
}
