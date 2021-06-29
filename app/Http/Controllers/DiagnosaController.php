<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DiagnosaController extends Controller
{
    public function index()
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = Diagnosa::all();
        return view('diagnosa.index', compact('datas'));
    }

    public function create()
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        return view('diagnosa.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_diagnosa' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);

        $input = $request->all();
        Diagnosa::create($input);

        return redirect()->route('diagnosa.index')->with('success', 'Daftar Diagnosa Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = Diagnosa::findOrFail($id);

        return view('diagnosa.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_diagnosa' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);

        $diagnosa = Diagnosa::findOrFail($id);
        $request->all();
        $diagnosa->update($request->all());

        return redirect()->route('diagnosa.index')->with('success', 'Daftar Diagnosa Berhasil Diupdate!');
    }

    public function hapus($id)
    {
        $diagnosa = Diagnosa::findOrFail($id);
        $diagnosa->delete();

        return response()->json(['status' => 'Daftar Diagnosa Berhasil Terhapus!']);
    }
}
