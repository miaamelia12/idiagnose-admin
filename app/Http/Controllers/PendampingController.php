<?php

namespace App\Http\Controllers;

use App\Models\Pendamping;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PendampingController extends Controller
{
    public function index()
    {
        $datas = Pendamping::all();
        return view('pendamping.index', compact('datas'));
    }

    public function create()
    {
        return view('pendamping.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pendamping' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'profil' => 'image',
        ]);

        if ($request->file('profil')) {
            $file = $request->file('profil');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;
            $request->file('profil')->move("images/pendamping", $fileName);
            $profil = $fileName;
        } else {
            $profil = NULL;
        }

        Pendamping::create([
            'nama_pendamping' => $request->get('nama_pendamping'),
            'jabatan' => $request->get('jabatan'),
            'profil' => $profil
        ]);

        return redirect()->route('pendamping.index')->with('success', 'Data Pendamping Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $datas = Pendamping::findOrFail($id);

        return view('pendamping.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_pendamping' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'profil' => 'image',
        ]);

        if ($request->file('profil')) {
            $file = $request->file('profil');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;
            $request->file('profil')->move("images/pendamping", $fileName);
            $profil = $fileName;
        } else {
            $profil = NULL;
        }

        Pendamping::find($id)->update([
            'nama_pendamping' => $request->get('nama_pendamping'),
            'jabatan' => $request->get('jabatan'),
            'profil' => $profil
        ]);

        return redirect()->route('pendamping.index')->with('success', 'Data Pendamping Berhasil Diupdate!');
    }

    public function hapus($id)
    {
        $pendamping = Pendamping::findOrFail($id);
        $pendamping->delete();

        return response()->json(['status' => 'Data Pendamping Berhasil Terhapus!']);
    }
}
