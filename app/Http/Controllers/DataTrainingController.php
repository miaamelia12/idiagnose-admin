<?php

namespace App\Http\Controllers;

use App\Imports\DataTrainingImport;
use App\Models\DataTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DataTrainingController extends Controller
{
    public function index()
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = DataTraining::all();
        return view('data-sampel.index', compact('datas'));
    }

    public function create()
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

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
        // $this->validate($request, [
        //     'file' => 'mimes:csv,xls,xlsx'
        // ]);

        // $file = $request->file('file');
        // $nama_file = rand().$file->getClientOriginalName();
        // $file->move('file',$nama_file);
        Excel::import(new DataTrainingImport, $request->file);

        return back()->with('success', 'Import Data Berhasil!');
    }

    public function edit($id)
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

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
