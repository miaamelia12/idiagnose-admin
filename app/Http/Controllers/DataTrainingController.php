<?php

namespace App\Http\Controllers;

use App\Imports\DataTrainingImport;
use App\Models\DataTraining;
use Illuminate\Http\Request;

use Excel;

class DataTrainingController extends Controller
{
    public function index()
    {
        $datas = DataTraining::all();
        return view('data-sampel.index', compact('datas'));
    }

    public function create()
    {
        return view('data-sampel.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_anak' => 'required|string|max:255',
            'usia' => 'required|numeric|min:0|max:60',
            'berat_badan' => 'required|numeric|min:0',
            'tinggi_badan' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
        ]);

        $input = $request->all();
        DataTraining::create($input);

        return redirect()->route('data-sampel.index')->with('success', 'Data Sampel Berhasil Ditambahkan!');
    }

    public function import(Request $request)
    {
        Excel::import(new DataTrainingImport, $request->file);

        return back();
    }

    public function edit($id)
    {
        $datas = DataTraining::findOrFail($id);
        return view('data-sampel.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_anak' => 'required|string|max:255',
            'usia' => 'required|numeric|min:0|max:60',
            'berat_badan' => 'required|numeric|min:0',
            'tinggi_badan' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
        ]);

        $datas = DataTraining::findOrFail($id);
        $request->all();
        $datas->update($request->all());

        return redirect()->route('data-sampel.index')->with('success', 'Data Sampel Berhasil Diupdate!');
    }

    public function hapus($id)
    {
        $sampel = DataTraining::findOrFail($id);
        $sampel->delete();

        return response()->json(['status' => 'Data Berhasil Terhapus!']);
    }
}
