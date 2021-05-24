<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Diagnosa;
use Illuminate\Http\Request;

class AnakController extends Controller
{
    public function index()
    {
        $datas = Anak::get();
        return view('anak.index', compact('datas'));
    }

    public function show($id)
    {
        $datas = Anak::findOrFail($id);
        return view('anak.show', compact('datas'));
    }

    public function create()
    {
        $diagnosa = Diagnosa::get();
        return view('anak.create', compact('diagnosa'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        // $this->validate($request, [
        //     'nama' => 'required|string',
        //     'usia' => 'required|numeric',
        //     'tgl_lahir' => 'required|date',
        //     'tgl_masuk_ysi' => 'required|date',
        //     'jk' => 'required',
        //     'kesehatan' => 'required|string',
        // ]);

        $anak = Anak::create($input);
        $anak->diagnosa()->attach($request->input('diagnosa'));

        return redirect()->route('anak.index');
    }
}
