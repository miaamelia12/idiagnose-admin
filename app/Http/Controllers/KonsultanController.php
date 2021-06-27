<?php

namespace App\Http\Controllers;

use App\Models\Konsultan;
use Illuminate\Http\Request;

class KonsultanController extends Controller
{
    public function index()
    {
        $datas = Konsultan::all();
        return view('konsultan.index', compact('datas'));
    }

    public function create()
    {
        return view('konsultan.create');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nama_kosultan' => 'required|string|max:255',
        //     'spesialis' => 'required|string|max:255',
        //     'rumah_sakit' => 'required|string|max:255',
        // ]);

        // Konsultan::create([
        //     'nama_kosultan' => $request->get('nama_kosultan'),
        //     'spesialis' => $request->get('spesialis'),
        //     'rumah_sakit' => $request->get('rumah_sakit'),
        // ]);

        $input = $request->all();
        Konsultan::create($input);

        return redirect()->route('konsultan.index')->with('success', 'Data Konsultan Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $datas = Konsultan::findOrFail($id);

        return view('konsultan.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'nama_kosultan' => 'required|string|max:255',
        //     'spesialis' => 'required|string|max:255',
        //     'rumah_sakit' => 'required|string|max:255',
        // ]);

        $konsultan = Konsultan::findOrFail($id);
        $request->all();
        $konsultan->update($request->all());

        return redirect()->route('konsultan.index')->with('success', 'Data Konsultan Berhasil Diupdate!');
    }

    public function hapus($id)
    {
        $konsultan = Konsultan::findOrFail($id);
        $konsultan->delete();

        return response()->json(['status' => 'Data Berhasil Terhapus!']);
    }
}
