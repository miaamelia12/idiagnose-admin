<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Diagnosa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AnakController extends Controller
{
    public function index()
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = Anak::all();
        return view('anak.index', compact('datas'));
    }

    public function show($id)
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = Anak::findOrFail($id);
        return view('anak.show', compact('datas'));
    }

    public function create()
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $diagnosa = Diagnosa::all();
        return view('anak.create', compact('diagnosa'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'berat_badan' => 'required|numeric|min:0',
            'tinggi_badan' => 'required|numeric|min:0',
            'tgl_lahir' => 'required|date',
            'tgl_masuk_ysi' => 'required|date',
            'pendidikan' => 'required|string|max:255',
            'kesehatan' => 'required|string|max:255',
        ]);

        $tgl_lahir = $request->get('tgl_lahir');
        $tgl_masuk_ysi = $request->get('tgl_masuk_ysi');

        $now = Carbon::now();
        $usia = Carbon::parse($tgl_lahir)->diffInMonths($now);

        // $tahun_lahir = date('Y',  strtotime($tgl_lahir));
        // $tahun_masuk = date('Y',  strtotime($tgl_masuk_ysi));
        // $tahun_ini = date('Y');

        // if ($tahun_masuk < $tahun_lahir) {
        //     Alert::error('Oopss..', 'Tanggal Masuk Yayasan Sebelum Kelahiran Anak!');
        //     return redirect()->to('anak/create');
        // } elseif ($tahun_masuk > $tahun_ini) {
        //     Alert::error('Oopss..', 'Tanggal Masuk Yayasan Melebihi Batas Waktu Saat ini!');
        //     return redirect()->to('anak/create');
        // } else {
        $anak = Anak::create([
            'nama' => $request->get('nama'),
            'berat_badan' => $request->get('berat_badan'),
            'tinggi_badan' => $request->get('tinggi_badan'),
            'tgl_lahir' => Carbon::createFromFormat('d M Y',  $tgl_lahir),
            'usia' => $usia,
            'tgl_masuk_ysi' => Carbon::createFromFormat('d M Y',  $tgl_masuk_ysi),
            'jk' => $request->get('jk'),
            'IQ' => $request->get('IQ'),
            'kesehatan' => $request->get('kesehatan'),
            'pendidikan' => $request->get('pendidikan'),
        ]);
        $anak->diagnosa()->attach($request->input('diagnosa'));
        return redirect()->route('anak.index')->with('success', 'Data Anak Berhasil Ditambahkan!');
        // }
    }

    public function edit($id)
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = Anak::findOrFail($id);
        $diagnosa = Diagnosa::all();

        return view('anak.edit', compact('datas', 'diagnosa'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'berat_badan' => 'required|numeric|min:0',
            'tinggi_badan' => 'required|numeric|min:0',
            'tgl_lahir' => 'required|date',
            'tgl_masuk_ysi' => 'required|date',
            'pendidikan' => 'required|string|max:255',
            'kesehatan' => 'required|string|max:255',
        ]);

        $tgl_lahir = $request->get('tgl_lahir');
        $tgl_masuk_ysi = $request->get('tgl_masuk_ysi');

        $now = Carbon::now();
        $usia = Carbon::parse($tgl_lahir)->diffInMonths($now);

        // $tahun_lahir = date('Y',  strtotime($tgl_lahir));
        // $tahun_masuk = date('Y',  strtotime($tgl_masuk_ysi));
        // $tahun_ini = date('Y');

        // if ($tahun_masuk < $tahun_lahir) {
        //     Alert::error('Oopss..', 'Tanggal Masuk Yayasan Sebelum Kelahiran Anak!');
        //     return redirect()->to('anak');
        // } elseif ($tahun_masuk > $tahun_ini) {
        //     Alert::error('Oopss..', 'Tanggal Masuk Yayasan Melebihi Batas Waktu Saat ini!');
        //     return redirect()->to('anak');
        // } else {
        $anak = Anak::find($id)->update([
            'nama' => $request->get('nama'),
            'usia' => $usia,
            'berat_badan' => $request->get('berat_badan'),
            'tinggi_badan' => $request->get('tinggi_badan'),
            'tgl_lahir' => Carbon::createFromFormat('d M Y',  $tgl_lahir),
            'tgl_masuk_ysi' => Carbon::createFromFormat('d M Y',  $tgl_masuk_ysi),
            'jk' => $request->get('jk'),
            'IQ' => $request->get('IQ'),
            'kesehatan' => $request->get('kesehatan'),
            'pendidikan' => $request->get('pendidikan'),
        ]);

        $anak = Anak::findOrFail($id);
        $request->all();
        // $anak->update($request->all());
        $anak->diagnosa()->sync($request->input('diagnosa'));

        return redirect()->route('anak.index')->with('success', 'Data Anak Berhasil Diupdate!');
        // }
    }

    public function hapus($id)
    {
        $anak = Anak::findOrFail($id);
        $anak->delete();

        return response()->json(['status' => 'Data Berhasil Terhapus!']);
    }
}
